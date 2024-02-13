<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
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
            if (Auth::user()->role == 'user' || Auth::user()->role == 'barista') {
                return redirect()->route('dashboard.variables.index');
            }
            return redirect()->route('dashboard.laporans.index');
        } else {
            // Authentication failed
            return redirect()->route('login')->with('message', 'Invalid credentials');
        }
    }

    // Handle the login request
    public function register(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            return redirect()->route('register')->with('message', 'Email already exists');
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'user'
        ]);

        Auth::attempt($request->only('email', 'password'));

        return redirect()->route('dashboard.permintaans.index');
    }

    // Handle the logout request
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
