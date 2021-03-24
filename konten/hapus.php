<?php
include"db/koneksi.php";
$id=$_GET['id'];
$hapus="delete from user where id='$id'";
$hasil=mysqli_query($link,$hapus);
if($hapus){
	echo"<script>alert('data berhasil dihapus');window.location.href='?page=daftar';</script>";
}?>