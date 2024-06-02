<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "maritoni_db";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, description, image_url, price FROM packages";
$result = $conn->query($sql);

$packages = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $packages[] = $row;
    }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($packages);
?>
