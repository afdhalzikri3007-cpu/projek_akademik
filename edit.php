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

    header("Location: index.php?page=list");
    exit;
}

// ambil data lama
$q = mysqli_query($db, "SELECT * FROM mahasiswa WHERE id='$id'");
$data = mysqli_fetch_assoc($q);
?>


<div class="card shadow-sm">
    <div class="card-header bg-warning text-white">
        <h5 class="mb-0">Edit Data Mahasiswa</h5>
    </div>

    <div class="card-body">
        <form method="POST" action="">
            <div class="mb-3">
                <label class="form-label">NIM</label>
                <input type="text" name="nim" class="form-control" value="<?php echo htmlspecialchars($data['nim']); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Mahasiswa</label>
                <input type="text" name="nama_mhs" class="form-control" value="<?php echo htmlspecialchars($data['nama_mhs']); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" class="form-control" value="<?php echo htmlspecialchars($data['tgl_lahir']); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" rows="3" required><?php echo htmlspecialchars($data['alamat']); ?></textarea>
            </div>

            <button type="submit" name="update" class="btn btn-primary">Update</button>
            <a href="index.php?page=list" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
