<?php
// https://www.malasngoding.com
// menghubungkan koneksi database
include $_SERVER['DOCUMENT_ROOT']."/tes4/koneksi.php";

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $_POST['username'];
$email = $_POST['email'];
$sandi = $_POST['sandi'];

// menginput data ke table barang

mysqli_query($koneksi, "INSERT INTO users VALUES (NULL, '$first_name', '$last_name', '$username', '$email', '$sandi')") or die(mysqli_error($koneksi));

// mengalihkan halaman kembali ke index.php
header("location:http://localhost/tes4/register.php?alert=Berhasil registrasi") .urldecode($alert);
?>