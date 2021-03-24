<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      $id=$_SESSION['id_user'];
      $id_band=$_SESSION['id_band'];
    include 'db/koneksi.php';

      $hasil=mysqli_query($link, "select * from user where id_user='$id'");
      if($data=mysqli_fetch_array($hasil) or die(mysqli_error($link)))
      {
        $hasil2=mysqli_query($link, "select * from band where id_band='$id_band'");
        if($data2=mysqli_fetch_array($hasil2) or die(mysqli_error($link)))
        {
        ?><div class="bs-example">
            <h1><em class="glyphicon glyphicon-user"></em> Edit Data</h1>
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" >
              <div class="form-group">
                 <label class="control-label col-xs-1"  ></label>
                 <div class="col-xs-5">
                   <img src="assets/images/<?php echo $data2["foto"]  ?>" width="150" height="150">
                 </div>
              </div>

              <div class="form-group">
                <label class="control-label col-xs-1"   >Username:</label>
                <div class="col-xs-5">
                  <input type="text" class="form-control" name="username" required autocomplete="off" value="<?php echo $data["username"]; ?>">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-xs-1"  >Password:</label>
                <div class="col-xs-5">
                  <input type="password" class="form-control" name="password" required autocomplete="off" value="<?php echo $data["password"]; ?>">
                </div>
              </div>

        		  <div class="form-group">
                <label class="control-label col-xs-1"  >Nomor Identitas:</label>
                <div class="col-xs-5">
                  <input type="text" class="form-control" name="nomor_identitas" required autocomplete="off" value="<?php echo $data2["nomor_identitas"]; ?>">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-xs-1"  >Nama Band:</label>
                <div class="col-xs-5">
                  <input type="text" class="form-control" name="nama" required autocomplete="off" value="<?php echo $data2["nama"]; ?>">
                </div>
              </div>

        		  <div class="form-group">
        			  <label class="control-label col-xs-1" >Email:</label>
        				<div class="col-xs-5">
        			    <input type="email" class="form-control" name="email" placeholder ="@email.com" required autocomplete="off" value="<?php echo $data2["email"]; ?>" >
        		    </div>
              </div>

              <div class="form-group">
                <label class="control-label col-xs-1"  >Bassist:</label>
                <div class="col-xs-5">
                  <input type="text" class="form-control" name="bassist" required autocomplete="off" value="<?php echo $data2["bassist"]; ?>">
                </div>
              </div>

              <div class="form-group">
        			  <label class="control-label col-xs-1"  >Gitarist:</label>
        				<div class="col-xs-5">
        			    <input type="text" class="form-control" name="gitarist" required autocomplete="off" value="<?php echo $data2["gitarist"]; ?>">
        		    </div>
              </div>

          		<div class="form-group">
          			<label class="control-label col-xs-1"  >Vocalist:</label>
          			<div class="col-xs-5">
          			  <input type="text" class="form-control" name="vocalist" required autocomplete="off" value="<?php echo $data2["vocalist"]; ?>">
          		  </div>
              </div>
        		  <div class="form-group">
        			   <label class="control-label col-xs-1"  >Drummer:</label>
        				 <div class="col-xs-5">
        			    <input type="text" class="form-control" name="drummer" required autocomplete="off" value="<?php echo $data2["drummer"]; ?>">
        		     </div>
              </div>

              <div class="form-group">
                <label class="control-label col-xs-1"  >Tanggal Terbentuknya Band:</label>
                <div class="col-xs-5">
                  <input type="text" class="form-control" name="TTL" placeholder ="contoh: 1994-10-31" required autocomplete="off" value="<?php echo $data2["TTL"]; ?>">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-xs-1" >Genre:</label>
                <div class="col-xs-5">
                  <select class="form-control" id="genre" name="genre" >
                    <?php if($data2['genre']=="jazz") { ?>
                  <option>jazz</option>
                  <option>pop</option>
                  <option>rock</option>
            		  <?php }?>
                    <?php if($data2['genre']=="pop") { ?>
                  <option>pop</option>
                  <option>jazz</option>
                  <option>rock</option>
                  <?php }?>
                    <?php if($data2['genre']=="rock") { ?>
                  <option>rock</option>
                  <option>pop</option>
                  <option>jazz</option>
                  <?php }?>
                  </select>
                </div>
              </div>

             <div class="form-group">
                <label class="control-label col-xs-1"  >Contact Person:</label>
                <div class="col-xs-5">
                  <input type="text" class="form-control" name="cp" required autocomplete="off" value="<?php echo $data2["cp"]; ?>">
                </div>
          	 </div>

             <div class="form-group">
                <label class="control-label col-xs-1"  >Deskripsi Band:</label>
                <div class="col-xs-5">
                  <input type="text" class="form-control" name="deskripsi" required autocomplete="off" value="<?php echo $data2["deskripsi"]; ?>">
                </div>
             </div>

             <div class="form-group">
                <div class="col-xs-offset-1 col-xs-5">
                  <input type="submit" class="btn btn-primary" value="Edit" name="ubah">
                  <input type="reset" class="btn btn-danger" value="Reset">
                  <a href="?page=datasaya&id=<?php echo $id; ?>" class="btn btn-default">Kembali</a>
                </div>
            </div>

            <!-- <div class="form-group">
               <label class="control-label col-xs-1"  >Masukkan Foto</label>
               <div class="col-xs-5">
                 <input type="file" name="foto" required autocomplete="off">
               </div>
            </div> -->
          </form>
          </div>
          <?php
          }
        }


    if(isset($_POST['ubah']))
    {
      $update="update user set username='$_POST[username]' , password='$_POST[password]' where id_user='$id'";
      $hasil=mysqli_query($link,$update);
      if($hasil)
      {
        $update2="update band set nama='$_POST[nama]' , nomor_identitas='$_POST[nomor_identitas]', email='$_POST[email]', bassist='$_POST[bassist]',
        gitarist='$_POST[gitarist]', vocalist='$_POST[vocalist]', drummer='$_POST[drummer]', TTL='$_POST[TTL]', genre='$_POST[genre]',
        cp='$_POST[cp]', deskripsi='$_POST[deskripsi]' where id_band='$id_band'";
        $hasil2=mysqli_query($link,$update2);
        if($hasil2)
        {
        echo"<script>alert('data berhasil diedit');window.location.href='?page=datasaya&id=$id';</script>";
        }
      }
    }
    ?>
  </body>
</html>
