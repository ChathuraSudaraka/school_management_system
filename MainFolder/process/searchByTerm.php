<?php
session_start();

$term = $_GET['term'];
$year = date("Y");
$teacherGrade = $_SESSION['teacherGrade'];
$teacherClass = $_SESSION['teacherClass'];

$table = '';

if($teacherGrade <= 5) {
	$table = "kid_marks";
}
else if($teacherGrade <= 9) {
	$table = "middle_marks";
}
else if($teacherGrade <= 11) {
	$table = "ol_marks";
}
else if($teacherGrade <= 13) {
	$table = "al_marks";
}

$conn = new mysqli("localhost", "root", "Mercy@2005", "sms");
$output = $conn->query("SELECT DISTINCT s.full_name, sd.id
FROM student_details sd
INNER JOIN student s ON s.index_number = sd.student_index_number
LEFT JOIN $table m ON m.student_details_id = sd.id AND m.term = '$term'
WHERE sd.`year` = '$year' 
AND sd.grade = '$teacherGrade'
AND sd.class='$teacherClass' 
AND m.id IS NULL
");

$array = array();

if($output->num_rows == 0) {
	$obj = new stdClass();
	$obj->status = "noData";

	array_push($array, $obj);
}
else {
	for($i=0; $i<$output->num_rows; $i++) {
		$obj = new stdClass();
		$obj->status = "success";
		$obj->data = $output->fetch_assoc();

		array_push($array, $obj);
	}
}

echo json_encode($array);

?>
