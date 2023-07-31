<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle the login request
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            // Authentication passed
            if (Auth::user()->role == 'finance') {
                return redirect()->route('dashboard.pembayarans.index');
            }
            if (Auth::user()->role == 'sales' || Auth::user()->role == 'gudang') {
                return redirect()->route('dashboard.permintaans.index');
            }
            
            return redirect()->route('dashboard.assets.index');
        } else {
            // Authentication failed
            return redirect()->route('login')->with('message', 'Invalid credentials');
        }
    }

    // Handle the logout request
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
