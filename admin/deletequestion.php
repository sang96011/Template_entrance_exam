<?php
session_start();
require '../connect.php';
$mach = $_GET['mach'];
$ch = $_GET['ch'];			 
$sql = "DELETE FROM questions WHERE question_id = '$mach' AND question_name = '$ch' ";			
$query = mysqli_query($conn, $sql);
if ($query == TRUE) {
	header ('Location:questionlist.php?delete=OK');
}
else{
	header ('Location:questionlist.php?delete=NotOK');
}

?>