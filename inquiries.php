<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contactnumber = $_POST['contactnumber'];
    $message = $_POST['message'];

   
    $conn = new mysqli('localhost', 'username', 'password', 'maritoni_db');

   
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

   
    $sql = "INSERT INTO inquiries (name, email, contactnumber, message) VALUES ('$name', '$email', $contactnumber, '$message')";

    if ($conn->query($sql) === TRUE) {
        
        $conn->close();

      
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Inquiry Submitted!',
                    text: 'We\'ll get back to you as soon as possible. In the meantime, feel free to explore our website for more information. Have a great day!',
                    icon: 'success', // Correct icon type
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'inquiries.php'; // Redirect to the inquiries page
                    }
                });
            });
        </script>";

    } else {
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Error!',
                    text: 'There was an error submitting your message. Please try again later.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });
        </script>";
      
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inquiry Form</title>

    <!-- Swiper CSS link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>

    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Custom CSS file link -->
    <link rel="stylesheet" href="style.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            max-width: 800px;
            margin: 50px auto;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }

        .form-container,
        .contact-info {
            flex: 1;
            padding: 30px;
        }

        .form-container {
            background-color: #fff;
            border-right: 1px solid #ccc;
        }

        .contact-info {
            background-color: #f0f0f0;
        }

        h2 {
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 28px;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 16px;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            text-transform: none;
        }

        textarea {
            resize: vertical;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 28px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }

        button:hover {
            background-color: #45a049;
        }

        .contact-info hr {
            border: none;
            border-top: 1px solid #ccc;
            margin: 20px 0;
        }

        .contact-info p {
            margin: 30px 0;
            font-size: 16px;
            text-transform: none;
        }

        .contact-info a {
            color: #4CAF50;
            text-decoration: none;
        }

        .contact-info a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <section class="header">
        <a href="index.php"><img src="LOGO.png" class="logo" alt="Logo"></a>
        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <a href="packages.php">Packages</a>
            <a href="inquiries.php">Inquiries</a>
        </nav>
        <div class="icons">
            <i class="fas fa-bars" id="menu-btn"></i>
            <a href="login.php"><i class="fas fa-user-circle"></i></a>
        </div>
    </section>

    <div class="container">
        <div class="form-container">
            <h2>Inquiry Form</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="contactnumber">Contact number:</label>
                <input type="text" id="contactnumber" name="contactnumber" required>
                
                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" required></textarea>
                
                <button type="submit">Submit</button>
            </form>
        </div>
        <div class="contact-info">
            <h2>Contact Information</h2>
            <hr>
            <p><strong>Phone:</strong> +34604248290</p>
            <p><strong>Email:</strong> maritonitravelandtour@gmail.com</p>
            <p><strong>Facebook:</strong> <a href="https://www.facebook.com/marita.slns">Visit our Facebook page</a></p>
        </div>
    </div>

    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>Quick Links</h3>
                <a href="index.php"><i class="fa fa-angle-right"></i> Home</a>
                <a href="about.php"><i class="fa fa-angle-right"></i> About</a>
                <a href="packages.php"><i class="fa fa-angle-right"></i> Packages</a>
                <a href="inquiries.php"><i class="fa fa-angle-right"></i> Inquiries</a>
            </div>

            <div class="box">
                <h3>Extra Links</h3>
                <a href="inquiries.php"><i class="fa fa-angle-right"></i> Ask Questions</a>
                <a href="about.php"><i class="fa fa-angle-right"></i> About Us</a>
                <a href="privacypolicy.php"><i class="fa fa-angle-right"></i> Privacy Policy</a>
                <a href="termsofuse.php"><i class="fa fa-angle-right"></i> Terms of Use</a>
            </div>

            <div class="box">
                <h3>Contact Info</h3>
                <a href="tel:+34604248290"><i class="fa fa-phone"></i> +34604248290</a>
                <a href="mailto:maritonitravelandtour@gmail.com"><i class="fa fa-envelope"></i> maritonitravelandtour@gmail.com</a>
            </div>

            <div class="box">
                <h3>Follow Us</h3>
                <a href="https://www.facebook.com/marita.slns"><i class="fab fa-facebook-f"></i> Marita Ramirez</a>
                <a href="https://www.wcatravel.com/maritas15"><i class="fas fa-link"></i> https://www.wcatravel.com/maritas15</a>
            </div>
        </div>

        <div class="credit"> created by <span>Marie Antonette and Ma. Eljoessa</span> | all rights reserved! </div>
    </section>

    <!-- Swiper JS link -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    


<!--custom js file link-->
<script src="script.js"> </script>
</body>
</html>
