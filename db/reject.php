<?php 
include '../db/koneksi.php';
// session_start();
// if(isset($_GET['id']))
// {
	$id=$_GET['id'];
// }
// else
// {
// 	$id=$_SESSION['id'];
// }
$delete=mysqli_query($link,"delete from user where id='$id'");
if($delete){
	echo "<script>alert('antrian ditolak');window.location.href='../index.php';</script>";
}
?>