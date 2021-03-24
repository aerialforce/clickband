<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      $id=$_SESSION['id_user'];
      include "db/koneksi.php";
      $query="SELECT * FROM band where id_user='$id'";
      $comot=mysqli_query($link,$query) or die(mysqli_error($link));
      if($data=mysqli_fetch_array($comot))
      {
        $id_band = $data['id_band'];
        $query2="SELECT * FROM lagu where id_band='$id_band'";
        $tarik=mysqli_query($link,$query2) or die(mysqli_error($link));
        if($data1=mysqli_fetch_array($tarik))
        {
          ?>
          <iframe width="560" height="315" src="<?php
          if(!isset($_POST['play']))
          {
            $mysql=mysqli_query($link,"SELECT * from lagu WHERE id_band='$id_band'") or die(mysqli_error($link));
            if ($lagu=mysqli_fetch_array($mysql))
            {
              $lagu="$lagu[url]";
              echo $lagu;
            }
            echo $error;
          }
          else
          {
            $id_judul=$_GET['id'];
            $mysql=mysqli_query($link,"SELECT * from lagu WHERE id_judul='$id_judul'") or die(mysqli_error($link));
            if ($lagu=mysqli_fetch_array($mysql))
            {
              $lagu="$lagu[url]";
              echo $lagu;
            }
          }
          ?>"
          frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
          <?php
        }
        else {
          echo "Belum Ada Lagu/Video";
        }
      }
      ?>
      <div class="table-responsive">
      	<table class="table table-striped">
      		<thead>
      			<tr>
      				<th class="text-center">No</th>
      				<th class="text-center">Judul Lagu</th>
      				<th class="text-center">Album</th>
              <th class="text-center">Play</th>
              <th class="text-center">Action</th>
      		</thead>
            </tr>
      		<tbody>
      <?php
      	$no=1;
      		$sql=mysqli_query($link,"SELECT * from lagu WHERE id_band='$id_band'") or die(mysqli_error($link));
      		while ($nilai=mysqli_fetch_array($sql))
      		{
      ?>
      		<tr>
      			<td class="text-center"><?php echo $no;?></td>
      			<td class="text-center"><?php echo $nilai['judul'];?></td>
      			<td class="text-center"><?php echo $nilai['album'];?></td>
            <form action="index.php?page=datatransaksiband&id=<?php echo "$nilai[id_judul]"; ?>" method="post">
            <td class="text-center"><input type="submit" class="btn btn-primary" value="Play" name="play"></td>
            </form>
            <form action="index.php?page=ubah&jenis=lagu&id=<?php echo "$nilai[id_judul]"; ?>" method="post">
            <td class="text-center"><input type="submit" class="btn btn-primary" value="Edit" name="edit"></td>
            </form>
      		</tr>
      <?php
      		$no++;
      		}
      ?>
        </tbody>
      </table>
      </div>
      <form class="" action="index.php?page=tambah&jenis=lagu" method="post">
        <input type="submit" class="btn btn-primary" value="Tambah" name="tambah">
      </form>
<h2 class="sub-header" align="center">Harga Band</h2>
      <div class="table-responsive">
      	<table class="table table-striped">
      		<thead>
      			<tr>
      				<th class="text-center">No</th>
      				<th class="text-center">Jenis Event</th>
      				<th class="text-center">Harga</th>
              <th class="text-center">Action</th>
      		</thead>
            </tr>
      		<tbody>
      <?php
      	$no=1;
      		$sql2=mysqli_query($link,"SELECT * from harga WHERE id_band='$id_band'") or die(mysqli_error($link));
      		while ($harga=mysqli_fetch_array($sql2))
      		{
      ?>
      		<tr>
      			<td class="text-center"><?php echo $no;?></td>
      			<td class="text-center"><?php echo $harga['tipe'];?></td>
      			<td class="text-center"><?php echo $harga['harga'];?></td>
            <form action="index.php?page=ubah&jenis=harga&id=<?php echo "$harga[id_harga]"; ?>" method="post">
            <td class="text-center"><input type="submit" class="btn btn-primary" value="Edit" name="edit"></td>
            </form>
      		</tr>
      <?php
      		$no++;
      		}
      ?>
        </tbody>
      </table>
      <form class="" action="index.php?page=tambah&jenis=harga" method="post">
        <input type="submit" class="btn btn-primary" value="Tambah" name="tambah">
      </form>
      </div>
  </body>
</html>
<?php

  //?rel=0&amp;autoplay=1
?>
