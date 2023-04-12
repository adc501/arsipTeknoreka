<?php

include $_SERVER['DOCUMENT_ROOT']."/tes4/koneksi.php";

// menangkap data dari form

function console_log($data, bool $quotes = true) {
  $output = json_encode($data);
  if ($quotes) {
      echo "<script>console.log('{$output}' );</script>";
  } else {
      echo "<script>console.log({$output} );</script>";
  }
}

console_log("tes");

$id_surat = $_POST['id_surat'];
$jenis_surat = $_POST['jenis_surat'];
$cop_surat = $_FILES['cop_surat']['name'];

if (isset($_POST['signaturesubmit'])) {
  $signature = $_POST['signature'];
  if ($cop_surat != "") {
    $rand = rand();
    $ekstensi =  array('png', 'jpeg', 'jpg');
    $ukuran = $_FILES['cop_surat']['size'];
    $ext = pathinfo($cop_surat, PATHINFO_EXTENSION);

    if (!in_array($ext, $ekstensi)) {
      header("location:http://localhost/tes4/surat_keluar/edit_surat_keluar.php?gagal=Ekstensi yang diperbolehkan .png, .jpeg, .jpg" . urldecode($gagal));
    } else {
      if ($ukuran < 1044070) {
        $xx = $rand . '_' . $cop_surat;
        move_uploaded_file($_FILES['cop_surat']['tmp_name'], 'C:/xampp/htdocs/tes4/fungsi/cop/' . $rand . '_' . $cop_surat);
        mysqli_query($koneksi, "UPDATE keluar SET jenis_surat='$jenis_surat', cop_surat='$xx' WHERE id_surat='$id_surat'");
        header("location:http://localhost/tes4/surat_keluar/surat_keluar.php?alert=Data Berhasil Disimpan".urldecode($alert));
      } else {
        header("location:http://localhost/tes4/surat_keluar/input_surat_keluar.php?gagal=Ukuran terlalu besar" . urldecode($gagal));
      }
    }
    if ($signature != "") {
      if (!in_array($ext, $ekstensi)) {
        header("location:http://localhost/tes4/surat_keluar/edit_surat_keluar.php?gagal=Ekstensi yang diperbolehkan .png, .jpeg, .jpg" . urldecode($gagal));
      } else {
        $folderPath = 'C:/xampp/htdocs/tes4/fungsi/ttd/';
        $signatureFileName = uniqid() . '.png';
        $signature = str_replace('data:image/png;base64,', '', $signature);
        $signature = str_replace(' ', '+', $signature);
        $data = base64_decode($signature);
        $file = $folderPath . $signatureFileName;
        $put = file_put_contents($file, $data);
    
        if ($ukuran < 1044070) {
          $x = $rand . '_' . $cop_surat;
          move_uploaded_file($_FILES['cop_surat']['tmp_name'], 'C:/xampp/htdocs/tes4/fungsi/cop/' . $rand . '_' . $cop_surat);
          mysqli_query($koneksi, "UPDATE keluar SET jenis_surat='$jenis_surat', cop_surat='$x', ttd='$signatureFileName' WHERE id_surat='$id_surat'");
          header("location:http://localhost/tes4/surat_keluar/surat_keluar.php?alert=Berhasil Edit Data".urldecode($alert));
        } else {
          header("location:http://localhost/tes4/surat_keluar/input_surat_keluar.php?gagal=Ukuran terlalu besar" . urldecode($gagal));
        }
      }
    }
  }if ($signature != "") {
    $folderPath = 'C:/xampp/htdocs/tes4/fungsi/ttd/';
    $signatureFileName = uniqid() . '.png';
    $signature = str_replace('data:image/png;base64,', '', $signature);
    $signature = str_replace(' ', '+', $signature);
    $data = base64_decode($signature);
    $file = $folderPath . $signatureFileName;
    file_put_contents($file, $data);
    $msg = "<div class='alert alert-success'>Signature Uploaded</div>";

    mysqli_query($koneksi, "UPDATE keluar SET jenis_surat='$jenis_surat', ttd='$signatureFileName' WHERE id_surat='$id_surat'");
    header("location:http://localhost/tes4/surat_keluar/surat_keluar.php?alert=Berhasil Edit Data".urldecode($alert));
  }else {
    mysqli_query($koneksi, "UPDATE keluar SET jenis_surat='$jenis_surat' WHERE id_surat='$id_surat'");
    header("location:http://localhost/tes4/surat_keluar/surat_keluar.php?alert=Berhasil Edit Data".urldecode($alert));
  }
}

//mysqli_query($koneksi, "INSERT INTO keluar VALUES(NULL,'$getNama', '$xx', '$ttd')");

?>