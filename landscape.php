
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Welcome To this page</h2>
  </div>

  <div class="input-group">
  		<label>Login</label>
      <input type="submit" value="Login" class="btn" onClick="myFunction()"/>
     <script>
       function myFunction() {
        window.location.href="login.php";
       }
     </script>
      <label>Register</label>
      <input type="submit" value="Register" class="btn" onClick="myFunction()"/>
     <script>
       function myFunction() {
         window.location.href="register.php";
       }
     </script>
  </div>
