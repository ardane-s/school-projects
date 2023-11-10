<?php 
    session_start();
    include_once('header.php');

    if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

 ?>
 
 <section>
    <div class="welcome">
        <h3>Selamat datang, <?php echo $_SESSION['username'] ?>!</h3>
        <p>Silahkan pilih menu yang ingin anda gunakan</p>
    </div>

    <div class="card-wrapper">
        <a href="siswa.php">
            <div class="card">
                <h3>Data Siswa</h3>
            </div>
        </a>
        <a href="petugas.php">
            <div class="card">
                <h3>Data Petugas</h3>
            </div>
        </a>
        <a href="kelas.php">
            <div class="card">
                <h3>Data Kelas</h3>
            </div>
        </a>
        <a href="spp.php">
            <div class="card">
                <h3>Data SPP</h3>
            </div>
        </a>
        <a href="pembayaran.php">
            <div class="card">
                <h3>Pembayaran SPP</h3>
            </div>
        </a>
        <a href="riwayat.php">
            <div class="card">
                <h3>Riwayat Pembayaran</h3>
            </div>
        </a>
        <a href="../logout.php">
            <div class="card">
                <h3>Logout</h3>
            </div>
        </a>
    </div>
</section>

<?php
    include_once('footer.php');
?>
