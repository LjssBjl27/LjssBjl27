<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "maritoni_db";

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
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
}

$query = "SELECT * FROM register_form WHERE id='$admin_id'";
$result = $conn->query($query);
$admin = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['profile_picture'])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["profile_picture"]["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
                $update_query = "UPDATE register_form SET profile_picture='$target_file' WHERE id='$admin_id'";
                if ($conn->query($update_query) === TRUE) {
                    $_SESSION['profile_picture'] = $target_file;
                    $message = "Profile picture updated successfully!";
                } else {
                    $message = "Error updating profile picture: " . $conn->error;
                }
            } else {
                $message = "Sorry, there was an error uploading your file.";
            }
        } else {
            $message = "File is not an image.";
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
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .profile-container {
            display: flex;
            max-width: 900px;
            margin: 50px auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .profile-sidebar {
            width: 300px;
            background: #f9f9f9;
            padding: 20px;
            border-right: 1px solid #e4e4e4;
            text-align: center;
            
        }
        .profile-picture {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 30px;
        }
        .profile-sidebar h3 {
            margin: 10px 0;
            color: #333;
        }
        .profile-sidebar .btn {
            display: block;
            width: 100%;
            padding: 10px;
            background: #00b4d8;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
        }
        .profile-sidebar .btn:hover {
            background: #0077b6;
        }
        .profile-content {
            padding: 20px;
            flex-grow: 1;
        }
        .profile-content h2 {
            margin-top: 0;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn {
            padding: 10px 20px;
            background: #00b4d8;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: inline-block;
            margin-top: 10px;
        }
        .btn:hover {
            background: #0077b6;
        }
        .message {
            margin-bottom: 15px;
            color: green;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <div class="profile-sidebar">
            <img src="<?php echo $admin['profile_picture'] ?: 'default-profile.jpg'; ?>" alt="Profile Picture" class="profile-picture" id="profilePicture">
            <form id="profilePicForm" method="post" enctype="multipart/form-data">
                <input type="file" name="profile_picture" id="profilePicInput" style="display: none;">
                <button type="button" class="btn" onclick="document.getElementById('profilePicInput').click();">Change Picture</button>
            </form>
            <h3><?php echo $admin['email']; ?></h3>
        </div>
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
            <form method="post">
                <div class="form-group">
                    <label for="new_password">Password</label>
                    <input type="password" id="new_password" name="new_password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
                </div>
                <button type="submit" name="update_password" class="btn">Save</button>
                <div style="text-align: center; margin-top: 20px;">
                    <a href="admin_dashboard.php" class="btn">HOME</a>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('profilePicInput').addEventListener('change', function() {
            const form = document.getElementById('profilePicForm');
            form.submit();
        });
    </script>
</body>
</html>
