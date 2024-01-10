<?php

$id = $_POST["id"];
$person = $_POST["person"];
$bookId = $_POST["bookId"];

$conn = new mysqli("localhost", "root", "Mercy@2005", "sms");
if($person == "student") {
    $conn->query("UPDATE `student_borrow_books` SET `status`='1' WHERE id='$id'");
    echo "success";
}


$conn->query("UPDATE `books` SET `status`='1' WHERE id='$bookId'");
?>