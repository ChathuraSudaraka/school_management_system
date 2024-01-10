<?php 

    /* check user already have an account on this on session and fill the username and password automatically..
    */
    session_start();
    $indexNo = '';
    $pass = '';

    if(isset($_SESSION['studentIndex'])) {
        $indexNo = $_SESSION['studentIndex'];
        $pass = $_SESSION['studentPass'];
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
                <h3>Welcome to the Sri Dharmaloka College Student Management System</h3>
                <br>
                <h5>EverSoft it Solutions.</h5>
            </div>
            <div class="form">
                <lable class="topic">Student LogIn</lable>
                <img src="img/badge.png">
                <p class="failed" id="failed">Login Failed</p>
                <input type="text" id="indexNo" autocomplete placeholder="Registration NO" value="<?php echo($indexNo) ?>">
                <input type="password" id="password" placeholder="Password" value="<?php echo($pass) ?>">
                <button type="submit" onclick="studentLogin();">Sign In</button>
                <p>Login as a <a href="teacher.php">Teacher</a></p>
                <a href="#" id="r">Forgot Your Password?</a>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="myscript.js"></script>
  </body>
  </html>
