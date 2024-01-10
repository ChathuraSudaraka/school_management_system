<?php

    $subject1 = $_POST['first'];
    $subject2 = $_POST['second'];
    $subject3 = $_POST['third'];
    $index = $_POST['index'];
    $thisYear = date("Y");

    $conn = new mysqli("localhost", "root", "Mercy@2005", "sms");

    $studentDetails = $conn->query("SELECT * FROM `student_details` WHERE `year`='$thisYear' AND `student_index_number` = '$index'");
    
    if($studentDetails->num_rows != 0) {
        $data = $studentDetails->fetch_assoc();

        $grade = $data["grade"];

        if($grade == 11 | $grade == 12) {
            $conn->query("INSERT INTO `al_subject_has_student`(`student_index_number`, `bucket_1`,`bucket_2`,`bucket_3`) 
                        VALUES('$index', '$subject1','$subject2','$subject3')");
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