<?php

session_start();
if (!isset($_SESSION['motherName'])) {
  header("location: adminSearchStudent.php");
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
          <a href="adminDashboard.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
          <a href="adminSearchStudent.php" class="nav-item nav-link active"><i class="bi bi-search me-2"></i>Search
            Students</a>
          <a href="addStudent.php" class="nav-item nav-link"><i class="bi bi-person-plus-fill me-2"></i>Add Student</a>
          <a href="adminSubject.php" class="nav-item nav-link"><i class="bi bi-journal-plus me-2"></i>Student
            Subjects</a>
          <a href="addteacher.php" class="nav-item nav-link"><i class="bi bi-person-plus-fill me-2"></i>Add teacher</a>
          <a href="adminTeacherSubject.php" class="nav-item nav-link"><i class="bi bi-journal-code me-2"></i>Teacher
            Subject</a>
          <a href="addNews.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Add News</a>
          <a href="adminRegister.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Manage Register</a>
        </div>
      </nav>
    </div>
    <!-- Sidebar End -->


    <!-- Content Start -->
    <div class="content">
      <!-- Navbar Start -->
      <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
        <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
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
                  <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                  <div class="ms-2">
                    <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                    <small>15 minutes ago</small>
                  </div>
                </div>
              </a>
              <hr class="dropdown-divider">
              <a href="#" class="dropdown-item">
                <div class="d-flex align-items-center">
                  <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                  <div class="ms-2">
                    <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                    <small>15 minutes ago</small>
                  </div>
                </div>
              </a>
              <hr class="dropdown-divider">
              <a href="#" class="dropdown-item">
                <div class="d-flex align-items-center">
                  <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                  <div class="ms-2">
                    <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                    <small>15 minutes ago</small>
                  </div>
                </div>
              </a>
              <hr class="dropdown-divider">
              <a href="#" class="dropdown-item text-center">See all message</a>
            </div>
          </div>
          <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
              <i class="fa fa-bell me-lg-2"></i>
              <span class="d-none d-lg-inline-flex">Notificatin</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
              <a href="#" class="dropdown-item">
                <h6 class="fw-normal mb-0">Profile updated</h6>
                <small>15 minutes ago</small>
              </a>
              <hr class="dropdown-divider">
              <a href="#" class="dropdown-item">
                <h6 class="fw-normal mb-0">New user added</h6>
                <small>15 minutes ago</small>
              </a>
              <hr class="dropdown-divider">
              <a href="#" class="dropdown-item">
                <h6 class="fw-normal mb-0">Password changed</h6>
                <small>15 minutes ago</small>
              </a>
              <hr class="dropdown-divider">
              <a href="#" class="dropdown-item text-center">See all notifications</a>
            </div>
          </div>
          <button class="btn btn-outline-primary ms-5" onclick="logOut();">LogOut</button>
        </div>
      </nav>
      <!-- Navbar End -->

      <!-- Profile Start -->
      <div class="container-fluid pt-4 px-4">
        <h4 class="fw-bold py-3 mb-4"><span class="text-dark fw-light">Student profile</span></h4>
        <div class="row">
          <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-3">
              <div class="btn-group" role="group" aria-label="Basic example">
                <a href="adminSearchStudent.php"><button type="button" class="btn btn-primary">Student
                    Details</button></a>
                <a href="adminGuardian.php"><button type="button" class="btn btn-primary ms-2">Guardian
                    Details</button></a>
                <a href="adminContact.php"><button type="button" class="btn btn-primary ms-2">Contact
                    Details</button></a>
              </div>
            </ul>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Warning</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    Are you sure to save changes ?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn" onclick="updateGuardianData();"
                      style="background: #006ee5; color: white;">Save changes</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="card mb-4">
              <h5 class="card-header text-primary">Guardian Details</h5>
              <!-- Account -->
              <div class="card-body">
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                  <div class="button-wrapper">
                    <p class="text-muted mb-0">Hello There...!</p>
                  </div>
                </div>
              </div>
              <hr class="my-0" />
              <div class="card-body">
                <div class="row">
                  <div class="mb-3 col-md-6">
                    <label for="MotherName" class="form-label">Mother Name</label>
                    <input disabled class="form-control bg-secondary text-dark" type="text" id="MotherName"
                      name="MotherName" value="<?php echo $_SESSION['motherName']; ?>" autofocus />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="MotherNIC" class="form-label">Mother NIC</label>
                    <input disabled class="form-control bg-secondary text-dark" type="text" name="MotherNIC"
                      id="MotherNIC" value="<?php echo $_SESSION['motherNIC']; ?>" />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="Mother Email" class="form-label">Mother Email</label>
                    <input disabled class="form-control bg-secondary text-dark" type="text" id="Mother Email"
                      name="Mother Email" value="<?php echo $_SESSION['motherEmail']; ?>" />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="MotherJob" class="form-label">Mother Job</label>
                    <input disabled type="text" class="form-control bg-secondary text-dark" id="MotherJob"
                      name="MotherJob" value="<?php echo $_SESSION['motherJob']; ?>" />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="MotherJobaddress" class="form-label">Mother Job Address</label>
                    <input disabled type="text" class="form-control bg-secondary text-dark" id="MotherJobaddress"
                      name="MotherJobaddress" value="<?php echo $_SESSION['motherJobAddress']; ?>" />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label class="form-label" for="MotherNumber">Mother Phone Number</label>
                    <div class="input-group input-group-merge">
                      <span class="input-group-text">LK (+94)</span>
                      <input disabled type="text" id="MotherNumber" name="MotherNumber"
                        class="form-control bg-secondary text-dark" value="<?php echo $_SESSION['motherNumber']; ?>" />
                    </div>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="FatherName" class="form-label">Father Name</label>
                    <input disabled class="form-control bg-secondary text-dark" type="text" id="FatherName"
                      name="FatherName" value="<?php echo $_SESSION['fatherName']; ?>" />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="FatherNIC" class="form-label">Father NIC</label>
                    <input disabled type="text" class="form-control bg-secondary text-dark" id="FatherNIC"
                      name="FatherNIC" value="<?php echo $_SESSION['fatherNIC']; ?>" />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="FatherNumber" class="form-label">Father Number</label>
                    <input disabled id="FatherNumber" class="form-control bg-secondary text-dark" name="FatherNumber"
                      value="<?php echo $_SESSION['fatherNumber']; ?>" />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="FatherJob" class="form-label">Father Job</label>
                    <input disabled id="FatherJob" class="form-control bg-secondary text-dark" name="FatherJob"
                      value="<?php echo $_SESSION['fatherJob']; ?>" />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="FatherJobAddress" class="form-label">Father Job Address</label>
                    <input disabled id="FatherJobAddress" class="form-control bg-secondary text-dark"
                      name="FatherJobAddress" value="<?php echo $_SESSION['fatherJobAddress']; ?>" />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="GuardianName" class="form-label">Father Email</label>
                    <input disabled id="GuardianName" class="form-control bg-secondary text-dark" name="GuardianName"
                      value="<?php echo $_SESSION['fatherEmail']; ?>" />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="GuardianName" class="form-label">Guardian Name</label>
                    <input disabled id="GuardianName" class="form-control bg-secondary text-dark" name="GuardianName"
                      value="<?php echo $_SESSION['guardianName']; ?>" />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="GuardianNIC" class="form-label">Guardian NIC</label>
                    <input disabled id="GuardianNIC" class="form-control bg-secondary text-dark" name="GuardianNIC"
                      value="<?php echo $_SESSION['guardianNIC']; ?>" />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="GuardianNumber" class="form-label">Guardian Number</label>
                    <input disabled id="GuardianNumber" class="form-control bg-secondary text-dark"
                      name="GuardianNumber" value="<?php echo $_SESSION['guardianNumber']; ?>" />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="GuardianJob" class="form-label">Guardian Job</label>
                    <input disabled id="GuardianJob" class="form-control bg-secondary text-dark" name="GuardianJob"
                      value="<?php echo $_SESSION['guardianJob']; ?>" />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="GuardianJobAddress" class="form-label">Guardian Job Address</label>
                    <input disabled id="GuardianJobAddress" class="form-control bg-secondary text-dark"
                      name="GuardianJobAddress" value="<?php echo $_SESSION['guardianJobAddress']; ?>" />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="GuardianEmail" class="form-label">Guardian Email</label>
                    <input disabled id="GuardianEmail" class="form-control bg-secondary text-dark" name="GuardianEmail"
                      value="<?php echo $_SESSION['guardianEmail']; ?>" />
                  </div>
                </div>
              </div>
              <!-- /Account -->
            </div>
            <!-- Profile End -->

            <!--footer start-->
            <div class="container-fluid pt-4 px-4 footerGroup" id="footerGroup">
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

        <!-- Template Javascript -->
        <script src="js/multiple.js"></script>
        <script src="js/script.js"></script>
</body>

</html>