<?php 
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Daftar_Departemen.xls");
?>
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
<table border="1" width="70%" align="center">
	<tr>
		<th width="10%">No</th>
		<th width="30%">Kode Departemen</th>
		<th width="40%">Nama Departemen</th>
	</tr>
	<?php
	$no=1;
	$sql="SELECT * from departemen";
	//	`	
	$hasil=mysqli_query($konek,$sql);
	while ($row=mysqli_fetch_array($hasil)) 
		{ 
		echo "<tr>";
			echo "<td align='center'>$no</td>";
			echo "<td>$row[0]</td>";
			echo "<td>$row[1]</td>";
		echo "</tr>";
		$no++;
		}
	?>
</table>

</body>
</html>