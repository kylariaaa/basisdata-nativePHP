<?php
session_start();
include '../config.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'CEO') {
    header("Location: ../login.php");
    exit;
}

$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <title>Dashboard CEO</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">
  <div class="container">
    <span class="navbar-brand">Dashboard CEO</span>
    <span class="text-white"><?= $user['username'] ?> (CEO)</span>
    <a href="../logout.php" class="btn btn-outline-light btn-sm">Logout</a>
  </div>
</nav>

<div class="container py-5">
  <h3>Selamat datang, <?= $user['username'] ?>!</h3>

  <a href="data_karyawan.php" class="btn btn-primary mt-3 w-100">Data Karyawan</a>
  <a href="data_absensi.php" class="btn btn-success mt-3 w-100">Data Absensi</a>
</div>
</body>
</html>
