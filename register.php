<?php
require 'db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $role = $_POST['role'];

  $conn->query("INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')");
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar | Absensi Karyawan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex align-items-center justify-content-center" style="min-height: 100vh;">
  <div class="card shadow p-4" style="width: 26rem;">
    <h4 class="text-center mb-3">Registrasi Akun</h4>
    <form method="POST">
      <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" class="form-control" name="username" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" name="password" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Role</label>
        <select class="form-select" name="role">
          <option value="KARYAWAN">Karyawan</option>
          <option value="CEO">CEO</option>
        </select>
      </div>
      <button type="submit" class="btn btn-success w-100">Daftar</button>
      <p class="text-center mt-3">Sudah punya akun? <a href="login.php">Login</a></p>
    </form>
  </div>
</body>


</html>