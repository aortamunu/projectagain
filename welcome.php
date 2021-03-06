<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true)
{
    header("location: login.php");

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <title>Adopt Me</title>
</head>
<body>
  <!-- Load an icon library to show a hamburger menu (bars) on small screens -->

<div class="topnav" id="myTopnav">
  <a class="logo" href="index.php"><b>Adopt Me</b></a>
  <a href="adopt.php" class="all">Adopt</a> <!-- if you want to adopt animals, click here -->
  <a href="learn.php" class="all">Learn</a> <!-- if you want to learn about animals, click here -->
  <a href="foster.php" class="all">Foster</a> <!-- if you want to foster animals in need, click here -->
  <a href="share.php" class="all">Share</a> <!-- if you want to share about your ideas related to animals, click here -->
  <a class="loggedin" href="#"><?php echo "Hey ". $_SESSION['username']?><?php echo " :)"?> <img class="usericon"src="https://img.icons8.com/metro/26/000000/user-male-circle.png"/></a>
  <!-- <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a> -->
</div>
  <script src="javascript/app.js"></script>
</body>
</html>