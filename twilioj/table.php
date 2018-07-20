<html>
<head>
    <script src="jquery-1.8.2.min.js"></script>
</head>
<body onload="save()">

<script type="text/javascript" language="Javascript">
	
function save()
{
	var loadUrl = "processpayment.php";

		
	//load a url with ajax get 
	$.get("processpayment.php", function(data, status){
		if(data === "refresh")
		{
			//refresh the page
			//window.location.reload(true);
			console.log("colling back function ");
			//save();
		}
	});
	
}	
 
 </script>
<div id='result'>
</div>
</body>
</html>