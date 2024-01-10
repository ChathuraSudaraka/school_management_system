<?php

session_start();
if (!isset($_SESSION['studentIndex'])) {
    header("location: student.php");
}

$indexNo = $_SESSION['studentIndex'];
$thisYear = date("Y");

$connection = new mysqli("localhost", "root", "Mercy@2005", "sms");
$studentTable = $connection->query("SELECT * FROM `student` WHERE `index_number`='$indexNo'");
$studentData = $studentTable->fetch_assoc();

$nationalityTable = $connection->query("SELECT `name` FROM `nationality` WHERE `nationality_id` IN (SELECT `nationality_id` FROM `student` WHERE `index_number`='$indexNo')");
$getNation = $nationalityTable->fetch_assoc();

$religionTable = $connection->query("SELECT `name` FROM `religion` WHERE `religion_id` IN (SELECT `religion_id` FROM `student` WHERE `index_number`='$indexNo')");
$getReligion = $religionTable->fetch_assoc();

$travelTable = $connection->query("SELECT `name` FROM `travel_method` WHERE `travel_id` IN (SELECT `travel_id` FROM `student` WHERE `index_number`='$indexNo')");
$getTravel = $travelTable->fetch_assoc();

$genderTable = $connection->query("SELECT `name` FROM `gender` WHERE `gender_id` IN (SELECT `gender_id` FROM `student` WHERE `index_number`='$indexNo')");
$getGender = $genderTable->fetch_assoc();

$getClassInfo = $connection->query("SELECT * FROM `student_details` WHERE `student_index_number`='$indexNo' AND `year`='$thisYear'");
$classInfo = $getClassInfo->fetch_assoc();

