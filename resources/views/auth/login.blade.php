<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* Gaya untuk seluruh halaman */
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(120deg, #3498db, #8e44ad);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #333;
        }

        /* Container form */
        .login-container {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 30px;
            width: 100%;
            max-width: 400px;
        }

        /* Judul */
        .login-container h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
            color: #34495e;
        }

        /* Label */
        .login-container label {
            font-size: 14px;
            margin-bottom: 5px;
            display: block;
        }

        /* Input */
        .login-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            outline: none;
            transition: border-color 0.3s ease;
        }

        .login-container input:focus {
            border-color: #3498db;
        }

        /* Tombol */
        .login-container button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #3498db;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-container button:hover {
            background-color: #2980b9;
        }

        /* Pesan error */
        .login-container .error {
            color: #e74c3c;
            font-size: 14px;
            margin-top: -15px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Masukkan email" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        @if ($errors->any())
            <div class="error">
                <p>{{ $errors->first() }}</p>
            </div>
        @endif
    </div>
</body>
</html>
