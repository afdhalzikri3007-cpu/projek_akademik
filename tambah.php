<div class="card shadow-sm">
    <div class="card-header bg-success text-white">
        <h5 class="mb-0">Tambah Data Mahasiswa</h5>
    </div>

    <div class="card-body">
        <form action="proses_tambah.php" method="POST">
            <div class="mb-3">
                <label class="form-label">NIM</label>
                <input type="text" name="nim" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Mahasiswa</label>
                <input type="text" name="nama_mhs" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" rows="3" required></textarea>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            <a href="index.php?page=list" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
