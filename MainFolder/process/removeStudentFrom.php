<?php 

	$indexNo = $_POST['index'];
	$year = $_POST['year'];

	$conn = new mysqli("localhost", "root", "Mercy@2005", "sms");

	$studentDetails = $conn->query("SELECT * FROM `student_details` WHERE `student_index_number` = '$indexNo' AND `year` = '$year'");

	if($studentDetails->num_rows != 0) {
		$data = $studentDetails->fetch_assoc();
		$id = $data['id'];
		$conn->query("DELETE FROM `student_details` WHERE `id` = '$id'");
	}

	

 ?>