<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class HomeController extends Controller
{
    public function index(){
        $product=Product::paginate(6);
        
        return view('home.userpage',compact('product'));
    }
    public function redirect(){
        $usertype=Auth::user()->usertype;
        if($usertype == '1'){
            return view('admin.home');
        }else{
            $product=Product::paginate(6);
            return view('home.userpage',compact('product'));
        }
    }

    public function login(){
        return view('home.login');
    }
    public function authLogin(Request $request){
        $data=$request;
            if(auth()->attempt([
                'email'=>$data['email'],
                'password'=>$data['password'],
            ])){
               
                $request->session()->regenerate();
                $userverify = Auth::user()->email_verified_at;
              
                if($userverify!== null){
                    $usertype=Auth::user()->usertype;
                    if($usertype == '1'){
                        return view('admin.home');
                    }else{
                        $product=Product::paginate(6);
                        $user = User::where('email',$data['email'])->first();
                        session(['name' => $user->name]);
                        $cart=Cart::where('user_id',$user->id)->count();
                        session(['cart' => $cart]);
                        return redirect(route('home'));
                    }
                }else{
                    return view('auth.verify-email');
                }
                }else{
                    return redirect()->back();
                }
    }
    public static function countt ($id){
        $cart=Cart::where('user_id',$id)->count();
        session(['cart' => $cart]);
        dd($cart);
    }

    public function register(){
        return view('home.register');
    }
    public function createRegister(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'phone' => 'required|string|max:15',
        'address' => 'required|string|max:255',
        'password' => 'required|string|min:8|confirmed',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
        'password' => Hash::make($request->password),
    ]);

    $user->sendEmailVerificationNotification();

    return redirect()->route('verification.notice');
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
    public function test(Request $request){
        $arr = $request->checkbox;
        dd($arr);
        
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
