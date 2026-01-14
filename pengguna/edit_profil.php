<?php
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];
$q = mysqli_query($db, "SELECT * FROM pengguna WHERE username='$username'");
$data = mysqli_fetch_assoc($q);
?>

<div class="row justify-content-center mb-5 pb-4">
    <div class="col-md-6">

<div class="card border-warning shadow-lg">
<div class="card-header bg-warning text-dark text-center">
    <h4 class="mb-0 fw-bold">Edit Profil</h4>
</div>

<div class="card-body p-4">
<form action="index.php?page=pengguna/proses_edit_profil" method="POST">

    <div class="mb-3">
        <label class="form-label fw-semibold">Username</label>
        <input type="text" class="form-control" value="<?= $data['username'] ?>" readonly>
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" class="form-control" value="<?= $data['nama_lengkap'] ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold">Email</label>
        <input type="email" class="form-control" value="<?= $data['email'] ?>" readonly>
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold">Password Baru (opsional)</label>
        <input type="password" name="password" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold">Konfirmasi Password</label>
        <input type="password" name="konfirmasi" class="form-control">
    </div>

    <div class="d-grid">
        <button type="submit" name="simpan" class="btn btn-warning fw-semibold">
            Simpan Perubahan
        </button>
    </div>

</form>
</div>

<div class="card-footer text-center small text-muted">
    © <?= date("Y"); ?> Sistem Akademik
</div>
</div>

</div>
</div>
