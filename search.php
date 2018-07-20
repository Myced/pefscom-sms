<?php
/*
Author: Javed Ur Rehman
Website: http://www.allphptricks.com/
*/

include("auth.php");




        $query = "SELECT sname as id,cnumber      FROM cont ";
		$result = mysqli_query($con,$query) or die(mysql_error());
		
    while($row = $result->fetch_assoc()) {
		
		
	}
			
			
			?>