<?php
include "koneksi.php";
$page = isset($_GET['page']) ? $_GET['page'] : 'list';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sistem Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="index.php?page=list">Sistem Akademik</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php?page=list">List Data</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?page=tambah">Tambah Data</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- KONTEN -->
<div class="container flex-grow-1 mt-4">
    <?php
        if ($page == 'list')      include "list.php";
        elseif ($page == 'tambah') include "tambah.php";
        elseif ($page == 'edit')   include "edit.php";
        else echo "<h5>Halaman tidak ditemukan</h5>";
    ?>
</div>

<!-- FOOTER -->
<footer class="bg-light text-center p-3 border-top">
  <p class="mb-0">© <?php echo date("Y"); ?> Sistem Akademik | Pemrograman Web Dinamis</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
