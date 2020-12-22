<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'register');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = $password_1;

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	header('location: login.php');
  }
}
?>
<?php
  if (isset($_POST['login_user'])) {
      $email = mysqli_real_escape_string($db, $_POST['email']);
      $password = mysqli_real_escape_string($db, $_POST['password']);
    
      if (empty($email)) {
          array_push($errors, "email is required");
      }
      if (empty($password)) {
          array_push($errors, "Password is required");
      }
    
      if (count($errors) == 0) {
          $password = ($password);
          $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
          $search = mysqli_query($db,$query);
          $results = mysqli_fetch_assoc($search);
          $_SESSION['id'] = $results['id'];
          if (mysqli_num_rows($search) == 1) {
            if (isset($_POST['remember'])) {
              setcookie('email', $email, time()+60*60*7);
              setcookie('password', $password, time()+60*60*7); 
            }

            $_SESSION['username'] = $results['username'];
            $_SESSION['email'] = $results['email'];
            header('location: home.php');
          }else {
              array_push($errors, "Wrong Username/password combination");
           ?><?php 
          }
      }
    }

?>