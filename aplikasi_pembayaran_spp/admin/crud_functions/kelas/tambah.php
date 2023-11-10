<?php 
    session_start();

    include('../../../koneksi.php');

if (isset($_POST['submit'])) {
  $nama_kelas = $_POST['nama_kelas'];
  $kompetensi_keahlian = $_POST['kompetensi_keahlian'];

  $query = "INSERT INTO kelas (nama_kelas, kompetensi_keahlian) VALUES ('$nama_kelas', '$kompetensi_keahlian')";
  $result = mysqli_query($koneksi, $query);

  if ($result) {
    $_SESSION['success'] = "Data kelas berhasil ditambahkan.";
    header('Location: ../../kelas.php');
  } else {
    $_SESSION['error'] = "Data kelas gagal ditambahkan.";
    header('Location: ../../kelas.php');
  }
}

  include_once('header.php');

  if (!isset($_SESSION['username'])) {
  header("Location: ../../../../../login.php");
  exit;
  }
 ?>

    <section>
		<h2>Tambah Data Kelas</h2>
    <form method="POST">
      <label for="nama_kelas">Nama Kelas:</label><br>
      <input type="text" name="nama_kelas" placeholder="Masukkan nama kelas!"required><br><br>
      <label for="kompetensi_keahlian">Kompetensi Keahlian:</label><br>
      <input type="text" name="kompetensi_keahlian" placeholder="Masukkan kompetensi keahlian!"required><br><br>
      <input type="submit" name="submit" value="Tambah">
      <a href="../../kelas.php"><button type="button">Batal</button></a>
    </form>
  </section>

<?php
    include_once('footer.php');
?>