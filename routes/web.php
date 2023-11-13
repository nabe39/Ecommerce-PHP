<?php

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class,'index'])->name('home');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

// Verify

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    event(new Verified($request->user()));

    return redirect(route('login'));
})->middleware(['auth', 'signed'])->name('verification.verify');
 
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

//Login - Register
Route::get('login',[HomeController::class,'login']);
Route::post('login',[HomeController::class,'authLogin'])->name('login');

Route::get('register',[HomeController::class,'register']);
Route::post('register',[HomeController::class,'createRegister'])->name('register');


Route::get('/redirect',[HomeController::class,'redirect']);

//Features
Route::get('/view_category',[AdminController::class,'view_category']);
Route::get('/view_product',[AdminController::class,'view_product']);
Route::get('/show_product',[AdminController::class,'show_product']);

Route::get('/delete_category/{id}',[AdminController::class,'delete_category']);
Route::get('/delete_product/{id}',[AdminController::class,'delete_product']);

Route::get('/update_product/{id}',[AdminController::class,'update_product']);
Route::post('/update_product_comfirm/{id}',[AdminController::class,'update_product_comfirm']);

Route::post('/add_category',[AdminController::class,'add_category']);
Route::post('/add_product',[AdminController::class,'add_product']);


Route::get('/product_details/{id}',[HomeController::class,'product_details']);

Route::post('/add_cart/{id}',[HomeController::class,'add_cart']);
Route::get('/show_cart',[HomeController::class,'show_cart']);
Route::get('/remove_cart/{id}',[HomeController::class,'remove_cart']);
Route::post('/cash_order',[HomeController::class,'cash_order']);


Route::get('/product_search',[HomeController::class,'product_search']);