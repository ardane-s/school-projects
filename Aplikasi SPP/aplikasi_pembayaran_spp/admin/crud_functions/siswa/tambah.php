<?php 
    session_start();

    include('../../../koneksi.php');

$query_kelas = "SELECT * FROM kelas";
$result_kelas = mysqli_query($koneksi, $query_kelas);

$query_spp = "SELECT * FROM spp";
$result_spp = mysqli_query($koneksi, $query_spp);

if (isset($_POST['submit'])) {
  $nisn = $_POST['nisn'];
  $nis = $_POST['nis'];
  $nama = $_POST['nama'];
  $id_kelas = $_POST['id_kelas'];
  $alamat = $_POST['alamat'];
  $no_telp = $_POST['no_telp'];
  $id_spp = $_POST['id_spp'];

  $query = "INSERT INTO siswa (nisn, nis, nama, id_kelas, alamat, no_telp, id_spp) VALUES ('$nisn', '$nis', '$nama', '$id_kelas', '$alamat', '$no_telp', '$id_spp')";
  $result = mysqli_query($koneksi, $query);

  if ($result) {
    $_SESSION['success'] = "Data siswa berhasil ditambahkan.";
    header('Location: ../../siswa.php');
  } else {
    $_SESSION['error'] = "Data siswa gagal ditambahkan.";
    header('Location: ../../siswa.php');
  }
}

  include_once('header.php');

  if (!isset($_SESSION['username'])) {
  header("Location: ../../../../../login.php");
  exit;
  }
 ?>

    <section>
		<h2>Tambah Data Siswa</h2><br>
		<form method="POST">
			<label for="nisn">NISN:</label><br>
			<input type="text" name="nisn" placeholder="Masukkan NISN Anda!" required><br><br>
			<label for="nis">NIS:</label><br>
			<input type="text" name="nis" placeholder="Masukkan NIS Anda!" required><br><br>
			<label for="nama">Nama Siswa:</label><br>
			<input type="text" name="nama" placeholder="Masukkan nama Anda!" required><br><br>
			<label for="id_kelas">Kelas:</label><br>
			<select name="id_kelas" required>
				<option value="">-- Pilih Kelas --</option>
				<?php while ($row = mysqli_fetch_assoc($result_kelas)) { ?>
					<option value="<?php echo $row['id_kelas']; ?>"><?php echo $row['nama_kelas'] . ' - ' . $row['kompetensi_keahlian']; ?></option>
          <?php } ?>
      </select><br><br>
      <label for="alamat">Alamat:</label><br>
      <textarea name="alamat" placeholder="Masukkan alamat Anda!" required></textarea><br><br>
      <label for="no_telp">No. Telp:</label><br>
      <input type="text" name="no_telp" placeholder="Masukkan No. telp Anda!" required><br><br>
      <label for="id_spp">SPP:</label><br>
      <select name="id_spp" required>
        <option value="">-- Pilih SPP --</option>
        <?php while ($row = mysqli_fetch_assoc($result_spp)) { ?>
          <option value="<?php echo $row['id_spp']; ?>"><?php echo $row['id_spp'] . ' - ' . $row['tahun'] . ' - Rp. ' . number_format($row['nominal'], 0, ',', '.'); ?></option>
        <?php } ?>
      </select><br><br>

      <input type="submit" name="submit" value="Tambah">
      <a href="../../siswa.php"><button type="button">Batal</button></a>
    </form>
  </section>

<?php
    include_once('footer.php');
?>