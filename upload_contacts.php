<?php
include_once 'other/class.dbc.php';

$db = new dbc();
$dbc = $db->get_instance();

function format_contact($contact)
{
    //first clear all the spaces from the phone number
    $pattern = '/[\s\-\.\,\/]/';
    if(preg_match($pattern, $contact))
    {
        $num = preg_filter($pattern, '', $contact);

    }
    else {
        $num = $contact;
    }

    //now set a pre number
    $pre = '237';

    return $number = $pre . $num;
}


//now process the list
if(isset($_POST['group']))
{
    //get the group
    $group = $_POST['group'];

    //now work with the excell file
    /** Include path **/
    set_include_path(get_include_path() . PATH_SEPARATOR . 'php_excel/Classes/');

    /** PHPExcel_IOFactory */
    include 'php_excell/Classes/PHPExcel/IOFactory.php';

    if(isset($_FILES['sheet']))
    {
        //thne grab the filres
        //now grab sheet options
        $sheet_location = '';
        $file_name = $_FILES['sheet']['name'];
        $tmp_name  = $_FILES['sheet']['tmp_name'];
        $file_type = $_FILES['sheet']['type'];
        $file_size = $_FILES['sheet']['size'];

        $max_file_size = 200000000000; //200Mb

        if(!empty($file_name))
        {
            //$error = "Sorry. You must upload a profile Picture";
            if($file_size > $max_file_size)
            {
                $error = "Sorry. File Size too large";
            }

            //Now validate the file format
            if($file_type == "image/jpg" || $file_type == "image/jpeg" || $file_type == "image/gif"
                    || $file_type == "image/png" || $file_type == "image/tiff" )
            {
                $error = "Sorry. Pictures are not allowed";
            }


            //picture destination
            $destination = "uploads/";
            $date_string = date("Ymdhms") . '_';
            $final_name = $date_string . $file_name;

            $sheet_location = $destination . $final_name;

            //now upload
            if(!isset($error))
            {
                if(move_uploaded_file($tmp_name, $sheet_location))
                {
                    //get the file and start working with it.

                    $inputFileName = $sheet_location;

                    $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
                    $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);


                    //now go ahead and upload the names
                    $end = count($sheetData);

                    for ($i = 2; $i <= $end; $i++)
                    {
                        //grab the values and insert
                        $name = $sheetData[$i]['B'];
                        $contact = $sheetData[$i]['C'];
                        $number = format_contact($contact);

                        if($name != '' && $contact != '')
                        {
                            //form the query
                            $query = "INSERT INTO `cont` ( `cname`, `phone`, `groups`)

                                VALUES( '$name', '$number', '$group')
                            ";

                            $result = mysqli_query($dbc, $query)
                                or die("Error" . mysqli_error($dbc));
                        }






                    }

                $success = "File Uploaded";
            }



            }
            else {
                $warning = "Sorry, Could not upload file";
            }

        }
        else
        {
            $upload = FALSE;
            $sheet_location = '';
            $error = "Sorry. No file uploaded";
        }
    }

}

?>

<html>
	<head>
		<title>
			Upload Contacts
		</title>
		<link rel="stylesheet" href="bootstrap.min.css">
	</head>

	<body>
		<div class="container">
			<h2 class="page-header">
			     Upload Contacts
			</h2>

            <?php
            if(isset($error))
            {
                ?>
            <script type="text/javascript">
                alert("Error! " + <?php echo $error ?>);
            </script>
                <?php
            }
            if(isset($success))
            {
                ?>
            <script type="text/javascript">
                alert("Successfull" + <?php echo $success; ?>);
            </script>
                <?php
            }
            ?>

			<div class="row">
				<div class="col-md-8 col-offset-2">
                    <div class="alert alert-info">
                        <strong> Tip! </strong>
                        You excel spreadsheet should be like the table below
                    </div>

                    <br>
                    <table class="table table-bordered">
                        <tr>
                            <th>S/N</th>
                            <th>Full Name</th>
                            <th>Contact</th>
                        </tr>
                        <?php

                        for($i = 1; $i <= 2; $i++)
                        {
                            ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td>John Enow</td>
                            <td>677,778,543</td>
                        </tr>
                            <?php
                        }
                         ?>
                    </table>
				</div>
			</div>

            <br>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">

                    <form class="form-horizontal" action="upload_contacts.php" method="post"
                        enctype="multipart/form-data"
                        >

                        <div class="form-group">
                            <label for="" class="control-label col-md-4">Select Group</label>
                            <div class="col-md-8">
                                <select class="form-control" name="group">
                                    <?php
                                    $query = "SELECT * FROM `groups`";
                                    $result = mysqli_query($dbc, $query);

                                    while($row  = mysqli_fetch_array($result))
                                    {

                                        ?>
                                    <option value="<?php echo $row['roll'] ?>">
                                        <?php echo $row['groupname']; ?>
                                    </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="control-label col-md-4">Upload Excel File</label>
                            <div class="col-md-8">
                                <input type="file" name="sheet" value="" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="control-label col-md-4"></label>
                            <div class="col-md-8">
                                <input type="submit" name="submit" value="Upload Contacts" class="btn btn-primary">
                            </div>
                        </div>

                    </form>
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
