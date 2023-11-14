<?php
include "../login/connection.php";
session_start();

$userprofile = "";

function user()
{
    if (isset($_SESSION['username'])) {
        $userprofile = $_SESSION['username'];
        return $userprofile;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <meta http-equiv="refresh" content="5"> -->
    <!-- Nav Bar Components -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Eczar">
    <link rel="stylesheet" href="https://fonts.google.com/specimen/Marcellus">
    <!-- <link rel="stylesheet" href="nav2.css"> -->


    <style>
        /* style.css */
        @import url("https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700&display=swap");
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;800;900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            /* font-family: "Inter", sans-serif; */
        }

        header {
            margin-top: 0;
            color: whitesmoke;
            font-size: 18px;
            padding-top: 20px;
            position: sticky;
            top: 0;
            z-index: 1000;
            /* background: var(--nav-gradient); */
            font-family: "Biryani";
            /* background-color: #349f4b; */
        }

        :root {
            --dark-grey: #333333;
            --medium-grey: #636363;
            --gray: #555;
            --purple: #4e65ff;
            --green-blue: #92effd;
            --white: #fff;
            --light-grey: #eeeeee;
            --ash: #f4f4f4;
            --primary-color: #2b72fb;
            --white: white;
            --border: 1px solid var(--light-grey);
            --shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px,
                rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;
            --nav-gradient: linear-gradient(43deg, #1bb5ad 0%, #47d06c 46%, #c1ff70 100%);
            ;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1600px;
            margin: 0 auto;
            column-gap: 2rem;
            height: 90px;
            padding: 1.2rem 3rem;
        }

        .Inc {
            border-radius: 25%;
            padding: 10px;
            transition: 0.4s ease;
        }

        .Inc:hover {
            transform: scale(1.5);
            /* transform: translateX(15px); */
        }

        body {
            font-family: inherit;
            /* background-color: var(--white); */
            color: var(--dark-grey);
            letter-spacing: -0.4px;
        }

        ul {
            list-style: none;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button {
            border: none;
            background-color: transparent;
            cursor: pointer;
            color: inherit;
        }

        .logo {
            margin-right: 1.5rem;
            z-index: 6;
        }

        #nav-menu {
            border-bottom: var(--border);
        }

        .menu-bar .nav-link {
            font-size: 18px;
            font-weight: 500;
            font-family: "Biryani", serif;
            letter-spacing: -0.6px;
            padding: 0.3rem;
            min-width: 60px;
            margin: 0 0.6rem;
            font-weight: 500;
        }

        .menu-bar .nav-link:hover {
            color: var(--primary-color);
        }

        /* Donate Button */
        .Donate-btn-wrapper {
            display: inline-block;
            padding: 12px 28px;
            margin: 10px;
            font-size: 24px;
            font-weight: bold;
            text-transform: uppercase;
            color: #fff;
            background-image: linear-gradient(to bottom right, #edbf5a, #ffae00);
            border: none;
            border-radius: 40px;
            box-shadow: 0px 4px 0px #ffae00;
            transition: all 0.2s ease-in-out;
        }

        .Donate-btn-wrapper:hover {
            transform: translateY(-2px);
            box-shadow: 0px 6px 0px #ffae00;
        }

        .Donate-btn-wrapper:active {
            transform: translateY(0px);
            box-shadow: none;
            background-image: linear-gradient(to bottom right, #ffae00, #edbf5a);
        }

        .Donate-btn-wrapper:before,
        .Donate-btn-wrapper:after {
            content: "";
            position: absolute;
            width: 0;
            height: 0;
        }

        .Donate-btn-wrapper:before {
            top: -3px;
            left: -3px;
            border-radius: 40px;
            border-top: 3px solid #fff;
            border-left: 3px solid #fff;
        }

        .Donate-btn-wrapper:after {
            bottom: -3px;
            right: -3px;
            border-radius: 40px;
            border-bottom: 3px solid #fff;
            border-right: 3px solid #fff;
        }

        .span-donate {
            font-size: 20px;
            /* font-family: 'Biryani'; */
            font-weight: 600;
        }

        .right-container {
            display: flex;
            flex-direction: row;
            gap: 10px;
            align-items: inherit;
        }


        /* HamBurger */
        .menu {
            display: flex;
            flex-direction: row;
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .menu>li {
            margin: 0 1rem;
            overflow: hidden;
        }

        .menu-button-container {
            display: none;
            height: 100%;
            width: 30px;
            cursor: pointer;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        #menu-toggle {
            display: none;
        }

        .menu-button,
        .menu-button::before,
        .menu-button::after {
            display: block;
            background-color: #080404;
            position: absolute;
            height: 4px;
            width: 30px;
            transition: transform 400ms cubic-bezier(0.23, 1, 0.32, 1);
            border-radius: 2px;
        }

        .menu-button::before {
            content: "";
            margin-top: -8px;
        }

        .menu-button::after {
            content: "";
            margin-top: 8px;
        }

        #menu-toggle:checked+.menu-button-container .menu-button::before {
            margin-top: 0px;
            transform: rotate(405deg);
        }

        #menu-toggle:checked+.menu-button-container .menu-button {
            background: rgba(255, 255, 255, 0);
        }

        #menu-toggle:checked+.menu-button-container .menu-button::after {
            margin-top: 0px;
            transform: rotate(-405deg);
        }

        @media (max-width: 1100px) {
            .menu-button-container {
                display: flex;
            }

            .menu {
                position: absolute;
                top: 0;
                margin-top: 100px;
                left: 0;
                flex-direction: column;
                width: 100%;
                justify-content: center;
                align-items: center;
            }

            #menu-toggle~.menu li {
                height: 0;
                margin-top: 0;
                margin-bottom: 0;
                margin-left: 0;
                margin-right: 0;
                padding: 0;
                border: 0;
                transition: height 400ms cubic-bezier(0.23, 1, 0.32, 1);
            }

            #menu-toggle:checked~.menu li {
                /* border: 0.4px solid #333; */
                height: 2.5em;
                z-index: 5;
                padding: 0.5em;
                transition: height 400ms cubic-bezier(0.23, 1, 0.32, 1);
            }

            .menu>li {
                display: flex;
                justify-content: center;
                margin: 0;
                padding: 0.5em 0;
                width: 100%;
                color: rgb(1, 0, 0);
                background-color: #f4f4f4;
            }

            .menu>li:not(:last-child) {
                border-bottom: 1px solid #444;
            }

        }



        /* Profile Code */
        .profile-div {
            position: relative;
            top: 0;
            left: 0;
            width: 100%;
            height: 80px;
            padding: 16px;
        }

        .profile p {
            line-height: 1;
            font-size: 14px;
            opacity: .6;
        }

        .profile .img-box {
            position: relative;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            overflow: hidden;
        }

        .profile .img-box img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-toggle {
            display: none;
        }

        .profile {
            position: relative;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 12px;
            cursor: pointer;
            text-align: end;
        }

        .profile h3 {
            text-align: end;
            line-height: 1;
            margin-bottom: 4px;
            font-weight: 600;
            transition: color 0.3s;
        }

        .menu-profile {
            position: absolute;
            top: calc(100% + 24px);
            right: 16px;
            width: 200px;
            min-height: 100px;
            background: #fff;
            box-shadow: 0 10px 20px rgba(0, 0, 0, .2);
            display: none;
            /* Initially hide the menu-profile */
            transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
        }

        .profile-toggle:checked+.profile {
            color: #349f4b;
        }

        .profile-toggle:checked+.profile h3 {
            color: #349f4b;
        }

        .profile-toggle:checked+.profile+.menu-profile {
            display: inline-block;
            opacity: 1;
            transform: translateY(0);
            color: black;
        }


        .menu-profile::before {
            content: '';
            position: absolute;
            top: -10px;
            right: 14px;
            width: 20px;
            height: 20px;
            background: #fff;
            transform: rotate(45deg);
            z-index: -1;
        }

        .menu-profile.active {
            display: block;
            /* Display the menu-profile when active */
        }

        .menu-profile ul {
            /* position: relative; */
            display: flex;
            flex-direction: column;
            z-index: 10;
            background: #fff;
        }

        .menu-profile ul li {
            list-style: none;
        }

        .menu-profile ul li:hover {
            background: #eee;
        }

        .menu-profile ul li a {
            text-decoration: none;
            color: #000;
            display: flex;
            align-items: center;
            padding: 15px 20px;
            gap: 6px;
        }

        .menu-profile ul li a i {
            font-size: 1.2em;
        }

        .login-btn-wrapper {
            color: #ecf0f1;
            font-size: 17px;
            background-color: #e67e22;
            border: 1px solid #f39c12;
            border-radius: 5px;
            padding: 10px;
            box-shadow: 0px 6px 0px #d35400;
            transition: all .1s;
        }

        .login-btn-wrapper:hover {
            box-shadow: 0px 2px 0px #d35400;
            position: relative;
            top: 2px;
        }
    </style>
