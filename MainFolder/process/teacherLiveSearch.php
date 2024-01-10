<?php

$name = $_GET["name"];

$conn = new mysqli("localhost", "root", "Mercy@2005", "sms");

$teacherList = $conn->query("SELECT `nic`,`full_name` AS `name` FROM `teacher` WHERE `full_name` LIKE '%$name%'");

$array = array();

for($i=0; $i<$teacherList->num_rows; $i++) {
    $obj = new stdClass();
    $obj->teacher = $teacherList->fetch_assoc();
    array_push($array, $obj);
}

echo json_encode($array);

?>