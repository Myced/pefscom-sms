<?php

error_reporting(E_ALL ^ E_NOTICE);
require 'db.php';

include("auth.php");

include_once 'other/class.dbc.php';

$db = new dbc();
$dbc = $db->get_instance();


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
<body><?php  $fr=$_GET['id'];
if(empty($fr)){
	
}elseif($fr>="1"  && $fr<="1"){
	
	
	
	
	
	
	
	
	?><?php
	
	if (isset($_POST['username'])){
					$username=$_POST['username'];
					$contact=$_POST['contact'];$group=$_POST['groups'];
mysqli_query($con,"insert into cont (cname,phone,groups)
VALUES ('$username','$contact','$group')");

echo "<script>alert('New Record Created Successfully!'); </script>";

					}
	
	?><div class='box-login'><form action="" method="post" name="login">
      <div class='fieldset-body' id='login_form'>
		<h2>Add New Contact
		<img src='a.jfif' height='50px' width='50px'></h2>
        	<p class='field'>
          <label for='user'>Full Names</label>
          <input type='text' id='user' name="username" placeholder="Full Names" title='Username' />
          <span id='valida' class='i i-warning'></span>
        </p>
      	  <p class='field'>
          <label for='pass'>Contact</label>
          <input type='text' id='pass' name="contact" placeholder="Contact"title='Password' />
          <span id='valida' class='i i-close'></span>
        </p>
  <p class='field'>
          <label for='pass'>Group</label>
		  <select name='groups' id='inputFieldId' autofocus="autofocus" required='required'  style=" font-size:14px;margin-top:-2px; padding:5px;font-family:arial;" >
<?php

$rss="SELECT roll, groupname  from  groups  ";

 $rs=mysqli_query($con,$rss);
	  while($row=mysqli_fetch_array($rs))
{
if($row[1]==$fees)
{
echo "<option value='$row[roll]' selected>$row[groupname] $row[1]</option>";
}
else
{
echo "<option value='$row[roll]'>$row[name] $row[groupname]</option>";
}
}
?></select>
          <span id='valida' class='i i-close'></span>
        </p>


        	<input type='submit' id='do_login' value='Save' title='Get Started'style='width:150px; height:40px; margin-top:-1px;' />
									
									<a class="btn btn-success" href="contact_list.php"
												style="border-radius: 0px; font-weight: bold; margin-left: 5px; font-size: 16px;">
													Contact List
									</a>
      </div>
    </div>
	
<?php } 

elseif($fr>="2"  && $fr<="2"){
	?>








	<div id="wrap">
	
			<div class="container">
			<div style='width:100%; height:80px; padding:5px;'>
			<form action="" method="post" name="login">
			<table cellpadding="0" cellspacing="0" border="0"width='500px' >
				<tr><td>
			<input type='text' name='search' value='' style='float:left; margin-left:-10px;'style='float:left;width:250px;'></td><td><input type='submit' value='search' style='float:left; margin-top:-2px;'></td></tr></table></div>
				</form><table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered"
				style='margin-top:-22px;'>
					<thead>
						<tr>
							<th>Full Names</th>
							<th>Contact</th>
							<th>Platform(s)</th>
						
						</tr>
					</thead>
					<tbody>
					<?php
					if (isset($_POST['search'])){
					$search=$_POST['search'];
					
					}
if(empty($search)){
	
	
	$vb="SELECT cname as id,phone,examcode      FROM cont limit 0,50";
	
	
	
}elseif($search>''){
	
	$vb="SELECT cname as id,phone,examcode      FROM cont where cname like '%$search%' or phone like '%$search%'";
	
}
      $query = "$vb";
		$result = mysqli_query($con,$query) or die(mysql_error());
		
    while($row = $result->fetch_assoc()) {
		?>
						<tr class="gradeX">
							<td><?php echo $row['id'];?></td>
							<td>
								<?php echo $row['phone'];?>
								</td>
							<td><?php echo $row['examcode'];?></td>
						
						</tr>
	<?php } ?>
					</tfoot>
				</table>
			</div>
		</div>
<?php } elseif($fr>="3"  && $fr<="3"){
	?><div class='box-login'>
	
	<?php
	
	if (isset($_POST['groups'])){
					$groups=$_POST['groups'];
					
mysqli_query($con,"insert into groups (groupname)
VALUES ('$groups')");

echo "<script>alert('Record Created Successfully!'); </script>";

					}
	
	?>
	
	
	<form action="" method="post" name="login">
      <div class='fieldset-body' id='login_form'>
		<h2>Create New Group 
		<img src='add.jfif' height='50px' width='50px'></h2>
        	<p class='field'>
          <label for='user'>Group Name</label>
          <input type='text' id='user' name="groups" placeholder="New Group Name" title='Username' style='float:left;width:100%;'/>
          <span id='valida' class='i i-warning'></span>
        </p>
         

        	<input type='submit' id='do_login' value='Save' title='Get Started'style='width:150px; height:40px; margin-top:-1px;' />
      </div>
    </div>
	
	
	
	
	
	
	
	
	<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered"
				style='margin-top:22px;'>
					<thead>
						<tr>
							<th>Group Name</th>
							<th> Action</th>
						
						</tr>
					</thead>
					<tbody>
					<?php
					
					//delete a group if that is necessary
					if(isset($_GET['action']))
					{
							$gid = $_GET['idd'];
							if($_GET['action'] == 'delgroup')
							{
									$q = "DELETE FROM `groups` WHERE `roll` = '$gid'";
									$r = mysqli_query($dbc, $q);
									
									echo "<script> alert('Group Deleted'); </script>";
							}

					}
					
					if (isset($_POST['groups'])){
					$groups=$_POST['groups'];
					
					}
$vb="SELECT *  FROM groups ";
      $query = "$vb";
		$result = mysqli_query($con,$query) or die(mysql_error());
		
    while($row = $result->fetch_assoc()) {
		?>
						<tr class="gradeX">
							<td><?php echo $row['groupname'];?></td>
							
							<td>
										<a class="btn btn-xs btn-primary" href="edit_group.php?id=<?php echo $row['roll']; ?>">
													<i class="fa fa-pencil">Edit</i>
										</a>
										
										<a class="btn btn-xs btn-danger" data-id1= "<?php echo $row['roll']; ?>"
													href="adds.php?action=delgroup&idd=<?php echo $row['roll']; ?>&id=3">
													<i class="fa fa-pencil">Delete</i>
										</a>
										
										<a class="btn btn-xs btn-info" href="contact_list.php?group=<?php echo $row['roll']; ?>">
													<i class="fa fa-pencil">View Contacts</i>
										</a>
							</td>
						
						</tr>
	<?php } ?>
					</tfoot>
				</table>
			</div>
		</div>
<?php } 
elseif($fr>="4"  && $fr<="4"){
	?><div class='box-login'>
	<?php

					if (isset($_POST['groups'])){
						$groups=$_POST['groups'];
					}
						
						if(empty($groups)){
		?>
	
	<form action="" method="post" name="login">
	
      <div class='fieldset-body' id='login_form'>
		<h2>Send New Message 
		<img src='sent.png' height='50px' width='50px'></h2>
        	<p class='field'>
          <label for='user'>Group Name</label>
         <select name='groups' id='inputFieldId' autofocus="autofocus" required='required'  style=" font-size:14px;margin-top:-2px; width:400px;padding:5px;font-family:arial;" >
<?php

$rss="SELECT roll, groupname  from  groups  ";

 $rs=mysqli_query($con,$rss);
	  while($row=mysqli_fetch_array($rs))
{
if($row[1]==$fees)
{
echo "<option value='$row[roll]' selected>$row[groupname] $row[1]</option>";
}
else
{
echo "<option value='$row[roll]'>$row[name] $row[groupname]</option>";
}
}
?></select>
          <span id='valida' class='i i-warning'></span>
        </p>
        	<input type='submit'name='abc' id='do_login' value='Process List Option' title='Get Started'style='width:230px; height:40px; margin-top:5px;' />
         <?php
						}

					elseif($groups>''){
						$groups=$_POST['groups'];
				?>
				
				
				
				
				
				
				
				
				
				<br>
				
				<br>
				
				<br>
				
				<?php
				//get the number of sms left
				$query = "SELECT amount from `sms` WHERE `id` = '1'";
				$result = mysqli_query($dbc, $query);
				
				list($left) = mysqli_fetch_array($result);
				
				
				
				//now check the the cost of the sms
				$query = "SELECT * FROM `cont` WHERE `groups`  = '$groups'";
				$result = mysqli_query($dbc, $query);
				
				$cost = mysqli_num_rows($result);
				
				
				?>
				<table class="table table-bordered">
					<tr>
							<th>SMS left</th>
							<td><?php echo $left; ?> </td>
					</tr>
					<tr>
						<th>No of SMS Required</th>
						<td> <?php echo $cost; ?> </td>
					</tr>
				</table>
				
	<form action="member.php" method="post" name="login">
          <label for='user'>Type Message 
		<img src='sent.png' height='50px' width='50px'></label>
		  
          <input type='hidden' id='group' name="groups" value='<?php echo $groups;?>'placeholder="New Group Name" title='Username' style='float:left;width:100%;'/>
          <input type='text' readonly="readonly" id='user' name="contacts" value='<?php
	  $query = "select phone from cont where groups='$groups' order by phone DESC ";
		$rs = mysqli_query($con,$query) or die(mysql_error());
		  while($row=mysqli_fetch_array($rs)){
		?><?php
	$numberss =$row['phone']; 
echo	$numbers =$int =  filter_var($numberss, FILTER_SANITIZE_NUMBER_INT)
	?>,<?php } ?>'placeholder="New Group Name" title='Username' style='float:left;width:100%;'/>
		  
       <textarea name="message" id="smsMessage" cols="85" rows="5"></textarea>
		  
        	<input type='submit'name='abc' id='do_login' value='Send Message...' title='Get Started'style='width:180px; height:40px; margin-top:5px;' />
		  
		        
<?php } ?>
		  
		  
		  

      
<?php } 
elseif($fr>="5"  && $fr<="5"){
	?><div class='box-login'>
	
		<h2>Buy SMS Credit 
		<img src='addtocard.jfif' height='50px' width='50px'></h2>
        	<p class='field'>
         the Cost of SMS is 15 frs CFA,<br>
		 this sms are paid by visa and by partner of this sms link,
		 for more information please call (+237 233323988)
		  
		  

      
<?php } 

elseif($fr>="6"  && $fr<="6"){
	?>








	<div id="wrap">
	
			<div class="container">
			<div style='width:100%; height:80px; padding:5px;'>
			<form action="" method="post" name="login">
			<table cellpadding="0" cellspacing="0" border="0"width='500px' >
				<tr><td>
			<input type='text' name='search' value='' style='float:left; margin-left:-10px;'style='float:left;width:250px;'></td><td><input type='submit' value='search' style='float:left; margin-top:-2px;'></td></tr></table></div>
				</form>
			<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered"
				style='margin-top:-22px;'>
					<thead>
						<tr>
							<th>Sender</th>
							<th>Date</th>
							<th>Time</th>
							<th>Delivered to</th>
						
							<th>Contact</th>
						</tr>
					</thead>
					<tbody>
					<?php
					if (isset($_POST['search'])){
					$search=$_POST['search'];
					
					}
if(empty($search)){
	
	
	$vb="SELECT *      FROM inbox limit 0,50";
	
	
	
}elseif($search>''){
	
	$vb="SELECT *      FROM inbox where date like '%$search%' or receiver like '%$search%'";
	
}
      $query = "$vb";
		$result = mysqli_query($con,$query) or die(mysql_error());
		
    while($row = $result->fetch_assoc()) {
		?>
						<tr class="gradeX">
							<td><?php echo $row['sender'];?></td>
							<td>
								<?php echo $row['date'];?>
								</td><td>
								<?php echo $row['time'];?>
								</td>
							<td><?php echo $row['message'];?></td>
						
							<td><?php echo $row['receiver'];?></td>
						</tr>
	<?php } ?>
					</tfoot>
				</table>
			</div>
		</div>
<?php }  
elseif($fr>="t"  && $fr<="t"){
	?><div class='box-login'>
	
		<h2>Auto Responder or Reply Section
		<img src='reply.jfif' height='50px' width='50px'></h2>
        	<p class='field'>
         the Cost of SMS is 15 frs CFA,<br>
		 this sms are paid by visa and by partner of this sms link,
		 for more information please call (+237 233323988)
		  <br>
		  and there will be a standby computer with a UPS, Internet Connection, setting up cost is negotiable for example a student to dial<br>
		  *149*1<br>
		  and Get Reply of welcome to our institutions:<br>
		  1) Programmes we offer<br>
		    2) who we are<br>

        3) How to get intouch with us<br>
