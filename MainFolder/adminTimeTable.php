<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DarkPan - Bootstrap 5 Admin Template</title>
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
                    
                    <a href="adminTimeTable.php" class="nav-item nav-link active"><i class="bi bi-table me-2"></i>Time
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
                            <span class="d-none d-lg-inline-flex">Messages</span> <!-- copy -->
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <div class="ms-2">
                                        <span class="fw-normal mb-0 text-dark">You Have No Any Messages</span>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notifications</span> <!-- copy -->
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <span class="fw-normal mb-0 text-dark">You have no Any Notifications</span>
                            </a>
                            <hr class="dropdown-divider">
                        </div>

                    </div>
                    <button class="btn btn-outline-primary ms-5" onclick="logOut();">LogOut</button>
                </div>
            </nav>
            <!-- Navbar End -->
            <form id="table-form" method="post" action="" enctype="multipart/form-data">
                <!--search start-->
                <div class="container-fluid pt-4 px-4">
                    <div class="row g-3">
                        <div class="col-md">
                            <div class="form-floating">
                                <select class="form-select bg-secondary text-dark" name="year"
                                    aria-label="Floating label select example">
                                    <option selected value="0">Open this select menu</option>
                                    <option>2023</option>
                                    <option>2024</option>
                                    <option>2025</option>
                                </select>
                                <label for="floatingSelectGrid">Year</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <select class="form-select bg-secondary text-dark" name="class"
                                    aria-label="Floating label select example">
                                    <option selected value="0">Open this select menu</option>
                                    <option>A</option>
                                    <option>B</option>
                                    <option>C</option>
                                    <option>D</option>
                                    <option>E</option>
                                    <option>F</option>
                                    <option>G</option>
                                    <option>H</option>
                                </select>
                                <label for="floatingSelectGrid">Class</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <select class="form-select bg-secondary text-dark" name="grade"
                                    aria-label="Floating label select example">
                                    <option selected value="0">Open this select menu</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                    <option>11</option>
                                </select>
                                <label for="floatingSelectGrid">Grade</label>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid mt-4">
                        <button class="btn btn-primary" type="button" onclick="searchTimeTable();">Search</button>
                    </div>
                </div>

                <!--search end-->
                <div class="container-fluid pt-4 px-4">
                    <div class="bg-secondary text-center rounded p-4">
                        <h5 style="color: red"> &#9888; Warning: The time table data adding feature is currently under
                            development and may not function correctly. Please ensure that you are using correct
                            information and filling all inputs until this feature has been fully developed by our team.
                        </h5>
                    </div>
                </div>

                <!--Time table start-->
                <div class="container-fluid pt-4 px-4">
                    <div class="bg-secondary text-center rounded p-4">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h6 class="mb-0 text-dark">TABLE</h6>
                        </div>
                        <div class="table-responsive">
                            <table class="table text-start align-middle table-bordered table-hover mb-0">
                                <thead>
                                    <tr class="text-dark">
                                        <th colspan="2">MONDAY</th>
                                        <th colspan="2">TUESDAY</th>
                                        <th colspan="2">WEDNESDAY</th>
                                        <th colspan="2">THURSDAY</th>
                                        <th colspan="2">FRIDAY</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-dark">
                                        <td>Subject</td>
                                        <td>Teacher_NIC</td>
                                        <td>Subject</td>
                                        <td>Teacher_NIC</td>
                                        <td>Subject</td>
                                        <td>Teacher_NIC</td>
                                        <td>Subject</td>
                                        <td>Teacher_NIC</td>
                                        <td>Subject</td>
                                        <td>Teacher_NIC</td>
                                    </tr>
                                    <tr>
                                        <td><input class="text-center" name="subject_1" type="text"></td>
                                        <td><input class="text-center" name="teacher_1" type="text"></td>
                                        <td><input class="text-center" name="subject_9" type="text"></td>
                                        <td><input class="text-center" name="teacher_9" type="text"></td>
                                        <td><input class="text-center" name="subject_17" type="text"></td>
                                        <td><input class="text-center" name="teacher_17" type="text"></td>
                                        <td><input class="text-center" name="subject_25" type="text"></td>
                                        <td><input class="text-center" name="teacher_25" type="text"></td>
                                        <td><input class="text-center" name="subject_33" type="text"></td>
                                        <td><input class="text-center" name="teacher_33" type="text"></td>
                                    </tr>
                                    <tr>
                                        <td><input class="text-center" name="subject_2" type="text"></td>
                                        <td><input class="text-center" name="teacher_2" type="text"></td>
                                        <td><input class="text-center" name="subject_10" type="text"></td>
                                        <td><input class="text-center" name="teacher_10" type="text"></td>
                                        <td><input class="text-center" name="subject_18" type="text"></td>
                                        <td><input class="text-center" name="teacher_18" type="text"></td>
                                        <td><input class="text-center" name="subject_26" type="text"></td>
                                        <td><input class="text-center" name="teacher_26" type="text"></td>
                                        <td><input class="text-center" name="subject_34" type="text"></td>
                                        <td><input class="text-center" name="teacher_34" type="text"></td>
                                    </tr>
                                    <tr>
                                        <td><input class="text-center" name="subject_3" type="text"></td>
                                        <td><input class="text-center" name="teacher_3" type="text"></td>
                                        <td><input class="text-center" name="subject_11" type="text"></td>
                                        <td><input class="text-center" name="teacher_11" type="text"></td>
                                        <td><input class="text-center" name="subject_19" type="text"></td>
                                        <td><input class="text-center" name="teacher_19" type="text"></td>
                                        <td><input class="text-center" name="subject_27" type="text"></td>
                                        <td><input class="text-center" name="teacher_27" type="text"></td>
                                        <td><input class="text-center" name="subject_35" type="text"></td>
                                        <td><input class="text-center" name="teacher_35" type="text"></td>
                                    </tr>
                                    <tr>
                                        <td><input class="text-center" name="subject_4" type="text"></td>
                                        <td><input class="text-center" name="teacher_4" type="text"></td>
                                        <td><input class="text-center" name="subject_12" type="text"></td>
                                        <td><input class="text-center" name="teacher_12" type="text"></td>
                                        <td><input class="text-center" name="subject_20" type="text"></td>
                                        <td><input class="text-center" name="teacher_20" type="text"></td>
                                        <td><input class="text-center" name="subject_28" type="text"></td>
                                        <td><input class="text-center" name="teacher_28" type="text"></td>
                                        <td><input class="text-center" name="subject_36" type="text"></td>
                                        <td><input class="text-center" name="teacher_36" type="text"></td>
                                    </tr>
                                    <tr>
                                        <td><input class="text-center" name="subject_5" type="text"></td>
                                        <td><input class="text-center" name="teacher_5" type="text"></td>
                                        <td><input class="text-center" name="subject_13" type="text"></td>
                                        <td><input class="text-center" name="teacher_13" type="text"></td>
                                        <td><input class="text-center" name="subject_21" type="text"></td>
                                        <td><input class="text-center" name="teacher_21" type="text"></td>
                                        <td><input class="text-center" name="subject_29" type="text"></td>
                                        <td><input class="text-center" name="teacher_29" type="text"></td>
                                        <td><input class="text-center" name="subject_37" type="text"></td>
                                        <td><input class="text-center" name="teacher_37" type="text"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="12">INTERVAL</td>
                                    </tr>
                                    <tr>
                                        <td><input class="text-center" name="subject_6" type="text"></td>
                                        <td><input class="text-center" name="teacher_6" type="text"></td>
                                        <td><input class="text-center" name="subject_14" type="text"></td>
                                        <td><input class="text-center" name="teacher_14" type="text"></td>
                                        <td><input class="text-center" name="subject_22" type="text"></td>
                                        <td><input class="text-center" name="teacher_22" type="text"></td>
                                        <td><input class="text-center" name="subject_30" type="text"></td>
                                        <td><input class="text-center" name="teacher_30" type="text"></td>
                                        <td><input class="text-center" name="subject_38" type="text"></td>
                                        <td><input class="text-center" name="teacher_38" type="text"></td>
                                    </tr>
                                    <tr>
                                        <td><input class="text-center" name="subject_7" type="text"></td>
                                        <td><input class="text-center" name="teacher_7" type="text"></td>
                                        <td><input class="text-center" name="subject_15" type="text"></td>
                                        <td><input class="text-center" name="teacher_15" type="text"></td>
                                        <td><input class="text-center" name="subject_23" type="text"></td>
                                        <td><input class="text-center" name="teacher_23" type="text"></td>
                                        <td><input class="text-center" name="subject_31" type="text"></td>
                                        <td><input class="text-center" name="teacher_31" type="text"></td>
                                        <td><input class="text-center" name="subject_39" type="text"></td>
                                        <td><input class="text-center" name="teacher_39" type="text"></td>
                                    </tr>
                                    <tr>
                                        <td><input class="text-center" name="subject_8" type="text"></td>
                                        <td><input class="text-center" name="teacher_8" type="text"></td>
                                        <td><input class="text-center" name="subject_16" type="text"></td>
                                        <td><input class="text-center" name="teacher_16" type="text"></td>
                                        <td><input class="text-center" name="subject_24" type="text"></td>
                                        <td><input class="text-center" name="teacher_24" type="text"></td>
                                        <td><input class="text-center" name="subject_32" type="text"></td>
                                        <td><input class="text-center" name="teacher_32" type="text"></td>
                                        <td><input class="text-center" name="subject_40" type="text"></td>
                                        <td><input class="text-center" name="teacher_40" type="text"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Warning</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Warning: Before proceeding with adding a new time table, please ensure that
                                            all class schedules and teachers have been confirmed and finalized. Any
                                            changes made to the time table after it has been published may result in
                                            conflicts and disrupt the entire schedule. Proceed with caution.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn" data-bs-dismiss="modal"
                                                onclick="addTimeTable();"
                                                style="background: #006ee5; color: white;">Continue</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2 mt-4">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" type="button">Submit</button>
                        </div>
                    </div>
                </div>
                <!--Time table start-->
            </form>

            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4 col-12">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved.
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
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

        function searchTimeTable() {
            var selectedYear = document.getElementById("year");
            var selectedGrade = document.getElementById("grade");
            var selectedClass = document.getElementById("class");

            if (selectedYear.value != "0" & selectedGrade.value != "0" & selectedClass.value != "0") {
                var form = new FormData();

                form.append("year", selectedYear.value);
                form.append("grade", selectedGrade.value);
                form.append("class", selectedClass.value);

                var req = new XMLHttpRequest();

                req.onreadystatechange = function () {
                    if (req.readyState == 4) {
                        if (req.status == 200) {
                            var response = req.responseText;
                            if (response == "noData") {
                                alert("new Time table");
                            }
                            else {
                                alert("show time table");
                                // show time table
                            }
                        }
                        else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: "Internel Server Error",
                                footer: "<a href='http://wa.me/94701189971'>Contact Developers Here</a>"
                            });
                        }
                    }
                }

                req.open("POST", "process/searchTimeTable.php", true);
                req.send(form);
            }
            else {
                alert("error");
            }
        }

        function addTimeTable() {
            var form = document.getElementById("table-form");

            var inputs = form.querySelectorAll("input");

            var isFull = true;

            inputs.forEach(function (input) {
                if (input.value.trim() == '') {
                    isFull = false;
                }
            });

            if (isFull) {
                var formData = new FormData(form);

                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'process/addTimeTable.php', true);
                xhr.onload = function () {
                    if (this.status === 200) {
                        var response = this.responseText;
                        alert(response);
                    }
                    else {
                        Swal.fire({
                            icon: 'warning',
                            title: 'warning',
                            text: "Internel Server new Error"
                        });
                    }
                };
                xhr.send(formData);
            }
            else {
                Swal.fire({
                    icon: 'warning',
                    title: 'warning',
                    text: "Please Fill All TextFields"
                });
            }
        }

    </script>
</body>

</html>