<div class="card border-success shadow-lg">
    <div class="card-header bg-success text-white">
        <h5 class="mb-0 fw-bold">Tambah Data Mahasiswa</h5>
        <small>Form input data mahasiswa baru</small>
    </div>

    <div class="card-body">
        <form action="index.php?page=mahasiswa/proses_tambah" method="POST">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">NIM</label>
                    <input type="text" name="nim" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Nama Mahasiswa</label>
                    <input type="text" name="nama_mhs" class="form-control" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3" required></textarea>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="index.php?page=mahasiswa/list" class="btn btn-secondary">
                    Batal
                </a>
                <button type="submit" name="submit" class="btn btn-success">
                    Simpan Data
                </button>
            </div>
        </form>
    </div>
</div>
