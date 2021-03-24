<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>Data Anggota</title>
<script src="assets/js/jquery-2.1.4.min.js" type="text/javascript"></script>
</head>

<body>


<?php
include "db/koneksi.php";
// $id=$_SESSION['id'];
$select= "SELECT * FROM user where id=' $_SESSION[id]' ";
$hasil=mysqli_query($link,$select);
?>

<h2 class="sub-header" align="center">Data Saya</h2>
<div class="table-responsive">
	<table class="table table-striped">
		<thead>
	<tr>
		<th class="text-center">No</th>
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
		<td class="text-center"><a href="?page=edit2&id=<?php echo $buff['id'];?>">edit</a></td>
</tr>
<?php
$no++;
};
mysqli_close($link);		
?>
</tbody>
</table>
</div>
</body>
</html>