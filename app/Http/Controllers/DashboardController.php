<?php

namespace App\Http\Controllers;

use App\Models\Formulir;
use App\Models\Peminjaman; // Perbaikan huruf kapital "App"
use App\Models\Buku;
use App\Models\User;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung jumlah data di setiap model
        $pengunjung = Formulir::count();
        $peminjaman = Peminjaman::count();
        $buku = Buku::count();
        $user = User::count();

        // Kirim data ke view
        return view('admin.dashboard', compact('pengunjung', 'peminjaman', 'buku', 'user'));
    }
}