<?php
error_reporting(E_ALL ^ E_NOTICE);
header("content-text text/xml");
$number=$_POST['From'];
$body=$_POST['Body'];
$number=$_GET['From'];
$bodys=$_GET['Body'];

 $body = $int = (int) filter_var($bodys, FILTER_SANITIZE_NUMBER_INT);

if(empty($body)){
	$money="Sorry! Invalid Candidate Info:";
}elseif($body>''){


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gce";

// Create connection
$link = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}
$date=date('j/m/Y');
mysqli_query($link,"insert into tracer (phone,body ,date)
VALUES ('$number','$bodys','$date')");



$sql = "SELECT sname as id,cnumber      FROM csubjects where cnumber='$body'";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
         $candname =mysqli_real_escape_string($link, $row["id"]);
		   $sex=$row["sex"];
	  $examcode=$row["catss"];
	  if(empty($examcode)){
		  
		  
	  }elseif($examcode>="5100" && $examcode<="5100"){
		  
		  $exs="Ordinary Level General";
		  
	  }elseif($examcode>="7100" && $examcode<="7100"){
		  
		  $exs="Advanced Level General";
		  
	  }elseif($examcode>="5101" && $examcode<="5101"){
		  
		  $exs="Ordinary Level Technical";
		  
	  }elseif($examcode>="7101" && $examcode<="7101"){
		  
		  $exs="Advanced Level Technical";
		  
	  }elseif($examcode>="3600" && $examcode<="3600"){
		  
		  $exs="Probatoire De Brevet de Techniciene";
		  
	  }elseif($examcode>="3650" && $examcode<="3650"){
		  
		  $exs="Probatoire Technique";
		  
	  }elseif($examcode>="3700" && $examcode<="3700"){
		  
		  $exs="Brevet de Techniciene";
		  
	  }elseif($examcode>="3750" && $examcode<="3750"){
		  
		  $exs="Bacc Technique";
		  
	  }
  $nbsubjects=$row["nsubjects"];  $center=$row["center"];
		   $candnumber=$row["cnumber"];
  $totalp=$row["totalp"];
  $center=$row["center"];
		 $cplace=$row["cplace"]; 
		 
		  $dbirth=$row["dbirth"]; 
		 
			$money1="Name:$candname ";
		
		$money3="Sex:$sex ,";
		$money6="P.Birth:$cplace ,";$money6="D.O.B:$dbirth,  CenterNo: $center ";
		$money2="C.I.N:$candnumber , ";
	
	 
		$money="$money1 $money2";

    }
} 
else {
	$money="Invalid C.I.N or Wrong Format Sorry!";
}

  
  
  }
  
  
  ?>
  
  
  


<Response>
<Message> <?php echo $money;?>
<?php 
  
  
  if(empty($candname)){
		  
mysqli_query($link,"update tracer set delivered='$money',subjects='$passeds',status='0' where phone='$number' and body='$bodys'"); 
		  
	  }elseif($candname>""){
		  


 $sqls = "SELECT codes as id, passstatus ,grade      FROM csubjects where cnumber='$body' and sname='$candname' group by cnumber,codes,sname";
$results = $link->query($sqls);

if ($results->num_rows > 0) {
    // output data of each row
    while($row = $results->fetch_assoc()) {


$codes =$row["id"];$grade=$row["grade"];
		
		  
	echo $passeds="$codes-$grade ";
	  
	  
	  
	   }
	  
	 
mysqli_query($link,"update tracer set delivered='$money',subjects='$passeds',status='1' where phone='$number' and body='$bodys'"); 
	  
    }
} 
else {
   
}



?>
</Message>
</Response>













