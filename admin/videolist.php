<?php
require "../connect.php";
	$b = $_GET['edit'] ?? '';
	$c = $_GET['delete'] ?? '';
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

	<br>
	<br>

	    <center>
		<legend style ="color:blue" ><b>DANH SÁCH BÀI GIẢNG</b></legend>
	            <form method="POST">
	    		<center>
			<table border="1" align="center" cellpadding="4" cellspacing="0">
			<center>    	
				<tr>
					<td align = "center">Tên chương </td>
					<td align = "center">Mã môn học </td>
					<td align = "center">Mã video bài giảng</td>
					<td align = "center">Tên bài giảng</td>
					<td align = "center"> Thao tác </td>
				</tr>
				<?php require 'thaotac.php';
					$list = videolist();?>
	            <?php foreach ($list as $it){ ?>
				<tr>
					<td align = "center" ><?php echo $it['part_name']; ?></td>
					<td align = "center" ><?php echo $it['subject_id'];?></td>
					<td align = "center" ><?php echo $it['video_id']; ?></td>
					<td align = "center" ><?php echo $it['video_name']; ?></td>
					<td align = "center"> <a style = "color:blue" href="deletevideo.php?mavd=<?php echo $it['video_id'];?> & tenvd=<?php echo $it['video_name'];?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?');" name = "xoatt"> Xóa </a></td>
				<?php } ?>	
				</tr>
			</table>
			</form>
		</center>
		
 	<?php if($c === 'OK'): ?>
  	<script>
		alert ("Xóa bài giảng thành công!") ;
   	</script>
   	<?php endif; ?>
   	<?php if($c === 'NotOK'): ?>
  	<script>
		alert ("Xóa bài giảng không thành công!") ;
   	</script>
   	<?php endif; ?>
</body>
</html>
