<?php

session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}

include "../config/koneksi.php";

$id = $_GET['id'];

mysqli_query($koneksi,"
DELETE FROM anggota
WHERE id_anggota='$id'
");

echo "
<script>
alert('Data berhasil dihapus');
window.location='index.php';
</script>
";
?>