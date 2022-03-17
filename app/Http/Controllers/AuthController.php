<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login', [
            'title' => 'Login Page'
        ]);
    }

    public function authenticate(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:8'
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with('login', 'Welcome back, ');
        }

        return back()->with('failed', 'Failed To Login. Please Try Again!');
    }

    // public function register()
    // {
    //     return view('auth.register', [
    //         'title' => 'Registration Page'
    //     ]);
    // }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:8|max:50',
            'email' => 'required|email:dns|max:55',
            'password' => 'required|min:8'
        ]);

        $data['password'] = bcrypt($data['password']);

        User::create($data);
        return back()->with('success', 'Registration Success!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('logout', "You've been logged out. Thank you!");
    }
}
