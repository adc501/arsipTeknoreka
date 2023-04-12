<?php
// koneksi database
include $_SERVER['DOCUMENT_ROOT']."/tes4/koneksi.php";

// menangkap data id yang di kirim dari url
$id_surat = $_GET['id_surat'];


// menghapus data dari database
mysqli_query($koneksi, "DELETE FROM keluar WHERE id_surat='$id_surat'");

// mengalihkan halaman kembali ke index.php
header("location:http://localhost/tes4/surat_keluar/surat_keluar.php?alert=Berhasil Hapus Data".urldecode($alert));

?>