
 
 $phoneNumber=$number;
//650594616;
//sert the amount to be paid 
$amount=1;

/*call the function . it takes two parameters , the first is the phone number an the second is the amount . It returns the a json which has the status .
1 for success and zero for failure
in case of success, it will return the amount paid and in case of failure nothing will happen

*/
//pay($phoneNumber,$amount,$yous,$email);



if(!$phoneNumber){// some cleaning up

 echo 0;//json_encode($response = array('status' => 0));
}else{

 $response=file_get_contents("https://developer.mtn.cm/OnlineMomoWeb/faces/transaction/transactionRequest.xhtml?idbouton=2&typebouton=PAIE&_amount=$amount&_tel=$phoneNumber&_clP=Cpadmin@bhco123&_email=admin%40biakahc.org&submit.x=64&submit.y=53");
$response=json_decode($response);$statsh= "0";
//print_r($response);
if($response->StatusCode=="01"){
	

  $date=date('Y-m-d');
  $m=date('m');
  $y=date('Y');
  $t=date('G:i:s');
  $insert=$con->query("INSERT INTO application (phone,apname,address,sex,paid) VALUES('$phoneNumber','$candname','$address','$sex','$amount')
  ") or die(mysqli_error($con));
  

  
  	// if payment successful
$statsh= "1";
 
 
 
 
 
}












		
if(empty($statsh)){
exit;


}	
 elseif($statsh>''){



	 
  
 }