<html>
<head>
 
<title>Daftar Antrian</title>
<script src="assets/js/jquery-2.1.4.min.js" type="text/javascript"></script>
</head>

<body>

<?php
include "db/koneksi.php";
?>

<h2 class="sub-header" align="center">Daftar Antrian</h2>
	<form action="" method="post">

			  <th>
			  	<select name="parameter" id="select">
			    <option value="">-Pilih Parameter-</option>
			    <option value="username">Username</option>
			    <option value="nama">Nama</option>
			    <option value="id">id</option>
			    </select>
			   </th>

			   <input type="text" name="pencarian">
			   <button type="submit" class="btn btn-info" name="ok" >Cari</button>

		</form>
<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th class="text-center">No</th>
				<th class="text-center">Username</th>
				<th class="text-center">Password</th>
				<th class="text-center">NIK</th>
				<th class="text-center">Nama</th>
				<th class="text-center">Tanggal Lahir</th>
				<th class="text-center">Jenis Kelamin</th>
				<th class="text-center">Pekerjaan</th>
				<th class="text-center">Email</th>
				<th class="text-center">Telepon</th>
				<th class="text-center">Alamat</th>
				<th class="text-center">Level</th>
				<th class="text-center" colspan="2">aksi</th>
			</tr>
		</thead>

		<tbody>
<?php
	$no=1;
	if(empty($_POST['pencarian']))
	{
		$sql = mysqli_query($link,"select * from user where aksi='belum'") or die (mysqli_error());
	}
	else
	{
		if($_POST['pencarian'] != "")
			{
				if($_POST['parameter']=="")
				{
					echo "masukkan parameter terlebih dahulu";
					$sql = mysqli_query($link,"select * from user where aksi='belum'"); 
				}
				elseif($_POST['parameter'] == 'id')
				{
					$sql=mysqli_query($link,"SELECT * from user WHERE id like '%$_POST[pencarian]%' and aksi='belum' ");
				}
				elseif($_POST['parameter'] == 'username')
				{
					$sql=mysqli_query($link,"SELECT * from user WHERE username like '%$_POST[pencarian]%' and aksi='belum' ");
				}
				elseif($_POST['parameter'] == 'nama')
				{
					$sql=mysqli_query($link,"SELECT * from user WHERE nama like '%$_POST[pencarian]%' and aksi='belum' ");
				}
	   		}
	   else
	   		{
		   		$sql = mysqli_query($link,"select * from user where aksi='belum' ") or die (mysqli_error());
	   		}
	}
	
		
		while ($data=mysqli_fetch_array($sql))
		{
?>
		<tr>
			<td class="text-center"><?php echo $no;?></td>
			<td class="text-center"><?php echo $data['username'];?></td>
			<td class="text-center"><?php echo $data['password'];?></td>
			<td class="text-center"><?php echo $data['NIK'];?></td>
			<td class="text-center"><?php echo $data['nama'];?></td>
			<td class="text-center"><?php echo $data['ttl'];?></td>
			<td class="text-center"><?php echo $data['jk'];?></td>
			<td class="text-center"><?php echo $data['pekerjaan'];?></td>
			<td class="text-center"><?php echo $data['email'];?></td>
			<td class="text-center"><?php echo $data['tlp'];?></td>
			<td class="text-center"><?php echo $data['alamat'];?></td>
			<td class="text-center"><?php echo $data['level'];?></td>
			<td class="text-center"><a href="db/approve.php?id=<?php echo $data['id'];?>">Approve</a></td>
			<td class="text-center"><a href="db/reject.php?id=<?php echo $data['id'];?>">Reject</a></td>
		</tr>

		<?php
		$no++;
		} 	
?>
</tbody>
</table>
</div>

</body>
</html>