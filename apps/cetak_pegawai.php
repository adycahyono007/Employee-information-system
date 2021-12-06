<?php 
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Daftar_Kepegawaian.xls");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar Kepegawaian</title>
</head>
<body>
<?php 
include 'conf/koneksi.php';
?>
<!--<h2 align="center">Daftar Kepegawaian</h2>-->
<table border="1" width="100%%" align="center">
	<tr>
		<th width="5%">No</th>
		<th width="10%">NIP</th>
		<th width="13%">Nama</th>
		<th width="6%">Tgl Lahir</th>
		<th width="15%">Departemen</th>
		<th width="7%">Status</th>
		<th width="12%">Alamat</th>
		<th width="10%">Kota</th>
		<th width="7%">Agama</th>
	</tr>
	<?php
	$no=1;
	$sql="SELECT a.nip,a.nama,a.tgl_lahir,b.nama_dept,c.nama_status,a.alamat,d.nama_kota from pegawai a, departemen b, status c, kota d WHERE a.kode_dept=b.kode_dept and a.kode_status=c.kode_status and a.kode_kota=d.kode_kota";
	//	`	
	$hasil=mysqli_query($konek,$sql);
	while ($row=mysqli_fetch_array($hasil)) 
		{ 
		echo "<tr>";
			echo "<td align='center'>$no</td>";
			echo "<td>$row[0]</td>";
			echo "<td>$row[1]</td>";
			echo "<td>".date('d-m-y',strtotime($row[2]))."</td>";
			echo "<td>$row[3]</td>";
			echo "<td>$row[4]</td>";
			echo "<td>$row[5]</td>";
			echo "<td>$row[6]</td>";
			if ($row[7]==1) 
			{
				echo "<td>Islam</td>";
			}
			elseif ($row[7]==2) 
			{
				echo "<td>Kristen</td>";
			}
			elseif ($row[7]==3) 
			{
				echo "<td>Katolik</td>";
			}
			elseif ($row[7]==4) 
			{
				echo "<td>Hindu</td>";
			}
			else 
			{
				echo "<td>Buddha</td>";
			}
		echo "</tr>";
		$no++;
		}
	?>
</table>

</body>
</html>