<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
 
<title></title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
<link rel="stylesheet" href="assets/css/login.css"/>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-offset-4 col-md-4 login-from">
            <h4><em class="glyphicon glyphicon-gift" align="center"></em>  Hutang Anda </h4>
<?php
$id=$_GET['id'];
include "db/koneksi.php";
$select= "SELECT * FROM user where id='$id'";
$hasil=mysqli_query($link,$select);
$data=mysqli_fetch_array($hasil);
 echo 'Kepada yang terhormat ', $data['nama'] ,' anda memiliki hutang pinjaman sebesar ', $data['pinjam'];
 ?> <br><br>
<form action="" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="update" placeholder="Bayar"/>
                </div>

   <div class="text-right">
                    <button type ="submit" name="ok" class="btn btn-primary">OK</button>
                </div>
 </form>
<?php

if(isset($_POST['ok'])){
	$jumlah=$data['pinjam']-$_POST['update'];
	if($data['pinjam']==0)
	{
		echo "anda ga punya hutang jadi ga usah bayar";
	}
	else
	{
		if($jumlah<0)
		{
			echo "anda cuma punya hutang sebesar: ",$data['pinjam']," jadi kelebihan";
		}
		else
		{
			$update =mysqli_query($link,"UPDATE user set pinjam=$jumlah where id=$id");
			if($update)
			{
				$_SESSION['page']='transaksi';
				echo "<script>alert('sukses gan');window.location.href='?page=transaksi';</script>";
			}
		}
	}
}

// print_r($data['simpok']);

?>
<br>
</div>
</div>
</div>
</body>
</html>
