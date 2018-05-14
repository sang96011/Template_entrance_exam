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
	    <legend style ="color:blue"><b>THÊM BÀI GIẢNG</b></legend>
	    <form method="POST" action="" enctype="multipart/form-data">
	    <table border="2px" cellpadding="10px" cellspacing="10px" width="30%" height="80px" align="center">
			<br>
	    		<tr>
					<td>Mã chương</td>
					<td><input type="text" name="mac" size="25"></td>
				</tr>
				<tr>
					<td>Mã bài giảng</td>
					<td><input type="text" name="mabg" size="25"></td>
				</tr>
				<tr>
					<td>Tên bài giảng</td>
					<td><input type="text" name="tenbg" size="25"></td>
				</tr>
				<tr>
					<td>Bài giảng</td>
					<td><input type="file" name="bgfile"/>
					</td>
				</tr>
				</table>
				<br>
			<center>
	            <tr>
	    			<td colspan="2" align="center"> <input type="submit" name="thembg" value="Thêm bài giảng"></td>
	    		</tr>
			</center>
			</form>
	</center>

<?php 
	// Ấn định  dung lượng file ảnh upload
define("MAX_SIZE", "100000000");

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
if (isset($_POST['thembg'])) {
// lấy tên file upload
    $bgfile= $_FILES['bgfile']['name'];
// Nếu nó không rỗng
    if ($bgfile) {
// Lấy tên gốc của file
        $filename = stripslashes($_FILES['bgfile']['name']);
//Lấy phần mở rộng của file
        $extension = getExtension($filename);
        $extension = strtolower($extension);
// Nếu nó không phải là file hình thì sẽ thông báo lỗi
        if (($extension != "mp4") &&( $extension != "pdf")) {
// xuất lỗi ra màn hình
            echo '<h1>Đây không phải là file bai giang!</h1>';
            $errors = 1;
        } else {
//Lấy dung lượng của file upload
            $size = filesize($_FILES['bgfile']['tmp_name']);
            if ($size > MAX_SIZE * 1024000) {
                echo '<h1>Vượt quá dung lượng cho phép!</h1>';
                $errors = 1;
                exit;
            }

// đặt tên mới cho file hình up lên
            $video_name = time() . '.' . $extension;
// gán thêm cho file này đường dẫn
            global $newname;
            $newname = "../user/videos/" . $video_name;
       //  echo $newname;
// kiểm tra xem file hình này đã upload lên trước đó chưa
//            echo $_FILES['image']['tmp_name'];

            $copied = copy($_FILES['bgfile']['tmp_name'], $newname);
//            if (!$copied) {
//                echo '<h1> File hình này đã tồn tại </h1>';
//                $errors = 1;
//            }
        }
    }
}

?>
	<?php
if (isset($_POST["thembg"])&& !$errors) {
$mabg = $_POST["mabg"];
$tenbg = $_POST["tenbg"];
$mac = $_POST["mac"];

$mabg = strip_tags($mabg);
$mabg = addslashes($mabg);
$tenbg = strip_tags($tenbg);
$tenbg = addslashes($tenbg);

	if ($mac == "" || $mabg == "" ||  $tenbg == "" ) {
		header('Location:insertvideo.php?insert=empty');
	}
	else {
		$sql = "SELECT * FROM videos WHERE video_id = '$mabg'";
		$query = $conn->query($sql);
		//$num_rows = mysqli_num_rows($query);
		if ($query->num_rows >= 1) {
			header('Location:insertvideo.php?insert=trung');
		}
		else{
			$sql = "INSERT INTO videos(video_id, video_name, part_id, href) VALUES ('$mabg','$tenbg','$mac','$newname')";
			$query = mysqli_query($conn, $sql);
			if ($query == TRUE) {
				header('Location:index.php?insert=OK');
			}
			else{
				header('Location:insertvideo.php?insert=NotOK');
			}
		}
	}
}
	?>

	<?php if($a === 'empty'): ?>
	<script>
		alert ("Bạn cần nhập đầy đủ thông tin để thêm bài giảng!") ;
	</script>
   	<?php endif; ?>
<?php if($a === 'trung'): ?>
	<script>
		alert ("Mã bài giảng đã tồn tại. Mời nhập lại!") ;
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