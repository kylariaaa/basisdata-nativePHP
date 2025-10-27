<?php
include '../config.php';
if ($_SESSION['user']['role'] != 'CEO') exit('Akses ditolak');
$res = $conn->query("SELECT * FROM users");
?>
<h2>Data Karyawan</h2>
<table border="1">
<tr><th>ID</th><th>Username</th><th>Role</th></tr>
<?php while($r = $res->fetch_assoc()): ?>
<tr>
<td><?= $r['id'] ?></td>
<td><?= $r['username'] ?></td>
<td><?= $r['role'] ?></td>
</tr>
<?php endwhile; ?>
</table>
