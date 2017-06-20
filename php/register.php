<?php
include 'connect.php'; 
$firstname = $_POST['lastname'];
$lastname = $_POST['firstname'];
$address = $_POST['address'];
$city=$_POST['city'];
$state=$_POST['state'];
$zip =$_POST['zip'];
$title =$_POST['title'];
$company =$_POST['company'];
$phone =$_POST['phone'];
$email=$_POST['email'];
$pass = $_POST['pass'];


$pass = md5($pass);
$str="insert into USER values('$email',N'$firstname',N'$lastname',N'address',N'$city',N'$state','$zip',N'$title',N'$company','$phone','$pass')";
$conn->query($str);
echo $conn->affected_rows;


?>