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

    <style>
        /* style.css */
        @import url("https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700&display=swap");

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
        
        /* .btn {
            display: block;
            background-color: var(--primary-color);
            color: var(--white);
            text-align: center;
            padding: 0.6rem 1.4rem;
            font-size: 1rem;
            font-weight: 500;
            border-radius: 5px;
        } */

        .logo {
            margin-right: 1.5rem;
            z-index: 6;
        }

        #nav-menu {
            border-bottom: var(--border);
            /* background: linear-gradient(to left, #f46b45, #eea849); */
        }
        

        /* .menu {
  position: relative;
  background: var(--white);
} */

        /* .menu-bar li:first-child .dropdown {
  flex-direction: initial;
  min-width: 480px;
}

.menu-bar li:first-child ul:nth-child(1) {
  border-right: var(--border);
}

.menu-bar li:nth-child(n + 2) ul:nth-child(1) {
  border-bottom: var(--border);
} */

        /* .menu-bar .dropdown-link-title {
  font-weight: 600;
} */

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

        /* .menu-bar {
  display: flex;
  align-items: center;
} */
        /* 
.right-container {
  display: flex;
  align-items: center;
  column-gap: 1rem;
}

.right-container .search {
  position: relative;
}

.right-container img {
  border-radius: 50%;
}

.search input {
  background-color: var(--ash);
  border: none;
  border-radius: 6px;
  padding: 0.7rem;
  padding-left: 2.4rem;
  font-size: 16px;
  width: 100%;
  border: var(--border);
}

.search .bx-search {
  position: absolute;
  left: 10px;
  top: 50%;
  font-size: 1.3rem;
  transform: translateY(-50%);
  opacity: 0.6;
} */

        /* #hamburger {
  display: none;
  padding: 0.1rem;
  margin-left: 1rem;
  font-size: 1.9rem;
}

@media (max-width: 1100px) {
  #hamburger {
    display: block;
  }

  .container {
    padding: 1.2rem;
  }

  .menu {
    display: none;
    position: absolute;
    top: 87px;
    z-index: 1;
    left: 0;
    min-height: 100vh;
    width: 100vw;
  }

  .menu-bar li:first-child ul:nth-child(1) {
    border-right: none;
    border-bottom: var(--border);
  }

  .menu.show {
    display: block;
  }

  .menu-bar {
    display: flex;
    flex-direction: column;
    align-items: stretch;
    row-gap: 1rem;
    padding: 1rem;
    margin-top: 20px;
  }

  .menu-bar .nav-link {
    display: flex;
    justify-content: space-between;
    width: 100%;
    font-weight: 500;
    font-size: 1.2rem;
    margin: 0;
  }

  .menu-bar > li:not(:last-child) {
    padding-bottom: 0.5rem;
    border-bottom: var(--border);
  }
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
                <li>
                    <button class="nav-link"><a class="nav-link" href="../login/login.php">Login</a></button>
                </li>
                <li><button class="nav-link"><a class="nav-link" href="../login/signup.php">Signup</a></button></li>
            </ul>

            <div class="right-container">
                <span>
                    <?php echo user() ?>
                </span>
                <a href="#profile">
                    <!-- <img src="../assests/Hopefo.jpg" width="30" height="30" alt="user image" /> -->
                </a>
                <a href="../Donate/Donate.php">
                    <button class="Donate-btn-wrapper">
                        <span class="span-donate">Donate ❤️</span>
                    </button>
                </a>
            </div>
        </div>
    </header>
</body>

</html>