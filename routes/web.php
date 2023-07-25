<?php

use App\Http\Controllers\ApplicantController;
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
    return view('home');
})->name('home');
// ---------------------User Routes-------------------------------------------------

Route::controller(UserController::class)->group(function () {

Route::get('/register/seeker','createSeeker')->name('create.seeker')->middleware('CheckAuth');
Route::post('/register/seeker','storeSeeker')->name('store.seeker');
Route::get('/login','login')->name('login')->middleware('CheckAuth');
Route::post('/logout','logout')->name('logout');
Route::post('/login','postlogin')->name('login.post');


Route::get('/register/employee','createEmployee')->name('create.employee')->middleware('CheckAuth');
Route::post('/register/employee','storeEmployee')->name('store.employee');

Route::get('/user/profile','profile')->name('user.profile')->middleware('auth');
Route::post('/user/profile','update')->name('user.update.profile')->middleware('auth');
Route::post('/user/password','changePassword')->name('user.password')->middleware('auth');
Route::post('/upload/resume','resume')->name('upload.resume')->middleware('auth');


});
// ---------------------Dashboard Routes-------------------------------------------------

Route::controller(DashboardController::class)->middleware('auth')->group(function () {

    Route::get('/dashboard','index')->name('dashboard')->middleware(['verified','isPremiumUser']);
    Route::get('/verify','verify')->name('verification.notice');
    Route::get('/resend/verification/email','resend')->name('resend.email');
});


// ---------------------Subscription Routes-------------------------------------------------

Route::controller(SubscriptionController::class)->middleware(['auth','isEmployer','verified'])->group(function (){

   Route::get('subscribe' , 'index')->name('subscribe');
   Route::get('pay/weekly' , 'initiatePayment')->name('pay.weekly');
   Route::get('pay/monthly' , 'initiatePayment')->name('pay.monthly');
   Route::get('pay/yearly' , 'initiatePayment')->name('pay.yearly');
   Route::get('payment/success' , 'paymentSuccess')->name('payment.success');
   Route::get('payment/cancel' , 'cancel')->name('payment.cancel');
});

// ---------------------Post Jobs Routes-------------------------------------------------

Route::controller(PostJobController::class)->middleware(['auth','isEmployer','verified'])->group(function (){

    Route::get('job' , 'index')->name('job.index');
    Route::get('job/create' , 'create')->name('job.create');
    Route::post('job/store' , 'store')->name('job.store');
    Route::get('job/{listing}/edit' , 'edit')->name('job.edit');
    Route::put('job/{id}/edit' , 'update')->name('job.update');
    Route::delete('job/{id}/delete' , 'destroy')->name('job.delete');
});


// ---------------------Post Jobs Routes------------------------------------------------  -
Route::controller(ApplicantController::class)->middleware('isEmployer','verified')->group(function (){

    Route::get('applicants' , 'index')->name('applicant.index');
    Route::get('applicants/show/{listing:slug}' , 'show')->name('applicant.show');
    Route::post('shortlist/{listingId}/{userId}' , 'shortlist')->name('applicants.shortlist');
    Route::put('rejected/{listingId}/{userId}' , 'rejected')->name('applicants.rejected');



});

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/login');
})->middleware(['auth', 'signed'])->name('verification.verify');

