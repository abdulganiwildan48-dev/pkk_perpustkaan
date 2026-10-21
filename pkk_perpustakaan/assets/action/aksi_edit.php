<?php
include "../config/koneksi.php";

if(isset($_POST['update'])){
$id = $_POST ['id_buku'];
$judul = $_POST['judul'];
$penulis = $_POST['penulis'];
$status = $_POST['status'];
$stok = $_POST['stok'];

// Validasi stok tidak boleh lebih dari 20
if($stok > 20){
    echo "<script>
        alert('Stok tidak boleh lebih dari 20');
        window.location.href ='../admin/admin.php';
    </script>";
    exit;
}

echo $_FILES['gambar']['name'];

if ($_FILES['gambar']['name'] != '') {
    # code...
    $gambar = $_FILES['gambar']['name'];
    move_uploaded_file( $_FILES['gambar']['tmp_name'],"../img/" .$gambar);

} else {
    
    $gambar = $_POST['gambar_lama'];
}



$query = "UPDATE tbuku SET judul = '$judul', penulis = '$penulis',status = '$status',gambar = '$gambar', stok = '$stok' WHERE id_buku = '$id'";

$result = mysqli_query($koneksi,$query);
    if($result){
        echo "<script>
            alert('berhasil ubah data buku');
                window.location.href ='../admin/admin.php';
        </script>";
    }else{
        echo "<script>
        alert('');
           
    </script>";
    }
}
?>