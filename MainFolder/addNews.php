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
                    <a href="addNonAcademic.php" class="nav-item nav-link"><i class="bi bi-person-plus-fill me-2"></i>Add Non-Academic</a>
                    <a href="adminSearchStaff.php" class="nav-item nav-link"><i class="bi bi-search me-2"></i>Search Non-Academic</a>
                    
                    <a href="adminTimeTable.php" class="nav-item nav-link"><i class="bi bi-table me-2"></i>Time
                        Table</a>
                    <a href="addNews.php" class="nav-item nav-link active"><i class="fa fa-table me-2"></i>Add News</a>
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
                    <span class="fw-normal mb-0 text-dark">You Don't Have Any Message</span>
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
          <button class="btn btn-outline-primary ms-5" onclick="logOut();">LogOut</button>
        </div>
      </nav>
      <!-- Navbar End -->


      <form id="news-form" method="post" action="process-news.php" enctype="multipart/form-data">
        <div class="container-fluid pt-4 px-4">
          <div class="row add-events bg-secondary p-3">
            <h3 class="text-dark">Add News & Upcoming Events</h3>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Add News/Events Header</span>
              <input type="text" class="form-control bg-secondary text-dark" placeholder="Add News/Events Header"
                aria-label="Add News/Events Header" aria-describedby="basic-addon1" name="news-header" id="newsHeader">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Add News/Events description</span>
              <input type="text" class="form-control bg-secondary text-dark" placeholder="Add News/Events description"
                aria-label="Add News/Events description" aria-describedby="basic-addon1" name="news-description"
                id="newsDescription">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Add A News ID (Unique)</span>
              <input type="text" class="form-control bg-secondary text-dark" placeholder="Enter A News ID (Unique)"
                aria-label="Add News/Events description" aria-describedby="basic-addon1" name="news-id" id="newsId">
            </div>
            <div class="input-group mb-3 col-6">
              <label class="input-group-text" for="inputGroupFile01">Add News/Events Image</label>
              <input type="file" class="form-control text-dark" id="newsImage" name="news-image">
              <p class="text-primary" style="color: red;">&#9888; NOTE: Please ensure that your image has a resolution
                of 1280x720 before uploading. Images with resolutions other than 1280x720 will be rejected by the
                server.</p>
            </div>
            <span>Select Grade:</span>
            <div class="row">
              <div class="form-check form-switch mb-1 ms-3 col-md-3 col-3">
                <label class="form-check-label" for="flexSwitchCheckChecked">Grade 1</label>
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked
                  name="grades[]" value="1">
              </div>
              <div class="form-check form-switch mb-1 ms-3 col-md-3 col-3">
                <label class="form-check-label" for="flexSwitchCheckChecked">Grade 2</label>
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked
                  name="grades[]" value="2">
              </div>
              <div class="form-check form-switch mb-1 ms-3 col-md-3 col-3">
                <label class="form-check-label" for="flexSwitchCheckChecked">Grade 3</label>
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked
                  name="grades[]" value="3">
              </div>
              <div class="form-check form-switch mb-1 ms-3 col-md-3 col-3">
                <label class="form-check-label" for="flexSwitchCheckChecked">Grade 4</label>
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked
                  name="grades[]" value="4">
              </div>
              <div class="form-check form-switch mb-1 ms-3 col-md-3 col-3">
                <label class="form-check-label" for="flexSwitchCheckChecked">Grade 5</label>
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked
                  name="grades[]" value="5">
              </div>
            </div>
            <div class="row">
              <div class="form-check form-switch mb-1 ms-3 col-md-3">
                <label class="form-check-label" for="flexSwitchCheckChecked">Grade 6</label>
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked
                  name="grades[]" value="6">
              </div>
              <div class="form-check form-switch mb-1 ms-3 col-md-3 col-sm-12">
                <label class="form-check-label" for="flexSwitchCheckChecked">Grade 7</label>
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked
                  name="grades[]" value="7">
              </div>
              <div class="form-check form-switch mb-1 ms-3 col-md-3 col-sm-6">
                <label class="form-check-label" for="flexSwitchCheckChecked">Grade 8</label>
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked
                  name="grades[]" value="8">
              </div>
              <div class="form-check form-switch mb-1 ms-3 col-md-3 col-sm-6">
                <label class="form-check-label" for="flexSwitchCheckChecked">Grade 9</label>
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked
                  name="grades[]" value="11">
              </div>
              <div class="form-check form-switch mb-1 ms-3 col-md-3 col-sm-6">
                <label class="form-check-label" for="flexSwitchCheckChecked">Grade 10</label>
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked
                  name="grades[]" value="10">
              </div>
            </div>
            <div class="row">
              <div class="form-check form-switch mb-1 ms-3 col-md-3 col-3">
                <label class="form-check-label" for="flexSwitchCheckChecked">Grade 11</label>
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked
                  name="grades[]" value="11">
              </div>
              <div class="form-check form-switch mb-1 ms-3 col-md-3 col-3">
                <label class="form-check-label" for="flexSwitchCheckChecked">Grade 12</label>
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked
                  name="grades[]" value="12">
              </div>
              <div class="form-check form-switch mb-1 ms-3 col-md-3 col-3">
                <label class="form-check-label" for="flexSwitchCheckChecked">Grade 13</label>
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked
                  name="grades[]" value="13">
              </div>
            </div>
            <button type="button" class="btn btn-outline-primary mt-3" data-bs-toggle="modal"
              data-bs-target="#exampleModal">Add News/Events</button>
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Warning</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Are you sure to add this news?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn " data-bs-dismiss="modal" style="background: #006ee5; color: white;"
                  id="submitButton">Save changes</button>
              </div>
            </div>
          </div>
        </div>
      </form>


      <!-- Footer Start -->
      <div class="container-fluid pt-4 px-4 footerGroup" style="margin-top: 35vh;">
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
  <script>
    const form = document.getElementById('news-form');
    const button = document.getElementById('submitButton');
    const newsHeader = document.getElementById('newsHeader');
    const newsDescription = document.getElementById('newsDescription');
    const newsId = document.getElementById('newsId');
    const newsImage = document.getElementById('newsImage');

    button.addEventListener('click', (event) => {
      event.preventDefault();

      if (newsHeader.value.trim() == '' | newsDescription.value.trim() == '' | newsId.value.trim() == '' |
        newsImage.files[0] == '') {
        Swal.fire({
          icon: 'error',
          title: 'ERROR',
          text: 'You Must Fill All Text Fields Before Submitting',
        })
      }
      else {
        const formData = new FormData(form);

        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'process/saveNews.php', true);
        xhr.onload = function () {
          if (this.status === 200) {
            if (xhr.responseText == 'invalidFileType') {
              Swal.fire({
                icon: 'warning',
                title: 'WARNING',
                text: 'You Must Select A Image And It Must Contain Valid Resolutions(1280x720)',
              })
            }
          }
        };
        xhr.send(formData);
      }
    });
  </script>
</body>

</html>