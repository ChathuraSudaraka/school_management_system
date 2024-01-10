<?php 
        
session_start();

$nic = $_GET['nic'];
$pass = $_GET['pass'];

$connection = new mysqli("localhost", "root", "Mercy@2005", "sms");

$stmt = $connection->prepare("SELECT * FROM `admin_login` WHERE `nic` = ?");
$stmt->bind_param("s", $nic);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows == 0) {
    echo("invalid"); 
}
else {
    $getDetails = $result->fetch_assoc();
    $password = $getDetails['password']; 
    if ($pass == $password) {
        session_regenerate_id();
        $_SESSION['adminNic'] = $nic;  
        $_SESSION['adminPass'] = $pass;
        echo("success");
    }
    else {
        echo("invalid");
    }
}


 ?>