<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>

<div class="content">
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
      <?php endif ?>
      
<!DOCTYPE html>
<html>
<head>
    <title>Homepage</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    
</head>
<body>
    
    <header>
        <div>
			<h2 class="homepage">Home Page</h2>
			<<h2 class="heading">EH Project</h2>
            <ul>
            <li><a href="logout.php">Logout</a></li>
            <li><a href="comments.php">Comments</a></li>
            <li><a href="profile.php">Profile</a></li>
            </ul>
		</div>

		<div class="center_content">Welcome <?php echo $_SESSION['username']; ?></div>


        <div class="search-position searchbox">
        <form method="GET" action="search.php">

                <input type="text" name="search" class="search" placeholder="Search for other members">
				<input type="submit" name="submit" class="btn" value="Search">
				

        </form>
        </div>
    </header>

</body>
</html>
