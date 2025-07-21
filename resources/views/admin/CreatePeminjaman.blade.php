@extends('layout-admin.navbar')

@section('content')
<div class="container">
    <h2>Form Peminjaman Buku</h2>

    <form action="{{ route('peminjaman.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nama Peminjam</label>
            <input type="text" name="nama_peminjam" id="nama_peminjam" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="buku_id">Buku</label>
            <select name="buku_id" id="buku_id" class="form-control" required>
                @foreach($buku as $buku)
                    <option value="{{ $buku->id }}">{{ $buku->judul }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tanggal_pinjam">Tanggal Pinjam</label>
            <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="tanggal_kembali">Tanggal Kembali</label>
            <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Pinjam</button>
    </form>
</div>
@endsection
