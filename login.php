<?php 
    session_start();

    include("db.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $gmail = $_POST['email'];
        $password = $_POST['password'];
        $user_type = $_POST['user_type'];

        if(!empty($gmail) && !empty($password) && !is_numeric($gmail))
        {
            $query = "SELECT * FROM register_form WHERE email = '$gmail' AND password = '$password' AND user_type = '$user_type' LIMIT 1";
            $result = mysqli_query($con, $query);

            if($result && mysqli_num_rows($result) > 0)
            {
                $user_data = mysqli_fetch_assoc($result);
                $_SESSION['user_id'] = $user_data['id'];
                $_SESSION['user_name'] = $user_data['name'];
                $_SESSION['user_email'] = $user_data['email'];

                if($user_type == 'admin') {
                    $_SESSION['admin_id'] = $user_data['id'];
                    $_SESSION['admin_name'] = $user_data['name'];
                    $_SESSION['admin_email'] = $user_data['email'];
                    header("Location: admin_dashboard.php");
                    exit;
                } else {
                    header("Location: book.php");
                    exit;
                }
            } else {
                echo "<script type='text/javascript'> alert('Wrong username or password')</script>";
            }
        } else {
            echo "<script type='text/javascript'> alert('Invalid email or password')</script>";
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

    <link rel="stylesheet" href="style.css">
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

<style>
    body {
        background: url(loginbckgrndjpg.jpg);
        width: 100%;
        min-height: 100vh; 
        font-family: sans-serif;
        margin: 0; 
        padding: 0; 
    }

    .login {
        width: 400px;
        height: auto; 
        margin: 50px auto; 
        background: white;
        border-radius: 3px;
        padding: 30px; 
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); 
    }

    h1 {
        text-align: center;
        font-size: xx-large;
    }

    form {
        width: 100%; 
        margin-top: 20px; 
    }

    form label {
        display: block;
        margin-top: 10px; 
        font-size: 15px;
    }

    form input {
        width: calc(100% - 20px); 
        padding: 10px;
        margin-top: 5px; 
        border: 1px solid gray;
        border-radius: 6px;
        outline: none;
        text-transform: none;
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
        width: 35%;
        font-size: 16px;
        line-height: 1.5;
    }

    .select-box .arrow {
        position: absolute;
        top: 50%;
        right: 245px;
        transform: translateY(-50%);
        cursor: pointer;
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
        top: 70%;
        transform: translateY(-50%);
        cursor: pointer;
    }

    input[type="submit"] {
        width: 100%;
        height: 40px;
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
<div class="login">
    <h1>Login</h1>
    <form method="POST">
        <label>Email</label>
        <input type="email" name="email" required>
        <div class="password-toggle">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <span class="toggle-password">
                <i class="fas fa-eye" onclick="togglePasswordVisibility('password')"></i>
            </span>
        </div>
        <label>user/admin</label>        
        <div class="select-box">
            <select name="user_type"required>
                <option value="" disabled selected hidden>-SELECT-</option>
                <option value="user">user</option>
                <option value="admin">admin</option>
                </select>
            <div class="arrow">
                <i class="fas fa-chevron-down"></i>
            </div>
        </div>
        <input type="submit" value="Submit">
    </form>
    <p>Don't have an account? <a href="signup.php">Sign Up Here</a></p>
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
                <h3>quick links</h3>
                <a href="index.php"><i class="fa fa-angle-right"></i>Home</a>
                <a href="about.php"><i class="fa fa-angle-right"></i>About</a>
                <a href="packages.php"><i class="fa fa-angle-right"></i>Packages</a>
                <a href="inquiries.php"><i class="fa fa-angle-right"></i>Inquiries</a>
            </div>

            <div class="box">
                <h3>extra links</h3>
                <a href="inquiries.php"><i class="fa fa-angle-right"></i> ask questions</a>
                <a href="about.php"><i class="fa fa-angle-right"></i> about us</a>
                <a href="privacypolicy.php"><i class="fa fa-angle-right"></i> privacy policy</a>
                <a href="termsofuse.php"><i class="fa fa-angle-right"></i> terms of use</a>
            </div>

            <div class="box">
                <h3>contact info</h3>
                <a href="tel:+34604248290"><i class="fa fa-phone"></i> +34604248290 </a>
                <a href="https://gmail.com"><i class="fa fa-envelope"></i> maritonitravelandtour@gmail.com</a>
            </div>

            <div class="box">
                <h3>follow us</h3>
                <a href="https://www.facebook.com/marita.slns"><i class="fab fa-facebook-f"></i>Marita Ramirez</a>
                <a href="https://www.wcatravel.com/maritas15"><i class="fas fa-link"></i>https://www.wcatravel.com/maritas15</a>
            </div>
        </div>

        <div class="credit"> Created by <span>ABEJUELA AND SALINAS</span> | All rights reserved!</div>
    </section>
<!--footer section ends-->


</body>
</html>