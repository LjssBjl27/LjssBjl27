<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    
    <style>
        /* CSS styles for the header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color:rgba(73, 171, 204, 0.914);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .logo {
            width: 100px; 
            height: auto; 
        }

        .header-icons {
            display: flex;
            align-items: center;
        }

        .icon {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            object-fit: cover;
            margin-left: 10px;
        }

    </style>
</head>
<body>
    <header class="header">
        <div>
            <img src="logo.png" alt="Logo" class="logo">
        </div>
        <div class="header-icons">
            <img src="notification_icon.png" alt="Notification" class="icon">
            <img src="message_picture.png" alt="Message" class="icon">
            <img src="profile (2).jpg" alt="Profile" class="icon">
        </div>
    </header>

    
    <script>
        function logout() {
            window.location.href = "index.php";
        }
    </script>
</body>
</html>
