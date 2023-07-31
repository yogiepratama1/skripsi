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

    // Show the register form
    public function showRegisterForm()
    {
        // $posisis = [
        //     ['id' => 1, 'name' => 'user'],
        //     ['id' => 2, 'name' => 'karyawan_gudang'],
        // ];
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
            return redirect()->route('dashboard.permintaans.index');
        } else {
            // Authentication failed
            return redirect()->route('login')->with('message', 'Invalid credentials');
        }
    }

    public function register(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $credentials['password'] = bcrypt($credentials['password']);

        $user = User::create($credentials);
        $user->update(['role' => 'user']);

        return redirect()->route('dashboard.permintaans.index');
    }

    // Handle the logout request
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
