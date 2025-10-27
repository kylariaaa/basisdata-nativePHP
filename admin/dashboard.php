<?php
include '../config.php';
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'CEO') {
    header('Location: ../login.php');
    exit;
}
?>

<h2>Dashboard CEO</h2>
<ul>
  <li><a href="data_karyawan.php">Data Karyawan</a></li>
  <li><a href="data_absensi.php">Data Absensi</a></li>
  <li><a href="../logout.php">Logout</a></li>
</ul>
