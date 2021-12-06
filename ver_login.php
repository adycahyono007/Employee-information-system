<?php
include 'conf/koneksi.php';

$user=$_POST['user'];
$pass=($_POST['pass']);
$query="SELECT * from user where userid='$user' and password='$pass'";
$hasil_mysql=mysqli_query($konek,$query);
$baris=mysqli_fetch_row($hasil_mysql);
if($baris[0] <> "") 
	{
		setcookie("admin",$user);
		setcookie("pin",$pass);
		setcookie("nm_user",$baris[2]);

		echo "<script language='javascript'>location.href='admin.php?index=php'</script>";
	}
else
	{
		echo "<script language='JavaScript'>
		(window.alert('User Id atau Password anda salah'))
		location.href='index.php?wrong=salah'
		</script>";	
	}
?>