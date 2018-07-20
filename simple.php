<?php
require 'db.php';

include("auth.php");


?>
		
		<!DOCTYPE html>
<html lang="en">
<head>
		<link rel="stylesheet" href="bootstrap.min.css">
		<link rel="stylesheet" href="css/datatables/datatables.css">

</head>
<body>

		<div id="wrap">
			<div class="container">
				<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
					<thead>
						<tr>
							<th>Rendering engine</th>
							<th>Browser</th>
							<th>Platform(s)</th>
						
						</tr>
					</thead>
					<tbody>
					<?php
					

        $query = "SELECT cname as id,phone,examcode      FROM cont limit 0,20 ";
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
		<script src="jquery.min.js"></script>
		<script src="bootstrap.min.js"></script>
		<script src="jquery.dataTables.min.js"></script>
		<script src="js/datatables/datatables.js"></script>
		<script type="text/javascript">
		$(document).ready(function() {
			$('.datatable').dataTable({
				"sPaginationType": "bs_four_button"
			});	
			$('.datatable').each(function(){
				var datatable = $(this);
				// SEARCH - Add the placeholder for Search and Turn this into in-line form control
				var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
				search_input.attr('placeholder', 'Search');
				search_input.addClass('form-control input-sm');
				// LENGTH - Inline-Form control
				var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
				length_sel.addClass('form-control input-sm');
			});
		});
		</script>



</body>
</html>

