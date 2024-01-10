<?php

$indexNo = $_POST['studentIndexNumber'];
$conn = new mysqli("localhost", "root", "Mercy@2005", "sms");

$validate = $conn->query("SELECT `full_name` FROM `student` WHERE index_number='$indexNo'");

if ($validate->num_rows != 0) {
	echo "studentExist";
} else {
	$fullName = $_POST['studentFullName'];
	$initialName = $_POST['studentInitialName'];
	$dateOfBirth = $_POST['studentDateOfBirth'];
	$password = $_POST['studentPassword'];
	$encrollYear = $_POST['enrollYear'];
	$encrollClass = $_POST['encrollclass'];
	$distance = $_POST['distanceToSchool'];
	$gender = $_POST['gender'];
	$nationality = $_POST['nationality'];
	$religion = $_POST['religion'];
	$travelMethod = $_POST['travelMethod'];
	$motherName = $_POST['motherName'];
	$motherNIC = $_POST['motherNIC'];
	$motherNumber = $_POST['motherNumber'];
	$motherJob = $_POST['motherJob'];
	$motherJobAddress = $_POST['motherJobAddress'];
	$motherEmail = $_POST['motherEmail'];
	$fatherName = $_POST['fatherName'];
	$fatherNIC = $_POST['fatherNIC'];
	$fatherNumber = $_POST['fatherNumber'];
	$fatherJob = $_POST['fatherJob'];
	$fatherJobAddress = $_POST['fatherJobAddress'];
	$fatherEmail = $_POST['fatherEmail'];
	$guardianName = $_POST['guardianName'];
	$guardianNIC = $_POST['guardianNIC'];
	$guardianNumber = $_POST['guardianNumber'];
	$guardianJob = $_POST['guardianJob'];
	$guardianJobAddress = $_POST['guardianJobAddress'];
	$guardianEmail = $_POST['guardianEmail'];
	$emergrencyNumber = $_POST['emergrencyNumber'];
	$emergrencyEmail = $_POST['emergrencyEmail'];
	$address = $_POST['address'];
	$scholarship = $_POST['scholarship'];
	$photo = $_FILES['photo'];
	$previousSchool = $_POST['previousSchool'];

	$file_name = '';


	$imgName = $photo['name'];
	$path_info = pathinfo($imgName);
	if (isset($path_info['extension'])) {
		$extention = $path_info['extension'];

		$image_info = getimagesize($_FILES['photo']['tmp_name']);
		$image_width = $image_info[0];
		$image_height = $image_info[1];


		$image_type = exif_imagetype($photo['tmp_name']);

		if ($image_type !== false & $image_width == 100 && $image_height == 100) {
			$file_name = uniqid() . "." . $extention;
			$moved = move_uploaded_file($photo['tmp_name'], "../profileImg/" . $file_name);
		}
	} else {
		$file_name = "default.png";
	}



	$conn->query("INSERT INTO student(`index_number`, `full_name`, `initial_name`, `date_of_birth`, `scholarship`, `enroll_year`, `encroll_class`, `mother_name`, `mother_nic`, `mother_number`, `mother_job`, `mother_job_address`, `mother_email`, `father_name`, `father_nic`, `father_number`, `father_job`, `father_job_address`, `father_email`, `guardian_name`, `guardian_nic`, `guardian_number`, `guardian_job`, `guardian_job_address`, `guardian_email`, `emergency_number`, `emergency_email`,`address`, `current_grade`, `current_class`, `password`, `distance`, `nationality_id`, `religion_id`, `travel_id`, `gender_id`, `path`, `previous_school`) VALUES('$indexNo', '$fullName', '$initialName', '$dateOfBirth', '$scholarship', '$encrollYear', '$encrollClass', '$motherName', '$motherNIC', '$motherNumber', '$motherJob', '$motherJobAddress', '$motherEmail', '$fatherName', '$fatherNIC', '$fatherNumber', '$fatherJob', '$fatherJobAddress', '$fatherEmail', '$guardianName', '$guardianNIC', '$guardianNumber', '$guardianJob', '$guardianJobAddress', '$guardianEmail', '$emergrencyNumber', '$emergrencyEmail', '$address', '', '', '$password', '$distance', '$nationality', '$religion', '$travelMethod', '$gender', '$file_name', '$previousSchool')");
	echo "success";
}
?>