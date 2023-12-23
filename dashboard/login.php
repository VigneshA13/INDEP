<?php
session_start();
include("../includes/db_connection.php");
include("./database/Alert.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .fancy {
            @supports (background-clip: text) or (-webkit-background-clip: text) {
                background-image:
                    url("assets/img/bg.jpg");
                background-size: 110% auto;
                background-position: center;
                color: transparent;
                -webkit-background-clip: text;
                background-clip: text;

            }
        }

        .mobile-no-wrap {
            white-space: nowrap;
            /* Prevent text from wrapping on mobile */
        }

        .fancy {
            font-size: 2em;
            /* Adjust the font size as needed */
            font-weight: bold;
            /* Adjust the font weight as needed */
            letter-spacing: 4px;
            /* Adjust the letter spacing as needed */
            /* Add any additional styles you want for "INDEP 2K23" here */
        }

        @media (max-width: 281px) {

            .fancy {
                font-size: 1.3em;
                /* Adjust the font size as needed */
                font-weight: bold;
                /* Adjust the font weight as needed */
                letter-spacing: 2px;
                /* Adjust the letter spacing as needed */
                /* Add any additional styles you want for "INDEP 2K23" here */
            }
        }
    </style>

</head>

<body class="bg-gradient" style="background-color: #bcd5ff59;">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center mt-5">

            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="d-flex align-items-center justify-content-center">

                    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-6">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">

                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <!--<div class="image-container">
                                        <img src="img/sjcbanner.png" alt="Banner Image">
                                    </div>-->
                                            <img src="assets/img/banner.jpg" width="100%">
                                            <div class="mobile-no-wrap"><span class="fancy" style="width:100%">INDEP 2K23</span></div>
                                            <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                        </div>
                                        <form class="user" action="LoginBackend.php" method="POST">
                                            <div class="form-group">
                                                <input type="text" name="user" oninput="convertToUppercase(this)" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="USER ID" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" required>
                                            </div>

                                            <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
                                                Login
                                            </button>

                                        </form>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>
    <script>
        function convertToUppercase(input) {
            input.value = input.value.toUpperCase();
        }
    </script>

</body>

</html>