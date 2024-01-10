<?php

$id = $_GET["id"];
$currentYear = date("Y");
$today = date("Y-m-d");

$conn = new mysqli("localhost", "root", "Mercy@2005", "sms");
$infoTable = $conn->query("SELECT b.title_id ,b.id,ba.name as `author`,`status` as st, bt.name,count FROM books b
INNER JOIN book_authors ba ON b.author_id = ba.id
INNER JOIN book_titles bt ON b.title_id = bt.id 
WHERE b.id = '$id'");

$obj = new stdClass();

if ($infoTable->num_rows == 0) {
    $obj->status = 'error';
} else {
    $bookData = $infoTable->fetch_assoc();
    $late = "none";
    $lateStatus = "No";
    $borrowId = 0;
    $bookId = 0;
    $borrowPerson = '';
    $copies = $conn->query("SELECT * FROM `books` WHERE `title_id`='" . $bookData['title_id'] . "'");
    if ($bookData['st'] == '0') {
        $hInfo = $conn->query("SELECT bb.id,start_date,end_date,bb.book_id, s.initial_name, sd.grade,class FROM student_borrow_books bb
        INNER JOIN student s ON bb.student_index = s.index_number
        INNER JOIN student_details sd ON s.index_number = sd.student_index_number 
        WHERE book_id = '$id' AND `status`='0' AND sd.`year` = '$currentYear'
        ORDER BY start_date DESC");
        if ($hInfo->num_rows != 0) {
            $lateInfo = $hInfo->fetch_assoc();
            $late = $lateInfo["initial_name"] . " " . $lateInfo["grade"] . "-" . $lateInfo["class"] . " " . $lateInfo["end_date"];
            if ($lateInfo["end_date"] < $today) {
                $lateStatus = "Yes";
            }
            $borrowId = $lateInfo["id"];
            $borrowPerson = "student";
            $bookId = $lateInfo["book_id"];
        } else {
            $hInfo = $conn->query("SELECT bb.id,start_date,end_date,bb.book_id, t.full_name
            FROM teacher_borrow_books bb
            INNER JOIN teacher t ON t.nic =  bb.teacher_nic
            WHERE book_id = '$id' AND `status`='0'
            ORDER BY start_date DESC");
            if ($hInfo->num_rows != 0) {
                $lateInfo = $hInfo->fetch_assoc();
                $late = $lateInfo["full_name"];
                if ($lateInfo["end_date"] < $today) {
                    $lateStatus = "Yes";
                }
                $borrowId = $lateInfo["id"];
                $borrowPerson = "teacher";
                $bookId = $lateInfo["book_id"];
            }
        }
    }
    $obj->status = 'success';
    $obj->book = $bookData;
    $obj->late = $late;
    $obj->lateStatus = $lateStatus;
    $obj->copies = $copies->num_rows;
    $obj->borrowId = $borrowId;
    $obj->borrowPerson = $borrowPerson;
    $obj->bookId = $bookId;
}

echo json_encode($obj);

?>