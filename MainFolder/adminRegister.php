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
       <div class="sidebar pe-4 pb-3 nscroll bg-secondary" style="border-right: black 2px solid; border-top-right-radius: 8px; border-bottom-right-radius: 8px;">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="dashboard.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary text-center hide-text">Sri Dharmaloka</h3>
                    <h3 class="text-primary text-center hide-text">College</h3>
                </a>

                <div class="d-flex align-items-center ms-4 mb-4 flex-column">
                    <div class="d-flex align-items-center justify-content-center w-100">
                        <img src="img/badge.png" class="schoolBadge"  style="height: 190px;">
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
                    <a href="addNews.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Add News</a>
                    <a href="adminRegister.php" class="nav-item nav-link active"><i class="fa fa-chart-bar me-2"></i>Manage
                        Register</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
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

            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-4">
                        <div class="col-md">
                            <div class="form-floating">
                                <input class="form-control bg-secondary text-dark" id="year" type="text" placeholder="Year" onkeyup="searchClass();">
                                <label for="floatingSelectGrid">Year</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-4">
                        <div class="form-floating">
                            <select class="form-select bg-secondary text-dark" id="grade"
                                aria-label="Floating label select example" onchange="searchClass();">
                                <option selected value="-">Open this select menu</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                            </select>
                            <label for="floatingSelectGrid">Grade</label>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-4">
                        <div class="form-floating">
                            <select class="form-select bg-secondary text-dark" id="class"
                                aria-label="Floating label select example" onchange="searchClass();">
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
                    <div class="col-sm-12 col-xl-4">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="bi bi-capslock-fill fa-2x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Grade</p>
                                <h6 class="mb-0 text-dark" id="searchedGrade">8</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-4">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="bi bi-bar-chart-steps fa-2x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Class</p>
                                <h6 class="mb-0 text-dark" id="searchedClass">H</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-4">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="bi bi-file-person fa-2x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Students</p>
                                <h6 class="mb-0 text-dark" id="studentCount">50</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->

            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top rounded-bottom p-4">
                    <div class="mb-3 col-md-12">
                        <label class="text-primary">Please note that:-</label><p>This allows you to create a new class and a new Register for student in a new school term</p>
                        <label for="RegistrationNo" class="form-label">Student Search</label>
                        <input class="form-control bg-secondary text-dark" type="text" id="RegistrationNo" name="RegistrationNo" placeholder="Registration No"/>
                    </div>
                    <div class="d-grid col-12">
                        <button class="btn btn-primary" onclick="searchStudentForRegister();" type="button">Search<i class="bi bi-search p-2 "></i></button>
                    </div>
                </div>
            </div>

            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        <div class="col-12">
                        <h5 class="card-header text-dark">Student Details</h5>
                        <hr>
                        <div class="row">
                            <div class="col-12 col-md-6" id="studentContainer">
                                <div class="mb-3">
                            <label for="Name" id="studentName" class="form-label">Name</label>
                            <input class="form-control bg-secondary text-dark" type="text" id="Name" name="Name" value="ex: Tharindu Nimesh" autofocus
                                disabled />
                        </div>
                        <div class="mb-3">
                            <label for="basketsubject" id="studentClass" class="form-label">Grade</label>
                            <input class="form-control bg-secondary text-dark" type="text" id="Grade" name="basketsubject"
                                value="ex: 10" autofocus disabled />
                        </div>
                        <div class="mb-3">
                            <label for="Grade" id="studentGrade" class="form-label">Class</label>
                            <input class="form-control bg-secondary text-dark" type="text" id="Class" name="Class" value="ex: F" autofocus
                                disabled />
                        </div>
                            </div>
                            <div class="col-12 col-md-6" id="subjectContainer">
                                <div class="mb-3">
                            <label for="basket subject" id="canBeChanged" class="form-label">Busket Subject I</label>
                            <input class="form-control bg-secondary text-dark" type="text" id="busketsubject1" name="basket subject"
                                value="ex: Commerce" autofocus disabled />
                        </div>
                        <div class="mb-3">
                            <label for="Class" id="subject2Header" class="form-label">Busket Subject II</label>
                            <input class="form-control bg-secondary text-dark" type="text" id="busketsubject2" name="Class" value="ex: Art" autofocus
                                disabled />
                        </div>
                        <div class="mb-3">
                            <label for="basket subject" id="subject3Header" class="form-label">Busket Subject III</label>
                            <input class="form-control bg-secondary text-dark" type="text" id="busketsubject3" name="basket subject"
                                value="ex: ICT" autofocus disabled />
                        </div>
                        </div>
                        <div class="text-primary d-none mb-2" id="warning" style="color: red;">NOTE: No More Information Available For This Student.</div>
                        <div class="d-grid col-12">
                            <button class="btn btn-primary" id="addButton" data-indexNo="0" onclick="addNewStudentToRegister();" type="button"><i class="bi bi-plus-circle p-2"></i>Add</button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            

            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0 text-dark">Register</h6>
                    </div>
                    <div class="input-group mb-3 mt-3">
              <input type="text" class="form-control bg-secondary text-dark" placeholder="Enter Teacher NIC" aria-label="Recipient's username" id="teacherNIC" aria-describedby="button-addon2">
              <button class="btn btn-primary" onclick="addTeacherToClass();" type="button" id="button-addon2">ADD</button>
            </div>
                    <div class="row">
                        <div class="col-12 card-header text-dark d-flex justify-content-start mb-3">
                            Class Teacher :&nbsp;&nbsp; <span id="teacherName"> None</span> 
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Roll No</th>
                                    <th scope="col">Registration No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                              <!--  <tr>
                                    <td>01</td>
                                    <td></td>
                                    <td></td>
                                    <td><button type="button" class="btn btn-primary">Remove</button></td>

                                </tr> -->
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->

            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved.
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="https://eversoft.cf">EverSoft IT Solutions</a>
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
        var tableRowCount = -1;
        function searchClass() {
            var year = document.getElementById("year");
            var grade = document.getElementById("grade");
            var studentClass = document.getElementById("class");

            var searchedGrade = document.getElementById("searchedGrade");
            var searchedClass = document.getElementById("searchedClass");
            var studentCount = document.getElementById("studentCount");
            var teacherName = document.getElementById("teacherName");
            var tablebody = document.getElementById('tableBody');

            var yearRegex = /^\d{4}$/;

            if (year.value.trim() == '' || grade.value == "0" || studentClass.value == "0") {
                searchedGrade.innerHTML = "none";
                searchedClass.innerHTML = "none";
                studentCount.innerHTML = "none";
                teacherName.innerHTML = "none";
                let allTRs = document.querySelectorAll("td")
                allTRs.forEach(el => el.style.display = "none")
            }

            else {
                if(yearRegex.test(year.value)) {
                    var req = new XMLHttpRequest();
                    var form = new FormData();

                    form.append("year", year.value);
                    form.append("grade", grade.value);
                    form.append("class", studentClass.value);

                        req.onreadystatechange = function() {
                            if(req.readyState == 4) {
                                if(req.status == 200) {
                                    var response = JSON.parse(req.responseText);
                                    if(response.classStatus == "newClass") {
                                        tablebody.innerHTML = "";
                                        searchedGrade.innerHTML = grade.value;
                                        searchedClass.innerHTML = studentClass.value;
                                        studentCount.innerHTML = "0";
                                        teacherName.innerHTML = "none";
                                        tableRowCount = 0;
                                    }
                                    else {
                                        searchedGrade.innerHTML = grade.value;
                                        searchedClass.innerHTML = studentClass.value;
                                        studentCount.innerHTML = response[0].classStudentCount;
                                        teacherName.innerHTML = response[0].classTeacher;
                                        tablebody.innerHTML = "";
                                        for (let i = 0; i < response.length; i++) {
                                            tablebody.innerHTML += response[i].students;
                                            tableRowCount = response.length;
                                        }
                                    }
                                }
                            }
                        }
                    req.open("POST", "process/registerSearch.php", true);
                    req.send(form);
                }
            }
        }

        function searchStudentForRegister() {
            var indexNumber = document.getElementById("RegistrationNo");
            const indexRegexp = /^[0-9]{5,6}$/;

            var addButton = document.getElementById("addButton");

            if(indexRegexp.test(indexNumber.value)) {
                var req = new XMLHttpRequest();
                req.onreadystatechange = function() {
                    if(req.readyState == 4) {
                        if(req.status == 200) {
                            // output will handle here
                            var response = req.responseText;
                            if(response == "noData" | response == "newStudent") {
                                if(response == "noData") {
                                    Swal.fire({
                                      icon: 'warning',
                                      title: 'WARNING',
                                      text: 'Invalid Student Or Data Missing On Database'
                                    })
                                    addButton.removeAttribute("data-index");
                                    document.getElementById("Name").value = "ex: Tharindu Nimesh";
                                    document.getElementById("Grade").value = "ex : 10";
                                    document.getElementById("Class").value = "ex: F";
                                } 
                                else {
                                    document.getElementById("studentContainer").classList.remove("col-md-6");
                                    document.getElementById("Grade").style.display = 'none';
                                    document.getElementById("Class").style.display = 'none';
                                    document.getElementById("subjectContainer").style.display = 'none';
                                    document.getElementById("studentClass").style.display = 'none';
                                    document.getElementById("studentGrade").style.display = 'none';
                                    document.getElementById("warning").classList.remove("d-none");
                                    document.getElementById("addButton").setAttribute("data-index", indexNumber.value);
                                }
                            }
                            else {
                                document.getElementById("Grade").style.display = '';
                                document.getElementById("Class").style.display = '';
                                document.getElementById("studentContainer").classList.add("col-md-6");
                                var response = JSON.parse(req.response);
                                document.getElementById("Name").value = response.studentName;
                                document.getElementById("Grade").value = response.studentGrade;
                                document.getElementById("Class").value = response.studentClass;
                                document.getElementById("subjectContainer").style.display = '';
                                document.getElementById("studentClass").style.display = '';
                                document.getElementById("studentGrade").style.display = '';
                                document.getElementById("warning").classList.add("d-none");
                                document.getElementById("addButton").removeAttribute("data-index");
                                if(response.status == "newStudent") {
                                    document.getElementById("subjectContainer").style.display = 'none';
                                    document.getElementById("studentContainer").classList.remove("col-md-6");
                                     document.getElementById("addButton").setAttribute("data-index", indexNumber.value);
                                }
                                else if(response.studentStatus == 'kid') {
                                    document.getElementById("subjectContainer").style.display = 'none';
                                    document.getElementById("studentContainer").classList.remove("col-md-6");
                                    document.getElementById("addButton").setAttribute("data-index", indexNumber.value);
                                }
                                else {
                                    document.getElementById("subjectContainer").style.display = '';
                                    if(response.studentStatus == "middle") {
                                        document.getElementById("busketsubject2").style.display = 'none';
                                        document.getElementById("busketsubject3").style.display = 'none';
                                        document.getElementById("canBeChanged").innerHTML = 'Aesthetic Subjects';
                                        document.getElementById("busketsubject1").value = response.bucket;
                                        document.getElementById("subject2Header").style.display = 'none';
                                        document.getElementById("subject3Header").style.display = 'none';
                                        document.getElementById("addButton").setAttribute("data-index", indexNumber.value);
                                    }
                                    else {
                                        document.getElementById("busketsubject2").style.display = '';
                                        document.getElementById("busketsubject3").style.display = '';
                                        document.getElementById("subject2Header").style.display = '';
                                        document.getElementById("subject3Header").style.display = '';
                                        document.getElementById("canBeChanged").innerHTML = 'Bucket Subject I';
                                        if(response.studentStatus == "ol") {
                                        document.getElementById("busketsubject1").value = response.bucket1;
                                        document.getElementById("busketsubject2").value = response.bucket2;
                                        document.getElementById("busketsubject3").value = response.bucket3;
                                        document.getElementById("addButton").setAttribute("data-index", indexNumber.value);
                                        }

                                        else{
                                        document.getElementById("busketsubject1").value = response.bucket1;
                                        document.getElementById("busketsubject2").value = response.bucket2;
                                        document.getElementById("busketsubject3").value = response.bucket3;
                                        document.getElementById("addButton").setAttribute("data-index", indexNumber.value);
                                        }
                                        }
                                    }
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

                req.open("GET", "process/searchStudentForRegister.php?i=" + indexNumber.value +"", true);
                req.send();
            }
            else {
                Swal.fire({
                  icon: 'warning',
                  title: 'WARNING',
                  text: 'You Must Enter A Valid Registration Number'
                })
                
                if(addButton.hasAttribute("data-index")) {
                    addButton.removeAttribute("data-index");
                }
            }
        }

        function addNewStudentToRegister() {
            const button = document.getElementById("addButton");
            if(button.hasAttribute("data-index")) {
                var year = document.getElementById("year");
                var grade = document.getElementById("grade");
                var studentClass = document.getElementById("class");  

                var yearRegex = /^\d{4}$/;
                if (yearRegex.test(year.value) & grade.value != "0" & studentClass.value != "0") {
                    var req = new XMLHttpRequest();

                    var form = new FormData();

                    form.append("year", year.value);
                    form.append("grade", grade.value);
                    form.append("class", studentClass.value);
                    form.append("indexNumber", button.dataset.index);

                    req.onreadystatechange = function() {
                        if(req.readyState == 4) {
                            if(req.status == 200) {
                                // output handle here
                                var response = req.responseText;
                                if (response == "DataExist") {
                                    Swal.fire({
                                        icon: 'warning',
                                        title: 'WARNING',
                                        text: 'Data For This Student Already Available In The Database. Remove It And Try Again'
                                    })
                                }
                                else {
                                    var response = JSON.parse(req.responseText);
                                    document.getElementById("tableBody").innerHTML += response;
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

                    req.open("POST", "process/addNewStudentToRegister.php", true);
                    req.send(form);
                }
                else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'WARNING',
                        text: 'Select Year, Grade And Class Before Add A Student'
                    })
                }
            }
            else {
                Swal.fire({
                    icon: 'warning',
                    title: 'WARNING',
                    text: 'You Must Search A Student First'
                })
            }
        }

        function removeStudent(event) {
            var removeButton = event.target;
            var indexNumber =  removeButton.dataset.indexnumber;
            var year = document.getElementById("year").value;

            var form = new FormData();
            form.append("index", indexNumber);
            form.append("year", year);

            var req = new XMLHttpRequest();

            req.onreadystatechange = function() {
                if(req.readyState == 4) {
                    if(req.status == 200) {
                        var tableRow = document.getElementById("row" + indexNumber);
                        tableRow.remove();
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

            req.open("POST", "process/removeStudentFrom.php", true);
            req.send(form);
        }

        function addTeacherToClass() {
            var year = document.getElementById("year");
            var grade = document.getElementById("grade");
            var studentClass = document.getElementById("class");  
            var nic = document.getElementById("teacherNIC");

            var yearRegex = /^\d{4}$/;
            if (yearRegex.test(year.value) & grade.value != "0" & studentClass.value != "0" & nic.value.trim() != '') {
                var req = new XMLHttpRequest();

                var form = new FormData();

                form.append("year", year.value);
                form.append("grade", grade.value);
                form.append("class", studentClass.value);
                form.append("nic", nic.value);

                req.onreadystatechange = function() {
                    if(req.readyState == 4) {
                        if(req.status == 200) {
                            // output handle here
                            var response = req.responseText;
                            if(response == "notATeacher") {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'WARNING',
                                    text: 'Invalid Teacher NIC'
                                })
                            }
                            else if(response == "teacherInAOtherClass"){
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'WARNING',
                                    text: 'This Teacher Have A Class'
                                })
                            }
                            else{
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Teacher Added Successfully',
                                    showConfirmButton: false,
                                    timer: 1500
                              })
                                document.getElementById("teacherName").innerHTML = response;

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

                    req.open("POST", "process/addTeacherToClass.php", true);
                    req.send(form);
                }
                else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'WARNING',
                        text: 'Select Year, Grade And Class Before Add A Teacher'
                    })
                }
        }
    </script>
</body>

</html>