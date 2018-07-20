<html>
<head>
    <script src="jquery-1.8.2.min.js"></script>
</head>
<body onload="save()">
    <script type="text/javascript" language="Javascript">
  var loadUrl = "twilioj/processpayment.php";
$(window).load(function save(){
   
        $.get("twilioj/processpayment.php", function(data, status){
           
     
     var loadUrl = "table.php";
         if (data === "refresh") {
          window.location.reload(true);
        }   
	 
	 
	 
	 
	 
	 
	 
	 
    });
	
	
	
	
	
	
	
	
	
	

});
 </script>
<div id='result'>
</div>
</body>
</html>