</head>

<body>
    <header id="nav-menu" aria-label="navigation bar">
        <div class="container">
            <a class="logo" href="../Main/index.html">
                <img alt="Inc Logo" src="../assests/Hope_Foundation_logo2.svg" width="100" height="100"
                    class="Inc Logo" />
            </a>
            <input id="menu-toggle" type="checkbox" />
            <label class='menu-button-container' for="menu-toggle">
                <div class='menu-button'></div>
            </label>
            <ul class="menu-bar menu">
                <li>
                    <button class="nav-link">
                        Programs
                    </button>
                </li>
                <li>
                    <button class="nav-link">
                        <a href="../children/children.html">Children?</a>
                    </button>
                </li>
                <li>
                    <button class="nav-link">
                        Contact Us
                    </button>
                </li>
                <li>
                    <button class="nav-link">
                        Get Involved
                    </button>
                </li>
                <li><button class="nav-link"><a class="nav-link" href="../login/signup.php">Signup</a></button></li>
            </ul>

            <div class="right-container">

                <?php
                if (!$_SESSION['username']) { ?>
                    <a href="../login/login.php">
                        <button class="login-btn-wrapper">
                            Log in
                        </button>
                    </a>
                <?php } else {
                    genprofile();
                } ?>
                <?php function genprofile()
                { ?>
                    <div class="profile-div">
                        <input type="checkbox" id="profileToggle" class="profile-toggle">
                        <label for="profileToggle" id="profile" class="profile">
                            <div class="user">
                                <h3><span>
                                        <?php echo user() ?>
                                    </span></h3>
                            </div>
                            <div class="img-box">
                                <img src="https://i.postimg.cc/BvNYhMHS/user-img.jpg" alt="some user image">
                            </div>
                        </label>

                        <div class="menu-profile" id="menu-profile">
                            <ul>
                                <li><a href="../navbar/profile.php"><i class="ph-bold ph-user"></i>&nbsp;Profile</a></li>
                                <li><a href="#"><i class="ph-bold ph-envelope-simple"></i>&nbsp;Inbox</a></li>
                                <li><a href="#"><i class="ph-bold ph-gear-six"></i>&nbsp;Settings</a></li>
                                <li><a href="#"><i class="ph-bold ph-question"></i>&nbsp;Help</a></li>
                                <li><a href="../login/logout.php"><i class="ph-bold ph-sign-out"></i>&nbsp;Sign Out</a></li>
                            </ul>
                        </div>
                    </div>
                <?php } ?>
                <a href="../Donate/Donate.php">
                    <button class="Donate-btn-wrapper">
                        <span class="span-donate">Donate❤️</span>
                    </button>
                </a>
            </div>
        </div>
    </header>
</body>

</html>