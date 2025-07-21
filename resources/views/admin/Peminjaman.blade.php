@extends('layout-admin.navbar')

@section('content')
<div class="container">
    <h2>Daftar Peminjaman Buku</h2>
    <a href="{{ route('peminjaman.create') }}" class="btn btn-primary mb-3">Pinjam Buku</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Peminjam</th>
                <th>Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($peminjaman as $index => $pinjam)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $pinjam->nama_peminjam }}</td>
                    <td>{{ $pinjam->buku->judul }}</td>
                    <td>{{ $pinjam->tanggal_pinjam }}</td>
                    <td>{{ $pinjam->tanggal_kembali }}</td>
                    <td>{{ $pinjam->status }}</td>
                    <td>
                        <a href="{{ route('peminjaman.edit', $pinjam->id) }}" class="btn btn-info btn-sm">
                            <i class="fa fa-edit"></i></a>

                        <form action="{{ route('peminjaman.destroy', $pinjam->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus peminjaman ini?')">
                                <i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
