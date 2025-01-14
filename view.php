<?php
    include("dbconnect.php");

    $sql = "SELECT * FROM petlists";
    $result = $con->query($sql);

    if (!$result) {
        die("Query failed: " . mysqli_error($con));
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="view.css">
    <title>View Pets</title>
</head>
<body>
    <div class="nav">

        <div class="back"><img class="arrow" src="back.png" alt="back" onclick="window.location.href='homepage.html'"></div>

        <div class="petmate"><img class="logo" src="LOGO.png" alt="logo"></div>

        <div class="notif"><img class="bell" src="bell.png" alt="notif"></div>

    </div>
    <div class="container">
        <div class="header">
            <div><p>PATIENT RECORDS</p></div>
        </div>
        <div class="innerContainer">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '
                    <div class="records">
                        <div class="details">
                            <div class="ownerName">
                                <p>' . htmlspecialchars($row['ownerName']) . '</p>
                            </div>

                            <div class="petName">
                                <p>' . htmlspecialchars($row['petName']) . '</p>
                            </div>

                            <div class="species">
                                <p>' . htmlspecialchars($row['species']) . '</p>
                            </div>

                            <div class="breed">
                                <p>' . htmlspecialchars($row['breed']) . '</p>
                            </div>

                            <div class="number">
                                <p>' . htmlspecialchars($row['phoneNumber']) . '</p>
                            </div>

                            <div class="editbtn">
                                <button>Edit</button>
                            </div>

                            <div class="removebtn">
                                <button>REMOVE</button>
                            </div>
                        </div>
                    </div>';
                }
            } else {
                echo '<p style="color: white; font-size: 20px;">No records found.</p>';
            }
            ?>
        </div>
    </div>
</body>
</html>