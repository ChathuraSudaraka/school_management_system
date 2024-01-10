<?php

$year = $_POST['year'];
$term = $_POST["term"];
$class = $_POST['class'];
$grade = $_POST['grade'];

$conn = new mysqli("localhost", "root", "Mercy@2005", "sms");
$table = "";

if($grade <= 5) {
    $table = "kid_marks";
}
else if($grade <= 9) {
    $table = "middle_marks";
}
else if($grade <= 11) {
    $table = "ol_marks";
}
else {
    $table = "al_marks";
}

$outputTable = $conn->query("SELECT m.*, s.full_name AS name,index_number FROM $table m
INNER JOIN student_details sd ON sd.id = m.student_details_id
INNER JOIN student s ON s.index_number = sd.student_index_number
WHERE sd.`year` = '$year' AND sd.grade = '$grade' AND 
sd.class = '$class' AND m.term = '$term' ORDER BY total DESC");

$array = array();

$obj = new stdClass();

if($outputTable->num_rows == 0) {
    $obj->status = 'error';
}
else {
    $obj->status = 'success';
    $obj->data = array();

    for($i=0;$i<$outputTable->num_rows;$i++) {
        $row = $outputTable->fetch_assoc();
        array_push($obj->data, $row);
    }
}

echo json_encode($obj);

?>