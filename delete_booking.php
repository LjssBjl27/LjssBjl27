<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "maritoni_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
        $id = $_GET['id'];

        // Prepare and bind parameter
        $stmt = $conn->prepare("DELETE FROM book_form WHERE id=?");
        $stmt->bind_param("i", $id);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Invalid request";
    }

    $conn->close();
?>
