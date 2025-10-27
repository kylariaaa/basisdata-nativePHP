<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dashboard | Absensi Karyawan</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <span class="navbar-brand">Absensi Karyawan</span>
    <div class="d-flex">
      <span class="text-white me-3"><?= $user['username'] ?> (<?= $user['role'] ?>)</span>
      <a href="logout.php" class="btn btn-outline-light btn-sm">Logout</a>
    </div>
  </div>
</nav>
<div class="container py-4">
  <h3>Selamat datang, <?= $user['username'] ?>!</h3>
  <?php if ($user['role'] === 'CEO') : ?>
    <a href="absensi.php" class="btn btn-success mt-3">Lihat Data Absensi</a>
  <?php else : ?>
    <a href="absensi.php" class="btn btn-primary mt-3">Isi Absensi</a>
  <?php endif; ?>
</div>
</body>
</html>