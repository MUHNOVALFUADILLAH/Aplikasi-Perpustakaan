<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_peminjam',
        'buku_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',
    ];

    // Relasi ke Buku
    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
}