<?php
    include "../config/koneksi.php"
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Perpustakaan</title>
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/style2.css">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
</head>
<body class="admin-page">

<header>
    <h1>Dashboard Admin</h1>
</header>

<nav class="sidebar">
    <a href="#">Data Buku</a>
    <a href="peminjaman.php">Peminjaman</a>
</nav>

<main class="admin-content">
    <div class="container">
<?php
    include "modal/tambah_buku.php";
?>
<h2>Data Buku</h2>
        <button class="btn-tambah" type="submit" name="simpan" data-bs-toggle="modal" data-bs-target="#tambah_buku">+ Tambah Buku</button>
        <table class="table table-striped table-hover mt-5">
       <tr>
           <th>No</th>
           <th>Judul</th>
           <th>Penulis</th>
           <th>Status</th>
           <th>Stok</th>
           <th>Aksi</th>
       </tr>
<?php
            $no = 1;
            $query = "SELECT * FROM tbuku ORDER BY judul ASC";
            $result = mysqli_query($koneksi, $query);
            while ($data = mysqli_fetch_assoc($result)){
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['judul'] ?></td>
                <td><?= $data['penulis'] ?></td>
                <td><?= $data['status'] ?></td>
                <td><?= $data['stok'] ?></td>
                
                <td>
                    <button class="btn btn-primary
                     btn-sm" data-bs-toggle="modal"
                     data-bs-target="#edit<?= $data['id_buku']?>">Edit
                    </button>
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                     data-bs-target="#hapus<?= $data['id_buku']?>">Hapus</button>
                </td>
            </tr>
        <?php 
           //memanggil modal edit siswa  
             include "modal/edit_buku.php";  
             include "modal/hapus_buku.php";
             
            }
        ?>
        </table>
</div>
<div class="btn-keluar">
    <a href="../user/beranda.php">
    <button>Kembali Halaman User</button></a>
</div>
</main>
<script src="../bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
</body>
</html>