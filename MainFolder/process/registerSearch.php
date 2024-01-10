<?php 

	$year = $_POST['year'];
	$grade = $_POST['grade'];
	$class = $_POST['class'];

	$conn = new mysqli("localhost", "root", "Mercy@2005", "sms");

	$register = $conn->query("SELECT student_details.*, student.initial_name  FROM student_details
INNER JOIN student ON student.index_number = student_details.student_index_number
WHERE `year` = '$year'
AND `grade` = '$grade'
AND `class` = '$class'");

	$getTeacher = $conn->query("SELECT t.full_name FROM teacher t 
INNER JOIN class_teacher ct ON t.nic = ct.teacher_nic
WHERE ct.`year` = '$year' AND ct.grade = '$grade' AND ct.class = '$class'");

	if($getTeacher->num_rows == 0) {
		$teacherName = "none";
	}
	else {
		$teacherDetails = $getTeacher->fetch_assoc();
		$teacherName = $teacherDetails["full_name"];
	}

	if($register->num_rows == 0) {
		$result = array('classStatus' => "newClass" );
    echo json_encode($result);
	}
	else {
        $student_data = array();
		for ($i=1; $i <= $register->num_rows; $i++) { 
			$data = $register->fetch_assoc();	
		
			$output = '<tr id="row'. $data["student_index_number"] .'">
	                      <td>'. $i .'</td>
	                      <td>'. $data["student_index_number"] .'</td>
	                      <td>'. $data["initial_name"] .'</td>
	                      <td><button type="button" data-indexnumber="'. $data["student_index_number"] .'" class="btn btn-primary" onclick="removeStudent(event);">Remove</button></td>
	                      </tr>';

	        
			$result = array(
						'classStudentCount' => $register->num_rows,
						'classTeacher' => $teacherName,
						'students' => $output);
            array_push($student_data,$result);
		}
        echo json_encode($student_data);
	}


 ?>