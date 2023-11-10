<?php
session_start();
require_once "koneksi.php";

// cek apakah tombol submit sudah di klik atau belum
if (isset($_POST['submit'])) {

    // ambil nilai dari inputan form
    $username = mysqli_real_escape_string($koneksi, $_POST['username']); // untuk mendeteksi karakter aneh dalam sebuah string
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    // buat query untuk mencari data petugas dengan username dan password yang sesuai
    $sql = "SELECT * FROM petugas WHERE username='$username' AND password='$password'";

    // jalankan query
    $result = mysqli_query($koneksi, $sql);

    // cek apakah query menghasilkan baris data atau tidak
    if (mysqli_num_rows($result) == 1) {
        // jika data ditemukan, simpan data ke session dan redirect ke halaman dashboard
        $data = mysqli_fetch_assoc($result);
        $_SESSION['id_petugas'] = $data['id_petugas'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['level'] = $data['level']; //simpan juga level sebagai penanda hak akses
        
        if ($data['level'] == 'admin') {
            header("Location: ./admin/dashboard.php");
        } else {
            header("Location: ./view/index.php");
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