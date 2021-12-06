<?php 
	$query="SELECT * from user where userid='$userid' and password='$passid'";
	$hasil_mysql=mysqli_query($konek,$query);
	$baris=mysqli_fetch_row($hasil_mysql);

	if (empty($baris[0])) 
	{
		echo "<script language='JavaScript'>
		(window.alert('Anda Harus Login Dahlulu'))
		location.href='index.php?wrong=salah'
		</script>";	
	}
?>