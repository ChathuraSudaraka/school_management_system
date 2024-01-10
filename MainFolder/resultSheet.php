<?php

session_start();
if (!isset($_SESSION['teacherNic'])) {
    header("location: teacher.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sri Dharmaloka Collage - Teacher</title>
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
        <div class="sidebar pe-4 pb-3 nscroll">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="#" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary text-center">Sri Dharmaloka</h3>
                    <h3 class="text-primary text-center hide-text">College</h3>
                </a>

                <div class="d-flex align-items-center ms-4 mb-4 flex-column">
                    <div class="d-flex align-items-center justify-content-center w-100">
                        <img src="img/badge.png" style="height: 200px;">
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="teacherDashboard.php" class="nav-item nav-link"><i
                            class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="markAttendance.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Attendance <span
                            class="badge bg-danger ms-3">
                            <?php echo $_SESSION['reminder']; ?>
                        </span> </a>
                    <a href="addMarks.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Add Marks</a>
                    <a href="teacherTimeTable.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Time
                        Table</a>
                    <a href="addAssignment.php" class="nav-item nav-link"><i
                            class="bi bi-journal-bookmark-fill me-2"></i>Assingments</a>
                    <a href="searchStudent.php" class="nav-item nav-link"><i class="bi bi-search me-2"></i>Search
                        Student</a>
                    <a href="resultSheet.php" class="nav-item nav-link active"><i
                            class="bi bi-file-earmark-spreadsheet-fill me-2"></i>Result Sheet</a>
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
                            <span class="d-none d-lg-inline-flex">
                                <?php echo $_SESSION['teacherName']; ?>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="teacherProfile.php" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item" onclick="logOut();">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <!--table start-->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h3 class="mb-0 text-dark">Marks Summary</h3>
                    </div>
                    <div class="row p-3 align-items-center">
                        <div class="col-6">
                            <div class="form-floating">
                                <select class="form-select bg-secondary text-dark" id="year"
                                    aria-label="Floating label select example">
                                    <option selected value="0">Select a Year</option>
                                    <option>2022</option>
                                    <option>2023</option>
                                    <option>2024</option>
                                </select>
                                <label for="floatingSelect">Year List</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating">
                                <select class="form-select bg-secondary text-dark" id="term"
                                    aria-label="Floating label select example">
                                    <option selected value="0">Select a Term</option>
                                    <option value="1">First Term</option>
                                    <option value="2">Second Term</option>
                                    <option value="3">Third Term</option>
                                </select>
                                <label for="floatingSelect">Term List</label>
                            </div>
                        </div>
                    </div>
                    <div class="row p-3 align-items-center">
                        <div class="col-6">
                            <div class="form-floating">
                                <select class="form-select bg-secondary text-dark" id="grade"
                                    aria-label="Floating label select example">
                                    <option selected value="0">Select a Grade</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                    <option>11</option>
                                    <option>12</option>
                                    <option>13</option>
                                </select>
                                <label for="floatingSelect">Grade List</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating">
                                <select class="form-select bg-secondary text-dark" id="class"
                                    aria-label="Floating label select example">
                                    <option selected value="0">Select a Class</option>
                                    <option>A</option>
                                    <option>B</option>
                                    <option>C</option>
                                    <option>D</option>
                                    <option>E</option>
                                    <option>F</option>
                                    <option>G</option>
                                    <option>H</option>
                                </select>
                                <label for="floatingSelect">Class List</label>
                            </div>
                        </div>
                        <div class="d-grid gap-2 pt-2">
                            <button class="btn btn-primary" onclick="searchResult();" type="button">Search</button>
                        </div>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control bg-secondary text-dark" id="searching"
                            placeholder="name@example.com" onkeyup="filterStudents();">
                        <label for="floatingInput">Student Name</label>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0" id="studentTable">
                            <thead id="tableHead">
                                <tr class="text-dark">
                                    <th scope="col">Index No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Sinhala</th>
                                    <th scope="col">Maths</th>
                                    <th scope="col">History</th>
                                    <th scope="col">Science</th>
                                    <th scope="col">Total Marks</th>
                                    <th scope="col">Place</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                <tr style="background: orange; color: black;">
                                    <td colspan="8">Search For Details</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--table end-->

            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4 col-12">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved.
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            Designed By <a href="https://eversoft.cf">Eversoft IT Solutions</a>
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
        function searchResult() {
            var year = document.getElementById("year");
            var term = document.getElementById("term");
            var grade = document.getElementById("grade");
            var Myclass = document.getElementById("class");

            if (year.value == 0 || year.value == 0 || grade.value == 0 || Myclass.value == 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'WARNING',
                    text: "Check All Selectors Before Search",
                });
            }
            else {
                var form = new FormData();
                form.append("year", year.value);
                form.append("term", term.value);
                form.append("class", Myclass.value);
                form.append("grade", grade.value);

                var kidTable = ["index_number", "name", "Buddhism", "Sinhala", "Maths", "English", "Environment", "Tamil", "Total", "Place"];
                var middleTable = ["index_number", "name", "Buddhism", "Sinhala", "Maths", "English", "Science", "Tamil", "History", "Geography", "Health", "Civics", "ART", "PTS", "Total", "Place"];
                var olTable = ["index_number", "name", "Sinhala", "Maths", "English", "Science", "Buddhism", "History", "Bucket_1", "Bucket_2", "Bucket_3", "Total", "Place"];
                var alTable = ["index_number", "name", "Bucket 1", "Bucket 2", "Bucket 3", "English", "GIT", "Total", "Place"];

                var selected = 0;
                if (grade.value <= 5) {
                    selected = kidTable;
                }
                else if (grade.value <= 9) {
                    selected = middleTable;
                }
                else if (grade.value <= 11) {
                    selected = olTable;
                }
                else if (grade.value <= 13) {
                    selected = alTable;
                }
                else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'ERROR',
                        text: "Refresh And Try Again",
                    });
                }
                var req = new XMLHttpRequest();
                var tbody = document.getElementById("tableBody");
                req.onreadystatechange = function () {
                    if (req.readyState == 4 && req.status == 200) {
                        var response = JSON.parse(req.responseText);
                        if (response.status == 'error') {
                            tbody.innerHTML = '';
                            var row = document.createElement("tr");
                            var col = document.createElement("td");
                            row.style.background = "orange";
                            row.style.textAlign = "center";
                            col.colSpan = selected.length;
                            col.innerHTML = "Data Not Exists";
                            row.appendChild(col);
                            tbody.appendChild(row);
                        }
                        else if (response.status == 'success') {
                            tbody.innerHTML = '';

                            var thead = document.getElementById("tableHead");
                            var headingRow = document.createElement("tr");
                            for (let a = 0; a < selected.length; a++) {
                                let headingColumn = document.createElement("th");
                                headingColumn.innerHTML = selected[a];
                                headingRow.appendChild(headingColumn);
                            }
                            thead.innerHTML = '';
                            thead.appendChild(headingRow);

                            for (let i = 0; i < response.data.length; i++) {
                                var row = document.createElement("tr");
                                for (let c = 0; c < selected.length; c++) {
                                    var cols = document.createElement("td");
                                    if (c == selected.length - 1) {
                                        cols.innerHTML = i + 1;
                                    }
                                    else {
                                        let subject = selected[c].toLowerCase();
                                        cols.innerHTML = response.data[i][subject];
                                        if(response.data[i][subject] < 40) {
                                            cols.style.color = 'red';
                                        }
                                        if (subject == "name") { 
                                            cols.style.whiteSpace = "nowrap";
                                        }
                                    }
                                    row.appendChild(cols);
                                }
                                tbody.appendChild(row);
                            }

                        }
                    }
                };

                req.open("POST", "process/resultSearch.php", true);
                req.send(form);
            }
        }

        function filterStudents() {
            let input, filter, table, tr, td, txtValue;

            // initialize variables

            input = document.getElementById("searching");
            filter = input.value.toUpperCase();
            table = document.getElementById("studentTable");
            tr = table.getElementsByTagName("tr");

            for (let i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    }
                    else {
                        tr[i].style.display = "none";
                    }
                }
            }

        }
    </script>
</body>

</html>