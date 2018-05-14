<?php
require "../connect.php";
$madt = $_GET['madt'];
$tk = $_GET['ed'] ?? '';
require_once 'header.php';
?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="../user/css/theme.css" type="text/css"> 
<title>Sua de thi</title>
</head>
<body>
	<form method="POST" action="">
		<center>
	    <legend style = "color: blue"><b>CHỈNH SỬA THÔNG TIN ĐỀ THI</b></legend>
	    	<table border="2px" cellpadding="10px" cellspacing="10px" width="30%" height="80px" align="center">
			<br>
	    		<tr>
					<td>Mã đề thi</td>
	    			<td>
	    			<?php
	    				$sql = "SELECT * FROM exams WHERE exam_id = '$madt'";
	    				$query = mysqli_query($conn,$sql);
	    				$num = mysqli_num_rows($query);
						if($num > 0){
							while($row = mysqli_fetch_array($query)){
								echo $row['exam_id']; }
						}
					?>
					</td>
				</tr>
				<tr>
					<td>Tên đề thi</td>
					<td><input type="text" name="tendt"></td>
				</tr>
				<tr>
					<td>Mã môn học</td>
					<td><input type="text" name="mmh"></td>
				</tr>
			</table>
			</br>
			<center>
	            <tr>
	    			<td colspan="2" align="center"> <input type="submit" name = "suadt" value="Cập nhật"></td>
	    		</tr>
			</center>
		</center>
	</form>          
</body>
</html>	
<?php
if (isset($_POST['suadt'])) {	
	$tendt = $_POST['tendt'];
	$mmh = $_POST['mmh'];
	if ($tendt == "" ||  $mmh == "" ) {
	header('Location:editexam.php?ed=empty');
	}
	else{
		$sql = "SELECT * FROM exams WHERE exam_id = '$madt'";
		$query = mysqli_query($conn, $sql);
		$num_rows = mysqli_num_rows($query);
		if($num_rows == 0){
			header('Location:editexam.php?ed=none');
		}
		else{	
			$sql = "UPDATE exams SET exam_name = '$tendt', subject_id = '$mmh' WHERE exam_id = '$madt'";
			$query = mysqli_query($conn, $sql);
			if ($query == TRUE) {
				header ('Location:examlist.php?edit=OK');
			}
			else{
				header ('Location:examlist.php?edit=NotOK');
			}
		}
	}
}
?>
<?php if($tk === 'empty'): ?>
	<script>
		alert ("Bạn cần nhập đầy đủ thông tin để sửa thông tin đề thi!") ;
	</script>
   	<?php endif; ?>
   	<?php if($tk === 'none'): ?>
	<script>
		alert ("Đề thi không có trong danh sách!") ;
	</script>
   	<?php endif; ?>