<?php

session_start();
if (!isset($_SESSION['teacherNic'])) {
    header("location: teacher.php");
}

try {
    echo "<script>var grade = " . $_SESSION['teacherGrade'] . "</script>";
} catch (Exception $e) {
    header("location: teacherDashboard.php");
}
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Marks alert Stylesheet -->
    <link href="marksAlert/docs/css/jquery.sweet-modal.min.css" rel="stylesheet">
    <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script>
        function teacherDoesNotHaveAClass() {
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: "It's Look Like You Don't Have Permission"
            })
        }
    </script>
    <style>
        table input {
            width: 80px;
        }
    </style>

</head>

<body onload="loadSubjects();" style="background:#f2f2f2;">
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
                    <h3 class="text-primary text-center">College</h3>
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
                    <a href="addMarks.php" class="nav-item nav-link active"><i class="fa fa-keyboard me-2"></i>Add Marks</a>
                    <a href="teacherTimeTable.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Time
                        Table</a>
                    <a href="addAssignment.php" class="nav-item nav-link"><i
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


            <div class="container-fluid pt-4 px-4">
                <div class="row">
                    <div class="col-12 mt-3 mb-3">
                        <div class="input-group">
                            <label class="input-group-text" for="inputGroupSelect01">Select a Term</label>
                            <select class="form-select bg-secondary text-dark" id="marksTerm"
                                onchange="termSelected();">
                                <option selected value="0">Choose a Term...</option>
                                <option value="1">First Term</option>
                                <option value="2">Second Term</option>
                                <option value="3">Third Term</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- marks Start -->
                <div class="container-fluid pt-4 px-4">

                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4 text-dark">ADD MARKS</h6>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control bg-secondary text-dark" id="searching"
                                    onkeyup="filterStudents();" placeholder="name@example.com">
                                <label for="floatingInput">Search by student Name</label>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-bordered" id="studentTable">
                                    <thead class="table-dark" id="tHead">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Sinhala</th>
                                            <th scope="col">English</th>
                                            <th scope="col">Submit</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tBody">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form End -->

                <!-- Footer Start -->
                <div class="container-fluid pt-4 px-4">
                    <div class="bg-secondary rounded-top p-4">
                        <div class="row">
                            <div class="col-12 col-sm-6 text-center text-sm-start">
                                &copy; <a href="#">Eversoft IT Solution</a>, All Right Reserved.
                            </div>
                            <div class="col-12 col-sm-6 text-center text-sm-end">
                                Designed By <a href="https://eversoft.cf/">Eversoft IT Solutions</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer End -->
            </div>
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

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="myscript.js"></script>

    <script>

        var lengthForTable;
        var subjects;
        function loadSubjects() {
            let kids = ["No", "Name", "Sinhala", "Maths", "English", "Tamil", "Buddhism", "Environment", "Submit"];
            let middle = ["No", "Name", "Sinhala", "Maths", "English", "Science", "Tamil", "Buddhism", "History", "Geography", "Esthetics", "Civics", "Health", "PTS", "Submit"];
            let ol = ["No", "Name", "Sinhala", "Maths", "English", "Science", "Buddhism", "History", "Bucket1", "Bucket2", "Bucket3", "Submit"];
            let al = ["No", "Name", "Bucket1", "Bucket2", "Bucket3", "English", "GIT", "Submit"];

            let tHead = document.getElementById("tHead");
            tHead.innerHTML = '';
            let row = document.createElement("tr");
            var myRow;
            if (grade <= 5) {
                myRow = kids;
            }
            else if (grade <= 9) {
                myRow = middle;
            }
            else if (grade <= 11) {
                myRow = ol;
            }
            else if (grade <= 13) {
                myRow = al;
            }
            lengthForTable = myRow.length;
            subjects = myRow;
            for (let i = 0; i < myRow.length; i++) {
                let col = document.createElement("th");
                col.innerHTML = myRow[i];
                row.appendChild(col);
            }
            tHead.appendChild(row);
            let SelectATermRow = document.createElement("tr");
            let SelectTermCol = document.createElement("th");
            SelectTermCol.innerHTML = "Select a Term First";
            SelectTermCol.style.color = "red";
            SelectTermCol.colSpan = myRow.length;
            SelectATermRow.style.backgroundColor = "orange";
            SelectATermRow.appendChild(SelectTermCol);
            document.getElementById("tBody").appendChild(SelectATermRow);
        }

        function termSelected() {
            let term = document.getElementById("marksTerm").value;
            if (term != 0) {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4) {
                        if (xhr.status == 200) {
                            // handle output
                            let response = JSON.parse(xhr.responseText);
                            if (response[0].status == 'success') {
                                document.getElementById("tBody").innerHTML = '';
                                for (let i = 0; i < response.length; i++) {
                                    let row = document.createElement("tr");
                                    row.id = 'row' + response[i].data.id;
                                    for (let a = 0; a < lengthForTable; a++) {
                                        var col = document.createElement("td");
                                        col.classList.add("text-dark");
                                        if (a == 0) {
                                            col.innerHTML = i + 1;
                                        }
                                        else if (a == 1) {
                                            col.style.whiteSpace = "nowrap";
                                            col.innerHTML = response[i].data.full_name;
                                        }
                                        else if (a == lengthForTable - 1) {
                                            var btn = document.createElement("button");
                                            btn.classList.add("btn");
                                            btn.classList.add("btn-primary");
                                            btn.innerHTML = "Add";
                                            btn.dataset.did = response[i].data.id;
                                            btn.onclick = function () {
                                                addMarks(this);
                                            };
                                            col.appendChild(btn);
                                        }
                                        else {
                                            var input = document.createElement("input");
                                            input.type = "number";
                                            input.id = subjects[a] + response[i].data.id;
                                            col.appendChild(input);
                                        }
                                        row.appendChild(col);
                                    }
                                    document.getElementById("tBody").appendChild(row);
                                }
                            }
                            else {
                                document.getElementById("tBody").innerHTML = '';
                                let SelectATermRow = document.createElement("tr");
                                let SelectTermCol = document.createElement("th");
                                SelectTermCol.innerHTML = "Already Added All Marks For Selected Term";
                                SelectTermCol.style.color = "red";
                                SelectTermCol.colSpan = lengthForTable;
                                SelectATermRow.style.backgroundColor = "orange";
                                SelectATermRow.appendChild(SelectTermCol);
                                document.getElementById("tBody").appendChild(SelectATermRow);
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
                };

                xhr.open("GET", "process/searchByTerm.php?term=" + term + "", true);
                xhr.send();
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

        function addMarks(Button) {
            var did = Button.dataset.did;
            var term = document.getElementById("marksTerm").value;

            var kidsSubjects = ["Sinhala", "Maths", "English", "Tamil", "Buddhism", "Environment"];
            var middleSubjects = ["Sinhala", "Maths", "English", "Science", "Tamil", "Buddhism", "History", "Geography", "Esthetics", "Civics", "Health", "PTS"];
            var olSubjects = ["Sinhala", "Maths", "English", "Science", "Buddhism", "History", "Bucket1", "Bucket2", "Bucket3"];
            var alSubjects = ["Bucket1", "Bucket2", "Bucket3", "English", "GIT", "General_knowledge"];

            var SubjectRow;
            if (grade <= 5) {
                SubjectRow = kidsSubjects;
            }
            else if (grade <= 9) {
                SubjectRow = middleSubjects;
            }
            else if (grade <= 11) {
                SubjectRow = olSubjects;
            }
            else if (grade <= 13) {
                SubjectRow = alSubjects;
            }
            
            var requestOBJ = {
                "detailsId": did,
                "term": term,
            };
            var filled = true;
            try {
                for (var i = 0; i < SubjectRow.length; i++) {
                    var subject = document.getElementById(SubjectRow[i] + did);
                    var regex = /^(100|\d?\d(\.\d+)?)$/;
                    if (subject.value == '' || subject.value < 0 || !regex.test(subject.value)) {
                        filled = false;
                    }
                    else {
                        requestOBJ[SubjectRow[i].toLowerCase()] = subject.value;
                    }
                }
            }
            catch {
                alert("Error");
            }

            if (filled) {
                var json = JSON.stringify(requestOBJ);
                var xhr = new XMLHttpRequest();
                var form = new FormData();
                form.append("json", json);

                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        document.getElementById("row" + did).classList.add("d-none");
                    }
                }

                xhr.open("POST", "process/saveMarks.php", true);
                xhr.send(form);
            }
            else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: "Please Double Check Marks again",
                });
            }
        }
    </script>
</body>

</html>