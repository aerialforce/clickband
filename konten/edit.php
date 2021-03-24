<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/signup.css"/>
	<script type="text/javascript" src="assets/js/jQuery-2.1.4.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</head>
<body>
<?php
$id=$_GET['id'];
// $nama=$_GET['nama'];
include"db/koneksi.php";
$select="select * from user where id='$id'";
$hasil=mysqli_query($link,$select);
while($buff=mysqli_fetch_array($hasil)){
?>
<div class="bs-example">
  <h1><em class="glyphicon glyphicon-user"></em>  Edit Data</h1>
 <form class="form-horizontal" action="" method="post" >

<input type="hidden" name="id" value="<?php echo $buff['id'];?>" />
		   <div class="form-group">
	      <label class="control-label col-xs-1"   >Username:</label>
	       <div class="col-xs-5">
		  <input type="text" class="form-control" name="username" value="<?php echo $buff['username'];?>">
		  </div>
		  </div>

		  <div class="form-group">
		 <label class="control-label col-xs-1"   >Password:</label>
		 <div class="col-xs-5">
		<input type="text" class="form-control" name="password" value="<?php echo $buff['password'];?>">
		</div>
		</div>

    <div class="form-group">
      <label class="control-label col-xs-1"  >Nama:</label>
        <div class="col-xs-5">
      <input type="text" class="form-control" name="nama" value="<?php echo $buff['nama'];?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-xs-1"  >NIK:</label>
        <div class="col-xs-5">
      <input type="text" class="form-control" name="NIK" value="<?php echo $buff['NIK'];?>">
    </div>
    </div>
    <div class="form-group">
      <label class="control-label col-xs-1"  >Tanggal Lahir:</label>
        <div class="col-xs-5">
      <input type="text" class="form-control" name="ttl" placeholder ="contoh: 1994-10-31" value="<?php echo $buff['ttl'];?>" >
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-xs-1" >Jenis Kelamin:</label>
        <div class="col-xs-5">
      <select class="form-control" id="jk" name="jk" >
      <option value="<?php echo $buff['jk']?>"><?php echo $buff['jk']?></option>
        <?php if($buff['jk']=="laki-laki") { ?> 
		  <option>perempuan</option>
		  <?php }?>

		   <?php if($buff['jk']=="perempuan") { ?> 
		  <option>laki-laki</option>
		  <?php }?>
      </select>
    </div>
    </div>
    <div class="form-group">
      <label class="control-label col-xs-1" >Pekerjaan:</label>
        <div class="col-xs-5">
      <input type="text" class="form-control" name="pekerjaan" value="<?php echo $buff['pekerjaan'];?>" >
    </div>
    </div>
     <div class="form-group">
      <label class="control-label col-xs-1" >Email:</label>
        <div class="col-xs-5">
      <input type="email" class="form-control" name="email" placeholder ="@email.com" value="<?php echo $buff['email'];?>" >
    </div>
    </div>
     <div class="form-group">
      <label class="control-label col-xs-1"  >No. Telp:</label>
        <div class="col-xs-5">
      <input type="text" class="form-control" name="tlp" value="<?php echo $buff['tlp'];?>" >
    </div>
	</div>
    <div class="form-group">
      <label class="control-label col-xs-1"  >Alamat anda:</label>
        <div class="col-xs-5">
      <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $buff['alamat'];?>" >
    </div>
    </div>
     <div class="form-group">
      <label class="control-label col-xs-1"  >Level:</label>
        <div class="col-xs-5">
      <select class="form-control" id="select" name="level">
        <option value="<?php echo $buff['level']?>"><?php echo $buff['level']?></option>
		  <?php if($buff['level']=="admin") { ?> 
		  <option value="operator">operator</option>
		  <option value="pimpinan">pimpiman</option>
		  <option value="anggota">anggota</option>
		  <?php }?>


  		  <?php if($buff['level']=="operator") { ?>
		  <option value="admin">admin</option>
		  <option value="pimpinan">pimpiman</option>
		  <option value="anggota">anggota</option>
		  <?php }?>


  		  <?php if($buff['level']=="pimpinan") { ?>
		  <option value="operator">operator</option>
		  <option value="admin">admin</option>
		  <option value="anggota">anggota</option>
		  <?php }?>


  		  <?php if($buff['level']=="anggota") { ?>
		  <option value="operator">operator</option>
		  <option value="pimpinan">pimpiman</option>
		  <option value="admin">admin</option>
		  <?php }?>
      </select>
    </div>
    </div>
		


	<div class="form-group">
            <div class="col-xs-offset-1 col-xs-5">
        <!--     <form action="" method="post"> -->
                <input type="submit" class="btn btn-primary" value="Submit" name="submit">
                <input type="reset" class="btn btn-danger" value="Reset">
      
            <!-- </form> -->
            </div>
        </div>
</div>
  

	
</form>
</body>
</html>



<?php

if(isset($_POST['id']))
	{ 	  
	  $update="update user set username='$_POST[username]',password='$_POST[password]', NIK='$_POST[NIK]',
	  nama='$_POST[nama]', ttl='$_POST[ttl]', jk='$_POST[jk]', pekerjaan='$_POST[pekerjaan]',
	  email='$_POST[email]', tlp='$_POST[tlp]', alamat='$_POST[alamat]', level='$_POST[level]' where id='$id'";

$hasil=mysqli_query($link,$update);

if($hasil)
		{
			echo"<script>alert('data berhasil diedit');window.location.href='?page=daftar';</script>";
		}
	}
};
?>

