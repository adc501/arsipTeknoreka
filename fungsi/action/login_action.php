<?php

session_start();

include $_SERVER['DOCUMENT_ROOT']."/tes4/koneksi.php";

$username = $_POST['username'];
$sandi = $_POST['sandi'];

$data = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND sandi='$sandi'");

$cek = mysqli_num_rows($data);

if ($cek > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("location:http://localhost/tes4/?alert=Selamat Datang" . urldecode($alert));
}else{
    header("location:http://localhost/tes4/register.php?gagal=Password atau Username salah" . urldecode($gagal));
}
?>