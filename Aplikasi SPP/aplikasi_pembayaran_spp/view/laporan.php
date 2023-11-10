<?php
session_start();
include_once('../koneksi.php');

$query_pembayaran = "SELECT pembayaran.id_pembayaran, pembayaran.id_petugas, pembayaran.nisn, pembayaran.tgl_bayar, pembayaran.bulan_dibayar, pembayaran.tahun_dibayar, pembayaran.id_spp, pembayaran.jumlah_bayar, siswa.nisn, siswa.nama AS nama_siswa, kelas.nama_kelas AS nama_kelas, spp.nominal, petugas.nama_petugas FROM pembayaran JOIN siswa ON pembayaran.nisn = siswa.nisn JOIN kelas ON siswa.id_kelas = kelas.id_kelas JOIN spp ON pembayaran.id_spp = spp.id_spp JOIN petugas ON pembayaran.id_petugas = petugas.id_petugas ORDER BY pembayaran.tgl_bayar DESC";
$result_pembayaran = mysqli_query($koneksi, $query_pembayaran);

if (!$result_pembayaran) {
  // there was an error in the query
  echo "Error: " . mysqli_error($koneksi);
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pembayaran SPP</title>
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
			margin-bottom: 20px;
		}
		th, td {
			text-align: left;
			padding: 8px;
			border: 1px solid #ddd;
		}
		th {
			background-color: #f2f2f2;
		}
		h1, h2 {
			text-align: center;
		}
		.container {
			max-width: 1200px;
			margin: auto;
			padding: 20px;
		}
		.text-right {
			text-align: right;
		}
		@media print {
			body * {
				visibility: hidden;
			}
			.container, .container * {
				visibility: visible;
			}
			.container {
				position: absolute;
				left: 0;
				top: 0;
			}
			table {
				page-break-inside: avoid;
			}
			button {
				display: none;
			}
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Laporan Pembayaran SPP</h1>
		<table>
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
				<td><?php echo date('d F Y', strtotime($row['tgl_bayar'])); ?></td>
				<td><?php echo $row['bulan_dibayar']; ?></td>
				<td><?php echo $row['tahun_dibayar']; ?></td>
				<td><?php echo $row['id_spp']; ?></td>
				<td><?php echo 'Rp ' . number_format($row['nominal']); ?></td>
				<td><?php echo 'Rp ' . number_format($row['jumlah_bayar']); ?></td>
			</tr>
			<?php
				$no++;
			}
			?>
			</tbody>
		</table>
		<h6>INAS © 2023 - PRA UK</h6>
		<div class="text-right">
			<button style="padding: 10px;
            margin-top: 15px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;" onclick="window.print()">Print</button>
		</div>
	</div>
</body>
</html>