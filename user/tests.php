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
  <br>
  <center>
  <h3 style = "color: navy"> <b>DANH SÁCH ĐỀ THI THỬ </b><h3>
  </center>
  <?php
   require_once 'function.php';
 $list = testlist();?>
	  <?php foreach ($list as $it){ ?>
	<div class="row">
        <div class="col-md-8">
          <div class="row">
            <div class="text-center col-2">
            </div>
            <div>
              <h4>
                 <b><a href = "questions.php?subject_id=<?php echo $it['subject_id'];?> & test_id=<?php echo $it['test_id'];?> & test_name=<?php echo $it['test_name'];?>" style = "color: black"><?php echo $it['test_name'];?></a></b><br>
              </h4>
            </div>
          </div>
        </div>		
       </div>
	<?php }	?>
  </body>
  </html>