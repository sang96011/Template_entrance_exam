<?php
session_start();
require'header.php';
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

        <div class="col-md-7 text-md-left text-center align-self-center my-5" >
		  	 &nbsp;&nbsp <h3 style = "color: blue"><b> Danh sách các chương </b></h3>
		<?php
		require_once 'function.php';
		$list = videopartlist();?>
	  <?php foreach ($list as $it){ ?>
	<tr type = "none">
	<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<td><span style="font-size: 20px"> <b><a href = "videolist.php?subject_id=<?php echo $it['subject_id'];?> &part_name=<?php echo $it['part_name'];?> &part_id=<?php echo $it['part_id'];?>" style = "color: black"><?php echo $it['part_name'];?></a></b></span></td>	
	<?php } ?>
	</tr>
        </div>
		<!--
        <div class="col-md-8">
		 <br>	
          <div class="embed-responsive embed-responsive-4by3  rounded">
            <video width="720" height="640" controls>
				<source src="videos/Khoang db, nb cua HS(P1).mp4" type="video/mp4">
			</video>
          </div>
        </div> -->
      </div>
  </div>  
</body>
</html>