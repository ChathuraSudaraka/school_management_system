<?php

session_start();
if(!isset($_SESSION["adminNic"])) {
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
  <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">

  <!-- Password validator -->
  <link rel="stylesheet" href="passwordValidate/css/jquery.passwordRequirements.css" />

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
        <a href="adminDashboard.php" class="nav-item nav-link"><i
                            class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="adminNotifications.php" class="nav-item nav-link"><i
                            class="bi bi-bell-fill me-2 "></i>Notifications</a>
                    <a href="adminSearchStudent.php" class="nav-item nav-link"><i class="bi bi-search me-2"></i>Search
                        Students</a>
                    <a href="addStudent.php" class="nav-item nav-link"><i class="bi bi-person-plus-fill me-2"></i>Add
                        Student</a>
                    <a href="adminSubject.php" class="nav-item nav-link"><i class="bi bi-journal-plus me-2"></i>Student
                        Subjects</a>
                    <a href="addteacher.php" class="nav-item nav-link active"><i class="bi bi-person-plus-fill me-2"></i>Add
                        teacher</a>
                    <a href="searchTeacher.php" class="nav-item nav-link"><i
                            class="bi bi-search me-2"></i>Search Teacher</a>
                            <a href="adminTeacherSubject.php" class="nav-item nav-link"><i
                            class="bi bi-journal-code me-2"></i>Teacher Subject</a>
                    <a href="addNonAcademic.php" class="nav-item nav-link"><i class="bi bi-person-plus-fill me-2"></i>Add Non-Academic</a>
                    <a href="adminSearchStaff.php" class="nav-item nav-link"><i class="bi bi-search me-2"></i>Search Non-Academic</a>
                    
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
                    <spam class="fw-normal mb-0 text-dark">You have no Any Messages</spam>
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
                <h6 class="fw-normal mb-0 text-dark">You have no Any Notifications</h6>
              </a>
            </div>
          </div>
          <button class="btn btn-outline-primary ms-5" onclick="logOut();">LogOut</button>
        </div>
      </nav>
      <!-- Navbar End -->


      <!-- form Start -->
      <div class="container-fluid pt-4 px-4">
        <div class="row d-flex justify-content-center">
          <div class="alert alert-danger rounded col-12 col-md-8 text-center" id="studentAdded" role="alert">
            <span><i class="bi bi-database-fill-add"></i></span>&#9888; NOTE: Don't use '0' to beginning when enter a
            mobile number.
          </div>
        </div>

        <!-- teacher Details Start -->

        <div class="accordion" id="accordionExample">
          <div class="accordion-item bg-secondary">
            <h2 class="accordion-header" id="headingOne">
              <button class="accordion-button show"
                style="background: linear-gradient(to left , orange, lightyellow); border: black 1px solid;"
                type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                aria-controls="collapseOne">
                Teacher Details
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
              data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <div class="row">
                  <div class="form-floating mb-3 col-12 col-md-6">
                    <input type="text" class="form-control bg-secondary text-dark" id="teacherFirstName"
                      placeholder="name@example.com">
                    <label class="ms-3">First Name</label>
                  </div>
                  <div class="form-floating mb-3 col-12 col-md-6">
                    <input type="text" class="form-control bg-secondary text-dark" id="teacherLastName"
                      placeholder="name@example.com">
                    <label for=" " class="ms-3">Last Name</label>
                  </div>

                </div>
                <div class="row">
                  <div class="form-floating mb-3 col-12 col-md-6">
                    <input type="text" class="form-control bg-secondary text-dark" id="teacherFullName"
                      placeholder="name@example.com">
                    <label for=" " class="ms-3">Full Name</label>
                  </div>
                  <div class="form-floating mb-3 col-12 col-md-6">
                    <input type="date" class="form-control bg-secondary text-dark" id="teacherDateOfBirth"
                      placeholder="name@example.com">
                    <label for="" class="ms-3">Date of birth</label>
                  </div>
                </div>


                <div class="row">
                  <div class="form-floating mb-3 col-12 col-md-6">
                    <input type="text" class="form-control bg-secondary text-dark" id="teacherNIC"
                      placeholder="name@example.com">
                    <label for=" " class="ms-3">NIC</label>
                  </div>
                  <div class="mb-3 col-md-6 col-12">
                    <div class="form-floating">
                      <select class="form-select bg-secondary text-dark" id="teacherGender">
                        <option selected>Open this select menu</option>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                      </select>
                      <label for="">Gender</label>
                    </div>
                  </div>


                </div>
                <div class="row">

                  <div class="mb-3 col-md-6 col-12">
                    <div class="form-floating">
                      <select class="form-select bg-secondary text-dark" id="teacherNationality">
                        <option selected>Open this select menu</option>
                        <option value="1">Sinhalese</option>
                        <option value="2">Tamil</option>
                        <option value="2">Burgher</option>
                        <option value="2">Moor</option>
                      </select>
                      <label for="">Nationality</label>
                    </div>
                  </div>
                  <div class="mb-3 col-md-6 col-12">
                    <div class="form-floating">
                      <select class="form-select bg-secondary text-dark" id="teacherReligion">
                        <option selected>Open this select menu</option>
                        <option value="1">Buddhist</option>
                        <option value="2">Catholic</option>
                        <option value="3">Hindu</option>
                        <option value="4">Islam</option>
                      </select>
                      <label for="">Religion</label>
                    </div>
                  </div>

                </div>
                <div class="row">
                  <div class="mb-3 col-12">
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Qualification</label>
                      <textarea class="form-control text-dark bg-secondary" id="qualification" rows="3"></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Guardian Details Start -->


          <!-- Contact Details Start -->

          <div class="accordion-item bg-secondary">
            <h2 class="accordion-header" id="headingThree">
              <button class="accordion-button collapsed"
                style="background: linear-gradient(to left , orange, lightyellow); border: black 1px solid;"
                type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                aria-controls="collapseThree">
                Contact Details
              </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
              data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <div class="row">
                  <div class="form-floating mb-3 col-12 col-md-6">
                    <input type="number" class="form-control bg-secondary text-dark" id="teacherContactNumber"
                      placeholder="name@example.com">
                    <label for="" class="ms-3"> Contact Number</label>
                  </div>

                  <div class="form-floating mb-3 col-12 col-md-6">
                    <input type="email" class="form-control bg-secondary text-dark" id="teacherEmail"
                      placeholder="name@example.com">
                    <label for=" " class="ms-3"> Email</label>
                  </div>
                </div>
                <div class="row">
                  <div class="form-floating mb-3 col-12">
                    <input type="password" class="form-control bg-secondary text-dark pr-password" id="teacherPassword"
                      placeholder="name@example.com">
                    <label for="" class="ms-3">Password</label>
                  </div>


                </div>
                <div class="row">
                  <div class="form-floating mb-3 col-12">
                    <input type="text" class="form-control bg-secondary text-dark" id="address"
                      placeholder="name@example.com">
                    <label for="" class="ms-3">Permenent Address</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="d-grid gap-2 col-6 mx-auto">
            <button class="btn btn-outline-primary mt-3" data-bs-toggle="modal"
              data-bs-target="#exampleModal">Submit</button>
          </div>
        </div>
      </div>
      <!-- Form End -->
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">WARNING</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Please double check that all the information for this student is correct and complete before continuing.
              Once the student is added to the database, it may be difficult to make corrections or updates. Are you
              sure you want to continue?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
              <button type="button" data-bs-dismiss="modal" class="btn" style="background: #006ee5; color: white;"
                onclick="addTeacher();">Continue</button>
            </div>
          </div>
        </div>
      </div>



      <!-- Footer Start -->
      <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded-top p-4" style="margin-top: 50vh;">
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
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top z-1"><i class="bi bi-arrow-up"></i></a>
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
  <script src="marksAlert/docs/js/jquery.sweet-modal.min.js"></script>
  <script src="passwordValidate/js/jquery.passwordRequirements.min.js"></script>
  <script src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>

  <!-- Template Javascript -->
  <script src="js/main.js"></script>
  <script src="myscript.js"></script>

  <script type="text/javascript">
    $(function () {
      $(".pr-password").passwordRequirements({
        numCharacters: 8,
        useLowercase: true,
        useUppercase: true,
        useNumbers: true,
        useSpecial: true
      });
    });
  </script>
</body>

</html>