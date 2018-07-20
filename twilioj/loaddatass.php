<html>
<head><script>
$(document).ready(function myFunction() {
	location.reload();
}
 });
</script><script>
	// learn jquery ajax 
// http://net.tutsplus.com/tutorials/javascript-ajax/5-ways-to-make-ajax-calls-with-jquery/

// no need to specify document ready

   
    var ajax_load = "<img src='http://automobiles.honda.com/images/current-offers/small-loading.gif' alt='loading...' />";
    
    // load() functions
     var loadUrl = "processpayment.php";
 function loadmore()
{
       
  $("#result").html(ajax_load).load(loadUrl);
    };
// end  

    </script>
</head>
</head>
<body >
<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student";

// Create connection
$link = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}

 $select = mysqli_query($link,"sELECT roll,age,course FROM student_info ");
 while($row = mysqli_fetch_array($select))
 {
  echo "<p class='result'>".$row['roll']."<br>".$row['age']."<br>".$row['course']."</p>";
 } 
 
?>
