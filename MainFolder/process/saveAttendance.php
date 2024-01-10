<?php

// Get the attendance data from the request body
$attendanceData = json_decode(file_get_contents('php://input'), true);

// Connect to the database
$db = new mysqli('localhost', 'root', 'Mercy@2005', 'sms');

// Loop through the attendance data
foreach ($attendanceData as $studentId) {
  // Insert a record into the attendance table for each student
 // $stmt = $db->prepare('INSERT INTO `student_attendace` (student_id) VALUES (?)');
 // $stmt->bind_param('i', $studentId);
 // $stmt->execute();
  $today = date("Y-m-d");
  $db->query("INSERT INTO `student_attendance`(`date`, `status`, `student_index_number`) VALUES('$today', 'true', '$studentId')");
}

session_start();
$_SESSION['reminder'] = 0;

// Close the database connection
$db->close();

?>
