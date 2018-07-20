<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set('max_execution_time', 300000000); //300 seconds = 5 minutes
header("content-text text/xml");
$number="+237653761303";
$amount=1;
$cas=substr("$number",4,$s);

 // $phoneNumber="$cas";


 // $response=file_get_contents("https://developer.mtn.cm/OnlineMomoWeb/faces/transaction/transactionRequest.xhtml?idbouton=2&typebouton=PAIE&_amount=$amount&_tel=$phoneNumber&_clP=Cpadmin@bhco123&_email=admin%40biakahc.org&submit.x=64&submit.y=53");

  //$hos4=strlen("$response");
 
  //$status=substr("$response",15,3);

	//  $statuss=substr("$status" ,0,1);
	



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
//650594616;
//sert the amount to be paid 
$amount=1;

/*call the function . it takes two parameters , the first is the phone number an the second is the amount . It returns the a json which has the status .
1 for success and zero for failure
in case of success, it will return the amount paid and in case of failure nothing will happen

*/
//pay($phoneNumber,$amount,$yous,$email);



 $response=file_get_contents("https://developer.mtn.cm/OnlineMomoWeb/faces/transaction/transactionRequest.xhtml?idbouton=2&typebouton=PAIE&_amount=$amount&_tel=$phoneNumber&_clP=Cpadmin@bhco123&_email=admin%40biakahc.org&submit.x=64&submit.y=53");

 $hos4=strlen("$response");
 
	  $status=substr("$response",15,3);

	  $statuss=substr("$status" ,0,1);
if(empty($statuss)){
	
	
}elseif($statuss>="1"  &&  $statuss<="1"){

echo "<script>alert('Record Created Successfully!'); </script>";
	 mysqli_query($link,"update application set amount='$amount',status='Transaction Success'
 where roll='$roll'
  ");
  }
  
elseif($statuss>"1"){
	
	 mysqli_query($link,"update application set status='error Transaction'
 where roll='$roll'
  ");
echo "error Transaction";

}
}
?>