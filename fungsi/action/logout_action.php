<?php 
// mengaktifkan session
session_start();
 
// menghapus semua session
session_destroy();
 
// mengalihkan halaman sambil mengirim pesan logout
header("location:http://localhost/tes4/register.php?alert=Berhasil Logout" . urldecode($alert));
?>