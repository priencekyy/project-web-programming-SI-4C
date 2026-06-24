<?php

session_start();
echo $_SESSION['level'];

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard KKMP</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

/* =========================
   FONT
========================= */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

/* =========================
   BODY PREMIUM
========================= */

body{
    background:
    linear-gradient(
        135deg,
        #0b1120 0%,
        #0f172a 35%,
        #134e4a 70%,
        #115e59 100%
    );

    min-height:100vh;
    overflow-x:hidden;
}

/* =========================
   SIDEBAR VIP
========================= */

.sidebar{
    position:fixed;
    width:260px;
    height:100vh;

    background:
    linear-gradient(
        180deg,
        rgba(15,23,42,.98),
        rgba(19,78,74,.98)
    );

    border-right:1px solid rgba(255,255,255,.08);

    backdrop-filter:blur(25px);

    padding:25px;
    overflow-y:auto;
}

.logo{
    text-align:center;
    color:#fff;
    font-size:28px;
    font-weight:700;
    margin-bottom:35px;
    letter-spacing:2px;
}

.sidebar a{
    display:block;
    color:#cbd5e1;
    text-decoration:none;
    padding:14px 18px;
    margin-bottom:10px;
    border-radius:14px;
    transition:.3s;
}

.sidebar a:hover{
    background:rgba(45,212,191,.15);
    color:white;
}

.sidebar a.active{

    background:
    linear-gradient(
        135deg,
        #14b8a6,
        #0891b2
    );

    color:white;

    box-shadow:
    0 10px 25px rgba(20,184,166,.35);
}

.logout-menu{
    margin-top:auto;
}

/* =========================
   CONTENT
========================= */

.content{
    margin-left:260px;
    padding:25px;
}

/* =========================
   TOPBAR
========================= */

.topbar{

    background:
    rgba(255,255,255,.07);

    backdrop-filter:blur(20px);

    border:1px solid rgba(255,255,255,.08);

    border-radius:20px;

    padding:20px 25px;

    display:flex;
    justify-content:space-between;
    align-items:center;

    color:white;

    margin-bottom:25px;

    box-shadow:
    0 10px 25px rgba(0,0,0,.15);
}

.user-box{

    background:
    rgba(255,255,255,.08);

    padding:10px 18px;

    border-radius:12px;
}

/* =========================
   CARD STATISTIK VIP
========================= */

.stat-card{

    background:
    linear-gradient(
        145deg,
        rgba(255,255,255,.10),
        rgba(255,255,255,.04)
    );

    backdrop-filter:blur(25px);

    border:1px solid rgba(255,255,255,.08);

    border-radius:24px;

    padding:25px;

    color:white;

    position:relative;

    overflow:hidden;

    transition:.3s;

    box-shadow:
    0 10px 25px rgba(0,0,0,.20);
}

.stat-card::before{

    content:'';

    position:absolute;

    top:0;
    left:0;

    width:100%;
    height:4px;

    background:
    linear-gradient(
        90deg,
        #14b8a6,
        #22d3ee
    );
}

.stat-card:hover{

    transform:translateY(-6px);

    box-shadow:
    0 20px 35px rgba(20,184,166,.20);
}

.stat-card i{

    font-size:32px;

    color:#2dd4bf;

    margin-bottom:12px;
}

.stat-card h2{

    font-size:32px;

    font-weight:700;
}

.stat-card p{

    color:#cbd5e1;
}

/* =========================
   BOX VIP
========================= */

.info-box{

    background:
    rgba(255,255,255,.08);

    backdrop-filter:blur(20px);

    border:1px solid rgba(255,255,255,.08);

    border-radius:24px;

    padding:25px;

    color:white;

    margin-top:25px;

    box-shadow:
    0 10px 25px rgba(0,0,0,.20);

    transition:.3s;
}

.info-box:hover{

    transform:translateY(-4px);

    border-color:
    rgba(45,212,191,.40);
}

.info-box h3,
.info-box h4{
    color:white;
    font-weight:700;
}

.info-box hr{
    border:none;
    border-top:1px solid rgba(255,255,255,.08);
    margin:15px 0;
}

/* =========================
   TABLE VIP
========================= */

.table-responsive{

    background:
    rgba(255,255,255,.05);

    border-radius:20px;

    overflow:hidden;

    border:1px solid rgba(255,255,255,.05);
}

table{
    width:100%;
    border-collapse:collapse;
}

table thead{

    background:
    linear-gradient(
        135deg,
        #14b8a6,
        #0891b2
    );
}

table th{

    color:white;

    padding:16px;

    font-size:14px;

    letter-spacing:.5px;
}

table td{

    padding:16px;

    color:#e2e8f0;

    border-bottom:
    1px solid rgba(255,255,255,.05);
}

table tr{

    background:
    rgba(255,255,255,.03);

    transition:.3s;
}

table tr:hover{

    background:
    rgba(45,212,191,.10);
}

/* =========================
   STATUS
========================= */

.status-online{
    color:#22c55e;
    font-weight:600;
}

.status-warning{
    color:#f59e0b;
    font-weight:600;
}

