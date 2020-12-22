<?php
    $con= new mysqli("localhost","root","","register");
    //$name = $_GET['search'];
    if(isset($_GET['submit'])){
        $name =  $_GET['search'];

    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

$result = mysqli_query($con, "SELECT * FROM users WHERE username = '$name' ");

while ($row = mysqli_fetch_array($result))
{
        echo $row['username'];
        echo "<br>";
}
    }
    mysqli_close($con);
    ?>
