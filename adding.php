<?php
    session_start();
    if (!isset($_SESSION['username'])) {

        header("Location: login.php");
        exit();
    }
    
    include("dbconnect.php");
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $Ownername = $_POST['Ownername'];
        $PetName = $_POST['PetName'];
        $Species = $_POST['Species'];
        $Breed = $_POST['Breed'];
        $PhoneNumber = $_POST['PhoneNumber'];

        $sql = "INSERT INTO petlists (Ownername, PetName, Species, Breed, PhoneNumber) 
                VALUES ('$Ownername', '$PetName', '$Species', '$Breed', '$PhoneNumber')";

        if (mysqli_query($con, $sql)) {
            echo 
            "<script type='text/javascript'>alert('Details submitted successfully!');
            window.location.href = 'adding.php';
            
            </script>";
        } else {
            echo "Error: " . mysqli_error($con);
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
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Spray+Paint&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="adding.css">
    <link rel="stylesheet" href="responsive.css">
    <title>Add Pet</title>
</head>
<body>
    <div class="nav">

        <div class="back"><img class="arrow" src="back.png" alt="back" onclick="window.location.href='index.php'"></div>

        <div class="petmate"><img class="logo" src="LOGO.png" alt="logo"></div>

        <div class="notif"></div>

    </div>


    <div class="forms">
        <div class="inside">
            <div>
                <p class="header">DETAILS</p>
            </div>
            <div class="details">
                <form method="POST" action="adding.php">
                    <div class="datas">
                        <div class="labels">
                            <label for="ownerName">OWNER NAME</label>
                            <label for="petName">PET NAME</label>
                            <label for="Species">SPECIES</label>
                            <label for="Breed">BREED</label>
                            <label for="PhoneNumber">PHONE NUMBER</label>
                        </div>
                        <div class="inputs">
                            <input type="text" id="Ownername" name="Ownername" placeholder="Enter Owner Name" required>
                            <input type="text" id="PetName" name="PetName" placeholder="Enter Pet Name" required>
                            <input type="text" id="Species" name="Species" placeholder="Enter Species" required>
                            <input type="text" id="Breed" name="Breed" placeholder="Enter Breed" required>
                            <input type="tel" id="PhoneNumber" name="PhoneNumber" placeholder="Ex. 09123456789" pattern="[0-9]{11}" required>
                        </div>
                        
                    </div>
                    <div class="submit">
                        <input type="submit" value="SUBMIT">
                    </div>  
                </form>
            </div>
        </div>
    </div>
</body>
</html>