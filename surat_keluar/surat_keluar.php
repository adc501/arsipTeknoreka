<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <link rel="stylesheet" type="text/css" href="http://localhost/tes4/css/style.css">
     <style>
        #canvasDiv {
            position: relative;
            border: 2px dashed grey;
            height: 400px;
        }
        .sidebar ul li .active{
            background: #FFF;
        }

        .sidebar ul li .active .links_name,
        .sidebar ul li .active i{
            color: #11101D;
        }
        section .grid{
            margin-left: 20px;
            align-items: center;
            margin: 5px;
            width: 380px;
            height: 100px;
            padding: 5px;
        }
        section .grid:hover{
            width: 400px;
            height: 120px;
            transition: all 0.2s;
        }
        hr{
            margin: 20px;
            width: 90%;
        }
        .content{
            margin: auto;
        }
        .home-section .content table{
            font-size: 90%;
            
        }
        .page-link{
            margin-right: 4px;
            border-radius: 50px;
            background-color: #E4E9F7;
            border-color: #E4E9F7;
        }
        .page-item .active .page-link {
            background-color: white;
            color: black;
        }
        .modal-backdrop {
            /* bug fix - no overlay */    
            display: none;    
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
      <img src="https://teknoreka.com/wp-content/uploads/2022/09/cropped-teknoreka-tanpa-background-new.png" alt="logo" width="50px" class="icon">
      <div class="logo_name">Sistem Arsip</div>
      <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
          <i class='bx bx-search' ></i>
         <input type="text" placeholder="Search...">
         <span class="tooltip">Search</span>
      </li>
      <li>
        <a href="http://localhost/tes4/surat_masuk/surat_masuk.php">
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
       <a href="#" class="active">
        <i class='bx bx-archive-out' class="active"></i>
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
        <div class="text">Surat Keluar</div>
        <div class="content">
            <form class="row g-3 px-4" method="POST" action="">
                <div class="col">
                    <label>Category:</label>
                    <select class="form-control" name="jenis_surat" id="changeJenisSurat" title="jenis_surat">
                        <option>--.--</option>
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
                <div class="col-md-2 d-grid gap-2 col-6">
                    <button class="btn btn-primary" name="search" title="btn"><i class='bx bx-search-alt-2'></i>
                    </button> 
                </div>
                <div class="col-md-2 d-grid gap-2 col-6">
                    <a href="surat_masuk.php" type="button" class="btn btn-success"><i class='bx bx-reset'></i></a>
                </div>
                <div class="col-md-2 d-grid gap-2 d-md-block">
                <a href="input_surat_keluar.php" type="button" class="btn btn-danger"><i class='bx bx-plus'><span>Tambah</span></i></a>
                </div>
            </form>
            <hr>
            <div class="row px-4">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Jenis Surat</th>
                                <th>Cop Surat</th>
                                <th>Tanda Tangan</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            include $_SERVER['DOCUMENT_ROOT']."/tes4/koneksi.php";
                            
                            if (isset($_POST['search'])) {

                                if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
                                    $page_no =$_GET['page_no'];
                                }else{
                                    $page_no = 1;
                                }

                                $ttl_records_per_page = 10;
                                $offset = ($page_no-1) * $ttl_records_per_page;
                                $prev_page = $page_no - 1;
                                $next_page = $page_no + 1;
                                $adjacents = "1"; 

                                $result_count = mysqli_query($koneksi, "SELECT COUNT(*) AS ttl_records FROM project");
                                $ttl_records = mysqli_fetch_array($result_count);
                                $ttl_records = $ttl_records['ttl_records'];
                                $ttl_no_page = ceil($ttl_records / $ttl_records_per_page);
                                $second_last = $ttl_no_page - 1;

                                $jenis_surat = $_POST['jenis_surat'];
                                $query = mysqli_query($koneksi, "SELECT * FROM keluar WHERE jenis_surat='$jenis_surat' LIMIT $offset, $ttl_records_per_page") or die("gagal");
                                $row = mysqli_num_rows($query);
                                if ($row > 0) {
                                    while ($fetch = mysqli_fetch_array($query)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $fetch['jenis_surat'] ?></td>
                                            <td><?php echo $fetch['cop_surat'] ?></td>
                                            <td><img src="C:/xampp/htdocs/tes4/fungsi/ttd/<?php echo $fetch['ttd'] ?>" alt="<?php echo $fetch['ttd'] ?>"></td>
                                            <td>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#detailmodal<?php echo $fetch['id_surat']?>"><i class='bx bx-detail'></i></a>
                                                <a href="edit_surat_keluar.php?id_surat=<?php echo $fetch['id_surat']; ?>"><i class='bx bx-edit'></i></a>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#hapusmodal<?php echo $fetch['id_surat'] ?>"><i class='bx bx-trash'></i></a>
                                            </td>
                                            <div class="modal fade" id="detailmodal<?php echo $fetch['id_surat']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Surat</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="container-fluid tabModal">
                                                                <div class="row">
                                                                    <div class="col-4">Jenis Surat</div>
                                                                    <div class="col-8"><?php echo $fetch['jenis_surat'] ?></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-4">Cop Surat</div>
                                                                    <div class="col-8"><img src="/tes4/fungsi/cop/<?php echo $fetch['cop_surat'];?>" alt="<?php echo $fetch['cop_surat'];?>" width="100%"><</div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-4">Tanda Tangan</div>
                                                                    <div class="col-8"><img src="/tes4/fungsi/ttd/<?php echo $fetch['ttd'];?>" alt="<?php echo $fetch['ttd'];?>" width="100%"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="hapusmodal<?php echo $fetch['id_surat']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Anda yakin ingin menghapus data ini?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                            <button type="button" class="btn btn-danger"><a href="action/hapus_keluar_action.php?id_surat=<?php echo $fetch['id_surat']; ?>" style="text-decoration: none; color:#FFF;">Hapus</a></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                                    <?php
                                    }
                                }else {
                                    echo '
                                        <tr>
                                            <td colspan = "4"><center>Record Not Found</center></td>
                                        </tr>';
                                }
                            } else {

                                if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
                                    $page_no =$_GET['page_no'];
                                }else{
                                    $page_no = 1;
                                }

                                $ttl_records_per_page = 10;
                                $offset = ($page_no-1) * $ttl_records_per_page;
                                $prev_page = $page_no - 1;
                                $next_page = $page_no + 1;
                                $adjacents = "1"; 

                                $result_count = mysqli_query($koneksi, "SELECT COUNT(*) AS ttl_records FROM project");
                                $ttl_records = mysqli_fetch_array($result_count);
                                $ttl_records = $ttl_records['ttl_records'];
                                $ttl_no_page = ceil($ttl_records / $ttl_records_per_page);
                                $second_last = $ttl_no_page - 1;

                                $query = mysqli_query($koneksi, "SELECT * FROM keluar LIMIT $offset, $ttl_records_per_page") or die("gagal");
                                while ($fetch = mysqli_fetch_array($query)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $fetch['jenis_surat'] ?></td>
                                        <td><?php echo $fetch['cop_surat'];?></td>
                                        <td><?php echo $fetch['ttd'];?></td>
                                        <td>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#detailmodal<?php echo $fetch['id_surat']?>"><i class='bx bx-detail'></i></a>
                                            <a href="edit_surat_keluar.php?id_surat=<?php echo $fetch['id_surat']; ?>"><i class='bx bx-edit'></i></a>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#hapusmodal<?php echo $fetch['id_surat'] ?>"><i class='bx bx-trash'></i></a>
                                        </td>
                                        <div class="modal fade" id="detailmodal<?php echo $fetch['id_surat']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Surat</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container-fluid tabModal">
                                                        <div class="row">
                                                            <div class="col-4">Jenis Surat</div>
                                                            <div class="col-8"><?php echo $fetch['jenis_surat'] ?></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-4">Cop Surat</div>
                                                            <div class="col-8"><img src="/tes4/fungsi/cop/<?php echo $fetch['cop_surat'];?>" alt="<?php echo $fetch['cop_surat'];?>" width="100%"><</div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-4">Tanda Tangan</div>
                                                            <div class="col-8"><img src="/tes4/fungsi/ttd/<?php echo $fetch['ttd'];?>" alt="<?php echo $fetch['ttd'];?>" width="100%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="hapusmodal<?php echo $fetch['id_surat']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Anda yakin ingin menghapus data ini?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <button type="button" class="btn btn-danger"><a href="action/hapus_keluar_action.php?id_surat=<?php echo $fetch['id_surat']; ?>" style="text-decoration: none; color:#FFF;">Hapus</a></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                            <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>
                <span>Page <?php echo $page_no." of ".$ttl_no_page; ?></span>

                <ul class="pagination justify-content-end">
                    <li class="page-item" <?php if ($page_no <= 1) {echo "class='disabled'";} ?>>
                        <a class="page-link" <?php if ($page_no > 1) {
                            echo 'href="?page_no='.$prev_page.'"';
                        }?> data-bs-toggle="tooltip" data-bs-placement="bottom" title="Fist"><span aria-hidden="true">&laquo;</span></a>
                    </li>

                    <?php
                    if ($ttl_no_page <=4) {
                        for ($counter=1; $counter <=$ttl_no_page; $counter++) { 
                            if ($counter == $page_no) {
                                echo '<li class="page-item active"><a class="page-link" href="?page_no=' .$counter .'">' . $counter . '</a></li>';
                            }else{
                                echo '<li class="page-item"><a class="page-link" href="?page_no=' .$counter. '">'.$counter.'</a></li>';
                            }
                        }
                    }elseif($page_no <= 2){
                        for ($counter=1; $counter <= 2 ; $counter++) { 
                            if ($counter == $page_no) {
                                echo '<li class="page-item active"><a class="page-link" href="?page_no=' .$counter .'">' . $counter . '</a></li>';
                            }else{
                                echo '<li class="page-item"><a class="page-link" href="?page_no=' .$counter. '">'.$counter.'</a></li>';
                            }
                        }
                        echo '<li class="page-item"><a class="page-link" href="#">...</a></li>';
                        if ($second_last == $page_no) {
                            echo '<li class="page-item active"><a class="page-link" href="?page_no=' .$second_last .'">' . $second_last . '</a></li>';
                        }else{
                            echo '<li class="page-item"><a class="page-link" href="?page_no=' .$second_last .'">' . $second_last . '</a></li>';
                        }
                        if ($ttl_no_page == $page_no) {
                            echo '<li class="page-item active"><a class="page-link" href="?page_no=' .$ttl_no_page .'">' . $ttl_no_page . '</a></li>';
                        }else{
                            echo '<li class="page-item"><a class="page-link" href="?page_no=' .$ttl_no_page .'">' . $ttl_no_page . '</a></li>';
                        }
                    }elseif ($page_no > 2 && $page_no < $ttl_no_page - 2) {
                        echo '<li class="page-item"><a class="page-link" href="?page_no=1">1</a></li>';
                        echo '<li class="page-item"><a class="page-link" href="#">...</a></li>';
                        for ($counter=$page_no - $adjacents; $counter <= $page_no + $adjacents ; $counter++) { 
                            if ($counter == $page_no) {
                                echo '<li class="page-item active"><a class="page-link" href="?page_no=' .$counter .'">' . $counter . '</a></li>';
                            }else{
                                echo '<li class="page-item"><a class="page-link" href="?page_no=' .$counter. '">'.$counter.'</a></li>';
                            }
                        }
                        echo '<li class="page-item"><a class="page-link" href="#">...</a></li>';
                        if ($ttl_no_page == $page_no) {
                            echo '<li class="page-item active"><a class="page-link" href="?page_no=' .$ttl_no_page .'">' . $ttl_no_page . '</a></li>';
                        }else{
                            echo '<li class="page-item"><a class="page-link" href="?page_no=' .$ttl_no_page .'">' . $ttl_no_page . '</a></li>';
                        }
                    }else{
                        echo '<li class="page-item"><a class="page-link" href="?page_no=1">1</a></li>';
                        echo '<li class="page-item"><a class="page-link" href="#">...</a></li>';
                        for ($counter=$ttl_no_page - 2; $counter <= $ttl_no_page ; $counter++) { 
                            if ($counter == $page_no) {
                                echo '<li class="page-item active"><a class="page-link" href="?page_no=' .$counter .'">' . $counter . '</a></li>';
                            }else{
                                echo '<li class="page-item"><a class="page-link" href="?page_no=' .$counter. '">'.$counter.'</a></li>';
                            }
                        }
                    }
                    ?>
                    <li class="page-item" <?php if ($page_no >= $ttl_no_page) {echo "class='disabled'";} ?>>
                        <a class="page-link" <?php if ($page_no < $ttl_no_page) {
                            echo 'href="?page_no='.$next_page.'"';
                        }?>><span aria-hidden="true">&raquo;</span></a>
                    </li>
                </ul>
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

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
    <script>
    $(document).ready(() => {
        var canvasDiv = document.getElementById('canvasDiv');
        var canvas = document.createElement('canvas');
        canvas.setAttribute('id', 'canvas');
        canvasDiv.appendChild(canvas);
        $("#canvas").attr('height', $("#canvasDiv").outerHeight());
        $("#canvas").attr('width', $("#canvasDiv").width());
        if (typeof G_vmlCanvasManager != 'undefined') {
        canvas = G_vmlCanvasManager.initElement(canvas);
        }

        context = canvas.getContext("2d");
        $('#canvas').mousedown(function(e) {
        var offset = $(this).offset()
        var mouseX = e.pageX - this.offsetLeft;
        var mouseY = e.pageY - this.offsetTop;

        paint = true;
        addClick(e.pageX - offset.left, e.pageY - offset.top);
        redraw();
        });

        $('#canvas').mousemove(function(e) {
        if (paint) {
            var offset = $(this).offset()
            //addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop, true);
            addClick(e.pageX - offset.left, e.pageY - offset.top, true);
            console.log(e.pageX, offset.left, e.pageY, offset.top);
            redraw();
        }
        });

        $('#canvas').mouseup(function(e) {
        paint = false;
        });

        $('#canvas').mouseleave(function(e) {
        paint = false;
        });

        var clickX = new Array();
        var clickY = new Array();
        var clickDrag = new Array();
        var paint;

        function addClick(x, y, dragging) {
        clickX.push(x);
        clickY.push(y);
        clickDrag.push(dragging);
        }

        $("#reset-btn").click(function() {
        context.clearRect(0, 0, window.innerWidth, window.innerWidth);
        clickX = [];
        clickY = [];
        clickDrag = [];
        });

        $(document).on('click', '#btn-save', function() {
        var mycanvas = document.getElementById('canvas');
        var img = mycanvas.toDataURL("image/png");
        anchor = $("#signature");
        anchor.val(img);
        $("#signatureform").submit();
        });

        $(document).on('click', '#btn-save-edit', function() {
        var mycanvas = document.getElementById('canvas');
        var img = mycanvas.toDataURL("image/png");
        anchor = $("#signature");
        anchor.val(img);
        $("#signatureEdit").submit();
        });

        var drawing = false;
        var mousePos = {
        x: 0,
        y: 0
        };
        var lastPos = mousePos;

        canvas.addEventListener("touchstart", function(e) {
        mousePos = getTouchPos(canvas, e);
        var touch = e.touches[0];
        var mouseEvent = new MouseEvent("mousedown", {
            clientX: touch.clientX,
            clientY: touch.clientY
        });
        canvas.dispatchEvent(mouseEvent);
        }, false);


        canvas.addEventListener("touchend", function(e) {
        var mouseEvent = new MouseEvent("mouseup", {});
        canvas.dispatchEvent(mouseEvent);
        }, false);


        canvas.addEventListener("touchmove", function(e) {

        var touch = e.touches[0];
        var offset = $('#canvas').offset();
        var mouseEvent = new MouseEvent("mousemove", {
            clientX: touch.clientX,
            clientY: touch.clientY
        });
        canvas.dispatchEvent(mouseEvent);
        }, false);



        // Get the position of a touch relative to the canvas
        function getTouchPos(canvasDiv, touchEvent) {
        var rect = canvasDiv.getBoundingClientRect();
        return {
            x: touchEvent.touches[0].clientX - rect.left,
            y: touchEvent.touches[0].clientY - rect.top
        };
        }


        var elem = document.getElementById("canvas");

        var defaultPrevent = function(e) {
        e.preventDefault();
        }
        elem.addEventListener("touchstart", defaultPrevent);
        elem.addEventListener("touchmove", defaultPrevent);


        function redraw() {
        //
        lastPos = mousePos;
        for (var i = 0; i < clickX.length; i++) {
            context.beginPath();
            if (clickDrag[i] && i) {
            context.moveTo(clickX[i - 1], clickY[i - 1]);
            } else {
            context.moveTo(clickX[i] - 1, clickY[i]);
            }
            context.lineTo(clickX[i], clickY[i]);
            context.closePath();
            context.stroke();
        }
        }
    })
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>