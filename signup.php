<?php
session_start();

include("db.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $firstname = $_POST['fname'];
    $Mname = $_POST['Mname'];
    $lastname = $_POST['lname'];
    $gender = $_POST['gender'];
    $num = $_POST['cnum'];
    $address = $_POST['address'];
    $email = strtolower($_POST['email']);
    $password = $_POST['password'];
    $user_type = $_POST['user_type'];

    // Check if user_type is 'admin' before inserting into the database
    if (!empty($email) && !empty($password) && !is_numeric($email) &&
        ($user_type === 'admin' || $user_type === 'user')) {
        // Updated SQL query to use correct variable and remove single quotes around user_type
        $query = "INSERT INTO register_form (fname, Mname, lname, gender, cnum, address, email, password, user_type) VALUES ('$firstname', '$Mname', '$lastname', '$gender', '$num', '$address', '$email', '$password', '$user_type')";

        $result = mysqli_query($con, $query);

        if ($result) {
            $message = 'Registered successfully';
            // Generate JavaScript code to trigger SweetAlert
            echo "<script>
                    // Ensure the document is ready before executing the script
                    document.addEventListener('DOMContentLoaded', function() {
                        // Trigger SweetAlert
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: '$message',
                            confirmButtonText: 'OK'
                        });
                    });
                  </script>";
        } else {
            // Error handling
            $error_message = mysqli_error($con);
            echo "<script type='text/javascript'> alert('Error: $error_message')</script>";
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Form Login and Register</title>

    <!--swiper css link-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>

    <!--font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!--custom css file link-->
    <link rel="stylesheet" href="style.css">
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

      
    </head>
<body>

<!--header section starts-->

    <section class="header">
        
        <a href="index.php"><image src="LOGO.png" class="logo"></a>

        <nav class="navbar">
            <a href="index.php">home</a>
            <a href="about.php">about</a>
            <a href="packages.php">packages</a>
            <a href="inquiries.php">Inquiries</a>
        </nav>


        
    <div class="icons">
        <i class="fas fa-bars" id="menu-btn"></i>
        <a href="login.php"><i class="fas fa-user-circle"></i></a>
    </div>


    </section>
</head>

<style>
    body {
        background: url(loginbckgrndjpg.jpg);
        width: 100%;
        min-height: 100vh;
        font-family: sans-serif;
        margin: 0;
        padding: 0;
    }

    .Signup {
        width: 80%; 
        max-width: 500px; 
        margin: 50px auto;
        background: white;
        border-radius: 3px;
        padding: 20px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    h1, h4 {
        text-align: center;
        text-transform: lowercase; 
    }

    .message{
        position: sticky;
        top:0;
        margin:0 auto;
        max-width: 1200px;
        background-color: white;
        padding:2rem; 
        display:flex ;
        align-items: center;
        justify-content: space-between;
        z-index: 10000;
        gap: 1.5em;
    }

    .message span{
        font-size: 2rem;
        color: #222;
        text-transform: lowercase;
    }

    .message i{
        cursor:pointer;
        color:#5ce1ffd4;
        font-size: 2.5rem;
    }

    .message i:hover{
        transform: rotate(90deg);
    }

    form {
        width: 100%; 
        margin: 0 auto; 
        max-width: 400px; 
    }

    form label {
        display: block;
        margin-top: 20px;
        font-size: 15px;
    }

    form input {
        width: calc(100% - 20px);
        padding: 7px;
        border: 1px solid gray;
        border-radius: 6px;
        outline: none;
        text-transform:none;
    }

    .select-box {
    position: relative;
    width: 100%;
    }

    .select-box select {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-color: #fff;
        border:1px solid rgba(0, 0, 0, .5);
        border-radius: 6px;
        padding: 8px 12px;
        width: 95%;
        font-size: 16px;
        line-height: 1.5;
    }

    .select-box .arrow {
        position: absolute;
        top: 50%;
        right: 25px;
        transform: translateY(-50%);
    }

    .select-box .arrow i {
        color: #555;
    }

    .select-box select:focus {
        outline: none;
        border-color: black;
        box-shadow: black;
    }
    .password-toggle {
       position: relative;
    }

    .password-toggle input[type="password"] {
        padding-right: 30px;
    }

    .password-toggle .toggle-password {
        position: absolute;
        right: 35px;
        top: 65%;
        transform: translateY(-50%);
        cursor: pointer;
    }


    input[type="submit"] {
        width: 100%;
        height: 35px;
        margin-top: 20px;
        border: none;
        background-color: rgb(96, 210, 255);
        color: white;
        font-size: 18px;
        cursor: pointer;
        border-radius: 6px;
    }

    input[type="submit"]:hover {
        background: rgb(13, 211, 247);
    }

    p {
        text-align: center;
        padding-top: 20px;
        font-size: 15px;
    }

</style>


<body>


<div class="Signup">
    <h1>Sign Up</h1>
    <h4>It's free and only takes a minute</h4>
    <form method="POST">
        <label>First name</label>
        <input type="text" name="fname" required>
        <label>Middle name</label>
        <input type="text" name="Mname" required>
        <label>Last name</label>
        <input type="text" name="lname" required>
        <label for="gender">Gender</label>
        <div class="select-box">
            <select id="gender" name="gender" required>
                <option value="" disabled selected hidden>Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <div class="arrow">
                <i class="fas fa-chevron-down"></i>
            </div>
        </div>
        <label>Contact number</label>
        <input type="text" name="cnum" required>
        <label>Address</label>
        <input type="text" name="address" required>
        <label>Email</label>
        <input type="text" name="email" oninput="toLowerCaseEmail(this)" required>
        <div class="password-toggle">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <span class="toggle-password">
                <i class="fas fa-eye" onclick="togglePasswordVisibility('password')"></i>
            </span>
        </div>
        <label>USER</label>        
        <div class="select-box">
            <select name="user_type"required>
                <option value="" disabled selected hidden>-SELECT-</option>
                <option value="user">user</option>
                </select>
            <div class="arrow">
                <i class="fas fa-chevron-down"></i>
            </div>
        </div>
        
        <input type="submit" value="Submit">
    </form>
    <p>By clicking the Sign up button, you agree to our<br>
        <a href="">Terms and condition</a> and <a href="#">Policy Privacy</a>
    </p>
    <p>Already have an account? <a href="login.php">Login Here</a></p>
</div>
<script>
    function togglePasswordVisibility(inputId) {
        const passwordInput = document.getElementById(inputId);
        const icon = passwordInput.nextElementSibling.querySelector('i');

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = "password";
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>
<!--footer section starts-->
<section class="footer">
    <div class="box-container">

        <div class="box">
            <h3>Quick Links</h3>
            <a href="index.php"><i class="fas fa-angle-right"></i> Home</a>
            <a href="about.php"><i class="fas fa-angle-right"></i> About</a>
            <a href="packages.php"><i class="fas fa-angle-right"></i> Packages</a>
            <a href="book.php"><i class="fas fa-angle-right"></i> Book</a>
         </div>

         <div class="box">
            <h3>Extra Links</h3>
            <a href="inquiries.php"><i class="fas fa-angle-right"></i> Ask Questions</a>
            <a href="about.php"><i class="fas fa-angle-right"></i> About Us</a>
            <a href="privacypolicy.php"><i class="fas fa-angle-right"></i> Privacy Policy</a>
            <a href="termsofuse.php"><i class="fas fa-angle-right"></i> Terms of Use</a>
         </div>

         <div class="box">
                <h3>contact info</h3>
                <a href="#"><i class="fa fa-phone"></i> +34604248290 </a>
                <a href="#"><i class="fa fa-envelope"></i> ramirezton00@gmail.com </a>
            </div>

            <div class="box">
                <h3>follow us</h3>
                <a href="#"><i class="fab fa-facebook-f"></i>Marita Ramirez</a>
                <a href="#"><i class="fas fa-link"></i>https://www.wcatravel.com/maritas15</a>
            </div>

    </div>

    <div class="credit"> Created by <span>ABEJUELA AND SALINAS</span> | All rights reserved!</div>


</section>
<!--footer section ends-->
</body>
</html>