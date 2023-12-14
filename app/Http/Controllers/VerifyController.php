<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Mail\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerifyController extends Controller
{
    //Login
    public function login(){
        return view('home.signin.login');
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
                        // $user = User::where('email',$data['email'])->first();
                        // dd($user);
                        // session(['user' => $user]);
                        // $total_product =product::all()->count();
                        // $total_order =order::all()->count();
                        // $total_user =user::all()->count();
            
                        // $order=order::all();
                        // $total_revenue=0;
                        // foreach($order as $order)
                        // {
                        //     $total_revenue=$total_revenue+ $order->price;
                        // }
            
                        // $total_delivered= order::where('delivery_status','=','delivered')->get()->count();
                        // $total_processing= order::where('delivery_status','=','processing')->get()->count();
            
                        // return view('admin.home', compact('total_product','total_order','total_user','total_revenue','total_delivered','total_processing'));
                        return redirect(route('admin'));
                    }else{
                        $user = User::where('email',$data['email'])->first();
                        session(['user' => $user]);
                        $cart=Cart::where('user_id',$user->id)->count();
                        session(['cart' => $cart]);
                        $order = Order::where('user_id', $user->id)->count();
                        session(['orderCount' => $order]);
                        return redirect(route('home'));
                    }
                }else{
                    return view('home.signin.verifycode');
                }
                }else{
                    return redirect()->back()->with('error','Wrong Email or Password');
                }
    }
    //Register
    public function register(){
        return view('home.signin.register');
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
    $remember_token =random_int(100000, 999999);
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
        'password' => Hash::make($request->password),
        'remember_token' =>$remember_token,
    ]);

    Mail::to($user->email)->send(new VerifyEmail($remember_token));
    return redirect()->route('verification.notice',['id'=> $user->id]);
}




public function notice(User $user){
    
    return view("home.signin.verifycode",['user'=>$user]);
}
public function makeverify(Request $request){
    $input = $request->OTP;
    $user = User::where('remember_token',$input)->first(); // Retrieve the user from the database using $id
    if ($input == $user->remember_token) {
        $currentDateTime = Carbon::now();
        $formattedDateTime = $currentDateTime->format('Y-m-d H:i:s');
        $user->email_verified_at = $formattedDateTime;
        $user->remember_token=null;
        $user->save();

        return redirect()->route('home'); 
    } else {
        return redirect()->back()->with('error', 'OTP wrong. Please try again.');
    }
}
public function logout(Request $request){
    Auth::logout();

    return redirect(route('home'));
}

}


