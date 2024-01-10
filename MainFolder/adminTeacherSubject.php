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
                    <a href="adminTeacherSubject.php" class="nav-item nav-link active"><i
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
                                        <span class="fw-normal mb-0">You Don't Have Any Messages</span>
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
                    <button class="btn btn-outline-primary ms-5" onclick="logOut();">LogOut</button>
                </div>
            </nav>
            <!-- Navbar End -->

            <!--Button Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="col-md">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control bg-secondary text-dark"
                                    placeholder="Search By NIC" aria-label="Recipient's username"
                                    aria-describedby="button-addon2" id="teacherNIC">
                                <button class="btn btn-primary" type="button" id="button-addon2"
                                    onclick="searchTeacher();">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Button End -->

            <!--Teacher Details start-->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <div class="row">

                        <h5 class="card-header text-dark">Teacher Details</h5>
                        <hr>
                        <div class="mb-3 col-md-6">
                            <label for="Name" class="form-label">Name</label>
                            <input class="form-control bg-secondary text-dark" type="text" id="name" name="Name"
                                value="" autofocus disabled />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="basketsubject" class="form-label">NIC No</label>
                            <input class="form-control bg-secondary text-dark" type="text" id="nic" name="basketsubject"
                                value="" autofocus disabled />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="Grade" class="form-label">Contact No</label>
                            <input class="form-control bg-secondary text-dark" type="text" id="mobile" name="Grade"
                                value="" autofocus disabled />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="basket subject" class="form-label">Email</label>
                            <input class="form-control bg-secondary text-dark" type="text" id="email"
                                name="basket subject" value="" autofocus disabled />
                        </div>
                        <div class="mb-3 col-12">
                            <label for="basket subject" class="form-label">Subjects</label>
                            <input class="form-control bg-secondary text-dark" type="text" id="subjectList"
                                name="basket subject" value="" autofocus disabled />
                        </div>
                    </div>
                </div>
            </div>
            <!--Teacher Details end-->

            <!-- Table start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0 text-dark">Add Subject</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                $subjects = $conn->query("SELECT * FROM `subject`");

                                if ($subjects->num_rows == 0) {
                                    echo '<tr class"text-danger bg-warning" style="background: #FFA500; color: red;">
                                        <td colspan="3" >contact developers to add subjects</td>
                                    </tr>';
                                } else {
                                    for ($i = 1; $i <= $subjects->num_rows; $i++) {
                                        $subject = $subjects->fetch_assoc();
                                        echo '<tr>
                                            <td>' . $i . '</td>
                                            <td>' . $subject["name"] . '</td>
                                            <td><input class="form-check-input" type="checkbox" name="subjects[]" value="' . $subject["id"] . '"></td>
                                        </tr>';
                                    }

                                }

                                ?>

                            </tbody>
                        </table>
                    </div>
                    <button class="btn btn-primary mt-4" onclick="saveSubject();">Submit</button>
                </div>
            </div>


            <!-- Table end -->

            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4 footerGroup">
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
    <script src="js/multiple.js"></script>
    <script>
        function searchTeacher() {
            var nic = document.getElementById('teacherNIC');

            if (nic.value.trim() == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'WARNING',
                    text: 'Please Fill The NIC Number'
                })
                document.getElementById('name').value = "";
                document.getElementById('nic').value = "";
                document.getElementById('mobile').value = "";
                document.getElementById('email').value = "";
            }
            else {
                var form = new FormData();
                form.append("nic", nic.value);

                var req = new XMLHttpRequest();

                req.onreadystatechange = function () {
                    if (req.readyState == 4) {
                        if (req.status == 200) {
                            var response = req.responseText;
                            if (response == "Invalid") {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'WARNING',
                                    text: 'Invalid NIC Number'
                                })
                                document.getElementById('name').value = "";
                                document.getElementById('nic').value = "";
                                document.getElementById('mobile').value = "";
                                document.getElementById('email').value = "";
                            }
                            else {
                                response = JSON.parse(response);
                                document.getElementById('name').value = response.teacher.full_name;
                                document.getElementById('nic').value = response.teacher.nic;
                                document.getElementById('mobile').value = "0" + response.teacher.contact_number;
                                document.getElementById('email').value = response.teacher.email;
                                document.getElementById("subjectList").value = response.subject;
                            }
                        }
                        else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: "Internel Server Error",
                                footer: "<a href='http://wa.me/94701189971'>Contact Developers Here</a>"
                            });
                            document.getElementById('name').value = "";
                            document.getElementById('nic').value = "";
                            document.getElementById('mobile').value = "";
                            document.getElementById('email').value = "";
                        }
                    }
                }

                req.open("POST", "process/searchTeacher.php", true);
                req.send(form);
            }
        }


        function saveSubject() {
            var nic = document.getElementById('teacherNIC');

            if (nic.value.trim() == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'WARNING',
                    text: 'Please Fill The NIC Number'
                })
            }
            else {
                var nic = nic.value;
                var selectedSubjects = [];
                var checkboxes = document.getElementsByName("subjects[]");
                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i].checked) {
                        selectedSubjects.push(checkboxes[i].value);
                    }
                }

                var form = new FormData();
                form.append("nic", nic);
                form.append("selectedSubjects", JSON.stringify(selectedSubjects));
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        console.log(this.responseText);
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Subjects Added Successfully',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                };
                xhttp.open("POST", "process/saveSubject.php", true);
                xhttp.send(form);

            }
        }
    </script>
</body>

</html>