<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    if ($_GET['jenis']=="harga")
    {
      ?>
      <div class="bs-example">
          <h1><em class="glyphicon glyphicon-user"></em>Tambah Harga</h1>
          <form class="form-horizontal" action="" method="post">
            <div class="form-group">
              <label class="control-label col-xs-1" >Jenis Event:</label>
              <div class="col-xs-5">
                <select class="form-control" id="tipe" name="tipe" >
          				<option>Pernikahan</option>
          				<option>Pensi</option>
                  <option>Amal</option>
          				<option>Televisi</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-xs-1"  >Harga</label>
              <div class="col-xs-5">
                <input type="text" class="form-control" name="harga" required autocomplete="off" >
              </div>
            </div>

           <div class="form-group">
              <div class="col-xs-offset-1 col-xs-5">
                <input type="submit" class="btn btn-primary" value="Tambah" name="tambah2">
                <input type="reset" class="btn btn-danger" value="Reset">
                <a href="index.php?page=datatransaksiband" class="btn btn-default">Kembali</a>
              </div>
          </div>
        </form>
        </div>
        <?php
    }
    else if ($_GET['jenis']=="lagu")
    {
      ?>
      <div class="bs-example">
          <h1><em class="glyphicon glyphicon-user"></em>Tambah Video dan Lagu</h1>
          <form class="form-horizontal" action="" method="post">

            <div class="form-group">
              <label class="control-label col-xs-1"  >Judul Lagu</label>
              <div class="col-xs-5">
                <input type="text" class="form-control" name="judul" required autocomplete="off" >
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-xs-1"  >Nama Album</label>
              <div class="col-xs-5">
                <input type="text" class="form-control" name="album" required autocomplete="off" >
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-xs-1"  >URL Video Youtube</label>
              <div class="col-xs-5">
                <input type="text" class="form-control" name="url" required autocomplete="off" >
              </div>
            </div>

           <div class="form-group">
              <div class="col-xs-offset-1 col-xs-5">
                <input type="submit" class="btn btn-primary" value="Tambah" name="tambah2">
                <input type="reset" class="btn btn-danger" value="Reset">
                <a href="index.php?page=datatransaksiband" class="btn btn-default">Kembali</a>
              </div>
          </div>
        </form>
        </div>
        <?php
    }
    $id_band="$_SESSION[id_band]";
    $nama="$_SESSION[nama]";
    include "db/koneksi.php";
    if(isset($_POST['tambah2']))
    {
      if ($_GET['jenis']=="harga")
      {
    		if(mysqli_query($link,"INSERT INTO harga (id_band, tipe, harga) VALUES
                       ('$id_band', '$_POST[tipe]', '$_POST[harga]')") or die(mysqli_error($link)))
    		{
    				echo"<script>alert('Sukses');window.location.href='index.php?page=datatransaksiband';</script>";
    		}
        mysqli_close($link);
      }
      else if ($_GET['jenis']=="lagu")
      {
      		if(mysqli_query($link,"INSERT INTO lagu (judul, id_band, nama, album, url) VALUES
                         ('$_POST[judul]' , '$id_band', '$nama', '$_POST[album]' , '$_POST[url]')") or die(mysqli_error($link)))
      		{
      				echo"<script>alert('Sukses');window.location.href='index.php?page=datatransaksiband';</script>";
      		}
          mysqli_close($link);
      }
    }
    ?>
  </body>
</html>
