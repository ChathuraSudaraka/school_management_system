<?php 

    session_start();
    if(!isset($_SESSION['studentIndex'])) { 
        header("location: student.php");
    }

    $indexNo = $_SESSION['studentIndex'];

    $connection = new mysqli("localhost", "root", "Mercy@2005", "sms");

    $getClassTable = $connection->query("SELECT `current_grade`,`current_class` FROM `student` WHERE `index_number`='$indexNo'");
    $getClass = $getClassTable->fetch_assoc();

    $class = $getClass['current_class'];
    $grade = $getClass['current_grade'];
    $grade = intval($grade);

    $teacher = array();
    $subject = array();
    $dayNo = 1;
    $strDay = '1';
    $periodNo = 1;
    for ($i=1; $i <= 40 ; $i++) { 

    $TimeTable = $connection->query("SELECT t.first_name AS teacher, s.name AS subject, time_table.class, time_table.grade FROM time_table
INNER JOIN teacher_has_subject ths ON ths.id = time_table.period_$periodNo 
INNER JOIN teacher t ON t.nic = ths.teacher_nic
INNER JOIN subject s ON s.id = ths.subject_id
WHERE day_id = $strDay AND grade= '$grade' AND `class`='$class'");

    $Details = $TimeTable->fetch_assoc();
    if(isset($Details["teacher"]) & isset($Details["subject"])) {
        array_push($teacher, $Details["teacher"]);
        array_push($subject, $Details["subject"]);
        $periodNo += 1;
        

            if ($i%8==1) {
                $dayNo += 1;
                $strDay = strval($dayNo);
                $periodNo = 1;
            }

        }
        else {
            array_push($teacher, "None");
            array_push($subject, "None");
            $periodNo += 1;
            

                if ($i%8==1) {
                    $dayNo += 1;
                    $strDay = strval($dayNo);
                    $periodNo = 1;
                }
        }
        
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

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
   <script> function databaseError() {
        Swal.fire({
            title: "Error!",
            text: "Error While Processing Your Request",
            icon: "error",
            confirmButtonText: "OK",
            footer: "<a href='#'>contact admin to fix this problem</a>"
        }).then((result) => {
            if(result.isConfirmed) {
               window.location = "dashboard.php";  // redirect to dashboard 
            }
        })
    }
    </script>
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
<div class="sidebar pe-4 pb-3 nscroll bg-secondary" style="border-right: black 2px solid; border-top-right-radius: 8px; border-bottom-right-radius: 8px;">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="dashboard.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary text-center hide-text">Sri Dharmaloka</h3>
                    <h3 class="text-primary text-center hide-text">College</h3>
                </a>

                <div class="d-flex align-items-center ms-4 mb-4 flex-column">
                    <div class="d-flex align-items-center justify-content-center w-100">
                        <img src="img/badge.png" class="schoolBadge"  style="height: 190px;">
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="dashboard.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="attendance.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Attendance</a>
                    <a href="marks.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Marks</a>
                    <a href="table.php" class="nav-item nav-link active"><i class="fa fa-table me-2"></i>Time Table</a>
                    <a href="studentAssignment.php" class="nav-item nav-link "><i class="bi bi-journal-bookmark-fill me-2"></i></i>Assignments</a>
                    <a href="payment.php" class="nav-item nav-link" onclick="payment();"><i class="fa fa-chart-bar me-2"></i>Payment</a>
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
                                <span class="fw-normal mb-0 text-dark">You Don't Have Any notification</span>
                            </a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="#" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?php echo $_SESSION['initialName']; ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="profile-student.php" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item" onclick="logOut();">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <!--Time table start-->

            <?php

if(!isset($Details['teacher'])) {
    echo '<script>
    $(document).ready(databaseError()); </script>';
}

            ?>

            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h3 class="mb-0 text-dark">My Time Table</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">#</th>
                                    <th scope="col">TIME</th>
                                    <th scope="col">MONDAY</th>
                                    <th scope="col">TUESDAY</th>
                                    <th scope="col">WEDNESDAY</th>
                                    <th scope="col">THURSDAY</th>
                                    <th scope="col">FRIDAY</th>
                                </tr>
                            </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>07:50-08:40</td>
                                    <td class="viewTeacher"><p class="subject"><?php echo $subject[0]; ?></p>
                                        <p class="teacher"><?php echo $teacher[0]; ?></p></td>
                                    <td class="viewTeacher"><p class="subject"><?php echo $subject[8]; ?></p><p class="teacher"><?php echo $teacher[1]; ?></p></td>
                                    <td class="viewTeacher"><p class="subject">$123</p><p class="teacher">Tharindu</p></td>
                                    <td class="viewTeacher"><p class="subject">Paid</p><p class="teacher">Tharindu</p></td>
                                    <td class="viewTeacher"><p class="subject">Paid</p><p class="teacher">Tharindu</p></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>08:30-09:10</td>
                                    <td class="viewTeacher"><p class="subject"><?php echo $subject[1]; ?></p>
                                        <p class="teacher"><?php echo $teacher[1]; ?></p></td>
                                    <td class="viewTeacher"><p class="subject"><?php echo $subject[9]; ?></p><p class="teacher">Tharindu</p></td>
                                    <td class="viewTeacher"><p class="subject">$123</p><p class="teacher">Tharindu</p></td>
                                    <td class="viewTeacher"><p class="subject">Paid</p><p class="teacher">Tharindu</p></td>
                                    <td class="viewTeacher"><p class="subject">Paid</p><p class="teacher">Tharindu</p></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>09:10-09:50</td>
                                    <td class="viewTeacher"><p class="subject"><?php echo $subject[2]; ?></p>
                                        <p class="teacher"><?php echo $teacher[2]; ?></p></td>
                                    <td class="viewTeacher"><p class="subject"><?php echo $subject[10]; ?></p><p class="teacher">Tharindu</p></td>
                                    <td class="viewTeacher"><p class="subject">$123</p><p class="teacher">Tharindu</p></td>
                                    <td class="viewTeacher"><p class="subject">Paid</p><p class="teacher">Tharindu</p></td>
                                    <td class="viewTeacher"><p class="subject">Paid</p><p class="teacher">Tharindu</p></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>09:50-10:30</td>
                                    <td class="viewTeacher"><p class="subject"><?php echo $subject[3]; ?></p>
                                        <p class="teacher"><?php echo $teacher[3]; ?></p></td>
                                    <td class="viewTeacher"><p class="subject"><?php echo $subject[11]; ?></p><p class="teacher">Tharindu</p></td>
                                    <td class="viewTeacher"><p class="subject">$123</p><p class="teacher">Tharindu</p></td>
                                    <td class="viewTeacher"><p class="subject">Paid</p><p class="teacher">Tharindu</p></td>
                                    <td class="viewTeacher"><p class="subject">Paid</p><p class="teacher">Tharindu</p></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>10:30-11:10</td>
                                    <td class="viewTeacher"><p class="subject"><?php echo $subject[4]; ?></p>
                                        <p class="teacher"><?php echo $teacher[4]; ?></p></td>
                                    <td class="viewTeacher"><p class="subject"><?php echo $subject[12]; ?></p><p class="teacher">Tharindu</p></td>
                                    <td class="viewTeacher"><p class="subject">$123</p><p class="teacher">Tharindu</p></td>
                                    <td class="viewTeacher"><p class="subject">Paid</p><p class="teacher">Tharindu</p></td>
                                    <td class="viewTeacher"><p class="subject">Paid</p><p class="teacher">Tharindu</p></td>
                                </tr>
                                <tr>
                                    <td colspan="8" class="text-center">INTERVAL</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>11:30-12:10</td>
                                    <td class="viewTeacher"><p class="subject"><?php echo $subject[5]; ?></p>
                                        <p class="teacher"><?php echo $teacher[5]; ?></p></td>
                                    <td class="viewTeacher"><p class="subject">Jhon Doe</p><p class="teacher">Tharindu</p></td>
                                    <td class="viewTeacher"><p class="subject">$123</p><p class="teacher">Tharindu</p></td>
                                    <td class="viewTeacher"><p class="subject">Paid</p><p class="teacher">Tharindu</p></td>
                                    <td class="viewTeacher"><p class="subject">Paid</p><p class="teacher">Tharindu</p></td>
                                </tr>
                                <tr>
                                   <td>7</td>
                                    <td>12:10-12:50</td>
                                    <td class="viewTeacher"><p class="subject"><?php echo $subject[6]; ?></p>
                                        <p class="teacher"><?php echo $teacher[6]; ?></p></td>
                                    <td class="viewTeacher"><p class="subject">Jhon Doe</p><p class="teacher">Tharindu</p></td>
                                    <td class="viewTeacher"><p class="subject">$123</p><p class="teacher">Tharindu</p></td>
                                    <td class="viewTeacher"><p class="subject">Paid</p><p class="teacher">Tharindu</p></td>
                                    <td class="viewTeacher"><p class="subject">Paid</p><p class="teacher">Tharindu</p></td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>12:50-13:30</td>
                                    <td class="viewTeacher"><p class="subject"><?php echo $subject[7]; ?></p>
                                        <p class="teacher"><?php echo $teacher[7]; ?></p></td>
                                    <td class="viewTeacher"><p class="subject">Jhon Doe</p><p class="teacher">Tharindu</p></td>
                                    <td class="viewTeacher"><p class="subject">$123</p><p class="teacher">Tharindu</p></td>
                                    <td class="viewTeacher"><p class="subject">Paid</p><p class="teacher">Tharindu</p></td>
                                    <td class="viewTeacher"><p class="subject">Paid</p><p class="teacher">Tharindu</p></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--Time table start-->

            <!-- Footer Start -->
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

    <!-- Template Javascript -->
    <script src="myscript.js"></script>
    <script src="js/main.js"></script>
</body>

</html>