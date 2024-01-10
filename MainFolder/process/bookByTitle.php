<?php

$id = $_GET["id"];
$conn = new mysqli("localhost", "root", "Mercy@2005", "sms");

$bookList = $conn->query("SELECT ba.`name` AS author, b.id,status  FROM book_authors ba
INNER JOIN books b ON b.author_id = ba.id
INNER JOIN book_titles bt ON b.title_id = bt.id
WHERE bt.id = '$id'");

$array = array();

if ($bookList->num_rows == 0) {
    $obj = new stdClass();
    $obj->status = "error";

    array_push($array, $obj);
} else {
    for ($i = 0; $i < $bookList->num_rows; $i++) {
        $data = $bookList->fetch_assoc();
        $obj = new stdClass();
        $obj->status = "success";
        $obj->book = $data;

        array_push($array, $obj);
    }
}

echo json_encode($array);

?>