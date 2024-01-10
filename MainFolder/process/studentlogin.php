<?php 
	
	session_start();
	$indexNumber = $_GET['index'];
	$pass = $_GET['pass'];

	$result = preg_match("/[a-zA-Z]/", $indexNumber);

	if ($result) {
		echo("invalid");
	}
	else{
		$connection = new mysqli("localhost", "root", "Mercy@2005", "sms");
		$checkTable = $connection->query("SELECT * FROM `student` WHERE `index_number`='$indexNumber'");


		if($checkTable->num_rows == 0) {
			echo("invalid"); // this run when no data left with this nic number
		}
		else {
			$getDetails = $checkTable->fetch_assoc();
			$password = $getDetails['password']; // if nic is correct also check that password is correct
			if ($pass == $password) {
				$_SESSION['studentIndex'] = $indexNumber;  // if nic and password correct store them is session array
				$_SESSION['studentPass'] = $pass;
				$_SESSION['currentGrade'] = $getDetails['current_grade'];
				$_SESSION['initialName'] = $getDetails['initial_name'];
				echo("success");
			}
			else {
				echo("invalid");
			}
		
		}

	}

	
 ?>