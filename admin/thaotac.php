<?php
function userlist(){
	require "../connect.php";
	$kq = mysqli_query($conn,"SELECT * FROM users");
	return $kq;
}
function danhsach(){
	require "../connect.php";
	$kq = mysqli_query($conn,"SELECT * FROM questions");
	return $kq;
}

function examlist(){
	require "../connect.php";
	$kq = mysqli_query($conn,"SELECT * FROM exams");
	return $kq;
}

function videolist(){
	require "../connect.php";
	$kq = mysqli_query($conn,"SELECT parts.*, videos.* FROM parts INNER JOIN videos ON parts.part_id = videos.part_id");
	return $kq;
}
?>
