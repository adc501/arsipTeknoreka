<?php
// koneksi database
include $_SERVER['DOCUMENT_ROOT']."/tes4/koneksi.php";

function console_log($data, bool $quotes = true) {
	$output = json_encode($data);
	if ($quotes) {
		echo "<script>console.log('{$output}' );</script>";
	} else {
		echo "<script>console.log({$output} );</script>";
	}
}

console_log("tes");

// menangkap data yang di kirim dari form
$kode_surat = $_POST['kode_surat'];
$penerima = $_POST['penerima'];
$pengirim = $_POST['pengirim'];
$jenis_surat = $_POST['jenis_surat'];
$tanggal_masuk = $_POST['tanggal_masuk'];
$tanggal_keluar = $_POST['tanggal_keluar'];
$perihal = $_POST['perihal'];
$sifat = $_POST['sifat'];
$lampiran = $_POST['lampiran'];
$file_surat = $_FILES['file_surat']['name'];

$waktu = $_POST['waktu'];
$tempat = $_POST['tempat'];
$hal = $_POST['hal'];
$dc = $_POST['dc'];

if ($file_surat != "") {
	$rand = rand();
	$ekstensi =  array('pdf', 'docx', 'txt');
	$ukuran = $_FILES['file_surat']['size'];
	$ext = pathinfo($file_surat, PATHINFO_EXTENSION);
	
	if (!in_array($ext, $ekstensi)) {
		header("location:http://localhost/tes4/surat_masuk/surat_masuk.php?gagal=Ekstensi yang diperbolehkan hanya .pdf, .doc, .docx".urldecode($gagal));
	} else {
		if ($ukuran < 1044070) {
			move_uploaded_file($_FILES['file_surat']['tmp_name'], 'C:/xampp/htdocs/tes4/fungsi/file/' . $rand . '_' . $file_surat);
			$namaFile = $rand . '_' . $file_surat;
			mysqli_query($koneksi, "UPDATE project set penerima='$penerima', pengirim='$pengirim', jenis_surat='$jenis_surat', tanggal_masuk='$tanggal_masuk', tanggal_keluar='$tanggal_keluar', perihal='$perihal', sifat='$sifat', lampiran='$lampiran', upload='$namaFile', waktu='$waktu', tempat='$tempat', hal='$hal', dc='$dc' where kode_surat='$kode_surat'");
			header("location:http://localhost/tes4/surat_masuk/surat_masuk.php?alert=Berhasil Edit Data".urldecode($alert));
		} else {
			header("location:http://localhost/tes4/surat_masuk/surat_masuk.php?gagal=Ukuran file terlalu besar".urldecode($gagal));
		}
	}
}else {
	mysqli_query($koneksi, "UPDATE project set penerima='$penerima', pengirim='$pengirim', jenis_surat='$jenis_surat', tanggal_masuk='$tanggal_masuk', tanggal_keluar='$tanggal_keluar', perihal='$perihal', sifat='$sifat', lampiran='$lampiran', waktu='$waktu', tempat='$tempat', hal='$hal', dc='$dc' where kode_surat='$kode_surat'");
	header("location:http://localhost/tes4/surat_masuk/surat_masuk.php?alert=Berhasil Edit Data".urldecode($alert));
}


// update data ke database
// mengalihkan halaman kembali ke index.php
//header("location:http://localhost/tes3/surat_masuk.php");
