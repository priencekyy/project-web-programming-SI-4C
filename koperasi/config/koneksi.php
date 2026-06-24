<?php

$koneksi = mysqli_connect(
    "localhost",
    "root",
    "",
    "db_kkmp"
);

if(!$koneksi){
    die("Koneksi Gagal : ".mysqli_connect_error());
}

?>