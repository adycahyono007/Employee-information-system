<?php 
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Daftar_Status_Kepegawaian.xls");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar Status Kepegawaian</title>
</head>
<body>
<?php 
include 'conf/koneksi.php';
?>
<!--<h2 align="center">Daftar Kota Kepegawaian</h2>-->
<table border="1" width="70%" align="center">
	<tr>
		<th width="10%">No</th>
		<th width="30%">Kode Status Kepegawaian</th>
		<th width="40%">Nama Status Kepegawaian</th>
	</tr>
	<?php
	$no=1;
	$sql="SELECT * from status";
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