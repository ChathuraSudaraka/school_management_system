<?php 
	session_start();
	$assignment = $_FILES['file'];
	$code = $_POST['code'];
	$indexNo = $_SESSION['studentIndex'];

	$timestamp = time();
	$time = date("Y-m-d H:i:s", $timestamp);


	if($assignment['type'] == "application/pdf") {
		$file_name =  uniqid() . ".pdf";
		$moved = move_uploaded_file($assignment['tmp_name'], "../submitted/" . $file_name);

		if($moved) {
			$connection = new mysqli("localhost", "root", "Mercy@2005", "sms");
			$connection->query("INSERT INTO `submitted`(`path`, `code`, `student_index`, `time`) VALUES('$file_name', '$code', '$indexNo', '$time')");
			echo "success";
		}
	}
	else {
		echo "error";
	}

 ?>