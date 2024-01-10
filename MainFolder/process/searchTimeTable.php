<?php 

	$year = $_POST['year'];
	$grade = $_POST['grade'];
	$class = $_POST['class'];

	$conn = new mysqli("localhost", "root", "Mercy@2005", "sms");

	$getTable = $conn->query("SELECT * FROM `time_table` WHERE `grade`='$grade' AND `year`='$year' AND `class`='$class'");

	if($getTable->num_rows == 0) {
		echo "noData";
	}
	else {
		echo "available";
	}

 ?>