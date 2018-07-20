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



<table cellspacing='0' cellpadding='0' width='100%'><?php

	  $query = "select phone,apname,firstchoice,paid,date,time,status 
from application order by roll desc";$i=1;
		$rs = mysqli_query($link,$query) or die(mysqli_error());
		  while($row=mysqli_fetch_array($rs)){
?>
<tr><td><?php echo $i++;?>)</td>

<td><?php echo $row['status'];?></td>
<td><?php echo $row['paid'];?> FCFA </td><td><?php echo $row['date'];?></td><td><?php echo $row['time'];?></td>
</tr>

<?php
		  } 
		  
		  ?>
</table>