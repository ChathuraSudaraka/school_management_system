<?php

$name = $_GET["name"];

$conn = new mysqli("localhost", "root", "Mercy@2005", "sms");

$staffList = $conn->query("SELECT `nic`,`name` FROM `non_academic_staff` WHERE `name` LIKE '%$name%'");

$array = array();

for($i=0; $i<$staffList->num_rows; $i++) {
    $obj = new stdClass();
    $obj->staff = $staffList->fetch_assoc();
    array_push($array, $obj);
}

echo json_encode($array);

?>