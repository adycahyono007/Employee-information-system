<!DOCTYPE html>
<html>
<head>
	<title>Edit data departemen</title>
</head>
<body>
<?php 
include 'conf/koneksi.php';
$kode=$_GET['id'];
$sql="SELECT * from departemen where kode_dept='$kode'";
$res=mysqli_query($konek,$sql);
$row=mysqli_fetch_array($res);
$kode=$row[0];
$nama=$row[1];
?>
<form method="POST" action="edit_departemen.php">
  <table border="0" width="35%" align="center">
	<caption><h2>Edit Data Departemen</h2></caption>
	<tr>
		<td width="25%">Kode Departemen</td>
		<td width="5%" align="center">:</td>
		<td width="75%"><input type="text" name="kode" size="43" value="<?php echo $kode; ?>"></td>
	</tr>	
	<tr>
		<td width="25%">Nama Departemen</td>
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
 		<form method="POST" action="view_departemen.php">
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

	$sql="UPDATE departemen set nama_dept='$nama' WHERE kode_dept='$kode'";
	$hasil=mysqli_query($konek,$sql);
	if ($hasil)
		echo "<script language='JavaScript'>
		(window.alert('Data departemen sudah di diubah'))
		location.href='view_departemen.php'
		</script>";
	else
		echo "<script language='JavaScript'>
		(window.alert('Data departemen tidak dapat di ubah))
		location.href='view_departemen.php'
		</script>";
}
?>
</body>
</html>