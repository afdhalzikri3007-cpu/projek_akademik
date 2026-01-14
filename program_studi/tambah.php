<div class="card border-success shadow-lg">
    <div class="card-header bg-success text-white">
        <h5 class="mb-0 fw-bold">Tambah Program Studi</h5>
        <small>Form input program studi baru</small>
    </div>

    <div class="card-body">
        <form action="program_studi/proses_tambah.php" method="POST">
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Program Studi</label>
                <input type="text" name="nama_prodi" class="form-control" required>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Jenjang</label>
                    <select name="jenjang" class="form-select" required>
                        <option value="">-- Pilih --</option>
                        <option>D2</option>
                        <option>D3</option>
                        <option>D4</option>
                        <option>S2</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Akreditasi</label>
                    <input type="text" name="akreditasi" class="form-control" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Keterangan</label>
                <textarea name="keterangan" class="form-control" rows="3" required></textarea>
            </div>

            <div class="d-flex justify-content-between">
                <a href="index.php?page=program_studi/list" class="btn btn-secondary">
                    Batal
                </a>
                <button type="submit" name="submit" class="btn btn-success">
                    Simpan Data
                </button>
            </div>
        </form>
    </div>
</div>
