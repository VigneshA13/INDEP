<?php
include("./includes/db_connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("./components/tab.php"); ?>
    <link rel="stylesheet" href="./assets/css/header1.css">
    <link rel="stylesheet" href="./assets/css/navs.css">
    <link rel="stylesheet" href="./assets/css/coundown.css">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=BIZ+UDPGothic&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Aboreto&display=swap" rel="stylesheet">
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />
    <!-- MDB -->

</head>

<body class="container-fluid px-0">
    <?php include("./Navbar.php"); ?>
    <div class="row mt-5 m-0 px-0 w-100" id="notification2">
        <div class="col-12 col-sm-3 " id="notice2">
            <div class="mt-2 border-bottom border-light-subtle">
                <p class="text-center p-2 m-0 fw-bolder fs-4 text-white ">Announcements</p>
            </div>
            <marquee class="marquee" direction="up" style="height: 300px; " scrollamount=4>

                <?php
                $notice = mysqli_query($con, "SELECT * FROM registration where album = 'notice'");
                if (mysqli_num_rows($notice) > 0) {
                    $i = 0;
                    while ($noticeData = mysqli_fetch_array($notice)) {
                        $i++;
                        if ($i % 2 != 0) {
                ?>
                            <div class="mt-2 p-2" style="white-space: normal; ">
                                <?php if ($noticeData['teamid'] == 1) {
                                ?>
                                    <a href="<?= $noticeData['teamreg_status'] ?>" target="_blank" class="ms-3 fw-bolder fs-6 " style="color: yellow; margin: 0px; ">
                                        <?= $noticeData['file'];
                                        if ($noticeData['eventid'] == 1) {
                                        ?>
                                            <img src="./assets/images/new.gif" alt="new" height="25px" width="50px">
                                        <?php } ?>
                                    </a>
                                <?php
                                } elseif ($noticeData['teamid'] == 0) { ?>
                                    <p class="ms-3 fw-bolder fs-6 " style="color: yellow; margin: 0px; ">
                                        <?= $noticeData['file'];
                                        if ($noticeData['eventid'] == 1) {
                                        ?>
                                            <img src="./assets/images/new.gif" alt="new" height="25px" width="50px">
                                        <?php } ?>
                                    </p>
                                <?php } ?>
                            </div>
                        <?php
                        } elseif ($i % 2 == 0) {
                        ?>
                            <div class="mt-2 p-2" style="white-space: normal; ">
                                <?php if ($noticeData['teamid'] == 1) {
                                ?>
                                    <a href="<?= $noticeData['teamreg_status'] ?>" target="_blank" class="ms-3 fw-bolder fs-6 " style="color: white; margin: 0px;">
                                        <?= $noticeData['file'];
                                        if ($noticeData['eventid'] == 1) {
                                        ?>
                                            <img src="./assets/images/new.gif" alt="new" height="25px" width="50px">
                                        <?php } ?>
                                    </a>
                                <?php } elseif ($noticeData['teamid'] == 0) { ?>
                                    <p class="ms-3 fw-bolder fs-6 " style="color: white; margin: 0px;">
                                        <?= $noticeData['file'];
                                        if ($noticeData['eventid'] == 1) {
                                        ?>
                                            <img src="./assets/images/new.gif" alt="new" height="25px" width="50px">
                                        <?php } ?>
                                    </p>
                                <?php } ?>
                            </div>
                <?php
                        }
                    }
                }
                ?>

            </marquee>
        </div>
    </div>
    <div style="margin-top: 5%;">
        <section class="text-center">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg col-md-6 mb-5 mb-md-0 position-relative">
                        <div class="details text-left ">
                            <h1 class="text-indep fw-bolder">INDEP - <span>Inter Departmental Cultural Events</span></h1>
                            <p class="indep-text">&emsp;&emsp;&emsp;&emsp;For every Josephite, <span class="indepcolor">INDEP</span> is an event that is ever cherishing or
                                memorable in his/her life. INDEP is expanded as Inter Departmental Cultural Events. It is a cultural extravaganza where more
                                than 1500 students take part in various cultural or literary events. It is organized by the students under the able guidance of Professors. INDEP enables the students to
                                develop their extra-curricular skills also leadership and organizing skills. </p>
                            <p class="indep-text">&emsp;&emsp;&emsp;&emsp;<span class="indepcolor">INDEP</span> is conducted among the Departments both shift I and Shift II to bring out healthy competition.</p>
                        </div>
                    </div>
                    <div class="col-lg col-md-6 mb-5 mb-md-5 mb-lg-0 position-relative">
                        <div class="img"><img src="./assets/images/logo_new.jpg" style="height: 50vh;"></div>
                    </div>


                </div>
            </div>
        </section>
        <div class="date_rem" style="font-family: Times New Roman, Times, serif;">
            <h3>DATES TO REMEMBER</h3>
        </div>
        <div class="row mt-3" style="margin: 0px 30px;justify-content: center;align-items: center; text-align:center;">
            <?php
            $selectDate = mysqli_query($con, "SELECT * FROM registration where album = 'date' ORDER BY upload_date");
            if (mysqli_num_rows($selectDate) > 0) {
                while ($fetchDate = mysqli_fetch_array($selectDate)) {
                    $formattedDate = date("d-m-Y", strtotime($fetchDate['upload_date']));
            ?>
                    <div id="date">
                        <div class="date-content">
                            <h1 class="date-h1" style="color: #0d6efd;"><?= $formattedDate; ?></h1>
                            <p class="date-p" style="color: black;"><?= $fetchDate['file']; ?></p>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>

        <div>

            <div class="instruction p-5" style="font-family: Times New Roman, Times, serif; border-radius: 20px; margin: 0px; margin-top: 2%;">
                <h1 class="instruction_head" style="font-weight: bold;">Greetings from the Fine Arts Association!</h1>

                <p class="instruction_head2 fs-5">&emsp;&emsp;We take pleasure in presenting you with the Rules and Regulations for INDEP 2023. We request the Heads of the Departments, the Team in-charges, and the secretaries to take initiative in selecting the ‘Team’ to represent their departments.</p>

                <h2 class="instruction_h2">Rules and Regulations:</h2>

                <ol class="instruction_ol " style="padding: 40px;">
                    <li class="instruction_li fs-5">The final registration of participants should be done online on or before 05:00 p.m, 09-12-2023 (Off-stage events) and 13-12-2023 (On-stage events)</li>
                    <li class="instruction_li fs-5">Only one team should represent their department for group events. The teams will participate in the order of lots drawn for the events. Only the Presidents or Secretaries of the Departments are allowed for drawing the lots. The teams which do not participate in any event after drawing lots will lose 2 Points.</li>
                    <li class="instruction_li fs-5">One student can participate in a maximum of FOUR (04) events only.</li>
                    <li class="instruction_li fs-5">Other than the registered participant appearing for events without any prior notice at the registration desk, the team concerned will be DISQUALIFED. In general, replacements of participants are not permitted. In an emergency, the Team Manager of the particular Teams may get permission from the Coordinator of Fine Arts Assn. Dr Simi (98945 20549) for the replacement in writing.</li>
                    <li class="instruction_li fs-5">Participants should produce their IDENTITY CARDS before each event for scrutiny. They must be present at the backstage immediately after the first announcement of the events. The submitted ID cards should be collected once after the the performance by the respective team.</li>
                    <li class="instruction_li fs-5">If a team doesn’t turn up even after three consecutive calls, the team concerned will be DISQUALIFIED from the event and it may lead to a loss of TWO POINTS. No second chance will be given at any cost.</li>
                    <li class="instruction_li fs-5">No prizes will be given to the accompanists. Accompanists should only be students of our college. Accompanists from other departments of our college are allowed. They should produce ID card for scrutiny.</li>
                    <li class="instruction_li fs-5">No outside Choreographers / Makeup Artists are allowed. If any team found fixing them, the team will be disqualified for the event concern.</li>
                    <li class="instruction_li fs-5">Boys and girls should avoid close proximity to each other during the performance on stage.</li>
                    <li class="instruction_li fs-5">Points: 1st Place: 5 Pts, 2nd Place: 3 Pts, 3rd Place: 1 Pt. (Judges’ decision will be final)</li>
                    <li class="instruction_li fs-5">Each Department will be given Rs.2000/- to meet the expenses related to arrangements, including refreshments <a href="./js/indep.php">.</a></li>
                </ol>

            </div>
        </div>
        <?php include("./Footer.php"); ?>
    </div>

</body>
<script>
    //marquee start
    document.addEventListener('DOMContentLoaded', function() {
        const marquee = document.querySelector('.marquee');

        marquee.addEventListener('mouseover', function() {
            marquee.stop();
        });

        marquee.addEventListener('mouseout', function() {
            marquee.start();
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const marquee = document.querySelector('.marquee2');

        marquee.addEventListener('mouseover', function() {
            marquee.stop();
        });

        marquee.addEventListener('mouseout', function() {
            marquee.start();
        });
    });
</script>

</html>