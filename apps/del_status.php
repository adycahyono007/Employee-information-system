<?php 
include 'conf/koneksi.php'; 
error_reporting(0);

$id=$_GET['id'];

if (empty($_GET['tanda']))
{
?>
<table width="30%" border="1" align="center">
 <tr>
 	<td align="center">Apakah anda yakin akan menghapus?<br>
      <a href="del_status.php?act=yes&tanda=ok&id=<?php echo $id; ?>">Iya</a> | <a href="del_status.php?act=no&tanda=ok&tanda=ok&id=$id">Tidak</a>
 	</td>	
 </tr>	
</table>
<?php
}
else
{
if ($_GET['act']=="yes")
   { 
   	 $kode=$_GET['id'];
     $sql="DELETE from status where kode_status='$kode'";
     $result=mysqli_query($konek,$sql);
    
     if($result) //untuk mengambil true or false pada data
     {
	   echo "<script language='JavaScript'>
		  (window.alert('Data Status Kepegawaian sudah dihapus'))
		   location.href='view_status.php'
		   </script>";
     }
     else
     {
	   echo "<script language='JavaScript'>
		  (window.alert('Data Status Kepegawaian tidak dapat dihapus'))
		  location.href='view_status.php'
		  </script> ";
     }
   }
else
   {
   	  echo "<script language='JavaScript'>
		  (window.alert('Data Status Kepegawaian batal dihapus'))
		  location.href='view_status.php'
		  </script> ";
   }   	     
}
?>