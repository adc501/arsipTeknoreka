<?php
// https://www.malasngoding.com
// menghubungkan koneksi database
include $_SERVER['DOCUMENT_ROOT']."/tes4/koneksi.php";
include_once $_SERVER['DOCUMENT_ROOT']."/tes3/fungsi/fungsi_surat.php";


// menangkap data dari form
$kode_surat = $_POST['kode_surat'];
$jenis_surat = $_POST['jenis_surat'];
$lampiran = $_POST['lampiran'];
$hal = $_POST['hal'];
$penerima = $_POST['penerima'];
$isi = $_POST['isi'];
$penutup = $_POST['penutup'];
$identitas = $_POST['identitas'];
$pengirim = $_POST['pengirim'];
$keterangan = $_POST['keterangan'];

mysqli_query($koneksi, "UPDATE buat SET jenis_surat='$jenis_surat', lampiran='$lampiran', hal='$hal', penerima='$penerima', isi='$isi', penutup='$penutup', identitas='$identitas', pengirim='$pengirim', keterangan='$keterangan' WHERE kode_surat='$kode_surat'");
header("location:http://localhost/tes4/buat_surat/buat_surat.php?alert=Berhasil Edit Data" . urldecode($alert));


// menginput data ke table barang

//$qry = mysqli_query($koneksi, "UPDATE buat SET jenis_surat='$jenis_surat', lampiran='$lampiran', hal='$hal', penerima='$penerima', isi='$isi', penutup='$penutup', identitas='$identitas', pengirim='$pengirim', keterangan='$keterangan', scan='$scanFile' WHERE kode_surat='$kode_surat'");


// mengalihkan halaman kembali ke index.php
//header("location:http://localhost/tes3/buat_surat.php");
?>