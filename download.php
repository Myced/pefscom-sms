<?php

error_reporting(E_ALL ^ E_NOTICE);
require 'db.php';

include("auth.php");


 			 
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=applicationlist.xls");
		
			 $rtss="ppogs.php";
 
 
 
 
 
 
 
 
 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="css/dtree.css" rel="stylesheet" />
<script src="js/jquery-2.1.1.min.js"></script>
<script src="js/dtree.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".dTree").dTree();
    });  
	
	
</script>


        <script type="text/javascript">
            function showImage(smSrc, lgSrc) {
                document.getElementById('largeImg').src = smSrc;
                showLargeImagePanel();
                unselectAll();
                setTimeout(function() {
                    document.getElementById('largeImg').src = lgSrc;
                }, 1)
            }
            function showLargeImagePanel() {
                document.getElementById('largeImgPanel').style.display = 'block';
            }
            function unselectAll() {
                if(document.selection)
                    document.selection.empty();
                if(window.getSelection)
                    window.getSelection().removeAllRanges();
            }
        </script>
<style type="text/css">
            #largeImgPanel {
                text-align: center;
                display: none;
                position: fixed;
                z-index: 100;
                top: 0; left: 0; width: 100%; height: 100%;
                background-color: rgba(100,100,100, 0.5);
            }
			#loading {
   width: 100%;
   height: 100%;
   top: 0;
   left: 0;
   position: fixed;
   display: block;
   opacity: 0.7;
   background-color: #fff;
   z-index: 99;
   text-align: center;
}

#loading-image {
  position: absolute;
  top: 100px;
  left: 240px;
  z-index: 100;
}




@import "compass/css3";

@import "compass/css3";

%base-font {
  font-family: "Roboto", "Droid Sans", sans-serif;
  font-size: 16px;
}

body {
  background: #eee;
  @extend %base-font;
}

form {
  max-width: 22em;
  margin: 3em auto;
  padding: 2em;
  background: #fff;
}

input {
  display: block;
  width: 100%;
  @extend %base-font;

  margin: 0;
  border: 0;

  @include appearance(none);
  border-radius: 0;
  outline: none;
}

// Make it Holo

$color-light: #666;
$color-lighter: #a9a9a9;
$color-active: #09c;
$color-disabled: #cecece;

$spacing-default: 12px;
$spacing-small: 8px;
$spacing-smaller: 6px;
$spacing-smallest: 2px;

@mixin holo-input-border($color: $color-active, $width: 1px, $height: $spacing-smaller) {
  $bg: linear-gradient($color, $color);
  @include background(
    bottom left $bg no-repeat,
    bottom center $bg repeat-x,
    bottom right $bg no-repeat
    );
  @include background-size(
    $width $height,
    $width $width,
    $width $height
  );
}

input {
  background: transparent;
  position: relative;
  border: none;
  @include box-sizing(border-box);
  
  padding: $spacing-small $spacing-small $spacing-smaller;

  @include holo-input-border($color-lighter);
  
  &[disabled], &.disabled {
    color: $color-lighter;
    @include holo-input-border($color-disabled);
  }
  
  &:focus {
    @include holo-input-border($color-active);
  }
}.jelly-form input[type="text"]{
  border-top: none;
  border-left: none;
  border-right: none;
  border-bottom: 2px solid #0099CC;
   
  box-sizing: border-box;
  outline: none;
   
  font-size: 1.4em;
  padding: 0.6em 0.6em;
  width: 100%;
}
        </style>
<title>GCE CONSOL MANAGEMENT SYSTEM</title>
</head>
<body >
<table>

		
		<tr><td>code</td>
		<td>amount</td>
		<td>applicant name</td>
		<td>contact</td>
	
		
		<td>sex</td>
			<td>birthdate</td>
	
		
			<td>highestqual </td>
		<td>session </td>
	
		
		<td>status</td>
		<td>date</td>
		<td>time</td>
		
		<td>bankname </td>
		</tr>
<?php
		
		
			
			
		
		
		
		
  $query = "SELECT * from application";
		$result = mysqli_query($con,$query) or die(mysql_error());
		
    while($row = $result->fetch_assoc()) {
		
		?>
		
		
		<tr>
		<td><?php echo $row["code"];?></td>
		<td><?php echo $row["paid"];?></td>
		<td><?php echo $row["apname"];?></td>
		
		<td><?php echo $row["phone"];?></td>
		
		<td><?php echo $row["sex"];?></td>
		<td><?php echo $row["birthdate"];?></td>
		
		<td><?php echo $row["highestqual"];?></td>
		<td><?php echo $row["session"];?></td>
		
		<td><?php echo $row["status"];?></td>
		
		
		<td><?php echo $row["date"];?></td>
		
		<td><?php echo $row["time"];?></td>
		
		
		<td><?php echo $row["bankname"];?></td>
		
		
		
		
		</tr>
		<?php
		
		
	}
	
	
	?>
	</table>	
</body>
</html>