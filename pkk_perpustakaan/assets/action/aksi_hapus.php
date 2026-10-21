<?php
include "../config/koneksi.php";

if(isset($_POST['hapus'])){
    $id = $_POST['id_buku'];

$query = "DELETE FROM tbuku WHERE id_buku = '$id'";

$result = mysqli_query($koneksi,$query);
    if($result){
        echo "<script>
            alert('berhasil hapus data buku');
                window.location.href ='../admin/admin.php';
        </script>";
    }else{
        echo "< script>
        alert('');
           
    </script>";
    }
}
?>