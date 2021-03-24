<!DOCTYPE html>
<html>
<head>
<title>Home</title>

<link rel="stylesheet" type="text/css" href="assets/css/login.css">
<script type="text/javascript" src="assets/js/jQuery-2.1.4.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-offset-4 col-md-4 login-from" align="center">
        <br>
        <img src="assets/images/profil.png" width="150" height="150"> <br>
            <h4> Profil Anda </h4>

<?php

$id=$_SESSION['id'];
include "db/koneksi.php";
$select="SELECT * FROM user where id='$id'";
$ambil=mysqli_query($link,$select);
if($data=mysqli_fetch_array($ambil)){
echo "Nama: ".$data['nama']."<br>";
echo "Username: ".$data['username']."<br>";
echo "Password: ".$data['password']."<br>";
echo "Tanggal Lahir: ".$data['ttl']."<br>";
}

?>
<br>
<form action="" method="post">
<input type="submit" class="btn btn-primary" value="Lihat QRcode Login" name="submit">
</form>
<?php
// if(isset($_POST['submit'])){
//function acakangkahuruf($panjang)
// {
// 	$karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
// 	$string = '';
// 	for ($i = 0; $i < $panjang; $i++)
// 		{ $pos = rand(0, strlen($karakter)-1); $string .= $karakter{$pos}; }
// 	return $string;
// } //cara memanggilnya echo acakangkahuruf(10);

$qr= "$data[username]"."$data[password]";
$update=mysqli_query($link,"UPDATE user set qr='$qr' where id='$id'");
include "assets/phpqrcode/qrlib.php";

QRcode::png("$qr","assets/images/".$data['username'].".png","H",8,8);
$_SESSION['username']=$data['username'];
echo"<script>alert('Generate QRcode sukses');window.location.href='?page=cetakqr';</script>";
// echo "<img src='assets/images/$data['username'].png'/>";
}?>
<br>
</div>
</div>
</div>
</body>
</html>
