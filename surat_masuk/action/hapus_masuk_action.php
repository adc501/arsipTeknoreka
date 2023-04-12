<?php
// koneksi database
include $_SERVER['DOCUMENT_ROOT']."/tes4/koneksi.php";

// menangkap data id yang di kirim dari url
$kode_surat = $_GET['kode_surat'];


// menghapus data dari database
mysqli_query($koneksi, "DELETE FROM project WHERE kode_surat='$kode_surat'");

// mengalihkan halaman kembali ke index.php
header("location:http://localhost/tes4/surat_masuk/surat_masuk.php?alert=Berhasil Hapus Data".urldecode($alert));
?>