<?php
session_start();
require '../connect.php';
$mavd = $_GET['mavd'];
$tenvd = $_GET['tenvd'];			 
$sql = "DELETE FROM videos WHERE video_id = '$mavd' AND video_name = '$tenvd' ";			
$query = mysqli_query($conn, $sql);
if ($query == TRUE) {
	header ('Location:videolist.php?delete=OK');
}
else{
	header ('Location:videolist.php?delete=NotOK');
}

?>