<?php

error_reporting(E_ALL ^ E_NOTICE);
header("content-text text/xml");

$number=$_GET['From'];
$bodys=$_GET['Body'];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";

// Create connection
$link = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}

//$qry = mysqli_query($link,"select details
//from online where roll='1'  "); 
//$row = mysqli_fetch_assoc($qry); 
//  $bodys=$row['details'];  

//$bodys="*666#";
if(empty($bodys)){
	$money="Sorry! Invalid Candidate Info:";
}elseif($bodys>''){

$date=date('j/m/Y');



 mysqli_query( $link ,"insert into online
 (contact,datails)
  
  
             
		 values (
		  '$number',
			 '$bodys'
			 )
               
              ");
 


			  $detailss=trim($bodys);

  $homess=strlen("$detailss");
 $detailxs=substr("$detailss",0,5);
if(empty($homess)){
	
	
}elseif($homess>="5"  && $homess<="5" ){
	$stat ="1";
$qry = mysqli_query($link,"select status
from code where code='$detailxs'  "); 
$row = mysqli_fetch_assoc($qry); 
		$buib=$row['status'];  
	
	$vc="$detailxs";
}elseif($homess>"5"   &&  ($detailxs>="*222#" &&  $detailxs<="*222#")){
		
	$vc="$detailxs";
	
		$stat ="2";
	

  
 $detailxs=substr("$detailss",0,5);
  
  
$qry = mysqli_query($link,"select table1, table2,bankname
from code where code='$detailxs'  "); 
$row = mysqli_fetch_assoc($qry); 
		$table1=$row['table1'];  
  
 	$table2=$row['table2'];  
  
 	$bank=$row['bankname'];  
  

	 $detailsx=substr("$detailss",5,$homess);
$details=trim($detailsx);
$qry = mysqli_query($link,"select paid total
from payment where extra='application'  "); 
$row = mysqli_fetch_assoc($qry); 
 $paid=$row['total'];  

$date=date('j/m/Y');
$m=date('m');
$h=date('h:i:s');


  $homes=strlen("$details");
	
$domain2=strstr($details,',b,');

 $homess=strlen("$domain2");
 
 $rick= ($homes-$homess);
 $ricsk=$rick-3;// from 1 st character to last before -b-
  $gv=$rick+3;
 
	 $candname=substr("$details",3,$ricsk);
	
 $domain3=strstr($details,',b,');

 $homesssss=strlen("$domain3");
 
 $domain4=strstr($details,',c,');

 $homessss=strlen("$domain4");
 
 $second=(($homesssss-$homessss) -3);
 $gvs=($gv);
 
  $dbirth=substr("$details",$gvs,   $second);
 
 
 
 
 $domain5=strstr($details,',c,');

 $homesssssss=strlen("$domain5");
 
 $domain6=strstr($details,',d,');

 $homessssss=strlen("$domain6");
 
 $third=(($homesssssss-$homessssss) -3);
 $s=$second+3;
 
 $gvss=($gvs+$s);
 
	$sex=substr("$details",$gvss,   $third);
 $code=  rand(10000, 100000);

 
 
 
 
 $domain7=strstr($details,',d,');

 $homessssssss=strlen("$domain7");
 
 $domain8=strstr($details,',e,');

 $homesssssss=strlen("$domain8");
 
 $fourh=(($homessssssss-$homesssssss) -3);
 $ss=$third+3;
 
 $gvsss=($gvss+$ss);
	$center=substr("$details",$gvsss,    $fourh);
 
 
 
 
 
 
 
 
 
 
 
 
 $domain17=strstr($details,',e,');

 $homes17=strlen("$domain17");
 
 $domain18=strstr($details,',f,');

 $homes18=strlen("$domain18");
 
 $fos=(($homes17-$homes18) -3);
 $ss=$fourh+3;
 
 $gvsssn=($gvsss+$ss);
		 $exams=substr("$details",$gvsssn,    $fos);
 
 
 
 
 
 
 $domain19=strstr($details,',f,');

 $homes19=strlen("$domain19");
 
 $domain20=strstr($details,',g,');

 $homes20=strlen("$domain20");
 
 $foss=(($homes19-$homes20) -3);
 $ss=$fos+3;
 
 $gvsssns=($gvsssn+$ss);
 $session=substr("$details",$gvsssns,    $foss);
 
 
 
 
 
 
 $domain21=strstr($details,',g,');

 $homes21=strlen("$domain21");
 
 $domain22=strstr($details,'*');

 $homes22=strlen("$domain22");
 
 $fosss=(($homes21-$homes22) -3);
 $ss=$foss+3;
 
 $gvsssnss=($gvsssns+$ss);
	 $choice=substr("$details",$gvsssnss,    $fosss);
 
 
 
 
 
 
 
 
 
  $domain10=strstr($details,'*');
  $homesssssssb=strlen("$domain10");
 
 $fifths=($homesssssssb );
 $ss=$fosss+1;
 
   $gv=($gvsssnss+$ss);
  $examy=substr("$details",$gv,    $fifths);
 
 
 $pizza  = "$examy";
$pieces = explode(" ", $pizza);

 
 
 
 if(empty($table1)){
 }elseif(($table1>="application"  && $table1<="application")  && ($detailxs>="*222#" && $detailxs<="*222#") ){
 
 
 mysqli_query( $link ,"insert into $table1
 (phone,apname,sex,birthdate,candnumber,highestqual,session,firstchoice,date,month,time,code,paid,status)
  
  
             
		 values (
		  '$number',
			 '$candname',
			 		 '$sex'		,	
			 '$dbirth'		,		 
			 '$center',
			 '$exams',	 
			  '$session', '$choice'
			  , '$date' , '$m', '$h','$code','$paid','Pending Transaction'
			 )
               
              ");
 
 
 }
 
 
 
 
 if(empty($table2)){
 }elseif(($table2>="candidategrading"  && $table2<="candidategrading")   && ($detailxs>="*222#" && $detailxs<="*222#")){
 
 

			
$i = 0;
if(!empty($pieces))
{
	
	
	
	
	
	
	
 foreach($pieces as $roll)
 {
  $pieces[0]; // piece1


 
 
  mysqli_query( $link ,"insert into $table2  (
  
  cnumber,codes,center,cats,sname,pfee,cost)
             
			 values (
		 '".$center."',
			 	
				 	 '".$pieces[$i]."'
			,
			 	
				 	 '".$center."'		 
					 
					 
				,
			 	
				 	 '".$exams."'			 
					 
					 
					 
				,
			 	
				 	 '".$candname."'	
					 
					 
					 
				,
			 	
				 	 '".$pfee."'	
					 
					 
				,
			 	
				 	 '".$cost."'	
					 
					 
					 
					 
		 )
               
             ");
			   
			   
			   
			   
			   
			   
			   
			   
			   
			   
			   
			   
			   
  $i++;
  
 }
 
  }
 }
 
 
 



 
 
}elseif($homess>"5"   &&  ($detailxs>="*022#" &&  $detailxs<="*022#")){
	

  
 $detailxs=substr("$detailss",0,5);
  
  
$qry = mysqli_query($link,"select table1, table2,bankname
from code where code='$detailxs'  "); 
$row = mysqli_fetch_assoc($qry); 
		$table1=$row['table1'];  
  
 	$table2=$row['table2'];  
  
 	$bank=$row['bankname'];  
	
	 $detailsx=substr("$detailss",5,$homess);
$details=trim($detailsx);
	$stat="3" ;
	

  $homes=strlen("$details");
	
$domain2=strstr($details,',b,');

 $homess=strlen("$domain2");
 
 $rick= ($homes-$homess);
 $ricsk=$rick-3;// from 1 st character to last before -b-
  $gv=$rick+3;
 
	 $code=substr("$details",3,$ricsk);
	
 $domain3=strstr($details,',b,');

 $homesssss=strlen("$domain3");
 
 $domain4=strstr($details,',c,');

 $homessss=strlen("$domain4");
 
 $second=(($homesssss-$homessss) -3);
 $gvs=($gv);
 
  $amount=substr("$details",$gvs,   $second);
 
 
 
 
 $domain5=strstr($details,',c,');

 $homesssssss=strlen("$domain5");
 
 $domain6=strstr($details,',d,');

 $homessssss=strlen("$domain6");
 
 $third=(($homesssssss-$homessssss) -3);
 $s=$second+3;
 
 $gvss=($gvs+$s);
 
	$date=substr("$details",$gvss,   $third);

$time=date('h:i:s');
 
 $date=date('j/m/Y');
 mysqli_query( $link ,"update $table1 set paid='$amount'
 ,amount='2' ,status='Bank Payment Recieved' ,bankname='$bank',date='$date',time='$time'
 where code='$code'
 
 
              ");
	
	
	
	
	
}
}

?>
		   


<Response>
<Message> 
<?php 
  
if(empty($stat)){
	
	
}elseif($stat>="2"  && $stat<="2"  ){

$qry = mysqli_query( $link ,"select apname,firstchoice ,code
from application where  phone='$number' and apname='$candname' and  birthdate='$dbirth'"); 
$row = mysqli_fetch_assoc($qry); 

 



 $candname=$row['apname'];
 $candnumber=$row['firstchoice']; 
 $code=$row['code']; 
	if(empty($candname)){
		
	}elseif($candname>''){$amount=$paid;
echo "Welconme to Biaka University!
Status:Pending,
Name:$candname,
Programe:$candnumber,
Expected Amt: $amount,
TransactionCode:$code

";
}
}elseif($stat>="1"  && $stat<="1"  ){
	if(empty($vc)){
		
		
	}elseif($vc>="*111#" && $vc<="*111#"){
	echo $buib;
	  $query = "select *
from menu order by id";
		$rs = mysqli_query($link,$query) or die(mysqli_error());
		  while($row=mysqli_fetch_array($rs)){
			  ?><?php echo $row['actives'];?> <?php echo $row['desck']; ?><?php	  
		  }
	}
	
	elseif($vc!="*111#"){
		
	echo $buib;
	}
}elseif($stat>="3"  && $stat<="3"  ){
	$qry = mysqli_query( $link ,"select apname,firstchoice ,code
from application where  code='$code'"); 
$row = mysqli_fetch_assoc($qry); 

 



 $candname=$row['apname'];
 
 
 $firstchoice=$row['firstchoice'];
 
 $code=$row['code'];
	echo "Bank Payment received at Biaka University!
Amount:$amount,
Bank Name:$bank,
Paid to:$candname,
To Study: $firstchoice,
TransactionCode:$code
	
	";
	
	
	
	
	
	
	
	
	}
	
	
?>
</Message>
</Response>


