<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Register Page</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="registerbox">
  	<h1>Signup Here</h1>
  <form method="post" action="register.php">
 	 <?php include('errors.php'); ?>
  	  <h3>Username</h3>
  	  <input type="text" class="input-box" name="username" value="<?php echo $username; ?>" placeholder="Enter Username">
  	
  	  <h3>Email</h3>
  	  <input type="email" class="input-box" name="email" value="<?php echo $email; ?>" placeholder="Enter Your E-mail">
  	  <h3>Password</h3>
  	  <input type="password" name="password_1" class="input-box" placeholder="Enter Your Password">
  	  <h3>Confirm password</h3>
  	  <input type="password" name="password_2" class="input-box" placeholder="Re-Enter Your Password">

		<button type="submit" class="btn" name="reg_user">Signup</button>

  </form>
  </div>

</body>
</html>