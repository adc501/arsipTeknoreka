<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
     <link rel="stylesheet" type="text/css" href="http://localhost/tes4/css/style.css">
     <style>
      .sidebar ul li .active{
        background: #FFF;
      }

      .sidebar ul li .active .links_name,
      .sidebar ul li .active i{
        color: #11101D;
      }
      section .grid{
        margin: 5px;
        width: 350px;
        height: 100px;
        padding: 5px;
         
      }
      section .grid:hover{
        width: 380px;
        height: 120px;
        transition: all 0.2s;
      }
      .card{
        background-color: transparent;
        border: none;
      }
      .card-footer{
        background-color: transparent;
        align-content: end;
        float: right;
      }
     </style>
   </head>
<body>

<?php
session_start();
if (isset($_GET['alert'])) {
    print '<script>swal("Berhasil!", ("' . $_GET['alert'] . '"), "success");</script>';
}elseif (isset($_GET['gagal'])) {
    print '<script>swal("Gagal!", ("' . $_GET['gagal'] . '"), "error");</script>';
}
?>

  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus icon'></i>
      <div class="logo_name">Arsip</div>
      <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
          <i class='bx bx-search' ></i>
         <input type="text" placeholder="Search...">
         <span class="tooltip">Search</span>
      </li>
      <li>
        <a href="http://localhost/tes4/">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Dashboard</span>
        </a>
         <span class="tooltip">Dashboard</span>
      </li>
      <li>
       <a href="http://localhost/tes4/surat_masuk/surat_masuk.php">
        <i class='bx bx-archive-in'></i>
         <span class="links_name">Surat Masuk</span>
       </a>
       <span class="tooltip">Surat Masuk</span>
     </li>
     <li>
       <a href="http://localhost/tes4/surat_keluar/surat_keluar.php">
        <i class='bx bx-archive-out'></i>
        <span class="links_name">Surat Keluar</span>
       </a>
       <span class="tooltip">Surat Keluar</span>
     </li>
     <li>
       <a href="http://localhost/tes4/buat_surat/buat_surat.php">
        <i class='bx bx-edit-alt'></i>
        <span class="links_name">Buat Surat</span>
       </a>
       <span class="tooltip">Buat Surat</span>
     </li>
     <li class="profile">
         <div class="profile-details">
           <!--<img src="profile.jpg" alt="profileImg">-->
           <div class="name_job">
             <div class="name"><?php echo $_SESSION['username']; ?></div>
             <div class="job">User</div>
           </div>
         </div>
         <a href="fungsi/action/logout_action.php"><i class='bx bx-log-out' id="log_out" ></i></a>
     </li>
    </ul>
  </div>

  <section class="home-section">
    <div class="text px-4">Edit Data Surat Masuk</div>
      <div class="content px-4">
        <div class="card">
            <div class="card-body">
            <?php
              // https://www.malasngoding.com
              // menghubungkan dengan koneksi database
              include $_SERVER['DOCUMENT_ROOT']."/tes4/koneksi.php";
              $kode_surat = $_GET['kode_surat'];
	            $data = mysqli_query($koneksi, "select * from project where kode_surat='$kode_surat'");
	            while ($fetch = mysqli_fetch_array($data)) {
            ?>
                <form method="post" action="action/edit_masuk_action.php" enctype="multipart/form-data" class="row g-3 px-4">
                    <div class="col-md-3">
                        <label class="form-label">Kode Surat</label><br />
                        <input type="text" class="form-control" name="kode_surat" required="required" value="<?php echo $fetch['kode_surat']?>" readonly>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Penerima</label><br />
                        <input type="text" class="form-control" name="penerima" required="required" value="<?php echo $fetch['penerima']?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Pengirim</label><br />
                        <input type="text" class="form-control" name="pengirim" required="required" value="<?php echo $fetch['pengirim']?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-laber">Jenis Surat</label>
                        <select class="form-control" name="jenis_surat" id="changeJenisSurat" title="jenis_surat" value="<?php echo $fetch['jenis_surat']?>">
                            <option value="<?php echo $fetch['jenis_surat']?>"><?php echo $fetch['kode_surat']?></option>
                            <option value="1">Surat Keputusan (SK)</option>
                            <option value="2">Surat Undangan (SU)</option>
                            <option value="3">Surat Permohonan (SPm)</option>
                            <option value="4">Surat Pemberitahuan (SPb)</option>
                            <option value="5">Surat Peminjaman (SPp)</option>
                            <option value="6">Surat Pernyataan (SPn)</option>
                            <option value="7">Surat Mandat (SM)</option>
                            <option value="8">Surat Tugas (ST)</option>
                            <option value="9">Surat Keterangan (SKet)</option>
                            <option value="10">Surat Rekomendasi (SR)</option>
                            <option value="11">Surat Balasan (SB)</option>
                            <option value="12">Surat Perintah Perjalanan Dinas (SPPD)</option>
                            <option value="13">Sertifikat (SRT)</option>
                            <option value="14">Perjanjian Kerja (PK)</option>
                            <option value="15">Surat Pengantar (SPeng)</option>
                            <option>lain-lain</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Tanggal Masuk</label><br />
                        <input type="date" class="form-control" name="tanggal_masuk" required="required" value="<?php echo $fetch['tanggal_masuk']?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Tanggal Keluar</label><br />
                        <input type="date" class="form-control" name="tanggal_keluar" required="required" value="<?php echo $fetch['tanggal_keluar']?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Perihal</label><br />
                        <input type="text" class="form-control" name="perihal" required="required" value="<?php echo $fetch['perihal']?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Sifat</label><br />
                        <input type="text" class="form-control" name="sifat" required="required" value="<?php echo $fetch['sifat']?>">
                    </div>
                    <div class="col-md-8">
                        <label class="form-label">Lampiran</label><br />
                        <textarea class="form-control" rows="3" name="lampiran" required="required"><?php echo $fetch['lampiran']?></textarea>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Upload File <span class="text-danger">(pdf, doc, docx)</span></label><br />
                        <input type="file" class="form-control" name="file_surat" value="<?php echo $fetch['upload']?>">
                        <span class="text-danger">(Abaikan jika tidak ingin mengganti file)</span>
                    </div>
                    <br>
                    <span>Undangan</span>
                    <div class="col-md-4">
                        <label class="form-label">Waktu</label><br />
                        <input type="datetime-local" class="form-control" name="waktu" value="<?php echo $fetch['waktu']?>">
                    </div>
                    <div class="col-md-8">
                        <label class="form-label">Tempat</label><br />
                        <input type="text" class="form-control" name="tempat" value="<?php echo $fetch['tempat']?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Perihal</label><br />
                        <input type="text" class="form-control" name="hal" value="<?php echo $fetch['hal']?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Dress Code</label><br />
                        <input type="text" class="form-control" name="dc" value="<?php echo $fetch['dc']?>">
                    </div>
                    <div class="position-relative bottom-0 end-0">
                        <a href="http://localhost/tes4/surat_masuk/surat_masuk.php" type="button" class="btn btn-danger position-relative bottom-0 end-0">Kembali</a>
                        <input type="submit" class="btn btn-primary" value="Simpan">
                    </div>
                </form>
                
            <?php
                }
            ?>
            </div>
        </div>
      </div>
    </div>
  </section>
  
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      let kd = document.getElementById("kdSurat").value
      document.getElementById("changeJenis").onchange = function() {
        console.log("document", document.getElementById("changeJenis").value + '.' + kd);
        document.getElementById("inputKdSurat").value = document.getElementById("changeJenis").value + '.' + kd
      };
    });
  </script>

  <script>
    let sidebar = document.querySelector(".sidebar");
    let closeBtn = document.querySelector("#btn");
    let searchBtn = document.querySelector(".bx-search");

    closeBtn.addEventListener("click", ()=>{
      sidebar.classList.toggle("open");
      menuBtnChange();//calling the function(optional)
    });

    searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
      sidebar.classList.toggle("open");
      menuBtnChange(); //calling the function(optional)
    });

    // following are the code to change sidebar button(optional)
    function menuBtnChange() {
      if(sidebar.classList.contains("open")){
        closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
      }else {
        closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
      }
    }
  </script>
</body>
</html>