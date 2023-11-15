<?php
include "../login/connection.php";
session_start();

function user()
{
    if (!(isset($_COOKIE["user"]))) {
        // echo "hehe";
        echo "<script>retVal()</script>";
    }
}

user();

if (isset($_COOKIE["user"])) {
    $username = $_COOKIE['user'];
    $query = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if($result) {
        while( $row = mysqli_fetch_assoc($result)) {
            $_SESSION['username'] = $row["username"];
            $_SESSION["email"] = $row["email"];
            $_SESSION["password"] = $row["password"];
            $_SESSION["fname"] = $row["fname"];
            $_SESSION["dob"] = $row["dob"];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="profile.css">
    <script>
        function retVal() {
            var retVal = confirm("You Have not logged in. Want to Login?");
            if (retVal == true) {
                location.replace("../login/login.php");
            }
            else {
                location.replace("../Main/index.html");
                // return false;
            }
        }
    </script>
</head>

<body>
    <!-- Nav Bar Load -->
    <div w3-include-html="nav.php" style="position: sticky; top: 0; background-color: #F2994A; z-index: 1000">
    </div>
    <script src="nav.js"></script>
    <script>
        includeHTML();
    </script>

    <div class="h1-head">
        <h1 id="manage-profile">Manage your Profile</h1>
    </div>
    <div class="main-profile-div">
        <form action="" class="form" method="post">
            <div class="profile-div2">
                <label for="up_username" class="label">Edit your Username</label>
                <input type="text" id="up_username" name="up_username" class="input"
                    value="<?php echo $_SESSION['username']; ?>">
            </div>
            <div class="profile-div2">
                <label for="up_fname" class="label">Edit your Name</label>
                <input type="text" class="input" id="up_fname" name="up_fname"
                    value="<?php echo $_SESSION['fname']; ?>">
            </div>
            <div class="profile-div2">
                <label for="up_email" class="label">Edit your Email</label>
                <input type="email" class="input" id="up_email" name="up_email"
                    value="<?php echo $_SESSION['email']; ?>">
            </div>
            <div class="profile-div2">
                <label for="up_pwd" class="label">Edit your Password</label>
                <input type="password" class="input" id="up_pwd" name="up_pwd"
                    value="<?php echo $_SESSION['password']; ?>">
            </div>
            <div class="profile-div2">
                <label for="up_dob" class="label">Edit your Date of Birth</label>
                <input type="date" class="input" id="up_dob" name="up_dob" value="<?php echo $_SESSION['dob']; ?>">
            </div>
            <button class="submit-button-profile"><input name="submit" class="submit" type="submit"
                    value="Submit"></button>
        </form>
    </div>
</body>

</html>

<?php
$username = $pwd = $fname = $dob = $email = "";
$up_username = $up_pwd = $up_fname = $up_dob = $up_email = "";

$username = $_SESSION['username'];
$pwd = $_SESSION['password'];
$fname = $_SESSION['fname'];
$dob = $_SESSION['dob'];
$email = $_SESSION['email'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $up_username = $_POST['up_username'];
    $up_fname = $_POST['up_fname'];
    $up_dob = $_POST['up_dob'];
    $up_email = $_POST['up_email'];
    $up_pwd = $_POST['up_pwd'];

    $query = "Select * from user where username = '$username'";

    $result = mysqli_query($conn, $query);

    $num = mysqli_num_rows($result);

    if ($num == 1) {
        $query2 = "UPDATE user SET username = '$up_username', fname = '$up_fname', email = '$up_email', password = '$up_pwd', dob = '$up_dob' WHERE username = '$username'";

        $result = mysqli_query($conn, $query2);

        if ($result == 1) {
            $_SESSION['username'] = $up_username;
            setcookie("user", $up_username, time() + (30 * 24 * 3600), "/");
            $_SESSION['email'] = $up_email;
            $_SESSION['password'] = $up_pwd;
            $_SESSION['dob'] = $up_dob;
            $_SESSION['fname'] = $up_fname;
            header('Location: Profile.php');
        } else {
            echo "<script> alert('Update Failed'); </script>";
        }
    } else {
        echo "<script> alert('Update failed.'); </script>";
    }

}
?>