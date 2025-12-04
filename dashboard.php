<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$user = $_SESSION['user'];

// jika CEO, direct ke admin
if ($user['role'] === 'CEO') {
    header("Location: admin/dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Dashboard Karyawan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
<nav class="navbar navbar-dark bg-primary">
  <div class="container">
    <span class="navbar-brand">Dashboard Karyawan</span>
    <span class="text-white"><?= $user['username'] ?> (<?= $user['role'] ?>)</span>
    <a href="logout.php" class="btn btn-outline-light btn-sm">Logout</a>
  </div>
</nav>

<div class="container py-5">
  <h3>Selamat datang, <?= $user['username'] ?>!</h3>

  <a href="absensi.php" class="btn btn-primary mt-3">Isi Absensi</a>
</div>
</body>
</html>
