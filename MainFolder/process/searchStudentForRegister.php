<?php 

	$indexNo = $_GET['i'];
	$thisYear = date("Y");

	$conn = new mysqli("localhost", "root", "Mercy@2005", "sms");
	$studentDataTable = $conn->query("SELECT s.initial_name, sd.grade, class FROM student s
LEFT JOIN student_details sd ON sd.student_index_number = s.index_number
WHERE s.index_number = '$indexNo' AND sd.year='$thisYear'");

	if($studentDataTable->num_rows == 0) {
		$student = $conn->query("SELECT * FROM `student` WHERE `index_number` = '$indexNo'");
		if($student->num_rows == 0) {
			echo "noData";
		}
		else {
			$data = $student->fetch_assoc();
		    $result = array(
			    "status" => "newStudent",
			    "studentName" => $data["initial_name"]
		);

		echo json_encode($result);
		}
	}
	else {
		$data = $studentDataTable->fetch_assoc();

		if($data["grade"] <= 5) {
			$result = array("studentName" => $data['initial_name'], 
						"studentGrade" => $data['grade'],
						"studentClass" => $data['class']
						,"studentStatus" => "kid");
		}
		else if($data["grade"] <= 9) {
			$subjects = $conn->query("SELECT beauty_subject.name FROM `beauty_subject_has_student` 
LEFT JOIN `beauty_subject` ON `beauty_subject`.`id` = `beauty_subject_has_student`.`beauty_subject_id` 
WHERE `student_index_number`='$indexNo'");
			$subject = $subjects->fetch_assoc();
			$result = array("studentName" => $data['initial_name'], 
						"studentGrade" => $data['grade'],
						"studentClass" => $data['class']
							,"studentStatus" => "middle",
							"bucket" => $subject['name']);
		}
		else if($data["grade"] <= 11) {
			$subjects = $conn->query("SELECT ol_subject.name FROM `ol_subject_has_student` 
LEFT JOIN `ol_subject` ON `ol_subject`.`id` = `ol_subject_has_student`.`bucket_1` OR
`ol_subject`.`id` = `ol_subject_has_student`.`bucket_2` OR
`ol_subject`.`id` = `ol_subject_has_student`.`bucket_3`
WHERE `student_index_number`='$indexNo'");
			$subject = array();
			for($i=0; $i < 3; $i++) {
				$olSubject = $subjects->fetch_assoc();
				array_push($subject, $olSubject["name"]);
			}
			
			$result = array("studentName" => $data['initial_name'], 
						"studentGrade" => $data['grade'],
						"studentClass" => $data['class'],
						"studentStatus" => "ol",
							"bucket1" => $subject[0],
							"bucket2" => $subject[1],
							"bucket3" => $subject[2]);
		}
		else {
			$subjects = $conn->query("SELECT al_subject.name FROM `al_subject_has_student` 
LEFT JOIN `al_subject` ON `al_subject`.`id` = `al_subject_has_student`.`bucket_1` OR
`al_subject`.`id` = `al_subject_has_student`.`bucket_2` OR
`al_subject`.`id` = `al_subject_has_student`.`bucket_3`
WHERE `student_index_number`='$indexNo'");
			$subject = array();
			for($i=0; $i < 3; $i++) {
				$alSubject = $subjects->fetch_assoc();
				array_push($subject, $alSubject["name"]);
			}
			
			$result = array("studentName" => $data['initial_name'], 
						"studentGrade" => $data['grade'],
						"studentClass" => $data['class'],
						"studentStatus" => "al",
							"bucket1" => $subject[0],
							"bucket2" => $subject[1],
							"bucket3" => $subject[2]);
		}
		echo json_encode($result);


	}

 ?>