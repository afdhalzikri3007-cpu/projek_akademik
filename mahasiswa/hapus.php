<?php
include "koneksi.php";

// validasi parameter id
if (!isset($_GET['id'])) {
    header("Location: ../index.php?page=mahasiswa/list");
    exit;
}

$id = $_GET['id'];

// proses hapus data
$sql = "DELETE FROM mahasiswa WHERE id='$id'";
$hapus = mysqli_query($db, $sql);

if ($hapus) {
    header("Location: index.php?page=mahasiswa/list");
    exit;
} else {
    echo "Gagal menghapus data";
}
?>