.status-danger{
    color:#ef4444;
    font-weight:600;
}

/* =========================
   FOOTER
========================= */

.text-center{
    color:#94a3b8 !important;
}

/* =========================
   SCROLLBAR
========================= */

::-webkit-scrollbar{
    width:8px;
}

::-webkit-scrollbar-thumb{

    background:
    linear-gradient(
        #14b8a6,
        #0891b2
    );

    border-radius:20px;
}

/* =========================
   INFORMASI
========================= */

.info-content{
    display:flex;
    align-items:center;
    height:140px;
    color:#e2e8f0;
    font-size:15px;
}

.monitoring-item{

    display:flex;
    align-items:center;
    gap:12px;

    margin-bottom:18px;

    font-size:15px;

    color:#f8fafc;
}

.dot{

    width:12px;
    height:12px;

    border-radius:50%;

    background:#22c55e;

    box-shadow:
    0 0 15px #22c55e;
}

.info-item{

    display:flex;
    align-items:center;
    gap:12px;

    padding:12px 0;

    border-bottom:
    1px solid rgba(255,255,255,.08);

    color:#e2e8f0;
}

.info-item:last-child{
    border-bottom:none;
}

.info-item i{

    width:30px;
    height:30px;

    display:flex;
    align-items:center;
    justify-content:center;

    border-radius:10px;

    background:
    rgba(45,212,191,.15);

    color:#2dd4bf;
}

</style>

</head>

<body>
    
<div class="sidebar">

<div class="logo">
    KKMP
</div>

<a href="../home.php" class="home-menu">
    <i class="fas fa-house"></i>
    Home
</a>

<a href="../admin/dashboard.php">
    <i class="fas fa-home"></i>
    Dashboard
</a>

<?php
if($_SESSION['level']=="admin" ||
   $_SESSION['level']=="pengurus"){
?>

<a href="../anggota/index.php">
    <i class="fas fa-users"></i>
    Data Anggota
</a>

<?php if($_SESSION['level']=="admin"){ ?>

<a href="../pengurus/index.php">
    <i class="fas fa-user-tie"></i>
    Data Pengurus
</a>

<a href="../pengawas/index.php">
    <i class="fas fa-user-shield"></i>
    Data Pengawas
</a>

<a href="../pengelola/index.php">
    <i class="fas fa-briefcase"></i>
    Data Pengelola
</a>

<?php } ?>

<a href="../simpanan/index.php">
    <i class="fas fa-wallet"></i>
    Simpanan
</a>

<a href="../pinjaman/index.php">
    <i class="fas fa-money-bill-wave"></i>
    Pinjaman
</a>

<?php } ?>

<a href="../laporan.php">
    <i class="fas fa-file-alt"></i>
    Laporan
</a>

<a href="/koperasi/cetak/cetak_laporan.php?awal=2025-01-01&akhir=2025-12-31">
    <i class="fas fa-print"></i>
    Cetak Laporan
</a>

<a href="logout.php" class="logout-menu">
    <i class="fas fa-sign-out-alt"></i>
    Logout
</a>

</div>

<div class="content">

    <div class="topbar">

        <div>
        <span class="dashboard-badge">
        SISTEM INFORMASI KOPERASI DIGITAL
    </span>
        <h2>Dashboard Manajemen KKMP</h2>
            <small>Pusat Pengelolaan Data Koperasi Kelurahan Merah Putih Indonesia</small>
        </div>

        <div class="user-box">

<i class="fas fa-user-circle"></i>

<?= $_SESSION['username']; ?>

<br>

<small>

<?php
if($_SESSION['level']=="admin"){
    echo "👑 Administrator Sistem";
}
elseif($_SESSION['level']=="pengurus"){
    echo "👔 Pengurus Koperasi";
}
elseif($_SESSION['level']=="pengawas"){
    echo "🛡️ Pengawas Koperasi";
}
?>

</small>

<br>

<span id="jam"></span>

</div>

    </div>

    <div class="info-box mb-4">
    <h3>🏢 Pusat Kendali Koperasi Digital</h3>

<p>
Selamat datang di pusat pengelolaan data KKMP. Sistem ini membantu
pengurus dalam mengelola anggota, simpanan, pinjaman, pengawasan,
laporan dan aktivitas koperasi secara modern, transparan, dan real-time.
</p>
</div>

    <!-- WELCOME -->

    <div class="info-box">

    <h3>
👋 Selamat Datang,
<?= $_SESSION['username']; ?>
</h3>

        <hr>

        <p>
