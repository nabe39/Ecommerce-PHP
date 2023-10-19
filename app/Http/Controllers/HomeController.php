<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

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
            'password'=>$data['password']
        ])){
            $product=Product::paginate(6);
            $request->session()->regenerate();
            $usertype=Auth::user()->usertype;
            if($usertype == '1'){
                return view('admin.home');
            }else{
                $product=Product::paginate(6);
                return redirect(route('home'));
            }
        }else{
            return redirect()->back();
        }
       
    }

    public function register(){
        return view('home.register');
    }
    public function createRegister(Request $request){
        $product=Product::paginate(6);
        $data=$request;
        // dd($data);
        // if($data['password']==$data['password_confirmation']){
        // }
        // $user = User::create($data);
        // auth()->login($user);
        // return view('home.userpage',compact('product'));
        // return redirect()->back();
        if($data['password']==$data['password_confirmation']){
            $user = new User;
            $user->name = $data->name;
            $user->email = $data->email;
            $user->phone = $data->phone;
            $user->address = $data->address;

            $user->password =bcrypt($data->password);
            $user->save();
            return redirect('login');
        }
       
       return redirect()->back();
    }
    public function product_details($id){
        $product=Product::find($id);
        return view('home.product_details',compact('product'));
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
            // dd($user); send request attribute
            return redirect()->back();
        }
        else{
            return redirect('login');
        }
        // $product = Product::find($id);
    }
    public function show_cart(){
        if(Auth::id()){
            $id=Auth::user()->id;
            $cart=Cart::where('user_id','=',$id)->get();
            return view('home.showcart',compact('cart'));
        }
            return redirect(route('login'));
    }
    public function remove_cart($id){
        $cart=Cart::find($id);
        $cart->delete();
        return redirect()->back();
    }
    public function cash_order(){
        $user=Auth::user();
        $userid=$user->id;
        $data = Cart::where('user_id','=',$userid)->get();
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
            $cart_id=$data->id;
            $cart=Cart::find($cart_id);
            $cart->delete();
        }
        return redirect()->back()->with('message','We have received your order. We will connect you soon...');
    }
}
