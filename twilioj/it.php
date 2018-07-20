<!DOCTYPE html>
<html>
<head>
    <title>Demo: Lazy Loader</title>
    <script src="jquery-3.2.1.min.js"></script>
    <style>
      body {
 font-family: Arial;   
}

.excontainer {
  padding: 1em;    
}

label {
 display: block;
 width: 100%;   
}

p {
 padding: .5em;   
}

a, a:visited {
 color: #2d9afd;   
}

.changed {
  color: #ff0099;   
}

.highlight {
  background: #faffda;   
}

.entered {
  color: #f5560a;
}

.green {
 color: #7fbf38;   
}

.hellomouse, .clickable, #foo, #event {
 cursor: pointer;   
}

button {
 margin-bottom: 1em;   
}

div {
  margin: 1em 0;   
}

#foo {
 display: inline-block;   
}



ul {
 margin: 1em 0;   
}

.form, form, .stuff, .morestuff, stuff3 {
    margin: 1em 0;
    padding: 1em;
    background: #ececec;
}

input {
 font-size: 1.1em;
 padding: 2px;    
}

.placeholder {
   color: #ff0099;  
   font-weight: normal; 
}

::-webkit-input-placeholder {
   color: #cccccc;
}

:-moz-placeholder {  
   color: #cccccc;  
}

:-ms-input-placeholder {
    color: #cccccc;
}

:focus::-webkit-input-placeholder {
    color:transparent;
}

.content {
    margin-top: 5px;
    padding: 1em;
    background: #eeeeee;     
}
    </style>
    <script>
	// learn jquery ajax 
// http://net.tutsplus.com/tutorials/javascript-ajax/5-ways-to-make-ajax-calls-with-jquery/

// no need to specify document ready

   
    var ajax_load = "<img src='http://automobiles.honda.com/images/current-offers/small-loading.gif' alt='loading...' />";
    
    // load() functions
     var loadUrl = "loaddatass.php";
  function loadmore()
{
       
  $("#result").html(ajax_load).load(loadUrl);
    }
// end  

    </script>
</head>
<body onload='loadmore()'>
<div class="excontainer">
    <div id="result"></div>
 
</div>



