
  $username = "info@pefscomsys.com";
	$hash = "b976e6f88743ef28fcd218e3f14454bcd287b90bba898fdf2cbf25b66ab43f95";
	// Config variables. Consult http://api.txtlocal.com/docs for more info.
	$test = "0";
	// Data for text message. This is the text message data.
	$sender ="BUIB"; // This is who the message appears to be from.


	$numberss =$numberx; 
	
	$cname =$apname; 
	$numbers = filter_var($numberss, FILTER_SANITIZE_NUMBER_INT);
	
	
	 // A single number or a comma-seperated list of numbers
	$messagess ="Application Cancelled,
	Sorry! $cname, due to insufficient fund, we cannot process your application";
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($messagess);
	
	
	$date=date('j/m/Y');
	$time=date('h:i:s');
	

	
	
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.txtlocal.com/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);