<?php
session_start();
require '../connect.php';
$madt = $_GET['madt'];
$tendt = $_GET['tendt'];			 
$sql = "DELETE FROM exams WHERE exam_id = '$madt' AND exam_name = '$tendt' ";			
$query = mysqli_query($conn, $sql);
if ($query == TRUE) {
	header ('Location:examlist.php?delete=OK');
}
else{
	header ('Location:examlist.php?delete=NotOK');
}

?>