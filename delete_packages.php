<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "maritoni_db";


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$response = array();

if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    
   
    $sql = "SELECT * FROM packages WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
       
        $row = $result->fetch_assoc();
        
      
        $sql_delete = "DELETE FROM packages WHERE id = ?";
        $stmt_delete = $conn->prepare($sql_delete);
        $stmt_delete->bind_param("i", $id);
        if ($stmt_delete->execute()) {
            $response = array(
                'status' => 'success',
                'message' => 'Package deleted successfully.'
            );
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Error deleting package: ' . $conn->error
            );
        }
    } else {
        $response = array(
            'status' => 'error',
            'message' => "No package found with ID: $id"
        );
    }
} else {
    $response = array(
        'status' => 'error',
        'message' => 'Invalid package ID'
    );
}


$conn->close();


echo json_encode($response);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Package</title>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<script>
   
    var response = <?php echo json_encode($response); ?>;

    
    if (response.status === 'success') {
        Swal.fire({
            title: 'Success',
            text: response.message,
            icon: 'success',
            confirmButtonText: 'OK'
        }).then((result) => {
           
            if (result.isConfirmed) {
                window.location.href = 'packages.php';
            }
        });
    } else {
        Swal.fire({
            title: 'Error',
            text: response.message,
            icon: 'error',
            confirmButtonText: 'OK'
        });
    }
</script>
</body>
</html>
