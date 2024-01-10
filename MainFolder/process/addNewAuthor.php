<?php

$author = $_GET["author"];

$conn = new mysqli("localhost", "root", "Mercy@2005", "sms");

$authorList = $conn->query("SELECT * FROM `book_authors` WHERE `name`='$author'");
if($authorList->num_rows == 0) {
    $conn->query("INSERT INTO `book_authors`(`name`) VALUES('$author')");
    echo 'success';
}
else {
    echo "error";
}


?>