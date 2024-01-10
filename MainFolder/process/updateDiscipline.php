<?php

$index = $_POST["index"];
$level = $_POST["level"];
$description = $_POST["description"];
$details_id = $_POST["details_id"];
$date = date("Y-m-d");
$me = $_POST["me"];
$role = $_POST["role"];

$conn = new mysqli("localhost", "root", "Mercy@2005", "sms");

$currentScore = $conn->query("SELECT score FROM student WHERE index_number = '$index'");
$getScore = $currentScore->fetch_assoc();
$score = $getScore['score'];

if ($level == 1) {
    $newScore = $score - 1;
} else if ($level == 2) {
    $newScore = $score - 3;
} else if ($level == 3) {
    $newScore = $score - 5;
} else {
    $newScore = $score - $_POST["custom"];
}

$conn->query("UPDATE student SET score = '$newScore' WHERE index_number = '$index'");
$conn->query("INSERT INTO mistake(`mistake`, `level`, details_number, `date`, `teacher`, `teacher_role`, `index_number`)
 VALUES('$description', '$level', '$details_id', '$date', '$me', '$role', '$index')");

echo $newScore;

?>