<?php

include $_SERVER['DOCUMENT_ROOT']."/tes4/koneksi.php";
include_once $_SERVER['DOCUMENT_ROOT']."/tes3/fungsi/fungsi_surat.php";

// menangkap data dari form

$jenis_surat = $_POST['jenis_surat'];

$getNama = getNama($jenis_surat);

$rand = rand();
$ekstensi =  array('png', 'jpeg', 'jpg');
$filename = $_FILES['cop_surat']['name'];
$ukuran = $_FILES['cop_surat']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if (isset($_POST['signaturesubmit'])) {
  if (!in_array($ext, $ekstensi)) {
    header("location:http://localhost/tes4/surat_keluar/input_surat_keluar.php?gagal=Ekstensi yang diperbolehkan .png, .jpeg, .jpg" . urldecode($gagal));
  } else {
    $folderPath = 'C:/xampp/htdocs/tes4/fungsi/ttd/';
    $signature = $_POST['signature'];
    $signatureFileName = uniqid() . '.png';
    $signature = str_replace('data:image/png;base64,', '', $signature);
    $signature = str_replace(' ', '+', $signature);
    $data = base64_decode($signature);
    $file = $folderPath . $signatureFileName;
    file_put_contents($file, $data);
    $msg = "<div class='alert alert-success'>Signature Uploaded</div>";

    if ($ukuran < 1044070) {
      $xx = $rand . '_' . $filename;
      move_uploaded_file($_FILES['cop_surat']['tmp_name'], 'C:/xampp/htdocs/tes4/fungsi/cop/' . $rand . '_' . $filename);
      mysqli_query($koneksi, "INSERT INTO keluar VALUES(NULL,'$getNama', '$xx', '$signatureFileName')");
      header("location:http://localhost/tes4/surat_keluar/surat_keluar.php?alert=Data Berhasil Disimpan".urldecode($alert));
    } else {
      header("location:http://localhost/tes4/surat_keluar/input_surat_keluar.php?gagal=Ukuran terlalu besar" . urldecode($gagal));
    }
  }
}

//mysqli_query($koneksi, "INSERT INTO keluar VALUES(NULL,'$getNama', '$xx', '$ttd')");

//header("location:http://localhost/tes3/surat_keluar.php");
?>