<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<head>
<title>Grafik Penduduk Indonesia</title>
<script src="assets/js/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="assets/js/highcharts.js" type="text/javascript"></script>
<script src="assets/js/exporting.js" type="text/javascript"></script>
<script type="text/javascript">


	var chart1; // globally available
$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'container',
            type: 'column'
         },
         title: {
            text: 'Data Jumlah Pinjaman anggota Koperasi '
         },
         yAxis: {
            title: {
               text: 'Jumlah Pinjaman'
            }
         },
              series:
            [
<?php
// file koneksi php
// $database = "uas";
$link=mysqli_connect("localhost","root","","mde");
// file untuk mengakses ke tabel database
$query = mysqli_query($link,"SELECT * from user where level='anggota' and aksi='terima'") or die(mysqli_error());
$kum_nama = '';
$kum_pok = '';
$kum_jib = '';
$kum_jam = '';
while($ambil = mysqli_fetch_array($query)){
	$nama=$ambil['nama'];
      $kum_nama .= "'".$nama."',";
	// $query_jumlah = mysql_query("SELECT * from user where nama='$nama' and level='anggota' and aksi='terima'") or die(mysql_error());
 //   	while( $data = mysql_fetch_array( $query_jumlah ) ){
 //      $jumlahx = $data['pinjam'];
 //      $pok = $data['simpok'];
	//    $jib = $data['simjib'];

	//   }
      $kum_pok .= $ambil['simpok'].",";
      $kum_jib .= $ambil['simjib'].",";
      $kum_jam .= $ambil['pinjam'].",";
	  }
	  ?>
	  {
		  name: 'Simpanan Pokok',
         data: [ <?php echo trim($kum_pok,",")?> ]
	  },
     {
        name: 'Simpanan Wajib',
         data: [ <?php echo trim($kum_jib,",")?> ]
     },
     {
        name: 'Pinjaman',
         data: [ <?php echo trim($kum_jam,",")?> ]
     },
	  <?php  ?>
],
xAxis: {
            categories: [<?=trim($kum_nama, ","); ?>]
         }
});
});
</script>
</head>
<body>
<!-- fungsi yang di tampilkan dibrowser  -->
<div id="container" style="min-width: 200px; height: 400px; margin:0 auto"></div>

</body>
</html>
