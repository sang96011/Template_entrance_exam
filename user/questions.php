
<?php session_start();?>
<a href = 'index.php'>Quay lại trang chủ </a>
<form method="POST" action="">
<div  style="text-align:justify; width: 1000px; margin-left:160px;" >

	<?php
	require_once '../connect.php';
	require_once 'function.php';
	$list = questionlist();?>
	<?php
		foreach ($list as $it => $it1) {
			$it++;
	?>
	
<div class="container" >
      <div class="row" >	 
	<h3><?php echo $it.'. '.$it1['question_name']; ?></h3>
	<input type="radio" name="<?php echo $it1["question_id"]; ?>" value="A" >&nbsp;<label style= "font-size: 18px"><?php echo $it1["choice1"]; ?></label><br>
	<input type="radio" name="<?php echo $it1["question_id"]; ?>" value="B">&nbsp;<label style= "font-size: 18px"><?php echo $it1["choice2"]; ?></label><br>
	<input type="radio" name="<?php echo $it1["question_id"]; ?>" value="C">&nbsp;<label style= "font-size: 18px"><?php echo $it1["choice3"]; ?></label><br>
	<input type="radio" name="<?php echo $it1["question_id"]; ?>" value="D">&nbsp;<label style= "font-size: 18px"><?php echo $it1["choice4"]; ?></label><br>
	<?php
	}
	?>
	<br>
	</div>
	</div>
	</div>
	<center>
	<button name="submit">Nộp bài </button>
	</center>
</form>
<br> <br> <br>
<?php
/*$subjectID = $_GET['subject_id'];
$sql = "SELECT * FROM questions WHERE subject_id = '$subjectID'";
$query = mysqli_query($conn, $sql);
$total = mysqli_num_rows($query);*/
	$total = 10;
	$score = 0;
	$list1 = questionlist();
	foreach ($list1 as $it2) {
		if (isset($_POST[$it2["question_id"]])) {
		$pick = $_POST[$it2["question_id"]];
 		$answer = $it2["answer_name"];
			if ($pick == $answer) {
				$score++;
			}
		}
	}
if (isset($_POST["submit"])) {
 		//echo "Số câu đúng: ".$score."/".$total."<br>";
 		$result = ($score/$total)*10;
  		//echo "Điểm của bạn là: ". round($result, 2)."<br>";
 		//echo "<hr>";
 	}
 		?>
 		<script language="javascript">
            var m = <?php echo json_encode("Số câu đúng: ".$score."/".$total.". Điểm của bạn là: ". round($result, 2))?> ;
            alert(m);
        </script>

