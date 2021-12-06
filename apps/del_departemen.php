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
      <a href="del_departemen.php?act=yes&tanda=ok&id=<?php echo $id; ?>">Iya</a> | <a href="del_departemen.php?act=no&tanda=ok&tanda=ok&id=$id">Tidak</a>
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
     $sql="DELETE from departemen where kode_dept='$kode'";
     $result=mysqli_query($konek,$sql);
    
     if($result) //untuk mengambil true or false pada data
     {
	   echo "<script language='JavaScript'>
		  (window.alert('Data departemen sudah dihapus'))
		   location.href='view_departemen.php'
		   </script>";
     }
     else
     {
	   echo "<script language='JavaScript'>
		  (window.alert('Data departemen tidak dapat dihapus'))
		  location.href='view_departemen.php'
		  </script> ";
     }
   }
else
   {
   	  echo "<script language='JavaScript'>
		  (window.alert('Data departemen batal dihapus'))
		  location.href='view_departemen.php'
		  </script> ";
   }   	     
}
?>