<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

include __DIR__ . "/config/koneksi.php";

$tgl_awal  = $_GET['awal'] ?? '';
$tgl_akhir = $_GET['akhir'] ?? '';

$filter = "";

if($tgl_awal && $tgl_akhir){
    $filter = "WHERE tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir'";
}

$pinjaman = mysqli_query($koneksi,"
    SELECT * FROM pinjaman $filter ORDER BY tanggal DESC
");

$simpanan = mysqli_query($koneksi,"
    SELECT * FROM simpanan $filter ORDER BY tanggal DESC
");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Laporan KKMP VIP</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    background:
    radial-gradient(circle at top left,#1e3a8a 0%,transparent 30%),
    radial-gradient(circle at bottom right,#0f766e 0%,transparent 30%),
    linear-gradient(135deg,#020617,#0f172a,#111827);

    min-height:100vh;
    color:#e2e8f0;
    font-family:'Poppins',sans-serif;
    padding:30px;
}

/* CARD VIP */

.vip{
    background:rgba(255,255,255,.06);
    backdrop-filter:blur(25px);
    border:1px solid rgba(255,255,255,.08);

    border-radius:24px;
    padding:28px;

    box-shadow:
    0 10px 35px rgba(0,0,0,.35);

    margin-bottom:25px;
}

/* HEADER */

.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}

.header h3{
    font-size:28px;
    font-weight:700;
    color:white;
    margin:0;
}

.header small{
    color:#94a3b8;
}

/* TOTAL BADGE */

.badge-total{
    background:linear-gradient(
        135deg,
        #2563eb,
        #4f46e5
    );

    color:white;
    padding:10px 20px;
    border-radius:50px;
    font-weight:600;

    box-shadow:
    0 8px 20px rgba(37,99,235,.35);
}

/* TABLE */

.table{
    color:#f8fafc !important;
    margin-bottom:0;
}

.table thead{
    background:
    linear-gradient(
        135deg,
        rgba(59,130,246,.35),
        rgba(99,102,241,.35)
    );
}

.table thead th{
    border:none !important;
    padding:16px;
    color:white;
    font-weight:600;
}

.table tbody td{
    border-color:rgba(255,255,255,.06);
    vertical-align:middle;
}

.table tbody tr{
    transition:.25s;
}

.table tbody tr:hover{
    background:rgba(255,255,255,.05);
    transform:scale(1.002);
}

/* SEARCH */

.filter-box input{
    background:rgba(255,255,255,.08);
    border:none;
    color:white;
    border-radius:14px;
    padding:12px;
}

.filter-box input:focus{
    background:rgba(255,255,255,.12);
    color:white;
    box-shadow:0 0 20px rgba(59,130,246,.3);
}

/* BUTTON TAMBAH */

.btn-custom{
    background:
    linear-gradient(
        135deg,
        #10b981,
        #059669
    );

    border:none;
    color:white;
    padding:10px 18px;
    border-radius:14px;
    font-weight:600;
    text-decoration:none;
    transition:.3s;
}

.btn-custom:hover{
    color:white;
    transform:translateY(-3px);

    box-shadow:
    0 10px 25px rgba(16,185,129,.4);
}

/* DASHBOARD BUTTON VIP */

.btn-dashboard{
    position:relative;
    overflow:hidden;

    background:
    linear-gradient(
        135deg,
        #2563eb,
        #4f46e5
    );

    border:none;
    color:white !important;

    padding:10px 22px;
    border-radius:14px;

    font-weight:600;
    letter-spacing:.4px;

    text-decoration:none;

    transition:.35s;

    box-shadow:
    0 8px 20px rgba(37,99,235,.35);
}

.btn-dashboard i{
    margin-right:8px;
}

.btn-dashboard:hover{

    color:white;

    transform:
    translateY(-3px);

    box-shadow:
    0 15px 30px rgba(37,99,235,.5);

    background:
    linear-gradient(
        135deg,
        #1d4ed8,
        #4338ca
    );
}

.btn-dashboard{
    display:inline-block;
    background:linear-gradient(135deg,#2563eb,#4f46e5);
    color:white !important;
    text-decoration:none;
    padding:10px 20px;
    border-radius:12px;
    border:none;
    font-weight:600;
    transition:.3s;
}

.btn-dashboard:hover{
    color:white !important;
    background:linear-gradient(135deg,#1d4ed8,#4338ca);
    transform:translateY(-2px);
}

/* BUTTON AKSI */

.btn-warning{
    border:none;
    border-radius:10px;
}

.btn-danger{
    border:none;
    border-radius:10px;
}

/* RESPONSIVE */

@media(max-width:768px){

    .header{
        flex-direction:column;
        gap:15px;
        align-items:flex-start;
    }

    .vip{
        padding:20px;
    }

}

.table{
    background: white;
    border-radius: 15px;
    overflow: hidden;
}

.table th{
    background: linear-gradient(135deg,#2563eb,#1d4ed8);
    color: white;
    text-align: center;
    vertical-align: middle;
    padding: 15px;
}

.table td{
    text-align: center;
    vertical-align: middle !important;
    padding: 18px;
    font-weight: 500;
}

.table tbody tr:hover{
    background: #f8fafc;
}

</style>

</head>

<body>

<div class="container">

<!-- HEADER -->
<div class="vip header">
    <h3>📊 LAPORAN KKMP</h3>

    <a href="http://localhost/koperasi/admin/dashboard.php" class="btn-dashboard">
    <i class="fas fa-home"></i>
    Dashboard
</a>

</div>

<!-- FILTER -->
<div class="vip filter-box">
<form method="GET" class="d-flex gap-2">
    <input type="date" name="awal" class="form-control" required>
    <input type="date" name="akhir" class="form-control" required>
    <button class="btn btn-success">Filter</button>
</form>
</div>

<!-- PINJAMAN -->
<div class="vip">
<h5>💰 Data Pinjaman</h5>

<table class="table table-borderless">
<thead>
<tr>
    <th>Tanggal</th>
    <th>Anggota</th>
    <th>Jumlah</th>
    <th>Status</th>
</tr>
</thead>

<tbody>
<?php if(mysqli_num_rows($pinjaman) > 0): ?>
    <?php while($d = mysqli_fetch_assoc($pinjaman)) : ?>
    <tr>
        <td><?= $d['tanggal'] ?></td>
        <td><?= $d['id_anggota'] ?></td>
        <td>Rp <?= number_format($d['jumlah_pinjaman'],0,',','.') ?></td>
        <td><?= $d['status'] ?></td>
    </tr>
    <?php endwhile; ?>
<?php else: ?>
<tr><td colspan="4">Tidak ada data pinjaman</td></tr>
<?php endif; ?>
</tbody>
</table>
</div>

<!-- SIMPANAN -->
<div class="vip">
<h5>💳 Data Simpanan</h5>

<table class="table table-borderless">
<thead>
<tr>
    <th>Tanggal</th>
    <th>Anggota</th>
    <th>Jenis</th>
    <th>Jumlah</th>
</tr>
</thead>

<tbody>
<?php if(mysqli_num_rows($simpanan) > 0): ?>
    <?php while($d = mysqli_fetch_assoc($simpanan)) : ?>
    <tr>
        <td><?= $d['tanggal'] ?></td>
        <td><?= $d['id_anggota'] ?></td>
        <td><?= $d['jenis_simpanan'] ?></td>
        <td>Rp <?= number_format($d['jumlah'],0,',','.') ?></td>
    </tr>
    <?php endwhile; ?>
<?php else: ?>
<tr><td colspan="4">Tidak ada data simpanan</td></tr>
<?php endif; ?>
</tbody>

</table>
</div>

</div>

</body>
</html>