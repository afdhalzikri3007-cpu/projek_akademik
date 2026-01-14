<?php
session_start();
include "koneksi.php";

/* ===============================
   PROTEKSI LOGIN
================================ */
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

/* ===============================
   SESSION TIMEOUT (15 MENIT)
================================ */
$timeout = 900; // 15 menit

if (isset($_SESSION['last_activity'])) {
    if (time() - $_SESSION['last_activity'] > $timeout) {
        session_unset();
        session_destroy();
        header("Location: login.php?timeout=1");
        exit;
    }
}
$_SESSION['last_activity'] = time();

/* ===============================
   ROUTING HALAMAN
================================ */
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sistem Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">

<!-- =============================== NAVBAR ================================ -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm border-bottom border-3 border-light">
    <div class="container">
        <!-- BRAND -->
        <a class="navbar-brand fw-bold d-flex align-items-center" href="index.php">
            <span class="badge bg-light text-primary me-2">SA</span>
            Sistem Akademik
        </a>

        <!-- TOGGLER -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- MENU -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">

                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="index.php">
                        Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="index.php?page=mahasiswa/list">
                        Mahasiswa
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="index.php?page=program_studi/list">
                        Program Studi
                    </a>
                </li>
<!-- pengguna -->
                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="index.php?page=pengguna/profil">
                        Profil Saya
                    </a>
                </li>


                <!-- PEMBATAS -->
                <li class="nav-item d-none d-lg-block">
                    <span class="text-white-50 mx-2">|</span>
                </li>

                <!-- LOGOUT -->
                <li class="nav-item">
                    <a class="btn btn-outline-light btn-sm fw-semibold"
                       href="logout.php"
                       onclick="return confirm('Yakin ingin logout?')">
                        Logout
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>


<!-- ===============================
     KONTEN
================================ -->
<div class="container flex-grow-1 mt-4">

