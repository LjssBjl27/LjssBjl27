<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "maritoni_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM inquiries WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $message = "Inquiry with ID $id deleted successfully.";
        $type = "success";
    } else {
        $message = "Error deleting inquiry: " . $conn->error;
        $type = "error";
    }

    $stmt->close();
} else {
    $message = "No inquiry ID provided.";
    $type = "error";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Inquiry</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Delete Inquiry</h2>
        <?php if (isset($message)): ?>
            <div class="alert alert-<?php echo $type; ?>" role="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        <a href="admin_dashboard.php" class="btn btn-primary">Back to Dashboard</a>
    </div>
</body>
</html>
