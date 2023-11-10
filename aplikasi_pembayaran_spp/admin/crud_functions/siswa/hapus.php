<?php 
    session_start();

include('../../../koneksi.php');

$id = $_GET['id'];

$query_siswa = "SELECT * FROM siswa WHERE nisn='$id'";
$result_siswa = mysqli_query($koneksi, $query_siswa);
$data_siswa = mysqli_fetch_assoc($result_siswa);

if (isset($_POST['submit'])) {
  $query = "DELETE FROM siswa WHERE nisn='$id'";
  $result = mysqli_query($koneksi, $query);

  if ($result) {
    $_SESSION['success'] = "Data siswa berhasil dihapus.";
    header('Location: ../../siswa.php');
  } else {
    $_SESSION['error'] = "Data siswa gagal dihapus.";
    header('Location: ../../siswa.php?id=' . $id);
  }
}

include_once('header.php');

if (!isset($_SESSION['username'])) {
header("Location: ../../../../../login.php");
exit;
}
 ?>

    <section>
		<h2>Hapus Data Siswa</h2>
		<form method="POST">
			<input type="hidden" name="id" value="<?php echo $data_siswa['nisn']; ?>">
			<label for="nisn">NISN:</label><br>
			<input type="text" name="nisn" value="<?php echo $data_siswa['nisn']; ?>" disabled><br><br>

			<label for="nis">NIS:</label><br>
			<input type="text" name="nis" value="<?php echo $data_siswa['nis']; ?>" disabled><br><br>

			<label for="nama">Nama Siswa:</label><br>
			<input type="text" name="nama" value="<?php echo $data_siswa['nama']; ?>" disabled><br><br>

			<label for="kelas">Kelas:</label><br>
			<input type="text" name="kelas" value="<?php echo $data_siswa['id_kelas']; ?>" disabled><br><br>

			<label for="alamat">Alamat:</label><br>
			<textarea name="alamat" disabled><?php echo $data_siswa['alamat']; ?></textarea><br><br>

			<label for="no_telp">No. Telepon:</label><br>
			<input type="text" name="no_telp" value="<?php echo $data_siswa['no_telp']; ?>" disabled><br><br>
      <input type="submit" name="submit" value="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
      <a href="../../siswa.php"><button type="button">Batal</button></a>
      </form>
      </section>

<?php
    include_once('../../footer.php');
?>