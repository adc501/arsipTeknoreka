<?php
// koneksi database
include 'koneksi.php';

// menangkap data id yang di kirim dari url
$kode_surat = $_GET['kode_surat'];


// menghapus data dari database
mysqli_query($koneksi, "DELETE FROM buat WHERE kode_surat='$kode_surat'");

// mengalihkan halaman kembali ke index.php
header("location:http://localhost/tes4/buat_surat/buat_surat.php?alert=Berhasil Hapus Data" . urldecode($alert));

?>