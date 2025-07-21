<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormulirController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\DashboardController;



// Rute autentikasi
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rute untuk halaman admin (dilindungi middleware 'auth')
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard');




    // Rute user di dalam grup admin
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/admin/users/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/admin/users/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/admin/users/{id}/update', [UserController::class, 'update'])->name('user.update');
    Route::post('/admin/users/{id}/delete', [UserController::class, 'destroy'])->name('user.destroy');


    // pengunjung
    Route::get('/pengunjung', [PengunjungController::class, 'index'])->name('pengunjung');
    Route::get('/pengunjung/edit/{id}', [PengunjungController::class, 'edit'])->name('pengunjung.edit');
    Route::post('/pengunjung/update/{id}', [PengunjungController::class, 'update'])->name('pengunjung.update');
    Route::post('/pengunjung/destroy/{id}', [PengunjungController::class, 'destroy'])->name('pengunjung.destroy');


    //Data Buku
    Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
    Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
    Route::post('/buku/store', [BukuController::class, 'store'])->name('buku.store');
    Route::get('/buku/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');
    Route::post('/buku/update/{id}', [BukuController::class, 'update'])->name('buku.update');
    Route::post('/buku/destroy/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');

    // peminjaman
    Route::get('peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
    Route::get('peminjaman/create', [PeminjamanController::class, 'create'])->name('peminjaman.create');
    Route::post('peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');
    Route::get('peminjaman/{id}/edit', [PeminjamanController::class, 'edit'])->name('peminjaman.edit');
    Route::post('peminjaman/{id}/update', [PeminjamanController::class, 'update'])->name('peminjaman.update');
    Route::delete('peminjaman/{id}/delete', [PeminjamanController::class, 'destroy'])->name('peminjaman.destroy');
    Route::get('peminjaman/{id}/return', [PeminjamanController::class, 'return'])->name('peminjaman.return');
    Route::post('peminjaman/{id}/update-return', [PeminjamanController::class, 'updateReturn'])->name('peminjaman.updateReturn');

});

// Rute untuk user (formulir)
Route::get('/', [FormulirController::class, 'index'])->name('formulir');
Route::post('/data/formulir', [FormulirController::class, 'store'])->name('data.formulir');