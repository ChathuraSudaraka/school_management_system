<?php

$id = $_GET["id"];

$conn = new mysqli("localhost", "root", "Mercy@2005", "sms");
$conn->query("DELETE FROM `requests` WHERE id='$id'");

?>