<?php 

    /* check user already have an account on this on session and fill the username and password automatically..
    */
    session_start();
    $nic = '';
    $pass = '';

    if(isset($_SESSION['teacherNic'])) {
        $nic = $_SESSION['teacherNic'];
        $pass = $_SESSION['teacherPass'];
    }
    
 ?>
 

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/mainstyle.css">
    <link rel="stylesheet" href="css/mystyle.css">
    <title>School Management System</title>
</head>

<body>
    <div class="container" style="justify-content: center;">
        <div class="content">
            <div class="banner">
                <h1>MANAGEMENT SYSTEM</h1>
                <h3>Welcome to the Sri Dharmaloka College Lecturer Management System</h3>
                <br>
                <h5>EverSoft it Solutions.</h5>
            </div>
            <div class="form">
                <lable class="topic">Lecturer LogIn</lable>
                <img src="img/badge.png">
                <p class="failed" id="failed">Login Failed</p>
                <input type="text" id="nic" autocomplete placeholder="NIC NO" value="<?php echo($nic) ?>">
                <input type="password" id="password" placeholder="Password" value="<?php echo($pass) ?>">
                <button type="submit" onclick="teacherLogin();">Sign In</button>
                <p>Login as a<a href="student.php"> Student</a></p>
                <a href="#" id="r">Forgot Your Password?</a>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="myscript.js"></script>
  </body>
  </html>
