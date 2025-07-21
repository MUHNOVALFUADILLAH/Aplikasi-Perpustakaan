<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input login
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Proses autentikasi
        $credentials = $request->only('email', 'password');

        // Jika kredensial benar, login pengguna
        if (Auth::attempt($credentials)) {
            // Regenerasi session setelah login berhasil
            $request->session()->regenerate();

            // Redirect ke halaman yang dimaksud (admin)
            return redirect()->intended('/admin');
        }

        // Jika login gagal
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke halaman login
        return redirect('/login');
    }
}