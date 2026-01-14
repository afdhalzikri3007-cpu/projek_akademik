<?php
include "koneksi.php";

if (isset($_POST['register'])) {

    $nama = $_POST['nama_lengkap'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); // MD5 sesuai instruksi dosen

    // Cek username sudah ada atau belum
    $cek = mysqli_query($db, "SELECT * FROM pengguna WHERE username='$username'");
    if (mysqli_num_rows($cek) > 0) {
        echo "Username sudah digunakan";
        exit;
    }

    // Simpan data
    $simpan = mysqli_query($db, "INSERT INTO pengguna (username, password, nama_lengkap)
                                 VALUES ('$username', '$password', '$nama')");

    if ($simpan) {
        header("Location: login.php");
        exit;
    } else {
        echo "Registrasi gagal";
    }
}
?>
