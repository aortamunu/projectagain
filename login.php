<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Section</title>
  <link rel="stylesheet" href="css/loginss.css">
  <link rel="stylesheet" href="css/style.css">

</head>

<body>
  <form action="login.php" method="post">
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
      <label for="uname"><b>Username</b></label><br>
      <input class="box" type="text" placeholder="Enter username" name="uname" required><br><br>

      <label for="psw"><b>Password</b></label><br>
      <input class="boxs" type="password" placeholder="Enter Password" name="psw" required><br>
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