<?php
session_start();
include("../../includes/db_connection.php");
if (!$_SESSION['id'] || !$_SESSION['name']) {
    header("location: ../login.php");
}
$eid = $_GET['eid'];
$select = mysqli_query($con, "SELECT * FROM events WHERE id = $eid");
$data = mysqli_fetch_array($select);
$event = $data['name'];
$pre = $data['prereg'];
$prereg = $data['prereg_approve'];
$upload = $data['upload_approve'];

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TEAM DASHBOARD</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <img src="../assets/img/sjclogo.jpg" height="50px">
                </div>
                <div class="sidebar-brand-text mx-3">INDEP 2K23</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">




        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">



                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['name']; ?></span>
                                <img class="img-profile rounded-circle" src="../assets/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?php echo $_SESSION['id'] > 12 ? $_SESSION['name'] . " - SHIFT 2" : $_SESSION['name'] . " - SHIFT 1";  ?></h1>
                    </div>


                    <?php
                    if ($pre == 1 && $prereg == 1) {

                    ?>
                        <div class="row">
                            <div class="col-lg-12 mb-4">
                                <!-- Project Card Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">INSTRUCTIONS</h6>
                                    </div>
                                    <div class="card-body">
                                        <ul style="font-size: 18px;">
                                            <li>If you want to add two or more songs, use a comma (,)</li>
                                            <li class="mt-2">The deadline to register the album and song is <span style="color: red; font-weight: bold;">on or before 6.12.2023 at 11:59pm.</span></li>
                                            <li class="mt-2">Audio file formats must be in MP3 and less than 5MB.</li>
                                            <li class="mt-2" style="color: red; font-weight: bold;">Tune is not mandatory.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-4">

                                <!-- Illustrations -->
                                <?php
                                if ($eid == 11 || $eid == 12 || $eid == 13) {
                                ?>
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary"><?php echo $event; ?> - REGISTRATION</h6>
                                        </div>
                                        <div class="card-body">
                                            <form method="POST" action="./backend/Pre_reg.php">
                                                <div class="table-responsive">
                                                    <table class="table table-borderless text-start align-middle mb-0">
                                                        <tbody>
                                                            <tr style="display: none;">
                                                                <td style="width:40%; font-weight:bolder;" class="text-primary"></td>
                                                                <td>
                                                                    <input type="text" name="eid" value="<?php echo $eid; ?>" class="form-control" style="width:100%;" required>
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td style="width:40%; font-weight:bolder;" class="text-primary">Name of the Album</td>
                                                                <td>
                                                                    <input type="text" name="album" placeholder="Name of the Album" class="form-control" style="width:100%;" required>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td style="width:40%; font-weight:bolder;" class="text-primary">Name of the Song</td>

                                                                <td>
                                                                    <input type="text" name="song" placeholder="Name of the Song" class="form-control" style="width:100%;" required>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td colspan=2 style="text-align:center;">
                                                                    <input type="submit" name="reg_submit" class="btn btn-primary " style="width:300px; margin:auto;" value="Submit">
                                                                </td>

                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                <?php
                                }
                                if ($eid == 17 || $eid == 18) {
                                ?>
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary"><?php echo $event; ?> - REGISTRATION</h6>
                                        </div>
                                        <div class="card-body">
                                            <form method="POST" action="./backend/Pre_upload.php" enctype="multipart/form-data">
                                                <div class="table-responsive">
                                                    <table class="table table-borderless text-start align-middle mb-0">
                                                        <tbody>
                                                            <tr style="display: none;">
                                                                <td style="width:20%; font-weight:bolder;" class="text-primary"></td>
                                                                <td>
                                                                    <input type="text" name="eid" value="<?php echo $eid; ?>" class="form-control" style="width:100%;" required>
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td style="width:20%; font-weight:bolder;" class="text-primary">Name of the Song</td>
                                                                <td>
                                                                    <input type="text" name="song" placeholder="Name of the Song" class="form-control" style="width:100%;" required>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td style="width:20%; font-weight:bolder;" class="text-primary">Tune</td>

                                                                <td>
                                                                    <input type="file" name="audio" class="form-control" style="width:100%;" accept=".mp3,audio/*">
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td colspan=2 style="text-align:center;">
                                                                    <input type="submit" name="music_submit" class="btn btn-primary " style="width:300px; margin:auto;" value="Submit">
                                                                </td>

                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                <?php
                                } ?>
                            </div>
                            <!-- Content Column -->

                        </div>
                    <?php
                    }
                    ?>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->

            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../database/Logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../assets/js/demo/chart-area-demo.js"></script>
    <script src="../assets/js/demo/chart-pie-demo.js"></script>

</body>

</html>