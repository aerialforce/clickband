<?php
	include "../db/koneksi.php";
	$id = $_GET['id'];

if($sql_update=mysqli_query($link,"UPDATE user SET aksi = 'terima' WHERE id = '$id'"))
{
	echo "<script> alert('User berhasil ditambahkan'); window.location.href='../index.php';</script>";
}
else{
	echo "Eror";
}
?>
