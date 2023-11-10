<?php 
    session_start();

    include('../../../koneksi.php');

    $id = $_GET['id'];
    $query_petugas = "SELECT * FROM petugas WHERE id_petugas='$id'";
    $result_petugas = mysqli_query($koneksi, $query_petugas);
    $data_petugas = mysqli_fetch_assoc($result_petugas);

if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $nama_petugas = $_POST['nama_petugas'];
  $level = $_POST['level'];

  $query = "UPDATE petugas SET username='$username', password='$password', nama_petugas='$nama_petugas', level='$level' WHERE id_petugas='$id'";
  $result = mysqli_query($koneksi, $query);
  
    if ($result) {
      $_SESSION['success'] = "Data petugas berhasil diubah.";
      header('Location: ../../petugas.php');
    } else {
      $_SESSION['error'] = "Data petugas gagal diubah.";
      header('Location: ../../petugas.php?id=' . $id);
    }
  }

    include_once('header.php');

    if (!isset($_SESSION['username'])) {
    header("Location: ../../../../../login.php");
    exit;
}  
 ?>

    <section>
		<h2>Ubah Data Petugas</h2>
    <form method="POST">
      <input type="hidden" name="id" value="<?php echo $data_petugas['id_petugas']; ?>">
      <label for="username">Username:</label><br>
      <input type="text" name="username" value="<?php echo $data_petugas['username']; ?>" required><br><br>

      <label for="password">Password:</label><br>
      <input type="password" name="password" value="<?php echo $data_petugas['password']; ?>" required><br><br>

      <label for="nama_petugas">Nama Petugas:</label><br>
      <input type="text" name="nama_petugas" value="<?php echo $data_petugas['nama_petugas']; ?>" required><br><br>

      <label for="level">Level:</label><br>
      <select name="level" required>
        <option value="">--Pilih Level--</option>
        <option value="admin" <?php if ($data_petugas['level'] == 'admin') { echo 'selected'; } ?>>Administrator</option>
        <option value="petugas" <?php if ($data_petugas['level'] == 'petugas') { echo 'selected'; } ?>>Petugas</option>
        <option value="siswa" <?php if ($data_petugas['level'] == 'siswa') { echo 'selected'; } ?>>Siswa</option>
      </select><br><br>
      <input type="submit" name="submit" value="Ubah">
      <a href="../../petugas.php"><button type="button">Batal</button></a>
    </form>
    </section>

<?php
    include_once('../../footer.php');
?>