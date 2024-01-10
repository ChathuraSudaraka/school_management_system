<?php 
			session_start();

	$nic = $_GET['nic'];
	$pass = $_GET['pass'];

	$connection = new mysqli("localhost", "root", "Mercy@2005", "sms");
	$checkTable = $connection->query("SELECT * FROM `teacher` WHERE `nic`='$nic'");


	if($checkTable->num_rows == 0) {
		echo("invalid"); // this run when no data left with this nic number
	}
	else {
		$getDetails = $checkTable->fetch_assoc();
		$password = $getDetails['password']; // if nic is correct also check that password is correct
		if ($pass == $password) {
			$_SESSION['teacherNic'] = $nic;  // if nic and password correct store them is session array
			$_SESSION['teacherPass'] = $pass;
			$_SESSION['teacherName'] = $getDetails['first_name'];
			echo("success");
		}
		else {
			echo("invalid");
		}
	
	}



 ?>