<?php
if ($page == 'dashboard') {

    $total_mahasiswa = mysqli_fetch_assoc(
        mysqli_query($db, "SELECT COUNT(*) AS total FROM mahasiswa")
    )['total'];

    $total_prodi = mysqli_fetch_assoc(
        mysqli_query($db, "SELECT COUNT(*) AS total FROM program_studi")
    )['total'];

    $total_user = mysqli_fetch_assoc(
        mysqli_query($db, "SELECT COUNT(*) AS total FROM pengguna")
    )['total'];
?>

<!-- HEADER DASHBOARD -->
<div class="row mb-4">
    <div class="col-12">
        <div class="p-4 rounded border border-primary shadow-sm bg-light">
            <h3 class="fw-bold mb-1">Dashboard Sistem Akademik</h3>
            <p class="text-muted mb-0">
                Ringkasan data utama dan status sistem
            </p>
        </div>
    </div>
</div>

<!-- KARTU RINGKASAN -->
<div class="row g-4">

    <!-- MAHASISWA -->
    <div class="col-md-4">
        <div class="card border-primary shadow-lg h-100">
            <div class="card-body text-center">
                <div class="mb-3">
                    <span class="badge bg-primary fs-6 px-3 py-2">
                        MAHASISWA
                    </span>
                </div>

                <h1 class="display-4 fw-bold text-primary">
                    <?= $total_mahasiswa ?>
                </h1>

                <p class="fw-semibold mb-1">
                    Total Mahasiswa Terdaftar
                </p>

                <small class="text-muted">
                    Data aktif dalam sistem akademik
                </small>
            </div>

            <div class="card-footer bg-transparent text-center">
                <a href="index.php?page=mahasiswa/list"
                   class="btn btn-outline-primary btn-sm">
                    Kelola Mahasiswa
                </a>
            </div>
        </div>
    </div>

    <!-- PROGRAM STUDI -->
    <div class="col-md-4">
        <div class="card border-success shadow-lg h-100">
            <div class="card-body text-center">
                <div class="mb-3">
                    <span class="badge bg-success fs-6 px-3 py-2">
                        PROGRAM STUDI
                    </span>
                </div>

                <h1 class="display-4 fw-bold text-success">
                    <?= $total_prodi ?>
                </h1>

                <p class="fw-semibold mb-1">
                    Program Studi Aktif
                </p>

                <small class="text-muted">
                    Data jurusan & jenjang pendidikan
                </small>
            </div>

            <div class="card-footer bg-transparent text-center">
                <a href="index.php?page=program_studi/list"
                   class="btn btn-outline-success btn-sm">
                    Kelola Program Studi
                </a>
            </div>
        </div>
    </div>

    <!-- PENGGUNA -->
    <div class="col-md-4">
        <div class="card border-warning shadow-lg h-100">
            <div class="card-body text-center">
                <div class="mb-3">
                    <span class="badge bg-warning text-dark fs-6 px-3 py-2">
                        PENGGUNA
                    </span>
                </div>

                <h1 class="display-4 fw-bold text-warning">
                    <?= $total_user ?>
                </h1>

                <p class="fw-semibold mb-1">
                    Akun Terdaftar
                </p>

                <small class="text-muted">
                    Pengguna yang memiliki akses sistem
                </small>
            </div>

            <div class="card-footer bg-transparent text-center">
                <span class="badge bg-success px-3 py-2">
                    Session Aktif
                </span>
            </div>
        </div>
    </div>

</div>

<!-- INFORMASI SISTEM -->
<div class="row mt-5">
    <div class="col-12">
        <div class="card border-secondary shadow-sm">
            <div class="card-body">
                <h6 class="fw-bold mb-2">Informasi Sistem</h6>
                <ul class="mb-0 text-muted">
                    <li>Sistem menggunakan session login dengan timeout 15 menit</li>
                    <li>Password pengguna disimpan menggunakan metode hashing MD5</li>
                    <li>Data dikelola secara terpisah per modul</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php
/* ===============================
   ROUTING LAIN
================================ */
} elseif ($page == 'mahasiswa/list') {
    include "mahasiswa/list.php";
} elseif ($page == 'mahasiswa/tambah') {
    include "mahasiswa/tambah.php";
} elseif ($page == 'mahasiswa/proses_tambah') {
    include "mahasiswa/proses_tambah.php";
} elseif ($page == 'mahasiswa/edit') {
    include "mahasiswa/edit.php";
} elseif ($page == 'mahasiswa/hapus') {
    include "mahasiswa/hapus.php";
} elseif ($page == 'program_studi/list') {
    include "program_studi/list.php";
} elseif ($page == 'program_studi/tambah') {
    include "program_studi/tambah.php";
} elseif ($page == 'program_studi/edit') {
    include "program_studi/edit.php";
} elseif ($page == 'pengguna/profil') {
    include "pengguna/profil.php";
} elseif ($page == 'pengguna/edit_profil') {
    include "pengguna/edit_profil.php";
} elseif ($page == 'pengguna/proses_edit_profil') {
    include "pengguna/proses_edit_profil.php";
} else {
    echo "<div class='alert alert-danger'>Halaman tidak ditemukan</div>";
}
?>

</div>

<!-- =============================== FOOTER ================================ -->
<footer class="mt-auto bg-light border-top border-3 border-primary shadow-sm">
    <div class="container py-3">
        <div class="row align-items-center">

            <!-- KIRI -->
            <div class="col-md-6 text-center text-md-start mb-2 mb-md-0">
                <span class="fw-semibold text-primary">
                    Sistem Akademik
                </span>
                <span class="text-muted small d-block">
                    Aplikasi Manajemen Data Akademik
                </span>
            </div>

            <!-- KANAN -->
            <div class="col-md-6 text-center text-md-end">
                <span class="text-muted small">
                    © <?= date("Y"); ?> |
                    Pemrograman Web Dinamis
                </span>
            </div>

        </div>
    </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
