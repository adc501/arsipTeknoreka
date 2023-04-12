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
    <div class="text px-4">Edit Data Surat Keluar</div>
      <div class="content px-4">
        <div class="card">
            <div class="card-body">
            <?php
              // https://www.malasngoding.com
              // menghubungkan dengan koneksi database
              include $_SERVER['DOCUMENT_ROOT']."/tes4/koneksi.php";
              $id_surat = $_GET['id_surat'];
	          $data = mysqli_query($koneksi, "SELECT * FROM keluar WHERE id_surat='$id_surat'");
	          while ($fetch = mysqli_fetch_array($data)) {
            ?>
                <form id="signatureform" action="action/edit_keluar_action.php" method="post" enctype="multipart/form-data">
                    <div class="row g-3 px-4">
                        <div class="col-md-6">
                            <input type="hidden" name="id_surat" value="<?php echo $fetch['id_surat']?>">
                            <label class="form-laber">Jenis Surat</label><br>
                            <select class="form-control" name="jenis_surat" id="changeJenisSurat" id="jenis_surat">
                                <option><?php echo $fetch['jenis_surat']?></option>                                                                               
                                <option>Surat Keputusan (SK)</option>
                                <option>Surat Undangan (SU)</option>
                                <option>Surat Permohonan (SPm)</option>
                                <option>Surat Pemberitahuan (SPb)</option>
                                <option>Surat Peminjaman (SPp)</option>
                                <option>Surat Pernyataan (SPn)</option>
                                <option>Surat Mandat (SM)</option>
                                <option>Surat Tugas (ST)</option>
                                <option>Surat Keterangan (SKet)</option>
                                <option>Surat Rekomendasi (SR)</option>
                                <option>Surat Balasan (SB)</option>
                                <option>Surat Perintah Perjalanan Dinas (SPPD)</option>
                                <option>Sertifikat (SRT)</option>
                                <option>Perjanjian Kerja (PK)</option>
                                <option>Surat Pengantar (SPeng)</option>
                                <option>lain-lain</option>
                            </select>                            
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Cop Surat <span class="text-danger">(.png, .jpg, .jpeg)</span></label><br />
                            <input type="file" class="form-control" name="cop_surat" value="<?php echo $fetch['cop_surat']?>">
                            <span class="text-danger">(Abaikan jika tidak ingin mengganti file)</span>
                        </div>
                        <div class="col-md-8 col-md-offset-2">
                            <br>
                            <?php echo isset($msg) ? $msg : ''; ?>
                            <h2>Tanda Tangan</h2>
                            <hr>
                            <div id="canvasDiv"></div>
                            <span class="text-danger">(Abaikan jika tidak ingin mengganti tanda tangan)</span>
                            <br>
                            <br>
                        </div>
                        <input type="hidden" id="signature" name="signature" value="<?php echo $fetch['ttd']?>">
                        <input type="hidden" name="signaturesubmit" value="1">
                    </div>
                </form>
                <button type="button" class="btn btn-primary" id="reset-btn">Clear</button>
                <button type="button" class="btn btn-success" id="btn-save">Save</button>
            <?php  
            }
            ?>
            </div>
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