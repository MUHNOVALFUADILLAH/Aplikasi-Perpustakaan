@extends('layout-admin.navbar')

@section('content')
<div class="container">
    <h1>Edit Data Pengunjung</h1>

    <form action="{{ route('pengunjung.update', $pengunjung->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama Lengkap</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $pengunjung->name) }}" required>
            @error('name')<p style="color: red;">{{ $message }}</p>@enderror
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" id="alamat" name="alamat" class="form-control" value="{{ old('alamat', $pengunjung->alamat) }}" required>
            @error('alamat')<p style="color: red;">{{ $message }}</p>@enderror
        </div>

        <div class="form-group">
            <label for="pendidikan">Pendidikan</label>
            <input type="text" id="pendidikan" name="pendidikan" class="form-control" value="{{ old('pendidikan', $pengunjung->pendidikan) }}" required>
            @error('pendidikan')<p style="color: red;">{{ $message }}</p>@enderror
        </div>

        <div class="form-group">
            <label for="reason">Tujuan Kunjungan</label>
            <select id="reason" name="reason" class="form-control" required>
                <option value="">Pilih Tujuan</option>
                <option value="membaca" {{ old('reason', $pengunjung->reason) == 'membaca' ? 'selected' : '' }}>Membaca</option>
                <option value="meminjam" {{ old('reason', $pengunjung->reason) == 'meminjam' ? 'selected' : '' }}>Meminjam Buku</option>
                <option value="diskusi" {{ old('reason', $pengunjung->reason) == 'diskusi' ? 'selected' : '' }}>Diskusi</option>
                <option value="lainnya" {{ old('reason', $pengunjung->reason) == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
            @error('reason')<p style="color: red;">{{ $message }}</p>@enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
