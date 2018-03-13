<?php
/**
 * PHPMailer multiple files upload and send example
 */
//Import the PHPMailer class into the global namespace
/*use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../PHPMailer/src/Exception.php';
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';
$msg = '';
if (array_key_exists('userfile', $_FILES)) {
    require 'vendor/autoload.php';
    // Create a message
    $mail = new PHPMailer(true);
    try {
    	$mail->setFrom('zee@hec.epizy.com', 'First Last');
	    $mail->addAddress('zee@hec.epizy.com', 'John Doe');
	    $mail->Subject = 'PHPMailer file sender';
	    $mail->Body = 'My message body';
	    //Attach multiple files one by one
	    for ($ct = 0; $ct < count($_FILES['userfile']['tmp_name']); $ct++) {
	        $uploadfile = tempnam(sys_get_temp_dir(), hash('sha256', $_FILES['userfile']['name'][$ct]));
	        $filename = $_FILES['userfile']['name'][$ct];
	        if (move_uploaded_file($_FILES['userfile']['tmp_name'][$ct], $uploadfile)) {
	            $mail->addAttachment($uploadfile, $filename);
	        } else {
	            $msg .= 'Failed to move file to ' . $uploadfile;
	        }
	    }
	    if (!$mail->send()) {
	        $msg .= "Mailer Error: " . $mail->ErrorInfo;
	    } else {
	        $msg .= "Message sent!";
	    }
    	
    } catch (Exception $e) {
    	echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
    
}
*/


// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
return $email->Send();
   
// Create the email and send the message
$to = 'zee@hec.epizy.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: zee@hec.epizy.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";   
mail($to,$email_subject,$email_body,$headers);
return true;
?>