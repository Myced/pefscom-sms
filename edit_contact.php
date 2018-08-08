<?php
include_once 'other/class.dbc.php';

$db = new dbc();
$dbc = $db->get_instance();

if(isset($_POST['name']))
{
	//get the form details
	$roll = $_POST['roll'];
	$name = $_POST['name'];
	$group  = $_POST['group'];

	$cont=$_POST['contact'];

	$contact = str_replace('+', '', $cont);
	$contact = str_replace('-', '', $contact);
	$contact = str_replace(' ', '', $contact);
	$contact = str_replace(',', '', $contact);
	$contact = str_replace('(', '', $contact);
	$contact = str_replace(')', '', $contact);

	$query = "UPDATE `cont` SET `cname` = '$name',
		`phone` = '$contact', `groups` = '$group'

		WHERE `roll` = '$roll'";
	$result = mysqli_query($dbc, $query)
		or die("Cannot update contact");

	$success = "Contact Updated";
}

//gett the contact id
$id = $_GET['id'];

$query = "SELECT * FROM `cont` WHERE `roll` = '$id'";
$contact = mysqli_query($dbc, $query)
	or die("could not get the contact details");
?>

<html>
	<head>
		<title>
			Edit Contact
		</title>
		<link rel="stylesheet" href="bootstrap.min.css">
		<script src="jquery.min.js"></script>
		<script src="jquery.mask.js"></script>
		<script>
		$(document).ready(function(){
			$("#contact").mask("+237 - 000-000-000");
		})
		</script>
	</head>

	<body>
		<div class="container-fluid">
			<h2 class="page-header">
				Edit Contact
			</h2>

			<div class="row">
				<div class="col-md-12">
					<?php
					while($row = mysqli_fetch_array($contact))
					{
						?>
					<form method="post" action="edit_contact.php?id=<?php echo $id; ?>"
						class="form-horizontal">
						<div class="form-group">
							<label class="control-lable col-xs-4">
								Name
							</label>
							<div  class="col-xs-8">
								<input type="hidden" value="<?php echo $id; ?>" name="roll">
								<input type="text" name="name" class="form-control"
									   value="<?php echo $row['cname']; ?>">
							</div>
						</div>

						<div class="form-group">
							<label class="control-lable col-xs-4 ">
								Contact
							</label>
							<div  class="col-xs-8">
								<input type="text" name="contact" class="form-control" id="contact"
									   value="<?php echo $row['phone']; ?>">
							</div>
						</div>

						<div class="form-group">
							<label class="control-lable col-xs-4">
								Group
							</label>
							<div  class="col-xs-8">
								<select name="group" class="form-control">
									<?php
									$query = "SELECT * FROM `groups`";
									$res = mysqli_query($dbc, $query);

									while($r = mysqli_fetch_array($res))
									{
										?>
									<option value="<?php echo $r['roll']; ?>"
										<?php
										if($row['groups'] == $r['roll'])
										{
											echo 'selected';
										}
										?>
										>
										<?php echo $r['groupname']; ?>
									</option>
										<?php
									}
									?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="control-lable col-xs-4">

							</label>
							<div  class="col-xs-8">
								<input type="submit" name="submit" value="Update Contact" class="btn btn-primary">
								<a class="btn btn-success" href="contact_list.php">Contact List</a>
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
