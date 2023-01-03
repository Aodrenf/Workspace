<?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    //Load Composer's autoloader
    require '../public/config/vendor/autoload.php';
    
    //Create an instance; passing `true` enables exceptions
function sendMail()
{
    $mail = new PHPMailer(true);

    try {

        //on defini les variables a entrer dans le form
        $email = $_SESSION['email'];
        $lastname = $_SESSION['lastname'];
        $firstname = $_SESSION['firstname'];
        $operation = $_POST['operations'];
        $timestamp = $_POST['timestamp'];
        $negative_feedback = $_POST['negative_feedback'];
        $positive_feedback = $_POST['positive_feedback'];

        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP(); //Send using SMTP
        $mail->Host = 'ssl0.ovh.net'; //Set the SMTP server to send through
        $mail->SMTPAuth = true; //Enable SMTP authentication
        $mail->Username = 'workspace@contactmedia.fr'; //SMTP username
        $mail->Password = 'y!$poBbCXosnC3gQ'; //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
        $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('workspace@contactmedia.fr');
        $mail->addAddress('aodren.f@contactmedia.fr'); //Add a recipient
        $mail->addAddress('informatique@contactmedia.fr');               //Name is optional

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = 'Formulaire des TA';
        $mail->Body = "Email : $email<br>Nom : $lastname<br>Pr&eacutenom : $firstname<br>Operation : $operation<br>Horodatage : $timestamp<br>Commentaires n&eacutegatifs : $negative_feedback<br>Commentaires positifs : $positive_feedback<br>";
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
    