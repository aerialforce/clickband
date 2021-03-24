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
            <h4><em class="glyphicon glyphicon-gift" align="center"></em>  Pinjam </h4>
<?php 
$id=$_GET['id'];
include "db/koneksi.php";
$select=mysqli_query($link,"SELECT * from user where id='$id'");
$data=mysqli_fetch_array($select);
$nama=$data['nama'];
$simjib=$data['simjib'];
$pinjam=$data['pinjam'];
if($simjib>=1000000){
	$test="lebih dari 10.000.000";
}
elseif($simjib<1000000 && $simjib>0){
	$test="kurang dari 10.000.000";
}
elseif($simjib<1){
	$test="anda tidak dapat meminjam uang";
}

// $minjam=

echo "Kepada Yang terhormat ",$nama," anda memiliki simpanan wajib sebesar: ",$simjib," jadi anda hanya dapat meminjam uang ",$test;



 ?>
 <br>
 <br>
<form action="" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="pinjam" placeholder="Pinjam"/>
                </div>

   <div class="text-right">
                    <button type ="submit" name="submit" class="btn btn-primary">OK</button>
                </div>
 </form>
<?php if(isset($_POST['submit']))
{
	if($pinjam==0)
	{
			if ($simjib>=1000000) 
			{
				if($_POST['pinjam']<0)
				{
					echo "anda tidak meminjam uang";
				}
				else
				{
					$update= mysqli_query($link,"UPDATE user set pinjam='$_POST[pinjam]' where id='$id'");
					if($update)
						{
							echo "<script>alert('sukses gan');window.location.href='?page=transaksi';</script>";
						}
				}
					
			}
			elseif($simjib<1000000 && $simjib>0)
			{
				if($_POST['pinjam']>=10000000)
				{
					echo "anda tidak dapat meminjam uang >=10.000.000";
				}
				elseif($_POST['pinjam']<1000000 && $_POST['pinjam']>0)
				{
					$update= mysqli_query($link,"UPDATE user set pinjam='$_POST[pinjam]' where id='$id'");
					if($update)
						{
							echo "<script>alert('sukses gan');window.location.href='?page=transaksi';</script>";
						}
				}
			}
			else
			{
				echo "anda tidak dapat meminjam uang karna tidak memiliki simpanan wajib";
			}
	}
	else{
		echo "anda tidak dapat meminjam uang karna anda sudah memiliki pinjaman sebesar ",$pinjam;
	}	
}
?>
<br>
<br>
</div>
</div>
</div>
</body>
</html>
