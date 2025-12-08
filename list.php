<?php
if (!isset($db)) { include "koneksi.php"; }
$no = 1;
$data = mysqli_query($db, "SELECT * FROM mahasiswa");
?>

<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Daftar Mahasiswa</h5>
    </div>

    <div class="card-body">
        <a href="index.php?page=tambah" class="btn btn-success mb-3">
            + Tambah Data
        </a>

        <table class="table table-hover table-bordered">
            <thead class="table-light">
            <tr class="text-center">
                <th style="width: 60px;">No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th style="width: 120px;">Aksi</th>
            </tr>
            </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_array($data)) { ?>
        <tr>
            <td class="text-center"><?php echo $no++; ?></td>
            <td><?php echo $row['nim']; ?></td>
            <td><?php echo $row['nama_mhs']; ?></td>
            <td><?php echo date('d M Y', strtotime($row['tgl_lahir'])); ?></td>
            <td><?php echo $row['alamat']; ?></td>
            <td class="text-center">
                <div class="btn-group">
                    <a href="index.php?page=edit&id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="hapus.php?id=<?php echo $row['id']; ?>"
                       onclick="return confirm('Yakin hapus?')"
                       class="btn btn-danger btn-sm">Hapus</a>
                </div>
            </td>
        </tr>
        <?php } ?>
        </tbody>
        </table>
    </div>
</div>
