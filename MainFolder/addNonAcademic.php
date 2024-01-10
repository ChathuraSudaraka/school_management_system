<?php

session_start();
if (!isset($_SESSION['adminNic'])) {
  header("location: admin.php");
}

$conn = new mysqli("localhost", "root", "Mercy@2005", "sms");

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
                    <a href="addteacher.php" class="nav-item nav-link"><i class="bi bi-person-plus-fill me-2"></i>Add
                        teacher</a>
                    <a href="searchTeacher.php" class="nav-item nav-link"><i
                            class="bi bi-search me-2"></i>Search Teacher</a>
                            <a href="adminTeacherSubject.php" class="nav-item nav-link"><i
                            class="bi bi-journal-code me-2"></i>Teacher Subject</a>
                    <a href="addNonAcademic.php" class="nav-item nav-link active"><i class="bi bi-person-plus-fill me-2"></i>Add Non-Academic</a>
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
        <div class="bg-secondary rounded-top p-4">
          <div class="row">
            <h3 class="text-dark">Add Non-Academic Staff</h3>
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <input type="text" class="form-control bg-secondary text-dark" id="fullName"
                  placeholder="name@example.com">
                <label for="floatingInput">Full Name</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <input type="text" class="form-control bg-secondary text-dark" id="nic" placeholder="name@example.com">
                <label for="floatingInput">NIC</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <input type="text" class="form-control bg-secondary text-dark" id="mobile"
                  placeholder="name@example.com">
                <label for="floatingInput">Contact Number</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <input type="date" class="form-control text-dark bg-secondary" id="date" placeholder="name@example.com">
                <label for="floatingInput">Date Of Registration</label>
              </div>
            </div>
            <div class="col-12 mb-3">
              <div class="form-floating">
                <select class="form-select text-dark bg-secondary" id="role" aria-label="Floating label select example">
                  <option selected value="0">Open this select menu</option>
                  <?php

                  $table = $conn->query("SELECT * FROM job_roles");
                  for ($i = 0; $i < $table->num_rows; $i++) {
                    $job = $table->fetch_assoc();
                    echo '<option value="' . $job["id"] . '">' . $job["name"] . '</option>';
                  }

                  ?>
                </select>
                <label for="floatingSelect">Job Role</label>
              </div>
            </div>
            <div class="d-grid gap-2 col-6 mx-auto mt-3">
              <button class="btn btn-primary" type="button" onclick="addPerson();">Submit</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Form End -->

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
    function addPerson() {
      const name = document.getElementById("fullName");
      const nic = document.getElementById("nic");
      const mobile = document.getElementById("mobile");
      const date = document.getElementById("date")
      const role = document.getElementById("role");
      var regex = /^07[2456780][0-9]{7}$/;

      if (name.value.trim() == '') {
        name.classList.add("is-invalid");
      }
      else if (nic.value.trim() == '') {
        name.classList.remove("is-invalid");
        nic.classList.add("is-invalid");
      }
      else if (!regex.test(mobile.value)) {
        nic.classList.remove("is-invalid");
        mobile.classList.add("is-invalid");
      }
      else if (date.value == '') {
        mobile.classList.remove("is-invalid");
        date.classList.add("is-invalid");
      }
      else if (role.value == '0') {
        date.classList.remove("is-invalid");
        role.classList.add("is-invalid");
      }
      else {
        name.classList.remove("is-invalid");
        nic.classList.remove("is-invalid");
        date.classList.remove("is-invalid");
        mobile.classList.remove("is-invalid");
        role.classList.remove("is-invalid");

        var form = new FormData();
        form.append("name", name.value);
        form.append("nic", nic.value);
        form.append("mobile", mobile.value);
        form.append("date", date.value);
        form.append("role", role.value);

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
          if (xhr.readyState == 4 && xhr.status == 200) {
            // handle response
            if (xhr.responseText == 'error') {
              Swal.fire({
                icon: 'warning',
                title: 'WARNING',
                text: "A Member With This NIC Already Exist!!!"
              });
            }
            else if (xhr.responseText == 'success') {
              Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Staff Added Successfully',
                showConfirmButton: false,
                timer: 1500
              });
            }
          }
        }

        xhr.open("POST", "process/addNonAcademic.php", true);
        xhr.send(form);
      }
    }
  </script>
</body>

</html>