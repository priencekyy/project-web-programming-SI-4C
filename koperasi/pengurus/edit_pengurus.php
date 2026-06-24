<?php

session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}

include "../config/koneksi.php";

if(!isset($_GET['id'])){
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];

$data = mysqli_query($koneksi,"
SELECT * FROM pengurus
WHERE id_pengurus='$id'
");

$d = mysqli_fetch_assoc($data);

if(!$d){
    echo "
    <script>
    alert('Data Pengurus Tidak Ditemukan');
    window.location='index.php';
    </script>
    ";
    exit;
}

if(isset($_POST['update'])){

    mysqli_query($koneksi,"
    UPDATE pengurus SET
    nama='$_POST[nama]',
    jabatan='$_POST[jabatan]',
    alamat='$_POST[alamat]',
    no_hp='$_POST[no_hp]'
    WHERE id_pengurus='$id'
    ");

    echo "
    <script>
    alert('Data Berhasil Diupdate');
    window.location='index.php';
    </script>
    ";
}

?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Pengurus KKMP</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

*{
    font-family:'Poppins',sans-serif;
}

body{
    background:linear-gradient(135deg,#0f172a,#1e293b,#312e81);
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:30px;
}

.vip-card{
    width:100%;
    max-width:900px;
    background:rgba(255,255,255,.08);
    backdrop-filter:blur(20px);
    border:1px solid rgba(255,255,255,.1);
    border-radius:30px;
    padding:35px;
    color:white;
    box-shadow:0 15px 40px rgba(0,0,0,.4);
}

.header{
    text-align:center;
    margin-bottom:30px;
}

.header i{
    font-size:60px;
    color:#818cf8;
    margin-bottom:15px;
}

.header h2{
    font-weight:700;
}

.form-control{
    border:none;
    border-radius:15px;
    padding:12px;
}

.form-control:focus{
    box-shadow:0 0 15px rgba(99,102,241,.5);
}

.btn-vip{
    background:#4f46e5;
    border:none;
    color:white;
    padding:12px 25px;
    border-radius:15px;
}

.btn-vip:hover{
    background:#4338ca;
}

.btn-back{
    border-radius:15px;
    padding:12px 25px;
}

</style>

</head>

<body>

<div class="vip-card">

    <div class="header">

        <i class="fas fa-user-tie"></i>

        <h2>Edit Data Pengurus</h2>

        <p>Koperasi Kelurahan Merah Putih Indonesia</p>

    </div>

    <form method="POST">

        <div class="mb-3">

            <label>Nama Pengurus</label>

            <input
            type="text"
            name="nama"
            value="<?= $d['nama']; ?>"
            class="form-control"
            required>

        </div>

        <div class="mb-3">

            <label>Jabatan</label>

            <input
            type="text"
            name="jabatan"
            value="<?= $d['jabatan']; ?>"
            class="form-control"
            required>

        </div>

        <div class="mb-3">

            <label>Alamat</label>

            <textarea
            name="alamat"
            rows="4"
            class="form-control"
            required><?= $d['alamat']; ?></textarea>

        </div>

        <div class="mb-4">

            <label>No HP</label>

            <input
            type="text"
            name="no_hp"
            value="<?= $d['no_hp']; ?>"
            class="form-control">

        </div>

        <div class="text-center">

            <button
            type="submit"
            name="update"
            class="btn btn-vip">

                <i class="fas fa-save"></i>
                Update Data

            </button>

            <a
            href="index.php"
            class="btn btn-secondary btn-back">

                <i class="fas fa-arrow-left"></i>
                Kembali

            </a>

        </div>

    </form>

</div>

</body>
</html>