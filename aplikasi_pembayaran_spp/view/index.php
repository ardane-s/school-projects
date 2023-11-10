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

    <?php if($_SESSION['level'] == 'petugas'){ ?>
    <div class="card-wrapper">
        <a href="pembayaran.php">
            <div class="card">
                <h3>Pembayaran SPP</h3>
            </div>
       	    <?php } ?>
		</a>

        <a href="riwayat.php">
            <div class="card">
                <h3>Riwayat Pembayaran SPP</h3>
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
