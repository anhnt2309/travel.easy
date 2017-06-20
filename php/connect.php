<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$dbname = "travel_easy";
	$conn= new mysqli($host,$user,$pass,$dbname);
	if(!$conn){
		die("Ket noi khong thanh cong:".mysqli_connect_error());
	}
	$conn->set_charset("utf8");
?>