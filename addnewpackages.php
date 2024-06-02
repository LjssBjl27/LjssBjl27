<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "maritoni_db";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $details = $_POST['details'];
    $price = $_POST['price'];

    // Handle file upload
    $target_dir = "uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO packages (name, description, details, image, price) VALUES ('$name', '$description', '$details', '$target_file', '$price')";

        if ($conn->query($sql) === TRUE) {
            $response = array(
                'status' => 'success',
                'message' => 'New package added successfully.'
            );
        } else {
            $response = array(
                'status' => 'error',
                'message' => "Error: " . $sql . "<br>" . $conn->error
            );
        }
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Sorry, there was an error uploading your file.'
        );
    }

    $conn->close();

    echo json_encode($response);
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Package</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: lightgrey;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 100%;
            margin: 10px auto;
            background-color: lightgrey;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            max-width: 800px;
            margin: 10px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="file"] {
            padding: 10px;
            margin-bottom: 15px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        
        <form id="packageForm" action="addnewpackages.php" method="post" enctype="multipart/form-data">
            <h2>Add New Package</h2>
            <label for="name">Package Name:</label>
            <input type="text" name="name" id="name" required><br><br>

            <label for="description">Description:</label>
            <textarea name="description" id="description" required></textarea><br><br>

            <label for="details">Details:</label>
            <textarea name="details" id="details" required></textarea><br><br>

            <label for="price">Price:</label>
            <input type="number" name="price" id="price" required><br><br>

            <label for="image">Image:</label>
            <input type="file" name="image" id="image" required><br><br>

            <input type="submit" value="Add Package">
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
        document.getElementById("packageForm").addEventListener("submit", function(event) {
            event.preventDefault();
            var form = this;
            var formData = new FormData(form);

            fetch(form.action, {
                method: form.method,
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    swal("Success", data.message, "success").then((value) => {
                        window.location.href = "packages.php";
                    });
                } else {
                    swal("Error", data.message, "error");
                }
            })
            .catch(error => {
                swal("Error", "Something went wrong!", "error");
                console.error('Error:', error);
            });
        });
    </script>
</body>
</html>
