<?php
include 'config.php';
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$user = $_SESSION['user'];
if ($user['role'] == 'CEO') {
    header('Location: admin/dashboard.php');
    exit;
}
?>

<h2>Halo, <?= $user['username'] ?> (<?= $user['role'] ?>)</h2>
<a href="absensi.php">Absen Sekarang</a> | <a href="logout.php">Logout</a>
