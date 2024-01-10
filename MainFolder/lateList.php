<?php

session_start();
if(!isset($_SESSION["libAdminNic"])) {
  header("location: library.php");
}
$conn = new mysqli("localhost", "root", "Mercy@2005", "sms");
$year = date("Y");
$date = date("Y-m-d");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Library - Sri Dharmaloka College</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="keywords" />
  <meta content="" name="description" />

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon" />

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
    rel="stylesheet" />

  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

  <!-- Libraries Stylesheet -->
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
  <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/bootstrap.min.css" rel="stylesheet" />

  <!-- Template Stylesheet -->
  <link href="css/style.css" rel="stylesheet" />
</head>

<body>
  <div class="container-fluid position-relative d-flex p-0">
    <!-- Spinner Start -->
    <div id="spinner"
      class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
      <div class="spinner-border text-secondary" style="width: 3rem; height: 3rem" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
    <!-- Spinner End -->

    <!-- Sidebar Start -->
    <div class="sidebar pe-4 pb-3 nscroll bg-secondary" style="
          border-right: black 2px solid;
          border-top-right-radius: 8px;
          border-bottom-right-radius: 8px;
        ">
      <nav class="navbar bg-secondary navbar-dark">
        <a href="libDashboard.php" class="navbar-brand mx-4 mb-3">
          <h3 class="text-primary text-center hide-text">Sri Dharmaloka</h3>
          <h3 class="text-primary text-center hide-text">College</h3>
        </a>

        <div class="d-flex align-items-center ms-4 mb-4 flex-column">
          <div class="d-flex align-items-center justify-content-center w-100">
            <img src="img/badge.png" class="schoolBadge" style="height: 190px" />
          </div>
        </div>
        <div class="navbar-nav w-100">
          <a href="libDashboard.php" class="nav-item nav-link"><i
              class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
          <a href="addBook.php" class="nav-item nav-link"><i
              class="bi bi-book-half me-2"></i>Add Books</a>
          <a href="libSearch.php" class="nav-item nav-link"><i class="bi bi-gear-wide-connected me-2"></i>Manage Books</a>
          <a href="borrowBook.php" class="nav-item nav-link"><i class="bi bi-collection me-2"></i>Borrow Books</a>
          <a href="lateList.php" class="nav-item nav-link active"><i class="bi bi-card-list me-2"></i>Late List</a>
          
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
              <span class="d-none d-lg-inline-flex">Messages</span>
              <!-- copy -->
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
              <a href="#" class="dropdown-item">
                <div class="d-flex align-items-center">
                  <div class="ms-2">
                    <span class="fw-normal mb-0 text-dark">You Have No Any Messages</span>
                  </div>
                </div>
              </a>
              <hr class="dropdown-divider" />
            </div>
          </div>
          <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
              <i class="fa fa-bell me-lg-2"></i>
              <span class="d-none d-lg-inline-flex">Notifications</span>
              <!-- copy -->
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
              <a href="#" class="dropdown-item">
                <span class="fw-normal mb-0 text-dark">You have no Any Notifications</span>
              </a>
              <hr class="dropdown-divider" />
            </div>
          </div>
          <button class="btn btn-outline-primary ms-5" onclick="logOut();">
            LogOut
          </button>
        </div>
      </nav>
      <!-- Navbar End -->
            <!-- Navbar End -->

            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <h3 class="text-dark">Students Late List</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Student</th>
                                    <th>Book Title</th>
                                    <th>Book_ID</th>
                                    <th>End Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $year = date("Y");
                                $isReturned = false;

                                $studentLateTable = $conn->query("SELECT s.initial_name,bt.`name`,b.id,sbb.end_date, sd.grade,class FROM student_borrow_books sbb
                                INNER JOIN books b ON b.id = sbb.book_id
                                INNER JOIN student s ON s.index_number = sbb.student_index
                                INNER JOIN book_titles bt ON bt.id = b.title_id
                                INNER JOIN student_details sd ON sd.student_index_number = s.index_number
                                WHERE sbb.`status` = '0' AND sd.`year` = '$year'
                                ORDER BY sbb.end_date ASC");

                                if ($studentLateTable->num_rows == 0) {
                                    echo '
                                        <tr>
                                        <th colspan="5" style="color: red; background: orange;">No Any Late Books</th>
                                    </tr>
                                        ';
                                } else {

                                    for ($i = 0; $i < $studentLateTable->num_rows; $i++) {
                                        $studentLateData = $studentLateTable->fetch_assoc();
                                        if ($studentLateData["end_date"] < $date) {
                                            echo '
                                                <tr>
                                                <td>'. strval($i + 1) .'</td>
                                                    <td>' . $studentLateData["initial_name"] . " " . $studentLateData["grade"] . "-" . $studentLateData["class"] . '</td>
                                                    <td>' . $studentLateData["name"] . '</td>
                                                    <td>' . $studentLateData["id"] . '</td>
                                                    <td>' . $studentLateData["end_date"] . '</td>
                                                </tr>
                                                ';
                                        } else {
                                            if (!$isReturned) {
                                                echo '
                                        <tr>
                                        <th colspan="5" style="color: red; background: orange;">No Any Late Books</th>
                                    </tr>
                                        ';
                                                $isReturned = true;
                                            }
                                        }
                                    }
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <h3 class="text-dark">Teachers Late List</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Teacher</th>
                                    <th>Book Title</th>
                                    <th>Book ID</th>
                                    <th>End Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $isReturned = false;

                                $teacherLateTable = $conn->query("SELECT t.full_name, bt.`name`AS title, b.id, tbb.end_date
                                FROM teacher_borrow_books tbb
                                INNER JOIN teacher t ON tbb.teacher_nic = t.nic
                                INNER JOIN books b ON b.id = tbb.book_id
                                INNER JOIN book_titles bt ON b.title_id = bt.id
                                WHERE tbb.status = '0' AND DATE(tbb.end_date) <= CURDATE()
                                ORDER BY tbb.end_date ASC");

                                if ($teacherLateTable->num_rows == 0) {
                                    echo '
                                        <tr>
                                        <th colspan="5" style="color: red; background: orange;">No Any Late Books</th>
                                    </tr>
                                        ';
                                } else {

                                    for ($i = 0; $i < $teacherLateTable->num_rows; $i++) {
                                        $teacherLateData = $teacherLateTable->fetch_assoc();
                                        echo '
                                                <tr>
                                                    <td>' . strval($i + 1) . '</td>
                                                    <td>' . $teacherLateData["full_name"] . '</td>
                                                    <td>' . $teacherLateData["title"] . '</td>
                                                    <td>' . $teacherLateData["id"] . '</td>
                                                    <td>' . $teacherLateData["end_date"] . '</td>
                                                </tr>
                                                ';

                                    }
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Form End -->

            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved.
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            Designed By <a href="https://eversoft.cf/">Eversoft IT Solutions</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
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
    <script src="myscript.js"></script>


</body>

</html>