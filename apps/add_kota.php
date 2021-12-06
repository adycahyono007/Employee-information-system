<!DOCTYPE html>
<html>
<head>
	<title>Tambah data Kota Kepegawaian</title>
</head>
<body>
<form method="POST" action="add_kota.php">
  <table border="0" width="50%" align="center">
	<caption><h2>Tambah Data Kota Kepegawaian</h2></caption>
	<tr>
		<td width="25%">Kode Kota Kepegawaian</td>
		<td width="5%" align="center">:</td>
		<td width="75%"><input type="text" name="kode" size="43"></td>
	</tr>	
	<tr>
		<td width="25%">Nama Kota Kepegawaian</td>
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
 		<form method="POST" action="view_kota.php">
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
	$sql="INSERT into kota (kode_kota,nama_kota) values ('$kode','$nama')";
	$hasil=mysqli_query($konek,$sql);
	if ($hasil)
		echo "<script language='JavaScript'>
		(window.alert('Data Kota Kepegawaian sudah di simpan'))
		location.href='view_kota.php'
		</script>";
	else
		echo "<script language='JavaScript'>
		(window.alert('Data Kota Kepegawaian tidak dapat di simpan'))
		location.href='add_kota.php'
		</script>";	
}
?>
</body>
</html>