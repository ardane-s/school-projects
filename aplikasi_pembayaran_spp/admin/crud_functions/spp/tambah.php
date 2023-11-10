<?php 
    session_start();

    include('../../../koneksi.php');

    if (isset($_POST['submit'])) {
      $tahun = $_POST['tahun'];
      $nominal = $_POST['nominal'];
    
      $query = "INSERT INTO spp (tahun, nominal) VALUES ('$tahun', '$nominal')";
      $result = mysqli_query($koneksi, $query);

  if ($result) {
    $_SESSION['success'] = "Data spp berhasil ditambahkan.";
    header('Location: ../../spp.php');
  } else {
    $_SESSION['error'] = "Data spp gagal ditambahkan.";
    header('Location: ../../spp.php');
  }
}

  include_once('header.php');

  if (!isset($_SESSION['username'])) {
  header("Location: ../../../../../login.php");
  exit;
  }
 ?>

    <section>
		<h2>Tambah Data SPP</h2>
    <form method="POST">
      <label for="tahun">Tahun:</label><br>
      <input type="text" name="tahun" placeholder="Masukkan tahun!"required><br><br>
      <label for="nominal">Nominal:</label><br>
      <input type="text" name="nominal" placeholder="Masukkan nominal!" required><br><br>
      <input type="submit" name="submit" value="Tambah">
      <a href="../../spp.php"><button type="button">Batal</button></a>
    </form>
  </section>

<?php
    include_once('footer.php');
?>