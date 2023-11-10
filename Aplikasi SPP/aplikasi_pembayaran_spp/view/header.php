<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
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
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            grid-gap: 20px;
            justify-items: center;
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
        select {
            padding: 10px;
            margin-bottom: 15px;
            width: 300px;
            border-radius: 5px;
            border: none;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
        }

        button {
            padding: 10px;
            margin-top: 15px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        button[type="reset"] {
            margin-bottom: 100px;
        }

        button:hover {
            background-color: #2e8b57;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 1200px;
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
        <h1><a href="index.php">Aplikasi SPP</a></h1>
        <nav>
            <ul class="nav-links">
                <li><a href="riwayat.php">Riwayat</a></li>
                <?php if($_SESSION['level'] == 'petugas'){ ?>
                <li><a href="pembayaran.php">Pembayaran</a></li>
				<?php } ?>
            <li><a href="../logout.php">Logout</a></li>
        </ul>
    </nav>
</header>