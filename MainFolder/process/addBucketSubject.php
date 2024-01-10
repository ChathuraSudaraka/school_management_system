<?php

    $subject = $_POST['subject'];
    $indexNo = $_POST['index'];
    $thisYear = date("Y");

    $conn = new mysqli("localhost", "root", "Mercy@2005", "sms");

    $studentDetails = $conn->query("SELECT * FROM `student_details` WHERE `year`='$thisYear' AND `student_index_number` = '$indexNo'");
    
    if($studentDetails->num_rows != 0) {
        $data = $studentDetails->fetch_assoc();

        $grade = $data["grade"];

        if($grade == 5 | $grade == 6) {
            $conn->query("INSERT INTO `beauty_subject_has_student`(`student_index_number`, `beauty_subject_id`) 
                        VALUES('$indexNo', '$subject')");
            echo "success";
        }
        else {
            echo "error";
        }
    }  
    else {
        echo "noData";
    }
    

?>


