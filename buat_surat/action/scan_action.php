<?php
// https://www.malasngoding.com
// menghubungkan koneksi database
include $_SERVER['DOCUMENT_ROOT']."/tes4/koneksi.php";
include_once $_SERVER['DOCUMENT_ROOT']."/tes3/fungsi/fungsi_surat.php";


// menangkap data dari form
$kode_surat = $_POST['kode_surat'];
$scan = $_POST['scan'];

$rand = rand();
$ekstensi =  array('png', 'jpeg', 'jpg');
$filename = $_FILES['scan']['name'];
$ukuran = $_FILES['scan']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
$tmpName = $_FILES['scan']['tmp_name'];

if (!in_array($ext, $ekstensi)) {
	header("location:http://localhost/tes4/buat_surat/buat_surat.php?gagal=Ekstensi yang diperbolehkan .png, .jpg, .jpeg" . urldecode($gagal));
} else {
	if ($ukuran < 1044070) {
		move_uploaded_file($_FILES['scan']['tmp_name'], 'C:/xampp/htdocs/tes4/fungsi/scan/' . $rand . '_' . $filename);
		$scanFile = $rand . '_' . $filename;
		mysqli_query($koneksi, "UPDATE buat SET scan='$scanFile' WHERE kode_surat='$kode_surat'");
		header("location:http://localhost/tes4/buat_surat/buat_surat.php?alert=Berhasil Upload File Scan" . urldecode($alert));
	} else {
		header("location:http://localhost/tes4/buat_surat/buat_surat.php?gagal=Ukuran file terlelu besar" . urldecode($gagal));
	}
}


// menginput data ke table barang

//$qry = mysqli_query($koneksi, "UPDATE buat SET jenis_surat='$jenis_surat', lampiran='$lampiran', hal='$hal', penerima='$penerima', isi='$isi', penutup='$penutup', identitas='$identitas', pengirim='$pengirim', keterangan='$keterangan', scan='$scanFile' WHERE kode_surat='$kode_surat'");


// mengalihkan halaman kembali ke index.php
//header("location:http://localhost/tes3/buat_surat.php");
?>