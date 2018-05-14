<?php
session_start();
require 'header.php';

?>

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="css/theme.css" type="text/css"> 
</head>

<body>
  <div class="container">
      <div class="row">	  
	  
        <div class="col-md-4 text-md-left my-5" >
	<br><h4 style = "color: red">
<b>	<?php 

	$videoname= $_GET['video_name'];
	
			echo $videoname; 
	?>
	</b>
	</h4>
<br>
<br>	
<?php
require_once 'function.php';
 $list = playvideo();?>
<?php foreach ($list as $it){ ?>
	<div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h5 class="panel-title"><b>Tài liệu tải về</b></h5>
              </div>
              <div class="panel-body">
				  <li class="media">
                    <a class="pull-left" target="_bank" href="<?php echo $it['tlbg'];?>">&nbsp;&nbsp;&nbsp;<img class="media-object" src="https://image.flaticon.com/icons/svg/136/136522.svg" height="25" width="25"></a>
                    <div class="media-body">
                      <h5 class="media-heading"><a target="_bank" style = "color: black; text-decoration: none;" href = "<?php echo $it['tlbg'];?>"><b>&nbsp;Tài liệu bài giảng</b></a></h5>
                      <p></p>
                    </div>
                  </li>
                  <li class="media">
                    <a class="pull-left" target="_bank" href="<?php echo $it['bttl'];?>">&nbsp;&nbsp;&nbsp;<img class="media-object" src="https://image.flaticon.com/icons/svg/136/136522.svg" height="25" width="25"></a>
                    <div class="media-body">
                      <h5 class="media-heading"><a target="_bank" style = "color: black; text-decoration: none;" href = "<?php echo $it['tlbg'];?>"><b>&nbsp;Bài tập tự luyện</b></a></h5>
                      <p></p>
                    </div>
                  </li>
                  <li class="media">
                    <a class="pull-left" target="_bank" href="<?php echo $it['bttl'];?>">&nbsp;&nbsp;&nbsp;<img class="media-object" src="https://image.flaticon.com/icons/svg/136/136522.svg" height="25" width="25"></a>
                    <div class="media-body">
                      <h5 class="media-heading"><a target="_bank" style = "color: black; text-decoration: none;" href = "<?php echo $it['tlbg'];?>"><b>&nbsp;Đáp án bài tập tự luyện</b></a></h5>
                    </div>
                  </li>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php } ?>
        </div>
        <div class="col-md-8">
		 
          <div class="embed-responsive embed-responsive-4by3  rounded">
            <video width="500" height="420" controls>
				<source src ="<?php $list3 = playvideo(); ?>
							<?php foreach ($list3 as $it3){ echo $it3['href']; } ?>" type="video/mp4">
			</video>
          </div>
        </div>
      </div>
  </div> 
  <br>
  <br>
  <br>
</body>

</html>