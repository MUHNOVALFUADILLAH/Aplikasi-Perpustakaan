@extends('layout-admin.navbar')

@section('content')
<div class="container">
    <h1>Daftar Buku</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('buku.create') }}" class="btn btn-primary mb-3">Tambah Buku</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Tahun Terbit</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bukus as $key => $buku)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $buku->judul }}</td>
                    <td>{{ $buku->pengarang }}</td>
                    <td>{{ $buku->tahun_terbit }}</td>
                    <td>{{ $buku->deskripsi }}</td>
                    <td>
                        <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-info btn-sm">
                            <i class="fa fa-edit"></i></a>

                        <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                                <i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection