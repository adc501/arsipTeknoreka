<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
    <img src="https://i0.wp.com/titikdua.net/wp-content/uploads/2019/12/Contoh-kop-surat-perusahaan.jpg" alt="cop_surat" width="100%">
    <?php
    include $_SERVER['DOCUMENT_ROOT']."/tes4/koneksi.php";
	$kode_surat = isset($_GET['kode_surat']);
	$data = mysqli_query($koneksi, "SELECT * FROM buat WHERE kode_surat='$kode_surat'");
	while ($d = mysqli_fetch_array($data)) {
        echo "Nomor : ";
    }
	
    ?>
</body>
</html>