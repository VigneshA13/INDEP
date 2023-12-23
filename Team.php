<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php include("./components/tab.php"); ?>
    <link rel="stylesheet" href="./assets/css/style.css" />
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/navs.css">

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

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .contain {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        .shift-container {
            padding: 20px;
            width: 40%;
            margin: 10px;
            /* Adjust as needed */
            margin-bottom: 20px;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .shift {

            padding: 30px;
        }

        h2 {
            color: #333;
            justify-content: center;
            display: flex;
            font-size: 1.5rem;
            margin-bottom: 1rem;
            font-weight: bolder;
        }

        ol {
            padding: 0;
        }

        .team li {
            margin-bottom: 8px;
            color: #666;
            font-size: 1.1em;
            font-weight: bolder;
            margin: 20px;
        }

        @media (max-width: 768px) {
            .contain {
                flex-direction: column;
                align-items: center;
            }

            .shift-container {
                width: 80%;
                height: 100%;
            }
        }
        .heading {
            text-align: center;
            margin: 2%;
            font-weight: bold;
            color: #4689e8;
        }
    </style>
    <title>Subject List</title>
</head>


<body>
    <?php include "Navbar.php" ?>
    <div>
        <h1 class="heading ">INDEP - 2k23 TEAMS</h1>
    </div>
    <div class="contain">
        <div class="shift-container">
            <div class="shift" id="shift1">
                <h2>SHIFT I</h2>
                <ol class="team">
                    <li>Botany</li>
                    <li>Chemistry</li>
                    <li>Commerce</li>
                    <li>Computer Science</li>
                    <li>Economics</li>
                    <li>English</li>
                    <li>HRM</li>
                    <li>History</li>
                    <li>Mathematics</li>
                    <li>Physics</li>
                    <li>Statistics</li>
                    <li>Tamil</li>
                </ol>
            </div>
        </div>

        <div class="shift-container">
            <div class="shift" id="shift2">
                <h2>SHIFT II</h2>
                <ol class="team">
                    <li>Bio-Chemistry & Bio-Technology</li>
                    <li>Business Administration (BBA)</li>
                    <li>Commerce CA</li>
                    <li>Data Sci. & Chemistry</li>
                    <li>Commerce</li>
                    <li>Counselling Psychology & B.Com. Honours</li>
                    <li>Computer Science</li>
                    <li>Information Technology</li>
                    <li>Electronics</li>
                    <li>English</li>
                    <li>Mathematics</li>
                    <li>Physics</li>
                    <li>B.Voc SD & SA</li>
                    <li>B.Voc Visom & Vis.com Tech</li>
                </ol>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <?php include("./Footer.php"); ?>
</body>

</html>