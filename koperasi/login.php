<!DOCTYPE html>

<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login KKMP</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

/* RESET */
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

/* BACKGROUND */
body{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:linear-gradient(
        135deg,
        #0f172a 0%,
        #1e3a5f 35%,
        #0f766e 70%,
        #0891b2 100%
    );
    overflow:hidden;
    position:relative;
}

/* BLOBS EFFECT */
body::before{
    content:'';
    position:absolute;
    width:400px;
    height:400px;
    background:#06b6d4;
    border-radius:50%;
    top:-100px;
    left:-100px;
    filter:blur(150px);
    opacity:0.7;
}

body::after{
    content:'';
    position:absolute;
    width:400px;
    height:400px;
    background:#14b8a6;
    border-radius:50%;
    bottom:-100px;
    right:-100px;
    filter:blur(150px);
    opacity:0.7;
}

/* LOGIN BOX */
.login-box{
    position:relative;
    width:420px;
    padding:40px;
    border-radius:25px;
    background:rgba(255,255,255,0.10);
    backdrop-filter:blur(25px);
    border:1px solid rgba(255,255,255,0.18);
    box-shadow:0 15px 40px rgba(0,0,0,0.35);
    z-index:2;
}

/* LOGO */
.logo{
    text-align:center;
    margin-bottom:25px;
}

.logo i{
    font-size:60px;
    color:white;
}

.logo h2{
    color:white;
    margin-top:10px;
    font-weight:700;
}

.logo p{
    color:#d1d5db;
    font-size:14px;
}

/* FORM */
.form-label{
    color:white;
}

.form-control{
    background:rgba(255,255,255,0.1);
    border:none;
    color:white;
    padding:12px;
    width:100%;
    border-radius:10px;
}

.form-control:focus{
    background:rgba(255,255,255,0.15);
    color:white;
    outline:none;
    box-shadow:none;
}

.form-control::placeholder{
    color:#ddd;
}

/* BUTTON */
.btn-login{
    width:100%;
    padding:12px;
    border:none;
    border-radius:12px;
    background:linear-gradient(
        135deg,
        #0891b2,
        #0f766e
    );
    color:white;
    font-weight:600;
    cursor:pointer;
    transition:0.3s;
}

.btn-login:hover{
    transform:translateY(-2px);
    box-shadow:0 8px 20px rgba(8,145,178,0.4);
}

/* FOOTER */
.footer-text{
    text-align:center;
    margin-top:20px;
    color:#d1d5db;
    font-size:13px;
}

</style>

</head>

<body>

<div class="login-box">

```
<div class="logo">

    <i class="fas fa-landmark"></i>

    <h2>KKMP</h2>

    <p>Koperasi Kelurahan Merah Putih</p>

</div>

<form action="proses_login.php" method="POST">

    <div class="mb-3">

        <label class="form-label">
            Username
        </label>

        <input
            type="text"
            name="username"
            class="form-control"
            placeholder="Masukkan Username"
            required>

    </div>

    <div class="mb-3">

        <label class="form-label">
            Password
        </label>

        <input
            type="password"
            name="password"
            class="form-control"
            placeholder="Masukkan Password"
            required>

    </div>

    <button
        type="submit"
        class="btn-login">

        <i class="fas fa-right-to-bracket"></i>
        Login

    </button>

</form>

<div class="footer-text">
    © 2026 Sistem Informasi KKMP
</div>
```

</div>

</body>
</html>
