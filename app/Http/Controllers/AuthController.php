<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function signUp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'max:50',
            'email' => 'max:100',
            'password' => 'min:8',
            'confirm_password' => 'required_with:password|same:password'
        ], $this->messages());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $user = User::all()->firstWhere('email', $request->email);
        if ($user != null) {
            return redirect('/register')->with('error_message', 'Bu user artıq mövcuddur');
        }
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        return redirect('/admin');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function signIn(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'max:50',
            'password' => 'min:8'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $user = User::all()->firstWhere('email', $request->email);
        if ($user == null) {
            return redirect()->back()->with('error_message', 'Bu email mövcud deyil');
        }
        if (Auth::attempt(['email' => $user->email, 'password' => $request->password])) {
            return redirect('/admin');
        } else {
            return redirect()->back()->with('error_message', 'Email və ya parol yanlışdır');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }


    private function messages()
    {
        return [
            'username.required' => 'Zəhmət olmasa,username-i daxil edin',
            'email.required' => 'Zəhmət olmasa,emailinizi daxil edin',
            'password.required' => 'Zəhmət olmasa,parolunuzu daxil edin',
            'username.max' => 'Adınızın uzunluğu 50 simvoldan çox olmamalıdır',
            'email.max' => 'Emailinizin uzunluğu 50 simvoldan çox olmamalıdır',
            'password.min' => 'Parolunuzun uzunluğu 8 simvoldan az olmamalıdır',
            'repeat.required_with' => 'Zəhmət olmasa, parolunuzu doğrulayın',
            'repeat.required' => 'Zəhmət olmasa, parolunuzu doğrulayın'
        ];
    }
}
