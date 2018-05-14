<?php

function testlist(){
	require 'connect.php';
	$subjectID = $_GET['subject_id'];
	$kq = mysqli_query($conn,"SELECT * FROM tests WHERE subject_id = '$subjectID'");
	return $kq;
}

function subjectlist(){
	require 'connect.php';
	$kq = mysqli_query($conn,"SELECT * FROM subjects");
	return $kq;
}

function examlist(){
	require 'connect.php';
	$subjectID = $_GET['subject_id'];
	$kq = mysqli_query($conn,"SELECT * FROM exams WHERE exams.subject_id = '$subjectID'");
	return $kq;
}

function questionlist(){
	require 'connect.php';
	$testID = $_GET['test_id'];
	$kq = mysqli_query($conn,"SELECT * FROM questions WHERE test_id = '$testID'");
	return $kq;
}

function videopartlist(){
	require 'connect.php';
	$subjectID = $_GET['subject_id'];
	$kq = mysqli_query($conn,"SELECT * FROM parts WHERE subject_id = '$subjectID'");
	return $kq;
}

function videolist(){
	require 'connect.php';
	$partID = $_GET['part_id'];
	$kq = mysqli_query($conn,"SELECT * FROM videos WHERE part_id = '$partID'");
	return $kq;
}

function playvideo(){
	require 'connect.php';
	$videoID = $_GET['video_id'];
	$kq = mysqli_query($conn,"SELECT * FROM videos WHERE video_id = '$videoID'");
	return $kq;
}
	



?>