<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate</title>
    <link rel="stylesheet" href="Donate.css">
    <link rel="icon" href="../assests/Hope_Foundation_logo2.png" sizes="192X192" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            background: url("../assests/backgrounds/background7.svg") no-repeat;
            background-size: 1100px;
            background-position: top -80px left 50%;
        }
    </style>
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

        // function resetButtons() {
        //     var buttons = document.querySelectorAll(".amount-btn");
        //     buttons.forEach(function (button) {
        //         button.style.color = "#ff7801";
        //         button.style.backgroundColor = "transparent";
        //     });
        // }

        // function showHiddenInput(button) {
        //     var hiddenInput = button.querySelector(".hidden-input");
        //     if (hiddenInput) {
        //         hiddenInput.style.display = "block";
        //     }
        // }

        // function hideAllHiddenInputs() {
        //     var hiddenInputs = document.querySelectorAll(".hidden-input");
        //     hiddenInputs.forEach(function (input) {
        //         input.style.display = "none";
        //     });
        // }

        // function btnclick(button) {
        //     resetButtons();
        //     button.style.color = "whitesmoke";
        //     button.style.backgroundColor = "#ff7801";

        //     hideAllHiddenInputs();
        //     showHiddenInput(button);
        // }

        // var buttons = document.querySelectorAll(".amount-btn");
        // buttons.forEach(function (button) {
        //     button.addEventListener("click", function () {
        //         btnclick(button);
        //     });
        // });




    </script>

</head>


<body>
    <!-- Nav Bar Load -->
    <div w3-include-html="../navbar/nav.php" style="position: sticky; top: 0; background-color: #e88730; z-index: 1000">
    </div>
    <!-- NavBar Scripts -->
    <script src="../navbar/nav.js"></script>
    <script>
        includeHTML();
    </script>


    <div class="begin">
        <h1>Begin 2024 by Helping India</h1>
    </div>

    <div class="form-container">
        <p class="title">Donate</p>
        <form class="form" method="post" action="" autocomplete="off">
            <div class="nationality content">
                <h2 class="heading">Nationality</h2>
                <div class="choose-nation inputs">
                    <div class="indian label">
                        <input type="radio" name="nationality" id="indian" value="Indian">
                        <label for="indian">Indian</label>
                    </div>
                    <div class="nri label">
                        <input type="radio" name="nationality" id="nri" value="NRI">
                        <label for="nri">NRI</label>
                    </div>
                </div>
            </div>
            <div class="focus-area content">
                <h2 class="heading">Focus Area</h2>
                <div class="choose-focus inputs">
                    <div class="children label">
                        <input type="radio" name="focus" id="children" value="Children">
                        <label for="children">Children</label>
                    </div>
                    <div class="elders label">
                        <input type="radio" name="focus" id="elder" value="Unprivileged Elders">
                        <label for="elder">Unprivileged Elders</label>
                    </div>
                    <div class="animals label">
                        <input type="radio" name="focus" id="animals" value="Animals">
                        <label for="animals">Animals</label>
                    </div>
                </div>
            </div>
            <div class="pay-meth content">
                <h2 class="heading">Payment Method</h2>
                <div class="choose-pay-meth inputs">
                    <div class="one-time label">
                        <input type="radio" name="pay-meth" id="one-time" value="One-Time Payment">
                        <label for="one-time">One-Time Payment</label>
                    </div>
                </div>
            </div>
            <div class="Amount content">
                <h2 class="heading">Amount</h2>
                <div class="amount">
                    <div class="Amount inputs">
                        <div class="amount label">
                            <button onclick="btnclick(this)" type="button" class="amount-btn">
                                <input type="radio" id="amount5k" name="price" value="5000" checked="">
                                <label for="amount5k"><i class="fa-solid fa-indian-rupee-sign"></i><b>5000</b></label>
                            </button>
                        </div>
                    </div>
                    <div class="Amount inputs">
                        <div class="amount label">
                            <button onclick="btnclick(this)" type="button" class="amount-btn">
                                <input type="radio" id="amount15k" name="price" value="15000">
                                <label for="amount15k"><i
                                        class="fa-solid fa-indian-rupee-sign"></i><b>15,000</b></label>
                            </button>
                        </div>
                    </div>
                    <div class="Amount inputs">
                        <div class="amount label">
                            <button onclick="btnclick(this)" type="button" class="amount-btn">
                                <input type="radio" id="amount50k" name="price" value="50000">
                                <label for="amount50k"><i
                                        class="fa-solid fa-indian-rupee-sign"></i><b>50,000</b></label>
                            </button>
                        </div>
                    </div>
                    <div class="Amount inputs">
                        <div class="amount label">
                            <button onclick="btnclick(this)" type="button" class="amount-btn otheramount">
                                <input type="radio" id="Another" name="price" value="otheramount">
                                <label for="Another"><b>Other Amount</b></label>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden">
                <input type="text" class="hidden-input" placeholder="Enter amount">
            </div>
        </form>
    </div>

    <script src="script.js" defer></script>

</body>

</html>
<?php
include "../login/connection.php";
// session_start();

function user()
{
    if (!(isset($_COOKIE["user"]) || isset($_SESSION['username']))) {
        echo "<script>retVal();</script>";
    }
}

user();
?>