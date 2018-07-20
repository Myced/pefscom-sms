<html>
<head>
    <script src="jquery-1.8.2.min.js"></script>
    <script type="text/javascript" language="Javascript">
  var loadUrl = "processpayment.php";
$(window).load(function save(){
   
        $.get("processpayment.php", function(data, status){
           
     
     var loadUrl = "mobile.php";
         if (data === "refresh") {
          window.location.reload(true);
        }   
	 
	 
	 
	 
	 
	 
	 
	 
    });
	
	
	
	
	
	
	
	
	
	

});
 </script>
</head>
<body onload="save()">
<div id='result'>
</div>
</body>
</html>