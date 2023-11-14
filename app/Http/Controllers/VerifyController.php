<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerifyController extends Controller
{
    public function notice(){
        return view("auth.verify-email");
    }
    public function makeverify (EmailVerificationRequest $request){
        $request->fulfill();

        event(new Verified($request->user()));

        return redirect(route('home'));
    }
    public function sendVerificationEmail(Request $request){
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    }
}
