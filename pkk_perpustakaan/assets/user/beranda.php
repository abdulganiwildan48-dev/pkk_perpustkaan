<?php
include "../config/koneksi.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Perpustakaan</title>
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/style2.css">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
</head>

<body>
    <header class="site-header py-4 mb-4">
        <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
            <div>
                <h1 class="site-title mb-1">Perpustakaan</h1>
                <p class="site-tagline mb-0">Temukan buku favoritmu, pinjam cepat, dan nikmati bacaan terbaik.</p>
            </div>
            <div class="header-actions mt-3 mt-md-0">
                <button class="btn btn-outline-light btn-sm me-2" data-bs-toggle="modal"
                    data-bs-target="#beranda.php">Home</button>
                <button class="btn btn-light btn-login btn-sm" data-bs-toggle="modal"
                    data-bs-target="#login">Login</button>
            </div>
        </div>
    </header>
    <?php
    include "modal/keranjangbuku.php";
?>
    <main class="container">
        <section class="hero p-4 p-md-5 rounded-4 mb-5 text-white text-center shadow-sm">
            <h2 class="display-6 mb-3">Selamat Datang di Perpustakaan</h2>
            <p class="lead mb-4">Koleksi buku lengkap dan layanan pinjam cepat untuk semua anggota.</p>
            <button class="btn btn-light btn-lg" data-bs-toggle="modal" data-bs-target="#keranjang">Lihat
                Keranjang</button>
        </section>

        <section class="books-section">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start mb-4">
                <div>
                    <h2>Buku Populer</h2>
                    <p class="text-muted">Pilih koleksi favorit dan pinjam sekarang.</p>
                </div>
            </div>

            <div class="row g-4 justify-content-center">
                <?php
                $query = "SELECT * FROM tbuku";
                $result = mysqli_query($koneksi, $query);
                while ($data = mysqli_fetch_assoc($result)){
                ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <form action="../action/aksi_keranjang.php" method="post" class="h-100">
                        <div class="card book-card h-100 shadow-sm">
                            <div class="book-card-image text-center p-3">
                                <?php if(!empty($data['gambar'])) { ?>
                                <img src="../img/<?= $data['gambar'] ?>" alt="<?= $data['judul'] ?>" class="img-fluid">
                                <?php } else { ?>
                                <div class="book-placeholder">Tanpa Gambar</div>
                                <?php } ?>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h3 class="fs-5 mb-2"><?= $data['judul'] ?></h3>
                                <p class="text-secondary mb-2">Penulis: <?= $data['penulis'] ?></p>
                                <p class="text-muted mb-3">Stok: <?= $data['stok'] ?></p>
                                <input type="hidden" value="<?= $data['id_buku'] ?>" name="id_buku">
                                <?php if ($data['stok'] <= 0 || strtolower($data['status']) == 'tidak tersedia') { ?>
                                <button type="button" class="btn btn-outline-secondary mt-auto" disabled>Tidak
                                    Tersedia</button>
                                <?php } else { ?>
                                <button type="submit" name="simpan" class="btn btn-primary mt-auto">Pinjam</button>
                                <?php } ?>
                            </div>
                        </div>
                    </form>
                </div>
                <?php
                }
                ?>
            </div>
        </section>
    </main>
    <?php
        include "modal/login.php";
    ?>
    <script src="../bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
</body>

</html>