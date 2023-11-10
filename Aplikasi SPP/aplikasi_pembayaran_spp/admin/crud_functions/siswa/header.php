<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi SPP</title>
    <style>
          * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: sans-serif;
            max-width: 100%;
            overflow-x: hidden;
        }

        header {
            background-color: #28A745;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            width: 100%;
            top: 0;
        }

        h1 a {
            color: white;
            text-decoration: none;
            font-size: 25px;
            transition: color 200ms ease-in-out;
            color: white;
            margin-left: 30px;
        }

        h1 a:hover {
            color: #D75B28;
        }

        h2 {
            margin-top: 80px;
        }

        .nav-links {
            list-style-type: none;
            margin: 10px;
            padding: 1px;
            display: flex;
            align-items: center;
            font-size: 17px;
        }

        .nav-links li {
            margin-right: 30px;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            transition: color 200ms ease-in-out;
            color: white;
        }

        .nav-links a:hover {
            color: #D75B28;
        }

        @media (max-width: 768px) {
            header {
            flex-direction: column;
            }
            .nav-links {
            margin-top: 20px;
            flex-direction: column;
            align-items: center;
            }
            .nav-links li {
            margin: 10px 0;
            }
        }

        .welcome {
            text-align: center;
            margin-top: 100px;
            font-size: 30px;
            color: #333;
        }

        section {
            display: grid;
            place-items: center;
            height: calc(100vh - 70px);
        }
        .welcome {
            font-size: 30px;
            color: #333;
        }
        .card-wrapper {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }
        .card {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 3px 3px rgba(0, 0, 0, 0.1);
            text-align: center;
            cursor: pointer;
            transition: transform 0.2s;
            max-width: 300px;
        }
        .card h3 {
            color: #333;
        }
        .card:hover {
            transform: translateY(-10px);
        }

        footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #28A745;
            color: white;
            text-align: center;
            padding: 7px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 50px;
        }

        label {
            font-weight: bold;
        }

        input[type="date"],
        input[type="number"],
        input[type="text"],
        input[type="password"],
        textarea,
        select {
            padding: 10px;
            margin-bottom: 15px;
            width: 300px;
            border-radius: 5px;
            border: none;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
        }

        button,
        input[type="submit"] {
            padding: 10px;
            margin-top: 15px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        button[type="reset"],
        button[type="button"] {
            margin-bottom: 100px;
        }

        button:hover {
            background-color: #2e8b57;
        }

        form {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            padding: 30px;
            max-width: 1000px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            animation: fade-in 1s ease-out;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 50px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 1500px;
            margin: 0 auto;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        td:last-child {
            text-align: center;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>
    <header>
        <h1><a href="../../dashboard.php">Aplikasi SPP</a></h1>
        <nav>
            <ul class="nav-links">
                <li><a href="../../siswa.php">Siswa</a></li>
                <li><a href="../../petugas.php">Petugas</a></li>
                <li><a href="../../kelas.php">Kelas</a></li>
                <li><a href="../../spp.php">SPP</a></li>
                <li><a href="../../riwayat.php">Riwayat</a></li>
                <li><a href="../../pembayaran.php">Pembayaran</a></li>
            <li><a href="../../../logout.php">Logout</a></li>
        </ul>
    </nav>
</header>