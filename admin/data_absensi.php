<?php
include '../config.php';
if ($_SESSION['user']['role'] != 'CEO') exit('Akses ditolak');
$res = $conn->query("SELECT a.*, u.username FROM absensi a JOIN users u ON a.user_id=u.id ORDER BY tanggal DESC");
?>
<h2>Data Absensi</h2>
<table border="1">
<tr><th>User</th><th>Tanggal</th><th>Jam Masuk</th><th>Jam Keluar</th></tr>
<?php while($r = $res->fetch_assoc()): ?>
<tr>
<td><?= $r['username'] ?></td>
<td><?= $r['tanggal'] ?></td>
<td><?= $r['jam_masuk'] ?></td>
<td><?= $r['jam_keluar'] ?></td>
</tr>
<?php endwhile; ?>
</table>
