<?php
session_start();
include "../koneksi.php";

if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}

if (isset($_POST['simpan'])) {
    $username = $_SESSION['username'];
    $nama = $_POST['nama_lengkap'];
    $password = $_POST['password'];
    $konfirmasi = $_POST['konfirmasi'];

    if ($nama == "") {
        die("Nama lengkap tidak boleh kosong");
    }

    if ($password != "") {
        if ($password != $konfirmasi) {
            die("Password dan konfirmasi tidak sama");
        }
        if (strlen($password) < 6) {
            die("Password minimal 6 karakter");
        }

        $pass_md5 = md5($password);
        mysqli_query($db, "UPDATE pengguna 
                           SET nama_lengkap='$nama', password='$pass_md5' 
                           WHERE username='$username'");
    } else {
        mysqli_query($db, "UPDATE pengguna 
                           SET nama_lengkap='$nama' 
                           WHERE username='$username'");
    }

    $_SESSION['nama_lengkap'] = $nama;
  header("Location: index.php?page=pengguna/profil");
exit;


}
?>
