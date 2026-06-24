<?php
include "../config/koneksi.php";

$id = $_GET['id'];

mysqli_query($koneksi,"DELETE FROM pinjaman WHERE id_pinjaman='$id'");

header("Location: index.php");
?>