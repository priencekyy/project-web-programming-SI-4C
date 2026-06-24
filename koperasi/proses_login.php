<?php

session_start();
include 'config/koneksi.php';

$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$password = mysqli_real_escape_string($koneksi, $_POST['password']);

$sql = "SELECT * FROM admin
        WHERE username='$username'
        AND password='$password'";

$query = mysqli_query($koneksi, $sql);

if(mysqli_num_rows($query) > 0){

    $data = mysqli_fetch_assoc($query);

    $_SESSION['login'] = true;
    $_SESSION['username'] = $data['username'];
    $_SESSION['level'] = $data['level'];

    header("Location: admin/dashboard.php");
    exit;

}else{

    echo "
    <script>
        alert('Username atau Password Salah!');
        window.location='login.php';
    </script>
    ";

}

?>