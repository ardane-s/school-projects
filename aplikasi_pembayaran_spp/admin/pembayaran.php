<?php
session_start();
include_once('../koneksi.php');

if(isset($_POST['submit'])){
    $nisn = $_POST['nisn'];
    $tgl_bayar = $_POST['tgl_bayar'];
    $bulan_dibayar = $_POST['bulan_dibayar'];
    $tahun_dibayar = $_POST['tahun_dibayar'];
    $id_petugas = $_POST['id_petugas'];
    $id_spp = $_POST['id_spp'];
    $jumlah_bayar = $_POST['jumlah_bayar'];
  
    $check_pembayaran_query = mysqli_query($koneksi, "SELECT * FROM pembayaran WHERE nisn='$nisn' AND bulan_dibayar='$bulan_dibayar' AND tahun_dibayar='$tahun_dibayar'");
/*
    if(mysqli_num_rows($check_pembayaran_query) > 0){
        $_SESSION['error'] = 'Siswa sudah melakukan pembayaran untuk bulan dan tahun yang sama';
        header('Location: riwayat.php');
        exit;

    } */ if($insert_pembayaran_query){
        $_SESSION['success'] = 'Pembayaran berhasil dilakukan';
        header('Location: riwayat.php');
        exit;
    } if($insert_pembayaran_query) {
        $_SESSION['error'] = 'Terjadi kesalahan saat melakukan pembayaran';
        header('Location: riwayat.php');
    }
  
    $query_siswa = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn='$nisn'");
    $siswa = mysqli_fetch_assoc($query_siswa);
  
    $query_spp = mysqli_query($koneksi, "SELECT * FROM spp WHERE id_spp='$id_spp'");
    $spp = mysqli_fetch_assoc($query_spp);

    $total_bayar = $spp['nominal'] * $jumlah_bayar;
 
    $insert_pembayaran_query = mysqli_query($koneksi, "INSERT INTO pembayaran (id_pembayaran, nisn, tgl_bayar, bulan_dibayar, tahun_dibayar, id_petugas, id_spp, jumlah_bayar) VALUES (null, '$nisn', '$tgl_bayar', '$bulan_dibayar', '$tahun_dibayar', '$id_petugas', '$id_spp', '$jumlah_bayar')");
    if($insert_pembayaran_query){
        $_SESSION['success'] = 'Pembayaran berhasil dilakukan';
        header('Location: riwayat.php');
        exit;
    } else {
        $_SESSION['error'] = 'Terjadi kesalahan saat melakukan pembayaran';
        header('Location: riwayat.php');
        exit;
    }
}

$query_petugas = mysqli_query($koneksi, "SELECT * FROM petugas");
$data_petugas = array();
while($row = mysqli_fetch_assoc($query_petugas)){
    $data_petugas[] = $row;
}

$query_siswa = mysqli_query($koneksi, "SELECT * FROM siswa");
$data_siswa = array();
while($row = mysqli_fetch_assoc($query_siswa)){
    $data_siswa[] = $row;
}

$query_spp = mysqli_query($koneksi, "SELECT * FROM spp");
$data_spp = array();
while($row = mysqli_fetch_assoc($query_spp)){
    $data_spp[] = $row;
}

include_once('header.php');

if (!isset($_SESSION['username'])) {
header("Location: ../../../../../login.php");
exit;
}
?>
<section>
    <h2>Pembayaran SPP</h2>
    <?php if(isset($_SESSION['error'])): ?>
    <div class="alert alert-danger">
        <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
    </div>
    <?php endif; ?>
    <form method="post" action="pembayaran.php">
        <label>ID Petugas:</label><br>
        <select name="id_petugas" required>
            <option value="">Pilih Petugas</option>
            <?php foreach($data_petugas as $petugas): ?>
            <option value="<?php echo $petugas['id_petugas']; ?>">
	<?php echo $petugas['nama_petugas']; ?></option>
	<?php endforeach; ?>
	</select><br><br>
	<label>NISN:</label><br>
	<select name="nisn" required>
	<option value="">Pilih NISN</option>
	<?php foreach($data_siswa as $siswa): ?>
	<option value="<?php echo $siswa['nisn']; ?>"><?php echo $siswa['nisn'].' - '.$siswa['nama']; ?></option>
	<?php endforeach; ?>
	</select><br><br>
	<label>Tanggal Bayar:</label><br>
	<input type="date" name="tgl_bayar" required><br><br>
	<label>Bulan Dibayar:</label><br>
	<select name="bulan_dibayar" required>
	<option value="">Pilih Bulan</option>
	<option value="Januari">Januari</option>
	<option value="Februari">Februari</option>
	<option value="Maret">Maret</option>
	<option value="April">April</option>
	<option value="Mei">Mei</option>
	<option value="Juni">Juni</option>
	<option value="Juli">Juli</option>
	<option value="Agustus">Agustus</option>
	<option value="September">September</option>
	<option value="Oktober">Oktober</option>
	<option value="November">November</option>
	<option value="Desember">Desember</option>
	</select><br><br>
	<label>Tahun Dibayar:</label><br>
	<input type="number" name="tahun_dibayar" placeholder="Masukkan tahun pembayaran!" required><br><br>
	<label>ID SPP:</label><br>
	<select name="id_spp" required>
	<option value="">Pilih SPP</option>
	<?php foreach($data_spp as $spp): ?>
	<option value="<?php echo $spp['id_spp']; ?>"><?php echo $spp['id_spp'] . ' - ' . $spp['tahun'] . ' - Rp. ' . number_format($spp['nominal'], 0, ',', '.'); ?></option>
	<?php endforeach; ?>
	</select><br><br>
	<label>Jumlah Bayar:</label><br>
	<input type="number" name="jumlah_bayar" placeholder="Masukkan jumlah bayar!" required><br><br>
    <input type="submit" name="submit" value="Tambah">
      <a href="riwayat.php"><button type="button">Batal</button></a>
	</form>
</section>

<?php
include_once('footer.php'); 
?>
