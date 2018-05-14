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
	<br>

		<center>
	    <legend style ="color:blue"><b>THÊM NGƯỜI DÙNG</b></legend>
	    <form method="POST" action="" enctype="multipart/form-data">
	    <table border="2px" cellpadding="10px" cellspacing="10px" width="30%" height="80px" align="center">
			<br>
	    		<tr>
					<td>Tên người dùng</td>
					<td><input type="text" name="tennd" size="25"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" name="email" size="25"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="text" name="pass" size="25"></td>
				</tr>
	            <tr>
	    			<td colspan="2" align="center"> <input type="submit" name="themnd" value="Thêm người dùng"></td>
	    		</tr>
			</center>
			</form>
	</center>

	<?php
if (isset($_POST["themnd"])) {
$tennd = $_POST["tennd"];
$pass = $_POST["pass"];
$email = $_POST["email"];


	if ($tennd == "" || $pass == "" ||  $email == "" ) {
		header('Location:insertuser.php?insert=empty');
	}
	else {
		$sql = "SELECT * FROM users WHERE username = '$tennd'";
		$query = $conn->query($sql);
		//$num_rows = mysqli_num_rows($query);
		if ($query->num_rows >= 1) {
			header('Location:insertuser.php?insert=trung');
		}
		else{
			$sql = "INSERT INTO users(username, password, email) VALUES ('$tennd','$password','$email')";
			$query = mysqli_query($conn, $sql);
			if ($query == TRUE) {
				header('Location:index.php?insert=OK');
			}
			else{
				header('Location:insertuser.php?insert=NotOK');
			}
		}
	}
}
	?>

	<?php if($a === 'empty'): ?>
	<script>
		alert ("Bạn cần nhập đầy đủ thông tin để thêm người dùng!") ;
	</script>
   	<?php endif; ?>
<?php if($a === 'trung'): ?>
	<script>
		alert ("Tên người dùng đã tồn tại. Mời nhập lại!") ;
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