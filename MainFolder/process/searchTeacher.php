<?php 

	$nic = $_POST['nic'];

	$conn = new mysqli("localhost", "root", "Mercy@2005", "sms");

	$teacherDetails = $conn->query("SELECT t.full_name, nic,contact_number, email FROM teacher t WHERE nic='$nic'");



	if($teacherDetails->num_rows == 0) {
		echo "Invalid";
	}
	else {
		$obj = new stdClass(); 

		$subjectDetails = $conn->query("SELECT DISTINCT s.name FROM subject s
		INNER JOIN teacher_has_subject ths ON ths.subject_id = s.id
		INNER JOIN teacher t ON t.nic = ths.teacher_nic
		WHERE t.nic = '$nic'");

		if($subjectDetails->num_rows == 0) {
			$obj->subject = "none";
		}
		else {
			$subjectText = '';
			for($i=0; $i<$subjectDetails->num_rows; $i++) {
				$subject = $subjectDetails->fetch_assoc();
				if($i == $subjectDetails->num_rows - 1) {
					$subjectText .= $subject['name'];
				}
				else {
					$subjectText .= $subject['name'] . ", ";
				}
			}
			$obj->subject = $subjectText;
		}

		$obj->teacher = $teacherDetails->fetch_assoc();

		echo json_encode($obj);
	}

 ?>