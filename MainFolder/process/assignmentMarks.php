<?php 

	$marks = $_GET['marks'];
	$dbid = $_GET['dbid'];

	$conn = new mysqli("localhost", "root", "Mercy@2005", "sms");

	$conn->query("UPDATE submitted SET marks='$marks' WHERE id='$dbid'");

 ?>