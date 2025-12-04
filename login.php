<?php
session_start();
include 'config.php';

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $res = $conn->query("SELECT * FROM users WHERE username='$username' LIMIT 1");

    if ($res->num_rows === 1) {
        $user = $res->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;

            if ($user['role'] === 'CEO') {
                header("Location: admin/dashboard.php");
            } else {
                header("Location: dashboard.php");
            }
            exit;
        }
    }

    $error = "Username atau password salah!";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="height:100vh">

<div class="card p-4 shadow" style="width:25rem;">
  <h3 class="text-center mb-3">Login</h3>

  <?php if ($error): ?>
  <div class="alert alert-danger"><?= $error ?></div>
  <?php endif; ?>

  <form method="POST">
    <input name="username" class="form-control mb-3" placeholder="Username" required>
    <input name="password" type="password" class="form-control mb-3" placeholder="Password" required>
    <button class="btn btn-primary w-100">Login</button>
  </form>
</div>

</body>
</html>
