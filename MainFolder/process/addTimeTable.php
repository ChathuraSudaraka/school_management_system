<?php 

	$conn = new mysqli("localhost", "root", "Mercy@2005", "sms");
	$thsId = array();

	$grade = $_POST['grade'];
	$class = $_POST['class'];
	$year = $_POST['year'];

	for ($i=1; $i <= 40; $i++) {
	    $subject = $_POST['subject_'.$i];
	    $teacher = $_POST['teacher_'.$i];
	   	
	   	$getSubId = $conn->query("SELECT * FROM `subject` WHERE `name`='$subject'");
	   	$subId = $getSubId->fetch_assoc();
	   	$subjectId = $subId["id"];

	   	$getThsId = $conn->query("SELECT * FROM `teacher_has_subject` WHERE `teacher_nic`='$teacher' AND `subject_id`='$subjectId'");

	   	$thsIdArray = $getThsId->fetch_assoc();
	   	$tsId = $thsIdArray["id"];

	   	array_push($thsId, $tsId);
	   	if(count($thsId) % 8 == 0) {
	   		if($i <= 8) {
	   			$a = $thsId[1];
	   			$b = $thsId[2];
	   			$c = $thsId[3];
	   			$d = $thsId[4];
	   			$e = $thsId[5];
	   			$f = $thsId[6];
	   			$g = $thsId[7];
	   			$h = $thsId[8];
	   			$day = 1;
	   		}
	   		else if($i <= 16) {
	   			$a = $thsId[9];
	   			$b = $thsId[10];
	   			$c = $thsId[11];
	   			$d = $thsId[12];
	   			$e = $thsId[13];
	   			$f = $thsId[14];
	   			$g = $thsId[15];
	   			$h = $thsId[16];
	   			$day = 2;
	   		}
	   		else if($i <= 24) {
	   			$a = $thsId[17];
	   			$b = $thsId[18];
	   			$c = $thsId[19];
	   			$d = $thsId[20];
	   			$e = $thsId[21];
	   			$f = $thsId[22];
	   			$g = $thsId[23];
	   			$h = $thsId[24];
	   			$day = 3;
	   		} 
	   		else if($i <= 32) {
	   			$a = $thsId[25];
	   			$b = $thsId[26];
	   			$c = $thsId[27];
	   			$d = $thsId[28];
	   			$e = $thsId[29];
	   			$f = $thsId[30];
	   			$g = $thsId[31];
	   			$h = $thsId[32];
	   			$day = 4;
	   		}
	   		else {
	   			$a = $thsId[33];
	   			$b = $thsId[34];
	   			$c = $thsId[35];
	   			$d = $thsId[36];
	   			$e = $thsId[37];
	   			$f = $thsId[38];
	   			$g = $thsId[39];
	   			$h = $thsId[40];
	   			$day = 5;
	   		}
	   		$conn->query("INSERT INTO `time_table`(`grade`,`class`, `period_1`, `period_2`, `period_3`, `period_4`, `period_5`, `period_6`, `period_7`, `period_8`, `day_id`, `year`) VALUES('$grade', '$class', '$a', '$b', '$c', '$d', '$e', '$f', '$g', '$h', '$day', '$year')");

	   	}
	}


 ?>