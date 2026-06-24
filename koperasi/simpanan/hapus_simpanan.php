<?php
include "../config/koneksi.php";

if(!isset($_GET['id'])){
    die("ID tidak ditemukan!");
}

$id = intval($_GET['id']);

$query = mysqli_query($koneksi,"DELETE FROM simpanan WHERE id_simpanan=$id");

if($query){
    header("Location: index.php");
    exit;
} else {
    die("Gagal hapus: " . mysqli_error($koneksi));
}
?>