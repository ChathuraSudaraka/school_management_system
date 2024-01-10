<?php


$nic = $_POST['nic'];
if(isset($_POST['selectedSubjects'])){
    $selectedSubjects = json_decode($_POST['selectedSubjects']);
    if (is_array($selectedSubjects)) {
        $conn = mysqli_connect("localhost", "root", "Mercy@2005", "sms");
        foreach($selectedSubjects as $subject) {
            $query = "INSERT INTO `teacher_has_subject`(`teacher_nic`, `subject_id`) VALUES('$nic', '$subject')";
            $result = mysqli_query($conn, $query);
    if ($result) {
        echo "Subject successfully added to the database.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
} else {
    echo "Error: selectedSubjects is not an array";
}
}


?>