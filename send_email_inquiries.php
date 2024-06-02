<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $to = filter_var($_POST['to'], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($_POST['subject'], ENT_QUOTES, 'UTF-8');
    $message = nl2br(htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8')); 

   
    $message = '<div style="font-family: Arial, sans-serif;">' . $message . '</div>';

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'maritonitravelandtour@gmail.com';
        $mail->Password   = 'lwbr oois mhql eljc'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        $mail->setFrom('maritonitravelandtour@gmail.com', 'MARITONI TRAVEL AND TOUR');
        $mail->addAddress($to);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
        $response['success'] = true;
    } catch (Exception $e) {
        $response['success'] = false;
        $response['error'] = $mail->ErrorInfo;
    }
}

header('Content-Type: application/json');
echo json_encode($response);
?>
