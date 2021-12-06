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
<table border="0" width="100%" align="center">
	<tr>
		<td>
			<form method="POST" action="add_pegawai.php">
				<input type="submit" value="Tambah Daftar Kepegawaian">
			</form>
		</td>
	</tr>
</table>
<table border="1" width="100%" align="center">
	<caption>
		<form method="POST" action="view_pegawai.php">
			<input type="text" name="kata" size="50">
			<input type="submit" name="cari" value="Search!!">
		</form><br>
	</caption>
	<tr>
		<th width="5%">No</th>
		<th width="10%">NIP</th>
		<th width="15%">Nama</th>
		<th width="6%">Tgl Lahir</th>
		<th width="15%">Departemen</th>
		<th width="7%">Status</th>
		<th width="12%">Alamat</th>
		<th width="10%">Kota</th>
		<th width="7%">Agama</th>
		<th width="8%">Action</th>
	</tr>
	<?php
	$no=1;
	if (isset($_POST['cari'])) 
	{
	 	$kata=$_POST['kata'];
	 	$sql="SELECT a.nip,a.nama,a.tgl_lahir,b.nama_dept,c.nama_status,a.alamat,d.nama_kota,a.agama from pegawai a, departemen b, status c, kota d WHERE a.kode_dept=b.kode_dept and a.kode_status=c.kode_status and a.kode_kota=d.kode_kota and (a.nama like '%$kata%' or a.alamat like '%$kata%' or b.nama_dept like '%$kata%')";
	}
	else 
		$sql="SELECT a.nip,a.nama,a.tgl_lahir,b.nama_dept,c.nama_status,a.alamat,d.nama_kota,a.agama from pegawai a, departemen b, status c, kota d WHERE a.kode_dept=b.kode_dept and a.kode_status=c.kode_status and a.kode_kota=d.kode_kota";
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
			echo "<td align='center'><a href='edit_pegawai.php?id=$row[0]'>Edit</a> |
									<a href='del_pegawai.php?id=$row[0]'>Hapus</a>
				</td>";
		echo "</tr>";
		$no++;
		}
	?>
</table>
</body>
</html>