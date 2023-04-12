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
$scan = $_POST['scan'];

$getNama = getNama($jenis_surat);


// menginput data ke table barang

$qr = mysqli_query($koneksi, "INSERT INTO `buat` (`kode_surat`, `jenis_surat`, `lampiran`, `hal`, `penerima`, `isi`, `penutup`, `identitas`, `pengirim`, `keterangan`, `scan`) VALUES ('$kode_surat', '$getNama', '$lampiran', '$hal', '$penerima', '$isi', '$penutup', '$identitas', '$pengirim', '$keterangan', '$scan')");

//mysqli_query($koneksi, "INSERT INTO buat VALUES ('$kode_surat', '$getNama', '$lampiran', '$hal', '$penerima', '$isi', '$penutup', '$identitas', '$pengirim', '$keterangan', '$scan')") or die(mysqli_error($koneksi));

//mysqli_query($koneksi, "INSERT INTO buat VALUES ('$kode_surat', '$getNama', '$lampiran', '$hal', '$penerima', '$isi', '$penutup', '$identitas', '$pengirim', '$keterangan', NULL)");

header("location:http://localhost/tes4/buat_surat/buat_surat.php?alert=Data Berhasil Disimpan" . urldecode($alert));


// mengalihkan halaman kembali ke index.php
//header("location:http://localhost/tes3/buat_surat.php");
?>