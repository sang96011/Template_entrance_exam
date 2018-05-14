<?php
require '../connect.php';
$a = $_GET['insert'] ?? '';
require_once 'header.php';
?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="../user/css/theme.css" type="text/css"> 
</head>

<body>
		
	<br>
		<center>
		
	    <legend style = "color:blue"><b>THÊM CÂU HỎI</b></legend>
		<br>
	    <form method="POST" action="">
	    	<table border="2px" cellpadding="10px" cellspacing="10px" width="30%" height="80px" align="center">
	    		<tr>
					<td>Mã câu hỏi</td>
					<td><input type="text" name="mach" size="25"></td>
				</tr>
				<tr>
					<td>Tên môn học</td>
					<td><select name = "mamh" >
							<option>Chọn trong danh sách</option>
							<?php
								$sql = "select * from subjects";
								$query = mysqli_query($conn,$sql);
								$num = mysqli_num_rows($query);
								if($num > 0){
									while($row = mysqli_fetch_array($query)){							
							?>
							<option value="<?php echo $row['subject_id']?>"><?php echo $row['subject_name']?></option>
							<?php
				    				}
								}
							?>
						</select>
					</td>
				</tr>
				
				<tr>
					<td>Câu hỏi</td>
					<td><input type="text" name="ch" size="25"></td>
				</tr>
				<tr>
					<td>Đáp án A</td>
					<td><input type="text" name="daa" size="25"></td>
				</tr>
				<tr>
					<td>Đáp án B</td>
					<td><input type="text" name="dab" size="25"></td>
				</tr>
				<tr>
					<td>Đáp án C</td>
					<td><input type="text" name="dac" size="25"></td>
				</tr>
				<tr>
					<td>Đáp án D</td>
					<td><input type="text" name="dad" size="25"></td>
				</tr>
				<tr>
					<td>Đáp án đúng</td>
					<td><input type="text" name="tl" size="25"></td>
				</tr>
				</table>
				<br>
				
			<center>
	            <tr>
	    			<td colspan="2" align="center"> <input type="submit" name="themch" value="Thêm câu hỏi"></td>
	    		</tr>
			</center>
			
			</form>
	
	</center>


	<?php
if (isset($_POST["themch"])) {
$mach = $_POST["mach"];
$mamh = $_POST["mamh"];
$ch = $_POST["ch"];
$daa = $_POST["daa"];
$dab = $_POST["dab"];
$dac = $_POST["dac"];
$dad = $_POST["dad"];
$tl = $_POST["tl"];


$mach = strip_tags($mach);
$mach = addslashes($mach);
$ch = strip_tags($ch);
$ch = addslashes($ch);

	if ($mach == "" || $mamh == "" ||$ch == "" ||  $daa == "" || $dab == "" || $dac == "" || $dad == "" || $tl == "") {
		header('Location:insertquestion.php?insert=empty');
	}
	else {
		$sql = "SELECT * FROM questions WHERE question_id = '$mach'";
		$query = $conn->query($sql);
		//$num_rows = mysqli_num_rows($query);
		if ($query->num_rows >= 1) {
			header('Location:insertquestion.php?insert=trung');
		}
		else{
			$sql = "INSERT INTO questions(question_id,subject_id,question_name, choice1, choice2, choice3, choice4, answer_name) VALUES ('$mach','$mamh','$ch','$daa','$dab','$dac','$dad','$tl')";
			$query = mysqli_query($conn, $sql);
			if ($query == TRUE) {
				header('Location:index.php?insert=OK');
			}
			else{
				header('Location:insertquestion.php?insert=NotOK');
			}
		}
	}
}
	?>

	<?php if($a === 'empty'): ?>
	<script>
		alert ("Bạn cần nhập đầy đủ thông tin để thêm câu hỏi!") ;
	</script>
   	<?php endif; ?>
<?php if($a === 'trung'): ?>
	<script>
		alert ("Mã câu hỏi đã tồn tại. Mời nhập lại!") ;
	</script>
   	<?php endif; ?>
	<?php if($a === 'OK'): ?>
	<script>
		alert ("Thêm thành công!") ;
	</script>
   	<?php endif; ?>

	<?php if($a === 'NotOK'): ?>
	<script>
		alert ("Thêm không thành công!") ;
	</script>
   	<?php endif; ?>		
</body>
</html>	