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
        <div class="col-md-7 text-md-left text-center align-self-center my-5" >
	<h3 style = "color: blue">
<b>	<?php 
	require '../connect.php';
	$partID = $_GET['part_id'];
	$sql = "SELECT * FROM parts WHERE part_id = '$partID'";
	$query = mysqli_query($conn,$sql);
	$num = mysqli_num_rows($query);
	if($num > 0){
		while($row = mysqli_fetch_array($query)){
			echo $row['part_name']; }
	}
	?>
	</b>
	</h3> 
	<?php
		require_once 'function.php';
		$list2 = videolist();?>
	<?php foreach ($list2 as $it2){ ?>
	<tr type = "none">
	<td><span style="font-size: 20px"> <b><a href = "playvideo.php?&video_id=<?php echo $it2['video_id'];?> &video_name=<?php echo $it2['video_name'];?>" style = "color: black"><?php echo $it2['video_name'];?></a></b></span></td>
	<br>
	<?php } ?>
	</tr>
        </div>
		<!--
        <div class="col-md-8">
		 <br>	
          <div class="embed-responsive embed-responsive-4by3  rounded">
            <video width="720" height="640" controls autoplay>
				<source src ="videos/Khoang db, nb cua HS(P1).mp4" type="video/mp4">
			</video>
          </div>
        </div> -->
      </div>
  </div> 
</body>

</html>