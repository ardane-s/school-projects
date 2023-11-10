<?php 
    session_start();
    include_once('header.php');

    if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

 ?>

    <section>
		<h2>Data Petugas</h2><br>
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
					<th>Username</th>
					<th>Nama Petugas</th>
					<th>Level</th>
					<?php if($_SESSION['level'] == 'admin'){ ?>
					<th>Aksi</th>
					<?php } ?>
				</tr>
			</thead>
			<tbody>
				<?php 
					include('../koneksi.php');
					$no = 1;
					$query = "SELECT * FROM petugas";
					$result = mysqli_query($koneksi, $query);
					while($row = mysqli_fetch_assoc($result)){
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $row['username']; ?></td>
					<td><?php echo $row['nama_petugas']; ?></td>
					<td><?php echo $row['level']; ?></td>
					<?php if($_SESSION['level'] == 'admin'){ ?>
					<td>
						<a href="./crud_functions/petugas/ubah.php?id=<?php echo $row['id_petugas']; ?>">Ubah</a> |
						<a href="./crud_functions/petugas/hapus.php?id=<?php echo $row['id_petugas']; ?>">Hapus</a>
					</td>
					<?php } ?>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		</div>
		<?php if($_SESSION['level'] == 'admin'){ ?>
		<br><a href="./crud_functions/petugas/tambah.php"><button type="button">Tambah Data Petugas</button></a>
		<?php } ?>
	</section>

<?php
    include_once('footer.php');
?>