<?php 
    session_start();

    include('../../../koneksi.php');

    $id = $_GET['id'];
    $query_kelas = "SELECT * FROM kelas WHERE id_kelas='$id'";
    $result_kelas = mysqli_query($koneksi, $query_kelas);
    $data_kelas = mysqli_fetch_assoc($result_kelas);

    if (isset($_POST['submit'])) {
      $id = $_POST['id'];
      $nama_kelas = $_POST['nama_kelas'];
      $kompetensi_keahlian = $_POST['kompetensi_keahlian'];
    
      $query = "UPDATE kelas SET nama_kelas='$nama_kelas', kompetensi_keahlian='$kompetensi_keahlian' WHERE id_kelas='$id'";
      $result = mysqli_query($koneksi, $query);
  
    if ($result) {
      $_SESSION['success'] = "Data kelas berhasil diubah.";
      header('Location: ../../kelas.php');
    } else {
      $_SESSION['error'] = "Data kelas gagal diubah.";
      header('Location: ../../kelas.php?id=' . $id);
    }
  }

    include_once('header.php');

    if (!isset($_SESSION['username'])) {
    header("Location: ../../../../../login.php");
    exit;
}  
 ?>

    <section>
		<h2>Ubah Data Kelas</h2>
    <form method="POST">
      <input type="hidden" name="id" value="<?php echo $data_kelas['id_kelas']; ?>">
      <label for="nama_kelas">Nama Kelas:</label><br>
      <input type="text" name="nama_kelas" value="<?php echo $data_kelas['nama_kelas']; ?>" required><br><br>

      <label for="kompetensi_keahlian">Kompetensi Keahlian:</label><br>
      <input type="text" name="kompetensi_keahlian" value="<?php echo $data_kelas['kompetensi_keahlian']; ?>" required><br><br>

      <input type="submit" name="submit" value="Ubah">
      <a href="../../kelas.php"><button type="button">Batal</button></a>
    </form>
    </section>

<?php
    include_once('../../footer.php');
?>