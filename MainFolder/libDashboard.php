<?php

session_start();
if(!isset($_SESSION["libAdminNic"])) {
  header("location: library.php");
}

$conn = new mysqli("localhost", "root", "Mercy@2005", "sms");
$famousBook = $conn->query("SELECT distinct bt.name, bt.`count`, ba.name as author FROM books b
INNER JOIN book_authors ba ON ba.id = b.author_id
INNER JOIN book_titles bt ON bt.id = b.title_id
WHERE bt.`count` <> '0'
ORDER BY bt.`count` DESC LIMIT 10");

$allBooks = $conn->query("SELECT * FROM `books`");
$availableBooks = $conn->query("SELECT * FROM `books` WHERE `status`='1'");

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
          <a href="libDashboard.php" class="nav-item nav-link active"><i
              class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
          <a href="addBook.php" class="nav-item nav-link"><i
              class="bi bi-book-half me-2"></i>Add Books</a>
          <a href="libSearch.php" class="nav-item nav-link"><i class="bi bi-gear-wide-connected me-2"></i>Manage Books</a>
          <a href="borrowBook.php" class="nav-item nav-link"><i class="bi bi-collection me-2"></i>Borrow Books</a>
          <a href="lateList.php" class="nav-item nav-link"><i class="bi bi-card-list me-2"></i>Late List</a>
          
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

      <!-- Sale & Revenue Start -->
      <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
          <div class="col-sm-6 col-xl-6">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
              <i class="fa fa-chart-line fa-3x text-primary"></i>
              <div class="ms-3">
                <p class="mb-2">All Books</p>
                <h6 class="mb-0 text-dark">
                  <?php echo $allBooks->num_rows; ?>
                </h6>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-xl-6">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
              <i class="fa fa-chart-bar fa-3x text-primary"></i>
              <div class="ms-3">
                <p class="mb-2">Available Books</p>
                <h6 class="mb-0 text-dark">
                  <?php echo $availableBooks->num_rows; ?>
                </h6>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Sale & Revenue End -->
      <hr />

      <!-- Sales Chart Start -->
      <div class="container-fluid pt-4 px-4">
        <div class="row g-2 bg-secondary rounded p-2">
          <h3 class="text-dark">Famous Books</h3>
          <div class="col-12">

            <?php

            if ($famousBook->num_rows == 0) {
              echo '
                  <div class="col-12">
                  <h5 class="text-center text-danger">Not Enough Data To Predict</h5>
                </div>
                  ';
            } else {

              ?>
              <ol class="list-group list-group-numbered">


                <?php
                for ($i = 0; $i < $famousBook->num_rows; $i++) {
                  $book = $famousBook->fetch_assoc();
                  echo '
                  <li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold">' . $book["name"] . '</div>
                    ' . $book["author"] . '
                  </div>
                  <span class="badge bg-primary rounded-pill">' . $book["count"] . '</span>
                </li>
                  ';
                }
            }
            ?>
            </ol>
          </div>
        </div>
      </div>
      <hr />

      <!-- Sales Chart End -->
      <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
          <div class="col-12">
            <div class="h-100 bg-secondary rounded p-4">
              <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0 text-dark">Calender</h6>
                <a href="">Today</a>
              </div>
              <div id="calender"></div>
            </div>
          </div>
        </div>
      </div>

      <!-- Widgets End -->

      <!-- Footer Start -->
      <div class="container-fluid pt-4 px-4 footerGroup">
        <div class="bg-secondary rounded-top p-4">
          <div class="row">
            <div class="col-12 col-sm-6 text-center text-sm-start">
              &copy; <a href="#">Your Site Name</a>, All Right Reserved.
            </div>
            <div class="col-12 col-sm-6 text-center text-sm-end">
              Designed By
              <a href="https://eversoft.cf">EverSoft IT Solutions</a>
              <br />
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
  <script src="js/admin.js"></script>

  <script>
    // Get the calendar element
    var calender = $("#calender");

    // Get the date you want to change the background color for
    var specificDate = new Date("2023-05-20");

    // Change the background color of the specific date
    calender
      .find("td[data-day='" + specificDate.getDate() + "']")
      .css("background-color", "red");
  </script>
</body>

</html>