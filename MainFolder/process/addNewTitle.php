<?php

$title = $_GET["title"];

$conn = new mysqli("localhost", "root", "Mercy@2005", "sms");

$titleList = $conn->query("SELECT * FROM `book_titles` WHERE `name`='$title'");
if($titleList->num_rows == 0) {
    $conn->query("INSERT INTO `book_titles`(`name`) VALUES('$title')");
    echo 'success';
}
else {
    echo "error";
}


?>