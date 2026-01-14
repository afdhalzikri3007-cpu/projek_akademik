<?php
session_start();
include "koneksi.php";

// Jika sudah login, langsung ke dashboard
if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login | Sistem Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex align-items-center min-vh-100">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card border-primary shadow-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0 fw-bold">Sistem Akademik</h4>
                    <small>Silakan login untuk melanjutkan</small>
                </div>

                <div class="card-body p-4">

                    <?php if (isset($_GET['error'])): ?>
                        <div class="alert alert-danger text-center">
                            Username atau password salah
                        </div>
                    <?php endif; ?>

                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Username</label>
                            <input type="text" name="username" class="form-control" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" name="login" class="btn btn-primary fw-semibold">
                                Login
                            </button>
                        </div>
                    </form>

                    <hr>

                    <div class="text-center">
                        <span class="text-muted">Belum punya akun?</span><br>
                        <a href="register.php" class="btn btn-outline-primary btn-sm mt-2">
                            Daftar Sekarang
                        </a>
                    </div>
                </div>

                <div class="card-footer text-center small text-muted">
                    © <?= date("Y"); ?> Sistem Akademik
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // MD5 sesuai instruksi dosen

    $query = mysqli_query($db, "SELECT * FROM pengguna 
                                WHERE username='$username' 
                                AND password='$password'");

    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);
        $_SESSION['login'] = true;
        $_SESSION['username'] = $data['username'];
        $_SESSION['nama_lengkap'] = $data['nama_lengkap'];

        header("Location: index.php");
        exit;
    } else {
        header("Location: login.php?error=1");
        exit;
    }
}
?>
