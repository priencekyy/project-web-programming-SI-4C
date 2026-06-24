<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>KKMP Home</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>

/* ===== BASE ===== */
body{
    margin:0;
    font-family:Segoe UI,sans-serif;
    overflow-x:hidden;
    overflow-y:auto;
}

/* ===== BACKGROUND SLIDER ===== */
.bg-slider{
    position:fixed;
    top:0;left:0;
    width:100%;
    height:100%;
    z-index:-1;
}

.bg{
    position:absolute;
    width:100%;
    height:100%;
    background-size:cover;
    background-position:center;
    opacity:0;
    animation:slide 18s infinite;
}

/* 3 GAMBAR BACKGROUND */
.bg1{
    background-image:url('https://images.unsplash.com/photo-1521737604893-d14cc237f11d');
    animation-delay:0s;
}

.bg2{
    background-image:url('https://images.unsplash.com/photo-1554224155-8d04cb21cd6c');
    animation-delay:6s;
}

.bg3{
    background-image:url('https://images.unsplash.com/photo-1508385082359-f38ae991e8f2');
    animation-delay:12s;
}

/* ANIMASI SLIDE FADE */
@keyframes slide{
    0%{opacity:0;}
    10%{opacity:1;}
    33%{opacity:1;}
    45%{opacity:0;}
    100%{opacity:0;}
}

/* DARK OVERLAY */
.overlay{
    position:fixed;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.6);
    z-index:-1;
}

/* ===== HERO ===== */
.hero-content{
    min-height:100vh;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    text-align:center;
    color:white;
    padding:40px 20px;
}


/* GLASS BOX */
.glass{
    background:rgba(255,255,255,0.08);
    backdrop-filter:blur(12px);
    padding:25px;
    border-radius:16px;
    max-width:700px;
}

/* TITLE */
h1{
    font-size:42px;
    margin-bottom:10px;
}

/* BUTTON */
.btn-login{
    display:inline-block;
    margin-top:15px;
    padding:12px 22px;
    border-radius:12px;
    background:#22c55e;
    color:white;
    text-decoration:none;
    font-weight:bold;
    transition:0.3s;
}

.btn-login:hover{
    background:#16a34a;
    transform:scale(1.05);
}

/* FEATURE CARDS */
.info{
    display:flex;
    gap:12px;
    margin-top:25px;
    flex-wrap:wrap;
    justify-content:center;
}

.card{
    background:rgba(255,255,255,0.1);
    padding:15px;
    border-radius:12px;
    width:150px;
    transition:0.3s;
}

.card:hover{
    transform:translateY(-5px);
    background:rgba(255,255,255,0.2);
}

.card i{
    font-size:22px;
    margin-bottom:8px;
    color:#93c5fd;
}

/* SMALL TEXT */
small{
    color:#cbd5e1;
}

/* ===== VIP GRID ===== */

.vip-grid{
    width:100%;
    max-width:1000px;
    margin-top:30px;

    display:grid;
    grid-template-columns:1fr 1fr;
    gap:20px;
}

.vip-card{
    background:rgba(255,255,255,0.08);
    backdrop-filter:blur(15px);

    border:1px solid rgba(255,255,255,0.1);
    border-radius:20px;

    padding:25px;

    display:flex;
    align-items:center;
    gap:20px;

    transition:.3s;
}

.vip-card:hover{
    transform:translateY(-5px);
    background:rgba(255,255,255,0.12);
}

.vip-card i{
    width:70px;
    height:70px;

    display:flex;
    align-items:center;
    justify-content:center;

    border-radius:18px;

    background:linear-gradient(
        135deg,
        #06b6d4,
        #14b8a6
    );

    color:white;
    font-size:28px;
}

.vip-card h4{
    margin:0 0 8px;
    color:white;
}

.vip-card p{
    margin:0;
    color:#dbeafe;
    font-size:14px;
}

@media(max-width:768px){

    .vip-grid{
        grid-template-columns:1fr;
    }

}

</style>
</head>

<body>

<!-- BACKGROUND SLIDER -->
<div class="bg-slider">
    <div class="bg bg1"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>
</div>

<div class="overlay"></div>

<!-- CONTENT -->
<div class="hero-content">

<div class="glass">

<h1>Sistem Informasi KKMP</h1>

<p>
    Platform digital terintegrasi untuk pengelolaan data anggota,
    simpanan, pinjaman, serta laporan keuangan koperasi secara
    cepat, akurat, dan transparan.
</p>

<!-- LOGIN -->
<a href="login.php" class="btn-login">
    <i class="fas fa-right-to-bracket"></i> Masuk Sistem
</a>

<!-- FEATURE -->
<div class="info">

<div class="vip-grid">

    <div class="vip-card">
        <i class="fas fa-users"></i>
        <div>
            <h4>Manajemen Anggota</h4>
            <p>Kelola data anggota koperasi dengan mudah dan terstruktur.</p>
        </div>
    </div>

    <div class="vip-card">
        <i class="fas fa-shield-alt"></i>
        <div>
            <h4>Keamanan Sistem</h4>
            <p>Data koperasi terlindungi dengan sistem keamanan modern.</p>
        </div>
    </div>

    <div class="vip-card">
        <i class="fas fa-chart-line"></i>
        <div>
            <h4>Data Real-Time</h4>
            <p>Monitoring transaksi dan laporan secara langsung.</p>
        </div>
    </div>

    <div class="vip-card">
        <i class="fas fa-building"></i>
        <div>
            <h4>Koperasi Modern</h4>
            <p>Mendukung transformasi digital KKMP menuju masa depan.</p>
        </div>
    </div>

</div>

</div>

</body>
</html>