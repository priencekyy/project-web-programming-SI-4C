<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}

if($_SESSION['level'] != 'admin'){
    header("Location: ../admin/dashboard.php");
    exit;
}

include "../config/koneksi.php";

$data = mysqli_query($koneksi,"
SELECT * FROM pengurus
ORDER BY id_pengurus DESC
");

$total = mysqli_num_rows($data);
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">

<title>Data Pengelola KKMP</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

body{
background:
radial-gradient(circle at top left,#ef4444 0%,transparent 30%),
radial-gradient(circle at bottom right,#2563eb 0%,transparent 30%),
linear-gradient(135deg,#020617,#0f172a,#111827);
min-height:100vh;
padding:30px;
}

.vip-card{
background:rgba(255,255,255,.08);
backdrop-filter:blur(25px);
border-radius:30px;
padding:30px;
color:white;
}

.table{
color:white;
}

.table thead{
background:rgba(255,255,255,.15);
}

.btn-outline-light{
    border:1px solid rgba(255,255,255,.25);
    color:white;
    border-radius:12px;
    padding:10px 18px;
    transition:all .3s ease;
}

.btn-outline-light:hover{
    background:linear-gradient(
        135deg,
        #3b82f6,
        #2563eb
    );

    border-color:#3b82f6;
    color:white;

    transform:translateY(-3px);

    box-shadow:
    0 10px 25px rgba(37,99,235,.45);
}

</style>

</head>

<body>

<div class="container-fluid">

<div class="vip-card">

<div class="d-flex justify-content-between">

<div>

<h2>
<i class="fas fa-briefcase"></i>
Data Pengelola
</h2>

<p>Koperasi Kelurahan Merah Putih Indonesia</p>

</div>

<div>

<h4>Total : <?= $total; ?></h4>

</div>

</div>

<hr>

<div class="d-flex justify-content-between align-items-center mb-3">

    <a href="tambah_pengelola.php" class="btn btn-success">
        <i class="fas fa-plus"></i>
        Tambah Pengelola
    </a>

    <a href="../admin/dashboard.php" class="btn btn-outline-light">
        <i class="fas fa-home"></i>
        Dashboard
    </a>

</div>

<hr>

<div class="table-responsive">

<table class="table table-hover">

<thead>

<tr>
<th>No</th>
<th>Nama</th>
<th>Jabatan</th>
<th>Alamat</th>
<th>Aksi</th>
</tr>

</thead>

<tbody>

<?php $no=1; while($d=mysqli_fetch_assoc($data)){ ?>

<tr>

<td><?= $no++; ?></td>
<td><?= $d['nama']; ?></td>
<td><?= $d['jabatan']; ?></td>
<td><?= $d['alamat']; ?></td>

<td>

<a href="edit_pengelola.php?id=<?= $d['id_pengelola']; ?>"
class="btn btn-warning btn-sm">

<i class="fas fa-edit"></i>

</a>

<a href="hapus_pengelola.php?id=<?= $d['id_pengelola']; ?>"
onclick="return confirm('Hapus Data?')"
class="btn btn-danger btn-sm">

<i class="fas fa-trash"></i>

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</div>

</body>
</html>