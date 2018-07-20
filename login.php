<?php
/*
Author: Javed Ur Rehman
Website: http://www.allphptricks.com/
*/
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="css/style.css" />

<script src="jquery.min.js"></script>
<script src="frank.js"></script>
</head>
<body>
<?php
	require('db.php');
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){

		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);

	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username' and password = '".md5($password)."'";
		$result = mysqli_query($con,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['username'] = $username;
			header("Location: index.php"); // Redirect user to index.php
            }else{
				echo md5($password);
				echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
				}
    }else{
?>
<!--
Follow me on
------------
Codepen: https://codepen.io/mycnlz/
Dribbble: https://dribbble.com/mycnlz
Pinterest: https://pinterest.com/mycnlz/
-->

<div class='box'>
  <div class='box-form'>
    <div class='box-login-tab'></div>
    <div class='box-login-title'>
      <div class='i i-login'></div><h2>SMS APP</h2>
    </div>
    <div class='box-login'><form action="" method="post" name="login">
      <div class='fieldset-body' id='login_form'>
        <button onclick="openLoginInfo();" class='b b-form i i-more' title='Mais Informações'></button>
        	<p class='field'>
          <label for='user'>USERNAME</label>
          <input type='text' id='user' name="username" placeholder="Username" title='Username' />
          <span id='valida' class='i i-warning'></span>
        </p>
      	  <p class='field'>
          <label for='pass'>PASSWORD</label>
          <input type='password' id='pass' name="password" placeholder="Password"title='Password' />
          <span id='valida' class='i i-close'></span>
        </p>

          <label class='checkbox'>
            <input type='checkbox' value='TRUE' title='Keep me Signed in' /> Keep me Signed in
          </label>

        	<input type='submit' id='do_login' value='Sign In' title='Get Started' />
      </div>
    </div>
  </div>
  <div class='box-info'>
					    <p><button onclick="closeLoginInfo();" class='b b-info i i-left' title='Back to Sign In'></button><h3>Need Help?</h3>
    </p>
					    <div class='line-wh'></div>
    					<button onclick="" class='b-support' title='Forgot Password?'> Forgot Password?</button>
    <button onclick="" class='b-support' title='Contact Support'> Contact Support</button>
    					<div class='line-wh'></div>
    <button onclick="" class='b-cta' title='Sign up now!'> CREATE ACCOUNT</button>
  				</div>
</div>


 <div class='icon-credits'>powered by PEFSCOM SYS LTD <a href="£" title="Freepik">software Desigining</a>, <a href="" title="Budi Tanrim">Broadcasting and Tv show</a> &
 <a href="" title="Nice and Serious">Training and Developement</a></div>



 <iframe src="twilioj/table.php?id=<?php echo $_GET['id'];?>" width='790' height='0px' style='background: #87314e;border:none;margin-left:-18px;'></iframe>



<br /><br />
<?php } ?>
</LOGIN>
<script type='text/javascript'>
</script>
</body>
</html>
