<?php
include "koneksi.php";

if (!isset($_GET['id'])) {
    header("Location: index.php?page=list");
    exit;
}

$id = $_GET['id'];

// proses update
if (isset($_POST['update'])) {
    $nim       = $_POST['nim'];
    $nama_mhs  = $_POST['nama_mhs'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat    = $_POST['alamat'];

    $sql = "UPDATE mahasiswa SET 
                nim='$nim',
                nama_mhs='$nama_mhs',
                tgl_lahir='$tgl_lahir',
                alamat='$alamat'
            WHERE id='$id'";
    mysqli_query($db, $sql);

        header("Location: index.php?page=mahasiswa/list");
    exit;
}

// ambil data lama
$q = mysqli_query($db, "SELECT * FROM mahasiswa WHERE id='$id'");
$data = mysqli_fetch_assoc($q);
?>



<div class="card border-warning shadow-lg">
    <div class="card-header bg-warning text-white">
        <h5 class="mb-0 fw-bold">Edit Data Mahasiswa</h5>
        <small>Perbarui informasi mahasiswa</small>
    </div>

    <div class="card-body">
        <form method="POST">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">NIM</label>
                    <input type="text" name="nim" class="form-control"
                           value="<?= htmlspecialchars($data['nim']) ?>" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Nama Mahasiswa</label>
                    <input type="text" name="nama_mhs" class="form-control"
                           value="<?= htmlspecialchars($data['nama_mhs']) ?>" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control"
                           value="<?= $data['tgl_lahir'] ?>" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3" required><?= htmlspecialchars($data['alamat']) ?></textarea>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="index.php?page=mahasiswa/list" class="btn btn-secondary">
                    Batal
                </a>
                <button type="submit" name="update" class="btn btn-warning text-white">
                    Update Data
                </button>
            </div>
        </form>
    </div>
</div>
