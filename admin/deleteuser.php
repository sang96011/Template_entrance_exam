<?php
session_start();
require '../connect.php';
$tennd = $_GET['username'];		 
$sql = "DELETE FROM users WHERE username = '$tennd'";			
$query = mysqli_query($conn, $sql);
if ($query == TRUE) {
	header ('Location:userlist.php?delete=OK');
}
else{
	header ('Location:userlist.php?delete=NotOK');
}

?>