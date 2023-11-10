<?php 
    session_start();
    include_once('header.php');

    if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}

 ?>

<section>
		<h2>Data Siswa</h2><br>
		<?php if (isset($_SESSION['error'])) { ?>
          <p style="color: red;"><?php echo $_SESSION['error']; ?></p>
          <?php unset($_SESSION['error']); ?>
      <?php } ?>
      <?php if (isset($_SESSION['success'])) { ?>
          <p style="color: green;"><?php echo $_SESSION['success']; ?></p>
          <?php unset($_SESSION['success']); ?>
      <?php } ?>
		<div style="height: 400px; overflow-y: scroll;">
		<table border="1">
			<thead>
				<tr>
					<th>No</th>
					<th>NISN</th>
					<th>NIS</th>
					<th>Nama Siswa</th>
					<th>Kelas</th>
					<th>Alamat</th>
					<th>No Telp</th>
					<th>ID SPP</th>
					<th>Total Pembayaran</th>
					<?php if($_SESSION['level'] == 'admin'){ ?>
					<th>Aksi</th>
					<?php } ?>
				</tr>
			</thead>
			<tbody>
				<?php 
					include('../koneksi.php');
					$no = 1;
					$query = "SELECT * FROM siswa INNER JOIN kelas ON siswa.id_kelas = kelas.id_kelas INNER JOIN spp ON siswa.id_spp = spp.id_spp";
					$result = mysqli_query($koneksi, $query);
					while($row = mysqli_fetch_assoc($result)){
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $row['nisn']; ?></td>
					<td><?php echo $row['nis']; ?></td>
					<td><?php echo $row['nama']; ?></td>
					<td><?php echo $row['nama_kelas']; ?></td>
					<td><?php echo $row['alamat']; ?></td>
					<td><?php echo $row['no_telp']; ?></td>
					<td><?php echo $row['id_spp']; ?></td>
					<td><?php echo ' Rp. ' . number_format($row['total_bayar'], 0, ',', '.'); ?></td>
					<?php if($_SESSION['level'] == 'admin'){ ?>
					<td>
						<a href="./crud_functions/siswa/ubah.php?id=<?php echo $row['nisn']; ?>">Ubah</a> |
						<a href="./crud_functions/siswa/hapus.php?id=<?php echo $row['nisn']; ?>">Hapus</a>
					</td>
					<?php } ?>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		</div>
		<?php if($_SESSION['level'] == 'admin'){ ?>
			<br><a href="./crud_functions/siswa/tambah.php"><button type="button">Tambah Data Siswa</button></a>
		<?php } ?>
    <br>
	</section>

<?php
    include_once('footer.php');
?>