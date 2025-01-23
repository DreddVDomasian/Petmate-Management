<?php
include("dbconnect.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password


    $checkUser  = "SELECT * FROM users WHERE username = ?";
    $stmt = $con->prepare($checkUser );
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $error = "Username already exists.";
    } else {
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("sss", $username, $email, $password);

        if ($stmt->execute()) {
            header("Location: login.php");
            exit();
        } else {
            $error = "Error: " . $stmt->error;
        }
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
    <link rel="stylesheet" href="register.css"> 
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="pic">
            <div><img onclick="window.location='login.php'" class="back" src="back.png" alt="back"></div>
            <div><img class="logo" src="LOGO.png" alt="logo"></div>
            <div></div>
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

                <div>
                    <label for="email">Email</label>
                </div>
                <div class="input-container">
                    <i><img class="emailpic" src="email.png" alt=""></i>
                    <input type="email" name="email" id="email" placeholder="Enter Email" required>
                </div>

                <div class="passlabel">
                    <label for="password">Password</label>
                </div>
                <div>
                    <i><img class="passpic" src="lock.png" alt=""></i>
                    <input type="password" name="password" id="password" placeholder="Enter Password" required>
                </div>

                <?php if (isset($error)) { ?>
                    <p style="color: red;"><?= $error ?></p>
                <?php } ?>
                
                <div class="login">
                    <button type="submit">REGISTER</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>