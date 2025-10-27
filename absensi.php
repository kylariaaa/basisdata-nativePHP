<?php
include 'config.php';
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
$user = $_SESSION['user'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tanggal = date('Y-m-d');
    $jam = date('H:i:s');

    // Cek apakah sudah absen hari ini
    $cek = $conn->query("SELECT * FROM absensi WHERE user_id={$user['id']} AND tanggal='$tanggal'");
    if ($cek->num_rows > 0) {
        // update jam keluar
        $conn->query("UPDATE absensi SET jam_keluar='$jam' WHERE user_id={$user['id']} AND tanggal='$tanggal'");
        echo "Anda telah absen pulang!";
    } else {
        // absen masuk
        $conn->query("INSERT INTO absensi (user_id, tanggal, jam_masuk) VALUES ({$user['id']}, '$tanggal', '$jam')");
        echo "Absensi masuk berhasil!";
    }
}
?>

<h2>Absensi Karyawan</h2>
<form method="POST">
  <button type="submit">Absen Sekarang</button>
</form>
<a href="dashboard.php">Kembali</a>
