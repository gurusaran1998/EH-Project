<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<div class="loginbox">
	  
  	<h1>Login to your account</h1>
  
  <form method="post" action="login.php">
  		<?php include('errors.php'); ?>
  	
  		<h3>E-mail</h3>
  		<input type="text" id="email" name="email" class="input-box" placeholder="Enter Your E-mail" >
  		<h3>Password</h3>
  		<input type="password" id="password" class="input-box" name="password" placeholder="Enter Your Password"><br>
		
		<h3><span><input type="checkbox" name="remember" value="1" ></span>Remember me</h3>
		
  		<button type="submit" class="btn" name="login_user">Login</button>
		  
  </form>
  </div>
</body>
</html>


<?php
	if(isset($_COOKIE['email']) and isset($_COOKIE['password'])) {
		$email = $_COOKIE['email'];
		$password= $_COOKIE['password'];

		echo "<script>
			document.getElementById('email').value = '$email';
			document.getElementById('password').value = '$password';
		</script>";
	}
?>