<?php
   $conn = mysqli_connect("localhost","root","","register");
   session_start();
   $id=$_SESSION['id'];
   $query=mysqli_query($conn,"SELECT * FROM users where id='$id'");
   $row=mysqli_fetch_array($query);

?> 



<html>
<head>
<title>Profile Page</title>
<style>
    body{
    font-family: monospace;
    width: 1000px;   
    position: absolute;
    left: 20%;
    background-image: url('images/login.jpg');
    background-size: cover;
    background-attachment: fixed;

    }
    input{
        width: 40%;
        height: 5%;
        border: 1px;
        border-radius: 05px;
        padding: 8px 15px 8px 15px;
        margin: 10px 0px 15px 0px;
        box-shadow: 1px 1px 2px 1px grey;
    }
    .content{
        text-align: center;
  color:  #ffffff;
  font-family: monospace;
  font-size: 20px;
  font-weight: bold;
    }

    .btn {
  padding: 10px;
  font-size: 20px;
  color: white;
  background: #7E017F;
  border: #000000;
  border-radius: 10px;
}

</style>
</head>
<body>
    <center>
    <h1>Update Your Profile</h1>
    <div class=content>User: <?php echo $_SESSION['username']; ?></div>
    <div class=content>E-mail: <?php echo $_SESSION['email']; ?></div>
    <form action="" method="POST">
        <input type="text" name="username" placeholder="Enter Your Username"/><br/>
        <input type="text" name="email" placeholder="Enter Your E-mail"/><br/>
        
        <button type="submit" class="btn" name="update">UPDATE</button>
        
        </form>
    </center>
</body>
</html>


<?php
$conn = mysqli_connect("localhost","root","","register");



if(isset($_POST['update'])) {
    $username = $_POST['username'];

    $query = "UPDATE `users` SET username='$_POST[username]', email='$_POST[email]' WHERE username='$_POST[username]' ";
    $query_run = mysqli_query($conn,$query);

    if($query_run) {
        echo '<script type="text/javascript"> alert("Data Updated") </script>';
        header('location: login.php');

    }
    else {
        echo '<script type="text/javascript"> alert("Data Not Updated") </script>';
        
    }

}
    

?>