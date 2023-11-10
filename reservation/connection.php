<?php
//Koneksi ke database
$servername = "localhost"; //nama server
$username = "root"; //username database
$password = ""; //password database
$dbname = "starship_hotel"; //nama database

//Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

//Mengecek koneksi
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
