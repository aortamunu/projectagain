<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Section</title>
  <link rel="stylesheet" href="css/login.css">
</head>

<body>
  <form action="action_page.php" method="post">

    <div class="container">
      <h1>Login</h1><br><br>
      <label for="uname"><b>Email</b></label><br>
      <input type="email" placeholder="Enter email" name="uname" required><br><br>

      <label for="psw"><b>Password</b></label><br>
      <input type="password" placeholder="Enter Password" name="psw" required>
      <span class="psw"> <a href="#">Forgot password?</a></span><br><br>

      <br><br><button id="login" type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label><br><br><br>
      <br><br><br><button id= "cancelbtn" type="button"><a href="index.php">Cancel</a></button>
      <button id = "createaccount" type="button" ><a href="signup.php">Create Account</a></button>

    </div>
  </form>
</body>

</html>