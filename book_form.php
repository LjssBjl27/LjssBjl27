<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';


$connection = mysqli_connect('localhost', 'root', '', 'maritoni_db');


if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['send'])) {
    
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $countrycode = mysqli_real_escape_string($connection, $_POST['countrycode']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $zipcode = mysqli_real_escape_string($connection, $_POST['zipcode']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);
    $place = mysqli_real_escape_string($connection, $_POST['place']);
    $guest = mysqli_real_escape_string($connection, $_POST['guest']);
    $arrival = mysqli_real_escape_string($connection, $_POST['arrival']);
    $departure = mysqli_real_escape_string($connection, $_POST['departure']);

    $stmt = mysqli_prepare($connection, "INSERT INTO book_form (name, email, countrycode, phone, zipcode, address, place, guest, arrival, departure) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssissssss", $name, $email, $countrycode, $phone, $zipcode, $address, $place, $guest, $arrival, $departure);

       
        if (mysqli_stmt_execute($stmt)) {
          
            $mail = new PHPMailer(true);

            try {
               
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'maritonitravelandtour@gmail.com'; 
                $mail->Password = 'lwbr oois mhql eljc'; 
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port = 465;

                // Recipients
                $mail->setFrom('maritonitravelandtour@gmail.com', 'MARITONI TRAVEL AND TOUR');
                $mail->addAddress($email, $name); 
                $mail->addReplyTo('info@example.com', 'Information');

                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Booking Confirmation';
                $mail->Body    = "
                <html>
                <head>
                <title>Booking Confirmation</title>
                </head>
                <body>
                <h2>Dear " . htmlspecialchars($name) . ",</h2>
                <p>Thank you for choosing MARITONI TRAVEL AND TOURS! Your booking has been successfully submitted. Here are your booking details:</p>
                <table>
                <tr><th>Place</th><td>" . htmlspecialchars($place) . "</td></tr>
                <tr><th>Guests</th><td>" . htmlspecialchars($guest) . "</td></tr>
                <tr><th>Arrival</th><td>" . htmlspecialchars($arrival) . "</td></tr>
                <tr><th>Departure</th><td>" . htmlspecialchars($departure) . "</td></tr>
                </table>
                <p>We will process your booking and get back to you shortly. Please do not hesitate to contact us if you have any questions.</p>
                <p>Best regards,<br>MARITONI TRAVEL AND TOURS</p>
                </body>
                </html>";

             
                $mail->send();

               
                echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
                echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            title: 'Thank you for choosing MARITONI TRAVEL AND TOUR!',
                            html: 'Your booking has been successfully submitted. We have sent a confirmation email to <strong>$email</strong>. Please check your inbox for further details!',
                            icon: 'success',
                            confirmButtonText: 'Back to Home'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'index.php';
                            }
                        });
                    });
                </script>";

            } catch (Exception $e) {
                
                echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
                echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Failed to send confirmation email. Error: {$mail->ErrorInfo}',
                            icon: 'error',
                            confirmButtonText: 'Back to Home'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'index.php';
                            }
                        });
                    });
                </script>";
            }
        } else {
            echo "Failed to submit booking.";
        }
    } else {
        echo "Failed to prepare statement.";
    }
}
?>
