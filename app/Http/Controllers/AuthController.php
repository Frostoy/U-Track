<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister() 
    {
        return view('auth.register');
    }

    public function register(Request $request) {
        // Validate input
        $request->validate([
            'username' => 'required|string|unique:users',
            'password' => 'required|max:255',
            'email' => 'required|email|unique:users',
        ]);

        // Create user
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
    }

    public function showLogin() {
        return view('auth.login');
    }

    public function login(Request $request) {        
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($request->only(['email','password']))){
            //Generate new session
            $request->session()->regenerate();
            //Redirect user to dashboard
            return redirect()->route('dashboard')->with('success','Login successful.');
        };

        // Authentication failed, redirect back with error
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        // Delete login status
        Auth::logout();
        // Delete session
        $request->session()->invalidate();
        // Generate new CSRF token
        $request->session()->regenerateToken();
        // Redirect user back to login page
        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }
}
