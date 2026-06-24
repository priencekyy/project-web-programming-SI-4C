<?php
session_start();

if($_SESSION['level']=="pengawas"){
    header("Location: ../admin/dashboard.php");
    exit;
}

include "../config/koneksi.php";

$data = mysqli_query($koneksi,"
SELECT * FROM pinjaman ORDER BY id_pinjaman DESC
");

$total = mysqli_num_rows($data);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Data Pinjaman KKMP</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

body{
background:
radial-gradient(circle at top left,#ef4444 0%,transparent 30%),
radial-gradient(circle at bottom right,#2563eb 0%,transparent 30%),
linear-gradient(135deg,#020617,#0f172a,#111827);
min-height:100vh;
padding:30px;
font-family:Poppins;
}

.vip-card{
background:rgba(255,255,255,0.08);
backdrop-filter:blur(25px);
border-radius:30px;
padding:30px;
color:white;
}

.table{color:white;}
.table thead{background:rgba(255,255,255,0.15);}

.badge-total{
background:#10b981;
padding:10px 20px;
border-radius:30px;
font-weight:600;
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

<!-- HEADER -->
<div class="d-flex justify-content-between align-items-center">

<div>
<h2><i class="fas fa-money-bill-wave"></i> Data Pinjaman</h2>
<p class="mb-0">Koperasi Kelurahan Merah Putih Indonesia</p>
</div>

<div>
<span class="badge-total">Total : <?= $total; ?></span>
</div>

</div>

<hr>

<!-- BUTTON -->
<div class="d-flex justify-content-between align-items-center mb-3">

    <a href="tambah_pinjaman.php" class="btn btn-success">
        <i class="fas fa-plus"></i>
        Tambah Pinjaman
    </a>

    <a href="../admin/dashboard.php" class="btn btn-outline-light">
        <i class="fas fa-home"></i>
        Dashboard
    </a>

</div>

<!-- TABLE -->
<div class="table-responsive">

<table class="table table-hover align-middle">

<thead>
<tr>
<th>ID</th>
<th>Anggota</th>
<th>Tanggal</th>
<th>Jumlah</th>
<th>Lama (Bulan)</th>
<th>Status</th>
<th>Aksi</th>
</tr>
</thead>

<tbody>

<?php while($d = mysqli_fetch_assoc($data)) : ?>
<tr>
<td><?= $d['id_pinjaman']; ?></td>
<td><?= $d['id_anggota']; ?></td>
<td><?= $d['tanggal']; ?></td>

<td>Rp <?= number_format($d['jumlah_pinjaman'],0,',','.'); ?></td>

<td><?= $d['lama_angsuran']; ?></td>

<td>
<span class="badge bg-info">
<?= $d['status']; ?>
</span>
</td>

<td>

<a href="edit_pinjaman.php?id=<?= $d['id_pinjaman']; ?>" class="btn btn-warning btn-sm">
    ✏️
</a>

<a href="hapus_pinjaman.php?id=<?= $d['id_pinjaman']; ?>" 
onclick="return confirm('Hapus data?')" 
class="btn btn-danger btn-sm">
    🗑️
</a>

</td>

</tr>
<?php endwhile; ?>

</tbody>

</table>

</div>

</div>

</div>

</body>
</html>