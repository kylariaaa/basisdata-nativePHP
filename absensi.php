<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$user = $_SESSION['user'];

// PERLINDUNGAN: CEO tidak boleh masuk
if ($user['role'] !== 'KARYAWAN') {
    header("Location: dashboard.php");
    exit;
}

$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tanggal = date('Y-m-d');
    $jam = date('H:i:s');

    $cek = $conn->query("SELECT * FROM absensi WHERE user_id={$user['id']} AND tanggal='$tanggal'");

    if ($cek->num_rows > 0) {
        $conn->query("UPDATE absensi SET jam_keluar='$jam' 
                      WHERE user_id={$user['id']} AND tanggal='$tanggal'");
        $message = "Anda telah absen pulang.";
    } else {
        $conn->query("INSERT INTO absensi (user_id, tanggal, jam_masuk) VALUES 
                     ({$user['id']}, '$tanggal', '$jam')");
        $message = "Absensi masuk berhasil!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <title>Absensi Karyawan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-primary">
  <div class="container">
    <span class="navbar-brand">Absensi</span>
    <span class="text-white"><?= $user['username'] ?></span>
    <a href="logout.php" class="btn btn-outline-light btn-sm">Logout</a>
  </div>
</nav>

<div class="container py-5">
  <div class="card p-4 shadow mx-auto" style="max-width:480px;">
    <h4 class="text-center mb-4">Form Absensi</h4>

    <?php if ($message): ?>
        <div class="alert alert-info text-center"><?= $message ?></div>
    <?php endif; ?>

    <form method="POST">
      <button class="btn btn-primary w-100 py-2 fs-5">Absen Sekarang</button>
    </form>

    <div class="text-center mt-3">
      <a href="dashboard.php">← Kembali</a>
    </div>
  </div>
</div>
</body>
</html>
