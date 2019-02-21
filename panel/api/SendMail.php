<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
    require_once "../phpmailer/Exception.php";
    require_once "../phpmailer/PHPMailer.php";
    require_once "../phpmailer/SMTP.php";

    require_once "../controller/smtpConfig.php";

    class SendMail{
        function mailSender($to, $subject , $body)
        {
            #echo $body;
            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
            //Server settings
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'hackdroidbykhan@gmail.com';                 // SMTP username
            $mail->Password = 'AlamAra@0514';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
        
            //Recipients
            $mail->setFrom('hackdroidbykhan@gmail.com', 'Hackdroid');
            $mail->addAddress($to, $to);     // Add a recipient
           # $mail->addAddress('ellen@example.com');               // Name is optional
           # $mail->addReplyTo('info@example.com', 'Information');
           # $mail->addCC('cc@example.com');
           # $mail->addBCC('bcc@example.com');
        
            //Attachments
            #$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            #$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        
            //Content
            $mail->isHTML(true);                 // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    ='
                <a href='.$body.'>Reset Password</a>
            ';
            
            #$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
             
           $mail->send();
            return true;
        } catch (Exception $e) {
            #echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            return false;
        }
        return false;
        }
    }


  # sendMail();
?>

