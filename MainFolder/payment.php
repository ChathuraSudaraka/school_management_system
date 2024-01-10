<?php 

    session_start();
    if(!isset($_SESSION['studentIndex'])) { 
        header("location: student.php");
    }
    $indexNo = $_SESSION["studentIndex"];
    $conn = new mysqli("localhost", "root", "Mercy@2005", "sms");

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

        <div id="spinner"
      class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
      <div class="spinner-border" style="width: 3rem; height: 3rem; color: orange;" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>

        <div class="sidebar pe-4 pb-3 nscroll">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="dashboard.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary text-center hide-text">Sri Dharmaloka</h3>
                    <h3 class="text-primary text-center hide-text">College</h3>
                </a>

                <div class="d-flex align-items-center ms-4 mb-4 flex-column">
                    <div class="d-flex align-items-center justify-content-center w-100">
                        <img src="img/badge.png" class="schoolBadge" style="height: 200px;">
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="dashboard.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="attendance.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Attendance</a>
                    <a href="marks.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Marks</a>
                    <a href="table.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Time Table</a>
                    <a href="studentAssignment.php" class="nav-item nav-link"><i class="bi bi-journal-bookmark-fill me-2"></i></i>Assignments</a>
                    <a href="payment.php" class="nav-item nav-link active" onclick="payment();"><i class="fa fa-chart-bar me-2"></i>Payment</a>
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
                            <span class="d-none d-lg-inline-flex text-dark">Notification</span>
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

            <div class="container-fluid pt-4 px-4">
                <div class="col-12">
                    <div class="h-100 bg-secondary rounded p-4">
                        <h3 class="text-primary">Payment History</h3>
                        <div class="col-12 table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Year</th>
                                    <th scope="col">Class</th>
                                    <th scope="col">Teacher</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <tr>
                                   <td>1</td>
                                    <td>2022</td>
                                    <td>3-F</td>
                                    <td>Tharindu</td>
                                    <td style="background: red;"></td>
                                </tr>  -->

                            <?php

                            $paymentTable = $conn->query("SELECT sd.*, t.full_name  FROM student_details sd
                            INNER JOIN class_teacher ct ON ct.`year` = sd.`year`
                            AND ct.class = sd.class AND ct.grade = sd.grade
                            INNER JOIN teacher t ON t.nic = ct.teacher_nic
                            WHERE sd.student_index_number = '$indexNo'");

                            if($paymentTable->num_rows == 0) {
                                echo '<tr>
                                <td colspan="5" style="background: #ff9d5c; color: red;">There Are No Details Available</td>
                             </tr>';
                            }
                            else {
                                for($i=1; $i <= $paymentTable->num_rows; $i++) {
                                    $payment = $paymentTable->fetch_assoc();
                                    $color = '';
                                    if(strtoupper($payment["service_payment"]) == "YES") {
                                        $color = "green";
                                    }
                                    else {
                                        $color = "red";
                                    }
                                    echo '<tr>
                                    <td>'. $i .'</td>
                                     <td>'. $payment["year"] .'</td>
                                     <td>'. $payment["grade"] . '-' . $payment["class"] .'</td>
                                     <td>'. $payment["full_name"] .'</td>
                                     <td style="background: '. $color .';"></td>
                                 </tr>';
                                }
                            }                            

                            ?>


                               
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>

           <!-- Footer Start -->
           <div class="container-fluid pt-4 px-4" style="margin-top: 40vh;">
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
<script src="js/main.js"></script>
</body>

</html>