<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "maritoni_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM register_form WHERE email='$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();
        if (password_verify($password, $admin['password'])) {
            $_SESSION['admin_id'] = $admin['id'];
            header("Location: profile.php");
            exit();
        } else {
            $message = "Invalid password!";
        }
    } else {
        $message = "No user found with that email address!";
    }
}
?>
