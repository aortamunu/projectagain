<?php
session_start();

//check if the user is already logged in
if(isset($_SESSION['username']))
{
  header("location: welcome.php");
  exit;
}
require_once "config.php";

$username = $password = "";
$err = "";

//if request method is post
if($_SERVER['REQUEST_METHOD'] == "POST"){
  if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])))
  {
    $err = "Please enter username and password";
  }
  else{
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
  }
  if(empty($err))
  {
    $sql = "SELECT id, username, password FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $username;

    //try to execute this statement
    if(mysqli_stmt_execute($stmt)){
      mysqli_stmt_store_result($stmt);
      if(mysqli_stmt_num_rows($stmt) == 1)
        {
          mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
          if(mysqli_stmt_fetch($stmt))
          {
            if(password_verify($password, $hashed_password))
            {
              //This means the password is correct. Allow user to login.
              session_start();
              $_SESSION["username"] = $username;
              $_SESSION["id"] = $id;
              $_SESSION["loggedin"] = true;

              //Redirect user to welcome page
              header("location: welcome.php");

            }
          }
        }
  }
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Section</title>
  <link rel="stylesheet" href="css/loginss.css">
  <link rel="stylesheet" href="css/styles.css">

</head>

<body>
  <form action="" method="post">
  <div class="topnav" id="myTopnav">
    <a class="logo" href="index.php"><b>Adopt Me</b></a>
    <a href="adopt.php" class="all">Adopt</a> <!-- if you want to adopt animals, click here -->
    <a href="learn.php" class="all">Learn</a> <!-- if you want to learn about animals, click here -->
    <a href="foster.php" class="all">Foster</a> <!-- if you want to foster animals in need, click here -->
    <a href="share.php" class="all">Share</a> <!-- if you want to share about your ideas related to animals, click here -->
    <a class="signin" href="login.php">Sign in</a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
  <script src="javascript/app.js"></script>
  
  <div class="container">
      <h1>Login</h1><br><br>
      <label for="username"><b>Username</b></label><br>
      <input class="box" type="text" placeholder="Enter username" name="username" required><br><br>

      <label for="psw"><b>Password</b></label><br>
      <input class="boxs" type="password" placeholder="Enter Password" name="password" required><br>
      <span class="psw"> <a href="#">Forgot password?</a></span><br><br><br>

      <br><br><button id="login" type="submit">Login</button>
      <br><label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label><br><br><br>
      <br><br><button id= "cancelbtn" type="button"><a href="index.php">Cancel</a></button>
      <button id = "createaccount" type="button" ><a href="signup.php">New member?</a></button>

    </div>
  </form>
</body>

</html>