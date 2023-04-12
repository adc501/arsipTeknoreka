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
     </style>
   </head>
<body>

  <?php
  session_start();
  if ($_SESSION['status'] != "login") {
    header("location:http://localhost/tes3/register.php?pesan=belum_login");
  }
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
        <a href="#" class="active">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Dashboard</span>
        </a>
         <span class="tooltip">Dashboard</span>
      </li>
      <li>
       <a href="surat_masuk/surat_masuk.php">
        <i class='bx bx-archive-in'></i>
         <span class="links_name">Surat Masuk</span>
       </a>
       <span class="tooltip">Surat Masuk</span>
     </li>
     <li>
       <a href="surat_keluar/surat_keluar.php">
        <i class='bx bx-archive-out'></i>
        <span class="links_name">Surat Keluar</span>
       </a>
       <span class="tooltip">Surat Keluar</span>
     </li>
     <li>
       <a href="buat_surat/buat_surat.php">
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
      <div class="text px-4">Dashboard</div>
      <div class="row px-5">
        <div class="col-sm-6 bg-primary text-white p-3 justify-content-center grid">
          <div class="position-relative px-4 top-50 start-50 translate-middle">
            <i class='bx bx-archive-in'></i>
            <?php
              include('koneksi.php');
              $project = mysqli_query($koneksi,"SELECT * FROM project");
              $b=mysqli_num_rows($project);
              echo "jumlah data : $b";
            ?>
          </div>
        </div>
        <div class="col-sm-6 bg-primary text-white p-3 justify-content-center grid">
          <div class="position-relative px-4 top-50 start-50 translate-middle">
            <i class='bx bx-archive-out'></i>
            <?php
              include('koneksi.php');
              $project = mysqli_query($koneksi,"SELECT * FROM keluar");
              $b=mysqli_num_rows($project);
              echo "jumlah data : $b";
            ?>
          </div>
        </div>
        <div class="col-sm-6 bg-primary text-white p-3 justify-content-center grid">
          <div class="position-relative px-4 top-50 start-50 translate-middle">
            <i class='bx bx-edit-alt'></i>
            <?php
              include('koneksi.php');
              $project = mysqli_query($koneksi,"SELECT * FROM buat");
              $b=mysqli_num_rows($project);
              echo "jumlah data : $b";
            ?>
          </div>
        </div>
      </div>
  </section>
  
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