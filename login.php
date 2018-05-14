<?php
session_start()
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <title>Login</title>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="user/css/login.css">
</head>
<body>

<?php
require 'connect.php';
$mess = $_GET['state'] ?? '';
$mess = strip_tags($mess);

if (isset($_POST["btn_submit"])) {
//lay thong tin nguoi dung
    $username = $_POST["username"];
    $password = $_POST["password"];
    //lam sach thong tin
    $username = strip_tags($username);
    $username = addslashes($username);
    $password = strip_tags($password);
    $password = addslashes($password);
    if ($username == "" || $password == "") {
        echo "Ban can nhap day du ten dang nhap va mat khau";
    } else {
        $sql = "SELECT * FROM users WHERE username = '$username' and password = '$password'";
        $query = mysqli_query($conn, $sql);
        $num_rows = mysqli_num_rows($query);
        if ($num_rows == 0) {
            echo "<p align='center' style='color: white'><b>Tên đăng nhập hoặc mật khẩu không đúng.</b></p>";
        } else {
            //lưu tên đăng nhập và password vào session
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            //$_SESSION['userID'] = $num_rows1;
			if($_SESSION['username'] == 'admin' && $_SESSION['password'] == '12345678'){
				header('Location: admin/index.php');
			}
			else{
				header('Location: user/index.php');
			}
        }
    }
}
?>
<form method="POST" action="Login.php">
    <div class="login-block">
        <?php if ($mess === 'success'): ?>
            <script>
                aleart("Đăng kí thành công. Mời bạn đăng nhập!");
            </script>
        <?php endif; ?>
        <h1>Login</h1>
        <input type="text" value="" placeholder="Username" id="username" name="username"/>
        <input type="password" value="" placeholder="Password" id="password" name="password"/>
		<br> <br>
        <button name="btn_submit">Login</button>
        <p align="center">Create a new account? <a href="signup.php">Signup</a></p>
    </div>
</form>

<footer>
    <div class="container">
        <div align="center">
            <div class="row">
                <div class="col-lg-12">
                    <p style="color: #fff">Copyright &copy; Nhom 3 2018<Br></p>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>