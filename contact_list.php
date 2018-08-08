<?php
include_once 'other/class.dbc.php';

define('RESULTS_PER_PAGE', 200);

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

	$query = "SELECT * FROM `cont` WHERE `groups` = '$group' ";
	$result = mysqli_query($dbc, $query)
		or die("Error");
	$total = mysqli_num_rows($result);

	//now generate the starting page
	if(isset($_GET['page']))
	{
		$page_number = $_GET['page'];
	}
	else {
		$page_number = 1;
	}

	$number_of_pages = ceil($total / RESULTS_PER_PAGE);

	//now determine the number of pages
	$pages = ceil($total / (RESULTS_PER_PAGE));
	//starting limit fro query
	$start = ($page_number - 1) * RESULTS_PER_PAGE;
	$end = RESULTS_PER_PAGE;



 	$query = "SELECT * FROM `cont` WHERE `groups` = '$group' LIMIT $start, $end ";
}
else
{
	$query = "SELECT * FROM `cont` ";
	$result = mysqli_query($dbc, $query)
		or die("Error");
	$total = mysqli_num_rows($result);

	//now generate the starting page
	if(isset($_GET['page']))
	{
		$page_number = $_GET['page'];
	}
	else {
		$page_number = 1;
	}

	//now determine the number of pages
	$pages = ceil($total / (RESULTS_PER_PAGE));
	//starting limit fro query
	$start = ($page_number - 1) * RESULTS_PER_PAGE;
	$end = RESULTS_PER_PAGE;

	$number_of_pages = ceil($total / RESULTS_PER_PAGE);

 	$query = "SELECT * FROM `cont` LIMIT $start, $end ";
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
		<div class="container">
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
							$group = $_GET['group'];

							foreach($groups as $key => $value)
							{
								?>
							<option value="<?php echo $key; ?>"
								<?php if($group == $key) { echo 'selected'; } ?> >
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

			<br>
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					Showing Results
					<?php
					echo $start+1 . ' to ' . $page_number * RESULTS_PER_PAGE . ' / ' . $total;
					?>
				</div>
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

						$count = $start +1;

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
								<a href="contact_list.php?<?php if(isset($_GET['group'])) { echo 'group=' . $_GET['group'] . '&'; } ?>id=<?php echo $row['roll']; ?>&action=del"
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

			<div class="row">
				<div class="col-md-12">
					<div class="pull-right">
						<ul class="pagination">
							<?php
							if($page_number == 1)
							{

							}
							else {
								?>
								<li class="previous">
									<a href="contact_list.php?page=<?php echo $page_number-1; ?><?php if(isset($_GET['group'])) { echo '&group=' . $group;  } ?>">
										Prev
									</a>
								</li>
								<?php
							}
							 ?>


							<?php

							if($pages <= 20)
							{
								for($i = 1; $i <= $pages; $i += 1)
								{
									?>
								<li class="
								<?php
								if($page_number == $i)
								{
									echo 'active';
								}
								?>
								">
									<a href="contact_list.php?page=<?php echo $i; ?><?php if(isset($_GET['group'])) { echo '&group=' . $group;  } ?>"
										>
										<?php echo $i; ?>
									</a>
								</li>
									<?php
								}
							}
							else {

								//first show the first result
								?>
								<li class="<?php if($page_number == 1) echo 'active'; ?>" >
									<a href="contact_list.php?page=1<?php if(isset($_GET['group'])) { echo '&group=' . $group;  } ?>"
										>
										1
									</a>
								</li>
								<?php

								//get the page number and see how it goes
								if($page_number % 10 == 0)
								{
									$link_start = $page_number;
									$link_end = $page_number + 10;

									if($link_end >= $pages)
									{
										$link_end = $pages;
									}
								}
								else {
									$link_end = ceil($page_number / 10) * 10;
									$link_start = $link_end - 10;

									if($link_end >= $pages)
									{
										$link_end = $pages;
									}
								}


								for($i = 0; $i <= $pages; $i += 10)
								{
									//if its 1 or zero then don't show it
									if($i == 0 || $i == 1)
									{
										//if its the link start then show the links
										if($i == $link_start)
										{
											//now loop just with this period
											for($j = $i; $j <= $link_end; $j++)
											{
												if($j == 1 || $j == 0 || $j == 10)
												{
													continue;
												}


												?>
											<li class="
												<?php
												if($page_number == $j)
												{
													echo 'active';
												}
												?>
												"
											>
												<a href="contact_list.php?page=<?php echo $j; ?><?php if(isset($_GET['group'])) { echo '&group=' . $group;  } ?>" >
													<?php echo $j; ?>
												</a>
											</li>
												<?php
											}
										}
									}
									else {

										//if the page is within the links then show them
										if($i == $link_start)
										{
											//now loop just with this period
											for($j = $i; $j <= $link_end; $j++)
											{
												?>
											<li class="
												<?php
												if($page_number == $j)
												{
													echo 'active';
												}
												?>
												"
											>
												<a href="contact_list.php?page=<?php echo $j; ?><?php if(isset($_GET['group'])) { echo '&group=' . $group;  } ?>" >
													<?php echo $j; ?>
												</a>
											</li>
												<?php
											}

											//then fast forward the $i
											$i =  $i + 20;
										}


										?>

										<?php
										if($i <= $pages)
										{
											?>
										<li class="
											<?php
											if($page_number == $i)
											{
												echo 'active';
											}
											?>
											"
										>
											<a href="contact_list.php?page=<?php echo $i; ?><?php if(isset($_GET['group'])) { echo '&group=' . $group;  } ?>" >
												<?php echo $i; ?>
											</a>
										</li>
											<?php
										}
										?>

										<?php
									}//end of else statement

								}//end of the for loop
							}


							 ?>


							 <?php
							 if($page_number >= $pages)
							 {

							 }
							 else {
								 ?>
							 <li class="Next">
 								<a href="contact_list.php?page=<?php echo $page_number+1; ?><?php if(isset($_GET['group'])) { echo '&group=' . $group;  } ?>">Next</a>
 							</li>
								 <?php
							 }
							  ?>

						</ul>
					</div>
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
