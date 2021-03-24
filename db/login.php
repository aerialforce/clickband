<?php
	include "koneksi.php";
	$query = mysqli_query($link,"SELECT * from user WHERE (username='".$_POST['username']."') AND (password='".$_POST['password']."')  ");
	$jumlah_kolom = mysqli_num_rows($query);
	if($jumlah_kolom==1)
	{
		$data=mysqli_fetch_array($query);
		session_start();

		$_SESSION['isLogin'] = true;
		$_SESSION['level'] = $data['level'];
		$_SESSION['id_user'] = $data['id_user'];
    $_SESSION['username']=$data['username'];
        if($_SESSION['level']== "admin")
        {
            echo "<script> alert('Anda Berhasil Masuk Sebagai admin'); window.location.href='../index.php';</script>";
        }
				else if($_SESSION['level']== "band")
        {
						$query2 = mysqli_query($link,"SELECT * from band WHERE (id_user='".$data['id_user']."')  ");
						$data2=mysqli_fetch_array($query2);
					  $_SESSION['nama']=$data2['nama'];
						$_SESSION['id_band']=$data2['id_band'];
            echo "<script> alert('Anda Berhasil Masuk Sebagai band'); window.location.href='../index.php';</script>";
        }
				else if($_SESSION['level']== "user")
        {
            echo "<script> alert('Anda Berhasil Masuk Sebagai user'); window.location.href='../index.php';</script>";
        }
    }
    else
    {
        echo "<script> alert('Username/password salah'); window.location.href='../login.php';</script>";
    }



//     // $query = mysql_query("SELECT * from user WHERE (username='".$_POST['username']."') AND (password='".$_POST['password']."')  AND (aksi='terima')  ");
//      if($_SESSION['level']== "admin")
//         {
//             echo "<script> alert('Anda Berhasil Masuk Sebagai admin'); window.location.href='../index.php';</script>";
//         }
//         elseif($_SESSION['level']== "operator")
//         {
//             echo "<script> alert('Anda Berhasil Masuk Sebagai operator'); window.location.href='../index.php';</script>";
//         }
//             elseif($_SESSION['level']== "pimpinan")
//         {
//             echo "<script> alert('Anda Berhasil Masuk Sebagai pimpinan'); window.location.href='../index.php';</script>";
//         }
//             elseif($_SESSION['level']== "anggota")
//         {
//             echo "<script> alert('Anda Berhasil Masuk Sebagai anggota'); window.location.href='../index.php';</script>";
//         }


?>
