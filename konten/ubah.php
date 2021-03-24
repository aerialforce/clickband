<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $id="$_GET[id]";
    include 'db/koneksi.php';
    if ($_GET['jenis']=="harga")
    {
      $hasil=mysqli_query($link, "select * from harga where id_harga='$id'");
      if($data=mysqli_fetch_array($hasil) or die(mysqli_error($link)))
      {
      ?>
      <div class="bs-example">
          <h1><em class="glyphicon glyphicon-user"></em>Edit Harga</h1>
          <form class="form-horizontal" action="" method="post">
            <div class="form-group">
              <label class="control-label col-xs-1" >Jenis Event:</label>
              <div class="col-xs-5">
                <select class="form-control" id="tipe" name="tipe" >
                  <?php if($data['tipe']=="Pernikahan") { ?>
                <option>Pernikahan</option>
                <option>Pensi</option>
                <option>Amal</option>
                <option>Televisi</option>
          		  <?php }?>
                  <?php if($data['tipe']=="Pensi") { ?>
                <option>Pensi</option>
                <option>Pernikahan</option>
                <option>Amal</option>
                <option>Televisi</option>
                <?php }?>
                  <?php if($data['tipe']=="Amal") { ?>
                <option>Amal</option>
                <option>Pernikahan</option>
                <option>Pensi</option>
                <option>Televisi</option>
                <?php }?>
                  <?php if($data['tipe']=="Televisi") { ?>
                <option>Televisi</option>
                <option>Pernikahan</option>
                <option>Pensi</option>
                <option>Amal</option>
                <?php }?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-xs-1"  >Harga</label>
              <div class="col-xs-5">
                <input type="text" class="form-control" name="harga" required autocomplete="off" value="<?php echo $data['harga']; ?>" >
              </div>
            </div>

           <div class="form-group">
              <div class="col-xs-offset-1 col-xs-5">
                <input type="submit" class="btn btn-primary" value="Update" name="ubah">
                <input type="reset" class="btn btn-danger" value="Reset">
                <a href="index.php?page=datatransaksiband" class="btn btn-default">Kembali</a>
              </div>
          </div>
        </form>
        </div>
        <?php
        }
    }

    else if ($_GET['jenis']=="lagu")
    {
      $hasil=mysqli_query($link, "select * from lagu where id_judul='$id'");
      if($data=mysqli_fetch_array($hasil) or die(mysqli_error($link)))
      {
      ?>
      <div class="bs-example">
          <h1><em class="glyphicon glyphicon-user"></em>Edit Video dan Lagu</h1>
          <form class="form-horizontal" action="" method="post">

            <div class="form-group">
              <label class="control-label col-xs-1"  >Judul Lagu</label>
              <div class="col-xs-5">
                <input type="text" class="form-control" name="judul" required autocomplete="off" value="<?php echo $data['judul'] ?>" >
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-xs-1"  >Nama Album</label>
              <div class="col-xs-5">
                <input type="text" class="form-control" name="album" required autocomplete="off" value="<?php echo $data['album'] ?>">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-xs-1"  >URL Video Youtube</label>
              <div class="col-xs-5">
                <input type="text" class="form-control" name="url" required autocomplete="off" value="<?php echo $data['url'] ?>" >
              </div>
            </div>

           <div class="form-group">
              <div class="col-xs-offset-1 col-xs-5">
                <input type="submit" class="btn btn-primary" value="Update" name="ubah">
                <input type="reset" class="btn btn-danger" value="Reset">
                <a href="index.php?page=datatransaksiband" class="btn btn-default">Kembali</a>
              </div>
          </div>
        </form>
        </div>
        <?php
        }
    }

    if(isset($_POST['ubah']))
    {
      if ($_GET['jenis']=="lagu")
      {
        $update="update lagu set judul='$_POST[judul]' , album='$_POST[album]' , url='$_POST[url]' where id_judul='$id'";
        $hasil=mysqli_query($link,$update);
      }
      elseif ($_GET['jenis']=="harga")
      {
        $update="update harga set tipe='$_POST[tipe]' , harga='$_POST[harga]'  where id_harga='$id'";
        $hasil=mysqli_query($link,$update);
      }
      if($hasil)
      {
        echo"<script>alert('data berhasil diedit');window.location.href='?page=datatransaksiband';</script>";
      }
    }
    ?>
  </body>
</html>