$fullName = $studentData['full_name'];
$initialName = $studentData['initial_name'];
$dateOfBirth = $studentData['date_of_birth'];
$encrollYear = $studentData['enroll_year'];
$encrollClass = $studentData['encroll_class'];
$address = $studentData['address'];
$distance = $studentData['distance'];
$currentGrade = $classInfo['grade'];
$currentClass = $classInfo['class'];
$scholarship = $studentData['scholarship'];
$nationality = $getNation['name'];
$religion = $getReligion['name'];
$travel = $getTravel['name'];
$house = "";
$houseColor = "";
$gender = $getGender["name"];



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


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Student - Sri Dharmaloka College</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border" style="width: 3rem; height: 3rem; color: orange;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3 nscroll bg-secondary"
            style="border-right: black 2px solid; border-top-right-radius: 8px; border-bottom-right-radius: 8px;">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="dashboard.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary text-center hide-text">Sri Dharmaloka</h3>
                    <h3 class="text-primary text-center hide-text">College</h3>
                </a>

                <div class="d-flex align-items-center ms-4 mb-4 flex-column">
                    <div class="d-flex align-items-center justify-content-center w-100">
                        <img src="img/badge.png" class="schoolBadge" style="height: 190px;">
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="dashboard.php" class="nav-item nav-link active"><i
                            class="fa fa-tachometer-alt me-2"></i>Information</a>
                    <a href="attendance.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Attendance</a>
                    <a href="marks.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Marks</a>
                    <a href="table.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Time Table</a>
                    <a href="studentAssignment.php" class="nav-item nav-link"><i
                            class="bi bi-journal-bookmark-fill me-2"></i></i>Assignments</a>
                    <a href="payment.php" class="nav-item nav-link" onclick="payment();"><i
                            class="fa fa-chart-bar me-2"></i>Payment</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="dashboard.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <div class="ms-2">
                                        <span class="fw-normal mb-0 text-dark">You Don't Have Any Messages</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notification</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <span class="fw-normal mb-0 text-dark">You Don't Have Any Notification</span>
                            </a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="#" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">
                                <?php echo $initialName; ?>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="dashboard.php" class="dropdown-item">Dashboard</a>
                            <a href="#" class="dropdown-item" onclick="logOut();">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <!-- Profile Start -->
            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4"><span class="text-dark fw-light">My Information</span></h4>

                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-pills flex-column flex-md-row mb-3">
                            <li class="nav-item">
                                <a class="btn btn-primary mx-2 mb-2" href="profile-student.php"><i
                                        class="bx bx-bell me-1"></i>
                                    Student Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-primary mx-2 mb-2" href="profile-guardian.php"><i
                                        class="bx bx-bell me-1"></i> Guardian Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-primary mx-2 mb-2" href="profile-contact.php"><i
                                        class="bx bx-link-alt me-1"></i> Contact Details</a>
                            </li>
                        </ul>
                        <div class="card mb-4">
                            <h5 class="card-header text-primary">Student Details</h5>
                            <!-- Account -->
                            <div class="card-body">
                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                    <img src="profileImg/<?php echo $studentData['path'] ?>" alt="user-avatar"
                                        height="100" width="100" />
                                    <div class="button-wrapper mt-4">
                                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                            <span class="d-block ">View Profile Picture</span>
                                            <ion-icon name="eye-outline"></ion-icon>
                                            <input type="button" id="upload" class="account-file-input " hidden />
                                        </label>

                                    </div>
                                </div>
                            </div>
                            <hr class="my-0" />
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="FullName" class="form-label">Full Name</label>
                                        <input class="form-control text-dark" type="text" id="firstName" name="FullName"
                                            value="<?php echo $fullName; ?>" autofocus disabled />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="Namewithinitials" class="form-label">Name with initials</label>
                                        <input disabled class="form-control text-dark" type="text"
                                            name="Namewithinitials" id="Namewithinitials"
                                            value="<?php echo $initialName; ?>" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="Dateofbirth" class="form-label">Date of birth</label>
                                        <input disabled class="form-control text-dark" type="text" id="Dateofbirth"
                                            name="Dateofbirth" value="<?php echo $dateOfBirth; ?>" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="Gender" class="form-label">Gender</label>
                                        <input disabled type="text" class="form-control text-dark" id="Gende"
                                            name="Gender" value="<?php echo $gender ?>" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="address" class="form-label">Address</label>
                                        <input disabled type="text" class="form-control text-dark" id="address"
                                            name="address" value="<?php echo $address ?>" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="Indexnumber" class="form-label">Index number</label>
                                        <input disabled class="text-dark form-control" type="text" id="index"
                                            name="Indexnumber" value="<?php echo $indexNo; ?>" maxlength="6" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="Scholarship" class="form-label">Scholarship</label>
                                        <input disabled type="text" class="text-dark form-control" id="zipCode"
                                            name="Scholarship" value="<?php echo $scholarship; ?>" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="Nerollyear" class="form-label">Enroll year</label>
                                        <input disabled id="Nerollyear" class="text-dark form-control" name="Nerollyear"
                                            value="<?php echo $encrollYear; ?>" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="Encrollclass" class="form-label">Enroll class</label>
                                        <input disabled id="Encrollclass" class="text-dark form-control"
                                            name="Encrollclass" value="<?php echo $encrollClass; ?>" />

                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="Nationality" class="form-label">Nationality</label>
                                        <input disabled id="Nationality" class="text-dark form-control"
                                            name="Nationality" value="<?php echo $nationality; ?>" />

                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="Religion" class="form-label">Religion</label>
                                        <input disabled id="Religion" class="text-dark form-control" name="Religion"
                                            value="<?php echo $religion; ?>" />
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="phoneNumber">House</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"
                                                style="background: <?php echo $houseColor ?>;"></span>
                                            <input disabled type="text" id="phoneNumber" name="phoneNumber"
                                                class="form-control text-dark" value="<?php echo $house; ?>" />
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="distance">Distance to School</label>
                                        <div class="input-group input-group-merge">
                                            <input disabled type="text" id="distance" name="distance"
                                                class="form-control text-dark" value="<?php echo $distance; ?>" />
                                            <span class="input-group-text">KM</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <button type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                        data-bs-whatever="@getbootstrap" class="btn btn-primary me-2">Request
                                        changes</button>
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

            <!-- modal start -->

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">New Request</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Name :</label>
                                    <input type="text" class="form-control bg-secondary text-dark" id="name">
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Message:</label>
                                    <textarea class="form-control bg-secondary text-dark" id="message"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn" onclick="sendRequest();"
                                style="background: #1e6ffa; color: white;" data-bs-dismiss="modal">Send Request</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- modal end -->

            <!--footer start-->
            <div class="container-fluid pt-4 px-4 footerGroup">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved.
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            Designed By <a href="https://eversoft.cf">EverSoft IT Solutions</a>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            <!--footer end-->

        </div>
        <!-- Content End -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="js/script.js"></script>
    <script>
        function sendRequest() {
            var name = document.getElementById("name");
            var message = document.getElementById("message");
            var index = document.getElementById("index");

            var form = new FormData();
            form.append("name", name.value);
            form.append("msg", message.value);
            form.append("index", index.value);

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4) {
                    if (xhr.status == 200) {
                        if (xhr.responseText == "success") {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Request Send Successfully',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    }
                }
            };

            xhr.open("POST", "process/sendRequest.php", true);
            xhr.send(form);
        }
    </script>
</body>

</html>