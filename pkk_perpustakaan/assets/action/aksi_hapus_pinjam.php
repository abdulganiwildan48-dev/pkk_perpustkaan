<?php
include "../config/koneksi.php";

if(isset($_POST['hapus'])){
    $id = $_POST['id_pinjam'];
    $idb = $_POST['id_buku'];
 
$query = "DELETE FROM tpeminjaman WHERE id_pinjam = '$id'";
$query5 = "UPDATE tbuku SET status = 'tersedia' , stok = stok + 1 WHERE id_buku = '$idb'";

$result = mysqli_query($koneksi,$query);
$result5 = mysqli_query($koneksi,$query5); 

    if($result && $result5){
        echo "<script>
            alert('berhasil hapus data atau kembalikan buku');
                window.location.href ='../admin/peminjaman.php';
        </script>";
    }else{
        echo "< script>
        alert('gagal menghapus data');
                window.location.href ='../admin/peminjaman.php';
           
    </script>";
    }
}
?>