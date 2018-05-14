<?php
require "../connect.php";
$mach = $_GET['mach'];
$tk = $_GET['ed'] ?? '';
require_once 'header.php';
?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="../user/css/theme.css" type="text/css"> 
<title>Sua cau hoi</title>
</head>
<body>
	<form method="POST" action="">
		<center>
	    <legend style = "color:blue" ><b>CHỈNH SỬA CÂU HỎI</b></legend>
	    	<table border="2px" cellpadding="10px" cellspacing="10px" width="30%" height="80px" align="center">
			<br>
	    		<tr>
					<td>Mã câu hỏi</td>
	    			<td>
	    			<?php
	    				$sql = "SELECT * FROM questions WHERE question_id = '$mach'";
	    				$query = mysqli_query($conn,$sql);
	    				$num = mysqli_num_rows($query);
						if($num > 0){
							while($row = mysqli_fetch_array($query)){
								echo $row['question_id']; }
						}
					?>
					</td>
				</tr>
				<tr>
					<td>Câu hỏi</td>
					<td><input type="text" name="ch"></td>
				</tr>
				<tr>
					<td>Đáp án A</td>
					<td><input type="text" name="daa"></td>
				</tr>
				<tr>
					<td>Đáp án B</td>
					<td><input type="text" name="dab"></td>
				</tr>
				<tr>
					<td>Đáp án C</td>
					<td><input type="text" name="dac"></td>
				</tr>
				<tr>
					<td>Đáp án D</td>
					<td><input type="text" name="dad"></td>
				</tr>
				<tr>
					<td>Đáp án đúng</td>
					<td><input type="text" name="tl"></td>
				</tr>
			</table>
			</br>
			<center>
	            <tr>
	    			<td colspan="2" align="center"> <input type="submit" name = "suach" value="Cập nhật"></td>
	    		</tr>
			</center>
		</center>
	</form>          
</body>
</html>	
<?php
if (isset($_POST['suach'])) {	
	$ch = $_POST['ch'];
	$daa = $_POST['daa'];
	$dab = $_POST['dab'];
	$dac = $_POST['dac'];
	$dad = $_POST['dad'];
	$tl = $_POST['tl'];
	if ($ch == "" ||  $daa == "" || $dab == "" || $dac == "" || $dad == "" || $tl == "") {
	header('Location:editquestion.php?ed=empty');
	}
	else{
		$sql = "SELECT * FROM questions WHERE question_id = '$mach'";
		$query = mysqli_query($conn, $sql);
		$num_rows = mysqli_num_rows($query);
		if($num_rows == 0){
			header('Location:editquestion.php?ed=none');
		}
		else{	
			$sql = "UPDATE questions SET question_name = '$ch', choice1 = '$daa', choice2 = '$dab', choice3 = '$dac', choice4 = '$dad', answer_name = '$tl' WHERE question_id = '$mach'";
			$query = mysqli_query($conn, $sql);
			if ($query == TRUE) {
				header ('Location:questionlist.php?edit=OK');
			}
			else{
				header ('Location:questionlist.php?edit=NotOK');
			}
		}
	}
}
?>
<?php if($tk === 'empty'): ?>
	<script>
		alert ("Bạn cần nhập tên để sửa câu hỏi!") ;
	</script>
   	<?php endif; ?>
   	<?php if($tk === 'none'): ?>
	<script>
		alert ("Câu hỏi không có trong danh sách!") ;
	</script>
   	<?php endif; ?>