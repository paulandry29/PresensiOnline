<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
function sendEmail($to='', $nama='', $attach='')
{
    $mail = new PHPMailer(true);

    try {
        //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'your_mail@mail.com';                     //SMTP username
    $mail->Password   = 'your_mail_pessword';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
        $mail->setFrom('your_mail@mail.com', 'Your Name');
        $mail->addAddress($to, $nama);     //Add a recipient
        //$mail->addAddress('info@example.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        $nameFile = '../schedule/'.$attach.'';

        $mail->addAttachment($nameFile);       //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Rekap Presensi Mingguan';
        $mail->Body    = '<b style="color:red">Pesan ini otomatis dari sistem, JANGAN DIBALAS!!!</b>';
        $mail->AltBody = 'Pesan ini otomatis dari sistem, JANGAN DIBALAS!!!';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
