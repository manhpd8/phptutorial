<?php 
	$localhost="localhost";
	$db="shoponline";
	$user="adamkyle";
	$pass="123456Aa@";
	//$pass = hash('sha256', $pass);
	//$conn = new mysqli($localhost,$user,$pass);
	$conn = mysqli_connect($localhost, $user, $pass, $db);
	//check connect
	if($conn->connect_error){
		die("connection failed". $conn->connect_error);
	} else{
		echo "connected successfully";
	}
?>