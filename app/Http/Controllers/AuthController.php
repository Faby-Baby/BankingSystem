<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function create() {
        return view('login-form');
    }
    
    public function store(Request $request): RedirectResponse {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return redirect('/login')->with('error', 'Invalid credentials. Check the email address and password entered.');
        }


        if (auth()->user()->role === 'client') {
            // Redirect clients to the client dashboard
            return redirect()->route('client.dash')->with('success', 'Login successful');
        } elseif (auth()->user()->role === 'employee') {
            // Redirect employees to their dashboard or any other appropriate page
            return redirect()->route('employee.clients')->with('success', 'Login successful');
        } else {
            // Handle other roles or unexpected cases
            return redirect('/login')->with('error', 'Unknown role. Please contact support.');
        }
    }

    public function logout(Request $request) : RedirectResponse {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'User successfully logged out');
    }
}
