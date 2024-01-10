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
                    <a href="addNonAcademic.php" class="nav-item nav-link"><i class="bi bi-person-plus-fill me-2"></i>Add Non-Academic</a>
                    <a href="adminSearchStaff.php" class="nav-item nav-link active"><i class="bi bi-search me-2"></i>Search Non-Academic</a>
                    
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
                                        <span class="fw-normal mb-0 text-dark">You Don't Have Any Messages</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notificatin</span>
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

            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <h3 class="text-dark">Search Non-Academic Staff</h3>
                    <div class="row">
                        <div class="form-floating mb-3 col-md-6">
                            <input type="text" class="form-control bg-secondary text-dark" id="nic"
                                placeholder="name@example.com">
                            <label for="floatingInput" style="margin-left: 10px;">Search By NIC</label>
                        </div>
                        <div class="form-floating mb-3 col-md-6">
                            <input type="text" class="form-control bg-secondary text-dark" id="name"
                                placeholder="name@example.com" data-nic="" onkeyup="staffLiveSearch();">
                            <label for="floatingInput" style="margin-left: 10px;">Search By Name</label>
                            <div class="list-group" style="position: absolute; width: 95%; z-index: 100000;"
                                id="item-container">
                                <!-- suggestions append to here -->

                            </div>
                        </div>

                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-primary" type="button" onclick="searchStaff();">Search</button>
                    </div>
                </div>
            </div>

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Date Of Registration
                                </p>
                                <h6 class="mb-0 text-dark" id="registration">
                                    none
                                </h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Date Of Resignation
                                </p>
                                <h6 class="mb-0 text-dark" id="resignation">
                                    none
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Full Name</label>
                                <input disabled type="text" class="form-control text-dark bg-secondary" id="displayName"
                                    placeholder="name@example.com" value="Ex : John Doe">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">NIC Number</label>
                                <input disabled type="text" class="form-control text-dark bg-secondary" id="displayNIC"
                                    placeholder="name@example.com" value="Ex : 90123445v">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Contact Number</label>
                                <input disabled type="text" class="form-control text-dark bg-secondary" id="mobile"
                                    placeholder="name@example.com" value="Ex: 0771112223">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Job Role</label>
                                <input disabled type="text" class="form-control text-dark bg-secondary" id="role"
                                    placeholder="name@example.com" value="Ex : Administrative staff">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4 footerGroup" id="footerGroup" style="margin-top: 60vh;">
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js"></script>
    <script src="marksAlert/docs/js/jquery.sweet-modal.min.js"></script>
    <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/multiple.js"></script>
    <script type="text/javascript" src='myscript.js'></script>
</body>
<script>

    function staffLiveSearch() {
        document.getElementById("item-container").style.display = '';
        var name = document.getElementById("name").value;

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
                        item.innerHTML = response[i].staff['name'] + " - " + response[i].staff['nic'];
                        item.classList.add("list-group-item");
                        item.classList.add("list-group-item-action");
                        item.classList.add("text-dark");
                        item.dataset.nic = response[i].staff['nic'];
                        item.onclick = function () {
                            document.getElementById("name").value = this.innerHTML;
                            document.getElementById("name").dataset.nic = this.dataset.nic;
                            document.getElementById("item-container").style.display = 'none';
                        }
                        document.getElementById("item-container").appendChild(item);
                    }
                }
            }

            xhr.open("GET", "process/staffLiveSearch.php?name=" + name + "", true);
            xhr.send();
        }
    }


    function searchStaff() {
        const nic = document.getElementById('nic');
        const name = document.getElementById('name');

        var displayName = document.getElementById("displayName");
        var displayNIC = document.getElementById("displayNIC")
        var mobile = document.getElementById("mobile");
        var role = document.getElementById("role");
        var registration = document.getElementById("registration");
        var resignation = document.getElementById("resignation");


        if (nic.value.trim() == '' && name.value.trim() == '' || nic.value.trim() != '' && name.value.trim() != '') {
            Swal.fire(
                'WARNING',
                'You must fill in one text field',
                'warning'
            );

            displayName.value = 'Ex : John Doe';
            displayNIC.value = 'Ex : 90123445v';
            mobile.value = "Ex: 0771112223";
            role.value = "Ex : Administrative staff";
            registration.innerHTML = 'none';
            resignation.innerHTML = 'none';
        }
        else {
            var nicNumber = '';
            if (name.value.trim() != '') {
                nicNumber = name.dataset.nic;
            }
            else {
                nicNumber = nic.value;
            }
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // handle response
                    var response = JSON.parse(xhr.responseText);
                    if (response.status == 'error') {
                        Swal.fire(
                            'WARNING',
                            'There is no staff member with this Information',
                            'warning'
                        );

                        displayName.value = 'Ex : John Doe';
                        displayNIC.value = 'Ex : 90123445v';
                        mobile.value = "Ex: 0771112223";
                        role.value = "Ex : Administrative staff";
                        registration.innerHTML = 'none';
                        resignation.innerHTML = 'none';
                    }
                    else {
                        displayName.value = response.staff["name"];
                        displayNIC.value = response.staff["nic"];
                        mobile.value = response.staff["mobile"];
                        role.value = response.staff["role"];
                        registration.innerHTML = response.staff["start_date"];
                        resignation.innerHTML = response.staff["end_date"] == null ? 'none' : response.staff["end_date"];
                    }
                }
            }

            xhr.open("GET", "process/searchStaff.php?nic=" + nicNumber + '', true);
            xhr.send();
        }
    }
</script>

</html>