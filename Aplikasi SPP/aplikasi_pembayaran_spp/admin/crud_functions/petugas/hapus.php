<?php 
    session_start();

include('../../../koneksi.php');

$id = $_GET['id'];

$query_petugas = "SELECT * FROM petugas WHERE id_petugas='$id'";
$result_petugas = mysqli_query($koneksi, $query_petugas);
$data_petugas = mysqli_fetch_assoc($result_petugas);

if (isset($_POST['submit'])) {
  $query = "DELETE FROM petugas WHERE id_petugas='$id'";
  $result = mysqli_query($koneksi, $query);

  if ($result) {
    $_SESSION['success'] = "Data petugas berhasil dihapus.";
    header('Location: ../../petugas.php');
  } else {
    $_SESSION['error'] = "Data petugas gagal dihapus.";
    header('Location: ../../petugas.php?id=' . $id);
  }
}

include_once('header.php');

if (!isset($_SESSION['username'])) {
header("Location: ../../../../../login.php");
exit;
}
 ?>

    <section>
		<h2>Hapus Data Petugas</h2>
		<form method="POST">
			<input type="hidden" name="id" value="<?php echo $data_petugas['id_petugas']; ?>">
			<label for="username">Username:</label><br>
			<input type="text" name="username" value="<?php echo $data_petugas['username']; ?>" disabled><br><br>

			<label for="password">Password:</label><br>
			<input type="password" name="password" value="********" disabled><br><br>

			<label for="nama_petugas">Nama Petugas:</label><br>
			<input type="text" name="nama_petugas" value="<?php echo $data_petugas['nama_petugas']; ?>" disabled><br><br>

			<label for="level">Level:</label><br>
			<input type="text" name="level" value="<?php echo $data_petugas['level']; ?>" disabled><br><br>

      <input type="submit" name="submit" value="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
      <a href="../../petugas.php"><button type="button">Batal</button></a>
      </form>
    </section>

<?php
    include_once('../../footer.php');
?>