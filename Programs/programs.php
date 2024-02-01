<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programs</title>
    <link rel="stylesheet" href="../navbar/nav.css">
    <link rel="icon" href="../assests/Hope_Foundation_logo2.png" sizes="192X192" type="image/png">
    <link rel="stylesheet" href="programs.css">
</head>

<body>
    <!-- NavBar Load -->
    <div style="position: sticky; top: 0; background-color: #e88730; z-index: 1000">
        <?php require_once("../navbar/nav.php") ?>
    </div>

    <div class="header">
        <div class="programs">
            <h1 class="programs-topic-head">Our Programs</h1>
        </div>
        <div class="programs-topic-list">
            <div class="div-text">
                <h3 class="programs-head">
                    <ul>
                        <li type="disc">Programs for Animals:</li>
                    </ul>
                </h3>
                <div class="subtopics-div">
                    <div>
                        <div class="topics">
                            <h2 class="topics-head">Animal Rescue and Rehabilitation:</h2>
                            <p class="topics-paragraph">Rescuing and providing medical care for abused, abandoned,
                                or injured animals.
                                Rehabilitating animals and releasing them into suitable environments.</p>
                        </div>
                        <div class="topics">
                            <h2 class="topics-head">Animal Adoption Program:</h2>
                            <p class="topics-paragraph">Facilitating the adoption of homeless animals into loving
                                families.</p>
                        </div>
                        <div class="topics">
                            <h2 class="topics-head">Educational Outreach:
                            </h2>
                            <p class="topics-paragraph">Conducting awareness campaigns on responsible pet ownership,
                                animal welfare, and wildlife conservation.</p>
                        </div>
                        <div class="topics">
                            <h2 class="topics-head">Veterinary Care Clinics:
                            </h2>
                            <p class="topics-paragraph">Providing low-cost or free veterinary care for pets and stray
                                animals.</p>
                        </div>
                    </div>
                    <div class="image">
                        <img class="animal-image" src="../assests/Programs/Programs for Animals.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div id="line"></div>
        <div class="div-text">
            <h3 class="programs-head">
                <ul>
                    <li type="disc">Programs for Children:</li>
                </ul>
            </h3>
            <div class="subtopics-div">
                <div class="image">
                    <img class="animal-image" src="../assests/Programs/Programs for Children.jpg" alt="">
                </div>
                <div>
                    <div class="topics-right topics">
                        <h2 class="topics-head">Education and School Support:</h2>
                        <p class="topics-paragraph">Providing access to quality education for underprivileged children.
                            Offering tutoring, after-school programs, and scholarship opportunities.</p>
                    </div>
                    <div class="topics-right topics">
                        <h2 class="topics-head">Health and Nutrition Programs:
                        </h2>
                        <p class="topics-paragraph">Conducting health check-ups and nutritional programs for children in
                            need.</p>
                    </div>
                    <div class="topics-right topics">
                        <h2 class="topics-head">Orphanage and Foster Care Support:
                        </h2>
                        <p class="topics-paragraph">Supporting orphanages and foster care programs with resources and
                            funding.</p>
                    </div>
                    <div class="topics-right topics">
                        <h2 class="topics-head">Recreation and Skill Development:</h2>
                        <p class="topics-paragraph">Organizing recreational activities, sports events, and skill
                            development programs for children.</p>
                    </div>
                    <div class="topics-right topics">
                        <h2 class="topics-head">Medical Assurance
                        </h2>
                        <p class="topics-paragraph">Providing medical care and treatment for children with health
                            issues.</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="line"></div>
        <div class="div-text">
            <h3 class="programs-head">
                <ul>
                    <li type="disc">Programs for unprivileged Elders:</li>
                </ul>
            </h3>
            <div class="subtopics-div">
                <div>
                    <div class="topics">
                        <h2 class="topics-head">Housing and Shelter Support:
                        </h2>
                        <p class="topics-paragraph">Assisting individuals facing homelessness with temporary shelter and housing solutions.</p>
                    </div>
                    <div class="topics">
                        <h2 class="topics-head">Healthcare Access Program:</h2>
                        <p class="topics-paragraph">Facilitating access to healthcare services, including medical check-ups and treatments.</p>
                    </div>
                    <div class="topics">
                        <h2 class="topics-head">Social Integration and Inclusion:
                        </h2>
                        <p class="topics-paragraph">Promoting inclusivity and combating discrimination based on socio-economic status.</p>
                    </div>
                    <div class="topics">
                        <h2 class="topics-head">Community Development:</h2>
                        <p class="topics-paragraph">Implementing projects that improve the overall infrastructure and living conditions in impoverished areas.</p>
                    </div>
                    <div class="topics">
                        <h2 class="topics-head">Medical Assurance
                        </h2>
                        <p class="topics-paragraph">Providing medical care and treatment for children with health
                            issues.</p>
                    </div>
                </div>
                <div class="image">
                    <img class="animal-image" src="../assests/Programs/Programs for elder.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</body>

</html>