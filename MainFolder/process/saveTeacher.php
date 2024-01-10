<?php

$teacherNIC = $_POST['teacherNIC'];

$connection = new mysqli("localhost", "root", "Mercy@2005", "sms");
$validate = $connection->query("SELECT * FROM `teacher` WHERE nic = '$teacherNIC'");

if ($validate->num_rows != 0) {
	$isIn = false;
	$data = $validate->fetch_assoc();

	if($data["date_of_resignation"] == null) {
		$isIn = true;
	}

	if($isIn) {
		echo "error";
	}
	else {
		$teacherFirstName = $_POST['teacherFirstName'];
		$teacherLastName = $_POST['teacherLastName'];
		$teacherFullName = $_POST['teacherFullName'];
		$teacherDateOfBirth = $_POST['teacherDateOfBirth'];
		$teacherGender = $_POST['teacherGender'];
		$teacherNationality = $_POST['teacherNationality'];
		$teacherReligion = $_POST['teacherReligion'];
		$qualification = $_POST['qualification'];
		$teacherContactNumber = $_POST['teacherContactNumber'];
		$teacherEmail = $_POST['teacherEmail'];
		$teacherPassword = $_POST['teacherPassword'];
		$teacherAddress = $_POST['address'];
		
		$connection->query("UPDATE teacher SET qualification = '$qualification' WHERE nic = '$teacherNIC'");
		$connection->query("UPDATE teacher SET email = '$teacherEmail' WHERE nic = '$teacherNIC'");
		$connection->query("UPDATE teacher SET contact_number = '$teacherContactNumber' WHERE nic = '$teacherNIC'");
		$connection->query("UPDATE teacher SET `password` = '$teacherPassword' WHERE nic = '$teacherNIC'");
		$connection->query("UPDATE teacher SET `address` = '$teacherAddress' WHERE nic = '$teacherNIC'");
		$connection->query("UPDATE teacher SET `date_of_resignation` = NULL WHERE nic = '$teacherNIC'");
	
		echo "success";

	}
	
} else {

	$teacherFirstName = $_POST['teacherFirstName'];
	$teacherLastName = $_POST['teacherLastName'];
	$teacherFullName = $_POST['teacherFullName'];
	$teacherDateOfBirth = $_POST['teacherDateOfBirth'];
	$teacherGender = $_POST['teacherGender'];
	$teacherNationality = $_POST['teacherNationality'];
	$teacherReligion = $_POST['teacherReligion'];
	$qualification = $_POST['qualification'];
	$teacherContactNumber = $_POST['teacherContactNumber'];
	$teacherEmail = $_POST['teacherEmail'];
	$teacherPassword = $_POST['teacherPassword'];
	$teacherAddress = $_POST['address'];



	$connection->query("INSERT INTO teacher(`nic`, `full_name`, `address`, `first_name`, `last_name`, `qualification`, `contact_number`, `email`, `password`, `nationality_id`, `religion_id`, `gender_gender_id`, `date_of_birth`)
		 VALUES('$teacherNIC', '$teacherFullName', '$teacherAddress', '$teacherFirstName', '$teacherLastName', '$qualification', '$teacherContactNumber', '$teacherEmail', '$teacherPassword', '$teacherNationality', '$teacherReligion', '$teacherGender', '$teacherDateOfBirth')");

	echo "success";
}

?>