<?php

session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}

include "../config/koneksi.php";

if(isset($_POST['simpan'])){

    $nik      = $_POST['nik'];
    $nama     = $_POST['nama'];
    $jk       = $_POST['jenis_kelamin'];
    $alamat   = $_POST['alamat'];
    $hp       = $_POST['no_hp'];
    $tanggal  = $_POST['tanggal_daftar'];

    $simpan = mysqli_query($koneksi,"
        INSERT INTO anggota
        (
            nik,
            nama,
            jenis_kelamin,
            alamat,
            no_hp,
            tanggal_daftar
        )
        VALUES
        (
            '$nik',
            '$nama',
            '$jk',
            '$alamat',
            '$hp',
            '$tanggal'
        )
    ");

    if($simpan){

        echo "
        <script>
            alert('Data Anggota Berhasil Ditambahkan');
            window.location='index.php';
        </script>
        ";

    }else{

        echo "
        <script>
            alert('Gagal Menyimpan Data');
        </script>
        ";

    }

}

?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Tambah Anggota KKMP</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

body{
    background:linear-gradient(135deg,#0f172a,#1e293b,#312e81);
    min-height:100vh;
}

.vip-card{
    background:rgba(255,255,255,.08);
    backdrop-filter:blur(20px);
    border-radius:20px;
    padding:30px;
    color:white;
    box-shadow:0 0 25px rgba(255,255,255,.1);
}

.form-control,
.form-select{
    background:rgba(255,255,255,.1);
    border:none;
    color:black;
}

.form-control:focus,
.form-select:focus{
    box-shadow:none;
}

.title{
    color:white;
    text-align:center;
    margin-bottom:30px;
}

</style>

</head>
<body>

<!-- GANTI BAGIAN <style> LAMA DENGAN INI -->

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
    radial-gradient(circle at top left,#ef4444 0%,transparent 30%),
    radial-gradient(circle at bottom right,#2563eb 0%,transparent 30%),
    linear-gradient(135deg,#020617,#0f172a,#111827);
    overflow-x:hidden;
    padding:40px;
}

.blob{
    position:fixed;
    border-radius:50%;
    filter:blur(100px);
    opacity:.35;
    z-index:-1;
}

.blob1{
    width:350px;
    height:350px;
    background:#ef4444;
    top:-100px;
    left:-100px;
}

.blob2{
    width:350px;
    height:350px;
    background:#2563eb;
    right:-100px;
    top:150px;
}

.blob3{
    width:300px;
    height:300px;
    background:#9333ea;
    bottom:-100px;
    left:35%;
}

.vip-card{
    max-width:950px;
    margin:auto;
    background:rgba(255,255,255,.08);
    border:1px solid rgba(255,255,255,.1);
    backdrop-filter:blur(30px);
    border-radius:35px;
    padding:50px;
    color:white;
    box-shadow:0 15px 40px rgba(0,0,0,.4);
}

.logo-box{
    width:120px;
    height:120px;
    margin:auto;
    border-radius:50%;
    background:linear-gradient(135deg,#ef4444,#2563eb);
    display:flex;
    justify-content:center;
    align-items:center;
    margin-bottom:20px;
    box-shadow:0 0 40px rgba(255,255,255,.2);
}

.logo-box i{
    font-size:55px;
    color:white;
}

.header{
    text-align:center;
    margin-bottom:30px;
}

.header h1{
    font-size:35px;
    font-weight:700;
}

.header p{
    color:#cbd5e1;
}

.mini-card{
    background:rgba(255,255,255,.08);
    border-radius:20px;
    padding:20px;
    text-align:center;
    margin-bottom:25px;
}

.mini-card h3{
    font-size:30px;
    font-weight:bold;
}

.form-label{
    color:white;
    margin-bottom:8px;
}

.form-control,
.form-select{
    height:55px;
    border:none;
    border-radius:18px;
    background:rgba(255,255,255,.1);
    color:white;
}

.form-control::placeholder{
    color:#cbd5e1;
}

.form-control:focus,
.form-select:focus{
    background:rgba(255,255,255,.15);
    color:white;
    box-shadow:0 0 25px #2563eb;
}

textarea.form-control{
    height:130px;
}

.btn-save{
    background:linear-gradient(135deg,#2563eb,#4f46e5);
    border:none;
    padding:14px 35px;
    border-radius:15px;
    color:white;
    font-weight:600;
}

.btn-save:hover{
    transform:translateY(-3px);
    box-shadow:0 0 20px #2563eb;
}

.btn-back{
    background:linear-gradient(135deg,#475569,#334155);
    border:none;
    padding:14px 35px;
    border-radius:15px;
    color:white;
}

.btn-back:hover{
    color:white;
}

</style>

<!-- TEPAT SETELAH <body> TAMBAHKAN -->

<div class="blob blob1"></div>
<div class="blob blob2"></div>
<div class="blob blob3"></div>

<!-- GANTI BAGIAN JUDUL DAN FORM MENJADI -->

<div class="vip-card">

```
<div class="header">

    <div class="logo-box">
        <i class="fas fa-user-plus"></i>
    </div>

    <h1>Tambah Data Anggota</h1>

    <p>Koperasi Kelurahan Merah Putih Indonesia (KKMP)</p>

</div>

<div class="row">

    <div class="col-md-4">
        <div class="mini-card">
            <h3>125</h3>
            <small>Total Anggota</small>
        </div>
    </div>

    <div class="col-md-4">
        <div class="mini-card">
            <h3>75 Jt</h3>
            <small>Total Simpanan</small>
        </div>
    </div>

    <div class="col-md-4">
        <div class="mini-card">
            <h3>30 Jt</h3>
            <small>Total Pinjaman</small>
        </div>
    </div>

</div>

<form method="POST">

    <div class="mb-3">
        <label class="form-label">NIK</label>
        <input type="text" name="nik" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Nama Lengkap</label>
        <input type="text" name="nama" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Jenis Kelamin</label>

        <select name="jenis_kelamin" class="form-select">

            <option value="Laki-Laki">
                Laki-Laki
            </option>

            <option value="Perempuan">
                Perempuan
            </option>

        </select>

    </div>

    <div class="mb-3">
        <label class="form-label">Alamat</label>
        <textarea name="alamat" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">No HP</label>
        <input type="text" name="no_hp" class="form-control">
    </div>

    <div class="mb-4">
        <label class="form-label">Tanggal Daftar</label>
        <input type="date"
               name="tanggal_daftar"
               value="<?= date('Y-m-d'); ?>"
               class="form-control">
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


            </div>

        </div>

    </div>

</div>

</body>
</html>