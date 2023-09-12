<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistartionFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function PHPUnit\Framework\isEmpty;

class UserController extends Controller
{
    const JOB_SEEKER = 'seeker';
    const JOB_POSTER = 'employer';

    public function create()
    {
        return view('user.register');
    }
    public function store(RegistartionFormRequest $request)
    {
        $user_trial = null;
        if($request->type =='employer')
        {
            $user_trial = now()->addWeek();
        }
        $user = User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'user_type' => $request->type,
                'user_trial' => $user_trial
            ]
        );
        Auth::login($user);
        $user->sendEmailVerificationNotification();
//        return response()->json('success');

        return redirect()->route('verification.notice')->with('successMessage','Your account was created');
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
            if(auth()->user()->email_verified_at==null)
            {
                return view('verified');
            }
            if(auth()->user()->user_type == 'employer') {
                return redirect()->to('dashboard');
            }
            else
            {
                return redirect()->to('/');
            }
        }
        return redirect()->back()->with('error' , 'Email or password not correct');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->to('/');
    }

    public function profile()
    {
        if(auth()->user()->user_type == 'employer') {
            return view('profile.index');
        }
        else
        {
            return view('seeker.profile');
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        if ($request->hasFile('profile_pic')) {
        $image = $request->file('profile_pic')->store('profile', 'public');
            User::findorFail(auth()->user()->id)->update(['profile_pic' => $image]);
        }
        User::findorFail(auth()->user()->id)->update($request->except('profile_pic'));
        return back()->with('success', 'Your profile has been updated');

    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed'
        ]);
        $user = auth()->user();
        if(!Hash::check($request->current_password,$user->password))
        {
            return back()->with('error', 'Current password is incorrect');
        }
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('success', 'Your password has been updated');

    }

    public function resume(Request $request)
    {
        $this->validate($request,[
            'resume' => 'required|mimes:pdf,doc,docx',
        ]);
        if ($request->hasFile('resume')) {
            $resume = $request->file('resume')->store('resume', 'public');
            User::findorFail(auth()->user()->id)->update(['resume' => $resume]);
            return back()->with('success', 'Your resume has been updated');
        }
        return back()->with('error', 'Your resume not updated');

    }

}
