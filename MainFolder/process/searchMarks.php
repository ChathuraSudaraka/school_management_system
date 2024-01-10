<?php

session_start();

$year = $_GET['year'];
$term = $_GET['term'];
$indexNo = $_SESSION['studentIndex'];

$connection = new mysqli("localhost", "root", "Mercy@2005", "sms");

$gradeTable = $connection->query("SELECT `grade`, `class` FROM `student_details` WHERE `student_index_number` = '$indexNo'");

$gradeArray = $gradeTable->fetch_assoc();
$grade = $gradeArray['grade'];
$class = $gradeArray['class'];
$intGrade = intval($grade);

if ($intGrade <= 5) {
    $kidMarksTable = $connection->query("SELECT km.*, sd.student_index_number
 FROM kid_marks km
INNER JOIN student_details sd ON km.student_details_id = sd.id
WHERE sd.student_index_number = '$indexNo' AND sd.`year` = '$year' AND km.`term` = '$term'
ORDER BY km.total DESC");

    $kidMarks = $kidMarksTable->fetch_assoc();

    if (!isset($kidMarks['sinhala'])) {
        echo "error";
    } else {
        $getPlace = $connection->query("SELECT km.total, sd.student_index_number,
row_number() over (order by km.total desc) as place
 FROM kid_marks km
INNER JOIN student_details sd ON km.student_details_id = sd.id
WHERE sd.`year` = '$year' AND km.`term` = '$term' AND sd.`class` = '$class' AND sd.`grade`='$intGrade'
ORDER BY km.total DESC");

while ($placeArray = $getPlace->fetch_assoc()) {
    if($placeArray['student_index_number'] == $indexNo) {
        $place = $placeArray['place'];
        break;
    }
}




        echo ("<ul class='list-group list-group-horizontal mt-1'>
                    <li class='list-group-item  col-6 col-md-3'>Sinhala</li>
                    <li class='list-group-item  col-6 col-md-3'>" . $kidMarks['sinhala'] . "</li>
                </ul> 
                <ul class='list-group list-group-horizontal mt-1'>
                    <li class='list-group-item  col-6 col-md-3'>Maths</li>
                    <li class='list-group-item  col-6 col-md-3'>" . $kidMarks['maths'] . "</li>
                </ul> 
                <ul class='list-group list-group-horizontal mt-1'>
                    <li class='list-group-item  col-6 col-md-3'>English</li>
                    <li class='list-group-item  col-6 col-md-3'>" . $kidMarks['english'] . "</li>
                </ul> 
                <ul class='list-group list-group-horizontal mt-1'>
                    <li class='list-group-item  col-6 col-md-3'>Environment</li>
                    <li class='list-group-item  col-6 col-md-3'>" . $kidMarks['environment'] . "</li>
                </ul> 
                <ul class='list-group list-group-horizontal mt-1'>
                    <li class='list-group-item  col-6 col-md-3'>Buddhism</li>
                    <li class='list-group-item  col-6 col-md-3'>" . $kidMarks['buddhism'] . "</li>
                </ul> 
                <ul class='list-group list-group-horizontal mt-1'>
                    <li class='list-group-item  col-6 col-md-3'>Tamil</li>
                    <li class='list-group-item  col-6 col-md-3'>" . $kidMarks['tamil'] . "</li>
                </ul> 
                <ul class='list-group list-group-horizontal mt-1'>
                    <li class='list-group-item  col-6 col-md-3 bg-dark' style='color: white;'>Total</li>
                    <li class='list-group-item  col-6 col-md-3 bg-dark' style='color: white;'>" . $kidMarks['total'] . "</li>
                </ul> 
                <ul class='list-group list-group-horizontal mt-1'>
                    <li class='list-group-item  col-6 col-md-3 bg-dark' style='color: white;'>Place</li>
                    <li class='list-group-item  col-6 col-md-3 bg-dark' style='color: white;'>$place</li>
                </ul>  ");
    }
} else if ($intGrade < 10) {
    $middleMarksTable = $connection->query("SELECT km.*, sd.student_index_number
 FROM middle_marks km
INNER JOIN student_details sd ON km.student_details_id = sd.id
WHERE sd.student_index_number = '$indexNo' AND sd.`year` = '$year' AND km.`term` = '$term'
ORDER BY km.total DESC");
    $middleMarks = $middleMarksTable->fetch_assoc();

    if (!isset($middleMarks['sinhala'])) {
        echo "error";
    } else {
        $getPlace = $connection->query("SELECT km.total, sd.student_index_number,
row_number() over (order by km.total desc) as place
 FROM middle_marks km
INNER JOIN student_details sd ON km.student_details_id = sd.id
WHERE sd.`year` = '$year' AND km.`term` = '$term' AND sd.`class` = '$class' AND sd.`grade`='$intGrade'
ORDER BY km.total DESC");

while ($placeArray = $getPlace->fetch_assoc()) {
    if($placeArray['student_index_number'] == $indexNo) {
        $place = $placeArray['place'];
        break;
    }
}


        echo ("<ul class='list-group list-group-horizontal mt-1'>
                    <li class='list-group-item  col-6 col-md-3'>Sinhala</li>
                    <li class='list-group-item  col-6 col-md-3'>" . $middleMarks['sinhala'] . "</li>
                </ul> 
                <ul class='list-group list-group-horizontal mt-1'>
                    <li class='list-group-item  col-6 col-md-3'>Maths</li>
                    <li class='list-group-item  col-6 col-md-3'>" . $middleMarks['maths'] . "</li>
                </ul>
                <ul class='list-group list-group-horizontal mt-1'>
                    <li class='list-group-item  col-6 col-md-3'>English</li>
                    <li class='list-group-item  col-6 col-md-3'>" . $middleMarks['english'] . "</li>
                </ul> 
                <ul class='list-group list-group-horizontal mt-1'>
                    <li class='list-group-item  col-6 col-md-3'>Science</li>
                    <li class='list-group-item  col-6 col-md-3'>" . $middleMarks['science'] . "</li>
                </ul> 
                <ul class='list-group list-group-horizontal mt-1'>
                    <li class='list-group-item  col-6 col-md-3'>Buddhism</li>
                    <li class='list-group-item  col-6 col-md-3'>" . $middleMarks['buddhism'] . "</li>
                </ul> 
                <ul class='list-group list-group-horizontal mt-1'>
                    <li class='list-group-item  col-6 col-md-3'>History</li>
                    <li class='list-group-item  col-6 col-md-3'>" . $middleMarks['history'] . "</li>
                </ul> 
                <ul class='list-group list-group-horizontal mt-1'>
                    <li class='list-group-item  col-6 col-md-3'>Civics</li>
                    <li class='list-group-item  col-6 col-md-3'>" . $middleMarks['civics'] . "</li>
                </ul> 
                <ul class='list-group list-group-horizontal mt-1'>
                    <li class='list-group-item  col-6 col-md-3'>Geography</li>
                    <li class='list-group-item  col-6 col-md-3'>" . $middleMarks['geography'] . "</li>
                </ul> 
                <ul class='list-group list-group-horizontal mt-1'>
                    <li class='list-group-item  col-6 col-md-3'>Health</li>
                    <li class='list-group-item  col-6 col-md-3'>" . $middleMarks['health'] . "</li>
                </ul> 
                <ul class='list-group list-group-horizontal mt-1'>
                    <li class='list-group-item  col-6 col-md-3'>PTS</li>
                    <li class='list-group-item  col-6 col-md-3'>" . $middleMarks['pts'] . "</li>
                </ul> 
                <ul class='list-group list-group-horizontal mt-1'>
                    <li class='list-group-item  col-6 col-md-3'>Tamil</li>
                    <li class='list-group-item  col-6 col-md-3'>" . $middleMarks['tamil'] . "</li>
                </ul> 
                <ul class='list-group list-group-horizontal mt-1'>
                    <li class='list-group-item  col-6 col-md-3'>Art</li>
                    <li class='list-group-item  col-6 col-md-3'>" . $middleMarks['art'] . "</li>
                </ul> 
                <ul class='list-group list-group-horizontal mt-1'>
                    <li class='list-group-item  col-6 col-md-3 bg-dark' style='color: white;'>Total</li>
                    <li class='list-group-item  col-6 col-md-3 bg-dark' style='color: white;'>" . $middleMarks['total'] . "</li>
                </ul> 
                <ul class='list-group list-group-horizontal mt-1'>
                    <li class='list-group-item  col-6 col-md-3 bg-dark' style='color: white;'>Place</li>
                    <li class='list-group-item  col-6 col-md-3 bg-dark' style='color: white;'>$place</li>
                </ul>");
    }
} else if ($intGrade <= 11) {
    $olMarksTable = $connection->query("SELECT km.*, sd.student_index_number
 FROM ol_marks km
INNER JOIN student_details sd ON km.student_details_id = sd.id
WHERE sd.student_index_number = '$indexNo' AND sd.`year` = '$year' AND km.`term` = '$term'
ORDER BY km.total DESC");
    $olMarks = $olMarksTable->fetch_assoc();

    if (!isset($olMarks['sinhala'])) {
        echo "error";
    } else {
        $getPlace = $connection->query("SELECT km.total, sd.student_index_number,
row_number() over (order by km.total desc) as place
 FROM ol_marks km
INNER JOIN student_details sd ON km.student_details_id = sd.id
WHERE sd.`year` = '$year' AND km.`term` = '$term' AND sd.`class` = '$class' AND sd.`grade`='$intGrade'
ORDER BY km.total DESC");

while ($placeArray = $getPlace->fetch_assoc()) {
    if($placeArray['student_index_number'] == $indexNo) {
        $place = $placeArray['place'];
        break;
    }
}
        echo ("<ul class='list-group list-group-horizontal mt-1'>
                    <li class='list-group-item  col-6 col-md-3'>Sinhala</li>
                    <li class='list-group-item  col-6 col-md-3'>" . $olMarks['sinhala'] . "</li>
                </ul> 
                <ul class='list-group list-group-horizontal mt-1'>
                    <li class='list-group-item  col-6 col-md-3'>Maths</li>
                    <li class='list-group-item  col-6 col-md-3'>" . $olMarks['maths'] . "</li>
                </ul> 
                <ul class='list-group list-group-horizontal mt-1'>
                    <li class='list-group-item  col-6 col-md-3'>English</li>
                    <li class='list-group-item  col-6 col-md-3'>" . $olMarks['english'] . "</li>
                </ul> 
                <ul class='list-group list-group-horizontal mt-1'>
                    <li class='list-group-item  col-6 col-md-3'>Science</li>
                    <li class='list-group-item  col-6 col-md-3'>" . $olMarks['science'] . "</li>
                </ul> 
                <ul class='list-group list-group-horizontal mt-1'>
                    <li class='list-group-item  col-6 col-md-3'>Buddhism</li>
                    <li class='list-group-item  col-6 col-md-3'>" . $olMarks['buddhism'] . "</li>
                </ul> 
                <ul class='list-group list-group-horizontal mt-1'>
                    <li class='list-group-item  col-6 col-md-3'>History</li>
                    <li class='list-group-item  col-6 col-md-3'>" . $olMarks['history'] . "</li>
                </ul> 
                <ul class='list-group list-group-horizontal mt-1'>
                    <li class='list-group-item  col-6 col-md-3'>1st Bucket</li>
                    <li class='list-group-item  col-6 col-md-3'>" . $olMarks['bucket_1'] . "</li>
                </ul> 
                <ul class='list-group list-group-horizontal mt-1'>
                    <li class='list-group-item  col-6 col-md-3'>2nd Bucket</li>
                    <li class='list-group-item  col-6 col-md-3'>" . $olMarks['bucket_2'] . "</li>
                </ul> 
                <ul class='list-group list-group-horizontal mt-1'>
                    <li class='list-group-item  col-6 col-md-3'>3rd Bucket</li>
                    <li class='list-group-item  col-6 col-md-3'>" . $olMarks['bucket_3'] . "</li>
                </ul>
                <ul class='list-group list-group-horizontal mt-1'>
                    <li class='list-group-item  col-6 col-md-3 bg-dark' style='color: white;'>Total</li>
                    <li class='list-group-item  col-6 col-md-3 bg-dark' style='color: white;'>" . $olMarks['total'] . "</li>
                </ul> 
                <ul class='list-group list-group-horizontal mt-1'>
                    <li class='list-group-item  col-6 col-md-3 bg-dark' style='color: white;'>Place</li>
                    <li class='list-group-item  col-6 col-md-3 bg-dark' style='color: white;'>$place</li>
                </ul>  ");
    }
} else if ($intGrade <= 13) {
    $alMarksTable = $connection->query("SELECT km.*, sd.student_index_number
 FROM al_marks km
INNER JOIN student_details sd ON km.student_details_id = sd.id
WHERE sd.student_index_number = '$indexNo' AND sd.`year` = '$year' AND km.`term` = '$term'
ORDER BY km.total DESC");
    $alMarks = $alMarksTable->fetch_assoc();

    if (!isset($alMarks['sinhala'])) {
        echo "error";
    } else {
        $getPlace = $connection->query("SELECT km.total, sd.student_index_number,
row_number() over (order by km.total desc) as place
 FROM al_marks km
INNER JOIN student_details sd ON km.student_details_id = sd.id
WHERE sd.`year` = '$year' AND km.`term` = '$term' AND sd.`class` = '$class' AND sd.`grade`='$intGrade'
ORDER BY km.total DESC");

while ($placeArray = $getPlace->fetch_assoc()) {
    if($placeArray['student_index_number'] == $indexNo) {
        $place = $placeArray['place'];
        break;
    }
}

        echo ("<ul class='list-group list-group-horizontal mt-1'>
                    <li class='list-group-item  col-6 col-md-3'>1st Bucket</li>
                    <li class='list-group-item  col-6 col-md-3'>" . $alMarks['bucket_1'] . "</li>
                </ul> 
                <ul class='list-group list-group-horizontal mt-1'>
                    <li class='list-group-item  col-6 col-md-3'>2nd Bucket</li>
                    <li class='list-group-item  col-6 col-md-3'>" . $alMarks['bucket_2'] . "</li>
                </ul> 
                <ul class='list-group list-group-horizontal mt-1'>
                    <li class='list-group-item  col-6 col-md-3'>3rd Bucket</li>
                    <li class='list-group-item  col-6 col-md-3'>" . $alMarks['bucket_3'] . "</li>
                </ul> 
                <ul class='list-group list-group-horizontal mt-1'>
                    <li class='list-group-item  col-6 col-md-3'>General English</li>
                    <li class='list-group-item  col-6 col-md-3'>" . $alMarks['general_english'] . "</li>
                </ul> 
                <ul class='list-group list-group-horizontal mt-1'>
                    <li class='list-group-item  col-6 col-md-3'>General Knowledge</li>
                    <li class='list-group-item  col-6 col-md-3'>" . $alMarks['general_knowledge'] . "</li>
                </ul> 
                <ul class='list-group list-group-horizontal mt-1'>
                    <li class='list-group-item  col-6 col-md-3'>GIT</li>
                    <li class='list-group-item  col-6 col-md-3'>" . $alMarks['git'] . "</li>
                </ul> 
                <ul class='list-group list-group-horizontal mt-1'>
                    <li class='list-group-item  col-6 col-md-3 bg-dark' style='color: white;'>Total</li>
                    <li class='list-group-item  col-6 col-md-3 bg-dark' style='color: white;'>" . $alMarks['total'] . "</li>
                </ul> 
                <ul class='list-group list-group-horizontal mt-1'>
                    <li class='list-group-item  col-6 col-md-3 bg-dark' style='color: white;'>Place</li>
                    <li class='list-group-item  col-6 col-md-3 bg-dark' style='color: white;'>$place</li>
                </ul>  ");
    }
}


?>