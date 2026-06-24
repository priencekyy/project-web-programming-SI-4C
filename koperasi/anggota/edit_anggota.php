<?php

session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}

include "../config/koneksi.php";

$id = $_GET['id'];

$data = mysqli_query($koneksi,"
SELECT * FROM anggota
WHERE id_anggota='$id'
");

$d = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){

    $nik      = $_POST['nik'];
    $nama     = $_POST['nama'];
    $jk       = $_POST['jenis_kelamin'];
    $alamat   = $_POST['alamat'];
    $hp       = $_POST['no_hp'];
    $tanggal  = $_POST['tanggal_daftar'];

    $update = mysqli_query($koneksi,"
        UPDATE anggota SET
            nik='$nik',
            nama='$nama',
            jenis_kelamin='$jk',
            alamat='$alamat',
            no_hp='$hp',
            tanggal_daftar='$tanggal'
        WHERE id_anggota='$id'
    ");

    if($update){

        echo "
        <script>
            alert('Data Berhasil Diupdate');
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

<title>Edit Anggota KKMP</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

*{
    font-family:'Poppins',sans-serif;
}

body{
    min-height:100vh;
    background:
    linear-gradient(135deg,#0f172a,#1e293b,#312e81);
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

    box-shadow:
    0 20px 50px rgba(0,0,0,.4);

}

.vip-header{

    text-align:center;
    margin-bottom:30px;

}

.vip-header h2{

    font-weight:700;

}

.vip-header p{

    color:#cbd5e1;

}

.form-label{

    font-weight:500;

}

.form-control,
.form-select{

    border:none;

    border-radius:15px;

    padding:12px;

}

.form-control:focus,
.form-select:focus{

    box-shadow:
    0 0 15px rgba(99,102,241,.5);

}

.btn-vip{

    background:#4f46e5;

    border:none;

    border-radius:15px;

    padding:12px 25px;

    color:white;

    transition:.3s;

}

.btn-vip:hover{

    transform:translateY(-3px);

    background:#4338ca;

}

.btn-back{

    border-radius:15px;

    padding:12px 25px;

}

.icon-top{

    font-size:55px;

    color:#818cf8;

    margin-bottom:10px;

}

</style>

</head>

<body>

<div class="vip-card">

    <div class="vip-header">

        <i class="fas fa-user-edit icon-top"></i>

        <h2>Edit Data Anggota</h2>

        <p>
            Koperasi Kelurahan Merah Putih (KKMP)
        </p>

    </div>

    <form method="POST">

        <div class="row">

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    NIK
                </label>

                <input
                type="text"
                name="nik"
                value="<?= $d['nik']; ?>"
                class="form-control"
                required>

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Nama Lengkap
                </label>

                <input
                type="text"
                name="nama"
                value="<?= $d['nama']; ?>"
                class="form-control"
                required>

            </div>

        </div>

        <div class="row">

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Jenis Kelamin
                </label>

                <select
                name="jenis_kelamin"
                class="form-select">

                    <option
                    value="Laki-Laki"
                    <?= ($d['jenis_kelamin']=='Laki-Laki') ? 'selected' : ''; ?>>
                    Laki-Laki
                    </option>

                    <option
                    value="Perempuan"
                    <?= ($d['jenis_kelamin']=='Perempuan') ? 'selected' : ''; ?>>
                    Perempuan
                    </option>

                </select>

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    No HP
                </label>

                <input
                type="text"
                name="no_hp"
                value="<?= $d['no_hp']; ?>"
                class="form-control">

            </div>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Alamat
            </label>

            <textarea
            name="alamat"
            rows="4"
            class="form-control"><?= $d['alamat']; ?></textarea>

        </div>

        <div class="mb-4">

            <label class="form-label">
                Tanggal Daftar
            </label>

            <input
            type="date"
            name="tanggal_daftar"
            value="<?= $d['tanggal_daftar']; ?>"
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