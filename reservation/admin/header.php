<?php
session_start();
/* if (!isset($_SESSION['id'])) {
  header('Location: login.php');
  exit;
} */
?>

<!DOCTYPE html>
<html>
<head>
    <title>Starship Hotel Control</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@700&display=swap" rel="stylesheet">
	<style>
body {
			margin: 0;
			font-family: Arial, Helvetica, sans-serif;
            padding-top: 70px;
		}

        .topnav {
            overflow: hidden;
            background-color: #1b2735;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 70px;
            padding: 0 20px;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1;
            transition: background-color 0.3s ease-in-out;
        }

        .topnav a.logo {
            color: #fff;
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
            display: flex;
            align-items: center;
            margin-left: 20px;
            transition: color 0.3s ease-in-out;
        }

        .topnav a.logo:hover {
            color: #ffc275;
        }

        .topnav a.logo span {
            font-family: 'Exo 2', sans-serif;
            font-size: 24px;
            margin-left: 10px;
            position: relative;
        }

        .topnav a.logo span:hover::before,
        .topnav a.logo span:hover::after {
            content: "✦";
            transition: opacity 0.3s ease-in-out;
            opacity: 1;
            position: absolute;
            top: -1.5px;
            left: -27px;
        }

        .topnav a.logo span::before {
            margin-right: 5px;
        }

        .topnav a.logo span::after {
            margin-left: 5px;
        }

        .topnav a.logo span::before {
            content: attr(data-text);
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }

        .topnav a.logo:hover span::before {
            opacity: 1;
        }

        .topnav a.logo:hover span {
            color: #ffc275;
        }

        .topnav a.username,
        .footer p,
        .sidebar p {
            background: linear-gradient(-45deg, #ff9fbd, #ffbea5, #ffcda5, #ffd0b5, #b9b6d9, #d1b1f0, #b1e6ba, #b1e6f0, #ff9fb8, #ffbea5, #ffcda5, #ffd0b1, #b6b3d9, #d1adf0, #ade6b6, #ade6f0, #ff9fb3, #ffbea5, #ffcda0, #ffd0ad, #b2afd9, #d1a8f0, #a8e6b2, #a8e6f0, #ff9baa, #ffa486, #ffc28a, #fed193, #c7c5e6, #d2b9f9, #b0e6c1, #b4f4e8, #ff97a8, #ffaf7d, #ffb57f, #f8c083, #c7c5e6, #c8b8f9, #b7f2c5, #b8f6ee, #ff96a7, #ffa46e, #ffc275, #fac880, #c7c5e6, #c2b3f9, #a5f1b5, #a6f3ec);
            background-size: 400% 400%;
            animation: gradient 50s linear infinite;
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            text-fill-color: transparent;
        }

        @keyframes gradient {
            0% {
                background-position: 0%;
            }

            100% {
                background-position: 500%;
            }
        }

        .topnav a.navlinks,
        .topnav a.login,
        .topnav a.logout,
        .topnav a.username {
            font-family: 'Exo 2', sans-serif;
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            margin-left: 24px;
            transition: color 0.3s ease-in-out, border-bottom 0.3s ease-in-out;
            border-bottom: 2px solid transparent;
        }

        .topnav a.navlinks:hover,
        .topnav a.login:hover,
        .topnav a.logout:hover {
            color: #ffc275;
            border-bottom: 2px solid #ffc275;
        }

        .topnav a.logout:hover {
            color: #ff96a7;
        }

        .topnav a.logout:hover:before,
        .topnav a.logout:hover:after {
            color: #ff96a7;
        }

        .topnav a.logout:hover {
            border-bottom: 2px solid #ff96a7;
        }

        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            z-index: 1;
            top: 70px;
            left: 0;
            background-color: #0e2045;
            overflow-x: hidden;
        }

        .sidebar p {
            padding: 3px 6px 3px 6px;
            font-size: 15px;
            color: #fff;
            display: block;
            padding-left: 25px;
        }

        .sidebar a {
            padding: 10px 8px 10px 10px;
            text-decoration: none;
            font-size: 13px;
            color: #fff;
            display: block;
            padding-left: 40px;
            transition: background-color 0.3s ease-in-out;
        }

        .sidebar a:hover {
            background-color: #ffc275;
            color: #0e2045;
        }

        .footer p {
            margin-top: 230px;
            margin-right: 17px;
            text-align: center;
            font-size: 14px;
            color: #999;
        }
    </style>
</head>
<body>
    <div class="topnav">
		<a class="logo" href="../dashboard.php">   
			<span>Starship Hotel</span>
		</a>
		<div class="navlinks">
        <?php
            if (isset($_SESSION['username'])) { 
                echo '<a class="username">Selamat datang, ' . $_SESSION['username'] . '!</a>';
            }
        ?>
        <?php 
            if (isset($_SESSION['username'])) { 
                echo '<a class="logout" href="../logout.php" style="margin-right: 60px;">Logout</a>';
            }
        ?>
		</div>
	</div>

