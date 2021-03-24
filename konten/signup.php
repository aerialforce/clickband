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

    <form class="form-horizontal" action="" method="post" >
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
		<div class="form-group">
      <label class="control-label col-xs-1"  >Nomor Identitas:</label>
        <div class="col-xs-5">
      <input type="password" class="form-control" name="nomor_identitas" required autocomplete="off">
    </div>
    </div>
    <div class="form-group">
      <label class="control-label col-xs-1"  >Nama Band:</label>
        <div class="col-xs-5">
      <input type="text" class="form-control" name="nama" required autocomplete="off">
      </div>
    </div>
		</div>
		 <div class="form-group">
			<label class="control-label col-xs-1" >Email:</label>
				<div class="col-xs-5">
			<input type="email" class="form-control" name="email" placeholder ="@email.com" required autocomplete="off" >
		</div>
    <div class="form-group">
      <label class="control-label col-xs-1"  >Bassist:</label>
        <div class="col-xs-5">
      <input type="text" class="form-control" name="bassist" required autocomplete="off">
    </div>
		<div class="form-group">
			<label class="control-label col-xs-1"  >Gitarist:</label>
				<div class="col-xs-5">
			<input type="text" class="form-control" name="gitarist" required autocomplete="off">
		</div>
		<div class="form-group">
			<label class="control-label col-xs-1"  >Keyboardist:</label>
				<div class="col-xs-5">
			<input type="text" class="form-control" name="keyboardist" required autocomplete="off">
		</div>
		<div class="form-group">
			<label class="control-label col-xs-1"  >Vocalist:</label>
				<div class="col-xs-5">
			<input type="text" class="form-control" name="vocalist" required autocomplete="off">
		</div>
		<div class="form-group">
			<label class="control-label col-xs-1"  >Drummer:</label>
				<div class="col-xs-5">
			<input type="text" class="form-control" name="drummer" required autocomplete="off">
		</div>
    </div>
    <div class="form-group">
      <label class="control-label col-xs-1"  >Tanggal Lahir Band:</label>
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
    </div>
     <div class="form-group">
      <label class="control-label col-xs-1"  >Contact Person:</label>
        <div class="col-xs-5">
      <input type="text" class="form-control" name="cp" required autocomplete="off" >
        </div>
	  </div>
    <!-- <div class="form-group">
      <label class="control-label col-xs-1"  >Alamat anda:</label>
        <div class="col-xs-5">
      <textarea type="text" class="form-control" id="alamat" name="alamat" required autocomplete="off" ></textarea>
    </div> -->
    <!-- </div>
     <div class="form-group">
      <label class="control-label col-xs-1"  >Level:</label>
        <div class="col-xs-5">
      <select class="form-control" id="select" name="level">
        <option>admin</option>
        <option>band</option>
        <option>user</option>
      </select>
    </div>
    </div> -->

  <div class="form-group">
            <div class="col-xs-offset-1 col-xs-5">
        <!--     <form action="" method="post"> -->
                <input type="submit" class="btn btn-primary" value="Daftar" name="submit">
                <input type="reset" class="btn btn-danger" value="Reset">
                <a href="../login.php" class="btn btn-default">Kembali</a>
            <!-- </form> -->
            </div>
        </div>
</div>



</form>
</body>
</html>


<?php

// gambar belom??????
include "../db/koneksi.php";
if(isset($_POST['submit']))
{

		$mysql= "INSERT INTO user
		(username, password, level) VALUES
		('$_POST[username]', '$_POST[password]', 'band')";
		if(mysqli_query($link,$mysql))
		{
			$query = mysqli_query($link,"SELECT * from user WHERE (username='".$_POST['username']."') AND (password='".$_POST['password']."')  ");
			$data=mysqli_fetch_array($query);
			$_SESSION['id_user'] = $data['id_user'];
			$mysql2= "INSERT INTO band
			(nomor_identitas, nama, email, bassist, gitarist, keyboardist, vocalist, drummer, TTL, genre, cp, id_user) VALUES
			('$_POST[nomor_identitas]', '$_POST[nama]', '$_POST[email]','$_POST[bassist]', '$_POST[gitarist]', '$_POST[keyboardist]', '$_POST[vocalist]', '$_POST[drummer]', '$_POST[TTL]', '$_POST[genre]','$_POST[cp]', '$_SESSION[id_user]')";
			if(mysqli_query($link,$mysql2))
			{
				echo"<script>alert('selamat anda telah terdaftar, tunggu persetujuan admin');window.location.href='signup.php';</script>";
			}
			mysqli_close($link);
		}

}
?>
