<?php

namespace App\Http\Controllers;
use App\Http\Requests\RegistartionFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    const JOB_SEEKER = 'seeker';
    const JOB_POSTER = 'employer';
    public function createSeeker()
    {
        return view('user.seeker-register');
    }
    public function createEmployee()
    {
        return view('user.employer-register');
    }

    public function storeSeeker(RegistartionFormRequest $request)
    {
        User::create(
            [
                'name' => $request->name ,
                'email' => $request->email ,
                'password' => $request->password ,
                'user_type' => self::JOB_SEEKER
            ]
        );
        return redirect()->route('login')->with('successMessage','Your account was created');
    }

    public function storeEmployee(RegistartionFormRequest $request)
    {
        User::create(
            [
                'name' => $request->name ,
                'email' => $request->email ,
                'password' => $request->password ,
                'user_type' => self::JOB_POSTER ,
                'user_trial' => now()->addWeek(),
            ]
        );
        return redirect()->route('login')->with('successMessage','Your account was created');
    }
    public function login()
    {
        return view('user.login');
    }
    public function postlogin(Request $request)
    {
        $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }
        return 'Wrong Email or Password !';
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
