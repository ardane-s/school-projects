<?php
session_start();
include_once('header.php');
include_once('../koneksi.php');

$query_pembayaran = "SELECT pembayaran.id_pembayaran, pembayaran.id_petugas, pembayaran.nisn, pembayaran.tgl_bayar, pembayaran.bulan_dibayar, pembayaran.tahun_dibayar, pembayaran.id_spp, pembayaran.jumlah_bayar, siswa.nisn, siswa.nama AS nama_siswa, kelas.nama_kelas AS nama_kelas, spp.nominal, petugas.nama_petugas FROM pembayaran JOIN siswa ON pembayaran.nisn = siswa.nisn JOIN kelas ON siswa.id_kelas = kelas.id_kelas JOIN spp ON pembayaran.id_spp = spp.id_spp JOIN petugas ON pembayaran.id_petugas = petugas.id_petugas ORDER BY pembayaran.tgl_bayar DESC";
$result_pembayaran = mysqli_query($koneksi, $query_pembayaran);

if (!$result_pembayaran) {
  echo "Error: " . mysqli_error($koneksi);
  exit();
}
?>

<section>
    <h2 style>Riwayat Pembayaran SPP</h2><br>
    <?php if (isset($_SESSION['error'])) { ?>
          <p style="color: red;"><?php echo $_SESSION['error']; ?></p>
          <?php unset($_SESSION['error']); ?>
      <?php } ?>
      <?php if (isset($_SESSION['success'])) { ?>
          <p style="color: green;"><?php echo $_SESSION['success']; ?></p>
          <?php unset($_SESSION['success']); ?>
      <?php } ?>
      <div style="height: 400px; overflow-y: scroll;">
    <table border="1" cellpadding="10">
      <thead>
        <tr>
          <th>No</th>
          <th>Petugas</th>
          <th>NISN</th>
          <th>Nama Siswa</th>
          <th>Kelas</th>
          <th>Tanggal Bayar</th>
          <th>Bulan Dibayar</th>
          <th>Tahun Dibayar</th>
          <th>ID SPP</th>
          <th>Nominal SPP</th>
          <th>Jumlah Bayar</th>
          <?php if ($_SESSION['level'] == 'admin') { ?>
            <th>Aksi</th>
          <?php } ?>
        </tr>
      </thead>
      <tbody>
      <?php 
      $no = 1;
      while ($row = mysqli_fetch_assoc($result_pembayaran)) {
    ?>
    <tr>
      <td><?php echo $no?></td>
      <td><?php echo $row['nama_petugas']; ?></td>
      <td><?php echo $row['nisn']; ?></td>
      <td><?php echo $row['nama_siswa']; ?></td>
      <td><?php echo $row['nama_kelas']; ?></td>
      <td><?php echo date('d-m-Y', strtotime($row['tgl_bayar'])); ?></td>
      <td><?php echo $row['bulan_dibayar']; ?></td>
      <td><?php echo $row['tahun_dibayar']; ?></td>
      <td><?php echo $row['id_spp']; ?></td>
      <td><?php echo ' Rp. ' . number_format($row['nominal'], 0, ',', '.'); ?></td>
      <td><?php echo ' Rp. ' . number_format($row['jumlah_bayar'], 0, ',', '.'); ?></td>
      <?php if ($_SESSION['level'] == 'admin') { ?>
      <td>
      <a href="ubah_pembayaran.php?id=<?php echo $row['id_pembayaran']; ?>">Edit</a>
      </td>
      <?php } ?>
    </tr>
    <?php 
      $no++;
    }
    ?>
    </tbody>
    </table>
  </div>
  <a href="laporan.php"><button>Buat Laporan</button></a>
  </section>


<?php
    include_once('footer.php');
?>