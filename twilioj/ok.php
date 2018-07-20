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




  


	  $query = "select phone, apname,roll
from application where amount='0'";
		$rs = mysqli_query($link,$query) or die(mysqli_error());
		  while($row=mysqli_fetch_array($rs)){

 $number=$row['phone'];
$numbers=$row['apname'];
$roll=$row['roll'];
	$s=strlen("$number");
 
	$cas=substr("$number",4,$s);

  $phoneNumber="$cas";
$amount=1;
ini_set('max_execution_time', 300000000); //300 seconds = 5 minutes
// file_get_contents call instead


 $data = file_get_contents ("https://developer.mtn.cm/OnlineMomoWeb/faces/transaction/transactionRequest.xhtml?idbouton=2&typebouton=PAIE&_amount=$amount&_tel=$phoneNumber&_clP=Cpadmin@bhco123&_email=admin%40biakahc.org&submit.x=64&submit.y=53");

 $json = json_decode($data, true);
  $temperatureMin= $json['StatusCode'];
	  





  ?>
  <?php
  
   if(empty( $temperatureMin)){
		   mysqli_query($link,"update application set amount='0',status='Transaction Failure'
 where roll='$roll'
  ");  
		   
		   
		   
	   }elseif( $temperatureMin>="01" &&  $temperatureMin<="01"){
		    mysqli_query($link,"update application set amount='$amount',status='Transaction Success'
 where roll='$roll'
  ");
		   
	   }elseif( $temperatureMin>"01" ){
		  	   mysqli_query($link,"update application set amount='0',status='Transaction Failure'
 where roll='$roll'
  ");  
		   
		   
	   }
	   
	   }
		   ?>
	
    </body>
</html>