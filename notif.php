<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$database = "maritoni_db";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch count of unread bookings
$sql_bookings = "SELECT COUNT(*) AS unread_bookings FROM bookings WHERE status = 'unread'";
$result_bookings = $conn->query($sql_bookings);
$total_unread_bookings = 0;
if ($result_bookings && $row_bookings = $result_bookings->fetch_assoc()) {
    $total_unread_bookings = $row_bookings['unread_bookings'];
}

// Fetch count of unread inquiries
$sql_inquiries = "SELECT COUNT(*) AS unread_inquiries FROM inquiries WHERE status = 'unread'";
$result_inquiries = $conn->query($sql_inquiries);
$total_unread_inquiries = 0;
if ($result_inquiries && $row_inquiries = $result_inquiries->fetch_assoc()) {
    $total_unread_inquiries = $row_inquiries['unread_inquiries'];
}

// Close the database connection
$conn->close();

// Calculate total unread notifications
$total_notifications = $total_unread_bookings + $total_unread_inquiries;

// Return the count of unread notifications
echo $total_notifications;
?>
