<?php

session_start();

include "../config/koneksi.php";

$id = $_GET['id'];

mysqli_query($koneksi,"
DELETE FROM pengelola
WHERE id_pengelola='$id'
");

echo "
<script>
alert('Data Berhasil Dihapus');
window.location='index.php';
</script>
";
?>