<?php session_start(); ?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="../use/css/theme.css" type="text/css"> 
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

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>