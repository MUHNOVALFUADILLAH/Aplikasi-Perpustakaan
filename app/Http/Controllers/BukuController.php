<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    // Menampilkan daftar buku
    public function index()
    {
        $bukus = Buku::all(); // Ambil semua data buku
        return view('admin.buku', compact('bukus'));
    }

    // Menampilkan form untuk tambah buku
    public function create()
    {
        return view('admin.CreateBuku');
    }

    // Menyimpan data buku baru
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'judul' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer',
            'deskripsi' => 'required|string',
        ]);

        // Simpan data buku
        Buku::create($request->all());

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    // Menampilkan form untuk edit buku
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('admin.EditBuku', compact('buku'));
    }

    // Proses update data buku
    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);

        // Validasi data
        $request->validate([
            'judul' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer',
            'deskripsi' => 'required|string',
        ]);

        // Update data buku
        $buku->update($request->all());

        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui!');
    }

    // Menghapus data buku
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus!');
    }
}