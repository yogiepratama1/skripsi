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
            if (in_array(auth()->user()->role, ['koordinator'])) {
                return redirect()->route('dashboard.permintaans.index');
            } elseif (in_array(auth()->user()->role, ['teknisi'])) {
                return redirect()->route('dashboard.penugasan-teknisi.index');
            } elseif (in_array(auth()->user()->role, ['quality_control', 'supervisor'])) {
                return redirect()->route('dashboard.persetujuan-work-order.index');
            } elseif (in_array(auth()->user()->role, ['general_manager'])) {
                return redirect()->route('dashboard.laporans.index');
            }

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
        $credentials['role'] = 'teknisi';
        User::create($credentials);

        return redirect()->route('dashboard.permintaans.index');
    }

    // Handle the logout request
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
