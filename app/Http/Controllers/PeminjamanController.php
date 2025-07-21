<?php
namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Buku;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        // Mengambil semua peminjaman beserta relasi ke buku
        $peminjaman = Peminjaman::with('buku')->get();
        return view('admin.peminjaman', compact('peminjaman'));
    }

    public function create()
    {
        // Mengambil data buku untuk form peminjaman
        $buku = Buku::all();
        return view('admin.CreatePeminjaman', compact('buku'));
    }

    public function store(Request $request)
    {
        // Validasi data yang masuk
        $request->validate([
            'nama_peminjam' => 'required|string', // Relasi dengan user
            'buku_id' => 'required|exists:bukus,id',  // Relasi dengan buku
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date',
        ]);
    
        // Menyimpan data peminjaman baru
        Peminjaman::create([
            'nama_peminjam' => $request->nama_peminjam,
            'buku_id' => $request->buku_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
        ]);
    
        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil ditambahkan');
    }
    

    public function edit($id)
    {
        // Mengambil data peminjaman dan buku untuk form edit
        $peminjaman = Peminjaman::findOrFail($id);
        $buku = Buku::all();
        return view('admin.EditPeminjaman', compact('peminjaman', 'buku'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang masuk
        $request->validate([
            'nama_peminjam' => 'required|string', // Relasi dengan user
            'buku_id' => 'required|exists:bukus,id',  // Relasi dengan buku
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date',
        ]);
    
        // Mengupdate data peminjaman
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update([
            'nama_peminjam' => $request->nama_peminjam,
            'buku_id' => $request->buku_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
        ]);
        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Menghapus data peminjaman
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();
        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil dihapus');
    }
}