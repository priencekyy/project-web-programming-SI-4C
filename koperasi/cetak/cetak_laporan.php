<?php
include "../config/koneksi.php";

/* DATA PINJAMAN */
$pinjaman = mysqli_query($koneksi,"
SELECT * FROM pinjaman
ORDER BY id_pinjaman DESC
");

/* DATA SIMPANAN */
$simpanan = mysqli_query($koneksi,"
SELECT * FROM simpanan
ORDER BY id_simpanan DESC
");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Cetak Laporan VIP</title>

<style>
body{
    font-family: Arial, sans-serif;
    background:#f3f4f6;
    padding:20px;
}

.container{
    max-width:1000px;
    margin:auto;
}

.header{
    text-align:center;
    background:linear-gradient(135deg,#1e3a8a,#2563eb);
    color:white;
    padding:20px;
    border-radius:12px;
    margin-bottom:20px;
}

.header h2{
    margin:0;
    font-size:20px;
}

.header p{
    margin:0;
    font-size:13px;
}

.section-box{
    margin-top:20px;
    padding:18px;

    background:#ffffff;

    border-radius:18px;

    border:1px solid #dbeafe;

    box-shadow:
    0 10px 25px rgba(37,99,235,.12);

    overflow:hidden;
}

.vip-title{
    font-size:24px;
    font-weight:700;

    color:#0f172a;

    margin-bottom:15px;

    padding-left:12px;

    border-left:6px solid #2563eb;
}

.vip-table td{
    text-align:center;
    vertical-align:middle;
    padding:14px;
    border-bottom:1px solid #e5e7eb;
}

.vip-table{
    width:100%;
    font-size:12px;
    border-collapse:collapse;
}

.vip-table th{
    background:linear-gradient(135deg,#1d4ed8,#2563eb);
    color:white;
    text-align:center;
    padding:10px;
}

.vip-table td{
    text-align:center;
    padding:8px;
    border-bottom:1px solid #e5e7eb;
}

.vip-table tr:nth-child(even){
    background:#f3f4f6;
}

/* 🔥 BUTTON STYLE */
.btn-group{
    text-align:center;
    margin-bottom:20px;
}

.btn{
    padding:10px 18px;
    border:none;
    border-radius:8px;
    font-weight:bold;
    cursor:pointer;
    text-decoration:none;
    display:inline-block;
    margin:5px;
}

.btn-print{
    background:#16a34a;
    color:white;
}

.btn-back{
    background:#dc2626;
    color:white;
}

/* PRINT MODE */
@media print{
    .btn-group{
        display:none;
    }

    body{
        background:white;
    }

    .section-box{
        box-shadow:none;
    }
}
</style>
</head>

<body>

<div class="container">

<!-- HEADER -->
<div class="header">
    <h2>KOPERASI KELURAHAN MERAH PUTIH INDONESIA</h2>
    <p>Laporan Simpanan & Pinjaman Anggota</p>
</div>

<!-- 🔥 BUTTON -->
<div class="btn-group">
    <button onclick="window.print()" class="btn btn-print">🖨 Cetak Laporan</button>

    <a href="../admin/dashboard.php" class="btn btn-back">⬅ Kembali Dashboard</a>
</div>

<!-- PINJAMAN -->
<div class="section-box">

<div class="vip-title">📄 Laporan Pinjaman</div>

<table class="vip-table">
<tr>
    <th>Tanggal</th>
    <th>ID Anggota</th>
    <th>Jumlah</th>
    <th>Status</th>
</tr>

<?php while($d = mysqli_fetch_assoc($pinjaman)) : ?>
<tr>
    <td><?= $d['tanggal'] ?></td>
    <td><?= $d['id_anggota'] ?></td>
    <td>Rp <?= number_format($d['jumlah_pinjaman'],0,',','.') ?></td>
    <td><?= $d['status'] ?></td>
</tr>
<?php endwhile; ?>

</table>

</div>

<!-- SIMPANAN -->
<div class="section-box">

<div class="vip-title">💰 Laporan Simpanan</div>

<table class="vip-table">
<tr>
    <th>Tanggal</th>
    <th>ID Anggota</th>
    <th>Jenis</th>
    <th>Jumlah</th>
</tr>

<?php while($d = mysqli_fetch_assoc($simpanan)) : ?>
<tr>
    <td><?= $d['tanggal'] ?></td>
    <td><?= $d['id_anggota'] ?></td>
    <td><?= $d['jenis_simpanan'] ?></td>
    <td>Rp <?= number_format($d['jumlah'],0,',','.') ?></td>
</tr>
<?php endwhile; ?>

</table>

</div>

</div>

</body>
</html>