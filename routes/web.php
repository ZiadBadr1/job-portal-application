<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostJobController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\isEmployer;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});
// ---------------------User Routes-------------------------------------------------

Route::controller(UserController::class)->group(function () {

Route::get('/register/seeker','createSeeker')->name('create.seeker');
Route::post('/register/seeker','storeSeeker')->name('store.seeker');
Route::get('/login','login')->name('login');
Route::post('/logout','logout')->name('logout');
Route::post('/login','postlogin')->name('login.post');


Route::get('/register/employee','createEmployee')->name('create.employee');
Route::post('/register/employee','storeEmployee')->name('store.employee');


});
// ---------------------Dashboard Routes-------------------------------------------------

Route::controller(DashboardController::class)->middleware('auth')->group(function () {

    Route::get('/dashboard','index')->name('dashboard')->middleware('verified');
    Route::get('/verify','verify')->name('verification.notice');
    Route::get('/resend/verification/email','resend')->name('resend.email');
});


// ---------------------Subscription Routes-------------------------------------------------

Route::controller(SubscriptionController::class)->middleware(['auth','isEmployer'])->group(function (){

   Route::get('subscribe' , 'index')->name('subscribe');
   Route::get('pay/weekly' , 'initiatePayment')->name('pay.weekly');
   Route::get('pay/monthly' , 'initiatePayment')->name('pay.monthly');
   Route::get('pay/yearly' , 'initiatePayment')->name('pay.yearly');
   Route::get('payment/success' , 'paymentSuccess')->name('payment.success');
   Route::get('payment/cancel' , 'cancel')->name('payment.cancel');
});

Route::controller(PostJobController::class)->middleware(['auth','isEmployer','isPremiumUser'])->group(function (){

    Route::get('job/create' , 'create')->name('job.create');
});




Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/login');
})->middleware(['auth', 'signed'])->name('verification.verify');

