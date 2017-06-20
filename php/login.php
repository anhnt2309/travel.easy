<?php
include 'connect.php';

$email = $_POST['email'];
$pass =$_POST['pass'];
$pass = md5($pass);

$str = "select * from USER where pass='$pass' AND email='$email' ";
$rs = $conn->query($str);
$row_count = 0;

while ($row = $rs->fetch_row()) {
			$session_email = $row[0];
			$session_first_name = $row[1];
			$session_last_name = $row[2];
			$row_count +=1;
		}
echo $row_count;
if($row_count >0){
echo " ".$session_first_name." ";
echo $session_last_name." ";
}
?>