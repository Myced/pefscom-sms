<?php

error_reporting(E_ALL ^ E_NOTICE);
header("content-text text/xml");
$number=$_POST['From'];
$body=$_POST['Body'];
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
//$bodys="*666#";
if(empty($bodys)){
	$money="Sorry! Invalid Candidate Info:";
}elseif($bodys>''){

$date=date('j/m/Y');





			  $details=$bodys;








  $homes=strlen("$details");
	
	 $domain2=strstr($details,'-b-');

 $homess=strlen("$domain2");
 
 $rick= ($homes-$homess);
 $ricsk=$rick-3;// from 1 st character to last before -b-
  $gv=$rick+3;
 
	 $candname=substr("$details",3,$ricsk);
	
 $domain3=strstr($details,'-b-');

 $homesssss=strlen("$domain3");
 
 $domain4=strstr($details,'-c-');

 $homessss=strlen("$domain4");
 
 $second=(($homesssss-$homessss) -3);
 $gvs=($gv);
 
  $dbirth=substr("$details",$gvs,   $second);
 
 
 
 
 $domain5=strstr($details,'-c-');

 $homesssssss=strlen("$domain5");
 
 $domain6=strstr($details,'-d-');

 $homessssss=strlen("$domain6");
 
 $third=(($homesssssss-$homessssss) -3);
 $s=$second+3;
 
 $gvss=($gvs+$s);
 
	$sex=substr("$details",$gvss,   $third);
 

 
 
 
 
 $domain7=strstr($details,'-d-');

 $homessssssss=strlen("$domain7");
 
 $domain8=strstr($details,'-e-');

 $homesssssss=strlen("$domain8");
 
 $fourh=(($homessssssss-$homesssssss) -3);
 $ss=$third+3;
 
 $gvsss=($gvss+$ss);
 	$center=substr("$details",$gvsss,    $fourh);
 
 
 
 
 
 
 
 
 $domain9=strstr($details,'-e-');

 $homesssssssss=strlen("$domain9");
 
 $domain10s=strstr($details,'-f-');
if(empty($domain10s)){
	
	
  $domain10=strstr($details,'*');
	
}elseif($domain10s>''){
	
	
	
 $domain10=strstr($details,'-f-');
	
	
}
 $homesssssssb=strlen("$domain10");
 
 $fifth=(($homesssssssss-$homesssssssb) -3);
 $ss=$fourh+3;
 
   $gvssss=($gvsss+$ss);
	 $exam=substr("$details",$gvssss,    $fifth);
 if(empty($exam)){
	 
	 
	 
 }elseif(($exam>="o/l" && $exam<="o/l")  && ($center>'10000' && $center<'20000') ){
	 $regfee="8000";
	 $eaxamcode="5100";
	 $subject="1000";
	   $start="5001";
	 
 }elseif(($exam>="a/l" && $exam<="a/l")  && ($center>'10000' && $center<'20000') ){
	 $regfee="9000";
	 $eaxamcode="7100";
	  $subject="2000";$start="7001";
	 
	 
 }
 elseif(($exam>="o/l" && $exam<="o/l")  && ($center>'20000' && $center<'30000') ){
	  $regfee="8000";
	 $eaxamcode="5101";$start="5001";
	 
	  $subject="1000";
	  
	  
	 
 }elseif(($exam>="a/l" && $exam<="a/l")  && ($center>'20000' && $center<'30000') ){
	 $regfee="9000";
	 $eaxamcode="7101";$start="7001";
	 
	 $subject="2000";
	 
 }
  elseif(($exam>="o/l" && $exam<="o/l")  && ($center>'20000' && $center<'30000') ){
	 
	 $eaxamcode="5101";
	 
	 
	 
 }elseif(($exam>="pbt" && $exam<="pbt")  && ($center>='30000') ){
	 
	 $eaxamcode="3600";
	 
	 
	 
 }elseif(($exam>="pt" && $exam<="pt")  && ($center>='30000') ){
	 
	 $eaxamcode="3650";
	 
	 
	 
 }elseif(($exam>="bt" && $exam<="bt")  && ($center>='30000') ){
	 
	 $eaxamcode="3700";
	 
	 
	 
 }elseif(($exam>="bacc" && $exam<="bacc")  && ($center>='30000') ){
	 
	 $eaxamcode="3750";
	 
	 
	 
 }
 
 
 $domain10=strstr($details,'-f-');
if(empty($domain10)){
	
	
 $domain10=strstr($details,'*');
	
}elseif($domain10>''){
	
	
 $domain12=strstr($details,'-e-');

 $homesssssssss=strlen("$domain12");
 
 $domain13=strstr($details,'-f-');

 $homesssssssb=strlen("$domain13");
 
 $sixth=(($homesssssssss-$homesssssssb) -3);
 $ssv=$fifth+3;
 
 $gvssssu=($gvsss+$ssv);
 	$specialty=substr("$details",$gvssssu,    $sixth);
 
 
	
	
	
}
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 $domain11=strstr($details,'*');

 $homex=strlen("$domain11");

  $homes=strlen("$details");
 $fg=  ($homes-$homex);
  
  $sss=$fg+1;
 $gvsssss=$sss;
	 $exam=substr("$details",$gvsssss,   $homex);
 
$qry = mysqli_query( $link ,"select count(*)  as total
from candidategen where  examcentercode='$center' and examcode='$eaxamcode' "); 
$row = mysqli_fetch_assoc($qry); 
 $fx=$row['total']; 
 if(empty($fx)){
	 $bn=$start;
	 
 }elseif($fx>''){
	 
	  $bn=$start+$fx;
	 
	 
	 
 }
 $candnumber="$center$bn";
 
 
 
 
 mysqli_query( $link ,"insert into candidategen
 (candname,examcentercode,examcode,candnumber,specialty,sex,precisiondate,phone)
  
  
             
		 values (
			 '$candname',
			 
			 '$center',
			 '$eaxamcode',
			 '$candnumber',
			 
			 '$specialty',	
			 '$sex'		,	
			 '$dbirth'		,	
			 '$number'			 
			 )
               
              ");
 
 
 
 
 
 
 
 
 
 $pizza  = "$exam";
$pieces = explode(" ", $pizza);

			
$i = 0;
if(!empty($pieces))
{
	
	
	
	
	
	
	
 foreach($pieces as $roll)
 {
  $pieces[0]; // piece1


$qry = mysqli_query( $link ,"select pfee  as total,cost
from papers where  codes= '".$pieces[$i]."' and cats='$eaxamcode' "); 
$row = mysqli_fetch_assoc($qry); 
 $pfee=$row['total']; 
  $cost=$row['cost']; 
 
 
  mysqli_query( $link ,"insert into candidategrading  (
  
  cnumber,codes,center,cats,sname,pfee,cost)
             
			 values (
		 '".$candnumber."',
			 	
				 	 '".$pieces[$i]."'
			,
			 	
				 	 '".$center."'		 
					 
					 
				,
			 	
				 	 '".$eaxamcode."'			 
					 
					 
					 
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
 
 
 
 

$qry = mysqli_query( $link ,"select count(*) as registered
from candidategrading where  cnumber= '$candnumber' and cats='$eaxamcode' "); 
$row = mysqli_fetch_assoc($qry); 
 $registered=$row['registered']; 

$qry = mysqli_query( $link ,"select SUM(pfee +cost) as total
from candidategrading where  cnumber= '$candnumber' and cats='$eaxamcode' "); 
$row = mysqli_fetch_assoc($qry); 
 $pfeex=$row['total']; 
 $totalp=($regfee+$pfeex);
 
 
 
 
 
 
 mysqli_query( $link ,"update candidategen set totalpaid='$totalp',nbsubjects='$registered'
 where  candnumber= '$candnumber' and examcode='$eaxamcode'
               
              ");
 
 
 
 
 
 
 
 
 
 
 
}












			 
} 

  
  
  
  
  ?>
  
  
  


<Response>
<Message> 
<?php 
  


	  $query = "select candname,candnumber,sex,totalpaid,nbsubjects,examcentercode as center
from candidategen where  candnumber= '$candnumber' and examcode='$eaxamcode'";
		$rs = mysqli_query($link,$query) or die(mysqli_error());
		  while($row=mysqli_fetch_array($rs)){


 $candname=$row['candname']; 
 $candnumber=$row['candnumber']; 
		 
 $sex=$row['sex']; 
 $totalpaid=$row['totalpaid']; 
		 
 $nbsubjects=$row['nbsubjects']; 
		 
 $center=$row['center']; 
echo "CGCEB Thank you!
Canidate: $candname
Candnumber:$candnumber sex:$sex

Totalpaid:$totalpaid
center:$center

";
}
?>
</Message>
</Response>













