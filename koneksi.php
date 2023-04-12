<?php 
 
// https://www.malasngoding.com
// koneksi database
$koneksi = mysqli_connect('localhost','root','','project');

if (!$koneksi) {
	die("project gagal");
}
?>