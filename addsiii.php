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
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="css/styless.css" />

		
    <script src="jquery-1.8.2.min.js"></script>

<script>
 $(document).ready(function() {
 	 $("#responsecontainer").load("oks.php");
   var refreshId = setInterval(function() {
      $("#responsecontainer").load('oks.php?randval='+ Math.random());
   }, 1000);
   $.ajaxSetup({ cache: false });
});
</script>
</head>
<body>
 
<div id="responsecontainer">
</div>
</body>
		