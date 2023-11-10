<?php 
    session_start();

    include('../../../koneksi.php');

  $id = $_GET['id'];
  $query_siswa = "SELECT * FROM siswa WHERE nisn='$id'";
  $result_siswa = mysqli_query($koneksi, $query_siswa);
  $data_siswa = mysqli_fetch_assoc($result_siswa);
  
  $query_kelas = "SELECT * FROM kelas";
  $result_kelas = mysqli_query($koneksi, $query_kelas);
  
  $query_spp = "SELECT * FROM spp";
  $result_spp = mysqli_query($koneksi, $query_spp);

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nisn = $_POST['nisn'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $id_kelas = $_POST['id_kelas'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $id_spp = $_POST['id_spp'];
  
    $query = "UPDATE siswa SET nisn='$nisn', nis='$nis', nama='$nama', id_kelas='$id_kelas', alamat='$alamat', no_telp='$no_telp', id_spp='$id_spp' WHERE nisn='$id'";
    $result = mysqli_query($koneksi, $query);
  
    if ($result) {
      $_SESSION['success'] = "Data siswa berhasil diubah.";
      header('Location: ../../siswa.php');
    } else {
      $_SESSION['error'] = "Data siswa gagal diubah.";
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
		<h2>Ubah Data Siswa</h2>
		<form method="POST">
			<input type="hidden" name="id" value="<?php echo $data_siswa['nisn']; ?>">
			<label for="nisn">NISN:</label><br>
			  <input type="text" name="nisn" value="<?php echo $data_siswa['nisn']; ?>" required><br><br>

			<label for="nis">NIS:</label><br>
			  <input type="text" name="nis" value="<?php echo $data_siswa['nis']; ?>" required><br><br>

			<label for="nama">Nama Siswa:</label><br>
			  <input type="text" name="nama" value="<?php echo $data_siswa['nama']; ?>" required><br><br>

      <label for="kelas">Kelas:</label><br>
        <select name="id_kelas" required>
        <option value="">--Pilih Kelas--</option>
        <?php while ($data_kelas = mysqli_fetch_assoc($result_kelas)) { ?>
        <option value="<?php echo $data_kelas['id_kelas']; ?>" <?php if ($data_kelas['id_kelas'] == $data_siswa['id_kelas']) { echo 'selected'; } ?>><?php echo $data_kelas['nama_kelas'] . ' - ' . $data_kelas['kompetensi_keahlian']; ?></option>
        <?php } ?>
        </select><br><br>

      <label for="alamat">Alamat:</label><br>
        <textarea name="alamat" required><?php echo $data_siswa['alamat']; ?></textarea><br><br>

      <label for="no_telp">No. Telepon:</label><br>
        <input type="text" name="no_telp" value="<?php echo $data_siswa['no_telp']; ?>" required><br><br>

      <label for="spp">SPP:</label><br>
        <select name="id_spp" required>
        <option value="">--Pilih SPP--</option>
        <?php while ($data_spp = mysqli_fetch_assoc($result_spp)) { ?>
        <option value="<?php echo $data_spp['id_spp']; ?>" <?php if ($data_spp['id_spp'] == $data_siswa['id_spp']) { echo 'selected'; } ?>><?php echo $data_spp['id_spp'] . ' - ' . $data_spp['tahun'] . ' - Rp. ' . number_format($data_spp['nominal'], 0, ',', '.'); ?></option>
        <?php } ?>
        </select><br><br>

        <input type="submit" name="submit" value="Ubah">
        <a href="../../siswa.php"><button type="button">Batal</button></a>
    </form>
    </section>

<?php
    include_once('../../footer.php');
?>