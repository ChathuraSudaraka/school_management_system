<?php

session_start();
if (!isset($_SESSION['studentIndex'])) {
    header("location: student.php");
}

$conn = new mysqli("localhost", "root", "Mercy@2005", "sms");

$indexNo = $_SESSION['studentIndex'];
$thisYear = date("Y");

$getData = $conn->query("SELECT * FROM student_details WHERE student_index_number='$indexNo' AND `year`='$thisYear'");
$studentData = $getData->fetch_assoc();

$studentGrade = $studentData['grade'];
$studentClass = $studentData['class'];

$_SESSION['studentGrade'] = $studentGrade;
$_SESSION['studentClass'] = $studentClass;

$getNews = $conn->query("SELECT header, description, image path FROM news 
INNER JOIN news_grades ON news.id = news_grades.news_id
WHERE news_grades.grade = '$studentGrade'");

$newses = array();
$newsHeader = array();
$newsDescription = array();

for ($i = 0; $i < $getNews->num_rows; $i++) {
    $news = $getNews->fetch_assoc();
    array_push($newses, $news['path']);
    array_push($newsHeader, $news['header']);
    array_push($newsDescription, $news['description']);

}

$getAllDaysSchoolHeld = $conn->query("SELECT DISTINCT `date` FROM `student_attendance` WHERE `date` LIKE '$thisYear%'");
$dateCount = $getAllDaysSchoolHeld->num_rows;

$getAllAttendanceData = $conn->query("SELECT `date` FROM `student_attendance` WHERE `date` LIKE '$thisYear%' AND `status`='true' AND `student_index_number`='$indexNo'");
$allAttendance = $getAllAttendanceData->num_rows;

$attendancePrecentage = ($allAttendance / $dateCount) * 100;
$attendancePrecentage = intval($attendancePrecentage);
$precentageGed = ($attendancePrecentage / 100) * 360;

if ($attendancePrecentage >= 80) {
    $gedColor = 'green';
} else if ($attendancePrecentage >= 50) {
    $gedColor = 'yellow';
} else if ($attendancePrecentage >= 30) {
    $gedColor = 'orange';
} else {
    $gedColor = 'red';
}

$firstGed = 0;
$secondGed = 0;
$thridGed = 0;

if ($precentageGed < 180) {
    $firstGed = $precentageGed;
} else {
    $firstGed = 180;
    if ($precentageGed >= 180 & $precentageGed < 360) {
        $secondGed = $precentageGed - $firstGed;
    } else {
        $secondGed = 180;
    }
}

echo "<script>var initialName = '" . $_SESSION['initialName'] . "'</script>";

$dbTable = '';

if ($studentGrade >= 12) {
    $dbTable = '`al_marks`';
} else if ($studentGrade >= 10) {
    $dbTable = '`ol_marks`';
} else if ($studentGrade >= 6) {
    $dbTable = '`middle_marks`';
} else {
    $dbTable = '`kid_marks`';
}

$getYears = $conn->query("SELECT DISTINCT year FROM student_details");
$year = array();
while ($row = $getYears->fetch_assoc()) {
    $year[] = $row['year'];
}

for ($y = 0; $y < count($year); $y++) {
    for ($t = 1; $t <= 3; $t++) {
        $getStudentTotal = $conn->query("SELECT $dbTable.* FROM $dbTable 
INNER JOIN student_details ON student_details.id = $dbTable.student_details_id
WHERE student_details.student_index_number = '$indexNo'
AND student_details.`year`=$year[$y]
AND $dbTable.term = $t");

        $allTotal = 0;
        $averageTotal = 0; // Initialize to zero

        if ($getStudentTotal->num_rows > 0) {
            for ($x = 0; $x < $getStudentTotal->num_rows; $x++) {
                $studentTotal = $getStudentTotal->fetch_assoc();
                $allTotal += $studentTotal['total'];
            }
            $averageTotal = $allTotal / $getStudentTotal->num_rows;
        }
        $average[$t][$y] = $averageTotal;
    }
}

// Initialize the $average array with zeros
for ($t = 1; $t <= 3; $t++) {
    for ($y = 0; $y < count($year); $y++) {
        if (!isset($average[$t][$y])) {
            $average[$t][$y] = 0;
        }
    }
}

echo "<script>var averageFor1 = " . json_encode($average[1]) . " </script>";
echo "<script>var averageFor2 = " . json_encode($average[2]) . " </script>";
echo "<script>var averageFor3 = " . json_encode($average[3]) . " </script>";

$getFirstTotal = $conn->query("SELECT SUM($dbTable.total) AS total FROM $dbTable 
INNER JOIN student_details ON student_details.id = $dbTable.student_details_id
WHERE student_details.student_index_number = '$indexNo'  
AND student_details.`year`='2023'"); // get my all marks of 3 terms

if ($getFirstTotal === FALSE) {
    // the query has failed
    echo "Error: " . $conn->error;
} else {
    // the query was successful
    $firstTotal = $getFirstTotal->fetch_assoc();

    if ($firstTotal === NULL) {
        // there were no results
        echo "No results found";
    } else {
        // there were results
        $classFirst = $firstTotal['total'];

        echo "<script>var classFirstTotal = " . $classFirst . " </script>";
    }
}

$totalTopMarks = 0;

for ($i = 1; $i <= 3; $i++) {
    $getClassTop = $conn->query("SELECT max(kid_marks.total) AS top FROM kid_marks 
INNER JOIN student_details ON student_details.id = kid_marks.student_details_id
WHERE kid_marks.term = '$i'
AND student_details.class = '$studentClass'
AND student_details.grade = '$studentGrade'
AND student_details.`year`='2023'");

    $topMarks = $getClassTop->fetch_assoc();
    $totalTopMarks += $topMarks['top'];
}

echo "<script>var totalTopMarks = " . $totalTopMarks . " </script>";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Student - Sri Dharmaloka College</title>
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
    <link rel="stylesheet" href="color.css">

    <style>
        .slide-container .prev,
        .slide-container .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            margin-top: -22px;
            padding: 16px;
            color: rgb(0, 0, 0);
            font-weight: bold;
            font-size: 20px;
            transition: all 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
        }

        .slide-container .prev:hover,
        .slide-container .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
        }

        .slide-container .prev {
            left: 2px;
        }

        .slide-container .next {
            right: 2px;
        }

        .dots-container {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0px;
        }

        .dots-container .dot {
            cursor: pointer;
            margin: 5px;
            width: 8px;
            height: 8px;
            color: #333;
            border-radius: 50%;
            background-color: #dfd6ce;
        }

        .dots-container .dot.active {
            border: 2px solid black;
        }

        .slide-container {
            display: flex;
            justify-content: center;
            align-items: center;
            max-width: 1000px;
            margin: auto;
            position: relative;
        }

        .slide-container .slide {
            display: none;
            width: 100%;
        }

        .slide-container .slide.fade {
            animation: fade 0.5s cubic-bezier(0.55, 0.085, 0.68, 0.53) both;
        }

        .slide-container .slide img {
            width: 100%;
        }

        .progress {
            width: 150px;
            height: 150px !important;
            float: left;
            line-height: 150px;
            background: none;
            margin: 20px;
            box-shadow: none;
            position: relative;
        }

        .progress:after {
            content: "";
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 12px solid #fff;
            position: absolute;
            top: 0;
            left: 0;
        }

        .progress>span {
            width: 50%;
            height: 100%;
            overflow: hidden;
            position: absolute;
            top: 0;
            z-index: 1;
        }

        .progress .progress-left {
            left: 0;
        }

        .progress .progress-bar {
            width: 100%;
            height: 100%;
            background: none;
            border-width: 12px;
            border-style: solid;
            position: absolute;
            top: 0;
        }

        .progress .progress-left .progress-bar {
            left: 100%;
            border-top-right-radius: 80px;
            border-bottom-right-radius: 80px;
            border-left: 0;
            -webkit-transform-origin: center left;
            transform-origin: center left;
        }

        .progress .progress-right {
            right: 0;
        }

        .progress .progress-right .progress-bar {
            left: -100%;
            border-top-left-radius: 80px;
            border-bottom-left-radius: 80px;
            border-right: 0;
            -webkit-transform-origin: center right;
            transform-origin: center right;
            animation: loading-1 1.8s linear forwards;
        }

        .progress .progress-value {
            width: 90%;
            height: 90%;
            border-radius: 50%;
            background: #000;
            font-size: 24px;
            color: #fff;
            line-height: 135px;
            text-align: center;
            position: absolute;
            top: 5%;
            left: 5%;
        }

        .progress.blue .progress-bar {
            border-color:
                <?php echo $gedColor; ?>
            ;
        }

        .progress.blue .progress-left .progress-bar {
            animation: loading-2 1.5s linear forwards 1.8s;
        }

        .progress.yellow .progress-bar {
            border-color: #fdba04;
        }

        .progress.yellow .progress-right .progress-bar {
            animation: loading-3 1.8s linear forwards;
        }

        .progress.yellow .progress-left .progress-bar {
            animation: none;
        }

        @keyframes loading-1 {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(180deg);
                transform: rotate(
                        <?php echo $firstGed ?>
                        deg);
            }
        }

        @keyframes loading-2 {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(144deg);
                transform: rotate(
                        <?php echo $secondGed ?>
                        deg);
            }
        }

        @keyframes loading-3 {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(135deg);
                transform: rotate(
                        <?php $thirdGed ?>
                        deg);
            }
        }
    </style>

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
                    <a href="dashboard.php" class="nav-item nav-link active"><i
                            class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="attendance.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Attendance</a>
                    <a href="marks.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Marks</a>
                    <a href="table.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Time Table</a>
                    <a href="studentAssignment.php" class="nav-item nav-link"><i
                            class="bi bi-journal-bookmark-fill me-2"></i></i>Assignments</a>
                    <a href="payment.php" class="nav-item nav-link" onclick="payment();"><i
                            class="fa fa-chart-bar me-2"></i>Payment</a>
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
                            <span class="d-none d-lg-inline-flex">
                                <?php echo $_SESSION['initialName']; ?>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="profile-student.php" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item" onclick="logOut();">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Auto Type Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row" style="height: 60px;">
                    <div class="col-12">
                        <span class="auto-type text-primary"> </span>
                    </div>
                </div>
            </div>
            <!-- Auto type End -->


            <!-- Sales Chart Start -->
            <div class="container-fluid pt-4 px-4 mb-3">
                <div class="row">
                    <div id="carouselExampleCaptions" class="carousel slide carousel-fade">
                        <div class="carousel-indicators">
                            <?php

                            for ($a = 0; $a <= count($newses); $a++) {
                                echo '<button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="' . $a . '" class="active"
                            aria-current="true" aria-label="Slide ' . $a . '1' . '"></button>';
                            }

                            ?>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="img/school.png" class="d-block w-100" alt="image">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>"Learn and Grow at Our School"</h5>
                                    <p>Our school provides a nurturing and supportive environment for students to
                                        develop their knowledge and skills. With dedicated teachers and a variety of
                                        extracurricular activities, we help students grow into confident and capable
                                        individuals.</p>
                                </div>
                            </div>
                            <?php

                            for ($a = 0; $a < count($newses); $a++) {
                                echo '<div class="carousel-item" data-bs-interval="2000">
                            <img src="news/' . $newses[$a] . '" class="d-block w-100" alt="slider-' . $a . '">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>' . $newsHeader[$a] . '</h5>
                                <p>' . $newsDescription[$a] . '</p>
                            </div>
                        </div>';
                            }


                            ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="row g-4 mt-3">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0 text-dark">Average Skills</h6>
                                <a href="">Show All</a>
                            </div>
                            <canvas id="worldwide-sales"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0 text-dark">Comparsion</h6>
                                <a href="">Show All</a>
                            </div>
                            <canvas id="salse-revenue"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sales Chart End -->


            <!-- Upcoming Events Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0 text-dark">Upcoming Events And News</h6>
                        <a href="">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Date</th>
                                    <th scope="col">Event</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>01 Jan 2045</td>
                                    <td>INV-0123</td>
                                    <td>Jhon Doe</td>
                                    <td>$123</td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                                </tr>
                                <tr>
                                    <td>01 Jan 2045</td>
                                    <td>INV-0123</td>
                                    <td>Jhon Doe</td>
                                    <td>$123</td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                                </tr>
                                <tr>
                                    <td>01 Jan 2045</td>
                                    <td>INV-0123</td>
                                    <td>Jhon Doe</td>
                                    <td>$123</td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                                </tr>
                                <tr>
                                    <td>01 Jan 2045</td>
                                    <td>INV-0123</td>
                                    <td>Jhon Doe</td>
                                    <td>$123</td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                                </tr>
                                <tr>
                                    <td>01 Jan 2045</td>
                                    <td>INV-0123</td>
                                    <td>Jhon Doe</td>
                                    <td>$123</td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Upcoming Events End -->


            <!-- Widgets Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-secondary rounded p-4 d-flex align-items-center flex-column">
                            <div class="d-flex align-items-center justify-content-between mb-4 w-100">
                                <h6 class="mb-0 text-dark">Attendance Summary</h6>
                            </div>
                            <div class="progress blue">
                                <span class="progress-left">
                                    <span class="progress-bar"></span>
                                </span>
                                <span class="progress-right">
                                    <span class="progress-bar"></span>
                                </span>
                                <div class="progress-value">
                                    <?php echo $attendancePrecentage; ?>%
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-secondary rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0 text-dark">Calender</h6>
                                <a href="">Today</a>
                            </div>
                            <div id="calender"></div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-secondary rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0 text-dark">Assignments</h6>
                                <a href="">Show All</a>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-2">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-2">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-2">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-2">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center pt-2">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Widgets End -->


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
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="../alert/jquery.alertable.js"></script>
    <script src="../alert/velocity.min.js"></script>
    <script src="../alert/velocity.ui.min.js"></script>

    <script>
        var typed = new Typed(".auto-type", {
            strings: ["", "Hello, " + initialName + "", "Welcome To Student Management System", "Have A Great Day!!!"],
            typeSpeed: 150,
            backSpeed: 20,
            loop: true
        })


        let currentSlide = 0;
        const slides = document.querySelectorAll(".slide")
        const dots = document.querySelectorAll('.dot')

        const init = (n) => {
            slides.forEach((slide, index) => {
                slide.style.display = "none"
                dots.forEach((dot, index) => {
                    dot.classList.remove("active")
                })
            })
            slides[n].style.display = "block"
            dots[n].classList.add("active")
        }
        document.addEventListener("DOMContentLoaded", init(currentSlide))
        const next = () => {
            currentSlide >= slides.length - 1 ? currentSlide = 0 : currentSlide++
            init(currentSlide)
        }

        const prev = () => {
            currentSlide <= 0 ? currentSlide = slides.length - 1 : currentSlide--
            init(currentSlide)
        }

        document.querySelector(".next").addEventListener('click', next)

        document.querySelector(".prev").addEventListener('click', prev)


        setInterval(() => {
            next()
        }, 5000);

        dots.forEach((dot, i) => {
            dot.addEventListener("click", () => {
                console.log(currentSlide)
                init(i)
                currentSlide = i
            })
        })

    </script>

    <!-- Template Javascript -->
    <script type="text/javascript" src="myscript.js"></script>
    <script>
            (function ($) {
                "use strict";

                // Spinner
                var spinner = function () {
                    setTimeout(function () {
                        if ($('#spinner').length > 0) {
                            $('#spinner').removeClass('show');
                        }
                    }, 1);
                };
                spinner();


                // Back to top button
                $(window).scroll(function () {
                    if ($(this).scrollTop() > 300) {
                        $('.back-to-top').fadeIn('slow');
                    } else {
                        $('.back-to-top').fadeOut('slow');
                    }
                });
                $('.back-to-top').click(function () {
                    $('html, body').animate({ scrollTop: 0 }, 1500, 'easeInOutExpo');
                    return false;
                });


                // Sidebar Toggler
                $('.sidebar-toggler').click(function () {
                    $('.sidebar, .content').toggleClass("open");
                    return false;
                });


                // Progress Bar
                $('.pg-bar').waypoint(function () {
                    $('.progress .progress-bar').each(function () {
                        $(this).css("width", $(this).attr("aria-valuenow") + '%');
                    });
                }, { offset: '80%' });


                // Calender
                $('#calender').datetimepicker({
                    inline: true,
                    format: 'L'
                });




                // Testimonials carousel
                $(".testimonial-carousel").owlCarousel({
                    autoplay: true,
                    smartSpeed: 1000,
                    items: 1,
                    dots: true,
                    loop: true,
                    nav: false
                });


                // Chart Global Color
                Chart.defaults.color = "#6C7293";
                Chart.defaults.borderColor = "#000000";


                // Worldwide Sales Chart
                var ctx1 = $("#worldwide-sales").get(0).getContext("2d");
                var myChart1 = new Chart(ctx1, {
                    type: "bar",
                    data: {
                        labels: ["2023", "2024", "2025", "2026", "2027", "2028", "2029"],
                        datasets: [{
                            label: "1st Term",
                            data: averageFor1,
                            backgroundColor: "rgba(255, 158, 94, .9)"
                        },
                        {
                            label: "2st Term",
                            data: averageFor2,
                            backgroundColor: "rgba(255, 180, 94, .9)"
                        },
                        {
                            label: "3st Term",
                            data: averageFor3,
                            backgroundColor: "rgba(255, 200, 94, .9)"
                        }
                        ]
                    },
                    options: {
                        responsive: true
                    }
                });

                console.log(totalTopMarks);
                // Salse & Revenue Chart
                var ctx2 = $("#salse-revenue").get(0).getContext("2d");
                var myChart2 = new Chart(ctx2, {
                    type: "line",
                    data: {
                        labels: ["2023", "2024", "2025", "2026", "2027", "2028", "2029"],
                        datasets: [{
                            label: "You",
                            data: [classFirstTotal, 0],
                            backgroundColor: "rgba(255, 136, 0, .7)",
                            fill: true
                        },
                        {
                            label: "1st Place",
                            data: [totalTopMarks, 0],
                            backgroundColor: "rgba(255, 203, 107, .5)",
                            fill: true
                        }
                        ]
                    },
                    options: {
                        responsive: true
                    }
                });


                // Single Line Chart
                var ctx3 = $("#line-chart").get(0).getContext("2d");
                var myChart3 = new Chart(ctx3, {
                    type: "line",
                    data: {

                        labels: [50, 60, 70, 80, 90, 100, 110, 120, 130, 140, 150],
                        datasets: [{
                            label: "Salse",
                            fill: false,
                            backgroundColor: "rgba(235, 22, 22, .7)",
                            data: [7, 8, 8, 9, 9, 9, 10, 11, 14, 14, 15]
                        }]
                    },
                    options: {
                        responsive: true
                    }
                });


                // Single Bar Chart
                var ctx4 = $("#bar-chart").get(0).getContext("2d");
                var myChart4 = new Chart(ctx4, {
                    type: "bar",
                    data: {
                        labels: ["Italy", "France", "Spain", "USA", "Argentina"],
                        datasets: [{
                            backgroundColor: [
                                "rgba(228, 94, 255, .7)",
                                "rgba(228, 94, 255, .6)",
                                "rgba(228, 94, 255, .5)",
                                "rgba(228, 94, 255, .4)",
                                "rgba(228, 94, 255, .3)"
                            ],
                            data: [55, 49, 44, 24, 15]
                        }]
                    },
                    options: {
                        responsive: true
                    }
                });


                // Pie Chart
                var ctx5 = $("#pie-chart").get(0).getContext("2d");
                var myChart5 = new Chart(ctx5, {
                    type: "pie",
                    data: {
                        labels: ["Italy", "France", "Spain", "USA", "Argentina"],
                        datasets: [{
                            backgroundColor: [
                                "rgba(235, 22, 22, .7)",
                                "rgba(235, 22, 22, .6)",
                                "rgba(235, 22, 22, .5)",
                                "rgba(235, 22, 22, .4)",
                                "rgba(235, 22, 22, .3)"
                            ],
                            data: [55, 49, 44, 24, 15]
                        }]
                    },
                    options: {
                        responsive: true
                    }
                });


                // Doughnut Chart
                var ctx6 = $("#doughnut-chart").get(0).getContext("2d");
                var myChart6 = new Chart(ctx6, {
                    type: "doughnut",
                    data: {
                        labels: ["Italy", "France", "Spain", "USA", "Argentina"],
                        datasets: [{
                            backgroundColor: [
                                "rgba(235, 22, 22, .7)",
                                "rgba(235, 22, 22, .6)",
                                "rgba(235, 22, 22, .5)",
                                "rgba(235, 22, 22, .4)",
                                "rgba(235, 22, 22, .3)"
                            ],
                            data: [55, 49, 44, 24, 15]
                        }]
                    },
                    options: {
                        responsive: true
                    }
                });


            })(jQuery);

    </script>
</body>

</html>