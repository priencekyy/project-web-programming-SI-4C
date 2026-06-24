<?php

session_start();

include "../config/koneksi.php";

$id = $_GET['id'];

mysqli_query($koneksi,"
DELETE FROM pengurus
WHERE id_pengurus='$id'
");

echo "
<script>
alert('Data Berhasil Dihapus');
window.location='index.php';
</script>
";
?>