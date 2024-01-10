<?php

$nic = $_POST["nic"];
$bookId = $_POST["bookId"];
$date = $_POST["date"];

$conn = new mysqli("localhost", "root", "Mercy@2005", "sms");
$validateTeacher = $conn->query("SELECT * FROM `teacher` WHERE `nic`='$nic'");

if ($validateTeacher->num_rows == 0) {
    echo "invalidTeacher";
} else {
    $teacherHaveBook = $conn->query("SELECT * FROM `books` b 
        INNER JOIN teacher_borrow_books tbb ON tbb.book_id = b.id
        WHERE tbb.teacher_nic = '$nic' AND tbb.`status` = '0'
        ORDER BY `start_date` DESC");

    if ($teacherHaveBook->num_rows != 0) {
        echo "teacherHaveABook";
    } else {
        $validateBook = $conn->query("SELECT * FROM `books` WHERE id='$bookId'");
        if ($validateBook->num_rows == 0) {
            echo "invalidBook";
        } else {
            $end_date = date('Y-m-d', strtotime($date . ' + 14 days'));
            $conn->query("INSERT INTO `teacher_borrow_books`(`teacher_nic`, `book_id`, `start_date`, `end_date`)
        VALUES('$nic', '$bookId', '$date', '$end_date')");
            $getCount = $conn->query("SELECT bt.`count`,bt.`id`,b.`id` AS `bid` FROM books b
        INNER JOIN book_titles bt ON bt.id = b.title_id
        WHERE b.id = '$bookId'");
            $count = $getCount->fetch_assoc();
            $newCount = $count['count'] + 1;
            $conn->query("UPDATE `book_titles` SET `count`='$newCount' WHERE id='" . $count['id'] . "'");
            $conn->query("UPDATE `books` SET `status`='0' WHERE id='" . $count['bid'] . "'");
            echo 'success';
        }
    }
}

?>