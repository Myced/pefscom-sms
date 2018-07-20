<?php
include_once 'other/class.dbc.php';

$db = new dbc();
$dbc = $db->get_instance();

if(isset($_POST['name']))
{
	//get the form details
	$roll = $_POST['roll'];
	$name = $_POST['name'];
	
	$query = "UPDATE `groups` SET `groupname` = '$name'
		
		
		WHERE `roll` = '$roll'";
	$result = mysqli_query($dbc, $query)
		or die("Cannot update group");
	
	$success = "Group Name Updated";
}

//gett the contact id
$id = $_GET['id'];

$query = "SELECT * FROM `groups` WHERE `roll` = '$id'";
$contact = mysqli_query($dbc, $query)
	or die("could not get the group details");
?>

<html>
	<head>
		<title>
			Edit Contact
		</title>
		<link rel="stylesheet" href="bootstrap.min.css">
	</head>
	
	<body>
		<div class="container-fluid">
			<h2 class="page-header">
				Edit Group
			</h2>
			
			<div class="row">
				<div class="col-md-12">
					<?php
					while($row = mysqli_fetch_array($contact))
					{
						?>
					<form method="post" action="edit_group.php?id=<?php echo $id; ?>"
						class="form-horizontal">
						<div class="form-group">
							<label class="control-lable col-xs-4">
								Name
							</label>
							<div  class="col-xs-8">
								<input type="hidden" value="<?php echo $id; ?>" name="roll">
								<input type="text" name="name" class="form-control"
									   value="<?php echo $row['groupname']; ?>">
							</div>
						</div>
						
						
						<div class="form-group">
							<label class="control-lable col-xs-4">
								
							</label>
							<div  class="col-xs-8">
								<input type="submit" name="submit" value="Update Group name" class="btn btn-primary">
								<a class="btn btn-success" href="adds.php?id=3">Back to Groups</a>
							</div>
						</div>
					</form>
						<?php
					}
					?>
				</div>
				
				
			</div>
			
			
		</div>
	</body>
	
	<?php
	if(isset($success))
	{
		?>
	<script>
		alert("<?php echo $success; ?>");
	</script>
		<?php
	}
	?>
	
	<script src="jquery.js"></script>
	<script src="bootstrap.js"></script>
</html>