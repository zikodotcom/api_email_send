<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/Exception.php";
require "PHPMailer/src/SMTP.php";  


try{    
        // Get the JSON data from the request body
        $json_data = file_get_contents('php://input');

        // Convert JSON to PHP array
        $data = json_decode($json_data, true);
        $subject = $data["subject"];
        $body = $data["body"];
        echo $body . " " . $subject;

        // $email = $_SESSION['email'];
        
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'nmen01540@gmail.com'; // Replace with your Gmail email address
        $mail->Password = 'vqwfcufdhdosuatb'; // Replace with your Gmail account password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('info@gmail.com'); // Replace with your Gmail email address
        $mail->addAddress("zakariasdik123@gmail.com"); // Replace with the recipient's email address
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->send();
        echo 'Message has been sent';
}catch (Exception $e) {
        echo $body . " " . $subject;
    echo "Message could not be sent. Mailer Error: {$body}";
}


?>