<?php
session_start();
include "../config/koneksi.php";

if(!isset($_GET['id'])){
    die("ID tidak ditemukan!");
}

$id = intval($_GET['id']);

$data = mysqli_query($koneksi,"SELECT * FROM simpanan WHERE id_simpanan=$id");
$d = mysqli_fetch_assoc($data);

if(!$d){
    die("Data tidak ditemukan!");
}

if(isset($_POST['update'])){
    $id_anggota = $_POST['id_anggota'];
    $tanggal = $_POST['tanggal'];
    $jenis = $_POST['jenis_simpanan'];
    $jumlah = $_POST['jumlah'];

    $update = mysqli_query($koneksi,"
        UPDATE simpanan SET
        id_anggota='$id_anggota',
        tanggal='$tanggal',
        jenis_simpanan='$jenis',
        jumlah='$jumlah'
        WHERE id_simpanan=$id
    ");

    if($update){
        header("Location: index.php");
        exit;
    } else {
        die("Gagal update: " . mysqli_error($koneksi));
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Simpanan</title>
<head>

<meta charset="UTF-8">

<title>Edit Simpanan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    min-height:100vh;
    background:
    radial-gradient(circle at top left,#10b981 0%,transparent 30%),
    radial-gradient(circle at bottom right,#059669 0%,transparent 30%),
    linear-gradient(135deg,#021617,#052e2b,#064e3b);
    padding:40px;
    color:white;
}

.card-vip{
    max-width:900px;
    margin:auto;

    background:rgba(255,255,255,.08);
    backdrop-filter:blur(25px);

    border:1px solid rgba(255,255,255,.15);

    border-radius:30px;

    padding:40px;

    box-shadow:
    0 20px 40px rgba(0,0,0,.35);
}

.header{
    text-align:center;
    margin-bottom:30px;
}

.logo-box{
    width:120px;
    height:120px;

    margin:auto;

    border-radius:50%;

    background:linear-gradient(
        135deg,
        #10b981,
        #059669
    );

    display:flex;
    justify-content:center;
    align-items:center;

    box-shadow:
    0 0 40px rgba(16,185,129,.4);
}

.logo-box i{
    font-size:55px;
    color:white;
}

.header h1{
    margin-top:20px;
    font-size:34px;
    font-weight:700;
}

.header p{
    color:#d1fae5;
}

.mini-card{
    background:rgba(255,255,255,.08);
    border-radius:18px;
    padding:18px;
    text-align:center;
    margin-bottom:25px;
}

.mini-card h3{
    font-size:28px;
    font-weight:700;
}

.form-label{
    font-weight:500;
    margin-bottom:8px;
}

.form-control,
.form-select{
    height:55px;
    border:none;
    border-radius:15px;

    background:rgba(255,255,255,.1) !important;

    color:white !important;
}

.form-control:focus,
.form-select:focus{
    background:rgba(255,255,255,.15) !important;

    box-shadow:
    0 0 20px rgba(16,185,129,.4);

    color:white;
}

.form-select option{
    color:black;
}

.btn-update{
    background:linear-gradient(
        135deg,
        #10b981,
        #059669
    );

    border:none;

    color:white;

    padding:14px 35px;

    border-radius:15px;

    font-weight:600;

    transition:.3s;
}

.btn-update:hover{
    transform:translateY(-3px);

    box-shadow:
    0 0 25px rgba(16,185,129,.5);

    color:white;
}

.btn-back{
    background:linear-gradient(
        135deg,
        #475569,
        #334155
    );

    border:none;

    color:white;

    padding:14px 35px;

    border-radius:15px;
}

.btn-back:hover{
    color:white;
}

</style>
</head>

<body>

<div class="card-vip">

    <div class="header">

        <div class="logo-box">
            <i class="fas fa-money-bill-wave"></i>
        </div>

        <h1>Edit Data Simpanan</h1>

        <p>Koperasi Kelurahan Merah Putih Indonesia (KKMP)</p>

    </div>

    <div class="row">

        <div class="col-md-4">
            <div class="mini-card">
                <h3>💰</h3>
                <small>Edit Data Simpanan</small>
            </div>
        </div>

        <div class="col-md-4">
            <div class="mini-card">
                <h3>🏦</h3>
                <small>Data Keuangan</small>
            </div>
        </div>

        <div class="col-md-4">
            <div class="mini-card">
                <h3>2026</h3>
                <small>Tahun Buku</small>
            </div>
        </div>

    </div>

    <form method="POST">

        <div class="mb-3">
            <label class="form-label">ID Anggota</label>

            <input
            type="number"
            name="id_anggota"
            value="<?= $d['id_anggota'] ?>"
            class="form-control"
            required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal</label>

            <input
            type="date"
            name="tanggal"
            value="<?= $d['tanggal'] ?>"
            class="form-control"
            required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jenis Simpanan</label>

            <select
            name="jenis_simpanan"
            class="form-select">

                <option <?= $d['jenis_simpanan']=="Pokok"?"selected":"" ?>>
                    Pokok
                </option>

                <option <?= $d['jenis_simpanan']=="Wajib"?"selected":"" ?>>
                    Wajib
                </option>

                <option <?= $d['jenis_simpanan']=="Sukarela"?"selected":"" ?>>
                    Sukarela
                </option>

            </select>
        </div>

        <div class="mb-4">
            <label class="form-label">Jumlah Simpanan</label>

            <input
            type="number"
            name="jumlah"
            value="<?= $d['jumlah'] ?>"
            class="form-control"
            required>
        </div>

        <div class="text-center">

            <button
            type="submit"
            name="update"
            class="btn btn-update">

                <i class="fas fa-save"></i>
                Update Data

            </button>

            <a href="index.php"
               class="btn btn-back">

                <i class="fas fa-arrow-left"></i>
                Kembali

            </a>

        </div>

    </form>

</div>

</body>
</html>