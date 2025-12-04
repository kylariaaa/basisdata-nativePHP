<?php
session_start();
include '../config.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'CEO') {
    header("Location: ../login.php");
    exit;
}

$res = $conn->query("SELECT * FROM users ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Data Karyawan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
<div class="container py-4">
  <h2>Data Karyawan</h2>
  <table class="table table-bordered table-striped mt-3">
    <tr><th>ID</th><th>Username</th><th>Role</th></tr>
    <?php while($r = $res->fetch_assoc()): ?>
    <tr>
      <td><?= $r['id'] ?></td>
      <td><?= $r['username'] ?></td>
      <td><?= $r['role'] ?></td>
    </tr>
    <?php endwhile; ?>
  </table>

  <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
</div>
</body>
</html>
