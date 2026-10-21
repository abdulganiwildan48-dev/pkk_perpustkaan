<?php
include "../config/koneksi.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog</title>
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/style2.css">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
</head>

<body class="admin-page">
    <header>
        <h1>Dashboard Admin</h1>
    </header>

    <nav class="sidebar">
        <a href="admin.php">Data Buku</a>
        <a href="#">Peminjaman</a>
    </nav>

    <main class="admin-content">
        <div class="detail">
            <div class="judul">
                <h1>Detail Peminjaman</h1>
            </div>
        <table class="table table-striped table-hover mt-5">
            <thead>
                <tr>
                    <th>Nama Peminjam</th>
                    <th>Judul Buku</th>
                    <th>Alamat</th>
                    <th>No. Telp</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Denda</th> <!-- 1. TAMBAH HEADER DENDA -->
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT tpeminjaman.id_pinjam, tbuku.id_buku, tpeminjaman.nama AS nama_peminjam, tbuku.judul AS judul_buku, tpeminjaman.tanggal_pinjam AS tgl_pinjam, tdetail_pinjam.tanggal_kembali AS tgl_kembali, tpeminjaman.Alamat, tpeminjaman.Telp
                FROM tpeminjaman 
                INNER JOIN tdetail_pinjam ON tdetail_pinjam.id_pinjam = tpeminjaman.id_pinjam
                INNER JOIN tbuku ON tdetail_pinjam.id_buku = tbuku.id_buku";
                
                $result = mysqli_query($koneksi, $query);
                while($data = mysqli_fetch_assoc($result)){
                    
                 
                    $tgl1 = strtotime($data['tgl_pinjam']);
                    $tgl2 = strtotime($data['tgl_kembali']);
                    $jarak = $tgl2 - $tgl1;
                    $selisih_hari = $jarak / 60 / 60 / 24; // Mengubah detik ke hari

                   
                    $terlambat = $selisih_hari - 3;
                    
                    // Jika terlambat lebih dari 0 hari, kalikan 2000. Jika tidak, denda = 0
                    if ($terlambat > 0) {
                        $total_denda = $terlambat * 2000;
                    } else {
                        $total_denda = 0;
                    }
                ?>
                <tr>
                    <td><?=$data['nama_peminjam']?></td>
                    <td><?=$data['judul_buku']?></td>
                    <td><?=$data['Alamat']?></td>
                    <td><?=$data['Telp']?></td>
                    <td><?=$data['tgl_pinjam']?></td>
                    <td><?=$data['tgl_kembali']?></td>
                    <td>
                        <!-- 4. TAMPILKAN HASIL DENDA -->
                        Rp <?=$total_denda?>
                    </td>
                    <td>
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target='#modal_pinjam<?=$data['id_pinjam']?>'>Kembalikan</button>
                    </td>
                </tr>
                <?php
                    include "modal/hapus_peminjaman.php";
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="btn-keluar">
        <a href="../user/beranda.php">
            <button>Kembali Halaman User</button></a>
    </div>
    <script src="../bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
</body>
</html>