<?php

session_start();
$nic = '';
$pass = '';

if(isset($_SESSION['libAdminNic'])) {
    $nic = $_SESSION['libAdminNic'];
    $pass = $_SESSION['libAdminPassword'];
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
                <h3>Welcome to the Sri Dharmaloka College School Management System</h3>
                <br>
                <h5>EverSoft it Solutions.</h5>
            </div>
            <div class="form">
                <lable class="topic">Library LogIn</lable>
                <img src="img/badge.png" />
                <p class="failed" id="failed">Login Failed</p>
                <input type="text" id="nic" autocomplete placeholder="NIC NO" value="<?php echo $nic; ?>">
                <input type="password" id="password" placeholder="Password" value="<?php echo $pass; ?>">
                <button type="submit" onclick="libLogin();">Sign In</button>
                <p>Back to <a href="../homePage/index.html">Home</a> menu</p>
                <a href="#" id="r">Forgot Your Password?</a>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="myscript.js"></script>
    <script>
        function libLogin() {
            const nic = document.getElementById("nic").value;
            const password = document.getElementById("password").value;
            var form = new FormData();
            form.append("nic", nic);
            form.append("password", password);

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4) {
                    if (xhr.status == 200) {
                        var response = xhr.responseText;
                        if (response == 'success') {
                            document.getElementById("failed").style.display = 'none';
                            window.location = "libDashboard.php";
                        }
                        else { 
                            document.getElementById("failed").style.display = 'block';
                        }
                    }
                    else {
                        document.getElementById("failed").style.display = 'block';
                    }
                }
            }

            xhr.open("POST", "process/libraryLogin.php", true);
            xhr.send(form);
        }
    </script>
</body>

</html>