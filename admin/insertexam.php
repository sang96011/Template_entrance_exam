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
	    <legend style ="color:blue"><b>THÊM ĐỀ THI</b></legend>
	    <form method="POST" action="" enctype="multipart/form-data">
	    <table border="2px" cellpadding="10px" cellspacing="10px" width="30%" height="80px" align="center">
			<br>
	    		<tr>
					<td>Mã đề thi</td>
					<td><input type="text" name="madt" size="25"></td>
				</tr>
				<tr>
					<td>Tên đề thi</td>
					<td><input type="text" name="tendt" size="25"></td>
				</tr>
				<tr>
					<td>Tên môn học</td>
					<td><select name = "mmh" >
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
					<td>Đề thi</td>
					<td><input type="file" name="examfile"/>
				    </td>
				</tr>
				</table>
				<br>
			<center>
	            <tr>
	    			<td colspan="2" align="center"> <input type="submit" name="themdt" value="Thêm đề thi"> 


	    			</td>
	    		</tr>
			</center>
			</form>
	</center>

<?php 
	// Ấn định  dung lượng file ảnh upload
define("MAX_SIZE", "100000");

// hàm này đọc phần mở rộng của file. Nó được dùng để kiểm tra nếu
// file này có phải là file hình hay không .
function getExtension($str)
{
    $i = strrpos($str, ".");
    if (!$i) {
        return "";
    }
    $l = strlen($str) - $i;
    $ext = substr($str, $i + 1, $l);
    return $ext;
}

$errors = 0;
//checks if the form has been submitted
if (isset($_POST['themdt'])) {
// lấy tên file upload
    $examfile= $_FILES['examfile']['name'];
// Nếu nó không rỗng
    if ($examfile) {
// Lấy tên gốc của file
        $filename = stripslashes($_FILES['examfile']['name']);
//Lấy phần mở rộng của file
        $extension = getExtension($filename);
        $extension = strtolower($extension);
// Nếu nó không phải là file hình thì sẽ thông báo lỗi
        if (($extension != "pdf") && ($extension != "mp4") && ($extension !=
                "png")) {
// xuất lỗi ra màn hình
            echo '<h1>Đây không phải là file hình!</h1>';
            $errors = 1;
        } else {
//Lấy dung lượng của file upload
            $size = filesize($_FILES['examfile']['tmp_name']);
            if ($size > MAX_SIZE * 10240000000) {
                echo '<h1>Vượt quá dung lượng cho phép!</h1>';
                $errors = 1;
                exit;
            }

// đặt tên mới cho file hình up lên
            $exam_name = time() . '.' . $extension;
// gán thêm cho file này đường dẫn
            global $newname;
            $newname = "../user/exams/" . $exam_name;
       //  echo $newname;
// kiểm tra xem file hình này đã upload lên trước đó chưa
//            echo $_FILES['image']['tmp_name'];

            $copied = copy($_FILES['examfile']['tmp_name'], $newname);
//            if (!$copied) {
//                echo '<h1> File hình này đã tồn tại </h1>';
//                $errors = 1;
//            }
        }
    }
}

?>
	<?php
if (isset($_POST["themdt"])&& !$errors) {
$madt = $_POST["madt"];
$tendt = $_POST["tendt"];
$mmh = $_POST["mmh"];
//$examfile = $_POST["examfile"];

$madt = strip_tags($madt);
$madt = addslashes($madt);
$tendt = strip_tags($tendt);
$tendt = addslashes($tendt);

	if ($madt == "" || $tendt == "" ||  $mmh == "" ) {
		header('Location:insertexam.php?insert=empty');
	}
	else {
		$sql = "SELECT * FROM exams WHERE exam_id = '$madt'";
		$query = $conn->query($sql);
		//$num_rows = mysqli_num_rows($query);
		if ($query->num_rows >= 1) {
			header('Location:insertexam.php?insert=trung');
		}
		else{
			$sql = "INSERT INTO exams(exam_id, exam_name, subject_id, href) VALUES ('$madt','$tendt','$mmh','$newname')";
			$query = mysqli_query($conn, $sql);
			if ($query == TRUE) {
				header('Location:index.php?insert=OK');
			}
			else{
				header('Location:insertexam.php?insert=NotOK');
			}
		}
	}
}
	?>

	<?php if($a === 'empty'): ?>
	<script>
		alert ("Bạn cần nhập đầy đủ thông tin để thêm đề thi!") ;
	</script>
   	<?php endif; ?>
<?php if($a === 'trung'): ?>
	<script>
		alert ("Mã đề thi đã tồn tại. Mời nhập lại!") ;
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