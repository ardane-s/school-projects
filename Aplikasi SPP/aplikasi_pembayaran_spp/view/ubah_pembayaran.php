<?php 
    session_start();

    include('../koneksi.php');

    $id = $_GET['id'];
    $query_pembayaran = "SELECT * FROM pembayaran WHERE id_pembayaran='$id'";
    $result_pembayaran = mysqli_query($koneksi, $query_pembayaran);
    $data_pembayaran = mysqli_fetch_assoc($result_pembayaran);
    
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $id_petugas = $_POST['id_petugas'];
        $nisn = $_POST['nisn'];
        $tgl_bayar = $_POST['tgl_bayar'];
        $bulan_dibayar = $_POST['bulan_dibayar'];
        $tahun_dibayar = $_POST['tahun_dibayar'];
        $id_spp = $_POST['id_spp'];
        $jumlah_bayar = $_POST['jumlah_bayar'];
    
        $query = "UPDATE pembayaran SET id_petugas='$id_petugas', nisn='$nisn', tgl_bayar='$tgl_bayar', bulan_dibayar='$bulan_dibayar', tahun_dibayar='$tahun_dibayar', id_spp='$id_spp', jumlah_bayar='$jumlah_bayar' WHERE id_pembayaran='$id'";
        $result = mysqli_query($koneksi, $query);
  
    if ($result) {
      $_SESSION['success'] = "Data pembayaran berhasil diubah.";
      header('Location: riwayat.php');
    } else {
      $_SESSION['error'] = "Data pembayaran gagal diubah.";
      header('Location: riwayat.php?id=' . $id);
    }
  }

    include_once('header.php');

    if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}  
 ?>

<section>
	<h2>Ubah Data Pembayaran</h2>
<form method="POST">
  <input type="hidden" name="id" value="<?php echo $data_pembayaran['id_pembayaran']; ?>">
  <label for="id_petugas">ID Petugas:</label><br>
  <select name="id_petugas" required>
  <?php
  $query_petugas = "SELECT * FROM petugas";
  $result_petugas = mysqli_query($koneksi, $query_petugas);
  while ($data_petugas = mysqli_fetch_assoc($result_petugas)) {
    $selected = $data_pembayaran['id_petugas'] == $data_petugas['id_petugas'] ? 'selected' : '';
    echo '<option value="' . $data_petugas['id_petugas'] . '" ' . $selected . '>' . $data_petugas['nama_petugas'] . '</option>';
  }
  ?>
</select><br><br>

  <label for="nisn">NISN:</label><br>
  <select name="nisn" required>
  <?php
  $query_siswa = "SELECT * FROM siswa";
  $result_siswa = mysqli_query($koneksi, $query_siswa);
  while ($data_siswa = mysqli_fetch_assoc($result_siswa)) {
    $selected = $data_pembayaran['nisn'] == $data_siswa['nisn'] ? 'selected' : '';
    echo '<option value="' . $data_siswa['nisn'] . '" ' . $selected . '>' . $data_siswa['nama'] . '</option>';
  }
  ?>
</select><br><br>

  <label for="tgl_bayar">Tanggal Bayar:</label><br>
  <input type="date" name="tgl_bayar" value="<?php echo $data_pembayaran['tgl_bayar']; ?>" required><br><br>

  <label for="bulan_dibayar">Bulan Dibayar:</label><br>
  <select name="bulan_dibayar" required>
  <?php
  $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
  foreach ($bulan as $b) {
    $selected = $data_pembayaran['bulan_dibayar'] == $b ? 'selected' : '';
    echo '<option value="' . $b . '" ' . $selected . '>' . $b . '</option>';
  }
  ?>
</select><br><br>

  <label for="tahun_dibayar">Tahun Dibayar:</label><br>
  <input type="number" name="tahun_dibayar" value="<?php echo $data_pembayaran['tahun_dibayar']; ?>" required><br><br>

  <label for="id_spp">ID SPP:</label><br>
  <select name="id_spp" required>
		<?php
			$query_spp = "SELECT id_spp, nominal FROM spp";
			$result_spp = mysqli_query($koneksi, $query_spp);
			while ($data_spp = mysqli_fetch_assoc($result_spp)) {
				$selected = "";
				if ($data_spp['id_spp'] == $data_pembayaran['id_spp']) {
					$selected = "selected";
				}
				echo "<option value='" . $data_spp['id_spp'] . "' " . $selected . "> " . $data_spp['id_spp'] . " (Nominal: " . $data_spp['nominal'] . ")</option>";
			}
		?>
	</select><br><br>

  <label for="jumlah_bayar">Jumlah Bayar:</label><br>
  <input type="number" name="jumlah_bayar" value="<?php echo $data_pembayaran['jumlah_bayar']; ?>" required><br><br>

  <input type="submit" name="submit" value="Ubah">
  <a href="./riwayat.php"><button type="button">Batal</button></a>

</form>
</section>


<?php
    include_once('./footer.php');
?>