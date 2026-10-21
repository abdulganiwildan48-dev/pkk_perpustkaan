<?php

$hostname = "localhost";
$username = "root";
$password = "";
$db_name = "pkkperpustakaan";

$koneksi = mysqli_connect($hostname, $username, $password, $db_name);

if(!$koneksi){
    die("database gagal terhubung". mysqli_connect_error());
}
?>