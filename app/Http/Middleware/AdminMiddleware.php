<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah pengguna sudah login
        if (!Auth::check()) {
            // Jika belum login, redirect ke halaman login
            return redirect('/login');
        }

        // Jika sudah login, lanjutkan request
        return $next($request);
    }
}