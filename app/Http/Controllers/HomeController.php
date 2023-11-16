<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index(){
        $product=Product::paginate(6);
        
        return view('home.userpage',compact('product'));
    }
    public function redirect(){
        $usertype=Auth::user()->usertype;
        if($usertype == '1'){
            $total_product =product::all()->count();
            $total_order =order::all()->count();
            $total_user =user::all()->count();

            $order=order::all();
            $total_revenue=0;
            foreach($order as $order)
            {
                $total_revenue=$total_revenue+ $order->price;
            }

            $total_delivered= order::where('delivery_status','=','delivered')->get()->count();
            $total_processing= order::where('delivery_status','=','processing')->get()->count();

            return view('admin.home', compact('total_product','total_order','total_user','total_revenue','total_delivered','total_processing'));
        }else{
            $product=Product::paginate(6);
            return view('home.userpage',compact('product'));
        }
    }

    
    public static function countt ($id){
        $cart=Cart::where('user_id',$id)->count();
        session(['cart' => $cart]);
        dd($cart);
    }

    

    public function product_details(Request $request){
        $id=$request->id;
        $product=Product::where('id',$id)->first();
        $category= $product->category;
        $request->session()->put('product',$product);
        $related = Product::where('category',$category)->get();
        return view('home.product_details-1',compact('related'));
    }
    public function add_cart(Request $request, $id){
        if(Auth::id()){
            $user=Auth::user(); //get user data
            $product = Product::find($id);
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
        else{
            return redirect('login');
        }
    }
    public function show_cart(){
        if(Auth::id()){
            $id=Auth::user()->id;
            $cart=Cart::where('user_id','=',$id)->get();
            return view('home.showcart-1',compact('cart'));
        }
            return redirect(route('login'));
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
        $user=Auth::user();
        $userid=$user->id;
        // Lấy giá trị của checkbox từ request
        $selectedProductIds = $request->input('checkbox', []);
        // Lấy thông tin sản phẩm dựa trên ID đã được chọn
        $data = Cart::whereIn('id', $selectedProductIds)->where('user_id', $userid)->get(); 
        foreach($data as $data){
            $order=new Order;
            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->user_id=$data->user_id;
            
            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->image=$data->image;
            $order->product_id=$data->Product_id;

            $order->payment_status = 'cash on delivery';
            $order->delivery_status = 'processing';

            $order->save();

            $cart_id = $data->id;
            $cart = Cart::find($cart_id);

            $cart->delete();
            $cart=Cart::where('user_id',$userid)->count();
            session(['cart' => $cart]);
        }
        return redirect()->back()->with('message','We have received your order. We will connect you soon...');
    }
    public function product_search(Request $request){
        $search_text=$request->search;
        $product=Product::where('title','LIKE',"%$search_text%")->orwhere('category','LIKE',"%$search_text%")->paginate(6);
        return view('home.userpage',compact('product'));
    }
}
