
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>

	
	<div class="header">
		<h2>Home Page</h2>
	</div>

	<form method="post" action="index.php">
	<div class="content">

		<!-- notification message -->
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
		
		<!-- search user information -->

		<div class="input-right">			
				<label>Search</label>
				<input type="text" name="search">
				<input type="submit" name="submit" value="search">
				<?php include('server.php') ?>
		</div> 

		<!-- logged in user information -->
		<?php  if (isset($_SESSION['username'])) : ?>
			<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
			<p> Click here to <a href="logout.php" >Logout </a></p>	
			
		<?php endif ?>
		

		<div>
			<p>Comment box</p>
			<div>
				<table id="commentTable">
					<colgroup>
						<col width="25%"/>
						<col width="75%"/>
					</colgroup>
					<thead>
						<tr>
							<th>Name</th>
							<th>Comment</th>
						</tr>
					</thead>
				</table>
			</div>

				<colgroup>
					<col widht="25%" style="vertical-align:top;"/>
					<col widht="75%" style="vertical-align:top;"/>
				</colgroup>
				<table>
					<tr>
						<td><label for="name">Name</label></td>
						<td><input type="text" name="name"/></td>
					</tr>
					<tr>
						<td><label for="comment">Comment:</label></td>
						<td><textarea name="comment" rows="10" cols="50"></textarea></td>
					</tr>
					<tr><td colspan="2"><input type="submit" name="comment" value="Comment"></td></tr>
				</table>
			</form>	
		</div>

	
</form>
	</div>


		
</body>
</html>