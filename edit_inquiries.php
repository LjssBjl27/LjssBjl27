<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "maritoni_db";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $inquiry_id = $_POST['inquiry_id'];
    $new_data = $_POST['new_data'];

    
    $sql = "UPDATE inquiries SET inquiry_data = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $new_data, $inquiry_id);

    if ($stmt->execute()) {
        $message = "Inquiry updated successfully.";
        $type = "success";
    } else {
        $message = "Error updating inquiry: " . $conn->error;
        $type = "error";
    }

    
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Inquiry</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Inquiry</h2>
        <?php if (isset($message)): ?>
            <div class="alert alert-<?php echo $type; ?>" role="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="inquiry_id">Inquiry ID:</label>
                <input type="text" class="form-control" id="inquiry_id" name="inquiry_id" required>
            </div>
            <div class="form-group">
                <label for="new_data">New Inquiry Data:</label>
                <input type="text" class="form-control" id="new_data" name="new_data" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Inquiry</button>
        </form>
    </div>
</body>
</html>

<?php

$conn->close();
?>
