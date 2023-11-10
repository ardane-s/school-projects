<?php 
    session_start();

    include('../../../koneksi.php');

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $nama_petugas = $_POST['nama_petugas'];
  $level = $_POST['level'];

  $query = "INSERT INTO petugas (username, password, nama_petugas, level) VALUES ('$username', '$password', '$nama_petugas', '$level')";
  $result = mysqli_query($koneksi, $query);

  if ($result) {
    $_SESSION['success'] = "Data petugas berhasil ditambahkan.";
    header('Location: ../../petugas.php');
  } else {
    $_SESSION['error'] = "Data petugas gagal ditambahkan.";
    header('Location: ../../petugas.php');
  }
}

  include_once('header.php');

  if (!isset($_SESSION['username'])) {
  header("Location: ../../../../../login.php");
  exit;
  }
 ?>

    <section>
		<h2>Tambah Data Petugas</h2>
    <form method="POST">
      <label for="username">Username:</label><br>
      <input type="text" name="username" placeholder="Masukkan username!" required><br><br>
      <label for="password">Password:</label><br>
      <input type="password" name="password" placeholder="Masukkan password!" required><br><br>
      <label for="nama_petugas">Nama Petugas:</label><br>
      <input type="text" name="nama_petugas" placeholder="Masukkan nama petugas!" required><br><br>
      <label for="level">Level:</label><br>
      <select name="level" required>
        <option value="">-- Pilih Level --</option>
        <option value="admin">Admin</option>
        <option value="petugas">Petugas</option>
        <option value="siswa">Siswa</option>
      </select><br><br>
      <input type="submit" name="submit" value="Tambah">
      <a href="../../petugas.php"><button type="button">Batal</button></a>
    </form>
  </section>

<?php
    include_once('footer.php');
?>