<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.admin_login', [
            'title' => 'Admin Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:8',
            'is_admin' => 'required'
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard')->with('login', 'Welcome back, ');
        }

        return back()->with('failed', 'Failed To Login. Please Try Again!');
    }

    public function register()
    {
        return view('auth.admin_register', [
            'title' => 'Registration Page'
        ]);
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|min:8|max:50',
            'email' => 'required|email:dns|max:55|unique:users,email',
            'password' => 'required|min:8',
            'is_admin' => 'required'
        ]);
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return redirect('admin')->with('success', 'Registration Success!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin')->with('logout', "Anda Telah Logout. Terima Kasih!");
    }
}
