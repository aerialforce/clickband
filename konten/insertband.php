<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/signup.css"/>
	<script type="text/javascript" src="../assets/js/jQuery-2.1.4.min.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</head>
<body>

<div class="bs-example">
    <h1><em class="glyphicon glyphicon-user"></em>  Daftar</h1>
    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" >
      <div class="form-group">
        <label class="control-label col-xs-1"   >Username:</label>
        <div class="col-xs-5">
          <input type="text" class="form-control" name="username" required autocomplete="off">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-xs-1"  >Password:</label>
        <div class="col-xs-5">
          <input type="password" class="form-control" name="password" required autocomplete="off">
        </div>
      </div>

		  <div class="form-group">
        <label class="control-label col-xs-1"  >Nomor Identitas:</label>
        <div class="col-xs-5">
          <input type="text" class="form-control" name="nomor_identitas" required autocomplete="off">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-xs-1"  >Nama Band:</label>
        <div class="col-xs-5">
          <input type="text" class="form-control" name="nama" required autocomplete="off">
        </div>
      </div>

		  <div class="form-group">
			  <label class="control-label col-xs-1" >Email:</label>
				<div class="col-xs-5">
			    <input type="email" class="form-control" name="email" placeholder ="@email.com" required autocomplete="off" >
		    </div>
      </div>

      <div class="form-group">
        <label class="control-label col-xs-1"  >Bassist:</label>
        <div class="col-xs-5">
          <input type="text" class="form-control" name="bassist" required autocomplete="off">
        </div>
      </div>

      <div class="form-group">
			  <label class="control-label col-xs-1"  >Gitarist:</label>
				<div class="col-xs-5">
			    <input type="text" class="form-control" name="gitarist" required autocomplete="off">
		    </div>
      </div>

  		<div class="form-group">
  			<label class="control-label col-xs-1"  >Vocalist:</label>
  			<div class="col-xs-5">
  			  <input type="text" class="form-control" name="vocalist" required autocomplete="off">
  		  </div>
      </div>
		  <div class="form-group">
			   <label class="control-label col-xs-1"  >Drummer:</label>
				 <div class="col-xs-5">
			    <input type="text" class="form-control" name="drummer" required autocomplete="off">
		     </div>
      </div>

      <div class="form-group">
        <label class="control-label col-xs-1"  >Tanggal Terbentuknya Band:</label>
        <div class="col-xs-5">
          <input type="text" class="form-control" name="TTL" placeholder ="contoh: 1994-10-31" required autocomplete="off" >
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-xs-1" >Genre:</label>
        <div class="col-xs-5">
          <select class="form-control" id="genre" name="genre" >
    				<option>jazz</option>
    				<option>pop</option>
    				<option>rock</option>
          </select>
        </div>
      </div>

     <div class="form-group">
        <label class="control-label col-xs-1"  >Contact Person:</label>
        <div class="col-xs-5">
          <input type="text" class="form-control" name="cp" required autocomplete="off" >
        </div>
  	 </div>


     <div class="form-group">
        <label class="control-label col-xs-1"  >deskripsi Band:</label>
        <div class="col-xs-5">
          <textarea name="deskripsi" cols="50" rows="5"></textarea>
        </div>
     </div>

     <div class="form-group">
        <label class="control-label col-xs-1"  >Masukkan Foto</label>
        <div class="col-xs-5">
          <input type="file" name="foto" required autocomplete="off">
        </div>
  	 </div>

     <div class="form-group">
        <div class="col-xs-offset-1 col-xs-5">
          <input type="submit" class="btn btn-primary" value="Daftar" name="submit">
          <input type="reset" class="btn btn-danger" value="Reset">
          <a href="../login.php" class="btn btn-default">Kembali</a>
        </div>
    </div>
  </form>
  </div>
</body>

<?php
include "db/koneksi.php";

// Proses upload

if(isset($_POST['submit']))
{
  // Ambil Data yang Dikirim dari Form
  $foto = $_FILES['foto']['name'];
  $tmp = $_FILES['foto']['tmp_name'];

  // Rename nama fotonya dengan menambahkan tanggal dan jam upload
  $fotobaru = $_POST['nomor_identitas'].$foto;

  // Set path folder tempat menyimpan fotonya
  $path = "assets/images/".$fotobaru;
  if(move_uploaded_file($tmp, $path))
  {
    // Cek apakah gambar berhasil diupload atau tidak
    // Proses simpan ke Database
    $mysql= "INSERT INTO user
    (username, password, level) VALUES
    ('$_POST[username]', '$_POST[password]', 'band')";
    if(mysqli_query($link,$mysql))
    {
			printf("sukses1");
      $query = mysqli_query($link,"SELECT * from user WHERE (username='".$_POST['username']."') AND (password='".$_POST['password']."')  ");
      $data=mysqli_fetch_array($query);
      $_SESSION['id_user'] = $data['id_user'];
      $mysql2= "INSERT INTO band
      (nomor_identitas, nama, email, bassist, gitarist, vocalist, drummer, TTL, genre, cp, id_user, foto, deskripsi) VALUES
      ('$_POST[nomor_identitas]', '$_POST[nama]', '$_POST[email]','$_POST[bassist]', '$_POST[gitarist]',
       '$_POST[vocalist]', '$_POST[drummer]', '$_POST[TTL]', '$_POST[genre]','$_POST[cp]', '$_SESSION[id_user]', '$fotobaru',
       '$_POST[deskripsi]')";
      if(mysqli_query($link,$mysql2))
      {
				printf("sukses2");
        echo"<script>alert('sukses');window.location.href='index.php?page=insertband';</script>";
      }
      mysqli_close($link);
    }
  }
    else
    {
      // Jika gambar gagal diupload, Lakukan :
      echo "Maaf, Gambar gagal untuk diupload.";
    }
}


	?>


  </html>
