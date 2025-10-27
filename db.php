<?php
$host = "db";
$user = "db";
$pass = "db";
$name = "db";

$conn = new mysqli($host, $user, $pass, $name);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
