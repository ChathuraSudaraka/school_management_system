<?php

$nic = $_GET['nic'];
$conn = new mysqli("localhost", "root", "Mercy@2005", "sms");
$table = $conn->query("SELECT nas.nic, nas.`name`,mobile,start_date,end_date, jr.name AS role FROM non_academic_staff nas 
INNER JOIN job_roles jr ON jr.id = nas.role
WHERE nas.nic = '$nic'");

$obj = new stdClass();

if($table->num_rows == 0) {
    $obj->status = 'error';
} else {
    $obj->staff = $table->fetch_assoc();
}

echo json_encode($obj);

?>