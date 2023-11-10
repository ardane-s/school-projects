<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Aplikasi Pembayaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 0;
            position: relative;
        }

        form {
            max-width: 400px;
            margin: 50px auto;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            animation: fade-in 1s ease-out;
        }

        @keyframes fade-in {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            background: linear-gradient(45deg, #f00, #ff0, #0f0, #0ff, #00f, #f0f, #f00);
            background-size: 500%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: rainbow 10s linear infinite;
        }

        @keyframes rainbow {
            0% {
                background-position: 0%;
            }

            100% {
                background-position: 500%;
            }
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            border-radius: 5px;
            border: 1px solid #ccc;
            padding: 8px;
            box-sizing: border-box;
            margin-bottom: 20px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        input[type="submit"]:hover {
            background-color: #3e8e41;
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }

        @media screen and (max-width: 500px) {
            form {
                max-width: 90%;
                margin: 50px auto;
            }
        }

        p.copy {
            position: absolute;
            bottom: 10px;
            width: 100%;
            text-align: center;
            font-size: 12px;
            color: grey;
        }
    </style>
</head>

<body>
    <form action="proses_login.php" method="POST">
        <h2>Login Aplikasi SPP</h2>
        <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == 'emptyfields') {
                    echo '<p class="error">Silahkan isi semua kolom yang tersedia!</p>';
                } elseif ($_GET['error'] == 'wrongpwd') {
                    echo '<p class="error">Password yang dimasukkan salah!</p>';
                } elseif ($_GET['error'] == 'nouser') {
                    echo '<p class="error">Username tidak ditemukan!</p>';
                }
            }
        ?>
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Masukkan username Anda" required autofocus>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Masukkan password Anda" required>
        <input type="submit" name="submit" value="Login">
    </form>
    <p class="copy">INAS &copy; 2023 - PRA UK</p>
</body>

</html>
