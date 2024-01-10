<?php 
    
    session_start();
    if(!isset($_SESSION['teacherNic'])) {
        header("location: teacher.php");
    }

    $connection = new mysqli("localhost", "root", "Mercy@2005", "sms");

    $nic =  $_SESSION['teacherNic'];
    $thisYear = date("Y");
 
    $teacherClassInfo = $connection->query("SELECT * FROM `class_teacher` WHERE `teacher_nic`='$nic' AND year='$thisYear'");

    $classInfo = '';

    if($teacherClassInfo->num_rows == 0) {
        $classInfo = "noClass";
    }

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Teacher - Sri Dharmaloka College</title>
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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
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
      <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
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
             <a href="teacherDashboard.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="markAttendance.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Attendance <span class="badge bg-danger ms-3"><?php echo $_SESSION['reminder']; ?></span> </a>
                    <a href="addMarks.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Add Marks</a>
                    <a href="teacherTimeTable.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Time Table</a>
                    <a href="addAssignment.php" class="nav-item nav-link active"><i class="bi bi-journal-bookmark-fill me-2"></i>Assingments</a>
                    <a href="searchStudent.php" class="nav-item nav-link"><i class="bi bi-search me-2"></i>Search Student</a>
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
                            <span class="d-none d-lg-inline-flex"><?php echo $_SESSION['teacherName']; ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="teacherProfile.php" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item" onclick="logOut();">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Navbar End -->


            <!-- Widget Start -->
 
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4 bg-secondary mt-1 px-4 pt-2 pb-3 rounded-5">

                    <div class="col-12  table-responsive ">
                        <table id="studentTable" class="table table-striped table-bordered table-responsive rounded-5">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Student_Name</th>
                                    <th scope="col">Index_Number</th>
                                    <th scope="col">Date_Of_Birth</th>
                                    <th scope="col">Payment</th>
                                </tr>
                            </thead>
                            <tbody id="outputTable">
                          <!--    <tr>
                                    <th scope="row">1</th>
                                    <td>Tharindu</td>
                                    <td>English</td>
                                    <td>12/31 11.59</td>
                                    <td>@12345</td>
                                </tr>  -->
                                
                                <?php 

                                if($classInfo == "noClass") {
                                    echo '<tr>
                                    <th style="background: orange; color: red;" colspan="5">You do not have a class</th>
                                </tr>';
                                }
                                else {
                                    $info = $teacherClassInfo->fetch_assoc();
                                    $grade = $info["grade"];
                                    $class = $info["class"];

                                    $getStudents = $connection->query("SELECT sd.service_payment, s.full_name,date_of_birth,index_number FROM student_details sd
INNER JOIN student s ON s.index_number = sd.student_index_number
WHERE sd.`year` = '$thisYear' AND sd.class = '$class' AND sd.grade = '$grade'");

                                    if($getStudents->num_rows == 0) {
                                        echo '<tr>
                                    <th style="background: orange; color: red;" colspan="5">You class does not have students</th>
                                </tr>'; 
                                    }
                                    else {
                                        for ($i=1; $i <= $getStudents->num_rows ; $i++) { 
                                            $student = $getStudents->fetch_assoc();
                                            $paymentColor = '';
                                            if (strtoupper($allData['payment']) == 'NO') {
                                                $paymentColor = "#ff2c2c";
                                            }
                                            else {
                                                $paymentColor = "#2cae6b";
                                            }
                                            echo '<tr>
                                    <th scope="row">'. $i .'</th>
                                    <td>'. $student["full_name"] .'</td>
                                    <td>'. $student["index_number"] .'</td>
                                    <td>'. $student["date_of_birth"] .'</td>
                                    <td style="background: '. $paymentColor .';"></td>
                                </tr>';

                                        }
                                    }
                                }

                                 ?>
                                

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Widget End -->


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
    <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
   
</body>

</html>