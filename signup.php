<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signup.css">
    <title>Document</title>
</head>
<body>
    <form action="action_page.php">
        <div class="container">
            <h1>Register</h1><br>
            <p style="font-weight: bolder;">Please fill in this form to create an account.</p>
            <hr>
    
            <label for="email"><b>Email</b></label><br>
            <input class = "color" type="text" placeholder="Enter Email" name="email" id="email" required><br><br>
            <p id="email_op"></p>
    
            <label for="psw"><b>Password</b></label><br>
            <input class = "color" type="password" placeholder="Enter Password" name="psw" id="psw" required><br><br>
    
            <label for="psw-repeat"><b>Repeat Password</b></label><br>
            <input class = "color" type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required><br>
            <hr>
    
            <label for="gender"><b>Gender</b></label><br>
    
            <input type="radio" id="male" name="gender" value="Male">
            <label for="male">Male</label><br>
            <input type="radio" id="female" name="gender" value="Female">
            <label for="female">Female</label><br>
            <p id ="gender_op"></p>

    
            <br><label for="accounttype">Type of account:</label><br>
    
            <select name="accounttype" id="accounttype">
                <option value="user">User Account</option>
                <option value="member">Member Account</option>
            </select>
    
            <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p><br>
            <button type="submit" class="registerbtn">Register</button>
            
        </div>
    </form>
    
    <script src="javascript/signup.js"></script>
</body>
</html>
