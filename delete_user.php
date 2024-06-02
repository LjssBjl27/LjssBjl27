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

    
    $sql = "DELETE FROM register_form WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        
        $message = "User with ID $id deleted successfully.";
        $type = "success";
    } else {
        
        $message = "Error deleting user: " . $conn->error;
        $type = "error";
    }

    
    $stmt->close();
} else {
    $message = "No user ID provided.";
    $type = "error";
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
    <script>
        
        Swal.fire({
            title: "<?php echo ucfirst($type); ?>",
            text: "<?php echo $message; ?>",
            icon: "<?php echo $type; ?>",
            confirmButtonText: "OK"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "admin_dashboard.php";
            }
        });
    </script>
</body>
</html>
