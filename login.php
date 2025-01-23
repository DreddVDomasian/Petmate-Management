<?php
    include("dbconnect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="pic">
            <img class="logo" src="LOGO.png" alt="logo">
        </div>

        <div class="details">
            <div>
                <label for="username">Username</label>
            </div>
            <div class="input-container">
                <i><img src="username.png" alt=""></i>
                <input type="text" name="username" id="username" placeholder="Enter Username">
            </div>

            <div class="passlabel">
                <label for="password">Password</label>
            </div>
            <div>
                <input type="password" name="password" id="password" placeholder="Enter Password">
            </div>
            <div class="forgot">
                <p>Forgot Password?</p>
                <p>Register</p>
            </div>
            <div>

            </div>
        </div>
    </div>
    
</body>
</html>