<?php session_start();
require '../connect.php';
require_once 'function.php';
?>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="css/theme.css" type="text/css"> 
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-light" style="height: 86px;">
    <div class="container">
      <a class="navbar-brand text-dark" href="index.php"><i class="fa d-inline fa-lg fa-cloud"></i><b> LEARN</b></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false"
        aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item text-white">
            <a class="navbar-brand text-dark" href="index.php"><b class="">Trang chủ</b></a>
          </li>
          <li class="nav-item dropdown">
            <a class="navbar-brand dropdown-toggle text-dark" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b> Bài giảng </b> </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			   <?php
					$list1 = subjectlist();?>
	  			<?php foreach ($list1 as $it1){ ?>
					<a class="dropdown-item" href = "videos.php?subject_id=<?php echo $it1['subject_id'];?>"><b><?php echo $it1['subject_name'];?></b></a>	
				<?php } ?>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="navbar-brand dropdown-toggle text-dark" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b> Đề thi </b> </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
               <?php
					$list2 = subjectlist();?>
	  			<?php foreach ($list2 as $it2){ ?>
					<a class="dropdown-item" href = "exams.php?subject_id=<?php echo $it2['subject_id'];?>"><b><?php echo $it2['subject_name'];?></b></a>	
				<?php } ?>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="navbar-brand dropdown-toggle text-dark" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b>Thi trực tuyến</b> </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <?php
					$list3 = subjectlist();?>
	  			<?php foreach ($list3 as $it3){ ?>
					<a class="dropdown-item" href = "questions.php?subject_id=<?php echo $it3['subject_id'];?>"><b><?php echo $it3['subject_name'];?></b></a>	
				<?php } ?>
            </div>
          </li>
        </ul>
      </div>
    </div>
	<?php
    if (isset($_SESSION['username']) && $_SESSION['password']) {
        echo '<a class="btn navbar-btn ml-2 text-white btn-secondary" href = "#"><i class="fa d-inline fa-lg fa-user-circle-o"></i> ' . $_SESSION['username'] . '</a>';
        echo '<a class="btn navbar-btn ml-2 text-white btn-secondary" href = "../logout.php"><i class="fa d-inline fa-lg fa-user-circle-o"></i> Logout </a>';
    } else {
        echo '<a class="btn navbar-btn ml-0 text-white btn-secondary" style="width: 110px" href = "../signup.php"><i class="fa d-inline fa-lg fa-user-circle-o"></i> Đăng kí</a>
			<a class="btn navbar-btn ml-2 text-white btn-secondary" href = "../login.php"><i class="fa d-inline fa-lg fa-user-circle-o"></i> Đăng nhập</a>';
    }
    ?>    
  </nav>
  <div class="py-5 text-center" style="color: white;background-image: url(&quot;../index.JPG&quot;);">
    <div class="container py-5">
      <div class="row">
        <div class="col-md-12">
		<br> 
          <h1 class="display-3 mb-4" style = "color: white"><b>WELCOME TO LEARN!!</b></h1>
          <p class="lead mb-5"><b>Learn là một website giúp các bạn học sinh ôn thi Đại học với một kho tài liệu vô cùng phong phú cùng hệ thống video bài giảng chất lượng và hoàn toàn miễn phí. Ngoài ra khi đến với Learn, bạn cũng có thể tự kiểm tra kiến thức, trình độ của
            bản thân khi sử dụng chức năng thi trực tuyến với ngân hàng câu hỏi trắc nghiệm.</b></p>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5 text-center bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>Tại sao các bạn nên chọn Learn?</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 p-4">
          <img class="img-fluid d-block rounded-circle mx-auto" src="https://i.imgur.com/hbzAnQW.png" width="200" height="200">
          <br>
          <p><b>Kho tài liệu phong phú</b> </p>
          <p class="my-4"><i>Tổng hợp đề thi các năm và ngân hàng câu hỏi thi trực tuyến đa dạng cùng với hàng loạt các video bài giảng của các thầy cô giáo hàng đầu. &nbsp;</i></p>
        </div>
        <div class="col-md-4 p-4">
          <img class="img-fluid d-block rounded-circle mx-auto" src="https://i.imgur.com/E2QUNOU.png" height="200" width="200">
          <br>
          <p><b>Tiết kiệm thời gian&nbsp;</b> </p>
          <p class="my-4"><i>Thời lượng các video bài giảng hợp lý, có thể truy cập và xem tài liệu một cách nhanh chóng và dễ dàng, các bạn không cần phải đến những lớp học thêm offline hoặc đến các thư viện.</i></p>
        </div>
        <div class="col-md-4 p-4">
          <img class="img-fluid d-block rounded-circle mx-auto" src="https://i.imgur.com/ctwFnNF.png" width="200" height="200">
          <br>
          <p><b>Hoàn toàn miễn phí</b></p>
          <p class="my-4"><i>Tất cả mọi thứ trên website là hoàn toàn miễn phí.&nbsp;</i></p>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5 bg-dark text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <p class="lead">Sign up to our newsletter for the latest news</p>
          <form class="form-inline">
            <div class="form-group">
              <input type="email" class="form-control" placeholder="Your e-mail here"> </div>
            <button type="submit" class="btn btn-primary ml-3">Subscribe</button>
          </form>
        </div>
        <div class="col-4 col-md-1 align-self-center">
          <a href="https://www.facebook.com" target="_blank"><i class="fa fa-fw fa-facebook fa-3x text-white"></i></a>
        </div>
        <div class="col-4 col-md-1 align-self-center">
          <a href="https://twitter.com" target="_blank"><i class="fa fa-fw fa-twitter fa-3x text-white"></i></a>
        </div>
        <div class="col-4 col-md-1 align-self-center">
          <a href="https://www.instagram.com" target="_blank"><i class="fa fa-fw fa-instagram text-white fa-3x"></i></a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mt-3 text-center">
          <p>© Copyright 2018 Nhom3 - All rights reserved.</p>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>