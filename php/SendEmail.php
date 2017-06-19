<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "14520028@gm.uit.edu.vn.com";
    $email_subject = "Travel.easy user's contact requests";
 
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['phone']) ||
        !isset($_POST['message']) |{
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $name = $_POST['name']; // required
    $email_from = $_POST['email']; // required
    $phone = $_POST['phone']; // not required
    $message = $_POST['message']; // required
 
 
    $email_message .= "First Name: ".$name."\n";
    $email_message .= "Email: ".$email_from."\n";
    $email_message .= "Telephone: ".$phone."\n";
    $email_message .= "Comments: ".$message."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
$mail_result = mail($email_to, $email_subject, $email_message, $headers); 

// if($mail_result != false){
  echo "<div class=\"alert alert-danger\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button><strong>Thank you for contacting us. We will be in touch with you very soon!!!</strong></div>"
// } 
?>
