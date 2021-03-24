<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">


<script type="text/javascript" src="assets/js/llqrcode.js"></script>
<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
<script type="text/javascript" src="assets/js/webqr.js"></script>
 
<title>Halaman Login</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
</head>
<body>

<div class="container">
    <div class="row">
   
    
    </div>

    <div class="row">
        <div class="col-md-offset-4 col-md-4 login-from"><br>
         
             <?php include "konten/read.php"; ?>
 
          <!--   <?php 
            /**
             * Pesan Error Bila terjadi kegagalan dalam login
             */
            if (isset($_GET['error']) && $_GET['error'] == 'salah') {
                echo '<div class="alert alert-warning alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Wrong ! </strong> Username dan Password tidak ditemukan
                       </div>'; 
            }?> -->
            <form action="db/login2.php" method="post">
                <div class="form-group">
                    <label for="">Kode QR</label>
                    <input type="password" class="form-control" name="qr" placeholder="Kode QR" id="srcbk"/>
                </div>
                <div class="text-right">
                    <button class="btn btn-primary">LOGIN</button>
                </div>
            </form>
            <p><a href="konten/signup.php"><em class="glyphicon glyphicon-menu-right"></em>Belum punya akun? Daftar</a></p>
            <p><a href="login.php"><em class="glyphicon glyphicon-menu-left"></em>Back</a></p>     
        </div>
    </div>
</div> <!-- End container -->
 
    <!-- Script js -->
    <script src="assets/js/jQuery-2.1.4.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- End Script -->



</body>
</html>
