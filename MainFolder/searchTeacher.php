<?php

session_start();
if (!isset($_SESSION["adminNic"])) {
    header("location: admin.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> Admin - Sri Dharmaloka College </title>
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
            <div class="spinner-border" style="width: 3rem; height: 3rem; color: orange;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3 nscroll bg-secondary"
            style="border-right: black 2px solid; border-top-right-radius: 8px; border-bottom-right-radius: 8px;">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="#" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary text-center hide-text">Sri Dharmaloka</h3>
                    <h3 class="text-primary text-center hide-text">Collage</h3>
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
                    <a href="searchTeacher.php" class="nav-item nav-link active"><i class="bi bi-search me-2"></i>Search
                        Teacher</a>
                    <a href="adminTeacherSubject.php" class="nav-item nav-link"><i class="bi bi-search me-2"></i>Teacher
                        Subject</a>
                    <a href="addNonAcademic.php" class="nav-item nav-link"><i
                            class="bi bi-person-plus-fill me-2"></i>Add Non-Academic</a>
                    <a href="adminSearchStaff.php" class="nav-item nav-link"><i class="bi bi-search me-2"></i>Search
                        Non-Academic</a>

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
                    <button class="btn btn-outline-primary ms-5" onclick="logOut();">LogOut</button>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="row g-2">

                        <div class="col-md-6 col-12">
                            <div class="form-floating">
                                <input class="form-control bg-secondary text-dark" id="teacherNic" type="text"
                                    placeholder="Index Number">
                                <label for="floatingSelectGrid">Search by NIC</label>
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="form-floating">
                                <input class="form-control bg-secondary text-dark" id="teacherName" type="text"
                                    placeholder="Index Number" onkeyup="teacherLiveSearch();">
                                <label for="floatingSelectGrid">Search by Name</label>
                                <div class="list-group" style="position: absolute; width: 100%; z-index: 100000;"
                                    id="item-container">
                                    <!-- suggestions append to here -->

                                </div>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-primary" onclick="searchTeacher();">Search</button>
                        </div>

                    </div>


                    <div class="col-12 col-md-4">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="bi bi-pie-chart-fill fa-2x text-dark"></i>
                            <div class="ms-3">
                                <p class="mb-2">Attendance</p>
                                <h6 class="mb-0 text-dark">none</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="bi bi-bag-dash-fill fa-2x text-dark"></i>
                            <div class="ms-3">
                                <p class="mb-2">Current class</p>
                                <h6 class="mb-0 text-dark" id="gradeClass">none</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#resignationModal">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="bi bi-calendar2-date-fill fa-2x text-dark"></i>
                            <div class="ms-3">
                                <p class="mb-2">Date Of Resignation</p>
                                <h6 class="mb-0 text-dark" id="resignation">none</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Sale & Revenue End -->

            <!-- resignation modal start -->

            <div class="modal fade" tabindex="-1" id="resignationModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-dark">Warning</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to remove this teacher from the school? This action cannot be
                                undone and will result in the removal of all associated data and records. Please confirm
                                your decision before proceeding.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn" data-bs-dismiss="modal" onclick="teacherResignation();" style="background-color: #026df7; color: white;">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- resignation modal end -->
            <!-- Profile Start -->
            <div class="container-fluid pt-4 px-4">

                <div class="row">
                    <div class="col-md-12">
                        <h3 class="text-dark">Teacher Details</h3>

                        <div class="card mb-4">

                            <!-- Account -->

                            <hr class="my-0" />
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="FullName" class="form-label">Full Name</label>
                                        <input disabled class="form-control bg-secondary text-dark" type="text"
                                            id="fullName" name="FullName" value="Ex : John Doe" autofocus />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="N.I.C" class="form-label ">NIC</label>
                                        <input disabled class="form-control bg-secondary text-dark " type="text"
                                            name="Namewithinitials" id="nic" value="Ex : 90123415v" data-nic="0"/>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="Address" class="form-label">Address</label>
                                        <input class="form-control bg-secondary text-dark" type="text"
                                            id="address" name="Address" value="Ex : 64/8 A, Jaya Mawatha,Colombo." />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="Gender" class="form-label">Gender</label>
                                        <input disabled type="text" class="form-control  bg-secondary text-dark"
                                            id="gender" name="Gender" value="Ex : Male" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="phoneNumber">Phone Number</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text">LK (+94)</span>
                                            <input type="text" id="mobile" name="phoneNumber"
                                                class="form-control  bg-secondary text-dark" value="Ex: 771112223" />
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="Email" class="form-label">Email</label>
                                        <input type="text" class="form-control  bg-secondary text-dark"
                                            id="email" name="Email" value="Ex : name@abc.com" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="Nationality" class="form-label">Nationality</label>
                                        <input disabled class="form-control bg-secondary text-dark" type="text"
                                            id="nationality" name="" value="Ex : Sinhalese" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="Religion" class="form-label">Religion</label>
                                        <input id="religion" disabled class="form-control bg-secondary text-dark"
                                            name="Religion" value="Ex : Buddhism" />
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label for="Religion" class="form-label">Qualifications</label>
                                        <input id="qualification" class="form-control bg-secondary text-dark"
                                            name="Religion" value="Ex : Bsc Hons In Software Enginnering" />
                                    </div>
                                    <hr>
                                    <button class="btn btn-primary">Update</button>
                                </div>

                                <div class="card mt-2">
                                    <h5 class="card-header text-primary">Subjects</h5>
                                    <div class="card-body">
                                        <div class="mb-3 col-12 mb-0">
                                            <div class="alert alert-warning">
                                                <ul id="subjectList">
                                                    <li style="font-weight: bolder;">
                                                        Sinhala
                                                    </li>
                                                    <li>
                                                        <h6 class="alert-heading fw-bold mb-1">Buddhist</h6>
                                                    </li>
                                                    <li>
                                                        <h6 class="alert-heading fw-bold mb-1">Mathhs</h6>
                                                    </li>
                                                    <li>
                                                        <h6 class="alert-heading fw-bold mb-1">History</h6>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Account -->
                        </div>

                    </div>
                </div>
            </div>
            <!-- Profile End -->


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

        function teacherLiveSearch() {
            document.getElementById("item-container").style.display = '';
            var name = document.getElementById("teacherName").value;

            if (name.trim() == '') {
                document.getElementById("item-container").innerHTML = '';
            }
            else {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // handle response
                        document.getElementById("item-container").innerHTML = '';
                        var response = JSON.parse(xhr.responseText);
                        for (let i = 0; i < response.length; i++) {
                            var item = document.createElement("button");
                            item.innerHTML = response[i].teacher['name'] + " " + "-" + " " + response[i].teacher['nic'];
                            item.classList.add("list-group-item");
                            item.classList.add("list-group-item-action");
                            item.classList.add("text-dark");
                            item.dataset.nic = response[i].teacher['nic'];
                            item.onclick = function () {
                                document.getElementById("teacherName").value = this.innerHTML;
                                document.getElementById("teacherName").dataset.nic = this.dataset.nic;
                                document.getElementById("item-container").style.display = 'none';
                            }
                            document.getElementById("item-container").appendChild(item);
                        }
                    }
                }

                xhr.open("GET", "process/teacherLiveSearch.php?name=" + name + "", true);
                xhr.send();
            }
        }

        function searchTeacher() {
            var name = document.getElementById("teacherName");
            var nic = document.getElementById("teacherNic");

            if (name.value.trim() != '' && nic.value.trim() != '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Sorry',
                    text: "You must fill in one text field at a time"
                });
                document.getElementById("nic").dataset.nic = 0;
            }
            else if (name.value.trim() == '' && nic.value.trim() == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Sorry',
                    text: "Before searching you need to fill one text field"
                });
                document.getElementById("nic").dataset.nic = 0;
            }
            else {
                document.getElementById("spinner").classList.add("show");
                var searchable = '';
                if (name.value.trim() == '') {
                    searchable = nic.value;
                }
                else {
                    searchable = name.dataset.nic;
                }
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var response = xhr.responseText;
                        if (response == "error") {
                            document.getElementById("spinner").classList.remove("show");
                            Swal.fire({
                                icon: 'warning',
                                title: 'ERROR',
                                text: "Invalid Information."
                            });
                            document.getElementById("nic").dataset.nic = 0;
                        }
                        else {
                            response = JSON.parse(response);
                            document.getElementById("nic").dataset.nic = response[0].teacher["nic"];
                            document.getElementById("fullName").value = response[0].teacher["full_name"];
                            document.getElementById("nic").value = response[0].teacher["nic"];
                            document.getElementById("address").value = response[0].teacher["address"];
                            document.getElementById("gender").value = response[0].teacher["gender"];
                            document.getElementById("mobile").value = response[0].teacher["contact_number"];
                            document.getElementById("email").value = response[0].teacher["email"];
                            document.getElementById("nationality").value = response[0].teacher["nationality"];
                            document.getElementById("religion").value = response[0].teacher["religion"];
                            document.getElementById("subjectList").innerHTML = '';
                            document.getElementById("qualification").value = response[0].teacher["qualification"];
                            console.log(response[0].teacher["date_of_resignation"]);
                            document.getElementById("resignation").innerHTML = response[0].teacher["date_of_resignation"] == null ? 'none' : response[0].teacher["date_of_resignation"];
                            if (response[0].teacher["grade"] != null) {
                                document.getElementById("gradeClass").innerHTML = response[0].teacher["grade"] + "-" + response[0].teacher["class"];
                            }
                            else {
                                document.getElementById("gradeClass").innerHTML = 'none';
                            }
                            for (let i = 0; i < response.length; i++) {
                                var li = document.createElement("li");
                                li.style.fontWeight = "bolder";
                                li.innerHTML = response[i].teacher["subject"];
                                document.getElementById("subjectList").appendChild(li);
                            }
                            document.getElementById("spinner").classList.remove("show");
                        }
                    }
                }

                xhr.open("GET", "process/adminSearchTeacher.php?nic=" + searchable + "", true);
                xhr.send();
            }
        }

        function teacherResignation() {
            const nic = document.getElementById("nic");
            if(nic.dataset.nic == 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Sorry',
                    text: "Search a Teacher First"
                });
            }
            else {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if(xhr.readyState == 4 && xhr.status == 200) {
                        // handle response
                        document.getElementById("resignation").innerHTML = xhr.responseText;
                    }
                }

                xhr.open("GET", "process/teacherResignation.php?nic=" + nic.dataset.nic + '', true);
                xhr.send();
            }
        }
    </script>
</body>

</html>