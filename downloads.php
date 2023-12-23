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
    <style>
        #timers {
            display: none;
        }

        p i {
            color: blue;
            font-size: 2rem;
        }
    </style>
</head>

<body class="container-fluid px-0">
    <?php include("./Navbar.php"); ?>

    <div style="margin-top: 5%;">
        <div class="date_rem" style="font-family: Times New Roman, Times, serif;">

            <div class="title">
                <h2 style="font-weight: bold;">Downloads</h2>
            </div>
        </div>
        <div class="row m-5" style="margin: 0px 30px;justify-content: center;align-items: center; text-align:center;">

            <div id="date">
                <a href="./assets/down/Rules and regulations.pdf">
                    <div class="date-content">
                        <h1 class="date-h1" style="color: #0d6efd;">Rules & Regulations</h1>
                        <p class="date-p" style="color: black;"><i class="fa fa-cloud-download" aria-hidden="true"></i></p>
                    </div>
                </a>
            </div>

            <div id="date">
                <a href="./assets/down/Folk Dance_Variety.pdf">
                    <div class="date-content ">
                        <h1 class="date-h1" style="color: #0d6efd;">Folk Dance</h1>
                        <p class="date-p" style="color: black;"><i class="fa fa-cloud-download" aria-hidden="true"></i></p>
                    </div>
                </a>
            </div>

            <div id="date">
                <a href="./assets/down/Skit_Theme.pdf">
                    <div class="date-content">
                        <h1 class="date-h1" style="color: #0d6efd;">Skit Theme</h1>
                        <p class="date-p" style="color: black;"><i class="fa fa-cloud-download" aria-hidden="true"></i></p>
                    </div>
                </a>
            </div>
            <div id="date">
                <a href="./assets/down/Product_Adzup.pdf">
                    <div class="date-content">
                        <h1 class="date-h1" style="color: #0d6efd;">Product Adzup</h1>
                        <p class="date-p" style="color: black;"><i class="fa fa-cloud-download" aria-hidden="true"></i></p>
                    </div>
                </a>
            </div>
            <div id="date">
                <a href="./assets/down/Lots for events.pdf">
                    <div class="date-content">
                        <h1 class="date-h1" style="color: #0d6efd;">Lots for Events</h1>
                        <p class="date-p" style="color: black;"><i class="fa fa-cloud-download" aria-hidden="true"></i></p>
                    </div>
                </a>
            </div>
            <?php
            $select = mysqli_query($con, "SELECT * FROM registration where album = 'download'");
            if (mysqli_num_rows($select) > 0) {
                $i = 0;
                while ($Data = mysqli_fetch_array($select)) {
            ?>
                    <div id="date">
                        <a href="<?= $Data['teamreg_status'] ?>" target="_blank">
                            <div class="date-content">
                                <h1 class="date-h1" style="color: #0d6efd;"><?= $Data['file'] ?></h1>
                                <p class="date-p" style="color: black;"><i class="fa fa-cloud-download" aria-hidden="true"></i></p>
                            </div>
                        </a>
                    </div>
            <?php
                }
            }
            ?>
        </div>


        <?php include("./Footer.php"); ?>
    </div>

</body>


</html>