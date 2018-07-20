<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";

// Create connection
$link = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}


?>

Total Contact:<?php 
	
$qry = mysqli_query($link,"select count(*) as total
from cont  "); 
$row = mysqli_fetch_assoc($qry); 
 echo $phone=$row['total'];  

 ?>
<hr>
<br>
Mobile Money Payment:
<hr>


<table cellspacing='0' cellpadding='0' width='250'><?php

	  $query = "select SUM(paid) as total
from application where amount='1'";$i=1;
		$rs = mysqli_query($link,$query) or die(mysqli_error());
		  while($row=mysqli_fetch_array($rs)){
?>
<tr><td style='width:40px;'><?php echo $i++;?>)</td>
<td>Total Amount:</td>
<td><b><?php echo number_format($row['total']);?></b> FCFA</td>
</tr>

<?php
		  } 
		  
		  ?>
</table>


Bank Payment:
<hr>

<table cellspacing='0' cellpadding='0' width='250'><?php

	  $query = "select SUM(paid) as total
from application where amount='2'";$i=2;
		$rs = mysqli_query($link,$query) or die(mysqli_error());
		  while($row=mysqli_fetch_array($rs)){
?>
<tr><td style='width:40px;'><?php echo $i++;?>)</td>
<td>Total Amount:</td>
<td><b><?php echo number_format($row['total']);?></b> FCFA</td>
</tr>

<?php
		  } 
		  
		  ?>
</table>




Total Collected
<hr>

<table cellspacing='0' cellpadding='0' width='250'><?php

	  $query = "select SUM(paid) as total
from application where amount>='2' or amount<='1'";$i=2;
		$rs = mysqli_query($link,$query) or die(mysqli_error());
		  while($row=mysqli_fetch_array($rs)){
?>
<tr><td style='width:40px;'></td>
<td></td>
<td><b><?php echo number_format($row['total']);?></b> FCFA</td>
</tr>

<?php
		  } 
		  
		  ?>
</table>








