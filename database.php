<?php

//this connects to the database for the main system

$servername="162.241.192.233";
$username="sisplusn_demoUsr";
$password="ezekiaDemo99";
$dbname="sisplusn_ezekiaDemo";

// Create the connection to the server
$conn = new mysqli ($servername, $username, $password, $dbname);

// Check if connected
if($conn->connect_error){
	die("connection failed: ". $conn->connect_error);
	}
?>
