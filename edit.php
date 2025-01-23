<?php
session_start();
include("dbconnect.php");

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "SELECT * FROM petlists WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        die("Record not found.");
    }
} 
else {
    die("ID is required.");
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
    <title>Edit Pet</title>
</head>
<body>
    <div class="nav">

        <div class="back"><img class="arrow" src="back.png" alt="back" onclick="window.location.href='view.php'"></div>

        <div class="petmate"><img class="logo" src="LOGO.png" alt="logo"></div>

        <div class="notif"></div>

    </div>

    <div class="forms">
        <div class="inside">
            <div>
                <p class="header">UPDATE DETAILS</p>
            </div>
            <div class="details">
                <form method="POST" action="update.php">
                    <div class="datas">
                        <div class="labels">
                            <label for="ownerName">Owner's Name:</label>               
                            <label for="petName">Pet's Name:</label>        
                            <label for="species">Species:</label>
                            <label for="breed">Breed:</label>                       
                            <label for="phoneNumber">Phone Number:</label>

                        </div>
                        <div class="inputs">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
                            <input type="text" name="ownerName" id="ownerName" value="<?php echo htmlspecialchars($row['ownerName']); ?>" required>
                            <input type="text" name="petName" id="petName" value="<?php echo htmlspecialchars($row['petName']); ?>" required>
                            <input type="text" name="species" id="species" value="<?php echo htmlspecialchars($row['species']); ?>" required>
                            <input type="text" name="breed" id="breed" value="<?php echo htmlspecialchars($row['breed']); ?>" required>
                            <input type="text" name="phoneNumber" id="phoneNumber" placeholder="Ex. 09123456789" pattern="[0-9]{11}" value="<?php echo htmlspecialchars($row['phoneNumber']); ?>" required>
                        </div>
                    </div>
                    <div class="submit">
                        <input type="submit" value="UPDATE">
                    </div>
                </form>
            </div>

        </div>
    </div>
</body>
</html>
