<?php

namespace App\Http\Controllers;

use App\Models\Formulir; // Gunakan model Formulir
use Illuminate\Http\Request;

class PengunjungController extends Controller
{
    // Tampilkan semua data pengunjung
    public function index()
    {
        $data = Formulir::all(); // Ambil semua data dari model Formulir
        return view('admin.pengunjung', compact('data'));
    }

    // Tampilkan form edit
    public function edit($id)
    {
        $pengunjung = Formulir::findOrFail($id); // Cari data berdasarkan ID di tabel Formulir
        return view('admin.EditPengunjung', compact('pengunjung'));
    }

    // Proses update data
    public function update(Request $request, $id)
    {
        $pengunjung = Formulir::findOrFail($id); // Cari data berdasarkan ID di tabel Formulir

        // Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            'alamat' => 'required|string',
            'pendidikan' => 'required|string',
            'reason' => 'required|string',
        ]);

        // Update data
        $pengunjung->update($request->all());

        return redirect()->route('pengunjung')->with('success', 'Data pengunjung berhasil diperbarui!');
    }

    // Hapus data
    public function destroy($id)
    {
        $pengunjung = Formulir::findOrFail($id); // Cari data berdasarkan ID di tabel Formulir
        $pengunjung->delete(); // Hapus data dari database

        return redirect()->route('pengunjung')->with('success', 'Data pengunjung berhasil dihapus!');
    }
}