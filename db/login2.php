<?php 
    include "koneksi.php";
    //$query = mysql_query("SELECT * from user WHERE (username='".$_POST['username']."') AND (password='".$_POST['password']."')  ");
    $query2 = mysqli_query($link,"SELECT * from user WHERE qr='".$_POST['qr']."' ");
    $jumlah_kolom = mysqli_num_rows($query2);
    if($jumlah_kolom==1){
        $data=mysqli_fetch_array($query2);
        session_start();
        
        $_SESSION['isLogin'] = true;
        $_SESSION['level'] = $data['level'];
        $_SESSION['id'] = $data['id'];
        $_SESSION['aksi'] =$data['aksi'];
        $_SESSION['nama']=$data['nama'];
        $_SESSION['qr']=$data['qr'];
        $_SESSION['username']=$data['username'];

        if($_SESSION['level']== "admin")
        {
            if($_SESSION['aksi']=="terima"){
            echo "<script> alert('Anda Berhasil Masuk Sebagai admin'); window.location.href='../index.php';</script>";
            }
            else{
                 echo "<script> alert('account anda belum disetujui admin'); window.location.href='../login2.php';</script>";
            }
        }

        elseif($_SESSION['level']== "operator")
        {
            if($_SESSION['aksi']=="terima"){
            echo "<script> alert('Anda Berhasil Masuk Sebagai operator'); window.location.href='../index.php';</script>";
            }
            else{
                 echo "<script> alert('account anda belum disetujui admin'); window.location.href='../login2.php';</script>";
            }
        }


        elseif($_SESSION['level']== "anggota")
        {
            if($_SESSION['aksi']=="terima"){
            echo "<script> alert('Anda Berhasil Masuk Sebagai anggota'); window.location.href='../index.php';</script>";
            }
            else{
                 echo "<script> alert('account anda belum disetujui admin'); window.location.href='../login2.php';</script>";
            }
        }


        elseif($_SESSION['level']== "pimpinan")
        {
            if($_SESSION['aksi']=="terima"){
            echo "<script> alert('Anda Berhasil Masuk Sebagai pimpinan'); window.location.href='../index.php';</script>";
            }
            else{
                 echo "<script> alert('account anda belum disetujui admin'); window.location.href='../login2.php';</script>";
            }
        }
    }
    else
    {
        echo "<script> alert('Kode QR salah'); window.location.href='../login2.php';</script>";
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