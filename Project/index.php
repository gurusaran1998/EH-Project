
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

	<div class="header">
		<h2>Home Page</h2>
	</div>
	<div class="input-group">
			<p>Welcome </p>
			<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>

		<p>Comment box<p>
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
		<form action="comment.php" method="POST">
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
				<tr><td colspan="2"><input type="submit" name="submit" value="Comment"></td></tr>
			</table>
		</form>	
	</div>
</body>
</html>