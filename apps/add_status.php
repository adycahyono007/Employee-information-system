<!DOCTYPE html>
<html>
<head>
	<title>Tambah data Status Kepegawaian</title>
</head>
<body>
<form method="POST" action="add_status.php">
  <table border="0" width="50%" align="center">
	<caption><h2>Tambah Data Status Kepegawaian</h2></caption>
	<tr>
		<td width="25%">Kode Status Kepegawaian</td>
		<td width="5%" align="center">:</td>
		<td width="75%"><input type="text" name="kode" size="43"></td>
	</tr>	
	<tr>
		<td width="25%">Nama Status Kepegawaian</td>
		<td width="5%" align="center">:</td>
		<td width="75%"><input type="text" name="nama" size="43"></td>
	</tr>
	<tr>
		<td width="25%">&nbsp;</td>
		<td width="5%" align="center">&nbsp;</td>
		<td width="75%"><input type="submit" name="simpan" value="Simpan!"></td>
	</tr>
  </table>
</form>
<table border="0" width="40%" align="center">
 <tr>
 	<td>
 		<form method="POST" action="view_status.php">
 			<input type="submit" value="Kembali">
 		</form>
 	</td>
 </tr>	
</table>
<?php
include 'conf/koneksi.php';
if (isset($_POST['simpan']))
{
	$kode=$_POST['kode'];
	$nama=$_POST['nama'];
	$sql="INSERT into status (kode_status,nama_status) values ('$kode','$nama')";
	$hasil=mysqli_query($konek,$sql);
	if ($hasil)
		echo "<script language='JavaScript'>
		(window.alert('Data Status Kepegawaian sudah di simpan'))
		location.href='view_status.php'
		</script>";
	else
		echo "<script language='JavaScript'>
		(window.alert('Data Status Kepegawaian tidak dapat di simpan'))
		location.href='add_status.php'
		</script>";	
}
?>
</body>
</html>