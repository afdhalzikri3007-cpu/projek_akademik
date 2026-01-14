<?php
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];
$q = mysqli_query($db, "SELECT * FROM pengguna WHERE username='$username'");
$data = mysqli_fetch_assoc($q);
?>
<!-- PENTING: PHP DITUTUP DI SINI -->

<div class="row justify-content-center">
<div class="col-md-6">

<div class="card border-primary shadow-lg">
<div class="card-header bg-primary text-white text-center">
    <h4 class="mb-0 fw-bold">Profil Pengguna</h4>
</div>

<div class="card-body p-4">
    <p><b>Username</b> : <?= $data['username'] ?></p>
    <p><b>Nama Lengkap</b> : <?= $data['nama_lengkap'] ?></p>
    <p><b>Email</b> : <?= $data['email'] ?></p>

    <div class="d-grid mt-3">
        <a href="index.php?page=pengguna/edit_profil" class="btn btn-primary fw-semibold">
            Edit Profil
        </a>
    </div>
</div>

<div class="card-footer text-center small text-muted">
    © <?= date("Y"); ?> Sistem Akademik
</div>
</div>

</div>
</div>
