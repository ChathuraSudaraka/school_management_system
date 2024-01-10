<?php

session_start();
if(!isset($_SESSION["adminNic"])) {
    header("location: admin.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> Admin - School Management System</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
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
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem; color: orange;" role="status">
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
                    <a href="adminSubject.php" class="nav-item nav-link active"><i class="bi bi-journal-plus me-2"></i>Student
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


            <!-- Widget Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    
                    <div class="col-12">
                        <div class="h-100 bg-secondary rounded p-4">
                            <form>
                                <div class="form-row">
                                    <h3 class="text-dark">Selecting bucket subject in grade 6</h3>
                                  <div class="form-group col-md-6">
                                    <label for="inputEmail4">Enter Index Number</label>
                                    <input type="number" class="form-control bg-secondary text-dark" id="BucketStudentIndexNo" placeholder="Index No">
                                  </div>
                                  
                                </div>
                                
                                
                                <div class="form-row">
                                  
                                  <div class="form-group col-md-4">
                                    <label for="inputState">Select Bucket Subject</label>
                                    <select id="gradeSixBucketSubject" class="form-control bg-secondary text-dark">
                                      <option selected value="0">Choose...</option>
                                      <option value="1">Art</option>
                                      <option value="2">Music</option>
                                      <option value="3">Drama</option>
                                      <option value="4">Dancing</option>
                                    </select>
                                  </div>
                                
                                </div>
                                
                                <button type="button" class="btn btn-primary mt-3" id="grade-6-bucket-sub-btn" onclick="gradeSixBucket();">Submit</button>
                              </form>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="h-100 bg-secondary rounded p-4">
                            <form>
                                <div class="form-row">
                                    <h3 class="text-dark">Selecting bucket subject in grade 10[O/L]</h3>
                                  <div class="form-group col-md-6">
                                    <label for="AddBucketSubjectTen">Enter Index Number</label>
                                    <input type="number" class="form-control bg-secondary text-dark" id="AddBucketSubjectTen" placeholder="Index No">
                                  </div>
                                  
                                </div>
                                
                                
                                <div class="form-row">
                                  
                                  <div class="form-group col-md-4">
                                    <label for="gradeTenBucketSubject1">Select Bucket Subject 1</label>
                                    <select  class="form-control bg-secondary text-dark" id="gradeTenBucketSubject1">
                                      <option selected  value="0">Choose...</option>
                                      <option value="1">Commerce</option>
                                      <option value="2">Geogroaphy</option>
                                      <option value="3">Civic</option>
                                      <option value="4">Japanese</option>
                                      <option value="5">Hindi</option>
                                      <option value="6">Tamil</option>
                                    </select>
                                  </div>
                                  <div class="form-group col-md-4">
                                    <label for="gradeTenBucketSubject2">Select Bucket Subject 2</label>
                                    <select id="gradeTenBucketSubject2" class="form-control bg-secondary text-dark">
                                      <option selected value="0">Choose...</option>
                                      <option value="2">Art</option>
                                      <option value="2">Music</option>
                                      <option value="3">Drama</option>
                                      <option value="4">Dancing</option>
                                      <option value="5">Sinhala lit</option>
                                      <option value="6">English lit</option>
                                    </select>
                                  </div>
                                  <div class="form-group col-md-4">
                                    <label for="gradeTenBucketSubject3">Select Bucket Subject 3</label>
                                    <select id="gradeTenBucketSubject3" class="form-control bg-secondary text-dark">
                                      <option selected value="0">Choose...</option>
                                      <option value="3">ICT</option>
                                      <option value="2">Technology</option>
                                      <option value="3">Health</option>
                                      <option value="4">Home science</option>
                                      <option value="5">mokak hri magulak</option>
                                      <option value="6">English lit</option>
                                    </select>
                                  </div>
                                </div>
                                
                                <button type="button" class="btn btn-primary mt-3" id="GradeTenBucketSubjectBtn" onclick="gradeTenBucketSubject();">Submit</button>
                              </form>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="h-100 bg-secondary rounded p-4">
                            <form>
                                <div class="form-row">
                                    <h3 class="text-dark">Selecting bucket subject in grade 12</h3>
                                  <div class="form-group col-md-6">
                                    <label for="inputEmail4">Enter Index Number</label>
                                    <input type="number" class="form-control bg-secondary text-dark" id="alIndexNumber" placeholder="Index No">
                                  </div>
                                  
                                </div>
                                
                                
                                <div class="form-row">
                                  
                                  <div class="form-group col-md-4">
                                    <label for="inputState">Select Subject 1</label>
                                    <select id="alFirstBucket" class="form-control bg-secondary text-dark">
                                      <option selected value="0">Choose...</option>
                                      <option>Commerce</option>
                                      <option>Geogroaphy</option>
                                      <option>Civic</option>
                                      <option>Japanese</option>
                                      <option>Hindi</option>
                                      <option>Tamil</option>
                                    </select>
                                  </div>
                                  <div class="form-group col-md-4">
                                    <label for="inputState">Select  Subject 2</label>
                                    <select id="alSecondBucket" class="form-control bg-secondary text-dark">
                                      <option selected value="0">Choose...</option>
                                      <option>Art</option>

                                      <option>Technology</option>
                                      <option>Bio</option>
                                      <option>Maths</option>
                                      <option>Vocational training</option>
                                    </select>
                                  </div>
                                  <div class="form-group col-md-4">
                                    <label for="inputState">Select  Subject 3</label>
                                    <select id="alThirdBucket" class="form-control bg-secondary text-dark">
                                      <option selected value="0">Choose...</option>
                                      <option>ICT</option>
                                      <option>Technology</option>
                                      <option>Health</option>
                                      <option>Home science</option>
                                      <option>mokak hri magulak</option>
                                      <option>English lit</option>
                                    </select>
                                  </div>
                                </div>
                                
                                <button type="button" onclick="addAlSubject();" class="btn btn-primary mt-3">Submit</button>
                              </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Widget End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="https://eversoft.cf/">Eversoft IT Solutions</a>
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


    <!--Back-end Up to Grade 6 Students bucket subject-->
    <script>
        function gradeSixBucket(){
            var bucketSubjectChoose = document.getElementById('gradeSixBucketSubject');
            var bucketSubjectIndexNo = document.getElementById('BucketStudentIndexNo');
            
            if(bucketSubjectIndexNo.value.trim() == '' | bucketSubjectChoose.value == "0") {
                alert("not filled");
            }else{
                var req = new XMLHttpRequest();

                var form = new FormData();

                form.append("index", bucketSubjectIndexNo.value);
                form.append("subject", bucketSubjectChoose.value);

                req.onreadystatechange = function() {
                    if(req.readyState == 4) {
                        if(req.status == 200) {
                            //output
                            var response = req.responseText.trim();
                            if(response == "noData") {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'WARNING',
                                    text: 'Invalid Index Number'
                                    })
                            }
                            else if(response == "error"){
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'WARNING',
                                    text: "It's Look Like This Student Can't Do This Subject"
                                    })
                            }
                            else if(response == "success"){
                                Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Subject Added Successfully',
                                showConfirmButton: false,
                                timer: 1500
                                })
                            }   
                        }
                        else {
                            Swal.fire({
                                    icon: 'error',
                                    title: 'ERROR',
                                    text: 'Internel Server Error'
                                    })
                        }
                    }
                }

                req.open("POST", "process/addBucketSubject.php", true);
                req.send(form);
            }

        }
    </script>
    <!--Back-end Up to Grade 10 Students bucket subject 1-->

    <script>

        function gradeTenBucketSubject() {
            var bucketSubjectIndexNoOL = document.getElementById('AddBucketSubjectTen');
            var bucketSubjectChoose1OL = document.getElementById('gradeTenBucketSubject1');
            var bucketSubjectChoose2OL = document.getElementById('gradeTenBucketSubject2');
            var bucketSubjectChoose3OL = document.getElementById('gradeTenBucketSubject3');



            if(bucketSubjectIndexNoOL.value.trim() =='' | bucketSubjectChoose1OL.value =='0' |
            bucketSubjectChoose2OL.value == '0' | bucketSubjectChoose3OL.value =='0' ) {
                Swal.fire({
                                    icon: 'warning',
                                    title: 'WARNING',
                                    text: 'Index No & Bucket subjects Not Filled'
                                    })
            }else{
                var req = new XMLHttpRequest();

                var form = new FormData();

                form.append("indexNO", bucketSubjectIndexNoOL.value);
                form.append("subject1", bucketSubjectChoose1OL.value);
                form.append("subject2", bucketSubjectChoose2OL.value);
                form.append("subject3", bucketSubjectChoose3OL.value);
            }

            req.onreadystatechange = function() {
                    if(req.readyState == 4) {
                        if(req.status == 200) {
                            //output
                            var response = req.responseText;
                            if(response == "noData") {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'WARNING',
                                    text: 'Invalid Index Number'
                                    })
                            }
                            else if(response == "error"){
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'WARNING',
                                    text: "It's Look Like This Student Can't Do This Subject"
                                    })
                            }
                            else if(response == "success"){
                                Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Subject Added Successfully',
                                showConfirmButton: false,
                                timer: 1500
                                })
                            }   
                        }
                        else {
                            Swal.fire({
                                icon: 'error',
                                title: 'ERROR',
                                text: 'This Student Already Added!'
                            })
                        }
                    }
                }

                req.open("POST", "process/addBucketSubjectOL.php", true);
                req.send(form);
            

        }

        function addAlSubject() {
            var indexNumber = document.getElementById("alIndexNumber");
            var firstSubject = document.getElementById("alFirstBucket");
            var secondSubject = document.getElementById("alSecondBucket");
            var thirdSubject = document.getElementById("alThirdBucket");

            if(indexNumber.value.trim() != "" & firstSubject.value != "0" & secondSubject.value != "0" & thirdSubject.value != "0") {
                var form = new FormData();
                form.append("index", indexNumber.value);
                form.append("first", firstSubject.value);
                form.append("second", secondSubject.value);
                form.append("third", thirdSubject.value);

                var xhr = new XMLHttpRequest();

                xhr.onreadystatechange = function() {
                    if(xhr.readyState == 4) {
                        if(xhr.status == 200) {
                            var response = xhr.responseText.trim();
                            if(response == "noData") {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'WARNING',
                                    text: 'Invalid Index Number'
                                    })
                            }
                            else if(response == "error"){
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'WARNING',
                                    text: "It's Look Like This Student Can't Do This Subject"
                                    })
                            }
                            else if(response == "success"){
                                Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Subject Added Successfully',
                                showConfirmButton: false,
                                timer: 1500
                                })
                            }   
                        }
                        else {
                            Swal.fire({
                               icon: 'error',
                               title: 'ERROR',
                               text: 'Internel Server Error'
                            })
                        }
                    }
                }

                xhr.open("POST", "process/addBucketSubjectAL.php", true);
                xhr.send(form);
            }
            else {
                alert("not filled")
            }
        }



    </script>
    
</body>

</html>