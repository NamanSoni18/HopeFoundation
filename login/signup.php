<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../navbar/nav2.css">

    <!-- NavBar Load-->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <style>
        .form-container {
            width: 500px;
            height: max-content;
            background-color: #fff;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            border-radius: 10px;
            box-sizing: border-box;
            padding: 20px 30px;
            /* position: absolute; */
            margin: auto;

            /* Center a div */
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            /* display: none; */
        }
    </style>

</head>

<body>

    <div w3-include-html="../navbar/nav.php"></div>



    <!--Navigation bar-->
    <!-- <div id="nav-placeholder">

    </div>

    <script>
        $(function () {
            $("#nav-placeholder").load("/nav.html");
        });
    </script> -->
    <!--end of Navigation bar-->


    <div class="form-container">
        <p class="title">Create account</p>
        <form class="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="text" name="username" class="input" placeholder="Username">
            <input type="text" name="fname" class="input" placeholder="Full Name">
            <input type="date" name="dob" class="input" placeholder="Date of Birth">
            <input type="email" name="email" class="input" placeholder="Email">
            <input type="password" name="password" class="input" placeholder="Password">
            <button class="form-btn"><input type="submit" name="submit" class="submit" value="Create account"></button>
        </form>
        <p class="sign-up-label">
            Already have an account?<span class="sign-up-link">Log in</span>
        </p>

    </div>

    <!-- NavBar Scripts -->
    <script src="../navbar/nav.js"></script>
    <script>
        includeHTML();
    </script>
    <!-- <script async src="../navbar/script.js"></script> -->

    <!-- <script>
    function </style> -->

</body>

</html>

<?php
include "connection.php";
session_start();

$username = $pwd = $fname = $dob = $email = "";

$exists = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $fname = $_POST['fname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $pwd = $_POST['password'];

    // echo $username;

    $query = "Select * from user where username = '$username'";

    $result = mysqli_query($conn, $query);

    $num = mysqli_num_rows($result);

    if ($num == 0) {

        $query = "INSERT INTO user VALUES('$username', '$pwd', '$fname', '$email', '$dob');";

        $result = mysqli_query($conn, $query);

        if ($result == 1) {
            $_SESSION['username'] = $username;
            header('Location: ../Main/index.html');
        } else {
            echo "<script> alert('Login Failed'); </script>";
        }

    }
    if ($num > 0) {
        // $query = "Select * from user where password = '$pwd'";

        // $result = mysqli_query($conn, $query);

        // $num = mysqli_num_rows($result);
        // if()
        echo "<script> alert('Username is already taken.'); </script>";
    }
}
?>