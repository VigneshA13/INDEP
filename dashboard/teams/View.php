<?php
session_start();
include("../../includes/db_connection.php");
if (!$_SESSION['id'] || !$_SESSION['name']) {
    header("location: ../login.php");
}
$reg = $_GET['reg'];
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
                    if ($reg == 1) {
                    ?>
                        <div class="row">

                            <div class="col-lg-12 mb-4">

                                <!-- Illustrations -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">DANCE EVENTS</h6>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" enctype="multipart/form-data">
                                            <div class="table-responsive">
                                                <table class="table table-borderless text-start align-middle mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <th>Name of the Event</th>
                                                            <th>Name of the Album</th>
                                                            <th>Name of the Song</th>
                                                            <th>Song</th>
                                                            <th>Status</th>
                                                        </tr>
                                                        <?php
                                                        $select1 = mysqli_query($con, "SELECT * FROM pre_registration WHERE teamid = " . $_SESSION['id']);
                                                        while ($data1 = mysqli_fetch_array($select1)) {

                                                            $song1 = explode("#", $data1['song']);
                                                            if ($data1['eventid'] > 10 && $data1['eventid'] < 14) {
                                                        ?>
                                                                <tr>
                                                                    <td style="width:30%; font-weight:bolder;" class="text-primary">
                                                                        <?php echo eventName($con, $data1['eventid']); ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php

                                                                        echo $data1['album'];
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $song1[0]; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                        $check1 = uploadCheck($con, $data1['eventid'], $data1['teamid']);
                                                                        if ($check1 != "-") {
                                                                        ?>
                                                                            <audio src="../<?= $check1 ?>" controls></audio>
                                                                        <?php
                                                                        } else {
                                                                            echo $check1;
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                        if (Status($con, $_SESSION['id'],  $data1['eventid']) == 1) {
                                                                            echo "<span style='color: green; font-weight: 900'>ACCEPTED</span>";
                                                                        } else {
                                                                            echo "<span style='color: orange; font-weight: 900'>PENDING</span>";
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                        <?php }
                                                        } ?>
                                                        <tr>
                                                            <td colspan=5 style="text-align:center;">
                                                                <a class="btn btn-primary mt-3 " href="./dashboard.php" style="width:300px; float: right;" value="Confirm">Back</a>

                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Content Column -->

                        </div>
                        <div class="row">

                            <div class="col-lg-12 mb-4">

                                <!-- Illustrations -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">MUSIC EVENT</h6>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" enctype="multipart/form-data">
                                            <div class="table-responsive">
                                                <table class="table table-borderless text-start align-middle mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <th>Name of the Event</th>
                                                            <th>Name of the Album</th>
                                                            <th>Name of the Song</th>
                                                            <th>Lyrics</th>
                                                            <th>Status</th>

                                                        </tr>
                                                        <?php
                                                        $select = mysqli_query($con, "SELECT * FROM pre_registration WHERE teamid = " . $_SESSION['id']);
                                                        while ($data = mysqli_fetch_array($select)) {
                                                            $song = explode("#", $data['song']);
                                                            $format = substr($data['album'], -3);
                                                            if ($data['eventid'] == 17 || $data['eventid'] == 18) {
                                                        ?>

                                                                <tr>
                                                                    <td style="width:30%; font-weight:bolder;" class="text-primary">
                                                                        <?php echo eventName($con, $data['eventid']); ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                        if ($format == "mp3" || $format == "MP3") {
                                                                        ?>
                                                                            <audio src="../<?= $data['album'] ?>" controls></audio>
                                                                        <?php
                                                                        } else {
                                                                            echo $data['album'];
                                                                        } ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $song[0]; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                        $check = uploadCheck($con, $data['eventid'], $data['teamid']);
                                                                        if ($check != "-") {

                                                                        ?>
                                                                            <a href="../<?= $check ?>" target="_blank" class="btn btn-primary">View Lyrics</a>
                                                                        <?php
                                                                        } else {
                                                                            echo $check;
                                                                        }
                                                                        ?>

                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                        if (Status($con, $_SESSION['id'], $data['eventid']) == 1) {
                                                                            echo "<span style='color: green; font-weight: 900'>ACCEPTED</span>";
                                                                        } else {
                                                                            echo "<span style='color: orange; font-weight: 900'>PENDING</span>";
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                        <?php }
                                                        } ?>
                                                        <tr>
                                                            <td colspan=5 style="text-align:center;">
                                                                <a class="btn btn-primary mt-3 " href="./dashboard.php" style="width:300px; float: right;" value="Confirm">Back</a>

                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Content Column -->

                        </div>
                        <div class="row">

                            <div class="col-lg-12 mb-4">

                                <!-- Illustrations -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">THEATER EVENT</h6>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" enctype="multipart/form-data">
                                            <div class="table-responsive">
                                                <table class="table table-borderless text-start align-middle mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <th>Name of the Event</th>
                                                            <th>Script</th>
                                                            <th>Uploaded Date And Time</th>
                                                            <th>Status</th>
                                                        </tr>
                                                        <?php
                                                        $select3 = mysqli_query($con, "SELECT * FROM uploads WHERE (eventid = 14 OR eventid = 15) AND teamid = " . $_SESSION['id']);

                                                        while ($data3 = mysqli_fetch_array($select3)) {
                                                        ?>

                                                            <tr>
                                                                <td style="width:30%; font-weight:bolder;" class="text-primary">
                                                                    <?php echo eventName($con, $data3['eventid']); ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    $check3 = uploadCheck($con, $data3['eventid'], $data3['teamid']);
                                                                    if ($check3 != "-") {
                                                                    ?>
                                                                        <a href="../<?= $check3 ?>" target="_blank" class="btn btn-primary">View Script</a>
                                                                    <?php
                                                                    } else {
                                                                        echo $check3;
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo  $data3['upload_date']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    if (Status($con, $_SESSION['id'], $data3['eventid']) == 1) {
                                                                        echo "<span style='color: green; font-weight: 900'>ACCEPTED</span>";
                                                                    } else {
                                                                        echo "<span style='color: orange; font-weight: 900'>PENDING</span>";
                                                                    }
                                                                    ?>
                                                                </td>

                                                            </tr>
                                                        <?php
                                                        } ?>
                                                        <tr>
                                                            <td colspan=4 style="text-align:center;">
                                                                <a class="btn btn-primary mt-3 " href="./dashboard.php" style="width:300px; float: right;" value="Confirm">Back</a>

                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Content Column -->

                        </div>
                        <div class="row">

                            <div class="col-lg-12 mb-4">

                                <!-- Illustrations -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">INDEP DIRECTOR</h6>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" enctype="multipart/form-data">
                                            <div class="table-responsive">
                                                <table class="table table-borderless text-start align-middle mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <th>Name of the Event</th>
                                                            <th>Link</th>
                                                            <th>Uploaded Date And Time</th>
                                                            <th>Status</th>
                                                        </tr>
                                                        <?php
                                                        $select4 = mysqli_query($con, "SELECT * FROM pre_registration WHERE eventid = 8 AND teamid = " . $_SESSION['id']);

                                                        $data4 = mysqli_fetch_array($select4);
                                                        $rows = mysqli_num_rows($select4);
                                                        if ($rows == 1) {
                                                        ?>

                                                            <tr>
                                                                <td style="width:30%; font-weight:bolder;" class="text-primary">
                                                                    <?php echo eventName($con, $data4['eventid']); ?>
                                                                </td>
                                                                <td>

                                                                    <a href="<?= $data4['album']; ?>" target="_blank" class="btn btn-primary">Watch</a>

                                                                </td>
                                                                <td>
                                                                    <?php echo  $data4['reg_date']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    if (Director($con, $_SESSION['id'], $data4['eventid']) == 1) {
                                                                        echo "<span style='color: green; font-weight: 900'>ACCEPTED</span>";
                                                                    } else {
                                                                        echo "<span style='color: orange; font-weight: 900'>PENDING</span>";
                                                                    }
                                                                    ?>
                                                                </td>

                                                            </tr>
                                                        <?php
                                                        } ?>
                                                        <tr>
                                                            <td colspan=4 style="text-align:center;">
                                                                <a class="btn btn-primary mt-3 " href="./dashboard.php" style="width:300px; float: right;" value="Confirm">Back</a>

                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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
<?php
function eventName($con, $Eid)
{
    $select8 = mysqli_query($con, "SELECT * FROM events WHERE id = $Eid");
    $data8 = mysqli_fetch_array($select8);
    return $data8['name'];
}

function uploadCheck($con, $eventid, $teamid)
{
    $select6 = mysqli_query($con, "SELECT * FROM uploads WHERE eventid = $eventid AND teamid = $teamid");
    $data6 = mysqli_fetch_array($select6);

    if (isset($data6['url']) && strlen($data6['url']) > 3) {
        return $data6['url'];
    }

    return  "-";
}
function urlCheck($con, $eventid, $teamid)
{
    $select7 = mysqli_query($con, "SELECT * FROM pre_registration WHERE eventid = $eventid AND teamid = $teamid");
    $data7 = mysqli_fetch_array($select7);

    if (isset($data7['album']) && strlen($data7['album']) > 3) {
        return $data7['album'];
    }

    return  "-";
}

function Status($con, $teamid, $eventid)
{
    $select10 = mysqli_query($con, "SELECT * FROM uploads WHERE eventid = $eventid AND teamid = $teamid");
    $fetchs = mysqli_fetch_array($select10);
    if (isset($fetchs['status'])) {
        return $fetchs['status'];
    }

    return 0;
}
function Director($con, $teamid, $eventid)
{
    $select11 = mysqli_query($con, "SELECT * FROM pre_registration WHERE eventid = $eventid AND teamid = $teamid");
    $fetchs1 = mysqli_fetch_array($select11);
    if (isset($fetchs1['status'])) {
        return $fetchs1['status'];
    }

    return 0;
}
?>