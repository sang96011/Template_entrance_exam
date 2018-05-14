<?php
$servername = 'localhost';
$username = 'root';
$password = '19121997';
$db = 'dtb';
$conn = new mysqli($servername, $username, $password,$db);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8");

?>