<?php 

	$year = $_POST['year'];
	$grade = $_POST['grade'];
	$class = $_POST['class'];
	$indexNo = $_POST['indexNumber'];

	$conn = new mysqli("localhost", "root", "Mercy@2005", "sms");

	$checkDetails = $conn->query("SELECT * FROM `student_details` WHERE `student_index_number`='$indexNo' AND `year`='$year'");

	if($checkDetails->num_rows != 0) {
		echo "DataExist";
	}
	else {
		$conn->query("INSERT INTO `student_details`(`year`, `grade`, `class`, `student_index_number`) VALUES('$year', '$grade', '$class', '$indexNo')");

		$getClassDetails = $conn->query("SELECT * FROM `student_details` WHERE `year`='$year' AND `grade`='$grade' AND `class`='$class'");

		$getFullName = $conn->query("SELECT `initial_name` FROM `student` WHERE `index_number`='$indexNo'");

		$name = $getFullName->fetch_assoc();

		$idNumber = $getClassDetails->num_rows;

		$tableRow = '<tr id="row'. $indexNo .'">
                      <td>'. $idNumber .'</td>
                      <td>'. $indexNo .'</td>
                      <td>'. $name["initial_name"] .'</td>
                      <td><button type="button" data-indexnumber="'. $indexNo .'" class="btn btn-primary" onclick="removeStudent(event);">Remove</button></td>
                  </tr>';

        echo json_encode($tableRow);
	}

 ?>