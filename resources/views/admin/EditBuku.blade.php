@extends('layout-admin.navbar')

@section('content')
<div class="container">
    <h1>Edit Buku</h1>

    <form action="{{ route('buku.update', $buku->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="judul">Judul Buku</label>
            <input type="text" id="judul" name="judul" class="form-control" value="{{ $buku->judul }}" required>
        </div>

        <div class="form-group">
            <label for="pengarang">Pengarang</label>
            <input type="text" id="pengarang" name="pengarang" class="form-control" value="{{ $buku->pengarang }}" required>
        </div>

        <div class="form-group">
            <label for="tahun_terbit">Tahun Terbit</label>
            <input type="number" id="tahun_terbit" name="tahun_terbit" class="form-control" value="{{ $buku->tahun_terbit }}" required>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" class="form-control" rows="4" required>{{ $buku->deskripsi }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection