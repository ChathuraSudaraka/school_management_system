<?php

session_start();

$nic = $_POST['nic'];
$password = $_POST['password'];

$conn = new mysqli("localhost", "root", "Mercy@2005", "sms");
$table = $conn->query("SELECT * FROM `lib_login` WHERE `nic`='$nic'");

if($table->num_rows == 0) {
    echo "error";
}
else {
    $data = $table->fetch_assoc();
    if($data["password"] == $password) {
        $_SESSION["libAdminNic"] = $nic;
        $_SESSION["libAdminPassword"] = $password;
        echo "success";
    }
    else {
        echo "error";
    }
}

?>