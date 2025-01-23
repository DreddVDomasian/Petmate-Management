<?php
session_start();
if (!isset($_SESSION['username'])) {

    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Spray+Paint&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="responsive.css">
    <title>Pet Management System</title>
</head>
<body>
    <div class="nav">
        <div></div>
        <div class="petmate"><img class="logo" src="LOGO.png" alt="logo"></div>
        <div class="logout">
            <form action="logout.php" method="POST">
                <button type="submit"><img src="logout.png" alt=""></button>
            </form>
        </div>
    </div>
    <div class="btns">
        <div class="adding"><button class="add" onclick="window.location.href='adding.php'">ADD PET</button></div>
        <div class="view"><button class="view" onclick="window.location.href='view.php'">VIEW PETS</button></div>
    </div>
</body>
</html>

