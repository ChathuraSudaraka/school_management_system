<?php

$name = $_POST["name"];
$msg = $_POST["msg"];
$datetime = date("Y-m-d H:i:s");
$index = $_POST["index"];

$conn = new mysqli("localhost", "root", "Mercy@2005", "sms");
$conn->query("INSERT INTO `requests`(date_time, `message`,  index_number) VALUES(
    '$datetime', '$msg', '$index' 
)");

echo "success";

?>