<?php

$conn = new mysqli("localhost", "root", "Mercy@2005", "sms");
$nic = $_POST["nic"];

$validate = $conn->query("SELECT * FROM `non_academic_staff` WHERE nic = '$nic' AND `end_date` IS NULL");

if($validate->num_rows != 0) {
    echo "error";
}
else {
    $name = $_POST["name"];
    $mobile = $_POST["mobile"];
    $date = $_POST["date"];
    $role = $_POST["role"];

    $conn->query("INSERT INTO non_academic_staff(`name`, nic, mobile, `role`, `start_date`) VALUES(
        '$name', '$nic', '$mobile', '$role', '$date'
    )");

    echo "success";
}

?>