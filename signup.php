<?php
require_once "config.php";
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if($_SERVER['REQUEST_METHOD'] == "POST"){
  //check if username is empty
  if(empty(trim($_POST["username"]))){
    $username_err = "Username cannot be blank";
  }
  else{
    $sql = "SELECT id FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if($stmt)
    {
      mysqli_stmt_bind_param($stmt, "s", $param_username);

      //set the value of param username
      $param_username = trim($_POST['username']);

      //try to execute this statement
      if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
        {
          $username_err = "This username is already taken";
        }
        else{
          $username = trim($_POST['username']);
        }
      }
      else{
        echo "Something went wrong :(";
      }
    }
  }

  mysqli_stmt_close($stmt);

//check for password
if(empty(trim($_POST['password']))){
  $password_err = "Password cannot be blank";
}
elseif(strlen(trim($_POST['password'])) < 5){
  $password_err = "Password cannot be less than 5 characters";
}
else{
  $password = trim($_POST['password']);
}

//check for confirm password field
if(trim($_POST['password']) != trim($_POST['confirm_password'])){
  $password_err = "Passwords should match";
}

//If there were no errors, go ahead and insert into the database
if (empty($username_err) && empty($password_err) && empty($confirm_password_err))
{
  $sql = "INSERT INTO users (username, password) VALUES(?, ?)";
  $stmt = mysqli_prepare($conn, $sql);
  if($stmt)
  {
    mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

    //Set these parameters
    $param_username = $username;
    $param_password = password_hash($password, PASSWORD_DEFAULT);

    //Try to execute the query
    if(mysqli_stmt_execute($stmt))
    {
      header("location: login.php");
    }
    else{
      echo "Something went wrong :( Cannot redirect!";
    }
  }
  mysqli_stmt_close($stmt);
}
mysqli_close($conn);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="css/styles.css">

    <title>Sign up</title>
</head>
<body>
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
  <!-- <script src="javascript/app.js"></script> -->
  
  <form action="" method = "post">
        <div class="container">
            <h1>Register</h1><br><br><br>
            <p style="font-weight: bolder;">Please fill in this form to create an account.</p>
            <hr><br><br>
    
            <label for="username"><b>Username</b></label><br><br>
            <input class = "color" type="text" placeholder="Enter username" name="username" id="uname" required><br><br>
            
            <!-- <label for="number"><b>Phone number</b></label><br><br>
            <input class = "color" type="tel" placeholder="Enter your number" name="number" id="number" required><br> -->
            
            <label for="password"><b>Password</b></label><br><br>
            <input class = "color" type="password" placeholder="Enter Password" name="password" id="psw" required><br><br>

            <label for="confirm_password"><b>Confirm Password</b></label><br><br>
            <input class = "color" type="password" placeholder="Enter Password again" name="confirm_password" id="psw" required><br><br>
    
    
            <!-- <label for="gender"><b>Gender</b></label><br>
    
            <input type="radio" id="male" name="gender" value="Male">
            <label for="male">Male</label><br>
            <input type="radio" id="female" name="gender" value="Female">
            <label for="female">Female</label><br>
            <p id ="gender_op"></p>

    
            <br><label for="accounttype">Type of account:</label><br>
    
            <select name="accounttype" id="accounttype">
                <option value="user">User Account</option>
                <option value="member">Member Account</option>
            </select> -->
    
            <br><br><p>By creating an account you agree to our <a class="terms" href="#">Terms & Privacy</a>.</p><br>
            <button type="submit" class="registerbtn">Register</button>
            
        </div>
    </form>
    
    <script src="javascript/signup.js"></script>
</body>
</html>
