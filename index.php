<?php
/*
Author: Javed Ur Rehman
Website: http://www.allphptricks.com/
*/

include("auth.php"); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome Home</title>
<link rel="stylesheet" href="css/styles.css" />

<script src="jquery.min.js"></script>
<script     type="text/javascript"    src="frank.js"></script>
</head>
<body>

<h5 style='float:left;margin-left:800px;font-size:11px;font-weight:bold;color:#fff;'>POWERED BY PEFSCOM</h5>

<h3 style='float:left;margin-left:800px;font-size:29px;margin-top:-15px;  font-weight:bold;color:#fff;'>Xclusive for  BUIB</h3>
<div class='box'>
  <div class='box-form'>
    <div class='box-login-tab'></div>
    <div class='box-login-title'>
      <div class='i i-login'></div><h2 style='float:left;margin-left:10px;'>Welcome <?php echo $_SESSION['username']; ?></h2>
    </div>
    <div class='box-login'><form action="" method="post" name="login">
      <div class='fieldset-body' id='login_form'>
     
        
      	<div style='float:left; width:420px; height:350px;'>

      	<div style='float:left; width:130px; height:95px;'>
		<a href='addy.php?id=<?php echo $home='1';?>' onclick="window.open(this.href); return false;" onkeypress="window.open(this.href); return false;">
      	<div style='float:left; width:120px; height:60px;margin-top:10px;'>
		
		<img src='a.jfif' height='50px' width='50px'>
		</div>
		
      	<div style='float:left; width:120px; font-size:13px;height:25px;margin-top:00px;background:#ccc;padding:3px;'>
		Add New Contact
		</div>
		</a>
		</div>
		
		
		
		
		
		
		
		
		
		
		
      	<div style='float:left; width:130px; height:95px;'>
		<a href='addy.php?id=<?php echo $home='2';?>' onclick="window.open(this.href); return false;" onkeypress="window.open(this.href); return false;">
      	<div style='float:left; width:120px; height:60px;margin-top:10px;'>
		
		<img src='data.jfif' height='50px' width='50px'>
		</div>
		
      	<div style='float:left; width:120px; font-size:13px;height:25px;margin-top:00px;background:#ccc;padding:3px;'>
		View Data
		</div>
		</a>
		</div>
		
		
		
		
		
		
      	<div style='float:left; width:130px; height:95px;'>
		<a href='addy.php?id=<?php echo  $home='3';?>' onclick="window.open(this.href); return false;" onkeypress="window.open(this.href); return false;">
      	<div style='float:left; width:120px; height:60px;margin-top:10px;'>
		
		<img src='add.jfif' height='50px' width='50px'>
		</div>
		
      	<div style='float:left; width:120px; font-size:13px;height:25px;margin-top:00px;background:#ccc;padding:3px;'>
		Create New Group
		</div>
		</a>
		</div>
		
		
		
      	<div style='float:left; width:130px; height:95px;'>
		<a href='addy.php?id=<?php echo  $home='4';?>' onclick="window.open(this.href); return false;" onkeypress="window.open(this.href); return false;">
      	<div style='float:left; width:120px; height:60px;margin-top:10px;'>
		
		<img src='sent.png' height='50px' width='50px'>
		</div>
		
      	<div style='float:left; width:120px; font-size:13px;height:25px;margin-top:00px;background:#ccc;padding:3px;'>
		Sent Messages
		</div>
		</a>
		</div>
		
		
		
		
		
      	<div style='float:left; width:130px; height:95px;'>
		<a href='addy.php?id=<?php echo  $home='5';?>' onclick="window.open(this.href); return false;" onkeypress="window.open(this.href); return false;">
      	<div style='float:left; width:120px; height:60px;margin-top:10px;'>
		
		<img src='addtocard.jfif' height='50px' width='50px'>
		</div>
		
      	<div style='float:left; width:120px; font-size:13px;height:25px;margin-top:00px;background:#ccc;padding:3px;'>
		Buy Credit
		</div>
		</a>
		</div>
		
		
      	<div style='float:left; width:130px; height:95px;'>
		<a href='addy.php?id=<?php echo  $home='6';?>' onclick="window.open(this.href); return false;" onkeypress="window.open(this.href); return false;">
      	<div style='float:left; width:120px; height:60px;margin-top:10px;'>
		
		<img src='message.jfif' height='50px' width='50px'>
		</div>
		
      	<div style='float:left; width:120px; font-size:13px;height:25px;margin-top:00px;background:#ccc;padding:3px;'>
		Inbox Messages
		</div>
		</a>
		</div>
		
		
		   	<div style='float:left; width:130px; height:95px;'>
		<a href='addy.php?id=<?php echo  $home='t';?>' onclick="window.open(this.href); return false;" onkeypress="window.open(this.href); return false;">
      	<div style='float:left; width:120px; height:60px;margin-top:10px;'>
		
		<img src='reply.jfif' height='50px' width='50px'>
		</div>
		
      	<div style='float:left; width:120px; font-size:13px;height:25px;margin-top:00px;background:#ccc;padding:3px;'>
		Auto Reply Box
		</div>
		</a>
		</div>
		
		
			<div style='float:left; width:130px; height:95px;'>
		<a href='addy.php?id=<?php echo  $home='code';?>' onclick="window.open(this.href); return false;" onkeypress="window.open(this.href); return false;">
      	<div style='float:left; width:120px; height:60px;margin-top:10px;'>
		
		<img src='shortcode.png' height='50px' width='50px'>
		</div>
		
      	<div style='float:left; width:120px; font-size:13px;height:25px;margin-top:00px;background:#ccc;padding:3px;'>
		Short Code
		</div>
		</a>
		</div>
		
		  	<div style='float:left; width:130px; height:95px;'>
		<a href='addy.php?id=<?php echo  $home='application';?>'onclick="window.open(this.href); return false;" onkeypress="window.open(this.href); return false;">
      	<div style='float:left; width:120px; height:60px;margin-top:10px;'>
		
		<img src='verify.jfif' height='50px' width='50px'>
		</div>
		
      	<div style='float:left; width:120px; font-size:13px;height:25px;margin-top:00px;background:#ccc;padding:3px;'>
		Application
		</div>
		</a>
		</div>
		
		
		
		
		
		
		
		
		
		<div style='float:left; width:130px; height:95px;'>
		<a href='addy.php?id=<?php echo  $home='application';?>' onclick="window.open(this.href); return false;" onkeypress="window.open(this.href); return false;">
      	<div style='float:left; width:120px; height:60px;margin-top:10px;'>
		
		<img src='register.png' height='50px' width='50px'>
		</div>
		
      	<div style='float:left; width:120px; font-size:13px;height:25px;margin-top:00px;background:#ccc;padding:3px;'>
		Bank Payment
		</div>
		</a>
		</div>
		
		
		<div style='float:left; width:130px; height:95px;'>
		<a href='addy.php?id=<?php echo  $home='application';?>'onclick="window.open(this.href); return false;" onkeypress="window.open(this.href); return false;">
      	<div style='float:left; width:120px; height:60px;margin-top:10px;'>
		
		<img src='momo.png' height='50px' width='50px'>
		</div>
		
      	<div style='float:left; width:120px; font-size:13px;height:25px;margin-top:00px;background:#ccc;padding:3px;'>
		Verify Payment
		</div>
		</a>
		</div>
		
		
			<div style='float:left; width:130px; height:95px;'>
		<a href='add.php?id=<?php echo  $home='application';?>'onclick="window.open(this.href); return false;" onkeypress="window.open(this.href); return false;">
      	<div style='float:left; width:120px; height:60px;margin-top:10px;'>
		
		<img src='download.jpg' height='50px' width='50px'>
		</div>
		
      	<div style='float:left; width:120px; font-size:13px;height:25px;margin-top:00px;background:#ccc;padding:3px;'>
		Download List
		</div>
		</a>
		</div>
		
		
  </div>
      
      	<div style='float:left; width:810px; height:30px; text-align:right;'><a href="logout.php"  id='do_login' >Logout</a>
		</div>
 <iframe src="twilioj/table.php?id=<?php echo $_GET['id'];?>" width='790' height='20px' style='background: #87314e;border:none;margin-left:-18px;color:#fff;'>Processing...</iframe> 
      	<div style='float:left; width:810px; height:340px;margin-top:0px;'>
		
		
		
 <iframe src="addsi.php?id=<?php echo $_GET['id'];?>" width='790' height='370' style='border:none;'></iframe> 
  </div>   
        	
			
  <marquee id='do_login' style='
  background-color: #87314e; margin-top:8px; height:28px;color:#fff;'>System Design and programmed by pefscom system ltd</marquee>
			
			
			powered by PEFSCOM SYS LTD<br><br>
      </div>
    </div>
  </div>

