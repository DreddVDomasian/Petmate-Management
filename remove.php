<?php
    include("dbconnect.php");

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id'])) {
        $id = intval($_POST['id']); 

  
        $sql = "DELETE FROM petlists WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
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
