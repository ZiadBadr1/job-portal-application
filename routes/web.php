<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
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

Route::controller(UserController::class)->group(function () {

Route::get('/register/seeker','createSeeker')->name('create.seeker');
Route::post('/register/seeker','storeSeeker')->name('store.seeker');
Route::get('/login','login')->name('login');
Route::get('/logout','logout')->name('logout');
Route::post('/login','postlogin')->name('login.post');


Route::get('/register/employee','createEmployee')->name('create.employee');
Route::post('/register/employee','storeEmployee')->name('store.employee');


});

Route::controller(DashboardController::class)->group(function () {

    Route::get('/dashboard','index')->name('dashboard')->middleware('auth','verified');
    Route::get('/verify','verify')->name('verification.notice')->middleware('auth');
    Route::get('/resend/verification/email','resend')->name('resend.email')->middleware('auth');
});


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/login');
})->middleware(['auth', 'signed'])->name('verification.verify');

