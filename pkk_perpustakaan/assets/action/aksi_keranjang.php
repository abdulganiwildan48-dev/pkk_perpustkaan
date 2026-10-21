<?php
include "../config/koneksi.php";

if(isset($_POST['simpan'])){
    $id_buku = $_POST['id_buku'];
 
    // jika validasi tidak lolos
    $cek_buku = mysqli_query($koneksi, "SELECT * FROM tbuku WHERE id_buku = '$id_buku'");
    $data_buku = mysqli_fetch_assoc($cek_buku);

    if($data_buku['stok'] <= 0 || strtolower($data_buku['status']) == 'tidak tersedia'){ 
        echo "<script>
            alert('Maaf, buku ini sedang tidak tersedia atau stoknya telah habis!');
            window.location.href ='../user/beranda.php';
        </script>";
        exit(); // Menghentikan script PHP agar insert di bawah tidak berjalan
    }

    // JIKA LOLOS VALIDASI, BARU MASUK KE KERANJANG
    $query = "INSERT INTO tkeranjang (id_buku) VALUES ('$id_buku')";
    $result = mysqli_query($koneksi, $query);

    if($result){
        echo "<script>
            alert('Berhasil menambahkan ke keranjang');
            window.location.href ='../user/beranda.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal menambahkan ke keranjang');
            window.location.href ='../user/beranda.php';
        </script>";
    }
}
?>