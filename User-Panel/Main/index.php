<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="refresh" content="5"> -->
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../../assests/Hope_Foundation_logo2.png" sizes="192X192" type="image/png">
    <link rel="stylesheet" href="../navbar/nav.css">
    <link rel="stylesheet" href="../Profile/profile.css">
    <style>
        .submit-button-profile {
            color: white;
            outline: 2px solid #2c9caf;
        }

        .submit-button-profile:hover {
            outline: 2px solid #70bdca;
            box-shadow: 4px 5px 17px -4px #268391;
        }

        .submit-button-profile:before {
            background-color: #2c9caf;
        }
    </style>
</head>

<body>

    <!-- NavBar Load -->
    <div style="position: sticky; top: 0; background-color: #e88730; z-index: 1000">
        <?php include_once("../navbar/nav.php") ?>
    </div>

    <div class="section1">
        <div>
            <h1 class="text1">Let's Ensure Happy<br>Childhood for<br>Indian Children</h1>
        </div>
        <div>
            <img class="image1" src="../../assests/children-cute-laughing.png" alt="No Image">
        </div>
    </div>

    <br>

    <div class="section2">
        <div class="part1">
            <h1 class="content-wrapper content-wrapper-heading">How do you want to help children today?</h1>
            <p class="content-wrapper content-wrapper-paragraph">Your smallest contribution makes a big difference to
                children's lives. We count on the generosity of people like you to be able to create real change for
                India's children!</p>
            <a href="https://rzp.io/l/UY27L3w">
                <button class="Donate-btn-wrapper content-wrapper" style="margin: 20px auto;">Donate ❤️</button></a>
        </div>
        <div class="part2">
            <div class="card-section3">
                <img class="image-grid" src="../../assests/Donate/Poor-children-in-school-donate.jpg" alt="img-1"
                    width="400px" height="300px" />
                <h1 class="list-item">Send Children Back to School</h1>
                <p class="list-item">If not now they might never return</p>
            </div>
            <div class="card-section3">
                <img class="image-grid" src="../../assests/Donate/stop-child-labour.jpg" alt="img-1" width="400px"
                    height="300px" />
                <h1 class="list-item">Stop Child Labour</h1>
                <p class="list-item">Help children go to school instead</p>
            </div>
            <div class="card-section3">
                <img class="image-grid" src="../../assests/Donate/Unpreviliged-Mother.jpg" alt="img-1" width="400px"
                    height="300px" />
                <h1 class="list-item">Help Underprivileged Mothers</h1>
                <p class="list-item">Provide them the nutritional care</p>
            </div>
            <div class="card-section3">
                <img class="image-grid" src="../../assests/Donate/Education-Gap.jpg" alt="img-1" width="400px"
                    height="300px" />
                <h1 class="list-item">Bridge The Education Gap</h1>
                <p class="list-item">Through academic support centres</p>
            </div>
            <div class="card-section3">
                <img class="image-grid" src="../../assests/Donate/Kitchen-Garden.jpg" alt="img-1" width="400px"
                    height="300px" />
                <h1 class="list-item">Support Kitchen Gardens</h1>
                <p class="list-item">Give children sustainable nutrition</p>
            </div>
        </div>
    </div>
    <br>
    <div class="contact-us">
        <div class="content">
            <h2>Connect with Us</h2>
        </div>
        <div class="query">
            <div class="send-query">
                <form action="query-related.php" class="form" method="post">
                    <input type="text" class="name" placeholder="Name" name="name" required>
                    <input type="number" class="phone" placeholder="phone" name="phone" required>
                    <input type="email" class="email" placeholder="Email" name="email" required>
                    <select name="query-related" id="query-related" required>
                        <option value="Donation" selected>Donation</option>
                        <option value="Volunteering">Volunteering</option>
                        <option value="Join a campaign">Join a campaign</option>
                        <option value="Others">Others</option>
                    </select>
                    <textarea name="message" id="message" cols="2" rows="2" placeholder="Message" required></textarea>
                    <div class="submit">
                        <button class="submit-button-profile" type="submit" name="submit">Send Query</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>