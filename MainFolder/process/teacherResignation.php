<?php

$nic = $_GET['nic'];
$date = date("Y-m-d");
$conn = new mysqli("localhost", "root", "Mercy@2005", "sms");
$conn->query("UPDATE teacher SET date_of_resignation = '$date' WHERE nic = '$nic'");

echo $date;

?>