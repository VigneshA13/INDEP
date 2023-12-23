<?php
session_start();
include("./includes/db_connection.php");
include("./dashboard/database/Alert.php");
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Varela+Round&display=swap');

        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        section {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        h2 {
            color: #333;
        }

        .quest-sec {
            gap: 10px;
            margin-top: 15px;
        }

        .int,
        #quest {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        #quest {
            resize: vertical;
        }

        .info-icon {
            color: #007bff;
            margin-left: 5px;
            cursor: pointer;
        }

        .btn-container {
            display: flex;
            justify-content: flex-end;
        }

        .btn {
            font-size: 1.2rem;
            color: white;
            background-color: #2d8ff7;
        }

        input {
            font-family: 'Varela Round';
            font-size: 1.1rem;
        }

        #timers {
            display: none;
        }

        textarea {
            font-size: 1.5rem;
        }
    </style>
</head>

<body class="container-fluid px-0">
    <?php include("./Navbar.php"); ?>

    <div style="margin-top: 5%;">
        <div class="date_rem" style="font-family: Times New Roman, Times, serif;">

            <div class="title">
                <h2 style="font-weight: bold;">QUESTION FOR CHIEF GUEST</h2>
            </div>
        </div>


        <section class="container ">
            <h2 style="font-family: 'Josefin Sans';">Post your Question</h2>
            <form method="post" action="./questionBackend.php" onsubmit="return validateForm()" class="d-flex flex-column p-3">
                <div class="quest-sec p-2">

                    <input name="name" class="int" type="text" placeholder="Your Name" required>
                    <input name="dno" class="int" type="text" placeholder="Your D.No" required>

                    <select name="class" class="int">
                        <option value="">Select Class</option>
                        <?php
                        $select = mysqli_query($con, "SELECT * FROM classes");
                        while ($fetch = mysqli_fetch_array($select)) {
                        ?>
                            <option value="<?= $fetch['id'] ?>"><?= $fetch['class'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <label for="quest" class="info">
                        Please Enter your Question in Tamil.
                        <i class="fas fa-info-circle info-icon" data-toggle="tooltip" data-placement="top" title="Please Enter your Question in Tamil."></i>
                    </label>

                    <textarea name="question" id="quest" placeholder="Your Question" cols="30" rows="5" lang="ta" dir="auto" required></textarea>
                    <div class="btn-container">
                        <input type="submit" name="submit" class="btn" value="submit">
                    </div>
                </div>
            </form>
        </section>
        <!-- Include Bootstrap JS (optional) -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <!-- Include Font Awesome JS (optional) -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>

        <script>
            // Enable Bootstrap tooltip
            $(function() {
                $('[data-toggle="tooltip"]').tooltip()
            });

            function validateForm() {
                var tamilRegex = /^[\u0B80-\u0BFF\s!"#$%&'()*+,-./:;<=>?@[\]^_{|}~]+/; // Tamil Unicode range

                var questionInput = document.getElementById('quest').value;


            }
        </script>


        <?php include("./Footer.php"); ?>
    </div>

</body>


</html>