<?php
require 'db.php';

include("auth.php");


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="css/styless.css" />

<script src="jquery.min.js"></script>
<script src="frank.js"></script>
		<link rel="stylesheet" href="bootstrap.min.css">
		<link rel="stylesheet" href="css/datatables/datatables.css">
</head>
<body>
<h3><b style='float:left; text-align:left;'>Progress of Registration</b></h3>
<div style='float:left; width:780px; height:300px;'>

<div style='float:left; width:490px; height:300px;'>

 <iframe src="addsii.php?id=<?php echo $_GET['id'];?>" width='470' height='270' style='border:none;'></iframe> 

</div>

<div style='float:left; width:250px; height:300px;'>

 <iframe src="addsiii.php?id=<?php echo $_GET['id'];?>" width='320' height='310' style='border:none;'></iframe> 

</div>


</div>


<table cellspacing='0' cellpadding='0' width='100%'>
<tr><td></td><td></td></tr>
</table>