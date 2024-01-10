<?php

session_start();
if (!isset($_SESSION['teacherNic'])) {
    header("location: teacher.php");
}

$connection = new mysqli("localhost", "root", "Mercy@2005", "sms");

$nic = $_SESSION['teacherNic'];
$allSubjects = $connection->query("SELECT DISTINCT s.name FROM teacher_has_subject ths
INNER JOIN subject s ON s.id = ths.subject_id 
WHERE ths.teacher_nic = '$nic'");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Teacher - Sri Dharmaloka College</title>
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
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
                    <a href="teacherDashboard.php" class="nav-item nav-link"><i
                            class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="markAttendance.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Attendance <span
                            class="badge bg-danger ms-3">
                            <?php echo $_SESSION['reminder']; ?>
                        </span> </a>
                    <a href="addMarks.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Add Marks</a>
                    <a href="teacherTimeTable.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Time
                        Table</a>
                    <a href="addAssignment.php" class="nav-item nav-link active"><i
                            class="bi bi-journal-bookmark-fill me-2"></i>Assingments</a>
                    <a href="searchStudent.php" class="nav-item nav-link"><i class="bi bi-search me-2"></i>Search
                        Student</a>
                    <a href="resultSheet.php" class="nav-item nav-link"><i
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


            <!-- Widget Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4 bg-secondary mt-1 px-4 pt-2 pb-3 rounded-5">
                    <div class="col-12 ">
                        <h3 class="font-weight-bold text-dark">Set And Submit Assingments</h3>

                        <form>
                            <div class="form-group mt-3">
                                <label for="exampleFormControlSelect1">Select Grade</label>
                                <select class="form-control text-dark" id="assignmentGrade">
                                    <option value="0">Select A Grade</option>
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
                            </div>
                            <div class="form-group mt-3">
                                <label for="exampleFormControlSelect1">Select Class</label>
                                <select class="form-control text-dark" id="assignmentClass">
                                    <option value="0">Select A Class</option>
                                    <option>A</option>
                                    <option>B</option>
                                    <option>C</option>
                                    <option>D</option>
                                    <option>E</option>
                                    <option>F</option>
                                    <option>G</option>
                                    <option>H</option>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="exampleFormControlSelect1">Select Subject</label>
                                <select class="form-control text-dark" id="assignmentSubject">
                                    <option value="0">Select A Subject</option>
                                    <?php

                                    for ($i = 0; $i < $allSubjects->num_rows; $i++) {
                                        $teacherSubject = $allSubjects->fetch_assoc();
                                        $subjects = $teacherSubject['name'];
                                        echo "<option>$subjects</option>";
                                    }


                                    ?>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="exampleFormControlInput1">Assingment Heading</label>
                                <input type="text" class="form-control bg-secondary text-dark" id="assignmentHeading"
                                    placeholder="Assingment Heading">
                            </div>
                            <div class="form-group mt-3">
                                <label for="exampleFormControlInput1">Assingment Code</label>
                                <input type="text" class="form-control bg-secondary text-dark" id="assignmentCode"
                                    placeholder="Assingment Code">
                            </div>
                            <div class="form-group mt-3">
                                <label for="exampleFormControlTextarea1">Assingment description</label>
                                <textarea class="form-control bg-secondary text-dark" id="assignmentDescription"
                                    rows="3"></textarea>
                            </div>
                            <form>
                                <div class="form-group mt-3">
                                    <label for="exampleFormControlFile1">Assingment Document</label>
                                    <input type="file" class="form-control-file" id="assignmentFile">
                                </div>
                                <div class="input-group mb-3 mt-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-secondary text-dark" id="basic-addon1">Starting
                                            Date</span>
                                    </div>
                                    <input type="date" class="form-control bg-secondary text-dark"
                                        placeholder="Username" aria-label="Username" aria-describedby="basic-addon1"
                                        id="startingDate">
                                </div>
                                <div class="input-group mb-3 mt-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text  bg-secondary text-dark" id="basic-addon1">Closing
                                            Date</span>
                                    </div>
                                    <input type="date" class="form-control  bg-secondary text-dark"
                                        placeholder="Username" aria-label="Username" aria-describedby="basic-addon1"
                                        id="endDate">
                                </div>
                                <button onclick="submitAssignment();" type="button"
                                    class="btn btn-primary btn-lg btn-block">Upload
                                    Assingment</button>
                            </form>
                        </form>
                    </div>
                </div>
            </div>
            <hr>
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4 bg-secondary mt-1 px-4 pt-2 pb-3 rounded-5">

                    <h3 class="font-weight-bold text-dark">Submited Assingments</h3>

                    <select
                        class="form-control bg-secondary text-dark custom-select custom-select-lg col-12 col-sm-5 mb-3 ms-1"
                        id="searchByGrade">
                        <option value="0">Select A Grade</option>
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

                    <select
                        class="form-control bg-secondary text-dark custom-select custom-select-lg col-12 col-sm-5 mb-3 ms-1"
                        id="searchByClass">
                        <option value="0">Select A Class</option>
                        <option>A</option>
                        <option>B</option>
                        <option>C</option>
                        <option>D</option>
                        <option>E</option>
                        <option>F</option>
                        <option>G</option>
                        <option>H</option>
                    </select>

                    <div class="d-grid gap-2 col-6 mx-auto mb-2" style="margin-top: -5px;">
                        <button class="btn btn-primary" type="button" onclick="searchAssignment();">Search</button>
                    </div>


                    <div class="input-group mb-3 ">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">Student name</span>
                        </div>
                        <input type="text" class="form-control bg-secondary text-dark " id="searching"
                            aria-describedby="basic-addon3" onkeyup="searchStudent();">
                    </div>
                    <div class="col-12  table-responsive ">
                        <table id="studentTable" class="table table-striped table-bordered table-responsive rounded-5">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Student_Name</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Submited_date_time</th>
                                    <th scope="col">Assingment_code</th>
                                    <th scope="col">Assingment_Document</th>
                                    <th scope="col">Assingment_Marks</th>
                                    <th scope="col">Submit_Marks</th>
                                </tr>
                            </thead>
                            <tbody id="outputTable">
                                <!--  <tr>
                                    <th scope="row">1</th>
                                    <td>Tharindu</td>
                                    <td>English</td>
                                    <td>12/31 11.59</td>
                                    <td>@12345</td>
                                    <td><button type="button" class="btn btn-primary">Download</button></td>
                                    <td><input type="text" class="form-control bg-secondary text-dark"
                                            placeholder="Add Marks"></td>
                                    <td><button type="button" class="btn btn-primary">Submit</button></td>
                                </tr> -->



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Widget End -->


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
    <script src="js/main.js"></script>
    <script>
        function submitAssignment() {
            var assignmentGrade = document.getElementById('assignmentGrade');
            var assignmentClass = document.getElementById('assignmentClass');
            var assignmentSubject = document.getElementById('assignmentSubject');
            var assignmentHeading = document.getElementById('assignmentHeading');
            var assignmentCode = document.getElementById('assignmentCode');
            var assignmentDescription = document.getElementById('assignmentDescription');
            var assignmentFile = document.getElementById('assignmentFile');
            var startingDate = document.getElementById('startingDate');
            var endDate = document.getElementById('endDate');

            if (assignmentGrade.value == "0") {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: "It's Look Like You Aren't Select A Grade"
                });
            }
            else {
                if (assignmentClass.value == "0") {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        text: "It's Look Like You Aren't Select A Class"
                    });
                }
                else {
                    if (assignmentSubject.value == "0") {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Oops...',
                            text: "It's Look Like You Aren't Select A Subject"
                        });
                    }
                    else {
                        if (assignmentHeading.value.trim() == "") {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Oops...',
                                text: "It's Look Like You Aren't Fill Assignment Heading"
                            });
                        }
                        else if (assignmentCode.value.trim() == "") {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Oops...',
                                text: "It's Look Like You Aren't Fill Assignment Code"
                            });
                        }
                        else if (assignmentDescription.value.trim() == "") {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Oops...',
                                text: "It's Look Like You Aren't Fill Assignment Description"
                            });
                        }
                        else if (assignmentFile.value == "") {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Oops...',
                                text: "It's Look Like You Aren't Attach Assignment File"
                            });
                        }
                        else if (startingDate.value == "") {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Oops...',
                                text: "It's Look Like You Aren't Fill Assignment Starting Date"
                            });
                        }
                        else if (endDate.value == "") {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Oops...',
                                text: "It's Look Like You Aren't Fill Assignment Ending Date"
                            });
                        }
                        else {
                            var req = new XMLHttpRequest();

                            var form = new FormData();

                            form.append("assignmentGrade", assignmentGrade.value);
                            form.append("assignmentClass", assignmentClass.value);
                            form.append("assignmentSubject", assignmentSubject.value);
                            form.append("assignmentHeading", assignmentHeading.value);
                            form.append("assignmentCode", assignmentCode.value);
                            form.append("assignmentDescription", assignmentDescription.value);
                            form.append("assignmentFile", assignmentFile.files[0]);
                            form.append("startingDate", startingDate.value);
                            form.append("endDate", endDate.value);

                            req.onreadystatechange = function () {
                                // add debugging part here
                                if (req.readyState == 4) {
                                    if (req.status == 200) {
                                        if (req.responseText == 'error') {
                                            Swal.fire({
                                                icon: 'warning',
                                                title: 'Sorry..',
                                                text: "You can upload only PDF files"
                                            });
                                        }
                                        else if (req.responseText == 'notMoved') {
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Error',
                                                text: "Internel Server Error",
                                                footer: "<a href='http://wa.me/94701189971'>Contact Developers Here</a>"
                                            });
                                        }
                                        else {
                                            Swal.fire({
                                                position: 'top-end',
                                                icon: 'success',
                                                title: 'Assignment Submited Successfully',
                                                showConfirmButton: false,
                                                timer: 1500
                                            })
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

                            req.open("POST", "process/saveAssignment.php", true);
                            req.send(form);
                        }
                    }
                }
            }

        }

        function searchAssignment() {
            var selectGrade = document.getElementById("searchByGrade");
            var selectClass = document.getElementById("searchByClass");

            if (selectClass.value == 0 | selectGrade.value == 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'WARNING',
                    text: "You Must Select A Grade And Class First"
                });
            }
            else {

                var f = new FormData();
                f.append("grade", selectGrade.value);
                f.append("class", selectClass.value);

                var req = new XMLHttpRequest();
                req.onreadystatechange = function () {
                    if (req.readyState == 4) {
                        if (req.status == 200) {
                            // manage output here
                            var r = req.responseText;
                            if (r == "noData") {
                                document.getElementById('outputTable').innerHTML = '';
                                Swal.fire({
                                    icon: 'info',
                                    title: 'WARNING',
                                    text: "DATA NOT EXIST"
                                });
                            }
                            else {
                                document.getElementById('outputTable').innerHTML = r;
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

                req.open("POST", "process/searchAssignment.php", true);
                req.send(f);
            }
        }

        function searchStudent() {
            let input, filter, table, tr, td, txtValue;

            // initialize variables

            input = document.getElementById("searching");
            filter = input.value.toUpperCase();
            table = document.getElementById("studentTable");
            tr = table.getElementsByTagName("tr");

            for (let i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
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

        function addAssignmentMarks(event) {
            var button = event.target;
            var id = button.getAttribute("data-marks");
            var dbId = button.getAttribute("data-dbid");

            var marksInput = document.getElementById("marks" + id);

            if (marksInput.value.trim() == '') {
                Swal.fire({
                    icon: 'info',
                    title: 'WARNING',
                    text: "Please Enter Marks And Press Submit"
                });
            }
            else {
                var marks = marksInput.value;
                var r = new XMLHttpRequest();

                r.onreadystatechange = function () {
                    if (r.readyState == 4) {
                        if (r.status == 200) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Marks Added Successfully',
                                showConfirmButton: false,
                                timer: 1500
                            })
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

                r.open("GET", "process/assignmentMarks.php?marks=" + marks + "&dbid=" + dbId + "", true);
                r.send();
            }
        }
    </script>
</body>

</html>