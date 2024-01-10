<?php

session_start();
if (!isset($_SESSION["adminNic"])) {
    header("location: admin.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin - Sri Dharmaloka College</title>
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

    <!-- Marks alert Stylesheet -->
    <link href="marksAlert/docs/css/jquery.sweet-modal.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <style>
        .addCursor {
            cursor: pointer;
        }

        .addCursor:hover {
            background: linear-gradient(to left, white, orange);
            color: black;
        }

        .myClass {
            border-top-left-radius: 0px;
            border-top-right-radius: 0px;
        }

        .img {
            border-radius: 50%;
            width: 120px;
            height: 120px;
            background-size: "cover";
            background-color: black;
        }
    </style>

</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-light" style="width: 3rem; height: 3rem; " role="status">
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
                    <a href="adminDashboard.php" class="nav-item nav-link"><i
                            class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="adminNotifications.php" class="nav-item nav-link"><i
                            class="bi bi-bell-fill me-2 "></i>Notifications</a>
                    <a href="adminSearchStudent.php" class="nav-item nav-link active"><i
                            class="bi bi-search me-2"></i>Search
                        Students</a>
                    <a href="addStudent.php" class="nav-item nav-link"><i class="bi bi-person-plus-fill me-2"></i>Add
                        Student</a>
                    <a href="adminSubject.php" class="nav-item nav-link"><i class="bi bi-journal-plus me-2"></i>Student
                        Subjects</a>
                    <a href="addteacher.php" class="nav-item nav-link"><i class="bi bi-person-plus-fill me-2"></i>Add
                        teacher</a>
                    <a href="searchTeacher.php" class="nav-item nav-link"><i class="bi bi-search me-2"></i>Search
                        Teacher</a>
                    <a href="adminTeacherSubject.php" class="nav-item nav-link"><i
                            class="bi bi-journal-code me-2"></i>Teacher Subject</a>
                    <a href="addNonAcademic.php" class="nav-item nav-link"><i
                            class="bi bi-person-plus-fill me-2"></i>Add Non-Academic</a>
                    <a href="adminSearchStaff.php" class="nav-item nav-link"><i class="bi bi-search me-2"></i>Search
                        Non-Academic</a>

                    <a href="adminTimeTable.php" class="nav-item nav-link"><i class="bi bi-table me-2"></i>Time
                        Table</a>
                    <a href="addNews.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Add News</a>
                    <a href="adminRegister.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Manage
                        Register</a>
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
                            <span class="d-none d-lg-inline-flex">Notificatin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <span class="fw-normal mb-0 text-dark">You Don't Have Any Notification</span>
                            </a>
                        </div>
                    </div>
                    <button class="btn btn-outline-primary ms-5" onclick="logOut();">LogOut</button>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Warning</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure to save changes ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn" onclick="updateStudentData();"
                                        data-bs-dismiss="modal" style="background: #006ee5; color: white;">Save
                                        changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-floating">
                            <input class="form-control bg-secondary text-dark" id="searchIndex" type="text"
                                placeholder="Index Number">
                            <label for="floatingSelectGrid">Search by index number</label>
                        </div>
                    </div>

                    <div class="col-md">
                        <div class="form-floating">
                            <input class="form-control bg-secondary text-dark" id="typing" type="text"
                                placeholder="Index Number" data-index="" onkeyup="studentLiveSearch();">
                            <label for="floatingSelectGrid">Search by name</label>
                            <div class="list-group" style="position: absolute; width: 100%; z-index: 100000;"
                                id="item-container">
                                <!-- suggestions append to here -->

                            </div>
                        </div>
                    </div>

                    <div class="d-grid">
                        <button class="btn btn-primary" onclick="searchStudent();">Search</button>
                    </div>

                    <div class="container-fluid pt-4 px-4" id="studentData">
                        <div class="row mb-3">
                            <div class="col-12 mt-md-0 col-md-4">
                                <div data-bs-toggle="modal" data-bs-target="#newModal"
                                    class="rounded d-flex align-items-center justify-content-between p-4"
                                    style="background: #ff2c2c; color: white;" id="paymentViewer">
                                    <i class="bi bi-cash fa-2x text-primary"></i>
                                    <div class="ms-3">
                                        <p class="mb-2">Facility charges</p>
                                        <h6 class="mb-0 text-dark"> 3260 </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-md-0 mt-3 col-md-4">
                                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                    <i class="bi bi-percent fa-2x text-dark"></i>
                                    <div class="ms-3">
                                        <p class="mb-2">student attendance</p>
                                        <h6 class="mb-0 text-dark" id="attendance"> none </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-md-0 mt-3 col-md-4">
                                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                    <i class="bi bi-book-half fa-2x text-dark"></i>
                                    <div class="ms-3">
                                        <p class="mb-2">Class</p>
                                        <h6 class="mb-0 text-dark" id="currentClass">Ex: 10-F</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-3 col-md-6">
                                <div data-bs-target="#reModal" data-bs-toggle="modal"
                                    class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                    <i class="bi bi-calendar-week-fill fa-2x text-dark"></i>
                                    <div class="ms-3">
                                        <p class="mb-2">Date Of Resignation</p>
                                        <h6 class="mb-0 text-dark" id="resignation">none</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-3 col-md-6">
                                <div style="background-color: #00FF00;"
                                    id="scoreBox"
                                    class="rounded d-flex align-items-center justify-content-between p-4">
                                    <i class="bi bi-capslock-fill fa-2x text-dark"></i>
                                    <div class="ms-3">
                                        <p class="mb-2">Discipline Score</p>
                                        <h6 class="mb-0 text-dark" id="dScore">Ex: 80%</h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-secondary rounded-top p-4">
                            <h3 class="text-dark">Personal Information</h3>
                            <div class="row d-flex align-items-center">
                                <div class="col-lg-2 col-6 col-sm-4">
                                    <div class="p-3">
                                        <div class="img d-flex justify-content-center align-items-center">
                                            <img style="border-radius: 50%;" src="profileImg/default.png"
                                                id="profilePic">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                        <span class="d-none d-sm-block ">Update Profile Picture</span>
                                        <i class="bi bi-upload"></i>
                                        <input type="file" id="upload" class="account-file-input " hidden
                                            accept="image/png, image/jpeg" />
                                    </label>
                                </div>
                            </div>
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button btn btn-primary" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            Student Information
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body bg-secondary">
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="FullName" class="form-label">Full Name</label>
                                                    <input class="form-control bg-secondary text-dark" type="text"
                                                        id="fullName" name="fullName" value="Ex: Sahan Perera"
                                                        autofocus />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="Namewithinitials" class="form-label">Name with
                                                        initials</label>
                                                    <input class="form-control bg-secondary text-dark" type="text"
                                                        name="initialName" id="initialName" value="Ex: A.B.C. Perera" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="Dateofbirth" class="form-label">Date of birth</label>
                                                    <input class="form-control bg-secondary text-dark" type="text"
                                                        id="dob" name="Dateofbirth" value="Ex: 2000/01/01" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="Gender" class="form-label">Gender</label>
                                                    <input type="text" disabled
                                                        class="form-control bg-secondary text-dark" id="Gender"
                                                        name="Gender" value="Ex: Male" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="address" class="form-label">Address</label>
                                                    <input type="text" class="form-control bg-secondary text-dark"
                                                        id="address" name="address"
                                                        value="Ex: 432/1 A, Waragoda, Kelaniya" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="Indexnumber" class="form-label">Index number</label>
                                                    <input class="text-dark form-control bg-secondary" disabled
                                                        type="text" id="studentIndexNumber" name="Indexnumber"
                                                        value="Ex: 12345" maxlength="6" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="Scholarship" class="form-label">Scholarship</label>
                                                    <input type="text" class="text-dark form-control bg-secondary"
                                                        id="scholarship" name="Scholarship" value="Ex: Yes" disabled />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="Nerollyear" class="form-label">Enroll year</label>
                                                    <input id="startYear" class="text-dark bg-secondary form-control"
                                                        disabled name="enrollyear" value="Ex: 2005" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="Encrollclass" class="form-label">Enroll class</label>
                                                    <input id="startClass" class="text-dark bg-secondary form-control"
                                                        disabled name="enrollclass" value="Ex: 01" />

                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="address" class="form-label">Previous School</label>
                                                    <input disabled type="text"
                                                        class="form-control bg-secondary text-dark" id="pSchool"
                                                        name="pSchool" value="Ex: none" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="Nationality" class="form-label">Nationality</label>
                                                    <input disabled id="nationality"
                                                        class="text-dark bg-secondary form-control" name="nationality"
                                                        value="Ex: Sinhalese" />

                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="Religion" class="form-label">Religion</label>
                                                    <input disabled id="religion"
                                                        class="text-dark bg-secondary form-control" name="religion"
                                                        value="Ex: Buddhism" />
                                                </div>

                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label" for="phoneNumber">House</label>
                                                    <div class="input-group input-group-merge">
                                                        <span class="input-group-text" id="houseColor"
                                                            style="background: green"></span>
                                                        <input type="text" id="houseName" disabled name="phoneNumber"
                                                            class="form-control text-dark bg-secondary"
                                                            value="Ex: Welusumana" />
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label" for="distance">Distance to School</label>
                                                    <div class="input-group input-group-merge">
                                                        <input type="text" id="disToSchool" name="disToSchool"
                                                            class="form-control text-dark bg-secondary"
                                                            value="Ex: 10" />
                                                        <span class="input-group-text">KM</span>
                                                    </div>
                                                </div>
                                                <div class="mt-2">
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal">
                                                        Update
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button btn btn-primary collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                            aria-expanded="false" aria-controls="collapseTwo">
                                            Parent' s Information </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body bg-secondary">
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="MotherName" class="form-label">Mother Name</label>
                                                    <input disabled class="form-control bg-secondary text-dark"
                                                        type="text" id="MotherName" name="MotherName"
                                                        value="Ex: Diane White" autofocus />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="MotherNIC" class="form-label">Mother NIC</label>
                                                    <input disabled class="form-control bg-secondary text-dark"
                                                        type="text" name="MotherNIC" id="MotherNIC"
                                                        value="Ex: 78123456v" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="Mother Email" class="form-label">Mother Email</label>
                                                    <input disabled class="form-control bg-secondary text-dark"
                                                        type="text" id="MotherEmail" name="Mother Email"
                                                        value="Ex: abc@gmail.com" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="MotherJob" class="form-label">Mother Job</label>
                                                    <input disabled type="text"
                                                        class="form-control bg-secondary text-dark" id="MotherJob"
                                                        name="MotherJob" value="Ex: Nursing" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="MotherJobaddress" class="form-label">Mother Job
                                                        Address</label>
                                                    <input disabled type="text"
                                                        class="form-control bg-secondary text-dark"
                                                        id="MotherJobAddress" name="MotherJobaddress"
                                                        value="Ex: Nawaloka Hospital Colombo" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label" for="MotherNumber">Mother Phone
                                                        Number</label>
                                                    <div class="input-group input-group-merge">
                                                        <span class="input-group-text">LK (+94)</span>
                                                        <input disabled type="text" id="MotherNumber"
                                                            name="MotherNumber"
                                                            class="form-control bg-secondary text-dark"
                                                            value="Ex: 70 123 4567" />
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="FatherName" class="form-label">Father Name</label>
                                                    <input disabled class="form-control bg-secondary text-dark"
                                                        type="text" id="FatherName" name="FatherName"
                                                        value="Ex: John Doe" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="FatherNIC" class="form-label">Father NIC</label>
                                                    <input disabled type="text"
                                                        class="form-control bg-secondary text-dark" id="FatherNIC"
                                                        name="FatherNIC" value="Ex: 703123234v" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="FatherNumber" class="form-label">Father Number</label>
                                                    <input type="text" class="form-control bg-secondary text-dark"
                                                        disabled value="Ex: 701113332" id="FatherNumber" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="FatherJob" class="form-label">Father Job</label>
                                                    <input disabled id="FatherJob"
                                                        class="form-control bg-secondary text-dark" name="FatherJob"
                                                        value="Ex: Software Engineer" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="FatherJobAddress" class="form-label">Father Job
                                                        Address</label>
                                                    <input disabled id="FatherJobAddress"
                                                        class="form-control bg-secondary text-dark"
                                                        name="FatherJobAddress" value="Ex: ABC Company Nugegoda" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="GuardianName" class="form-label">Father Email</label>
                                                    <input disabled id="FatherEmail"
                                                        class="form-control bg-secondary text-dark" name="GuardianName"
                                                        value="Ex: abc@outlook.com" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="GuardianName" class="form-label">Guardian Name</label>
                                                    <input disabled id="GuardianName"
                                                        class="form-control bg-secondary text-dark" name="GuardianName"
                                                        value="" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="GuardianNIC" class="form-label">Guardian NIC</label>
                                                    <input disabled id="GuardianNIC"
                                                        class="form-control bg-secondary text-dark" name="GuardianNIC"
                                                        value="" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="GuardianNumber" class="form-label">Guardian
                                                        Number</label>
                                                    <input disabled id="GuardianNumber"
                                                        class="form-control bg-secondary text-dark"
                                                        name="GuardianNumber" value="" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="GuardianJob" class="form-label">Guardian Job</label>
                                                    <input disabled id="GuardianJob"
                                                        class="form-control bg-secondary text-dark" name="GuardianJob"
                                                        value="" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="GuardianJobAddress" class="form-label">Guardian Job
                                                        Address</label>
                                                    <input disabled id="GuardianJobAddress"
                                                        class="form-control bg-secondary text-dark"
                                                        name="GuardianJobAddress" value="" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="GuardianEmail" class="form-label">Guardian Email</label>
                                                    <input disabled id="GuardianEmail"
                                                        class="form-control bg-secondary text-dark" name="GuardianEmail"
                                                        value="" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button btn btn-primary collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                            aria-expanded="false" aria-controls="collapseThree">
                                            Contact Information
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse"
                                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body bg-secondary">
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="MotherEmail" class="form-label">Mother Email</label>
                                                    <input class="form-control  bg-secondary text-dark" type="text"
                                                        id="motherEmail" name="motherEmail" value="Ex: abc@gmail.com"
                                                        autofocus />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label" for="phoneNumber">Mother Number</label>
                                                    <div class="input-group input-group-merge">
                                                        <span class="input-group-text">LK (+94)</span>
                                                        <input type="text" id="motherNumber" name="phoneNumber"
                                                            class="form-control bg-secondary text-dark"
                                                            value="Ex: 701112223" />
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="FatherEmail" class="form-label">Father Email</label>
                                                    <input class="form-control bg-secondary text-dark" type="text"
                                                        id="fatherEmail" name="fatherEmail"
                                                        value="Ex: abc@outlook.com" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label" for="phoneNumber">Father Number</label>
                                                    <div class="input-group input-group-merge">
                                                        <span class="input-group-text">LK (+94)</span>
                                                        <input type="text" id="fatherNumber" name="phoneNumber"
                                                            class="form-control bg-secondary text-dark"
                                                            value="Ex: 701212123" />
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="address" class="form-label">Home Address</label>
                                                    <input type="text" class="form-control bg-secondary text-dark"
                                                        id="studentAddress" name="address"
                                                        value="Ex: 432/1 B, Ganemulla, Kadawatha." />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label" for="phoneNumber">Emergency Number</label>
                                                    <div class="input-group input-group-merge">
                                                        <span class="input-group-text">LK (+94)</span>
                                                        <input type="text" id="emNumber" name="emNumber"
                                                            class="form-control  bg-secondary text-dark"
                                                            value="Ex: 701231234" />
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label" for="phoneNumber">Emergency Email</label>
                                                    <input type="text" id="emEmail" name="emEmail"
                                                        class="form-control  bg-secondary text-dark"
                                                        value="Ex: abc@yahoo.com" />
                                                </div>
                                                <button class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#contactModal">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-4 pb-3">
                                <h3 class="text-dark">Critical Undisciplined Activities</h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Description</th>
                                            <th>Date</th>
                                            <th>The Giver</th>
                                            <th>Class</th>
                                        </tr>
                                    </thead>
                                    <tbody id="mistakeBody">
                                        <tr>
                                            <th colspan="4" style="background: orange; color: red;">
                                                Search A Student To Show Data
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="row pt-4 pb-3">
                                <h3 class="text-dark">Payment Report</h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Year</th>
                                            <th>Class</th>
                                            <th>Teacher</th>
                                            <th>Payment</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">
                                        <tr>
                                            <th colspan="4" style="background: orange; color: red;">
                                                Search A Student To Show Data
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Warning</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure to save changes ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn" data-bs-dismiss="modal" onclick="updateContact();"
                                        style="background: #006ee5; color: white;">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- resignation modal -->

                    <div class="modal fade" id="reModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
                        tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 text-dark" id="exampleModalToggleLabel">
                                        Warning</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Enter date of Resignation:
                                    <input class="form-control bg-secondary text-dark pt-2" id="date" type="date" />
                                </div>
                                <div class="modal-footer">
                                    <button class="btn" style="background: #026df7; color: white;"
                                        onclick="updateResignation(this);" data-index="" id="resignationBtn"
                                        data-bs-dismiss="modal" aria-label="Close">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- end resignation modal -->

                <!--modal Start-->

                <div class="modal fade" id="newModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Warning</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Do you want change this ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn" data-bs-dismiss="modal"
                                    onclick="changePayment(event);" style="background: #006ee5;color: white;"
                                    data-class="" data-grade="" data-index="" id="paymentBtn">Yes</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!--modal end-->
                <!-- Recent Sales End -->

                <!-- Footer Start -->
                <div class="container-fluid pt-4 px-4 footerGroup" id="footerGroup" style="margin-top: 60vh;">
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
                <!-- Footer End -->
            </div>
            <!-- Content End -->


            <!-- Back to Top -->
            <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
        </div>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/chart/chart.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/tempusdominus/js/moment.min.js"></script>
        <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
        <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js"></script>
        <script src="marksAlert/docs/js/jquery.sweet-modal.min.js"></script>
        <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

        <!-- Template Javascript -->
        <script src="js/multiple.js"></script>
        <script type="text/javascript" src='myscript.js'></script>
</body>
<script>
    function searchStudent() {
        const index = document.getElementById("searchIndex");
        const name = document.getElementById("typing");

        if (index.value.trim() == '' && name.value.trim() == '' || index.value.trim() != '' && name.value.trim() != '') {
            Swal.fire({
                icon: 'warning',
                title: 'WARNING',
                text: 'You must fill in one text field at a time'
            });
        } else {
            var studentIndex;
            if (name.value.trim() != "") {
                studentIndex = name.dataset.index;
            } else {
                studentIndex = index.value;
            }

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.status == "error") {
                        Swal.fire({
                            icon: 'warning',
                            title: 'WARNING',
                            text: 'Invalid Index Number'
                        });
                    } else if (response.status == "permission") {
                        Swal.fire({
                            icon: 'error',
                            title: 'ERROR',
                            text: 'Permission Denied'
                        });
                    } else {
                        document.getElementById("paymentBtn").dataset.class = response.student["class"];
                        document.getElementById("paymentBtn").dataset.grade = response.student["grade"];
                        document.getElementById("paymentBtn").dataset.index = response.student["index_number"];
                        document.getElementById("resignationBtn").dataset.index = response.student["index_number"];
                        document.getElementById("fullName").value = response.student["full_name"];
                        document.getElementById("initialName").value = response.student["initial_name"];
                        document.getElementById("dob").value = response.student["date_of_birth"];
                        document.getElementById("Gender").value = response.student["g_name"];
                        document.getElementById("address").value = response.student["address"];
                        document.getElementById("studentIndexNumber").value = response.student["index_number"];
                        document.getElementById("scholarship").value = response.student["scholarship"];
                        document.getElementById("startYear").value = response.student["enroll_year"];
                        document.getElementById("startClass").value = response.student["encroll_class"];
                        document.getElementById("pSchool").value = response.student["previous_school"];
                        document.getElementById("nationality").value = response.student["n_name"];
                        document.getElementById("religion").value = response.student["r_name"];
                        var getHouse = response.student["index_number"] % 4;
                        var houseName;
                        var houseColor;
                        if (getHouse == 0) {
                            houseName = "Suranimala";
                            houseColor = "green";
                        } else if (getHouse == 1) {
                            houseName = "Welusumana";
                            houseColor = "yellow";
                        } else if (getHouse == 2) {
                            houseName = "Abhaya";
                            houseColor = "red";
                        } else {
                            houseName = "Nandimithra";
                            houseColor = "blue";
                        }
                        document.getElementById("houseName").value = houseName;
                        document.getElementById("houseColor").style.backgroundColor = houseColor;
                        document.getElementById("disToSchool").value = response.student["distance"];
                        document.getElementById("attendance").innerHTML = parseInt(response.precentage) + "%";
                        document.getElementById("resignation").innerHTML = response.student["date_of_resignation"] == null ? "none" : response.student["date_of_resignation"];
                        document.getElementById("MotherName").value = response.student["mother_name"];
                        document.getElementById("MotherNIC").value = response.student["mother_nic"];
                        document.getElementById("MotherEmail").value = response.student["mother_email"];
                        document.getElementById("MotherJob").value = response.student["mother_job"];
                        document.getElementById("MotherJobAddress").value = response.student["mother_job_address"];
                        document.getElementById("MotherNumber").value = response.student["mother_number"];

                        document.getElementById("FatherName").value = response.student["father_name"];
                        document.getElementById("FatherNIC").value = response.student["father_nic"];
                        document.getElementById("FatherEmail").value = response.student["father_email"];
                        document.getElementById("FatherJob").value = response.student["father_job"];
                        document.getElementById("FatherJobAddress").value = response.student["father_job_address"];
                        document.getElementById("FatherNumber").value = response.student["father_number"];

                        document.getElementById("GuardianName").value = response.student["guardian_name"];
                        document.getElementById("GuardianNIC").value = response.student["guardian_nic"];
                        document.getElementById("GuardianEmail").value = response.student["guardian_email"];
                        document.getElementById("GuardianJob").value = response.student["guardian_job"];
                        document.getElementById("GuardianJobAddress").value = response.student["guardian_job_address"];
                        document.getElementById("GuardianNumber").value = response.student["guardian_number"];

                        document.getElementById("motherNumber").value = response.student["mother_number"];
                        document.getElementById("motherEmail").value = response.student["mother_email"];
                        document.getElementById("fatherEmail").value = response.student["father_email"];
                        document.getElementById("fatherNumber").value = response.student["father_number"];
                        document.getElementById("emEmail").value = response.student["emergency_email"];
                        document.getElementById("emNumber").value = response.student["emergency_number"];
                        document.getElementById("studentAddress").value = response.student["address"];
                        document.getElementById("profilePic").src = "profileImg/" + response.student["path"];
                        document.getElementById("currentClass").innerHTML = response.student['grade'] + '-' + response.student["class"];
                        document.getElementById("paymentViewer").style.backgroundColor = response.student["payment"] == 'yes' ? "#2cae6b" : "#ff2c2c";
                        var score = response.student["score"];
                        document.getElementById("dScore").innerHTML = score + "%";
                        if (score >= 80) {
                            scoreBox.style.backgroundColor = "#00FF00";
                        } else if (score >= 60) {
                            scoreBox.style.backgroundColor = "#FFFF00";
                        } else if (score >= 40) {
                            scoreBox.style.backgroundColor = "#FFA500";
                        } else {
                            scoreBox.style.backgroundColor = "#FF0000";
                        }

                        if (response.payment == "noData") {
                            var tr = document.createElement("tr");
                            var th = document.createElement("th");
                            th.innerHTML = "There are No Data Available For This Student";
                            th.style.backgroundColor = "orange";
                            th.style.color = "red";
                            th.colSpan = 4;
                            tr.appendChild(th);
                            document.getElementById("tbody").innerHTML = '';
                            document.getElementById("tbody").appendChild(tr);
                        }
                        else {
                            var tableCols = ["year", 'class', "full_name", "service_payment"];
                            document.getElementById("tbody").innerHTML = '';
                            for (let i = 0; i < response.payment.length; i++) {
                                var tr = document.createElement("tr");
                                for (let a = 0; a < tableCols.length; a++) {
                                    var col = document.createElement("td");
                                    if (a == 3) {
                                        col.style.backgroundColor = response.payment[i].detailes[tableCols[a]] == 'yes' ? "#2cae6b" : "#ff2c2c";
                                        tr.appendChild(col);
                                        continue;
                                    }
                                    else if(a == 1) {
                                        col.innerHTML = response.payment[i].detailes['grade'] + '-' + response.payment[i].detailes['class'];
                                        tr.appendChild(col);
                                        continue;
                                    }
                                    col.innerHTML = response.payment[i].detailes[tableCols[a]];
                                    tr.appendChild(col);
                                }
                                document.getElementById("tbody").appendChild(tr);
                            }
                        }

                        if(response.mistake == 'noData') {
                            var tr = document.createElement("tr");
                            var th = document.createElement("th");
                            th.innerHTML = "There are No Data Available For This Student";
                            th.style.backgroundColor = "orange";
                            th.style.color = "red";
                            th.colSpan = 4;
                            tr.appendChild(th);
                            document.getElementById("mistakeBody").innerHTML = '';
                            document.getElementById("mistakeBody").appendChild(tr);
                        }
                        else {
                            document.getElementById("mistakeBody").innerHTML = '';
                            for(let i=0; i < response.mistake.length; i++) {
                                var tr = document.createElement("tr");
                                for(let c = 0; c < 5; c++) {
                                    var col = document.createElement("td");
                                    if(c == 0) {
                                        col.innerHTML = i + 1;
                                    }
                                    else if(c == 1) {
                                        col.innerHTML = response.mistake[i]["mistake"]
                                    }
                                    else if(c == 2) {
                                        col.innerHTML = response.mistake[i]["date"];
                                    }
                                    else if(c == 3){
                                        col.innerHTML = response.mistake[i]["name"];
                                    }
                                    else {
                                        col.innerHTML = response.mistake[i]["grade"] + '-' + response.mistake[i]['class'];
                                    }
                                    tr.appendChild(col);
                                }
                                document.getElementById("mistakeBody").appendChild(tr);
                            }
                        }

                    }
                }
            }

            xhr.open("GET", "process/searchStudent.php?index=" + studentIndex + "", true);
            xhr.send();
        }
    }

    function studentLiveSearch() {
        document.getElementById("item-container").style.display = '';
        var name = document.getElementById("typing").value;

        if (name.trim() == '') {
            document.getElementById("item-container").innerHTML = '';
        } else {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // handle response
                    document.getElementById("item-container").innerHTML = '';
                    var response = JSON.parse(xhr.responseText);
                    for (let i = 0; i < response.length; i++) {
                        var item = document.createElement("button");
                        item.innerHTML = response[i].student['name'] + " - " + response[i].student['index_number'] +
                            " - " + response[i].student['grade'] + "-" + response[i].student['class'];
                        item.classList.add("list-group-item");
                        item.classList.add("list-group-item-action");
                        item.classList.add("text-dark");
                        item.dataset.index = response[i].student['index_number'];
                        item.onclick = function () {
                            document.getElementById("typing").value = this.innerHTML;
                            document.getElementById("typing").dataset.index = this.dataset.index;
                            document.getElementById("item-container").style.display = 'none';
                        }
                        document.getElementById("item-container").appendChild(item);
                    }
                }
            }

            xhr.open("GET", "process/liveSearch.php?name=" + name + "", true);
            xhr.send();
        }
    }


    function changePayment(event) {
        var button = event.target;
        if (button.dataset.index == '') {
            Swal.fire({
                icon: 'warning',
                title: 'WARNING',
                text: "Search a Student First"
            });
        } else {
            var index = button.dataset.index;
            var clz = button.dataset.class;
            var grade = button.dataset.grade;

            var form = new FormData();
            form.append("index", index);
            form.append("class", clz);
            form.append("grade", grade);

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4) {
                    if (xhr.status == 200) {
                        var response = xhr.responseText;
                        var box = document.getElementById('paymentViewer');
                        if (response == "no") {
                            box.style.background = '#ff2c2c';
                        } else {
                            box.style.background = '#2cae6b';
                        }
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: "Internel Server Error",
                            footer: "<a href='http://wa.me/94701189971'>Contact Developers Here</a>"
                        });
                    }
                }
            }

            xhr.open("POST", "process/changePayment.php", true);
            xhr.send(form);
        }
    }

    function updateResignation(getIndex) {
        if (getIndex.dataset.index == '') {
            Swal.fire({
                icon: 'warning',
                title: 'WARNING',
                text: "Search a Student First"
            });
        } else {
            var date = document.getElementById("date").value;
            var index = getIndex.dataset.index;
            if (date == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'WARNING',
                    text: "Please Enter A Date First"
                });
            } else {
                var form = new FormData();
                form.append("date", date);
                form.append("index", index);

                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4) {
                        if (xhr.status == 200) {
                            document.getElementById("resignation").innerHTML = date;
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: "Internel Server Error",
                                footer: "<a href='http://wa.me/94701189971'>Contact Developers Here</a>"
                            });
                        }
                    }
                };

                xhr.open("POST", "process/updateResignation.php", true);
                xhr.send(form);
            }
        }
    }

    function updateStudentData() {
        var index = document.getElementById("studentIndexNumber").value;
        if (index.trim() == '') {
            Swal.fire({
                icon: 'warning',
                title: 'WARNING',
                text: "Please Search A Student First"
            });
        } else {
            var fullName = document.getElementById("fullName").value;
            var initialName = document.getElementById("initialName").value;
            var dob = document.getElementById("dob").value;
            var address = document.getElementById("address").value;
            var pSchool = document.getElementById("pSchool").value;
            var disToSchool = document.getElementById("disToSchool").value;

            var form = new FormData();

            form.append("index", index);
            form.append("fullName", fullName);
            form.append("initialName", initialName);
            form.append("dob", dob);
            form.append("address", address);
            form.append("pSchool", pSchool);
            form.append("nationality", nationality);
            form.append("religion", religion);
            form.append("disToSchool", disToSchool);

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Updated Successfully',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            }

            xhr.open("POST", "process/updateStudentData.php", true);
            xhr.send(form);
        }
    }

    function updateContact() {
        var motherNumber = document.getElementById("motherNumber").value;
        var fatherNumber = document.getElementById("fatherNumber").value;
        var motherEmail = document.getElementById("motherEmail").value;
        var fatherEmail = document.getElementById("fatherEmail").value;
        var emNumber = document.getElementById("emNumber").value;
        var emEmail = document.getElementById("emEmail").value;
        var address = document.getElementById("address").value;

        var form = new FormData();
        form.append("motherNumber", motherNumber);
        form.append("motherEmail", motherEmail);
        form.append("fatherNumber", fatherNumber);
        form.append("fatherEmail", fatherEmail);
        form.append("emNumber", emNumber);
        form.append("emEmail", emEmail);
        form.append("address", address);

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Updated Successfully',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        }

        xhr.open("POST", "process/updateContact.php", true);
        xhr.send(form);
    }
</script>

</html>