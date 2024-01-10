<?php

session_start();

$motherEmail = $_POST["motherEmail"];
$motherNumber = $_POST["motherNumber"];
$fatherEmail = $_POST["fatherEmail"];
$fatherNumber = $_POST["fatherNumber"];
$emEmail = $_POST["emEmail"];
$emNumber = $_POST["emNumber"];
$address = $_POST["address"];
$index = $_SESSION['index_number'];

$conn = new mysqli("localhost", "root", "Mercy@2005", "sms");

$conn->query("UPDATE student SET mother_email='$motherEmail' WHERE index_number='$index'");
$conn->query("UPDATE student SET mother_number='$motherNumber' WHERE index_number='$index'");
$conn->query("UPDATE student SET father_number='$fatherNumber' WHERE index_number='$index'");
$conn->query("UPDATE student SET `father_email`='$fatherEmail' WHERE index_number='$index'");
$conn->query("UPDATE student SET emergency_email='$emEmail' WHERE index_number='$index'");
$conn->query("UPDATE student SET emergency_number='$emNumber' WHERE index_number='$index'");
$conn->query("UPDATE student SET `address`='$address' WHERE index_number='$index'");

echo "success";

?>