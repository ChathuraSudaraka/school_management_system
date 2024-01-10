<?php

session_start();
$index = $_GET["index"];
$currentYear = date("Y");
$conn = new mysqli("localhost", "root", "Mercy@2005", "sms");

$student = $conn->query("SELECT student.*, nationality.name AS n_name, 
religion.name AS r_name, 
gender.name AS g_name,
travel_method.name AS t_name,
student_details.grade,class,service_payment AS payment,
student_details.id AS details_id
FROM `student`
INNER JOIN nationality ON nationality.nationality_id = student.nationality_id
INNER JOIN religion ON religion.religion_id = student.religion_id
INNER JOIN gender ON gender.gender_id = student.gender_id
LEFT JOIN student_details ON student_details.student_index_number = student.index_number AND student_details.`year` = $currentYear
INNER JOIN travel_method ON travel_method.travel_id = student.travel_id
WHERE student.index_number='$index'");

$allData = $student->fetch_assoc();
$obj = new stdClass();

if ($student->num_rows == 0) {
    $obj->status = "error";
} else {
    $mistake = $conn->query("SELECT sd.grade, sd.class ,m.*, COALESCE(t.full_name, a.name) AS name
    FROM mistake m
    LEFT JOIN teacher t ON m.teacher_role = '0' AND t.nic = m.teacher
    LEFT JOIN admin_login a ON m.teacher_role != '0' AND a.nic = m.teacher
    INNER JOIN student_details sd ON sd.id = m.details_number 
    WHERE m.`level` = 4 AND index_number = '$index'
    ORDER BY `date` DESC");

    if($mistake->num_rows == 0) {
        $obj->mistake = 'noData'; 
    }
    else {
        $mistakeArray = array();
        for($i=0; $i < $mistake->num_rows; $i++) {
            array_push($mistakeArray, $mistake->fetch_assoc());
        }
        $obj->mistake = $mistakeArray;
    }

    if (isset($_SESSION["teacherNic"])) {
        $validateTeacher = $conn->query("SELECT * FROM teacher t
    LEFT JOIN class_teacher ct ON t.nic = ct.teacher_nic
    WHERE t.nic = '" . $_SESSION['teacherNic'] . "'");
        $teacherData = $validateTeacher->fetch_assoc();

        $attendanceTable = $conn->query("SELECT DISTINCT `date` FROM student_attendance WHERE `date` LIKE '$currentYear%'");
        $allDays = $attendanceTable->num_rows;

        $studentAttendanceTable = $conn->query("SELECT DISTINCT `date` FROM student_attendance WHERE `date` LIKE '$currentYear%' AND `student_index_number` = '$index' AND `status`='true'");
        $sAllDays = $studentAttendanceTable->num_rows;

        $precentage = intval($sAllDays) / intval($allDays) * 100;

        $obj->student = $allData;
        $obj->precentage = $precentage;

        $array = array();
        $getPayments = $conn->query("SELECT sd.*, t.full_name  FROM student_details sd
        LEFT JOIN class_teacher ct ON ct.`year` = sd.`year`
        AND ct.class = sd.class AND ct.grade = sd.grade
        LEFT JOIN teacher t ON t.nic = ct.teacher_nic
        WHERE sd.student_index_number = '$index'");

        if ($getPayments->num_rows == 0) {
            $obj->payment = "noData";
        } else {
            for ($i = 0; $i < $getPayments->num_rows; $i++) {
                $paymentObj = new stdClass();
                $paymentObj->detailes = $getPayments->fetch_assoc();
                array_push($array, $paymentObj);
            }

            $obj->payment = $array;
        }

        if ($allData["grade"] == $teacherData["grade"] && $allData["class"] == $teacherData["class"]) {
            $obj->student = $allData;
        } else {
            $obj->status = "permission";
        }

        echo json_encode($obj);
        exit();
    } else {
        $attendanceTable = $conn->query("SELECT DISTINCT `date` FROM student_attendance WHERE `date` LIKE '$currentYear%'");
        $allDays = $attendanceTable->num_rows;

        $studentAttendanceTable = $conn->query("SELECT DISTINCT `date` FROM student_attendance WHERE `date` LIKE '$currentYear%' AND `student_index_number` = '$index' AND `status`='true'");
        $sAllDays = $studentAttendanceTable->num_rows;

        $precentage = intval($sAllDays) / intval($allDays) * 100;

        $obj->student = $allData;
        $obj->precentage = $precentage;

        $array = array();
        $getPayments = $conn->query("SELECT sd.*, t.full_name  FROM student_details sd
        LEFT JOIN class_teacher ct ON ct.`year` = sd.`year`
        AND ct.class = sd.class AND ct.grade = sd.grade
        LEFT JOIN teacher t ON t.nic = ct.teacher_nic
        WHERE sd.student_index_number = '$index'");

        if ($getPayments->num_rows == 0) {
            $obj->payment = "noData";
        } else {
            for ($i = 0; $i < $getPayments->num_rows; $i++) {
                $paymentObj = new stdClass;
                $paymentObj->detailes = $getPayments->fetch_assoc();
                array_push($array, $paymentObj);
            }

            $obj->payment = $array;
        }
    }
}

echo json_encode($obj);

?>