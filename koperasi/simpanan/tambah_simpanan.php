<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}

include "../config/koneksi.php";

if(isset($_POST['simpan'])){

    mysqli_query($koneksi,"
    INSERT INTO simpanan
    (
        id_anggota,
        tanggal,
        jenis_simpanan,
        jumlah
    )
    VALUES
    (
        '$_POST[id_anggota]',
        '$_POST[tanggal]',
        '$_POST[jenis_simpanan]',
        '$_POST[jumlah]'
    )
    ");

    echo "
    <script>
    alert('Data Simpanan Berhasil Ditambahkan');
    window.location='index.php';
    </script>
    ";
}
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
<title>Tambah Simpanan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

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
    padding:40px;

    background:
    radial-gradient(circle at top left,#f59e0b 0%,transparent 25%),
    radial-gradient(circle at bottom right,#10b981 0%,transparent 30%),
    linear-gradient(135deg,#052e16,#064e3b,#022c22);
}

.vip-card{
    max-width:1000px;
    margin:auto;

    background:rgba(255,255,255,.08);

    backdrop-filter:blur(25px);

    border:1px solid rgba(255,255,255,.15);

    border-radius:35px;

    padding:40px;

    color:white;

    box-shadow:
    0 20px 50px rgba(0,0,0,.4);
}

.header{
    text-align:center;
    margin-bottom:35px;
}

.logo-wallet{
    width:130px;
    height:130px;

    margin:auto;

    border-radius:50%;

    background:
    linear-gradient(
        135deg,
        #f59e0b,
        #10b981
    );

    display:flex;
    justify-content:center;
    align-items:center;

    box-shadow:
    0 0 40px rgba(245,158,11,.4);
}

.logo-wallet i{
    font-size:60px;
    color:white;
}

.header h1{
    margin-top:20px;
    font-size:36px;
    font-weight:700;
}

.header p{
    color:#d1fae5;
}

.money-card{
    background:rgba(255,255,255,.08);

    border:1px solid rgba(255,255,255,.08);

    border-radius:20px;

    padding:20px;

    text-align:center;

    margin-bottom:25px;

    transition:.3s;
}

.money-card:hover{
    transform:translateY(-5px);
    background:rgba(255,255,255,.12);
}

.money-card h3{
    color:#fbbf24;
    font-size:30px;
    font-weight:700;
}

.money-card small{
    color:#d1fae5;
}

.form-label{
    margin-bottom:8px;
    font-weight:500;
}

.form-control{
    height:55px;

    background:rgba(255,255,255,.1);

    border:none;

    border-radius:18px;

    color:white;
}

.form-control:focus{
    background:rgba(255,255,255,.15);

    color:white;

    box-shadow:
    0 0 20px rgba(16,185,129,.5);
}

select.form-control{
    color:white;
}

select.form-control option{
    color:black;
}

.btn-save{

    background:
    linear-gradient(
        135deg,
        #10b981,
        #059669
    );

    border:none;

    color:white;

    padding:14px 40px;

    border-radius:15px;

    font-weight:600;
}

.btn-save:hover{

    transform:translateY(-3px);

    box-shadow:
    0 0 25px rgba(16,185,129,.5);

    color:white;
}

.btn-back{

    background:
    linear-gradient(
        135deg,
        #475569,
        #334155
    );

    border:none;

    color:white;

    padding:14px 40px;

    border-radius:15px;
}

.btn-back:hover{
    color:white;
}

</style>

</head>

<body>

<div class="vip-card">

    <div class="header">

        <div class="logo-wallet">
            <i class="fas fa-wallet"></i>
        </div>

        <h1>Tambah Data Simpanan</h1>

        <p>Sistem Simpanan Digital KKMP Indonesia</p>

    </div>

    <div class="row">

        <div class="col-md-4">
            <div class="money-card">
                <h3>75 JT</h3>
                <small>Total Simpanan</small>
            </div>
        </div>

        <div class="col-md-4">
            <div class="money-card">
                <h3>125</h3>
                <small>Anggota Aktif</small>
            </div>
        </div>

        <div class="col-md-4">
            <div class="money-card">
                <h3>2026</h3>
                <small>Tahun Buku</small>
            </div>
        </div>

    </div>

    <form method="POST">

        <div class="mb-3">
            <label class="form-label">ID Anggota</label>
            <input type="number"
                   name="id_anggota"
                   class="form-control"
                   placeholder="Masukkan ID Anggota"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Simpanan</label>
            <input type="date"
                   name="tanggal"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jenis Simpanan</label>

            <select name="jenis_simpanan"
                    class="form-control"
                    required>

                <option value="Pokok">Simpanan Pokok</option>
                <option value="Wajib">Simpanan Wajib</option>
                <option value="Sukarela">Simpanan Sukarela</option>

            </select>

        </div>

        <div class="mb-4">

            <label class="form-label">
                Jumlah Simpanan
            </label>

            <input type="number"
                   name="jumlah"
                   class="form-control"
                   placeholder="Masukkan Nominal Simpanan"
                   required>

        </div>

        <div class="text-center">

            <button type="submit"
                    name="simpan"
                    class="btn btn-save">

                <i class="fas fa-save"></i>
                Simpan Data

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