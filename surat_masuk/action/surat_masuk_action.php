<?php
// https://www.malasngoding.com
// menghubungkan koneksi database
include $_SERVER['DOCUMENT_ROOT']."/tes4/koneksi.php";
include_once $_SERVER['DOCUMENT_ROOT']."/tes4/fungsi/fungsi_surat.php";

function console_log($data, bool $quotes = true) {
	$output = json_encode($data);
	if ($quotes) {
		echo "<script>console.log('{$output}' );</script>";
	} else {
		echo "<script>console.log({$output} );</script>";
	}
}

// menangkap data dari form
$kode_surat = $_POST['kode_surat'];
$penerima = $_POST['penerima'];
$pengirim = $_POST['pengirim'];
$jenis_surat = $_POST['jenis_surat'];
$tanggal_masuk = $_POST['tanggal_masuk'];
$tanggal_keluar = $_POST['tanggal_keluar'];
$perihal = $_POST['perihal'];
$sifat = $_POST['sifat'];
$lampiran = $_POST['lampiran'];

$waktu = $_POST['waktu'];
$tempat = $_POST['tempat'];
$hal = $_POST['hal'];
$dc = $_POST['dc'];

$rand = rand();
$ekstensi =  array('pdf', 'docx', 'txt');
$filename = $_FILES['file_surat']['name'];
$ukuran = $_FILES['file_surat']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

$getNama = getNama($jenis_surat);

if (!in_array($ext, $ekstensi)) {
	header("location:http://localhost/tes4/surat_masuk/input_surat_masuk.php?gagal=Ekstensi yang diperbolehkan .pdf, .docx, .doc" . urldecode($gagal));
} else {
	if ($ukuran < 1044070) {
		$xx = $rand . '_' . $filename;
		move_uploaded_file($_FILES['file_surat']['tmp_name'], $_SERVER["DOCUMENT_ROOT"]."/tes4/fungsi/file/" . $rand . '_' . $filename);
		$quer = mysqli_query($koneksi, "INSERT INTO project VALUES('$kode_surat','$penerima','$pengirim', '$getNama', '$tanggal_masuk', '$tanggal_keluar', '$perihal', '$sifat', '$lampiran', '$xx', '$waktu', '$tempat', '$hal', '$dc')");
		header("location:http://localhost/tes4/surat_masuk/surat_masuk.php?alert=Data Berhasil Disimpan" . urldecode($alert));
	} else {
		header("location:http://localhost/tes4/surat_masuk/input_surat_masuk.php?gagal=Ukuran file terlalu besar" . urldecode($gagal));
	}
}

// menginput data ke table barang

//mysqli_query($koneksi, "INSERT INTO project VALUES ('$kode_surat', '$penerima', '$pengirim', '$getNama', '$tanggal_masuk', '$tanggal_keluar', '$perihal', '$sifat', '$lampiran', '$xx', '$waktu', '$tempat', '$hal', '$dc')") or die(mysqli_error($koneksi));

// mengalihkan halaman kembali ke index.php
//header("location:http://localhost/tes3/surat_masuk.php#");
?>