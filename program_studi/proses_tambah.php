<?php
include "../koneksi.php";

if (isset($_POST['submit'])) {

    $nama_prodi  = $_POST['nama_prodi'];
    $jenjang     = $_POST['jenjang'];
    $akreditasi  = $_POST['akreditasi'];
    $keterangan  = $_POST['keterangan'];

    $sql = mysqli_query($db, "INSERT INTO program_studi
        (nama_prodi, jenjang, akreditasi, keterangan)
        VALUES
        ('$nama_prodi', '$jenjang', '$akreditasi', '$keterangan')
    ");

    if ($sql) {
        header("Location: ../index.php?page=program_studi/list");
        exit;
    } else {
        echo "Gagal menyimpan data";
    }
}
?>
