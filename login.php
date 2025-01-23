<?php
include("dbconnect.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check if the username and password match
    $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Set a session for the logged-in user
        $_SESSION['username'] = $username;

        // Redirect to homepage
        header("Location: index.php");
        exit();
    } else {
        // Invalid credentials message
        $error = "Invalid username or password.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="login.css">
        <title>Login</title>
    </head>
    <body>
        <div class="container">
            <div class="pic">
                <img class="logo" src="LOGO.png" alt="logo">
            </div>

            <div class="details">
                <form method="POST" action="">
                    <div>
                        <label for="username">Username</label>
                    </div>
                    <div class="input-container">
                        <i><img class="userpic" src="username.png" alt=""></i>
                        <input type="text" name="username" id="username" placeholder="Enter Username" required>
                    </div>

                    <div class="passlabel">
                        <label for="password">Password</label>
                    </div>
                    <div>
                        <i><img class="passpic" src="lock.png" alt=""></i>
                        <input type="password" name="password" id="password" placeholder="Enter Password" required>
                    </div>
                    <div class="forgot">
                        <p>Forgot Password?</p>
                        <p>Register</p>
                    </div>
                    <?php if (isset($error)) { ?>
                        <p style="color: red;"><?= $error ?></p>
                    <?php } ?>
                    <div class="login">
                        <button type="submit">LOG IN</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
