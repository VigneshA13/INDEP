<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("./components/tab.php"); ?>
    <link rel="stylesheet" href="./assets/css/header1.css">
    <link rel="stylesheet" href="./assets/css/navs.css">
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
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: Poppins;
        }

        .home-container {
            width: 100%;
            height: 60vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: whitesmoke;

        }

        .show {
            opacity: 1;
            transform: translateY(0);
            filter: blur(0);
        }

        .profile-card {
            position: relative;
            width: 220px;
            height: 360px;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: -5px 8px 45px rgba(51, 51, 51, 0.411);
            margin: 0 20px;
            opacity: .5;
            transition: all 1.5s;
            transform: translateY(40%);
            filter: blur(5px);
        }

        .show {
            opacity: 1;
            transform: translateY(0);
            filter: blur(0);
        }

        .profile-card .img {
            position: relative;
            width: 100%;
            height: 100%;
            transform: translateY(-70px);
        }

        .img img {
            object-fit: fill;
            width: 100%;
            transition: all .4s;
            z-index: 99;
        }

        .caption {
            text-align: center;
            transform: translateY(-90px);
            opacity: 1;
            pointer-events: all;
            transition: all .5s;
        }

        .caption h3 {
            font-size: 21px;
            color: #0c52a1;
            font-weight: 600;
        }

        .caption h4 {
            font-size: 15px;
            color: #0c52a1;
            font-weight: 600;
        }

        .caption p {
            font-size: 15px;
            font-weight: 500;
            margin: 2px 0 12px 0;
        }

        .caption .social-links i {
            font-size: 21px;
            margin: 0 3px;
            cursor: pointer;
            color: #0c52a1;
            transition: all .4s;
        }

        .title {

            text-align: center;
            font-weight: bold;
            color: #0c52a1;
        }

        .title h2 {
            font-family: Times New Roman, Times, serif;
            font-weight: bold;
        }

        #timers {
            display: none;

        }
    </style>
</head>

<body style="background-color: whitesmoke;">
    <?php include "Navbar.php" ?>
    <div class="title mt-5">
        <h2>Administrative Assistance</h2>
    </div>

    <div class="home-container">

        <div class="profile-card">
            <div class="img">
                <img src="./assets/images/john.jpeg">
            </div>
            <div class="caption">
                <h4>Rev.Dr.L.John Peter Arulanandam SJ</h4>
                <p>9486329686</p>
            </div>
        </div>
    </div>
    <div class="title mt-3">
        <h2>Event Related Assistance</h2>
    </div>
    <div class="home-container">

        <div class="profile-card">
            <div class="img">
                <img src="./assets/images/simi.jpg">
            </div>
            <div class="caption">
                <h3>Dr. A. Simi</h3>
                <p>9894520549</p>

            </div>
        </div>
        <div class="profile-card">
            <div class="img">
                <img src="./assets/images/vima.jpg">
            </div>
            <div class="caption">
                <h3>Dr. A. Vimal Jerald</h3>
                <p>9698111008</p>
            </div>
        </div>
    </div>
    <div class="title mt-5">
        <h2>Fine Arts Team</h2>
    </div>

    <div class="home-container">

        <div class="profile-card">
            <div class="img">
                <img src="./assets/images/img.jpg">
            </div>
            <div class="caption">
                <h3>Dhanush k</h3>
                <p>8610327538</p>
            </div>
        </div>
    </div>
    <?php include("./Footer.php"); ?>
</body>
<script>
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            console.log(entry)
            if (entry.isIntersecting) {
                entry.target.classList.add('show');
            } else {
                entry.target.classList.remove('show');
            }
        })
    })


    const hiddenElement = document.querySelectorAll('.profile-card');
    hiddenElement.forEach((el) => observer.observe(el))
</script>

</html>