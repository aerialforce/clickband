<?php
	session_start();
	if(empty($_GET['page']))
	{
		$_GET['page']='home';
	}
	if(isset($_POST['laporan']))
	{
		$_GET['page']='nasabah';
	}

	if(isset($_POST['transaksi']))
	{
		$_GET['page']='transaksi';
	}

	if(isset($_POST['daftar']))
	{
		$_GET['page']='daftar';
	}



 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="footer, basic, centered, links" />
    <title>ClickBand</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/footer-basic-centered.css">

      <style type="text/css">
      .navbar-inverse{
		background-color: black;
       }


    </style>

  </head>

<body>

    <nav class="navbar navbar-inverse">
      <div class="container">
       <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">ClickBand.com</a>
        </div>

			<div id="bs-example-navbar-collapse-1" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="<?php if(($_GET['page']==home)){echo active;}?>">
						<a href="?page=home">
							<span class="glyphicon glyphicon-home"></span> HOME</a></li>
					<li class="<?php if(($_GET['page']==band)){echo active;}?>">
						<a href="?page=band">
							<span class="glyphicon glyphicon-user"></span> Band</a></li>

<?php if($_SESSION['isLogin']=='true'){
?>
							<?php if($_SESSION['level']=='admin'){
							 ?>
					<li class="<?php if(($_GET['page']==insertband)){echo active;}?>">
						<a href="?page=insertband">
							<span class="glyphicon glyphicon-pencil"></span>Insert Band</a></li>
							<?php } ?>

							<?php if($_SESSION['level']=='admin'){
							 ?>
					<li class="<?php if(($_GET['page']==insertuser)){echo active;}?>">
						<a href="?page=insertuser">
							<span class="glyphicon glyphicon-pencil"></span>Insert User</a></li>
							<?php } ?>

							<?php if($_SESSION['level']=='band'){
							 ?>
					<li class="<?php if(($_GET['page']==index)){echo active;}?>">
							<a href="?page=index">
							<span class="glyphicon glyphicon-pencil"></span>Jadwal Saya</a></li>
							<?php } ?>

							<?php if($_SESSION['level']=='band'){
							 ?>
					<li class="<?php if(($_GET['page']==transaksiband)){echo active;}?>">
						<a href="?page=transaksiband">
							<span class="glyphicon glyphicon-pencil"></span>Notifikasi Transaksi</a></li>
							<?php } ?>

							<?php if($_SESSION['level']=='band'){
							 ?>
					<li class="<?php if(($_GET['page']==datatransaksiband)){echo active;}?>">
						<a href="?page=datatransaksiband">
							<span class="glyphicon glyphicon-pencil"></span>data transaksi</a></li>
							<?php } ?>

							<?php if($_SESSION['level']=='band'){
							 ?>
					<li class="<?php if(($_GET['page']==datasaya)){echo active;}?>">
						<a href="?page=datasaya">
							<span class="glyphicon glyphicon-pencil"></span>Profil Band</a></li>
							<?php } ?>

							<?php if($_SESSION['level']=='user'){
							 ?>
							<li class="<?php if(($_GET['page']==transaksiuser)){echo active;}?>">
							<a href="?page=transaksiuser">
							<span class="glyphicon glyphicon-pencil"></span>Notifikasi Transaksi</a></li>
							<?php } ?>
					</ul>
<?php } ?>


	<?php if($_SESSION['isLogin']=='true'){
 	?>
	<ul class="nav navbar-nav navbar-right">
		<li><a href="db/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
	</ul>
	<?php } ?>
	<?php if($_SESSION['isLogin']!='true'){
	?>
	<ul class="nav navbar-nav navbar-right">
		<li><a href="login.php"><span class="glyphicon glyphicon-log-out"></span> login</a></li>
	</ul>
	<?php } ?>

			</div>
		</div>
	</nav>

<div class="container" style="margin-top:20px">

        <div class="col-md-20 col-sm-20 col-xs-20">
		<div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-bottom:20px">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>

			<!-- deklarasi carousel -->
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<img src="assets/images/6.jpg">
					<div class="carousel-caption">
						<h3></h3>
						<p></p>
					</div>
				</div>
				<div class="item">
					<img src="assets/images/7.jpg" >
					<div class="carousel-caption">
						<h3></h3>
						<p></p>
					</div>
				</div>
			</div>

			<!-- membuat panah next dan previous -->
			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>

<div class="isi">
  <div class="col-md-12 col-sm-12 col-xs-12">
<?php

				if(isset($_GET['page'])){
					include "konten/$_GET[page].php";
				}
				?>
<br>
<br>
<br>
<br>
<br>
<br>
</div>
</div>


<!-- 	<div class="menu">
		<ul>
			<li><a href="#" >

			<li>
		</ul>



		<a href="db/logout.php">logout</a>


	</div>
 -->




    </div>
    <!--/.container-->

		<footer class="footer-basic-centered">
			<p class="footer-links">
				Project Web UAS
			</p>

			<p class="footer-company-name">Media Digital Enterprise &copy; 2018

			</p>

		</footer>

    <script src="assets/js/jQuery-2.1.4.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
