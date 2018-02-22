<?php
// Check for empty fields
if(empty($_POST['name1'])      ||
   empty($_POST['email1'])     ||
   empty($_POST['phone1'])     ||
   empty($_POST['message1'])   ||
   !filter_var($_POST['email1'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name1']));
$lastname = strip_tags(htmlspecialchars($_POST['lastname1']));
$email_address = strip_tags(htmlspecialchars($_POST['email1']));
$phone = strip_tags(htmlspecialchars($_POST['phone1']));
$message = strip_tags(htmlspecialchars($_POST['message1']));
   
// Create the email and send the message
$to = 'u06243@yahoo.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name1";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name1\n\nEmail: $email_address1\n\nPhone: $phone1\n\nMessage:\n$message1";
$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address1";   
mail($to,$email_subject,$email_body,$headers);
return true;         
?>