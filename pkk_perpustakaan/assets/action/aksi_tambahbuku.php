<?php

    include "../config/koneksi.php";

    if(isset($_POST['simpan'])){
        $judul = $_POST['judul'];
        $penulis = $_POST['penulis'];
        $stok = $_POST['stok'];

        // Validasi stok tidak boleh lebih dari 20
        if($stok > 20){
            echo "<script>
                alert('Stok tidak boleh lebih dari 20');
                window.location.href ='../admin/admin.php';
            </script>";
            exit;
        }

        $gambar = $_FILES['gambar'] ['name'];
        $tmp = $_FILES['gambar'] ['tmp_name'];

        move_uploaded_file($tmp, "../img/" . $gambar);

    $query = "INSERT INTO tbuku (judul, penulis, gambar, stok) VALUES ('$judul','$penulis', '$gambar', '$stok')";
        echo $gambar;
    $result = mysqli_query($koneksi,$query);
    if($result){
        echo "<script>
            alert('berhasil menambahkan');
                window.location.href ='../admin/admin.php';
        </script>";
    }else{
        echo "<script>
        alert('');
           
    </script>";
    }
    }
?>