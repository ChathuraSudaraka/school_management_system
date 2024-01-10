<?php

$conn = new mysqli("localhost", "root", "Mercy@2005", "sms");
$titleList = $conn->query("SELECT `id`,`name` FROM `book_titles` ORDER BY `name` ASC");

$array = array();

if ($titleList->num_rows == 0) {
    $obj = new stdClass();
    $obj->status = "error";
    array_push($array, $obj);
} else {
    for ($i = 0; $i < $titleList->num_rows; $i++) {
        $data = $titleList->fetch_assoc();
        $obj = new stdClass();
        $obj->status = "success";
        $obj->title = $data["name"];
        $obj->id = $data["id"];
        array_push($array, $obj);
    }
}

echo json_encode($array);

?>