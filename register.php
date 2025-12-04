<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role     = $_POST['role'];

    $conn->query("INSERT INTO users (username, password, role) 
                  VALUES ('$username', '$password', '$role')");

    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="height:100vh">
<div class="card p-4 shadow" style="width: 26rem;">
  <h4 class="text-center mb-3">Registrasi</h4>
  <form method="POST">
    <input name="username" class="form-control mb-3" placeholder="Username" required>
    <input name="password" type="password" class="form-control mb-3" placeholder="Password" required>
    <select class="form-select mb-3" name="role">
      <option value="KARYAWAN">Karyawan</option>
      <option value="CEO">CEO</option>
    </select>
    <button class="btn btn-success w-100">Daftar</button>
  </form>
</div>
</body>
</html>
