<?php

//koneksi ke database akademik
$server = "localhost";
$user = "isi-username-db-anda";
$pass = "isi-password-db-anda";
$dbname = "perpustakaan";

$koneksi = mysqli_connect($server,$user,$pass,$dbname);
if(mysqli_connect_errno()){
    echo "Koneksi database gagal ".mysqli_connect_error();
}

?>