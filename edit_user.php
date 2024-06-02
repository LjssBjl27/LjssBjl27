<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit User</title>
<style>
    
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        background-color: #f0f0f0;
    }

    .dashboard-section {
        width: 400px;
        padding: 20px;
        border-radius: 10px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .dashboard-section h2 {
        text-align: center;
        margin-top: 0;
        margin-bottom: 20px;
    }

    .dashboard-section div {
        margin-bottom: 15px;
    }

    .dashboard-section label {
        display: block;
        margin-bottom: 5px;
    }

    .dashboard-section input[type="text"],
    .dashboard-section input[type="email"],
    .dashboard-section input[type="password"],
    .dashboard-section select {
        width: calc(100% - 20px);
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .dashboard-section button[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .dashboard-section button[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>



<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "maritoni_db";


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if(isset($_GET['id']) && !empty($_GET['id'])) {
    
    $id = $_GET['id'];

   
    $query = "SELECT * FROM register_form WHERE id = $id";
    $result = $conn->query($query);

    if($result->num_rows == 1) {
       
        $row = $result->fetch_assoc();
        $fname = $row['fname'];
        $Mname = $row['Mname'];
        $lname = $row['lname'];
        $gender = $row['gender'];
        $cnum = $row['cnum'];
        $address = $row['address'];
        $email = $row['email'];
        $password = $row['password'];
    } else {
        
        header("Location: admin_dashboard.php");
        exit();
    }
} else {
   
    header("Location: admin_dashboard.php");
    exit();
}


if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $fname = $_POST['fname'];
    $Mname = $_POST['Mname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $cnum = $_POST['cnum'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];

  
    $sql = "UPDATE register_form SET fname='$fname', Mname='$Mname', lname='$lname', gender='$gender', cnum='$cnum', address='$address', email='$email', password='$password' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        
        header("Location: admin_dashboard.php?id=#manageUsers");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}


$conn->close();
?>


<section id="editUser" class="dashboard-section">
    <h2>Edit User</h2>
    <form method="POST" action="">
 
    <div>
        <label for="fname">First Name:</label>
        <input type="text" id="fname" name="fname" value="<?php echo $fname; ?>" required>
    </div>
   
    <div>
        <label for="Mname">Middle Name:</label>
        <input type="text" id="Mname" name="Mname" value="<?php echo $Mname; ?>" required>
    </div>
    
    <div>
        <label for="lname">Last Name:</label>
        <input type="text" id="lname" name="lname" value="<?php echo $lname; ?>" required>
    </div>
   
    <div>
        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="Male" <?php if($gender == "Male") echo "selected"; ?>>Male</option>
            <option value="Female" <?php if($gender == "Female") echo "selected"; ?>>Female</option>
           
        </select>
    </div>
    
    <div>
        <label for="cnum">Cellphone Number:</label>
        <input type="text" id="cnum" name="cnum" value="<?php echo $cnum; ?>" required>
    </div>
   
    <div>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="<?php echo $address; ?>" required>
    </div>
    
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
    </div>
    
    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="<?php echo $password; ?>" required>
    </div>
    

    <button type="submit">Save Changes</button>
</form>
</section>

>
</body>
</html>
