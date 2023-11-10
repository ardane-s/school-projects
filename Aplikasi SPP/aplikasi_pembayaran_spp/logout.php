<?php
session_start();

//hapus semua data session
session_unset();
//hancurkan session
session_destroy();

//redirect ke halaman login setelah logout
header("Location: login.php");
//pastikan tidak ada baris kode ekstra yang ikut tereksekusi setelah header redirect
exit();
?>
