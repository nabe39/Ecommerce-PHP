<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Reply;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index(Request $request):View{ 
        $product=Product::get();
        $categories = Category::get();
        $results = DB::table('orders')
        ->select('product_id', DB::raw('COUNT(DISTINCT user_id) as total_buyers'))
        ->groupBy('product_id')
        ->orderByDesc('total_buyers')
        ->take(7)
        ->get();

        $topSaleProducts = Product::whereIn('id', $results->pluck('product_id'))->get();

        // if ($request->ajax()) {
        //     return view('home.data.product', compact('product','categories'));
        // }
        session(['topSaleProducts' => $topSaleProducts]);
        session(['categories' => $categories]);
        session(['product' => $product]);
        return view('home.userpage');
    }
    // public function redirect(){
    //     $usertype=Auth::user()->usertype;
    //     if($usertype == '1'){
    //         $total_product =product::all()->count();
    //         $total_order =order::all()->count();
    //         $total_user =user::all()->count();

    //         $order=order::all();
    //         $total_revenue=0;
    //         foreach($order as $order)
    //         {
    //             $total_revenue=$total_revenue+ $order->price;
    //         }

    //         $total_delivered= order::where('delivery_status','=','delivered')->get()->count();
    //         $total_processing= order::where('delivery_status','=','processing')->get()->count();

    //         return view('admin.home', compact('total_product','total_order','total_user','total_revenue','total_delivered','total_processing'));
    //     }else{
    //         $product=Product::paginate(6);
    //         return view('home.userpage',compact('product'));
    //     }
    // }
    //Profile page
    public function profile(Request $request){
        $userid = $request->id;
        $user = User::where('id',$userid)->first();
        session(['user' => $user]);
        return view('home.profile');
    }
    public function editProfile(Request $request){
        $userid = $request->id;
        $user = User::where('id',$userid)->first();
        $user->name=$request->name;
        $user->phone=$request->phone;
        $user->address=$request->address;
        $user->birthday=$request->birthday;
        $user->email=$request->email;
        $image = $request->file('image');
       
        if($image) {
                File::delete(public_path('profilePhoto/' . $user->profile_photo_path));
                $imagename = $userid.'.'.$image->getClientOriginalExtension();
                $request->image->move('profilePhoto',$imagename);
                $user->profile_photo_path = $imagename;           
        }
        
        $user->save();
        return redirect()->back()->with('success','Update successfully');
    }

    
    //Detail page
    public function product_details(Request $request):View{
        $id=$request->id;
        $product=Product::where('id',$id)->first();
        $category= $product->category;
        $request->session()->put('product',$product);
        $related = Product::where('category',$category)->get();
        $comment = Comment::where('product_id',$id)->get();
        $countRating = $comment->count();
        $comment = Comment::where('product_id',$id)->orderBy('rating','desc')->paginate(4);
        if ($request->ajax()) {
            return view('home.data.comment', compact('comment'));
        }
        $reply = Reply::where('product_id',$id)->get();

        // $comment = Comment::paginate(6);
        return view('home.product_details-1',compact('related','comment','reply','countRating'));
    }
    public function add_comment(Request $request){
        $idProduct=$request->id;
        $rating = $request->input('rating');
        if(Auth::id()){
            if($rating === null || $rating === ''){
                return redirect()->back()->with('error', 'Vui lòng đánh giá sản phẩm trước khi bình luận.');
            }else{
                $comment = new Comment;
                $comment->name = Auth::user()->name;
                $comment->user_id = Auth::user()->id;
                $comment->comment = $request->comment;
                $comment->rating = $request->rating;
                $comment->product_id =$idProduct;
                $comment->save();
                return redirect()->back()->with('success', 'Bình luận của bạn đã được gửi.');
            }
            

        }else{
            return redirect()->route('login');
        }
    }
    // public function add_reply(Request $request){
    //     $idProduct=$request->id;
    //     if(Auth::id()){
    //         $reply = new Reply;
    //         $reply->name = Auth::user()->name;
    //         $reply->user_id = Auth::user()->id;
    //         $reply->comment_id = $request->commentId;
    //         $reply->reply = $request->reply;
    //         $reply->product_id =$idProduct;
    //         $reply->save();
    //         return redirect()->back();

    //     }else{
    //         return redirect()->route('login');
    //     }
    // }
    public function add_rating(Request $request){
    if (Auth::id()) {
        $productRating = Comment::where('product_id','=',$request->id)->get();
        // dd($productRating);
        $userId=Auth::user()->id;
        $productRating = Comment::where('user_id','=',$userId)->first();
        $productRating->rating = $request->rating; 
        $productRating->save();
        // dd($productRating);
        return redirect()->back()->with('success', 'Thank you for rating');
    } else {
        return redirect()->route('login');
    }
}
    //Cart page
    public function add_cart(Request $request, $id){
        if(Auth::id()){
            $user=Auth::user(); //get user data
            $product = Product::find($id);
            if($product->quantity < $request->quantity){
                return redirect()->back()->with('error',"The quantity of items you're purchasing exceeds the available stock.");
            }else{
                $cart = new Cart;
                //user
                $cart->name = $user->name;
                $cart->email = $user->email;
                $cart->phone = $user->phone;
                $cart->address = $user->address;
                $cart->user_id = $user->id;
                //product
                $cart->product_title = $product->title;
                //discount and price
                if($product->discount_price !=null){
                    $cart->price = $product->discount_price * $cart->quantity=$request->quantity;
                }else{
                    $cart->price = $product->price * $cart->quantity=$request->quantity;
                }
    
                $cart->image = $product->image;
                $cart->Product_id = $product->id;
    
                $cart->quantity=$request->quantity; //input values from input
                $cart->save();
                $cart=Cart::where('user_id',$user->id)->count();
                session(['cart' => $cart]);
                // dd($user); send request attribute
                return redirect()->back()->with('message','Add cart successfully!');
            }

        }
        else{
            return redirect()->route('login');
        }
    }
    public function show_cart(){
        if(Auth::id()){
            $id=Auth::user()->id;
            $cart=Cart::where('user_id','=',$id)->get();
            return view('home.showcart-1',compact('cart'));
        }
            return redirect()->route('login');
    }
    public function remove_cart($id){
        $cart=Cart::find($id);
        $cart->delete();
        $userid=Auth::user()->id;
        $cart=Cart::where('user_id',$userid)->count();
        session(['cart' => $cart]);
        return redirect()->back();
    }
    public function cash_order(Request $request){
        $user = Auth::user();
        $userid = $user->id;
        
        // Lấy giá trị của checkbox từ request
        $selectedProductIds = $request->input('checkbox', []);
        
        // Lấy thông tin sản phẩm dựa trên ID đã được chọn
        if (empty($selectedProductIds)) {
            return redirect()->back()->with('error','Please select product!!!');
        } else {
            $data = Cart::whereIn('id', $selectedProductIds)->where('user_id', $userid)->get(); 
            foreach($data as $data){
                $order = new Order;
                $order->name = $data->name;
                $order->email = $data->email;
                $order->phone = $data->phone;
                $order->address = $data->address;
                $order->user_id = $data->user_id;
                
                $order->product_title = $data->product_title;
                $order->price = $data->price;
                $order->quantity = $data->quantity;
                $order->image = $data->image;
                $order->product_id = $data->Product_id;
    
                $order->payment_status = 'cash on delivery';
                $order->delivery_status = 'processing';
    
                $order->save();
    
                $cart_id = $data->id;
                $cart = Cart::find($cart_id);
                $product=Product::find($data->Product_id);
                $product->quantity = $product->quantity - $order->quantity;
                $product->save();
                $cart->delete();
                
                // Cart
                $cart = Cart::where('user_id', $userid)->count();
                session(['cart' => $cart]);
                
                // Order
                $order = Order::where('user_id', $userid)->count();
                session(['orderCount' => $order]);
            }
            return redirect()->back()->with('message', 'We have received your order. We will connect you soon...');
        }
    }
    //Order page
    public function show_order(){
        if(Auth::id()){
            $user=Auth::user();
            $userId = $user->id;
            $order=Order::where('user_id','=',$userId)->get();
            $orderCount=$order->count();
            session(['orderCount'=>$orderCount]);
            // dd($order->delivery_status);
            return view('home.order',compact('order'));
        }else{
            return redirect()->route('login');
        }
    }
    public function remove_order($id){
        $order=Order::find($id);
        $order->delivery_status ='You canceled the order';
        $order->save();
        $userid=Auth::user()->id;
        $order=Order::where('user_id',$userid)->count();
        session(['orderCount' => $order]);
        return redirect()->back();
    }
    //Home page
    public function product_search(Request $request){
        $search_text=$request->search;
        // $categories = Category::get();
        // $product=Product::orderBy('category','desc')->paginate(6);
        // $results = DB::table('orders')
        // ->select('product_id', DB::raw('COUNT(DISTINCT user_id) as total_buyers'))
        // ->groupBy('product_id')
        // ->orderByDesc('total_buyers')
        // ->take(7)
        // ->get();

        // $topSaleProducts = Product::whereIn('id', $results->pluck('product_id'))->get();
        $product=Product::where('title','LIKE',"%$search_text%")->orwhere('category','LIKE',"%$search_text%")->get();
        session(['product' => $product]);

        // if ($request->ajax()) {
        //     return view('home.data.product');
        // }
        return view('home.userpage');
    }
}
