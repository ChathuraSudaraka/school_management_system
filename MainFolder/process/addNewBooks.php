<?php

$id = $_POST['id'];
$title = $_POST['title'];
$author = $_POST['author'];

$conn = new mysqli("localhost", "root", "Mercy@2005", "sms");
$validate = $conn->query("SELECT * FROM `books` WHERE `id`='$id'");
if($validate->num_rows != 0) {
    echo "error";
}
else {
    $conn->query("INSERT INTO `books`(`id`, `title_id`, `author_id`, `status`) VALUES('$id', '$title', '$author', '1')");
    echo "success";
}

?>