<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register | Sistem Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex align-items-center min-vh-100">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card border-success shadow-lg">
                <div class="card-header bg-success text-white text-center">
                    <h4 class="mb-0 fw-bold">Registrasi Akun</h4>
                    <small>Buat akun baru Sistem Akademik</small>
                </div>

                <div class="card-body p-4">
                    <form action="proses_register.php" method="POST">

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" name="register" class="btn btn-success fw-semibold">
                                Daftar
                            </button>
                        </div>
                    </form>

                    <hr>

                    <div class="text-center">
                        <a href="login.php" class="btn btn-outline-secondary btn-sm">
                            Kembali ke Login
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
