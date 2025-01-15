<?php
// Include database connection
include("dbconnect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $id = $_POST['id'];
    $ownerName = $_POST['ownerName'];
    $petName = $_POST['petName'];
    $species = $_POST['species'];
    $breed = $_POST['breed'];
    $phoneNumber = $_POST['phoneNumber'];

    // Update the record in the database
    $sql = "UPDATE petlists SET ownerName = ?, petName = ?, species = ?, breed = ?, phoneNumber = ? WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sssssi", $ownerName, $petName, $species, $breed, $phoneNumber, $id);

    if ($stmt->execute()) {
        echo "Record updated successfully!";
        header("Location: view.php"); // Redirect to view page after successful update
    } else {
        echo "Error updating record: " . $stmt->error;
    }
} else {
    echo "Invalid request.";
}
?>
