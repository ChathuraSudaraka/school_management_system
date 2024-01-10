<?php

$index = $_POST["index"];
$bookId = $_POST["bookId"];
$date = $_POST["date"];

$conn = new mysqli("localhost", "root", "Mercy@2005", "sms");

$validateIndex = $conn->query("SELECT `full_name` FROM `student` WHERE index_number = '$index'");

if ($validateIndex->num_rows == 0) {
    echo "invalidIndex";
} else {
    $studentHaveBook = $conn->query("SELECT * FROM `books` b 
        INNER JOIN student_borrow_books sbb ON sbb.book_id = b.id
        WHERE sbb.student_index = '$index' AND sbb.`status` = '0'
        ORDER BY `start_date` DESC");

    if ($studentHaveBook->num_rows != 0) {
        echo "studentHaveABook";
    } else {
        $validateBook = $conn->query("SELECT * FROM `books` WHERE id='$bookId'");
        if ($validateBook->num_rows == 0) {
            echo "invalidBook";
        } else {
            $end_date = date('Y-m-d', strtotime($date . ' + 14 days'));
            $conn->query("INSERT INTO `student_borrow_books`(`student_index`, `book_id`, `start_date`, `end_date`)
        VALUES('$index', '$bookId', '$date', '$end_date')");
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