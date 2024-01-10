<?php

$indexNo;
$name;
$studentData;
$connection = new mysqli("localhost", "root", "Mercy@2005", "sms");

$currentYear = date('Y'); // get current yeasr
if (isset($_GET['index'])) {
    $indexNo = $_GET['index'];
    $studentData = $connection->query("SELECT student.*, nationality.name AS n_name, 
    religion.name AS r_name, 
    gender.name AS g_name,
    travel_method.name AS t_name,
    student_details.grade,class,service_payment AS payment
    FROM `student`
    INNER JOIN nationality ON nationality.nationality_id = student.nationality_id
    INNER JOIN religion ON religion.religion_id = student.religion_id
    INNER JOIN gender ON gender.gender_id = student.gender_id
    LEFT JOIN student_details ON student_details.student_index_number = student.index_number AND student_details.`year` = $currentYear
    INNER JOIN travel_method ON travel_method.travel_id = student.travel_id
    WHERE student.index_number='$indexNo'");
} else if (isset($_GET['name'])) {
    $name = $_GET['name'];
    // select by name
    $studentData = $connection->query("SELECT student.*, nationality.name AS n_name, 
religion.name AS r_name, 
gender.name AS g_name,
travel_method.name AS t_name,
student_details.grade,class,service_payment AS payment
FROM `student`
INNER JOIN nationality ON nationality.nationality_id = student.nationality_id
INNER JOIN religion ON religion.religion_id = student.religion_id
INNER JOIN gender ON gender.gender_id = student.gender_id
LEFT JOIN student_details ON student_details.student_index_number = student.index_number AND student_details.`year` = $currentYear
INNER JOIN travel_method ON travel_method.travel_id = student.travel_id
WHERE student.full_name='$name'");
}




if ($studentData->num_rows == 0) {
    echo ("error");
} else {
    $allData = $studentData->fetch_assoc();
    $fullName = $allData['full_name'];
    $initialName = $allData['initial_name'];
    $indexNo = $allData["index_number"];
    session_start();

    $link1 = "adminSearchStudent.php";
    $link2 = "adminGuardian.php";
    $link3 = "adminContact.php";

    if (isset($_SESSION['teacherNic'])) {
        $teacherClass = $_SESSION['teacherClass'];
        $teacherGrade = $_SESSION['teacherGrade'];
        if ($allData['grade'] == $teacherGrade & $allData['class'] == $teacherClass) {
            $link1 = "searchStudent.php";
            $link2 = "teacherGuardian.php";
            $link3 = "teacherContact.php";
        } else {
            echo ("noPermission");
            exit();
        }
    }



    // search student hhouse and color
    $devideIndex = $indexNo % 4;

    if ($devideIndex == 0) {
        $house = "Suranimala";
        $houseColor = "green";
    } else if ($devideIndex == 1) {
        $house = "Welusumana";
        $houseColor = "yellow";
    } else if ($devideIndex == 2) {
        $house = "Abhaya";
        $houseColor = "blue";
    } else {
        $house = "Nandimithra";
        $houseColor = "red";
    }

    // Check Service Payment Paid or not

    if ($allData['payment'] == 'no') {
        $paymentColor = "#ff2c2c";
    } else {
        $paymentColor = "#2cae6b";
    }

    $indexNo = $allData["index_number"];
    $_SESSION['index_number'] = $allData["index_number"];
    $_SESSION['motherName'] = $allData['mother_name'];
    $_SESSION['motherNIC'] = $allData['mother_nic'];
    $_SESSION['motherNumber'] = $allData['mother_number'];
    $_SESSION['motherJob'] = $allData['mother_job'];
    $_SESSION['motherJobAddress'] = $allData['mother_job_address'];
    $_SESSION['motherEmail'] = $allData['mother_email'];
    $_SESSION['fatherName'] = $allData['father_name'];
    $_SESSION['fatherNIC'] = $allData['father_nic'];
    $_SESSION['fatherNumber'] = $allData['father_number'];
    $_SESSION['fatherJob'] = $allData['father_job'];
    $_SESSION['fatherJobAddress'] = $allData['father_job_address'];
    $_SESSION['fatherEmail'] = $allData['father_email'];
    $_SESSION['guardianName'] = $allData['guardian_name'];
    $_SESSION['guardianNIC'] = $allData['guardian_nic'];
    $_SESSION['guardianNumber'] = $allData['guardian_number'];
    $_SESSION['guardianJob'] = $allData['guardian_job'];
    $_SESSION['guardianJobAddress'] = $allData['guardian_job_address'];
    $_SESSION['guardianEmail'] = $allData['guardian_email'];
    $_SESSION['emergencyNumber'] = $allData['emergency_number'];
    $_SESSION['emergencyEmail'] = $allData['emergency_email'];
    $_SESSION['address'] = $allData['address'];

    $resignation = '';

    if ($allData["date_of_resignation"] == NULL) {
        $resignation = 'none';
    } else {
        $resignation = $allData["date_of_resignation"];
    }

    $attendanceTable = $connection->query("SELECT DISTINCT `date` FROM student_attendance WHERE `date` LIKE '$currentYear%'");
    $allDays = $attendanceTable->num_rows;

    $studentAttendanceTable = $connection->query("SELECT DISTINCT `date` FROM student_attendance WHERE `date` LIKE '$currentYear%' AND `student_index_number` = '$indexNo' AND `status`='true'");
    $sAllDays = $studentAttendanceTable->num_rows;

    $precentage = intval($sAllDays) / intval($allDays) * 100;
    echo '  <div class="row">
                         <div class="col-12 col-md-3">
                        <div data-bs-toggle="modal" data-bs-target="#newModal" class="rounded d-flex align-items-center justify-content-between p-4" style="background: ' . $paymentColor . '; color: white;" id="paymentViewer">
                            <i class="bi bi-cash fa-2x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Facility charges</p>
                                <h6 class="mb-0 text-dark"> 3260 </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="bi bi-percent fa-2x text-dark"></i>
                            <div class="ms-3">
                                <p class="mb-2">student attendance</p>
                                <h6 class="mb-0 text-dark">' . intval($precentage) . '%</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div data-bs-target="#reModal" data-bs-toggle="modal" class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="bi bi-calendar-week-fill fa-2x text-dark"></i>
                            <div class="ms-3">
                                <p class="mb-2">Date Of Resignation</p>
                                <h6 class="mb-0 text-dark" id="resignation">' . $resignation . '</h6>
                            </div>
                        </div>
                    </div>
                    </div>

                    <!-- resignation modal -->

                    <div class="modal fade" id="reModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-dark" id="exampleModalToggleLabel">Modal 1</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Enter date of Resignation:
        <input class="form-control bg-secondary text-dark pt-2" id="date" type="date"/>
      </div>
      <div class="modal-footer">
        <button class="btn" style="background: #026df7; color: white;" onclick="updateResignation(' . $indexNo . ');" data-bs-dismiss="modal" aria-label="Close">Update</button>
      </div>
    </div>
  </div>
</div>
</div>

            <!-- end resignation modal -->

                   <!--modal Start-->

                   <div class="modal fade" id="newModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Warning</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Do you want change this ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn" data-bs-dismiss="modal" onclick="changePayment(event);" style="background: #006ee5;color: white;" data-class="' . $allData["class"] . '" data-grade="' . $allData["grade"] . '" data-index="' . $allData["index_number"] . '" >Yes</button>
      </div>
    </div>
  </div>
</div>

                   <!--modal end-->
                </div>
            </div>
            <!-- Sale & Revenue End -->

            <!-- Profile Start -->
            <div class="container-fluid pt-4 px-4">
                <h4 class="fw-bold py-3 mb-4"><span class="text-dark fw-light">Student profile</span></h4>

                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-pills flex-column flex-md-row mb-3">
                            <div class="btn-group " role="group" aria-label="Basic example">
                                <a href="' . $link1 . '"><button type="button"
                                        class="btn btn-primary">Student Details</button></a>
                                <a href="' . $link2 . '"><button type="button"
                                        class="btn btn-primary ms-2">Guardian Details</button></a>
                                <a href="' . $link3 . '"><button type="button"
                                        class="btn btn-primary ms-2">Contact Details</button></a>
                            </div>
                        </ul>

                        <div class="card mb-4">
                            <h5 class="card-header text-dark">Student Details</h5>
                            <!-- Account -->
                            <div class="card-body">
                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                    <img src="profileImg/' . $allData["path"] . '"
                                        alt="user-avatar" height="100" width="100" />
                                    <div class="button-wrapper">
                                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                            <span class="d-none d-sm-block ">Add a photo</span>
                                            <i class="bi bi-upload"></i>
                                            <input type="file" id="upload" class="account-file-input " hidden
                                                accept="image/png, image/jpeg" />
                                        </label>
                                        <p class="text-muted mb-0">Hello There...!</p>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-0" />
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="FullName" class="form-label">Full Name</label>
                                        <input class="form-control bg-secondary text-dark" type="text" id="fullName" name="fullName"
                                            value="' . $fullName . '" autofocus />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="Namewithinitials" class="form-label">Name with initials</label>
                                        <input class="form-control bg-secondary text-dark" type="text" name="initialName"
                                            id="initialName" value="' . $initialName . '" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="Dateofbirth" class="form-label">Date of birth</label>
                                        <input class="form-control bg-secondary text-dark" type="text" id="dob"
                                            name="Dateofbirth" value="' . $allData["date_of_birth"] . '" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="Gender" class="form-label">Gender</label>
                                        <input type="text" disabled class="form-control bg-secondary text-dark" id="Gende" name="Gender"
                                            value="' . $allData["g_name"] . '" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" class="form-control bg-secondary text-dark" id="address" name="address"
                                            value="' . $allData["address"] . '" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="Indexnumber" class="form-label">Index number</label>
                                        <input class="text-dark form-control bg-secondary" disabled type="text" id="index" name="Indexnumber"
                                            value="' . $allData["index_number"] . '" maxlength="6" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="Scholarship" class="form-label">Scholarship</label>
                                        <input type="text" class="text-dark form-control bg-secondary" id="zipCode" name="Scholarship"
                                            value="' . $allData["scholarship"] . '" disabled/>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="Nerollyear" class="form-label">Enroll year</label>
                                        <input id="Nerollyear" class="text-dark bg-secondary form-control" disabled name="Nerollyear"
                                            value="' . $allData["enroll_year"] . '" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="Encrollclass" class="form-label">Enroll class</label>
                                        <input id="Encrollclass" class="text-dark bg-secondary form-control" disabled name="Encrollclass"
                                            value="' . $allData["encroll_class"] . '" />

                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="address" class="form-label">Previous School</label>
                                        <input type="text" class="form-control bg-secondary text-dark" id="pSchool" name="pSchool"
                                            value="' . $allData["previous_school"] . '" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="Nationality" class="form-label">Nationality</label>
                                        <input id="nationality" class="text-dark bg-secondary form-control" name="nationality"
                                            value="' . $allData["n_name"] . '" />

                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="Religion" class="form-label">Religion</label>
                                        <input id="religion" class="text-dark bg-secondary form-control" name="religion"
                                            value="' . $allData["r_name"] . '" />
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="phoneNumber">House</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text" style="background: ' . $houseColor . '"></span>
                                            <input type="text" id="phoneNumber" disabled name="phoneNumber"
                                                class="form-control text-dark bg-secondary" value="' . $house . '" />
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="distance">Distance to School</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" id="disToSchool" name="disToSchool"
                                                class="form-control text-dark bg-secondary" value="' . $allData["distance"] . '" />
                                                <span class="input-group-text">KM</span>
                                        </div>
                                    </div>
                                <div class="mt-2">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                      Update
                                    </button>
                                </div>
                                </div>
                            <!-- /Account -->
                        </div>
                        <div class="card">
                            <h5 class="card-header text-primary">External skills</h5>
                            <div class="card-body">
                                <div class="mb-3 col-12 mb-0">
                                    <div class="alert alert-warning">
                                        <ul>
                                            <li>
                                                <h6 class="alert-heading fw-bold mb-1">Scout</h6>
                                            </li>
                                            <li>
                                                <h6 class="alert-heading fw-bold mb-1">Buddhist Association</h6>
                                            </li>
                                            <li>
                                                <h6 class="alert-heading fw-bold mb-1">Cricket</h6>
                                            </li>
                                            <li>
                                                <h6 class="alert-heading fw-bold mb-1">Photographic Association</h6>
                                            </li>
                                            <li>
                                                <h6 class="alert-heading fw-bold mb-1">Hockey</h6>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Profile End -->

            <!-- Sales Chart Start -->
            <div class="container-fluid p-4 px-4 bg-secondary rounded">
                <div class="row g-4">
                   <h3 class="text-dark">Payment History</h3> 
                   <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <th>Year</th>
                                <th>Class</th>
                                <th>Teacher</th>
                                <th>Payment</th>
                            </thead>
                            <tbody>';

    $paymentTable = $connection->query("SELECT sd.*, t.full_name  FROM student_details sd
                            LEFT JOIN class_teacher ct ON ct.`year` = sd.`year`
                            AND ct.class = sd.class AND ct.grade = sd.grade
                            LEFT JOIN teacher t ON t.nic = ct.teacher_nic
                            WHERE sd.student_index_number = '$indexNo'");

    if ($paymentTable->num_rows == 0) {
        echo '<tr>
                                <td colspan="5" style="background: #ff9d5c; color: red;">There Are No Details Available</td>
                             </tr>';
    } else {
        for ($i = 1; $i <= $paymentTable->num_rows; $i++) {
            $payment = $paymentTable->fetch_assoc();
            $color = '';
            if (strtoupper($payment["service_payment"]) == "YES") {
                $color = "green";
            } else {
                $color = "red";
            }
            if ($payment["full_name"] == NULL) {
                $payment["full_name"] = 'No Records';
            }
            echo '<tr>
                                     <td>' . $payment["year"] . '</td>
                                     <td>' . $payment["grade"] . '-' . $payment["class"] . '</td>
                                     <td>' . $payment["full_name"] . '</td>
                                     <td style="background: ' . $color . ';"></td>
                                 </tr>';
        }
    }

    echo '</tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Sales Chart End -->


            <!-- Recent Sales Start -->
            <div class="container-fluid mt-3 pt-4 px-4 bg-secondary text-center rounded p-4">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0 text-dark">Marks table</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th colspan="2">1st term</th>
                                    <th colspan="2">2nd term</th>
                                    <th colspan="2">3rd term</th>
                                </tr>
                                <tr>
    
                                    <th scope="col">Roll No</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Marks</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Marks</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Marks</th>
                                </tr>
                            </thead>
                            <tbody>


                                <tr>
                                    
                                    <td>1</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>13</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>14</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>15</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>16</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>17</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

                    ';
}
?>