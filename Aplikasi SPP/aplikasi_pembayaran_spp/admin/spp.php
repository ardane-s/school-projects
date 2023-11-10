<?php 
    session_start();
    include_once('header.php');

    if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

 ?>

    <section>
		<h2>Data SPP</h2><br>
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
					<th>Tahun</th>
					<th>Nominal</th>
					<?php if($_SESSION['level'] == 'admin'){ ?>
					<th>Aksi</th>
					<?php } ?>
				</tr>
			</thead>
			<tbody>
				<?php 
					include('../koneksi.php');
					$no = 1;
                    $query = "SELECT * FROM spp LIMIT 1000";
					$result = mysqli_query($koneksi, $query);
					while($row = mysqli_fetch_assoc($result)){
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $row['tahun']; ?></td>
					<td><?php echo 'Rp. ' . number_format($row['nominal'], 0, ',', '.'); ?></td>
					<?php if($_SESSION['level'] == 'admin'){ ?>
					<td>
						<a href="./crud_functions/spp/ubah.php?id=<?php echo $row['id_spp']; ?>">Ubah</a> |
						<a href="./crud_functions/spp/hapus.php?id=<?php echo $row['id_spp']; ?>">Hapus</a>
					</td>
					<?php } ?>
				</tr>
				<?php } ?>
			</tbody>
		</table>
        </div>
		<?php if($_SESSION['level'] == 'admin'){ ?>
		<br><a href="./crud_functions/spp/tambah.php"><button type="button">Tambah Data SPP</button></a>
		<?php } ?>
	</section>

<?php
    include_once('footer.php');
?>