<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "maritoni_db";

if (!isset($_SESSION['admin_id'])) {
    header("Location: user_profile.php");
    exit();
}

$admin_id = $_SESSION['admin_id'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['update_profile'])) {
        $email = $_POST['email'];
        $update_query = "UPDATE register_form SET email='$email' WHERE id='$admin_id'";
        if ($conn->query($update_query) === TRUE) {
            $message = "Email updated successfully!";
        } else {
            $message = "Error updating email: " . $conn->error;
        }
    }
    if (isset($_POST['update_password'])) {
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];
        if ($new_password === $confirm_password) {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $update_query = "UPDATE register_form SET password='$hashed_password' WHERE id='$admin_id'";
            if ($conn->query($update_query) === TRUE) {
                $message = "Password updated successfully!";
            } else {
                $message = "Error updating password: " . $conn->error;
            }
        } else {
            $message = "Passwords do not match!";
        }
    }
    if (isset($_POST['create_user'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Insert new user into the database
        $insert_query = "INSERT INTO register_form (email, password) VALUES ('$email', '$hashed_password')";
        if ($conn->query($insert_query) === TRUE) {
            $message = "User created successfully!";
        } else {
            $message = "Error creating user: " . $conn->error;
        }
    }
}

$query = "SELECT * FROM register_form WHERE id='$admin_id'";
$result = $conn->query($query);
$admin = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        /* Styles remain the same */
    </style>
</head>
<body>
    <div class="profile-container">
        <!-- Sidebar remains the same -->

        <div class="profile-content">
            <?php if (!empty($message)): ?>
                <div class="message"><?php echo $message; ?></div>
            <?php endif; ?>
            <h2>Edit Details</h2>
            <form method="post">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" value="<?php echo $admin['email']; ?>" class="form-control" required>
                </div>
                <button type="submit" name="update_profile" class="btn">Save</button>
            </form>
            <h2>Change Password</h2>
            <!-- Password change form remains the same -->
            
            <!-- User creation form -->
            <h2>Create User</h2>
            <form method="post">
                <div class="form-group">
                    <label for="new_email">Email Address</label>
                    <input type="email" id="new_email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="new_password">Password</label>
                    <input type="password" id="new_password" name="password" class="form-control" required>
                </div>
                <button type="submit" name="create_user" class="btn">Create User</button>
            </form>

            <!-- Back to home button remains the same -->
        </div>
    </div>
    <!-- Script remains the same -->
</body>
</html>
