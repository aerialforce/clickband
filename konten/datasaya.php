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
        <?php
          $id=$_SESSION['id_user'];
          $id_band=$_SESSION['id_band'];
          include "db/koneksi.php";
          $query="SELECT * FROM band where id_user='$id'";
          $comot=mysqli_query($link,$query) or die(mysqli_error($link));
          if($data1=mysqli_fetch_array($comot))
          {
            $image=$data1['foto'];
          }
        ?>
        <img src="assets/images/<?php echo $image  ?>" width="150" height="150"> <br>
            <h4> Profil Anda </h4>

        <?php
        $select="SELECT * FROM user where id_user='$id'";
        $ambil=mysqli_query($link,$select) or die(mysqli_error($link));
        if($data=mysqli_fetch_array($ambil))
        {
          echo "Username: ".$data['username']."<br>";
          // echo "Password: ".$data['password']."<br>";
        }
        echo "Nama Band: ".$data1['nama']."<br>";
        echo "Nomor Identitas: ".$data1['nomor_identitas']."<br>";
        echo "Email: ".$data1['email']."<br>";
        echo "Genre Music: ".$data1['genre']."<br>";
        echo "Tanggal Terbentuknya Band: ".$data1['TTL']."<br>";
        echo "Bassist: ".$data1['bassist']."<br>";
        echo "Vocalist: ".$data1['vocalist']."<br>";
        echo "Drummer: ".$data1['drummer']."<br>";
        echo "Contact Person: ".$data1['cp']."<br>";
        echo "Deskripsi Band: ".$data1['deskripsi']."<br>";

?>
<br>
<form action="?page=ubahprofil" method="post">
<input type="submit" class="btn btn-primary" value="Edit Data" name="edit">
</form>
<br>
      </div>
    </div>
  </div>
  </body>
  </html>
