<?php
//memulai session
    include "../config/koneksi.php";


    //mengecek
    if(isset($_POST['login'])){
      $username = $_POST['username'];
      $password = $_POST['password'];

      $result = mysqli_query($koneksi, "SELECT * FROM tuser where username = '$username' and '$password'");
       
      if(mysqli_num_rows($result) != 0){
        echo "<script>
        alert('login berhasil'); window.location.href = '../admin/admin.php'</script>";
      }else{
        echo "<script>
        alert('gagal'); window.location.href = '../user/beranda.php'</script>";
      }
    } 