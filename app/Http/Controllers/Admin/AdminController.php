<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Constructor to apply middleware to all methods
    public function __construct()
    {
        //DFASDF
    }

    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return view('admin.pages.dashboard');
    }

    public function login()
    {
        return view('admin.pages.signin');
    }

    public function login_check(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('admin.index')); // Use the correct route name for redirection
        }
        return redirect()->back()->withErrors(['email' => 'The provided credentials do not match our records.'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login'); 
    }

    public function contact_us()
    {
        return view('admin.pages.contact_us');
    }
}
