<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view("auth/login");
    }


    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Autentikasi berhasil
            if (Auth::user()->role === 'Pemimpin Kelompok') {
                return redirect()->route('kelompok.dashboard');
            } elseif (Auth::user()->role === 'Pemimpin Apel') {
                return redirect()->route('apel.dashboard');
            } else {
                return redirect()->route('login');
            }
        } else {
            // Autentikasi gagal
            return redirect()->back()->with('error', 'Username atau password salah.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
