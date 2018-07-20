<?php

//page initialisation
include_once './includes/class.dbc.php';
include_once 'includes/functions.php';
include_once 'includes/day.php';
include_once 'includes/auth.php';

$db = new dbc();
$dbc = $db->get_instance();


//generate a member id
function gen_id()
{
  //database connection;
  global $dbc;


  $query  = "select `id` from `members` ORDER BY `id` DESC LIMIT 1";
  $result = mysqli_query($dbc, $query);

  if(mysqli_num_rows($result) == 0)
  {
     return 'CHM-000001';
  }
  else
    {
        list($id) = mysqli_fetch_array($result);
        ++$id;
        $nn = "CHM-";

        if($id < 10)
        {
          $zeros = '00000';
        }
        elseif ($id < 100) {
          $zeros = '0000';
        }
        elseif ($id < 1000) {
          $zeros = '000';
        }
        elseif ($id < 10000) {
          $zeros = '00';
        }
        elseif ($id < 100000) {
          $zeros = '0';
        }
        return $nn . $zeros . $id;
    }
}

//now work with the excell file
/** Include path **/
set_include_path(get_include_path() . PATH_SEPARATOR . 'php_excel/Classes/');

/** PHPExcel_IOFactory */
include 'php_excell/Classes/PHPExcel/IOFactory.php';

//first if the file is uploadited
if(isset($_POST['upload']))
{
    //get the file and upload it
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
            $destination = "upload/files/excell/";
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
                        $member_id = gen_id();
                        $name = $sheetData[$i]['B'];
                        $gender = $sheetData[$i]['C'];
                        $tel  = $sheetData[$i]['D'];
                        $email = $sheetData[$i]['E'];
                        $occupation = $sheetData[$i]['F'];
                        $dob  = $sheetData[$i]['G'];
                        $baptism = $sheetData[$i]['H'];
                        $treet = $sheetData[$i]['I'];

                        //form the query
                        $query = "INSERT INTO `members` (`member_id`, `full_name`, `gender`,
                            `tel1`, `email`, `occupation`, `dob`, `baptism_date`, `street`)

                            VALUES( '$member_id', '$name', '$gender',
                                '$tel', '$email', '$occupation', '$dob', '$baptism', '$street'
                            )
                        ";

                        $result = mysqli_query($dbc, $query)
                            or die("Error" . mysqli_error($dbc));


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





include_once './includes/head.php';
include_once 'includes/navigation.php';

?>

<div class="wrapper">
    <div class="container-fluid">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item active">Starter</li>
                        </ol>
                    </div>
                    <h4 class="page-title">CHURCH HELP</h4>
                </div>
            </div>
        </div>

        <!-- end page title end breadcrumb -->

        <?php
            //notification goes here
            include_once './includes/notifications.php';
        ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <h1 class="page-header">
                        Upload Members List from Excell
                    </h1>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="callout callout-info">
                                <strong>Note !</strong>
                                <br>
                                Your Excell Spreadsheet must be of the following format
                                <br>
                                If there is no value for a cell, just leave it blank
                            </div>
                        </div>
                    </div>

                    <br>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>S/N</th>
                                    <th>Members Name</th>
                                    <th>Gender</th>
                                    <th>Telephone </th>
                                    <th>Email</th>
                                    <th>Occupation</th>
                                    <th>Date of Birth</th>
                                    <th>Baptism Date</th>
                                    <th>Quater / Street</th>
                                </tr>

                                <?php
                                for ($i = 1; $i <= 4; $i++)
                                {
                                    ?>
                                <tr>
                                    <td> <?php echo $i; ?> </td>
                                    <td> John Bui</td>
                                    <td>Male</td>
                                    <td>678-965-555</td>
                                    <td>john@bui.com</td>
                                    <td>Farmer</td>
                                    <td>12/12/1996</td>
                                    <td>20/10/2010</td>
                                    <td>Half Mile Limbe</td>
                                </tr>
                                    <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>

                    <br>
                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label col-md-5"> Upload File</label>
                                    <div class="col-md-7">
                                        <input type="file" name="sheet" value="" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="control-label col-md-5"> </label>
                                    <div class="col-md-7">
                                        <input type="submit" name="upload" value="Upload" class="btn btn-primary">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <a href="sample.xlsx">Download Sample Excel</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div> <!-- end container -->
</div>
<!-- end wrapper -->

<?php

include_once 'includes/footer.php';
include_once 'includes/js.php';
?>

<!--custom scripts-->

<?php
include_once 'includes/end.php';
?>
