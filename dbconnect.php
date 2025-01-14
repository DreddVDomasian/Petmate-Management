<?php
    $con = mysqli_connect("localhost", "root", "", "pet_management");
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (!mysqli_select_db($con, "pet_management")) {
        die("Database selection failed: " . mysqli_error($con));
    }

?>