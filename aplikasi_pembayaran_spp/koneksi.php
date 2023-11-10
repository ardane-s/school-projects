<?php
// buat koneksi ke database
$dbhost = "localhost"; // ganti sesuai host Anda
$dbuser = "root"; // ganti sesuai username untuk akses ke database
$dbpass = ""; // ganti sesuai password untuk akses ke database
$dbname = "aplikasi_spp"; // ganti sesuai nama database yang digunakan

$koneksi = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
