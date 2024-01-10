<?php

session_start();
if (!isset($_SESSION['adminNic'])) {
  header("location: admin.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Admin - School Management System</title>
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

  <!-- Option 1: Include in HTML -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

  <!-- Template Stylesheet -->
  <link href="css/style.css" rel="stylesheet" />
</head>

<body>
  <div class="container-fluid position-relative d-flex p-0">
    <!-- Spinner Start -->
    <div id="spinner"
      class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
      <div class="spinner-border text-primary" style="width: 3rem; height: 3rem; color: orange;" role="status">
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
        <a href="dashboard.php" class="navbar-brand mx-4 mb-3">
          <h3 class="text-primary text-center hide-text">Sri Dharmaloka</h3>
          <h3 class="text-primary text-center hide-text">College</h3>
        </a>

        <div class="d-flex align-items-center ms-4 mb-4 flex-column">
          <div class="d-flex align-items-center justify-content-center w-100">
            <img src="img/badge.png" class="schoolBadge" style="height: 190px" />
          </div>
        </div>
        <div class="navbar-nav w-100">
          <a href="adminDashboard.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
          <a href="adminNotifications.php" class="nav-item nav-link"><i
              class="bi bi-bell-fill me-2"></i>Notifications</a>
          <a href="adminSearchStudent.php" class="nav-item nav-link"><i class="bi bi-search me-2"></i>Search
            Students</a>
          <a href="addStudent.php" class="nav-item nav-link"><i class="bi bi-person-plus-fill me-2"></i>Add Student</a>
          <a href="adminSubject.php" class="nav-item nav-link active"><i class="bi bi-journal-plus me-2"></i>Student
            Subjects</a>
          <a href="addteacher.php" class="nav-item nav-link"><i class="bi bi-person-plus-fill me-2"></i>Add teacher</a>
          <a href="searchTeacher.php" class="nav-item nav-link"><i class="bi bi-search me-2"></i>Search Teacher</a>
          <a href="adminTeacherSubject.php" class="nav-item nav-link"><i class="bi bi-journal-code me-2"></i>Teacher
            Subject</a>
          <a href="addNonAcademic.php" class="nav-item nav-link"><i class="bi bi-person-plus-fill me-2"></i>Add
            Non-Academic</a>
          <a href="adminSearchStaff.php" class="nav-item nav-link"><i class="bi bi-search me-2"></i>Search
            Non-Academic</a>

          <a href="adminTimeTable.php" class="nav-item nav-link"><i class="bi bi-table me-2"></i>Time Table</a>
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
        <a href="#" class="navbar-brand d-flex d-lg-none me-4">
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
                    <span class="fw-normal mb-0">You Don't Have Any Notification Message</span>
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
                <span class="fw-normal mb-0">You Don't Have Any Notification</span>
              </a>
            </div>
          </div>
          <button class="btn btn-outline-primary ms-5" onclick="logOut();">
            LogOut
          </button>
        </div>
      </nav>
      <!-- Navbar End -->

      <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded-top p-4">
          <h3 class="text-dark">Discipline Management</h3>

          <!-- student start -->

          <div class="row">
            <div class="col-12 col-md-6">
              <div class="form-floating mb-3">
                <input type="text" class="form-control text-dark bg-secondary" id="index"
                  placeholder="name@example.com" />
                <label for="floatingInput">Search By Index</label>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="form-floating">
                <input class="form-control bg-secondary text-dark" id="typing" type="text" placeholder="Index Number"
                  data-index="" onkeyup="studentLiveSearch();" />
                <label for="floatingSelectGrid">Search By Name</label>
                <div class="list-group" style="position: absolute; width: 100%; z-index: 100000" id="item-container">
                  <!-- suggestions append to here -->
                </div>
              </div>
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
              <button class="btn btn-primary mb-3" type="button" onclick="searchStudent();">
                Search
              </button>
            </div>
            <hr />
            <div class="col-12">
              <div class="row">
                <div class="col-12 d-flex align-items-center">
                  <div class="d-flex justify-content-center align-items-center" style="
                        background: black;
                        border-radius: 50%;
                        width: 120px;
                        height: 120px;
                      ">
                    <img id="pic" src="profileImg/default.png" style="width: 95%; height: 95%; border-radius: 50%" />
                  </div>
                  <div class="row">
                    <div class="col-12 mx-4">
                      <h4 class="text-dark" id="studentName">
                        Ex: Tharindu Nimesh Dewinda
                      </h4>
                      <h4 class="text-dark" id="studentClass">Ex: 6-F</h4>
                      <h4 class="text-dark" id="searchIndex" data-id="0">Ex: 23056</h4>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row d-flex justify-content-center">
                <div class="mt-3 col-md-4 col-12 rounded d-flex align-items-center justify-content-between p-4"
                  style="background-color: #00ff00" id="scoreBox">
                  <i class="fa fa-chart-line fa-3x text-primary"></i>
                  <div class="ms-3">
                    <p class="mb-2 text-dark">Descipline Score</p>
                    <h6 class="mb-0 text-dark" id="score">Ex: 80%</h6>
                  </div>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-6 col-12">
                  <div class="form-floating">
                    <select class="form-select text-dark bg-secondary" id="mistake"
                      aria-label="Floating label select example" onchange="method();">
                      <option selected value="0">
                        Open this select menu
                      </option>
                      <option value="1">Method 01 ( -1 )</option>
                      <option value="2">Method 02 ( -3 )</option>
                      <option value="3">Method 03 ( -5 )</option>
                      <option value="4">Custom ( -custom )</option>
                    </select>
                    <label for="floatingSelect">Works with selects</label>
                  </div>
                </div>
                <div class="col-md-6 col-12 d-none mt-3 mt-md-0" id="custom">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control bg-secondary
                      text-dark" id="customValue" placeholder="name@example.com">
                    <label for="floatingInput">Custom Value</label>
                  </div>
                </div>
                <div class="col-12 col-md-6 mt-3 mt-md-0" id="descriptionBox">
                  <div class="form-floating">
                    <textarea class="form-control text-dark bg-secondary" placeholder="Leave a comment here"
                      id="description"></textarea>
                    <label for="floatingTextarea">Description</label>
                  </div>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                  <button class="btn btn-outline-danger me-md-2 mt-3" type="button" onclick="submit();">
                    Submit
                  </button>
                </div>
              </div>
            </div>
          </div>

          <!-- student start -->

          <!-- help start -->
          <div class="row mt-5">
            <hr />
            <h3 class="text-dark">Guidance</h3>
            <div class="col-12 d-flex mt-3 align-items-center flex-column">
              <div class="d-flex" style="
                    width: 70%;
                    height: 40px;
                    background-image: linear-gradient(
                      to left,
                      #00ff00,
                      #ffff00,
                      #ffa500,
                      #ff0000
                    );
                    border-radius: 10px;
                  ">
                <p class="text-dark" style="font-weight: bold; width: 25%">
                  Custom
                </p>
                <p class="text-dark" style="font-weight: bold; width: 25%">
                  -5
                </p>
                <p class="text-dark" style="font-weight: bold; width: 25%">
                  -3
                </p>
                <p class="text-dark" style="font-weight: bold; width: 25%">
                  -1
                </p>
              </div>
              <div class="row" style="width: 80%">
                <div class="col-12 d-flex">
                  <p class="text-dark">High</p>
                  <p class="text-dark" style="margin-left: 90%">Low</p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-md-6 p-3" style="
                  border-color: black;
                  border-style: solid;
                  border-width: 2px;
                ">
              <h5 class="text-dark">
                1) Uniform and Grooming Issues: ( -1 )
              </h5>
              <ul>
                <li>
                  Not wearing the school uniform or wearing it incorrectly
                </li>
                <li>Wearing jewelry or accessories that are not allowed</li>
                <li>Having an inappropriate hairstyle or hair color</li>
                <li>Growing a beard or mustache against school rules</li>
              </ul>
            </div>

            <div class="col-12 col-md-6 p-3" style="
                  border-color: black;
                  border-style: solid;
                  border-width: 2px;
                ">
              <h5 class="text-dark">2) Attendance and Punctuality: ( -3 )</h5>
              <ul>
                <li>
                  Coming to school late or leaving early without a valid
                  reason
                </li>
                <li>Skipping classes or school without permission</li>
                <li>Failing to submit assignments on time</li>
                <li>
                  Failing to attend mandatory school events or assemblies
                </li>
              </ul>
            </div>

            <div class="col-12 col-md-6 p-3" style="
                  border-color: black;
                  border-style: solid;
                  border-width: 2px;
                ">
              <h5 class="text-dark">3) Behavioral Issues: ( -5 )</h5>
              <ul>
                <li>
                  Engaging in physical or verbal fights with other students or
                  teachers
                </li>
                <li>Bullying or harassing others</li>
                <li>Vandalizing school property or public objects</li>
                <li>
                  Engaging in romantic relationships during school hours
                </li>
              </ul>
            </div>

            <div class="col-12 col-md-6 p-3" style="
                  border-color: black;
                  border-style: solid;
                  border-width: 2px;
                ">
              <h5 class="text-dark">4) Substance Abuse: ( -custom )</h5>
              <ul>
                <li>
                  Possessing, using or distributing drugs or alcohol on school
                  grounds
                </li>
                <li>Smoking cigarettes or vaping in prohibited areas</li>
                <li>
                  Being under the influence of drugs or alcohol while on
                  school premises
                </li>
                <li>
                  Encouraging or influencing others to use drugs or alcohol
                </li>
              </ul>
            </div>
          </div>

          <!-- help end -->
        </div>
      </div>

      <!-- Footer Start -->
      <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded-top p-4">
          <div class="row">
            <div class="col-12 col-sm-6 text-center text-sm-start">
              &copy; <a href="#">Your Site Name</a>, All Right Reserved.
            </div>
            <div class="col-12 col-sm-6 text-center text-sm-end">
              <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
              Designed By
              <a href="https://eversoft.cf/">Eversoft IT Solutions</a>
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
    var studentDetailsNumber = 0;

    function studentLiveSearch() {
      document.getElementById("item-container").style.display = "";
      var name = document.getElementById("typing").value;

      if (name.trim() == "") {
        document.getElementById("item-container").innerHTML = "";
      } else {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
          if (xhr.readyState == 4 && xhr.status == 200) {
            // handle response
            document.getElementById("item-container").innerHTML = "";
            var response = JSON.parse(xhr.responseText);
            for (let i = 0; i < response.length; i++) {
              var item = document.createElement("button");
              item.innerHTML =
                response[i].student["name"] +
                " - " +
                response[i].student["index_number"] +
                " - " +
                response[i].student["grade"] +
                "-" +
                response[i].student["class"];
              item.classList.add("list-group-item");
              item.classList.add("list-group-item-action");
              item.classList.add("text-dark");
              item.dataset.index = response[i].student["index_number"];
              item.onclick = function () {
                document.getElementById("typing").value = this.innerHTML;
                document.getElementById("typing").dataset.index =
                  this.dataset.index;
                document.getElementById("item-container").style.display =
                  "none";
              };
              document.getElementById("item-container").appendChild(item);
            }
          }
        };

        xhr.open("GET", "process/liveSearch.php?name=" + name + "", true);
        xhr.send();
      }
    }

    function searchStudent() {
      const index = document.getElementById("index");
      const name = document.getElementById("typing");

      if (
        (index.value.trim() == "" && name.value.trim() == "") ||
        (index.value.trim() != "" && name.value.trim() != "")
      ) {
        Swal.fire("WARNING", "You Must Fill In One Text Field At A Time", "warning");
        studentDetailsNumber = 0;
      } else {
        var indexNumber = index.value;
        if (name.value.trim() != "") {
          indexNumber = name.dataset.index;
        }
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
          if (xhr.readyState == 4 && xhr.status == 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.status == "error") {
              Swal.fire("WARNING", "Invalid Index Number", "warning");
              document.getElementById("searchIndex").dataset.id = "0";
              studentDetailsNumber = 0;
            } else {
              var score = response.student["score"];
              var scoreBox = document.getElementById("scoreBox");
              document.getElementById("studentName").innerHTML =
                response.student["initial_name"];
              document.getElementById("studentClass").innerHTML =
                response.student["grade"] + "-" + response.student["class"];
              document.getElementById("score").innerHTML = score + "%";
              if (score >= 80) {
                scoreBox.style.backgroundColor = "#00FF00";
              } else if (score >= 60) {
                scoreBox.style.backgroundColor = "#FFFF00";
              } else if (score >= 40) {
                scoreBox.style.backgroundColor = "#FFA500";
              } else {
                scoreBox.style.backgroundColor = "#FF0000";
              }
              document.getElementById("pic").src =
                "profileImg/" + response.student["path"];
              document.getElementById("searchIndex").innerHTML =
                response.student["index_number"];
              document.getElementById("searchIndex").dataset.id =
                response.student["index_number"];
              studentDetailsNumber = response.student['details_id'];
            }
          }
        };

        xhr.open(
          "GET",
          "process/searchStudent.php?index=" + indexNumber + "",
          true
        );
        xhr.send();
      }
    }

    function method() {
      const mistake = document.getElementById("mistake");
      const descriptionBox = document.getElementById("descriptionBox");
      const custom = document.getElementById("custom");

      if (mistake.value == 4) {
        custom.classList.remove("d-none");
        descriptionBox.classList.remove("col-md-6");
      } else {
        custom.classList.add("d-none");
        descriptionBox.classList.add("col-md-6");
      }
    }

    function submit() {
      const index = document.getElementById("searchIndex");
      const mistake = document.getElementById("mistake");
      const description = document.getElementById("description");
      const customValue = document.getElementById("customValue");

      if (studentDetailsNumber == 0) {
        Swal.fire("ERROR", "Search A Student First", "error");
      } else {
        if (mistake.value == 0) {
          Swal.fire("WARNING", "Please Select A Mistake First", "warning");
        }
        else if (description.value.trim() == '') {
          Swal.fire("WARNING", "Please Add A Description About Mistake", "warning");
        }
        else {
          var form = new FormData();
          form.append("level", mistake.value);
          form.append("index", index.dataset.id);
          form.append("details_id", studentDetailsNumber);
          form.append("description", description.value);
          form.append("me", <?php echo $_SESSION['adminNic']; ?>);
          form.append("role", "1");
          if (mistake.value == 4) {
            form.append("custom", customValue.value);
          }

          var xhr = new XMLHttpRequest();
          xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
              // handle response
              Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Discipline Marks Updated',
                showConfirmButton: false,
                timer: 1500
              });
              var score = xhr.responseText
              document.getElementById("score").innerHTML = score + "%";
              if (score >= 80) {
                scoreBox.style.backgroundColor = "#00FF00";
              } else if (score >= 60) {
                scoreBox.style.backgroundColor = "#FFFF00";
              } else if (score >= 40) {
                scoreBox.style.backgroundColor = "#FFA500";
              } else {
                scoreBox.style.backgroundColor = "#FF0000";
              }
            }
          };

          xhr.open("POST", "process/updateDiscipline.php", true);
          xhr.send(form);
        }
      }
    }
  </script>
</body>

</html>