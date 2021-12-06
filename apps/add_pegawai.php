<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data Pegawai</title>
</head>
<body>
<?php 
include 'conf/koneksi.php'; 
 ?>
<form method="POST" action="add_pegawai.php">
<table border="0" width="35%" align="center">
	<caption><h2>Tambah Data Pegawai</h2></caption>
	<tr>
		<td width="25%">NIP</td>
		<td width="5%" align="center">:</td>
		<td width="75%"><input type="text" name="nip" size="18"></td>
	</tr>
	<tr>
		<td width="25%">Nama</td>
		<td width="5%" align="center">:</td>
		<td width="75%"><input type="text" name="nama" size="43"></td>
	</tr>
	<tr>
		<td width="25%">Tgl Lahir</td>
		<td width="5%" align="center">:</td>
		<td width="75%"><input type="Date" name="tgll" size="10"></td>
	</tr>
	<tr>
		<td width="25%">Departemen</td>
		<td width="5%" align="center">:</td>
		<td width="75%"><select name="kode_dept">
			<?php 
				$query = "SELECT * from departemen";
				$result = mysqli_query($konek,$query);
				while($brs=mysqli_fetch_row($result)) 
				{ 
				  if ($brs[0]==$departemen)
				     echo "<option value='$brs[0]' selected>$brs[1]</option>";
				  else
				     echo "<option value='$brs[0]'>$brs[1]</option>";
				} 
				?>
		</select></td>
	</tr>
	<tr>
		<td width="25%">Status Pegawai</td>
		<td width="5%" align="center">:</td>
		<td width="75%"><select name="kode_status">
			<?php 
				$query = "SELECT * from status";
				$result = mysqli_query($konek,$query);
				while($brs=mysqli_fetch_row($result)) 
				{ 
				  if ($brs[0]==$status)
				     echo "<option value='$brs[0]' selected>$brs[1]</option>";
				  else
				     echo "<option value='$brs[0]'>$brs[1]</option>";
				} 
				?>
		</select></td>
	</tr>
	<tr>
		<td width="25%">Alamat</td>
		<td width="5%" align="center">:</td>
		<td width="75%"><input type="text" name="alamat" size="10" value="<?php echo $alamat; ?>"></input></td>
	</tr>
	<tr>
		<td width="25%">Kota Pegawai</td>
		<td width="5%" align="center">:</td>
		<td width="75%"><select name="kode_kota">
			<?php 
				$query = "SELECT * from kota";
				$result = mysqli_query($konek,$query);
				while($brs=mysqli_fetch_row($result)) 
				{ 
				  if ($brs[0]==$kota)
				     echo "<option value='$brs[0]' selected>$brs[1]</option>";
				  else
				     echo "<option value='$brs[0]'>$brs[1]</option>";
				} 
				?>
		</select></td>
	</tr>
	<tr>
		<td width="25%">Agama</td>
		<td width="5%" align="center">:</td>
		<td width="75%"><select name="agama">
			<option>--Pilih Agama--</option>
			<option <?php if($agama=="1") echo "selected";?> value="1">Islam</option>
			<option <?php if($agama=="2") echo "selected";?> value="2">Kristen</option>
			<option <?php if($agama=="3") echo "selected";?> value="3">Katholik</option>
			<option <?php if($agama=="4") echo "selected";?> value="4">Hindu</option>
			<option <?php if($agama=="5") echo "selected";?> value="5">Budha</option>
		</select></td>
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
			<form method="POST" action="view_pegawai.php">
				<input type="submit" value="Kembali">
			</form>
		</td>
	</tr>
</table>
<?php
if (isset($_POST['simpan'])) 
{
	$nip=$_POST['nip'];
	$nama=$_POST['nama'];
	$tgll=$_POST['tgll'];
	$departemen=$_POST['kode_dept'];
	$status=$_POST['kode_status'];
	$alamat=$_POST['alamat'];
	$kota=$_POST['kode_kota'];
	$agama=$_POST['agama'];

	$sql="INSERT into pegawai(nip,nama,tgl_lahir,kode_dept,kode_status,alamat,kode_kota,agama) values ('$nip','$nama','$tgll','$departemen','$status','$alamat','$kota','$agama')";
	$hasil=mysqli_query($konek,$sql);
	if ($hasil)
		echo "<script language='JavaScript'>
		(window.alert('Data Pegawai Sudah Disimpan'))
		location.href='view_pegawai.php'
		</script>";
	else
		echo "<script language='JavaScript'>
		(window.alert('Data Pegawai tidak dapat Disimpan'))
		location.href='add_pegawai.php'
		</script>";
}
?>
</body>
</html>