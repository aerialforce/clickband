<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>Daftar Anggota</title>
<script src="assets/js/jquery-2.1.4.min.js" type="text/javascript"></script>
</head>

<body>


<?php
include "db/koneksi.php";
$select= "SELECT * FROM user where level='anggota' and aksi='terima'";
$hasil=mysqli_query($link,$select);
?>

<h2 class="sub-header" align="center">Daftar Nasabah Koperasi</h2>
<div class="table-responsive">
	<table class="table table-striped">
		<thead>
	<tr>
		<th class="text-center">NO</th>
		<th class="text-center">NIK</th>
		<th class="text-center">Nama</th>
		<th class="text-center">Tanggal Lahir</th>
		<th class="text-center">Jenis Kelamin</th>
		<th class="text-center">Pekerjaan</th>
		<th class="text-center">Telepon</th>
		<th class="text-center">Alamat</th>
		<th class="text-center">Simpanan Pokok</th>
		<th class="text-center">Simpanan Wajib</th>
		<th class="text-center">Pinjaman</th>
	</tr>
	</thead>
	<tbody>

<?php
$no=1;
while($buff=mysqli_fetch_array($hasil)){
?>

	<tr>
		<td class="text-center"><?php echo $no;?></td>
		<td class="text-center"><?php echo $buff['NIK'];?></td>
		<td class="text-center"><?php echo $buff['nama'];?></td>
		<td class="text-center"><?php echo $buff['ttl'];?></td>
		<td class="text-center"><?php echo $buff['jk'];?></td>
		<td class="text-center"><?php echo $buff['pekerjaan'];?></td>
		<td class="text-center"><?php echo $buff['tlp'];?></td>
		<td class="text-center"><?php echo $buff['alamat'];?></td>
		<td class="text-center"><?php echo $buff['simpok'];?></td>
		<td class="text-center"><?php echo $buff['simjib'];?></td>
		<td class="text-center"><?php echo $buff['pinjam'];?></td>
	</tr>

<?php
$no++;
};
	//memasukkan data dari file nasabah.php
	// include('konten/nasabah.php');
	?>

<p><a href="db/eksport.php"><button type="button" class="btn btn-info">Buka Laporan</button></a></p>
<?php
mysqli_close($link);		
?>
</tbody>
</table>
</div>
</body>
</html>