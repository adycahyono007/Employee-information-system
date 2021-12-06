<!DOCTYPE html>
<html>
<head>
	<title>Daftar Departemen</title>
</head>
<body>
<?php 
include 'conf/koneksi.php';
?>
<!--<h2 align="center">Daftar Departemen</h2>-->
<table border="0" width="70%" align="center">
	<tr>
		<td>
			<form method="POST" action="add_departemen.php">
				<input type="submit" value="Tambah Departemen">
			</form>
		</td>
	</tr>
</table>
<table border="1" width="70%" align="center">
	<caption>
		<form method="POST" action="view_departemen.php">
			<input type="text" name="kata" size="30">
			<input type="submit" name="cari" value="Search!!">
		</form><br>
	</caption>
	<tr>
		<th width="10%">No</th>
		<th width="30%">Kode Departemen</th>
		<th width="40%">Nama Departemen</th>
		<th width="20%">Action</th>
	</tr>
	<?php
	$no=1;
	if (isset($_POST['cari'])) 
	{
	 	$kata=$_POST['kata'];
	 	$sql="SELECT * from departemen WHERE nama_dept like'%$kata%'";
	}
	else 
		$sql="SELECT * from departemen";
	//	`	
	$hasil=mysqli_query($konek,$sql);
	while ($row=mysqli_fetch_array($hasil)) 
		{ 
		echo "<tr>";
			echo "<td align='center'>$no</td>";
			echo "<td>$row[0]</td>";
			echo "<td>$row[1]</td>";
			echo "<td align='center'><a href='edit_departemen.php?id=$row[0]'>Edit</a> |
									<a href='del_departemen.php?id=$row[0]'>Hapus</a>
				</td>";
		echo "</tr>";
		$no++;
		}
	?>
</table>
</body>
</html>