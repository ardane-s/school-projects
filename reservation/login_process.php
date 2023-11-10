<?php
session_start();
require_once "connection.php";

if(isset($_POST["submit"])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $data['id'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['level'] = $data['level'];
        
        if ($data['level'] == 'admin') {
            header("Location: ./admin/dashboard.php");
        } else {
            header("Location: ./pages/index.php");
        }
        exit();
    } else {
            // Password tidak sama dengan yang disimpan di dalam database
            header("Location: login.php?error=wrongpwd");
            exit();
        }
    } else {
        // Jika username tidak ditemukan dalam database
        header("Location: login.php?error=nouser");
        exit();
    }

?>