Dashboard ini menyediakan akses cepat untuk seluruh aktivitas
koperasi, mulai dari pengelolaan anggota, transaksi simpanan,
pengajuan pinjaman, hingga pembuatan laporan keuangan.
</p>

    </div>

    <!-- STATISTIK -->

    <div class="row g-4 mt-2">

        <div class="col-md-3">
            <div class="stat-card">
                <i class="fas fa-users"></i>
                <h2>125</h2>
                <p>Anggota Terdaftar</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card">
                <i class="fas fa-user-tie"></i>
                <h2>5</h2>
                <p>Pengurus Organisasi</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card">
                <i class="fas fa-wallet"></i>
                <h2>75 Jt</h2>
                <p>Akumulasi Simpanan</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card">
                <i class="fas fa-money-check-alt"></i>
                <h2>30 Jt</h2>
                <p>Pinjaman Berjalan</p>
            </div>
        </div>

    </div>

    <!-- QUICK MENU -->

    <div class="row mt-4">

        <div class="col-md-3">
            <div class="stat-card text-center">
                <i class="fas fa-user-plus"></i>
                <h5>Registrasi Anggota</h5>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card text-center">
                <i class="fas fa-wallet"></i>
                <h5>Manajemen Simpanan</h5>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card text-center">
                <i class="fas fa-money-bill-wave"></i>
                <h5>Manajemen Pinjaman</h5>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card text-center">
                <i class="fas fa-print"></i>
                <h5>Laporan & Statistik</h5>
            </div>
        </div>

    </div>

    <!-- INFORMASI -->

    <div class="row mt-4 align-items-stretch">

<!-- INFORMASI KOPERASI -->
<div class="col-md-8">

<div class="info-box h-100">

<h4>📢 Informasi Koperasi</h4>

<hr>

<div class="info-item">
    <i class="fas fa-bullhorn"></i>
    Selamat datang di Sistem Informasi KKMP Indonesia.
</div>

<div class="info-item">
    <i class="fas fa-users"></i>
    Peningkatan kualitas pelayanan anggota menjadi prioritas utama koperasi.
</div>

<div class="info-item">
    <i class="fas fa-wallet"></i>
    Pembayaran simpanan wajib dilakukan setiap bulan sesuai ketentuan.
</div>

<div class="info-item">
    <i class="fas fa-money-bill-wave"></i>
    Pengajuan pinjaman dapat dilakukan melalui sistem digital KKMP.
</div>

<div class="info-item">
    <i class="fas fa-calendar-check"></i>
    Rapat Anggota Tahunan akan dilaksanakan pada akhir tahun buku.
</div>

<div class="info-item">
    <i class="fas fa-chart-line"></i>
    Seluruh laporan koperasi dapat dipantau secara realtime.
</div>

</div>

</div>

<!-- MONITORING SISTEM -->
<div class="col-md-4">

    <div class="info-box h-100">

        <h4>🟢 Monitoring Sistem</h4>

        <hr>

        <div class="monitoring-item">
            <span class="dot"></span>
            Server : Beroperasi Normal
        </div>

        <div class="monitoring-item">
            <span class="dot"></span>
            Database : Terhubung
        </div>

        <div class="monitoring-item">
            <span class="dot"></span>
            User Login : Aktif
        </div>

        <div class="monitoring-item">
            <span class="dot"></span>
            Keamanan Sistem : Aman
        </div>

    </div>

</div>

</div>
<hr>
<br>

    <!-- AKTIVITAS -->

    <div class="info-box">

    <h4>📋 Riwayat Aktivitas Koperasi</h4>

        <hr>

        <div class="table-responsive">

<table class="table table-dark table-hover align-middle">

    <tr>
        <th>Tanggal</th>
        <th>Aktivitas</th>
    </tr>

    <tr>
        <td>01 Juni 2026</td>
        <td>Penambahan anggota baru</td>
    </tr>

    <tr>
        <td>02 Juni 2026</td>
        <td>Pembayaran simpanan wajib</td>
    </tr>

    <tr>
        <td>03 Juni 2026</td>
        <td>Pengajuan pinjaman anggota</td>
    </tr>

    <tr>
        <td>04 Juni 2026</td>
        <td>Verifikasi data anggota</td>
    </tr>

</table>

</div>

    <!-- VISI MISI -->

    <div class="row mt-4">

        <div class="col-md-6">

            <div class="info-box">

              <h4>🎯 Visi KKMP</h4>

                <hr>

                <p>
Menjadi koperasi modern yang profesional,
transparan, inovatif dan terpercaya dalam
mendorong kesejahteraan seluruh anggota.
</p>

            </div>

        </div>

        <div class="col-md-6">

            <div class="info-box">

            <h4>🚀 Misi KKMP</h4>
            <hr>

<ul>
<li>Meningkatkan kualitas pelayanan anggota.</li>
<li>Mengembangkan usaha koperasi yang berkelanjutan.</li>
<li>Mendorong pertumbuhan ekonomi masyarakat.</li>
<li>Mewujudkan tata kelola koperasi yang profesional.</li>
<li>Memanfaatkan teknologi digital dalam operasional koperasi.</li>
</ul>

            </div>

        </div>

    </div>

    <!-- FOOTER -->

    <div class="text-center mt-5 text-white">

        <hr>

        <p>
        © 2026 KKMP Digital System
Koperasi Kelurahan Merah Putih Indonesia

"Transparan • Profesional • Modern"
        </p>

    </div>

</div>

<script>

function tampilJam(){

    const now = new Date();

    document.getElementById('jam').innerHTML =
    now.toLocaleTimeString('id-ID');

}

setInterval(tampilJam,1000);

</script>
</body>
</html>