@extends('layout-admin.navbar')


@section('content')
<div class="container">
    <h2>Pengembalian Buku</h2>

    <form action="{{ route('peminjaman.updateReturn', $peminjaman->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="tanggal_kembali">Tanggal Kembali</label>
            <input type="date" id="tanggal_kembali" name="tanggal_kembali" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success mt-3">Kembalikan</button>
    </form>
</div>
@endsection