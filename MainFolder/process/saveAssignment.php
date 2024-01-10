<?php 
	session_start();

	$grade = $_POST['assignmentGrade'];
	$class = $_POST['assignmentClass'];
	$subject = $_POST['assignmentSubject'];
	$heading = $_POST['assignmentHeading'];
	$code = $_POST['assignmentCode'];
	$description = $_POST['assignmentDescription'];
	$start = $_POST['startingDate'];
	$end = $_POST['endDate'];
	$assignment = $_FILES['assignmentFile'];
	$teacherNIC = $_SESSION['teacherNic'];

	if($assignment['type'] == 'application/pdf') {
		$file_name =  uniqid() . ".pdf";
		$moved = move_uploaded_file($assignment['tmp_name'], "../assignment/" . $file_name);
		if($moved) {
			$connection = new mysqli("localhost", "root", "Mercy@2005", "sms");

			$connection->query("INSERT INTO `assignments`(`grade`, `class`, `heading`, `code`, `description`, `start`, `end`, `path`, `teacher_nic`, `subject`) VALUES('$grade', '$class', '$heading', '$code', '$description', '$start', '$end', '$file_name', '$teacherNIC', '$subject')");
		}
		else {
			echo "notMoved";
		}
	}
	else {
		echo "error";
	}
 
 ?>