<?php
if (!isset($db)) { include "koneksi.php"; }
$no = 1;
$data = mysqli_query($db, "SELECT * FROM mahasiswa");
?>

<div class="card border-primary shadow-lg">
    <!-- HEADER -->
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <div>
            <h5 class="mb-0 fw-bold">Data Mahasiswa</h5>
            <small>Daftar mahasiswa terdaftar dalam sistem</small>
        </div>
        <a href="index.php?page=mahasiswa/tambah" class="btn btn-light btn-sm fw-semibold">
            + Tambah Mahasiswa
        </a>
    </div>

    <!-- BODY -->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light text-center">
                    <tr>
                        <th width="60">No</th>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php while ($row = mysqli_fetch_assoc($data)) { ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= $row['nim'] ?></td>
                        <td class="fw-semibold"><?= $row['nama_mhs'] ?></td>
                        <td><?= date('d M Y', strtotime($row['tgl_lahir'])) ?></td>
                        <td><?= $row['alamat'] ?></td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm">
                                <a href="index.php?page=mahasiswa/edit&id=<?= $row['id'] ?>"
                                   class="btn btn-warning">
                                    Edit
                                </a>
                                <a href="index.php?page=mahasiswa/hapus&id=<?= $row['id'] ?>"
                                   onclick="return confirm('Yakin hapus data ini?')"
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
        Total data mahasiswa ditampilkan: <?= mysqli_num_rows($data); ?>
    </div>
</div>
