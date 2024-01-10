<?php

$index = $_POST["index"];
$fullName = $_POST["fullName"];
$initialName = $_POST["initialName"];
$dob = $_POST["dob"];
$address = $_POST["address"];
$pSchool = $_POST["pSchool"];
$disToSchool = $_POST["disToSchool"];

$conn = new mysqli("localhost", "root", "Mercy@2005", "sms");

$conn->query("UPDATE student SET full_name='$fullName' WHERE index_number='$index'");
$conn->query("UPDATE student SET initial_name='$initialName' WHERE index_number='$index'");
$conn->query("UPDATE student SET date_of_birth='$dob' WHERE index_number='$index'");
$conn->query("UPDATE student SET `address`='$address' WHERE index_number='$index'");
$conn->query("UPDATE student SET previous_school='$pSchool' WHERE index_number='$index'");
$conn->query("UPDATE student SET distance='$disToSchool' WHERE index_number='$index'");

echo "success";

?>