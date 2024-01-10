<?php

session_start();
$name = $_GET["name"];
$thisYear = date("Y");

$conn = new mysqli("localhost", "root", "Mercy@2005", "sms");

if (isset($_SESSION["teacherNic"])) {
	$studentForTeacher = $conn->query("SELECT s.initial_name AS name, sd.class, sd.grade, s.index_number FROM student s
	INNER JOIN student_details sd ON sd.student_index_number = s.index_number
	INNER JOIN class_teacher cs ON cs.`year` = sd.`year` AND cs.grade = sd.grade AND cs.class = sd.class
	WHERE cs.teacher_nic = '" . $_SESSION['teacherNic'] . "' AND s.full_name LIKE '%$name%'");

	$array = array();

	for ($i = 0; $i < $studentForTeacher->num_rows; $i++) {
		$obj = new stdClass();
		$obj->student = $studentForTeacher->fetch_assoc();
		array_push($array, $obj);
	}

	echo json_encode($array);

} else {
	$studentList = $conn->query("SELECT s.initial_name as  `name`,index_number, sd.grade,class FROM student s
	LEFT JOIN student_details sd ON sd.student_index_number = s.index_number AND sd.`year` = '$thisYear'
	WHERE s.full_name LIKE '%$name%'");

	$array = array();

	for ($i = 0; $i < $studentList->num_rows; $i++) {
		$obj = new stdClass();
		$obj->student = $studentList->fetch_assoc();
		array_push($array, $obj);
	}

	echo json_encode($array);
}
?>