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
<title>Danh sach nguoi dung</title>
</head>
<body>

	<br>
	<br>

	    <center>
		<legend style ="color:blue" ><b>DANH SÁCH NGƯỜI DÙNG</b></legend>
	            <form method="POST">
	    		<center>
			<table border="1" align="center" cellpadding="4" cellspacing="0">
			<center>    	
				<tr>
					<td align = "center">Tên người dùng</td>
        			<td align = "center">Email</td>
					<td align = "center"  colspan = "2"> Thao tác </td>
				</tr>
				<?php require 'thaotac.php';
					$list = userlist();?>
	            <?php foreach ($list as $it){ ?>
				<tr>
					<td align = "center" ><?php echo $it['username']; ?></td>
					<td align = "center" ><?php echo $it['email'];?></td>
					<td align = "center"> <a style = "color:blue" href="edituser.php?username=<?php echo $it['username'];?>" > Sửa </a></td>
					<td align = "center"> <a style = "color:blue" href="deleteuser.php?username=<?php echo $it['username'];?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?');" name = "xoatt"> Xóa </a></td>
				<?php } ?>	
				</tr>
			</table>
			</form>
		</center>
		<?php if($b === 'OK'): ?>
	<script>
		alert ("Sửa thông tin người dùng thành công!") ;
	</script>
   	<?php endif; ?>
   	<?php if($b === 'NotOK'): ?>
  	<script>
		alert ("Sửa thông tin người dùng không thành công!") ;
   	</script>
   	<?php endif; ?>

 	<?php if($c === 'OK'): ?>
  	<script>
		alert ("Xóa thông tin người dùng thành công!") ;
   	</script>
   	<?php endif; ?>
   	<?php if($c === 'NotOK'): ?>
  	<script>
		alert ("Xóa thông tin người dùng không thành công!") ;
   	</script>
   	<?php endif; ?>
</body>
</html>
