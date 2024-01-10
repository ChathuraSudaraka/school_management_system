<?php

$nic = $_GET["nic"];

$conn = new mysqli("localhost", "root", "Mercy@2005", "sms");
$validate = $conn->query("SELECT distinct t.nic,full_name,address,contact_number,email,n.name AS nationality,
g.name AS gender, r.name AS religion, s.name as `subject`,
ct.grade,class,
t.qualification, date_of_resignation
FROM teacher t
LEFT JOIN class_teacher ct ON ct.teacher_nic = t.nic
LEFT JOIN teacher_has_subject ths ON ths.teacher_nic = t.nic
INNER JOIN nationality n ON n.nationality_id = t.nationality_id
INNER JOIN religion r ON r.religion_id = t.religion_id
INNER JOIN gender g ON g.gender_id = t.gender_gender_id
LEFT JOIN `subject` s ON s.id = ths.subject_id
WHERE t.nic = '$nic'");

$array = array();

if($validate->num_rows == 0) {
    echo "error";
}
else {
    for($i=0; $i<$validate->num_rows; $i++) {
        $obj = new stdClass();
        $obj->teacher = $validate->fetch_assoc();

        array_push($array, $obj);
    }

    echo json_encode($array);
}

?>