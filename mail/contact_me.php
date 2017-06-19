<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "14520028@gm.uit.edu.vn";
    $email_subject = "Travel.easy user's contact requests";

    $name = $_POST['name']; // required
    $email_from = $_POST['email']; // required
    $phone = $_POST['phone']; // not required
    $message = $_POST['message']; // required
 
 
    $email_message = "First Name: ".$name."\n\n";
    $email_message .= "Email: ".$email_from."\n";
    $email_message .= "Telephone: ".$phone."\n";
    $email_message .= "Message: ".$message."\n";
 
// create email headers
// $headers = 'From: '.$email_from."\r\n".
// 'Reply-To: '.$email_from."\r\n" .
// 'X-Mailer: PHP/' . phpversion();
// $$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";


 $headers = "From: " .($email_from) . "\r\n";
                        $headers .= "Reply-To: ".($email_from) . "\r\n";
                        $headers .= "Return-Path: ".($email_from) . "\r\n";;
                        $headers .= "MIME-Version: 1.0\r\n";
                        $headers .= "Content-Type: text/html;";
                        $headers .= "X-Priority: 3\r\n";
                        $headers .= "X-Mailer: PHP". phpversion() ."\r\n";

mail($email_to, $email_subject, $email_message, $headers); 

// if($mail_result != false){

} 
?>
