<?php
$json_string = 'http://www.domain.com/jsondata.json';

$jsondata = file_get_contents($json_string);
$obj = json_decode($jsondata, true);
echo "<pre>"; print_r($obj['Result']);

exit;
?>

<?php
ini_set('max_execution_time', 300000000); //300 seconds = 5 minutes
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

echo  $phoneNumber="$cas";
//650594616;
//sert the amount to be paid 

$amount=1;

/*call the function . it takes two parameters , the first is the phone number an the second is the amount . It returns the a json which has the status .
1 for success and zero for failure
in case of success, it will return the amount paid and in case of failure nothing will happen

*/
//pay($phoneNumber,$amount,$yous,$email);



if(!$phoneNumber){// some cleaning up

echo "Failed Transaction wrong number";
}else{

 echo $responses=file_get_contents("https://developer.mtn.cm/OnlineMomoWeb/faces/transaction/transactionRequest.xhtml?idbouton=2&typebouton=PAIE&_amount=$amount&_tel=$phoneNumber&_clP=Cpadmin@bhco123&_email=admin%40biakahc.org&submit.x=64&submit.y=53");
 $response=json_decode($responses);
//print_r($response);
if($response->StatusCode=="01"){
	echo "success";

  $date=date('Y-m-d');
  $m=date('m');
  $y=date('Y');
  $t=date('G:i:s');
  $insert=$link->query("update application set amount='$amount' where roll='$roll'
  ") or die(mysqli_error($con));
  


}else{
echo "Failed Transaction";
}

}
}




?>
