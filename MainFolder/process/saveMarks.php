<?php

session_start();
$conn = mysqli_connect('localhost', 'root', 'Mercy@2005', 'sms');

$json = $_POST["json"];
$obj = json_decode($json);

$sid = $obj->detailsId;
$term = $obj->term;

$teacherGrade = $_SESSION['teacherGrade'];

if ($teacherGrade <= 5) {
  $sinhala = $obj->sinhala;
  $maths = $obj->maths;
  $buddhism = $obj->buddhism;
  $environment = $obj->environment;
  $tamil = $obj->tamil;
  $english = $obj->english;
  $total = $sinhala + $maths + $buddhism + $environment + $tamil + $english;

  $conn->query("INSERT INTO kid_marks(sinhala, maths, english, buddhism, environment, tamil, total, term, student_details_id) 
    VALUES('$sinhala', '$maths', '$english', '$buddhism', '$environment', '$tamil', '$total', '$term', $sid)");
} else if ($teacherGrade <= 9) {
  $sinhala = $obj->sinhala;
  $maths = $obj->maths;
  $buddhism = $obj->buddhism;
  $science = $obj->science;
  $tamil = $obj->tamil;
  $english = $obj->english;
  $health = $obj->health;
  $civics = $obj->civics;
  $art = $obj->esthetics;
  $pts = $obj->pts;
  $geography = $obj->geography;
  $history = $obj->history;

  $total = $sinhala + $maths + $buddhism + $science + $tamil + $english + $health + $civics + $art + $pts + $geography + $history;
  $conn->query("INSERT INTO middle_marks(sinhala, maths, english, buddhism, science, tamil, history, `geography`, health, civics, art, pts, total, term, student_details_id) 
    VALUES('$sinhala', '$maths', '$english', '$buddhism', '$science', '$tamil', '$history', '$geography', '$health', '$civics', '$art', '$pts', '$total', '$term', $sid)");
} else if ($teacherGrade <= 11) {
  $sinhala = $obj->sinhala;
  $maths = $obj->maths;
  $buddhism = $obj->buddhism;
  $science = $obj->science;
  $english = $obj->english;
  $history = $obj->history;
  $bucket_1 = $obj->bucket1;
  $bucket_2 = $obj->bucket2;
  $bucket_3 = $obj->bucket3;

  $total = $science + $maths + $buddhism + $science + $english + $history + $bucket_1 + $bucket_2 + $bucket_3;
  $conn->query("INSERT INTO ol_marks(sinhala, maths, english, buddhism, science, history, bucket_1, bucket_2, bucket_3, total, term, student_details_id) 
    VALUES('$sinhala', '$maths', '$english', '$buddhism', '$science', '$history', '$bucket_1', '$bucket_2', '$bucket_3', '$total', '$term', '$sid')");
} else if ($teacherGrade <= 13) {
  $english = $obj->english;
  $git = $obj->git;
  $gknowledge = $obj->general_knowledge;
  $bucket_1 = $obj->bucket1;
  $bucket_2 = $obj->bucket2;
  $bucket_3 = $obj->bucket3;
  
  $total = $english + $git + $gknowledge + $bucket_1 + $bucket_2 + $bucket_3;
  $conn->query("INSERT INTO al_marks(bucket_1, bucket_2, bucket_3, general_english, general_knowledge, git, total, term, student_details_id) 
    VALUES('$bucket_1', '$bucket_2', '$bucket_3', '$english', '$gknowledge', '$git', '$total', '$term', '$sid')");
}

?>