<?php } elseif($fr>="code"  && $fr<="code"){
	?><div class='box-login' style='text-align:left; width:750px;'>
	
		<h2>Create a short Code 	<img src='shortcode.png' height='50px' width='50px'></h2>
	
        	<p class='field'>
        <a href='adds.php?id=<?php echo "code";?>&frank=<?php echo "x";?>'>Create New Code</a><br><br><br>
		<?php
		$x=$_GET["frank"];
		if(empty($x)){
			?>
		<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered"
				style='margin-top:-22px;'>
					<thead>
						<tr>
							<th>Code</th>
							<th>Example and Function</th>
							
						</tr>
					</thead>
					<tbody>
					<?php
	
      $query = "SELECT *      FROM code";
		$result = mysqli_query($con,$query) or die(mysql_error());
		
    while($row = $result->fetch_assoc()) {
		?>
						<tr class="gradeX">
							<td><?php echo $row['code'];?></td>
							<td>
								<?php echo $row['status'];?>
								</td
						</tr>
	<?php } ?>
					</tfoot>
				</table>
				<?php 
		} elseif($x>''){
			
			?>
			<?php
			
			$send=$_POST["shortcode"];
			if(empty($send)){
			
			
			
			
			}elseif($send>''){
					$shortcode=$_POST["shortcode"];
			$bank=$_POST["bank"];
				
					$use=$_POST["use"];
				$exs=$_POST["exs"];
				
				
				
mysqli_query($con,"insert into code (code,status,table1,bankname)
VALUES ('$shortcode','$exs','$use','$bank')");

echo "<script>alert('Shortcode Created Successfully!'); </script>";
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
			}
			?>
	<form action="" method="post" name="login">
			<table cellspacing='1' cellpadding='0' width='500'>
			<tr><td>Short Code</td><td><input type='text' name='shortcode' value=''></td></tr>
			
			<tr><td>Bank Name to apply</td><td><input type='text' name='bank' value=''></td></tr>
			
			<tr><td>Table of Affection</td><td><input type='text' name='use' value=''></td></tr>
			
			<tr><td>Example of Message</td><td><input type='text' name='exs' value=''></td></tr>
			
			<tr><td></td><td><input type='submit' name='send' value='Save' style='width:350px;'></td></tr>
			
			</table>
			
			</forM>
			
			
			<?php 
			
		} ?>
		
	
			</div>
		</div>
<?php } 
 
elseif($fr>="application"  && $fr<="application"){
	?><div class='box-login'>
	
		<h3>All Applicants 
		<img src='verify.jfif' height='50px' width='50px'></h3>
        	<form action="" method="post" name="login">
			<table cellpadding="0" cellspacing="0" border="0"width='500px' >
				<tr><td>
			<input type='text' name='searchs' value='' style='float:left; margin-left:-10px;'style='float:left;width:250px;'></td><td><input type='submit' value='search' style='float:left; margin-top:-2px;'></td></tr></table></div>
				</form><table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered"
				style='margin-top:-2px;'>
					<thead>
						<tr>
							<th>Amount</th>
							<th>Contact</th>
							<th>Applicant Name</th>
							<th>First Choice</th>
						
							<th>Sex</th>
							
							<th>Status</th>
							<th>highestqual</th>
							
							<th>Date</th>
						</tr>
					</thead>
					<tbody>
					<?php
					if (isset($_POST['searchs'])){
					$searchs=$_POST['searchs'];
					
					}
if(empty($search)){
	
	
	$vb="SELECT *      FROM application limit 0,50";
	
	
	
}elseif($search>''){
	
	$vb="SELECT *      FROM application where apname like '%$searchs%' or phone like '%$searchs%'";
	
}
      $query = "$vb";
		$result = mysqli_query($con,$query) or die(mysql_error());
		
    while($row = $result->fetch_assoc()) {
		?>
						<tr class="gradeX">
							<td><?php echo $row['paid'];?></td>
							<td>
								<?php echo $row['phone'];?>
								</td><td>
								<?php echo $row['apname'];?>
								</td>
							<td><?php echo $row['firstchoice'];?></td>
						
							<td><?php echo $row['sex'];?></td>
							
							
							<td><?php echo $row['status'];?></td>
							
							<td><?php echo $row['highestqual'];?></td>
							
							<td><?php echo $row['date'];?></td>
						</tr>
	<?php } ?>
					</tfoot>
				</table>
<?php }
elseif($fr>="mobile"  && $fr<="mobile"){
	?><div class='box-login'>
	
		<h3>Mobile Money Payment 
		<img src='momo.png' height='50px' width='50px'></h3>
        	<form action="" method="post" name="login">
			<table cellpadding="0" cellspacing="0" border="0"width='500px' >
				<tr><td>
			<input type='text' name='searchss' value='' style='float:left; margin-left:-10px;'style='float:left;width:250px;'></td><td><input type='submit' value='search' style='float:left; margin-top:-2px;'></td></tr></table></div>
				</form><table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered"
				style='margin-top:-2px;'>
					<thead>
						<tr>
							<th>Code</th>
							<th>Amount</th>
							<th>Contact</th>
							<th>Applicant Name</th>
						
							
							
							<th>Status of Transaction</th>
							<th>Date</th>
							
							<th>Time</th>
						</tr>
					</thead>
					<tbody>
					<?php
					if (isset($_POST['searchss'])){
					$searchss=$_POST['searchss'];
					
					}
if(empty($search)){
	
	
	$vb="SELECT *      FROM application limit 0,50";
	
	
	
}elseif($search>''){
	
	$vb="SELECT *      FROM application where  apname like '%$searchss%' or phone like '%$searchss%'or code like '%$searchss%' and (amount>='1'  and amount<='1')";
	
}
      $query = "$vb";
		$result = mysqli_query($con,$query) or die(mysql_error());
		
    while($row = $result->fetch_assoc()) {
		?>
						<tr class="gradeX">
							<td><?php echo $row['code'];?></td>
							<td><?php echo $row['paid'];?></td>
							<td>
								<?php echo $row['phone'];?>
								</td><td>
								<?php echo $row['apname'];?>
								</td>
							
							<td><?php echo $row['status'];?></td>
							<td><?php echo $row['date'];?></td>
							<td><?php echo $row['time'];?></td>
						</tr>
	<?php } ?>
					</tfoot>
				</table>
<?php }
elseif($fr>="bank"  && $fr<="bank"){
	?><div class='box-login'>
	
		<h3>View Payment from Bank
		<img src='register.png' height='50px' width='50px'></h3>
        	<form action="" method="post" name="login">
			<table cellpadding="0" cellspacing="0" border="0"width='500px' >
				<tr><td>
			<input type='text' name='searchsst' value='' style='float:left; margin-left:-10px;'style='float:left;width:250px;'></td><td><input type='submit' value='search' style='float:left; margin-top:-2px;'></td></tr></table></div>
				</form><table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered"
				style='margin-top:-2px;'>
					<thead>
						<tr>
							<th>Code</th>
							<th>Amount</th>
							<th>Contact</th>
							<th>Applicant Name</th>
						
							
							<th>Bank Name</th>
							
							<th>Status of Transaction</th>
							<th>Date</th>
							
							<th>Time</th>
						</tr>
					</thead>
					<tbody>
					<?php
					if (isset($_POST['searchsst'])){
					$searchss=$_POST['searchsst'];
					
					}
if(empty($search)){
	
	
	$vb="SELECT *      FROM application limit 0,50";
	
	
	
}elseif($search>''){
	
	$vb="SELECT *      FROM application where amount>='1' and  apname like '%$searchsst%' or phone like '%$searchsst%'or code like '%$searchsst%'or bankname like '%$searchsst%'";
	
}
      $query = "$vb";
		$result = mysqli_query($con,$query) or die(mysql_error());
		
    while($row = $result->fetch_assoc()) {
		?>
						<tr class="gradeX">
							<td><?php echo $row['code'];?></td>
							<td><?php echo $row['paid'];?></td>
							<td>
								<?php echo $row['phone'];?>
								</td><td>
								<?php echo $row['apname'];?>
								</td>
							
							<td><?php echo $row['bankname'];?></td>
							<td><?php echo $row['status'];?></td>
							<td><?php echo $row['date'];?></td>
							<td><?php echo $row['time'];?></td>
						</tr>
	<?php } ?>
					</tfoot>
				</table>
<?php }


