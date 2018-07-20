
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
 
 echo  $statusf="<meta http-equiv='refresh' content='0; url=loaddatass.php'>"; 
?>
