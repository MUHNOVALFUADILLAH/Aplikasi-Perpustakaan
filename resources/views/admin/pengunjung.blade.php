@extends('layout-admin.navbar')

@section('content')

<div>
    <div class="container">
        <h1>Daftar Pengunjung</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Lengkap</th>
                    <th>Alamat</th>
                    <th>Pendidikan</th>
                    <th>Tujuan Kunjungan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $key => $item)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->pendidikan }}</td>
                        <td>{{ $item->reason }}</td>
                        <td>
                            <!-- Tombol Edit -->
                            <a href="{{ route('pengunjung.edit', $item->id) }}" class="btn btn-info btn-sm">
                                <i class="fa fa-edit"></i> Edit
                            </a>

                            <!-- Form Hapus -->
                            <form action="{{ route('pengunjung.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pengunjung ini?')">
                                    <i class="fa fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
