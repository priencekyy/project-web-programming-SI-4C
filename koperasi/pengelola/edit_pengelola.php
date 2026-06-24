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
SELECT * FROM pengelola
WHERE id_pengelola='$id'
");

$d = mysqli_fetch_assoc($data);

if(!$d){
    echo "
    <script>
    alert('Data Pengelola Tidak Ditemukan');
    window.location='index.php';
    </script>
    ";
    exit;
}

if(isset($_POST['update'])){

    $nama    = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $alamat  = $_POST['alamat'];

    $update = mysqli_query($koneksi,"
    UPDATE pengelola SET
        nama='$nama',
        jabatan='$jabatan',
        alamat='$alamat'
    WHERE id_pengelola='$id'
    ");

    if($update){

        echo "
        <script>
        alert('Data Pengelola Berhasil Diupdate');
        window.location='index.php';
        </script>
        ";

    }else{

        echo "
        <script>
        alert('Gagal Update Data');
        </script>
        ";

    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Edit Pengelola KKMP</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

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
    radial-gradient(circle at top left,#ef4444 0%,transparent 25%),
    radial-gradient(circle at bottom right,#2563eb 0%,transparent 25%),
    linear-gradient(135deg,#020617,#0f172a,#111827);
    display:flex;
    justify-content:center;
    align-items:center;
    padding:30px;
}

.vip-card{
    width:100%;
    max-width:900px;
    background:rgba(255,255,255,.08);
    backdrop-filter:blur(25px);
    border:1px solid rgba(255,255,255,.1);
    border-radius:30px;
    padding:40px;
    color:white;
    box-shadow:0 20px 40px rgba(0,0,0,.5);
}

.logo{
    text-align:center;
    margin-bottom:30px;
}

.logo i{
    font-size:60px;
    color:#60a5fa;
    margin-bottom:15px;
}

.logo h2{
    font-weight:700;
}

.logo p{
    color:#cbd5e1;
}

.form-label{
    font-weight:500;
}

.form-control{
    background:rgba(255,255,255,.1);
    border:none;
    color:white;
    border-radius:15px;
    padding:12px;
}

.form-control:focus{
    background:rgba(255,255,255,.15);
    color:white;
    box-shadow:0 0 15px rgba(59,130,246,.5);
}

textarea{
    resize:none;
}

.btn-vip{
    background:linear-gradient(45deg,#2563eb,#4f46e5);
    border:none;
    padding:12px 25px;
    border-radius:15px;
    color:white;
    font-weight:600;
}

.btn-vip:hover{
    transform:translateY(-2px);
}

.btn-back{
    padding:12px 25px;
    border-radius:15px;
}

.info-box{
    background:rgba(255,255,255,.05);
    padding:15px;
    border-radius:15px;
    margin-bottom:25px;
}

</style>

</head>

<body>

<div class="vip-card">

    <div class="logo">

        <i class="fas fa-briefcase"></i>

        <h2>Edit Data Pengelola</h2>

        <p>Koperasi Kelurahan Merah Putih Indonesia</p>

    </div>

    <div class="info-box">

        <strong>ID Pengelola :</strong>
        <?= $d['id_pengelola']; ?>

    </div>

    <form method="POST">

        <div class="mb-3">

            <label class="form-label">
                Nama Pengelola
            </label>

            <input
            type="text"
            name="nama"
            value="<?= $d['nama']; ?>"
            class="form-control"
            required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Jabatan
            </label>

            <input
            type="text"
            name="jabatan"
            value="<?= $d['jabatan']; ?>"
            class="form-control"
            required>

        </div>

        <div class="mb-4">

            <label class="form-label">
                Alamat
            </label>

            <textarea
            name="alamat"
            rows="5"
            class="form-control"
            required><?= $d['alamat']; ?></textarea>

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