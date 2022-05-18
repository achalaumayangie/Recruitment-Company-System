<?php

$server = "localhost";
$user = "root";
$psw = "";
$db = "vaca";

$conn = new mysqli($server,$user,'',$db);

if ($conn->connect_error) {
	die("Database Connection failed: " . $conn->connect_error);
}

?>