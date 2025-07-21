<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Masuk Perpustakaan</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    :root {
        --bg-btn: #013f79;
    }
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: var(--bg-btn);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      overflow: hidden;
      padding: 20px;
    }

    .container {
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
      width: 90%;
      max-width: 900px;
      display: flex;
      flex-wrap: wrap;
      overflow: hidden;
    }

    .form-section {
      flex: 1;
      padding: 40px 30px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .form-section h2 {
      font-size: 28px;
      margin-bottom: 10px;
      color: #333;
      text-transform: uppercase;
    }

    .form-section p {
      margin-bottom: 20px;
      font-size: 14px;
      color: #666;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      font-size: 14px;
      font-weight: 500;
      margin-bottom: 5px;
      display: block;
      color: #555;
    }

    .form-group input,
    .form-group select {
      width: 100%;
      padding: 12px;
      border: 1px solid #ddd;
      border-radius: 8px;
      font-size: 14px;
      outline: none;
      transition: 0.3s;
    }

    .form-group input:focus,
    .form-group select:focus {
      border-color: #fda085;
      box-shadow: 0 0 8px rgba(253, 160, 133, 0.3);
    }

    .form-btn {
      background: var(--bg-btn);
      color: #fff;
      border: none;
      padding: 12px 20px;
      border-radius: 8px;
      cursor: pointer;
      font-size: 16px;
      font-weight: 600;
      transition: background 0.3s;
    }

    .form-btn:hover {
      background: #021f40;
    }

    .image-section {
      flex: 1;
      background: url('https://source.unsplash.com/800x600/?library,books') no-repeat center;
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
      min-height: 300px;
    }

    .image-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.4);
      border-top-right-radius: 15px;
      border-bottom-right-radius: 15px;
    }

    .image-section h3 {
      z-index: 1;
      color: #fff;
      font-size: 26px;
      font-weight: 600;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
      text-align: center;
    }

    /* Responsiveness */
    @media (max-width: 768px) {
      .container {
        flex-direction: column;
      }

      .image-section {
        order: -1;
        min-height: 200px;
        border-radius: 15px 15px 0 0;
      }

      .image-overlay {
        border-radius: 15px 15px 0 0;
      }

      .form-section h2 {
        font-size: 22px;
      }

      .form-btn {
        font-size: 14px;
        padding: 10px 16px;
      }
    }

    @media (max-width: 480px) {
      .form-section {
        padding: 20px 15px;
      }

      .form-section h2 {
        font-size: 20px;
      }

      .form-group input,
      .form-group select {
        padding: 10px;
        font-size: 12px;
      }

      .form-btn {
        padding: 8px 14px;
      }
    }
  </style>

</head>
<body>
    <<div class="container">
        <div class="form-section">
            <h2>Masuk Perpustakaan</h2>
            <p>Isi formulir ini untuk menikmati fasilitas perpustakaan kami</p>

            <!-- SweetAlert Success -->
            @if(session('success'))
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: '{{ session('success') }}',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    });
                </script>
            @endif

            <!-- SweetAlert Error -->
            @if($errors->any())
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Ada kesalahan dalam formulir Anda. Mohon periksa kembali.',
                        confirmButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    });
                </script>
            @endif

            <form action="{{ route('data.formulir') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" id="name" name="name" placeholder="Masukkan nama Anda" required value="{{ old('name') }}">
                    @error('name')<p style="color: red;">{{ $message }}</p>@enderror
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" id="alamat" name="alamat" placeholder="Masukkan Alamat Anda" required value="{{ old('alamat') }}">
                    @error('alamat')<p style="color: red;">{{ $message }}</p>@enderror
                </div>

                <div class="form-group">
                    <label for="pendidikan">Pendidikan</label>
                    <input type="text" id="pendidikan" name="pendidikan" placeholder="Masukkan Pendidikan Anda" required value="{{ old('pendidikan') }}">
                    @error('pendidikan')<p style="color: red;">{{ $message }}</p>@enderror
                </div>

                <div class="form-group">
                    <label for="reason">Tujuan Kunjungan</label>
                    <select id="reason" name="reason" required>
                        <option value="">Pilih Tujuan</option>
                        <option value="membaca" {{ old('reason') == 'membaca' ? 'selected' : '' }}>Membaca</option>
                        <option value="meminjam" {{ old('reason') == 'meminjam' ? 'selected' : '' }}>Meminjam Buku</option>
                        <option value="diskusi" {{ old('reason') == 'diskusi' ? 'selected' : '' }}>Diskusi</option>
                        <option value="lainnya" {{ old('reason') == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                    @error('reason')<p style="color: red;">{{ $message }}</p>@enderror
                </div>

                <button type="submit" class="form-btn">Kirim</button>
            </form>
        </div>

        <div class="image-section">
            <div class="image-overlay"></div>
            <h3>📚 Selamat Datang di Perpustakaan</h3>
        </div>
    </div>
</body>
</html>
