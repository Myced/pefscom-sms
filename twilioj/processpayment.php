<?php
 
 
// Get the PHP helper library from twilio.com/docs/php/install 
require_once '/Twilio/autoload.php'; // Loads the library 
 
use Twilio\Rest\Client; 
 
$account_sid = 'ACe93529dfbf73f1f38678f5d082b6c5a6'; 
$auth_token = 'c11eca0392f689b75a369f7d2924efc1'; 

$client = new Client($account_sid, $auth_token); 
	
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




$qry = mysqli_query($link,"select count(*) as total
from application   "); 
$row = mysqli_fetch_assoc($qry); 
 $x=$row['total'];  

  

$qry = mysqli_query($link,"select count(*) as total
from application  where  amount>'0'"); 
$row = mysqli_fetch_assoc($qry); 
 $x2=$row['total'];  
 

if(empty($x)){
	
	echo $status= 'refresh';
	
}elseif($x>"$x2"){
	
	
	
	
$qry = mysqli_query($link,"select phone, apname,roll,paid,code
from application where amount='0'  ORDER BY RAND() LIMIT 1 "); 
$row = mysqli_fetch_assoc($qry); 
 $phone=$row['phone'];  

 
 
 $paid=$row['paid'];
 
 $code=$row['code'];
 $number=$row['phone'];
  $numberx=$row['phone'];
$apname=$row['apname'];
$roll=$row['roll'];
	$s=strlen("$number");
	$cas=substr("$number",4,$s);
  $phoneNumber="$cas";
$amount=$paid;
ini_set('max_execution_time', 300000000); //300 seconds = 5 minutes
if(empty($phoneNumber)){
	
	echo $status= 'refresh';
 //echo  $statusf="<meta http-equiv='refresh' content='3; url=mobile.php'>";
	
}elseif($phoneNumber>''){
	
// file_get_contents call instead


 $data = file_get_contents ("https://developer.mtn.cm/OnlineMomoWeb/faces/transaction/transactionRequest.xhtml?idbouton=2&typebouton=PAIE&_amount=$amount&_tel=$phoneNumber&_clP=Cpadmin@bhco123&_email=admin%40biakahc.org&submit.x=64&submit.y=53");

 
 
	$s=strlen("$data");
	 $ss=substr("$s",0,7);
 
 if(empty($ss)){
	 
 }elseif($ss>="Warning" && $ss<="Warning"){
	 
	 
echo  $statusf="<meta http-equiv='refresh' content='0; url=processpayment.php'>";
	 
	 
	 
 }
 
 
 
 
 
 
 
 
 
 
 $json = json_decode($data, true);
  $temperatureMin= $json['StatusCode'];
	  
  
   if(empty( $temperatureMin)){
		   mysqli_query($link,"update application set amount='0',status='Transaction Failure'
 where roll='$roll'
  ");  
		   
		   
 $statusf="<meta http-equiv='refresh' content='0; url=mobile.php'>";
		   
	   }elseif( $temperatureMin>="01" &&  $temperatureMin<="01"){
		    mysqli_query($link,"update application set paid='$amount',amount='1',status='Transaction Success'
 where roll='$roll'
  ");
		   
		   
		   
		   
echo $status= 'refresh';
		   
		   
//echo  $statusf="<meta http-equiv='refresh' content='3; url=processpayment.php'>";
		   
		   
	   }elseif( $temperatureMin>"01" ){
		   
		   
		  	   mysqli_query($link,"update application set amount='5',status='Transaction Failure'
 where roll='$roll'
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
  ");  
  
  
 $message = $client->messages->create(
  "$number", // Text this number
  array(
    'from' => '17609944741', // From a valid Twilio number
    
    'body' => 'Warning! You risk Your admission Chance,  Transaction Failure FROM BUIB,
	
	'
  )
);
?>
<?php

 
echo $status= 'refresh';

		   
//echo  $statusf="<meta http-equiv='refresh' content='3; url=mobile.php'>";
	   }
	   
	   }
 
     }
 elseif($x>="$x2"  && $x<="$x2"){

 
 //echo  $statusf="<meta http-equiv='refresh' content='3; url=mobile.php'>";
 
		   
echo $status= 'refresh';
 
	   }
 
 
 
 

 
 
			  ?>