<?php 
    session_start();

    include('../../../koneksi.php');

    $id = $_GET['id'];
    $query_spp = "SELECT * FROM spp WHERE id_spp='$id'";
    $result_spp = mysqli_query($koneksi, $query_spp);
    $data_spp = mysqli_fetch_assoc($result_spp);
    
    if (isset($_POST['submit'])) {
      $id = $_POST['id'];
      $tahun = $_POST['tahun'];
      $nominal = $_POST['nominal'];
    
      $query = "UPDATE spp SET tahun='$tahun', nominal='$nominal' WHERE id_spp='$id'";
      $result = mysqli_query($koneksi, $query);
  
    if ($result) {
      $_SESSION['success'] = "Data spp berhasil diubah.";
      header('Location: ../../spp.php');
    } else {
      $_SESSION['error'] = "Data spp gagal diubah.";
      header('Location: ../../spp.php?id=' . $id);
    }
  }

    include_once('header.php');

    if (!isset($_SESSION['username'])) {
    header("Location: ../../../../../login.php");
    exit;
}  
 ?>

    <section>
		<h2>Ubah Data SPP</h2>
    <form method="POST">
      <input type="hidden" name="id" value="<?php echo $data_spp['id_spp']; ?>">
      <label for="tahun">Tahun:</label><br>
      <input type="number" name="tahun" value="<?php echo $data_spp['tahun']; ?>" required><br><br>

      <label for="nominal">Nominal:</label><br>
      <input type="number" name="nominal" value="<?php echo $data_spp['nominal']; ?>" required><br><br>

      <input type="submit" name="submit" value="Ubah">
      <a href="../../spp.php"><button type="button">Batal</button></a>
    </form>
    </section>

<?php
    include_once('../../footer.php');
?>