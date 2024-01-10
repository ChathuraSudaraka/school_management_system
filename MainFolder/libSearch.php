<?php

session_start();
if (!isset($_SESSION["libAdminNic"])) {
  header("location: library.php");
}

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
          <a href="libDashboard.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
          <a href="addBook.php" class="nav-item nav-link"><i class="bi bi-book-half me-2"></i>Add Books</a>
          <a href="libSearch.php" class="nav-item nav-link active"><i class="bi bi-gear-wide-connected me-2"></i>Manage
            Books</a>
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

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Update Status</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Are you sure you want to update the status of this book? This action will mark the book as "returned" and
              make it available for other clients to borrow. Please ensure that the book has been properly checked for
              any damages or missing pages before updating the status.
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn" style="background: #4564ff; color: white;" data-bs-dismiss="modal"
                id="updateBTN" onclick="updateStatus(this);">Save changes</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Sale & Revenue Start -->
      <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded-top p-4">
          <h3 class="text-dark">Manage Books</h3>
          <div class="input-group mb-3">
            <input type="text" class="form-control bg-secondary text-dark" placeholder="Search By ID"
              aria-label="Recipient's username" aria-describedby="button-addon2" id="bookId">
            <button class="btn btn-primary" type="button" id="button-addon2" onclick="searchById();">Search</button>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead class="table-dark">
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Copies</th>
                  <th>Author</th>
                  <th>Borrowing count</th>
                  <th>Status</th>
                  <th>Holder Info</th>
                </tr>
              </thead>
              <tbody id="tBody">
                <th style="color: red; background: orange;" colspan='7'>Search a book first</th>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Sale & Revenue End -->

      <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded-top p-4">
          <h3 class="text-dark">Search By Author</h3>
          <div class="input-group mb-3">
            <select class="form-select bg-secondary text-dark" id="author"
              aria-label="Example select with button addon">
              <?php

              $conn = new mysqli("localhost", "root", "Mercy@2005", "sms");
              $author_list = $conn->query("SELECT * FROM `book_authors` ORDER BY `name` ASC");

              if ($author_list->num_rows == 0) {
                echo "<option selected>No Any Authors Exists</option>";
              } else {
                echo "<option value='0'>Select A Author</option>";
                for ($i = 0; $i < $author_list->num_rows; $i++) {
                  $data = $author_list->fetch_assoc();
                  echo "
                    <option value='" . $data['id'] . "'>" . $data['name'] . "</option>
                    ";
                }
              }

              ?>
            </select>
            <button class="btn btn-primary" type="button" onclick="bookByAuthor();">Search</button>
          </div>
          <h6 class="text-dark">Books : <span id="booksCount">None</span> </h6>
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead class="table-dark">
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody id="tBody2">
                <th style="color: red; background: orange;" colspan="3">Select a Author First</th>
              </tbody>
            </table>
          </div>
        </div>
      </div>


      <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded-top p-4">
          <h3 class="text-dark">Search By Book Title</h3>
          <div class="input-group mb-3">
            <select class="form-select bg-secondary text-dark" id="title" aria-label="Example select with button addon">
              <?php

              $book_list = $conn->query("SELECT * FROM `book_titles` ORDER BY `name` ASC");

              if ($book_list->num_rows == 0) {
                echo "<option selected>No Any Authors Exists</option>";
              } else {
                echo "<option value='0'>Select A Title</option>";
                for ($i = 0; $i < $book_list->num_rows; $i++) {
                  $data = $book_list->fetch_assoc();
                  echo "
                    <option value='" . $data['id'] . "'>" . $data['name'] . "</option>
                    ";
                }
              }

              ?>
            </select>
            <button class="btn btn-primary" type="button" onclick="bookByTitle();">Search</button>
          </div>
          <h6 class="text-dark">Copies : <span id="copiesCount">None</span> </h6>
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead class="table-dark">
                <tr>
                  <th>ID</th>
                  <th>Author</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody id="tBody3">
                <th style="color: red; background: orange;" colspan="3">Select a Title First</th>
              </tbody>
            </table>
          </div>
        </div>
      </div>

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
  <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

  <!-- Template Javascript -->
  <script src="js/admin.js"></script>
  <script>
    function searchById() {
      let bookId = document.getElementById("bookId").value;

      const regex = /^[0-9]+$/;

      if (!regex.test(bookId)) {
        Swal.fire({
          icon: 'warning',
          title: 'WARNING',
          text: "Please Enter A Book ID First",
        });

        document.getElementById("tBody").innerHTML = '<th style="color: red; background: orange;" colspan="7">Search a book first</th>';
      }
      else {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
          if (xhr.readyState == 4 && xhr.status == 200) {
            // handle response 
            var response = JSON.parse(xhr.responseText);
            var tbody = document.getElementById("tBody");
            if (response.status == 'error') {
              tbody.innerHTML = '';
              var row = document.createElement("tr");
              var col = document.createElement("th");
              col.colSpan = 7;
              col.innerHTML = 'There are no books with this ID'
              col.style.color = "red";
              col.style.backgroundColor = "orange";
              row.appendChild(col);
              tbody.appendChild(row)
            }
            else if (response.status == 'success') {
              tbody.innerHTML = '';
              var colNames = ["id", "name", "copies", "author", "count", "st"];
              var row = document.createElement("tr");
              for (let i = 0; i < 7; i++) {
                var col = document.createElement("th");
                var cName = colNames[i];
                if (cName == 'copies') {
                  col.innerHTML = response.copies;
                  row.appendChild(col);
                  continue;
                }
                if (i == 6) {
                  col.innerHTML = response.late;
                  if (response.late != 'none') {
                    col.style.cursor = "pointer";
                    col.setAttribute("data-bs-toggle", "modal");
                    col.setAttribute("data-bs-target", "#exampleModal");
                    col.id = "holder" + response.borrowId;
                    document.getElementById("updateBTN").setAttribute("data-borrow-id", response.borrowId);
                    document.getElementById("updateBTN").setAttribute("data-borrow-person", response.borrowPerson);
                    document.getElementById("updateBTN").setAttribute("data-book-id", response.bookId);
                  }
                  if (response.lateStatus == 'Yes') {
                    col.style.backgroundColor = "red";
                    col.style.color = "white";
                  }
                  row.appendChild(col);
                  continue;
                }
                if (cName == 'st') {
                  if (response.book[cName] == '0') {
                    col.innerHTML = 'Not Available';
                  }
                  else {
                    col.innerHTML = 'Available';
                  }
                }
                else {
                  col.innerHTML = response.book[cName];
                }
                row.appendChild(col);
              }
              tbody.appendChild(row);
            }
          }
        }

        xhr.open("GET", "process/bookById.php?id=" + bookId + "", true);
        xhr.send();
      }
    }

    function updateStatus(Button) {
      let borrowId = Button.dataset.borrowId;
      let borrowPerson = Button.dataset.borrowPerson;
      let bookId = Button.dataset.bookId;

      var xhr = new XMLHttpRequest();
      var form = new FormData();
      form.append("id", borrowId);
      form.append("person", borrowPerson);
      form.append("bookId", bookId);

      xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
          // handle response 
          var response = xhr.responseText;
          if (response == "success") {
            Swal.fire({
              position: 'top-end',
              icon: 'success',
              title: 'Book Status Changed',
              showConfirmButton: false,
              timer: 1500
            });
            document.getElementById("holder" + borrowId).innerHTML = "none";
          }
        }
      }

      xhr.open("POST", "process/updateStatus.php", true);
      xhr.send(form);
    }

    function bookByAuthor() {
      var author = document.getElementById("author").value;

      if (author == "0") {
        Swal.fire({
          icon: 'warning',
          title: 'WARNING',
          text: "Select A Author First",
        });
      }
      else {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
          if (xhr.readyState == 4 && xhr.status == 200) {
            // handle response
            var tBody2 = document.getElementById("tBody2");
            var response = JSON.parse(xhr.responseText);
            if (response[0].status == "error") {
              document.getElementById("booksCount").innerHTML = '0';
              tBody2.innerHTML = "<tr><th colspan='3' style='background: orange; color: red;'>This Author Hasn't Any Book</th></tr>";
            }
            else {
              var names = ["id", "title", "status"]
              tBody2.innerHTML = '';
              document.getElementById("booksCount").innerHTML = response.length;
              for (let i = 0; i < response.length; i++) {
                var row = document.createElement("tr");
                for (let a = 0; a < names.length; a++) {
                  var col = document.createElement("td");
                  if (a == 2) {
                    if (response[i].book["status"] == "1") {
                      col.innerHTML = "Available";
                    }
                    else {
                      col.innerHTML = "Not Available";
                    }
                  }
                  else {
                    col.innerHTML = response[i].book[names[a]];
                  }
                  row.appendChild(col);
                }
                tBody2.appendChild(row);
              }
            }
          }
        }

        xhr.open("GET", "process/bookByAuthor.php?id=" + author + "", true);
        xhr.send();
      }
    }

    function bookByTitle() {
      var title = document.getElementById("title").value;

      if (title == '0') {
        Swal.fire({
          icon: 'warning',
          title: 'WARNING',
          text: "Select A Title First",
        });
      }
      else {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
          if (xhr.readyState == 4 && xhr.status == 200) {
            // handle response
            var tBody3 = document.getElementById("tBody3");
            var response = JSON.parse(xhr.responseText);
            if (response[0].status == "error") {
              document.getElementById("copiesCount").innerHTML = '0';
              tBody3.innerHTML = "<tr><th colspan='3' style='background: orange; color: red;'>No Any Books Exists</th></tr>";
            }
            else {
              var names = ["id", "author", "status"]
              tBody3.innerHTML = '';
              document.getElementById("copiesCount").innerHTML = response.length;
              for (let i = 0; i < response.length; i++) {
                var row = document.createElement("tr");
                for (let a = 0; a < names.length; a++) {
                  var col = document.createElement("td");
                  if (a == 2) {
                    if (response[i].book["status"] == "1") {
                      col.innerHTML = "Available";
                    }
                    else {
                      col.innerHTML = "Not Available";
                    }
                  }
                  else {
                    col.innerHTML = response[i].book[names[a]];
                  }
                  row.appendChild(col);
                }
                tBody3.appendChild(row);
              }
            }
          }
        }

        xhr.open("GET", "process/bookByTitle.php?id=" + title + "", true);
        xhr.send();
      }
    }
  </script>
</body>

</html>