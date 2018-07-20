<?php
include_once 'other/class.dbc.php';

$db = new dbc();
$dbc = $db->get_instance();

//get the groups and save them in an array
$query = "SELECT * FROM `groups`";
$result = mysqli_query($dbc, $query)
	or die("Error getting the groups");
	
$groups = [];

while($row = mysqli_fetch_array($result))
{
	$id = $row['roll'];
	$name = $row['groupname'];
	
	$groups["" . $id . ""] = $name;
}

//see if its necessary to delete a row
if(isset($_GET['id']))
{
	$stud  = $_GET['id'];
	
	if(isset($_GET['action']))
	{
		$action = $_GET['action'];
		
		if($action == 'del')
		{
			$query  = "DELETE FROM `cont` WHERE `roll` = '$stud'";
			$result = mysqli_query($dbc, $query);
			
			$success = "Contact Deleted";
		}
	}
}

if(isset($_GET['group']))
{
	$group = $_GET['group'];
	
	$query = "SELECT * FROM `cont` WHERE `groups` = '$group' LIMIT 200";
}
else
{
	$query = "SELECT * FROM `cont` ORDER BY `roll` DESC LIMIT 200 ";
}


//all needed data

$contacts = mysqli_query($dbc, $query)
	or die("Could not get contacts");
?>

<html>
	<head>
		<title>Contact List</title>
		<link rel="stylesheet" href="bootstrap.min.css">
	</head>
	
	<body>
		<div class="container-fluid">
			<h2 class="page-header">
				Contact List
			</h2>
			
			<div class="row">
				<?php
				
				if(isset($_GET['group']))
				{
					?>
				<div class="col-xs-12">
					<h3 class="page-header text-center">Group (<?php echo $groups[$_GET['group']]; ?>)</h3>
				</div>
					<?php
				}
				else
				{
					?>
				<div class="col-xs-12">
					<h3 class="page-header text-center">All Contacts</h3>
				</div>
					<?php
				}
				
				?>
				<form method="get" action="">
					<div class="col-xs-3"></div>
					<div class="col-xs-5">
						<select name="group" class="form-control">
							<option value="--">--SELECT GROUP--</option>
							<?php
							foreach($groups as $key => $value)
							{
								?>
							<option value="<?php echo $key; ?>">
								<?php echo $value; ?>
							</option>
								<?php
							}
							?>
						</select>
					</div>
					
					<div class="col-sx-3">
						<input type="submit" value="Filter" name="filter" class="btn btn-success">
					</div>
				</form>
			</div>
			
			<div class="row">
				<div class="col-xs-12">
					<table class="table table-bordered">
						<tr>
							<th>S/N</th>
							<th>Name</th>
							<th>Contact</th>
							<th>Group</th>
							<th>Action</th>
						</tr>
						
						<?php
						$count = 1;
						while($row = mysqli_fetch_array($contacts))
						{
							?>
						<tr>
							<td> <?php echo $count++; ?> </td>
							<td> <?php echo $row['cname']; ?> </td>
							<td> <?php echo $row['phone']; ?> </td>
							<td> <?php echo $groups[$row['groups']]; ?> </td>
							<td>
								<a href="edit_contact.php?id=<?php echo $row['roll']; ?>"
									class="btn btn-xs btn-primary">
									Edit
								</a>
								<a href="contact_list.php?id=<?php echo $row['roll']; ?>&action=del"
									class="btn btn-xs btn-danger">
									Del
								</a>
							</td>
						</tr>
							<?php
						}
						?>
					</table>
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