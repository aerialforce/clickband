<?php
	session_start();
	session_destroy();
	echo  "<script> alert('anda berhasil logout'); window.location.href='../index.php';</script>";
  session_start();
	$_SESSION['isLogin'] = false;
 ?>
