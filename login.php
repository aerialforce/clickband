<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Halaman Login</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
<link rel="stylesheet" href="assets/css/login.css"/>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-offset-4 col-md-4 login-from">
            <h4><em class="glyphicon glyphicon-log-in"></em>  Halaman Login</h4>

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
            <form action="db/login.php" method="post">
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Username"/>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password" />
                </div>
                <div class="text-right">
                    <button class="btn btn-primary">Login</button>
                </div>
            </form>
            <p><a href="konten/signup.php"><em class="glyphicon glyphicon-menu-right"></em>Belum punya akun? Daftar</a></p>
            <p><a href="login2.php"><em class="glyphicon glyphicon-menu-right"></em>LOGIN via QR code?</a></p>
        </div>
    </div>
</div> <!-- End container -->

    <!-- Script js -->
    <script src="assets/js/jQuery-2.1.4.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- End Script -->



</body>
</html>
