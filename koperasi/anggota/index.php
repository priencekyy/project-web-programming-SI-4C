<?php
session_start();

if($_SESSION['level']=="pengawas"){
    header("Location: ../admin/dashboard.php");
    exit;
}

include "../config/koneksi.php";

$data = mysqli_query($koneksi,"
SELECT * FROM anggota
ORDER BY id_anggota DESC
");

$total = mysqli_num_rows($data);

?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Data Anggota KKMP</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

*{
    font-family:'Poppins',sans-serif;
}

body{
    background:linear-gradient(135deg,#0f172a,#1e293b,#312e81);
    min-height:100vh;
}

.header-box{
    background:rgba(255,255,255,.08);
    backdrop-filter:blur(15px);
    border-radius:20px;
    padding:25px;
    color:white;
    margin-bottom:20px;
}

.vip-card{
    background:rgba(255,255,255,.08);
    backdrop-filter:blur(20px);
    border-radius:20px;
    padding:20px;
    color:white;
}

.table{
    color:white;
}

.table thead{
    background:rgba(255,255,255,.15);
}

.btn-vip{
    background:#4f46e5;
    border:none;
    color:white;
}

.btn-vip:hover{
    background:#4338ca;
}

.badge-total{
    background:#10b981;
    padding:10px 15px;
    border-radius:20px;
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

<div class="container-fluid p-4">

    <div class="header-box">

        <div class="d-flex justify-content-between align-items-center">

            <div>
                <h2>
                    <i class="fas fa-users"></i>
                    Data Anggota KKMP
                </h2>

                <small>
                    Koperasi Kelurahan Merah Putih Indonesia
                </small>
            </div>

            <div>

                <span class="badge-total">
                    Total Anggota : <?= $total ?>
                </span>

            </div>

        </div>

    </div>

    <div class="vip-card">

        <div class="d-flex justify-content-between mb-3">

            <a href="tambah_anggota.php" class="btn btn-success">
                <i class="fas fa-plus"></i>
                Tambah Anggota
            </a>

    <a href="../admin/dashboard.php" class="btn btn-outline-light">
    <i class="fas fa-home"></i> Dashboard
</a>

        </div>

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead>

                    <tr>

                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Tanggal Daftar</th>
                        <th>Aksi</th>

                    </tr>

                </thead>

                <tbody>

                <?php

                $no = 1;

                while($d = mysqli_fetch_assoc($data)) :

                ?>

                    <tr>

                        <td><?= $no++; ?></td>

                        <td><?= $d['nik']; ?></td>

                        <td><?= $d['nama']; ?></td>

                        <td><?= $d['jenis_kelamin']; ?></td>

                        <td><?= $d['alamat']; ?></td>

                        <td><?= $d['no_hp']; ?></td>

                        <td><?= $d['tanggal_daftar']; ?></td>

                        <td>

                        <a href="edit_anggota.php?id=<?= $d['id_anggota']; ?>"
class="btn btn-warning btn-sm">
    <i class="fas fa-edit"></i>
</a>

<a href="hapus_anggota.php?id=<?= $d['id_anggota']; ?>"
onclick="return confirm('Yakin ingin menghapus data ini?')"
class="btn btn-danger btn-sm">
    <i class="fas fa-trash"></i>
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