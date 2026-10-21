<?php
include "../config/koneksi.php";

if(isset($_POST['simpan'])){

    $nama = $_POST['nama'];
    $id_buku = $_POST['id_buku'];
    $tgl_pinjam = $_POST['tanggal_pinjam'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];

    // 1. Insert ke tabel peminjaman utama
    // Catatan: Sangat disarankan menjabarkan nama kolomnya, contoh: INSERT INTO tpeminjaman (id_pinjam, nama, alamat, telp, tgl_pinjam)
    $query = "INSERT INTO tpeminjaman VALUES (null, '$nama', '$alamat', '$telp', '$tgl_pinjam')";
    $result = mysqli_query($koneksi, $query);

    // 2. Ambil ID pinjam yang baru saja terbuat
    $id_pinjam_baru = mysqli_insert_id($koneksi);

    if($result){
        // 3. Jalankan query sisanya menggunakan $id_pinjam_baru
        // Sesuaikan nama kolom di dalam kurung ( ... ) dengan yang ada di database kamu ya!
$query2 = "INSERT INTO tdetail_pinjam (id_detail, id_pinjam, id_buku, tanggal_kembali) 
           SELECT null, '$id_pinjam_baru', tkeranjang.id_buku, DATE_ADD(CURDATE(), INTERVAL 3 DAY) 
           FROM tkeranjang";
        $query4 = "UPDATE tbuku JOIN tkeranjang ON tbuku.id_buku = tkeranjang.id_buku SET tbuku.stok = tbuku.stok - 1";
        $query5 = "UPDATE tbuku SET status = 'tidak tersedia' WHERE stok <= 0";
        $query3 = "TRUNCATE tkeranjang";

        $result2 = mysqli_query($koneksi, $query2);
        $result4 = mysqli_query($koneksi, $query4);
        $result5 = mysqli_query($koneksi, $query5);
        $result3 = mysqli_query($koneksi, $query3);
 
        // Kita cek apakah query detail juga sukses
        if($result2){
            echo "<script>
                alert('Berhasil meminjam');
                window.location.href ='../user/beranda.php';
            </script>";
        } else {
            // Jika query2 gagal, kita cetak errornya di console browser untuk debug
            echo "<script>
                console.error('Gagal query detail: " . mysqli_error($koneksi) . "');
                alert('Gagal menyimpan detail peminjaman');
                window.location.href ='../user/beranda.php';
            </script>";
        }
    } else {
        // Jika query utama gagal
        echo "<script>
            console.error('Gagal query utama: " . mysqli_error($koneksi) . "');
            alert('Gagal meminjam (Data induk gagal masuk)');
            window.location.href ='../user/detail.php';
        </script>";
    }

} else if(isset($_POST['reset'])){
    $query = "TRUNCATE tkeranjang";
    $result = mysqli_query($koneksi, $query);
    if($result){
        echo "<script>
            alert('Berhasil reset');
            window.location.href ='../user/beranda.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal reset');
            window.location.href ='../user/beranda.php';
        </script>";
    }
}
?>