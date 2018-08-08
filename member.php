<?php

ini_set('max_execution_time', 300000000); //300 seconds = 5 minutes
require 'db.php';
include("auth.php");

include_once 'other/class.dbc.php';

$db = new dbc();
$dbc = $db->get_instance();

	$_POST['abc'];
	if(isset($_POST['abc'])){
		$username = "info@pefscomsys.com";
	$hash = "b976e6f88743ef28fcd218e3f14454bcd287b90bba898fdf2cbf25b66ab43f95";
	// Config variables. Consult http://api.txtlocal.com/docs for more info.
	$test = "0";

	$groups =$_POST['groups'];
	$region = $_POST['reegion'];


	// Data for text message. This is the text message data.
	$sender ="BUIB"; // This is who the message appears to be from.
	?>
	<?php


	//get the number of sms left
	$query = "SELECT amount from `sms` WHERE `id` = '1'";
	$result = mysqli_query($dbc, $query);

	list($left) = mysqli_fetch_array($result);



	//now check the the cost of the sms
	$query = "SELECT * FROM `cont` WHERE `groups`  = '$groups'";
	$result = mysqli_query($dbc, $query);

	$cost = mysqli_num_rows($result);
	//////////

	if($cost > $left)
	{
		echo '<script> alert("SMS not enough to send. Please recharge"); </script>';
		echo '<meta http-equiv="refresh" content="0; url=adds.php?id=4">';
	}
	else
	{
		$msg = $_POST['message'];

		$date=date('j/m/Y');
		$time=date('h:i:s');

		//get the group name
		if($region == '' || $region == '-100')
		{
			$gname = 'Students - All Students';
		}
		else {
			$q = "SELECT `groupname` from `groups` WHERE `roll` = '$groups'";
			$ress  = mysqli_query($dbc, $q);

			list($gname) = mysqli_fetch_array($ress);

			$gname = $gname . ' - ' . $region;
		}


		mysqli_query($con,"insert into inbox (sender ,message ,date,time,receiver)
		VALUES ('$sender','$msg','$date','$time','$gname')");

		//select only for selected studetns
		if($region == '' || $region == '-100')
		{
			$query = "select phone,cname from cont  WHERE `groups` = '$groups'";
		}
		else {
			$query = "select phone,cname from cont  WHERE `groups` = '$groups' AND `region` = '$region' ";
		}



		$rs = mysqli_query($con,$query) or die(mysql_error());
		while($row=mysqli_fetch_array($rs))
		{
			?>
			<?php
			$numberss =$row['phone'];

			$cname =$row['cname'];
			$numbers = filter_var($numberss, FILTER_SANITIZE_NUMBER_INT);


			 // A single number or a comma-seperated list of numbers
			$messagess =$_POST['message'];
			// 612 chars or less
			// A single number or a comma-seperated list of numbers
			$messages = urlencode($messagess);
			$message = "$cname ,$messages";

			$data = "username=".$username."&hash=".$hash."&message=".$messages."&sender=".$sender."&numbers=".$numbers."&test=".$test;
			$ch = curl_init('http://api.txtlocal.com/send/?');
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$resulst = curl_exec($ch); // This is the result from the API
			curl_close($ch);

		}


		//log the results tooo
		$query = "INSERT INTO `result` (`result` )
				VALUES ('$resulst');
		";
		$resul = mysqli_query($dbc, $query);

		//convert the result to an array
		$json = json_decode($resulst, true);


		//generate a custom report to the user.
		if(empty($json['status']))
		{
			echo "<script>alert('No Internet connection. Please connect to the internet and try again'); </script>";
		}
		elseif($json['status'] == "failure")
		{
			echo "<script>alert('Sorry Could not send messages. Internal Failure. Please contact admin'); </script>";
		}
		elseif($json['status'] == "success")
		{
			//now subtract the sms from the total amount
			$new = $left - $cost;

			$query = "UPDATE `sms` SET `amount` = '$new' WHERE `id` = '1'";
			$resul = mysqli_query($dbc, $query);

			echo "<script>alert('All Messages Sent!'); </script>";
		}
		else
		{
			echo "<script>alert('Unknown Status!'); </script>";
		}

		echo '<meta http-equiv="refresh" content="0; url=adds.php?id=4">';
	}

	}

?>
