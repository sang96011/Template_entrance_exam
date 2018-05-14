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
<h3 align="center" style = "color: blue"><strong>DANH SÁCH ĐỀ THI CÁC NĂM</strong></h3>
<hr />

<?php
require_once 'function.php';
 $list = examlist();?>
<?php foreach ($list as $it){ ?>
  
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="text-center col-2">
            </div>
            <div>
              <h5>
                 <b><a href = "<?php echo $it['href']?>" target="_blank" style = "color: black"><?php echo $it['exam_name'];?></a></b><br><br>
              </h5>
            </div>
          </div>
        </div>
       </div>
	
<?php } ?>
</body>
</html>