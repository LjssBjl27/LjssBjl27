
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Packages</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="style.css">

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
<body>
    
    <div class="heading" style="background: url('image-5.jpg') no-repeat">
        <h1>Packages</h1>
    </div>
    <section class="packages">
        <h1 class="heading-title">Destinations</h1>
        <div class="read-more-container" id="packages-container">
            
            <?php
            $conn = new mysqli('localhost', 'root', '', 'maritoni_db');
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM packages";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="box">';
                    echo '<div class="image"><img src="' . $row["image"] . '" alt="' . $row["name"] . '"></div>';
                    echo '<div class="content">';
                    echo '<h3>' . $row["name"] . '</h3>';
                    echo '<p>' . $row["Description"] . '<span class="read-more-text">' . $row["details"] . '</span>';
                    echo '<a href="#" class="read-more">Read More...</a>';
                    echo '<h3>₱' . number_format($row["Price"], 2) . '</h3>';
                    echo '</p>';
                    echo '<a href="login.php" class="btn book-now" id="book-now-btn">Book Now</a>';
                    echo '</div></div>';
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
        </div>
        </section>





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


            <!--swiper js link-->
            <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>




            <!--custom js file link-->
            <script src="script.js"> </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const readMoreButtons = document.querySelectorAll('.read-more');

                readMoreButtons.forEach(function(readMoreButton) {
                    readMoreButton.addEventListener('click', function(event) {
                        event.preventDefault();
                        const readMoreText = this.parentElement.querySelector('.read-more-text');
                        if (readMoreText.style.display === 'none' || readMoreText.style.display === '') {
                            readMoreText.style.display = 'block';
                            readMoreButton.textContent = 'Read Less';
                        } else {
                            readMoreText.style.display = 'none';
                            readMoreButton.textContent = 'Read More...';
                        }
                    });
                });
            });
        </script>

    </body>
</html>
