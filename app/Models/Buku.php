<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'bukus';

    protected $fillable = [
        'judul',
        'pengarang',
        'tahun_terbit',
        'deskripsi',
    ];

    // Relasi ke peminjaman (Satu buku bisa memiliki banyak peminjaman)
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
}