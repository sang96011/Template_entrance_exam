<?php
require '../connect.php';
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
    <table border="3px" cellpadding="30px" cellspacing="20px" width="80%" height="250px" align="center">
        <tr>
        	 <td align="center"> <h4 style= "color: blue"><b> Quản lí người dùng </b></h4>   
			<br>
			<center> 
				<li type = "none"> <a href="insertuser.php"> <button>Thêm người dùng</button> </a> </li>
				<br>
				<li type = "none"> <a href="userlist.php"> <button>Danh sách người dùng</button> </a> </li>
			</center>
			</td>
            <td align="center"> <h4 style= "color: blue"><b> Quản lí thư viện câu hỏi </b></h4>   
			<br>
			<center> 
				<li type = "none"> <a href="insertquestion.php"> <button>Thêm câu hỏi</button> </a> </li>
				<br>
				<li type = "none"> <a href="questionlist.php"> <button>Danh sách câu hỏi</button> </a> </li>
			</center>
			</td>
			<td align="center"> <h4 style= "color: blue"><b> Quản lí thư viện đề thi</b> </h4>  
			<br>
			<center>  
				<li type = "none"> <a href="insertexam.php"> <button>Thêm đề thi</button> </a> </li>
				<br>
				<li type = "none"> <a href="examlist.php"> <button>Danh sách đề thi</button> </a> </li>
			</center>
			</td>
			<td align="center"> <h4 style= "color: blue"><b> Quản lí thư viện bài giảng </b> </h4>
			<br>
			<center>  
				<li type = "none"> <a href="insertvideo.php"> <button>Thêm bài giảng</button> </a> </li>
				<br>
				<li type = "none"> <a href="videolist.php"> <button>Danh sách bài giảng</button> </a> </li>
			</center>
			</td>
        </tr>
    </table>
</body>
</html>
<?php $a = $_GET['insert'] ?? ''; ?>
<?php if($a === 'OK'): ?>
	<script>
		alert ("Thêm thành công!") ;
	</script>
   	<?php endif; ?>
	
?>