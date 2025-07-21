@extends('layout-admin.navbar')

@section('content')
<div>
    <h1>Edit Peminjaman</h1>

    <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama Peminjam</label>
            <input type="text" name="nama_peminjam" id="nama_peminjam" class="form-control" value="{{ $peminjaman->nama_peminjam }}" required>
        </div>

        <div class="form-group">
            <label for="buku_id">Buku</label>
            <select name="buku_id" id="buku_id" class="form-control" required>
                @foreach($buku as $buku)
                    <option value="{{ $buku->id }}" {{ $peminjaman->buku_id == $buku->id ? 'selected' : '' }}>{{ $buku->judul }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tanggal_pinjam">Tanggal Pinjam</label>
            <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control" value="{{ $peminjaman->tanggal_pinjam }}" required>
        </div>

        <div class="form-group">
            <label for="tanggal_kembali">Tanggal Kembali</label>
            <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control" value="{{ $peminjaman->tanggal_kembali }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
</div>
@endsection
