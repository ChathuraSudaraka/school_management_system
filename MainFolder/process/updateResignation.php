<?php

$index = $_POST["index"];
$date = $_POST["date"];

$conn = new mysqli("localhost", "root", "Mercy@2005", "sms");

$conn->query("UPDATE student SET `date_of_resignation` = '$date' WHERE `index_number`='$index'");


?>