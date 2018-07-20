<?php
error_reporting(E_ALL ^ E_NOTICE);
header("content-text text/xml");
$number=$_POST['From'];
$body=$_POST['Body'];
$number=$_GET['From'];
$bodys=$_GET['Body'];

//$bodys="*666#";
if(empty($bodys)){
	$money="Sorry! Invalid Candidate Info:";
}elseif($bodys>''){


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
$date=date('j/m/Y');


 $sql = "SELECT code as id,status      FROM code where code='$bodys'";
	$results =mysqli_query($link,$sql);	 
		 while ($row =mysqli_fetch_array($results)) {
         $code =$row["id"];
		 $menu=$row["status"];
		 
		 
		 
		 
		 
		 
		 
		 
		 
		

    }
} 

  
  
  
  
  ?>
  
  
  


<Response>
<Message> 
<?php 
  
$sqls = "SELECT roll,desck FROM $menu ";
	$results =mysqli_query($link,$sqls);	 
		 while ($row =mysqli_fetch_array($results)) {
			 
			 
			 $roll=$row['roll'];
			 
			 
			 
			 $dpp=$row['desck'];
			 
			 
			 echo " $roll)   $dpp \n";
			 
mysqli_query($link,"insert into choice (phone,roll ,desck,code)
VALUES ('$number','$roll','$dpp','$bodys$roll')");
		 }
		 
		 
		 


?>
</Message>
</Response>













