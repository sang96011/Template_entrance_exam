<?php
require "../connect.php";
require_once 'header.php';
	$b = $_GET['edit'] ?? '';
	$c = $_GET['delete'] ?? '';
?>
<html>
<head>
  <meta charset="utf-8"> 
  <link rel="stylesheet" href="../user/css/theme.css" type="text/css"> 
</head>

<body>
	<br>

	    <center>
		<legend style= "color:blue"><b>DANH SÁCH CÂU HỎI</b></legend>
	            <form method="POST">
	    		<center>
			<table width="1210" border="1" align="center" cellpadding="4" cellspacing="0">
			<center>    	
				<tr>
					<td align = "center">Mã câu hỏi </td>
        			<td align = "center">Câu hỏi</td>
					<td align = "center">Đáp án A</td>
        			<td align = "center">Đáp án B</td>
					<td align = "center">Đáp án C</td>
        			<td align = "center">Đáp án D</td>
					<td align = "center">Đáp án đúng</td>						   
					<td align = "center"  colspan = "2"> Thao tác </td>
				</tr>
				<?php require 'thaotac.php';
					$list = danhsach();?>
	            <?php foreach ($list as $it){ ?>
				<tr>
					<td align = "center" ><?php echo $it['question_id']; ?></td>
					<td align = "center" ><?php echo $it['question_name'];?></td>
					<td align = "center" ><?php echo $it['choice1']; ?></td>
					<td align = "center" ><?php echo $it['choice2'];?></td>
					<td align = "center" ><?php echo $it['choice3']; ?></td>
					<td align = "center" ><?php echo $it['choice4'];?></td>
					<td align = "center" ><?php echo $it['answer_name']; ?></td>
					<td align = "center"> <a href="editquestion.php?mach=<?php echo $it['question_id'];?>" style = "color:blue" > Sửa </a></td>
					<td align = "center"> <a style = "color:blue" href="deletequestion.php?mach=<?php echo $it['question_id'];?> & ch=<?php echo $it['question_name'];?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?');" name = "xoatt"> Xóa </a></td>
				<?php } ?>	
				</tr>
			</table>
			</form>
		</center>
		<?php if($b === 'OK'): ?>
	<script>
		alert ("Sửa câu hỏi thành công!") ;
	</script>
   	<?php endif; ?>
   	<?php if($b === 'NotOK'): ?>
  	<script>
		alert ("Sửa câu hỏi không thành công!") ;
   	</script>
   	<?php endif; ?>

 	<?php if($c === 'OK'): ?>
  	<script>
		alert ("Xóa câu hỏi thành công!") ;
   	</script>
   	<?php endif; ?>
   	<?php if($c === 'NotOK'): ?>
  	<script>
		alert ("Xóa câu hỏi không thành công!") ;
   	</script>
   	<?php endif; ?>
</body>
</html>