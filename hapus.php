<?php
include "koneksi.php";
$id = $_GET['id'];

$hapus = mysqli_query($db, "DELETE FROM mahasiswa WHERE id=$id");
if ($hapus) {
    header("Location: index.php?page=list");
} else {
    echo "Gagal menghapus data";
}
?>
