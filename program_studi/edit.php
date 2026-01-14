<?php
include "koneksi.php";

// VALIDASI ID

if (!isset($_GET['id'])) {
    header("Location: index.php?page=program_studi/list");
    exit;
}

$id = $_GET['id'];

// PROSES UPDATE
if (isset($_POST['update'])) {

    $nama_prodi   = $_POST['nama_prodi'];
    $jenjang      = $_POST['jenjang'];
    $akreditasi   = $_POST['akreditasi'];
    $keterangan   = $_POST['keterangan'];

    $sql = "UPDATE program_studi SET
                nama_prodi='$nama_prodi',
                jenjang='$jenjang',
                akreditasi='$akreditasi',
                keterangan='$keterangan'
            WHERE id='$id'";

    mysqli_query($db, $sql);

    header("Location: index.php?page=program_studi/list");
    exit;
}

// AMBIL DATA LAMA
$query = mysqli_query($db, "SELECT * FROM program_studi WHERE id='$id'");
$data  = mysqli_fetch_assoc($query);
?>


<div class="card border-warning shadow-lg">
    <div class="card-header bg-warning text-white">
        <h5 class="mb-0 fw-bold">Edit Program Studi</h5>
        <small>Perbarui data program studi</small>
    </div>

    <div class="card-body">
        <form method="POST">
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Program Studi</label>
                <input type="text" name="nama_prodi" class="form-control"
                       value="<?= $data['nama_prodi'] ?>" required>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Jenjang</label>
                    <select name="jenjang" class="form-select">
                        <?php foreach(['D2','D3','D4','S2'] as $j): ?>
                            <option value="<?= $j ?>" <?= $data['jenjang']==$j?'selected':'' ?>>
                                <?= $j ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Akreditasi</label>
                    <input type="text" name="akreditasi" class="form-control"
                           value="<?= $data['akreditasi'] ?>" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Keterangan</label>
                <textarea name="keterangan" class="form-control" rows="3"><?= $data['keterangan'] ?></textarea>
            </div>

            <div class="d-flex justify-content-between">
                <a href="index.php?page=program_studi/list" class="btn btn-secondary">
                    Batal
                </a>
                <button name="update" class="btn btn-warning text-white">
                    Update Data
                </button>
            </div>
        </form>
    </div>
</div>