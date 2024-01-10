<?php 

	$year = $_POST['year'];
	$grade = $_POST['grade'];
	$class = $_POST['class'];
	$nic = $_POST['nic'];

	$conn = new mysqli("localhost", "root", "Mercy@2005", "sms");

	$isATeacher = $conn->query("SELECT * FROM `teacher` WHERE `nic`='$nic'");

	if($isATeacher->num_rows == 0) {
		echo "notATeacher";
	}
	else {
		$checkClass = $conn->query("SELECT * FROM class_teacher WHERE year='$year' AND `teacher_nic`='$nic'");

		if($checkClass->num_rows == 0) {
			$checkClassTeacher = $conn->query("SELECT * FROM class_teacher WHERE YEAR='$year' AND grade = '$grade' AND class = '$class'");

			if($checkClassTeacher->num_rows == 0) {
				$conn->query("INSERT INTO class_teacher(`year`, `grade`, `class`, `teacher_nic`) VALUES('$year', '$grade', '$class', '$nic')");
				$teacherInfo = $isATeacher->fetch_assoc();
				echo $teacherInfo['full_name'];
			}
			else {
				$conn->query("UPDATE `class_teacher` SET `teacher_nic`='$nic' WHERE `year`='$year' AND `grade` = '$grade' AND `class` = '$class'");
				$teacherInfo = $isATeacher->fetch_assoc();
				echo $teacherInfo['full_name'];
			}
		}
		else {
			echo "teacherInAOtherClass";
		}
	}

	
 ?>