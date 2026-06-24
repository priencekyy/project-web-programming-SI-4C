<?php
include "../config/koneksi.php";

$id = $_GET['id'];

$data = mysqli_query($koneksi, "
    SELECT * FROM pinjaman 
    WHERE id_pinjaman='$id'
");

$d = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){

    mysqli_query($koneksi, "
        UPDATE pinjaman SET
        id_anggota='$_POST[id_anggota]',
        tanggal='$_POST[tanggal]',
        jumlah_pinjaman='$_POST[jumlah_pinjaman]',
        lama_angsuran='$_POST[lama_angsuran]',
        status='$_POST[status]'
        WHERE id_pinjaman='$id'
    ");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Pinjaman VIP</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

<style>

body{
    background:
    radial-gradient(circle at top left,#22c55e 0%,transparent 35%),
    radial-gradient(circle at bottom right,#a855f7 0%,transparent 35%),
    linear-gradient(135deg,#020617,#0b1220,#0f172a);
    min-height:100vh;
    padding:40px;
    font-family:Poppins, sans-serif;
    color:white;
}

.vip-card{
    max-width:900px;
    margin:auto;
    background:rgba(255,255,255,0.07);
    backdrop-filter:blur(25px);
    padding:40px;
    border-radius:30px;
    box-shadow:0 0 40px rgba(34,197,94,0.15);
}

.header{
    text-align:center;
    margin-bottom:30px;
}

.logo-box{
    width:70px;
    height:70px;
    margin:auto;
    border-radius:20px;
    display:flex;
    align-items:center;
    justify-content:center;
    background:linear-gradient(135deg,#22c55e,#a855f7);
    font-size:28px;
    margin-bottom:15px;
    box-shadow:0 0 20px rgba(168,85,247,0.4);
}

.mini-card{
    background:rgba(255,255,255,0.08);
    padding:15px;
    border-radius:18px;
    text-align:center;
    backdrop-filter:blur(10px);
    border:1px solid rgba(255,255,255,0.1);
    transition:0.3s;
}

.mini-card:hover{
    transform:translateY(-5px);
    background:rgba(255,255,255,0.12);
}

.form-control, .form-select{
    background:rgba(255,255,255,0.08);
    border:none;
    color:white;
}

.form-control:focus, .form-select:focus{
    background:rgba(255,255,255,0.12);
    color:white;
    box-shadow:none;
}

label{
    margin-bottom:8px;
}

.btn-update{
    background:linear-gradient(135deg,#22c55e,#16a34a);
    border:none;
    padding:10px 25px;
    border-radius:12px;
}

.btn-back{
    background:linear-gradient(135deg,#a855f7,#7c3aed);
    border:none;
    padding:10px 25px;
    border-radius:12px;
    color:white;
    margin-left:10px;
    text-decoration:none;
}

</style>

</head>

<body>

<div class="vip-card">

    <!-- HEADER -->
    <div class="header">
        <div class="logo-box">
            <i class="fas fa-hand-holding-dollar"></i>
        </div>
        <h2>Edit Data Pinjaman</h2>
        <p>Koperasi Kelurahan Merah Putih Indonesia (KKMP)</p>
    </div>

    <!-- MINI CARD -->
    <div class="row mb-4">
        <div class="col-md-4 mb-2">
            <div class="mini-card">
                <h3>💰</h3>
                <small>Edit Pinjaman</small>
            </div>
        </div>

        <div class="col-md-4 mb-2">
            <div class="mini-card">
                <h3>🏦</h3>
                <small>Data Kredit</small>
            </div>
        </div>

        <div class="col-md-4 mb-2">
            <div class="mini-card">
                <h3>2026</h3>
                <small>Tahun Buku</small>
            </div>
        </div>
    </div>

    <!-- FORM -->
    <form method="POST">

        <div class="mb-3">
            <label>ID Anggota</label>
            <input type="number" name="id_anggota"
            value="<?= $d['id_anggota'] ?>"
            class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal"
            value="<?= $d['tanggal'] ?>"
            class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jumlah Pinjaman</label>
            <input type="number" name="jumlah_pinjaman"
            value="<?= $d['jumlah_pinjaman'] ?>"
            class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Lama Angsuran (bulan)</label>
            <input type="number" name="lama_angsuran"
            value="<?= $d['lama_angsuran'] ?>"
            class="form-control" required>
        </div>

        <div class="mb-4">
            <label>Status</label>
            <select name="status" class="form-select">
                <option value="Proses" <?= $d['status']=="Proses"?"selected":"" ?>>Proses</option>
                <option value="Disetujui" <?= $d['status']=="Disetujui"?"selected":"" ?>>Disetujui</option>
                <option value="Ditolak" <?= $d['status']=="Ditolak"?"selected":"" ?>>Ditolak</option>
            </select>
        </div>

        <div class="text-center">
            <button type="submit" name="update" class="btn btn-update">
                <i class="fas fa-save"></i> Update Data
            </button>

            <a href="index.php" class="btn-back">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

    </form>

</div>

</body>
</html>