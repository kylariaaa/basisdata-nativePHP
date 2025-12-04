<?php
session_start();
include '../config.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'CEO') {
    header("Location: ../login.php");
    exit;
}

$res = $conn->query("
    SELECT a.*, u.username
    FROM absensi a 
    JOIN users u ON a.user_id = u.id
    ORDER BY tanggal DESC
");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Data Absensi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-4">
  <h2>Data Absensi</h2>

  <table class="table table-bordered table-striped mt-4">
    <tr>
      <th>Nama</th>
      <th>Tanggal</th>
      <th>Jam Masuk</th>
      <th>Jam Keluar</th>
    </tr>
    <?php while($r = $res->fetch_assoc()): ?>
    <tr>
      <td><?= $r['username'] ?></td>
      <td><?= $r['tanggal'] ?></td>
      <td><?= $r['jam_masuk'] ?></td>
      <td><?= $r['jam_keluar'] ?></td>
    </tr>
    <?php endwhile; ?>
  </table>

  <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
</div>
</body>
</html>
