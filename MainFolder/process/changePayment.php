<?php 

	$index = $_POST['index'];
	$grade = $_POST['grade'];
	$class = $_POST['class'];

	$conn = new mysqli("localhost", "root", "Mercy@2005", "sms");

	$getDetails = $conn->query("SELECT `service_payment` FROM `student_details` WHERE `student_index_number`='$index' AND `grade`='$grade' AND `class`='$class'");

	$details = $getDetails->fetch_assoc();
	$payment = $details["service_payment"];

	if(strtoupper($payment) == "NO") {
		$conn->query("UPDATE `student_details` SET `service_payment` = 'yes' WHERE `student_index_number` = '$index' AND `grade`='$grade' AND `class` = '$class'");
		echo 'yes';
	}
	else {
		$conn->query("UPDATE `student_details` SET `service_payment` = 'no' WHERE `student_index_number` = '$index' AND `grade`='$grade' AND `class` = '$class'");
		echo 'no';
	}

 ?>