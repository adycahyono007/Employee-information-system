<!DOCTYPE html>
<html>
<head>
	<title>Edit data Kota Kepegawaian</title>
</head>
<body>
<?php 
include 'conf/koneksi.php';
$kode=$_GET['id'];
$sql="SELECT * from kota where kode_kota='$kode'";
$res=mysqli_query($konek,$sql);
$row=mysqli_fetch_array($res);
$kode=$row[0];
$nama=$row[1];
?>
<form method="POST" action="edit_kota.php">
  <table border="0" width="47%" align="center">
	<caption><h2>Edit Data Kota Kepegawaian</h2></caption>
	<tr>
		<td width="25%">Kode Kota Kepegawaian</td>
		<td width="5%" align="center">:</td>
		<td width="75%"><input type="text" name="kode" size="43" value="<?php echo $kode; ?>"></td>
	</tr>	
	<tr>
		<td width="25%">Nama Kota Kepegawaian</td>
		<td width="5%" align="center">:</td>
		<td width="75%"><input type="text" name="nama" size="43" value="<?php echo $nama; ?>"></td>
	</tr>
	<tr>
		<td width="25%">&nbsp;</td>
		<td width="5%" align="center">&nbsp;</td>
		<td width="75%"><input type="submit" name="simpan" value="Simpan!"></td>
	</tr>
  </table>
</form>
<table border="0" width="35%" align="center">
 <tr>
 	<td>
 		<form method="POST" action="view_kota.php">
 			<input type="submit" value="Kembali">
 		</form>
 	</td>
 </tr>	
</table>
<?php
if (isset($_POST['simpan']))
{
	$kode=$_POST['kode'];
	$nama=$_POST['nama'];

	$sql="UPDATE kota set nama_kota='$nama' WHERE kode_kota='$kode'";
	$hasil=mysqli_query($konek,$sql);
	if ($hasil)
		echo "<script language='JavaScript'>
		(window.alert('Data Kota Kepegawaian sudah di diubah'))
		location.href='view_kota.php'
		</script>";
	else
		echo "<script language='JavaScript'>
		(window.alert('Data Kota Kepegawaian tidak dapat di ubah))
		location.href='view_kota.php'
		</script>";
}
?>
</body>
</html>