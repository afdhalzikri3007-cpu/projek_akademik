<?php
if (!isset($db)) { 
    include "koneksi.php"; 
}
$no = 1;
$data = mysqli_query($db, "SELECT * FROM program_studi ORDER BY id DESC");
?>


<div class="card border-success shadow-lg">
    <!-- HEADER -->
    <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
        <div>
            <h5 class="mb-0 fw-bold">Program Studi</h5>
            <small>Daftar program studi yang tersedia</small>
        </div>
        <a href="index.php?page=program_studi/tambah" class="btn btn-light btn-sm fw-semibold">
            + Tambah Program Studi
        </a>
    </div>

    <!-- BODY -->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light text-center">
                    <tr>
                        <th width="60">No</th>
                        <th>Nama Program Studi</th>
                        <th>Jenjang</th>
                        <th>Akreditasi</th>
                        <th>Keterangan</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php while ($row = mysqli_fetch_assoc($data)) { ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td class="fw-semibold"><?= $row['nama_prodi'] ?></td>
                        <td><?= $row['jenjang'] ?></td>
                        <td>
                            <span class="badge bg-primary">
                                <?= $row['akreditasi'] ?>
                            </span>
                        </td>
                        <td><?= $row['keterangan'] ?></td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm">
                                <a href="index.php?page=program_studi/edit&id=<?= $row['id'] ?>"
                                   class="btn btn-warning">
                                    Edit
                                </a>
                                <a href="program_studi/hapus.php?id=<?= $row['id'] ?>"
                                   onclick="return confirm('Hapus data ini?')"
                                   class="btn btn-danger">
                                    Hapus
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- FOOTER -->
    <div class="card-footer bg-light text-muted small">
        Total program studi: <?= mysqli_num_rows($data); ?>
    </div>
</div>
