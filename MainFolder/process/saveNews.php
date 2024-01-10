<?php

// Connect to the database
$hostname = 'localhost';
$username = 'root';
$password = 'Mercy@2005';
$database = 'sms';

$conn = new mysqli($hostname, $username, $password, $database);

$newsHeader = $_POST['news-header'];
$newsDescription = $_POST['news-description'];
$newsImage = $_FILES['news-image'];
$grades = $_POST['grades'];
$newsId = $_POST['news-id'];

$imgName = $newsImage['name'];
$path_info = pathinfo($imgName);
$extention = $path_info['extension'];

$image_info = getimagesize($_FILES['news-image']['tmp_name']);
$image_width = $image_info[0];
$image_height = $image_info[1];


$image_type = exif_imagetype($newsImage['tmp_name']);

if ($image_type !== false & $image_width == 1280 && $image_height == 720) {
	$file_name =  uniqid() . "." . $extention;
	$moved = move_uploaded_file($newsImage['tmp_name'], "../news/" . $file_name);
	if($moved) {
		$conn->query("INSERT INTO news(`id`, `header`, `description`, `image`) VALUES('$newsId', '$newsHeader', '$newsDescription', '$file_name')");
		foreach ($grades as $grade) {
			$conn->query("INSERT INTO news_grades(`news_id`, `grade`) VALUES('$newsId', '$grade')");
		}
	}
}
else {
	echo "invalidFileType";
}

?>
