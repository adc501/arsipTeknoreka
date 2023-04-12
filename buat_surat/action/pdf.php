<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
    <style>
        body{
            font-family: 'Times New Roman', Times, serif;
            padding: 5px;
        }
        .header{
            text-align: center;
            float: right;
        }
        p, span{
            font-size: 16px;
            padding: 0;
            margin: 0;
            text-align: justify;
            text-justify: inter-word;
        }
        .right{
            float: right;
        }
        hr{
            border: 2px solid black;
        }
        @media print {
            .hide{
                display: none;
            }
        }
    </style>
</head>
<body>
    <table>
        <td>
            <img src="https://teknoreka.com/wp-content/uploads/2022/09/cropped-teknoreka-tanpa-background-new.png" alt="logo" width="180px">
        </td>
        <td class="header">
            <br>
            <h1><b>PT TEKNOREKA INOVASI NUSANTARA</b></h1>
            <span>Perum Candi Gebang Blok 1 No. 18, Sleman - DIY</span>
            <br>
            <span>Telp: +62 82112882656 &nbsp;</span>
            <span>email: teknoreka.tinara@gmail.com</span>
        </td>
    </table>
    <hr>
    <?php
    function tgl($tanggal){

        $bulan = array (
            1 =>   	'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
            );
    
            $var = explode('-', $tanggal);
    
            return $var[2] . ' ' . $bulan[ (int)$var[1] ] . ' ' . $var[0];
            // var 0 = tanggal
            // var 1 = bulan
            // var 2 = tahun
    }

    include $_SERVER['DOCUMENT_ROOT']."/tes4/koneksi.php";
    $kode_surat = $_GET['kode_surat'];
    $query = mysqli_query($koneksi, "SELECT * FROM buat WHERE kode_surat='$kode_surat'");
    while ($b = mysqli_fetch_array($query)) {
    ?>
    <span class="right"> <?php echo tgl(date('Y-m-d')) ?></span>
    <p>Nomor: <?php echo $b['kode_surat']; ?></p>
    <p>Lampiran: <?php echo $b['lampiran']; ?></p>
    <p>Hal: <?php echo $b['hal']; ?></p>
    <br>
    <p>Kpd.</p>
    <p><?php echo $b['penerima']; ?></p>
    <p>Di Tempat</p>
    <br>
    <p>&nbsp; &nbsp; &nbsp; &nbsp; <?php echo $b['isi']; ?></p>
    <br>
    <p>&nbsp; &nbsp; &nbsp; &nbsp; <?php echo $b['penutup']; ?></p>
    <br>
    <br>
    <p class="right"><?php echo $b['identitas']; ?></p>
    <br>
    <br>
    <br>
    <p class="right"><?php echo $b['pengirim']; ?></p>
    <br>
    <p class="right"><?php echo $b['keterangan']; ?></p>
    <?php
    }
    ?>
    <br>
    <a href="http://localhost/tes4/buat_surat/buat_surat.php" class="hide btn btn-secondary">Return</a>
    <button onclick="printFunction()" class="hide btn btn-primary">Print</button>

    <script>
      function printFunction() { 
        window.print(); 
      }
    </script>
    <script src="extensions/print/bootstrap-table-print.js"></script>

</body>
</html>