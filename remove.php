<?php
    include("dbconnect.php");

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id'])) {
        $id = intval($_POST['id']); // Sanitize the input

        // Prepare the delete query
        $sql = "DELETE FROM petlists WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            // Redirect back to the view page
            header("Location: view.php");
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Invalid request.";
    }

    $con->close();
?>
