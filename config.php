<?php
$host = 'db';
$db   = 'db';
$user = 'db';
$pass = 'db';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

session_start();
?>
