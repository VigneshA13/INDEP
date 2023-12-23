<?php
session_start();
include("../../includes/db_connection.php");
include("../database/Alert.php");
if (!$_SESSION['id'] || !$_SESSION['name']) {
    header("location: ../login.php");
}

$team = mysqli_query($con, "SELECT * FROM team WHERE id = " . $_SESSION['id']);
$teamData = mysqli_fetch_array($team);
if ($teamData['Mname'] == null) {
    header("location: components/Details.php");
}

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

                    <div class="row">
                        <?php
                        $teamSql = mysqli_query($con, "SELECT * FROM events WHERE id <= 10  AND team_approve = 1 ");
                        $teamCount = mysqli_num_rows($teamSql);
                        if ($teamCount > 0) {
                        ?>
                            <div class="col-xl-4 col-md-7 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                                    <span> Off STAGE EVENTS - REGISTRATION<img src="../assets/images/new.gif" alt="new" height="25px" width="50px">
                                                    </span>
                                                </div>
                                                <div class="h5 mt-2 mb-0 font-weight-bold text-gray-800">
                                                    <a href="./participants/dashboard.php" class="btn btn-primary"> CLICK HERE</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>
                        <div class="col-xl-4 col-md-7 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                                <span> Off STAGE EVENTS
                                                </span>
                                            </div>
                                            <div class="h5 mt-2 mb-0 font-weight-bold text-gray-800">
                                                <a href="./viewLots.php?stage=0" class="btn btn-primary"> VIEW LOTS</a>
                                                <?php
                                                if ($teamCount <= 0) {
                                                ?>
                                                    <a href="./participants/view.php?reg=0" class="btn btn-primary"> VIEW PARTICIPANTS</a>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                        $teamSql = mysqli_query($con, "SELECT * FROM events WHERE id>10 AND team_approve = 1 ");
                        $teamCount1 = mysqli_num_rows($teamSql);
                        if ($teamCount1 > 0) {


                        ?>
                            <div class="col-xl-4 col-md-7 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                                    <span> On STAGE EVENTS - REGISTRATION<img src="../assets/images/new.gif" alt="new" height="25px" width="50px">
                                                    </span>
                                                </div>
                                                <div class="h5 mt-2 mb-0 font-weight-bold text-gray-800">
                                                    <a href="./participants/dashboard1.php" class="btn btn-primary"> CLICK HERE</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php
                        }
                        $teamSql1 = mysqli_query($con, "SELECT * FROM lot WHERE eventid>10");
                        $teamCount2 = mysqli_num_rows($teamSql1);
                        if ($teamCount2 > 0) {
                            $eventsReg = mysqli_query($con, "SELECT * FROM events WHERE team_approve = 1 AND stage = 1");
                        ?>

                            <div class="col-xl-4 col-md-7 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                                    <span> On STAGE EVENTS
                                                    </span>
                                                </div>
                                                <div class="h5 mt-2 mb-0 font-weight-bold text-gray-800">
                                                    <a href="./viewLots.php?stage=1" class="btn btn-primary"> VIEW LOTS</a>
                                                    <?php
                                                    if (mysqli_num_rows($eventsReg) <= 0) {
                                                    ?>
                                                        <a href="./participants/view.php?reg=1" class="btn btn-primary"> VIEW PARTICIPANTS</a>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } ?>
                    </div>


                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">ON STAGE EVENTS
                                        <?php if (view($con, $_SESSION['id']) > 0) { ?>
                                            <a href="View.php?reg=1" class="btn btn-primary btn-icon-split" style="float: right; right: 0px; width: 150px;">
                                                <span class="text">View </span>
                                            </a>
                                        <?php } ?>
                                    </h6>

                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <?php
                                            $i = 0;
                                            $events = mysqli_query($con, "SELECT * FROM events WHERE(prereg = 1 OR upload = 1) AND (prereg_approve = 1 OR upload_approve = 1) AND stage = 1");
                                            while ($eventName = mysqli_fetch_assoc($events)) {

                                                $i++;
                                            ?>
                                                <tr>
                                                    <td sr><?php echo $i; ?></td>
                                                    <td><?php echo $eventName['name']; ?></td>
                                                    <?php
                                                    $eventID = $eventName['id'];
                                                    $teamID = $_SESSION['id'];
                                                    $count = mysqli_query($con, "SELECT * FROM pre_registration WHERE eventid = $eventID AND  teamid = $teamID");
                                                    $counts = mysqli_num_rows($count);
                                                    $count2 = mysqli_query($con, "SELECT * FROM uploads WHERE eventid = $eventID AND  teamid = $teamID");
                                                    $counts2 = mysqli_num_rows($count2);
                                                    if ($counts >= 1 && $counts2 != 1 && $eventName['prereg'] == 1 && $eventName['upload'] == 1) {

                                                    ?>
                                                        <td>
                                                            <a href="uploadFile.php?eid=<?php echo $eventName['id'];  ?>" class="btn btn-primary btn-icon-split" style="width: 150px;">
                                                                <span class="text">Upload</span>
                                                            </a>
                                                        </td>
                                                    <?php } else if ($counts == 1 && $counts2 == 1 && $eventName['prereg'] == 1 && $eventName['upload'] == 1) {
                                                    ?>
                                                        <td>
                                                            <button href="#" id="myLink" class="btn btn-success btn-icon-split" style="width: 150px;" disabled>
                                                                <span class="text">Completed</span>
                                                            </button>
                                                        </td>
                                                    <?php
                                                    } else if ($eventName['prereg'] == 0 && $eventName['upload'] == 1 && $counts2 != 1) {
                                                    ?>
                                                        <td>
                                                            <a href="uploadFile.php?eid=<?php echo $eventName['id'];  ?>" class="btn btn-primary btn-icon-split" style="width: 150px;">

                                                                <span class="text">Upload</span>
                                                            </a>
                                                        </td>
                                                    <?php
                                                    } else if ($eventName['prereg'] == 0 && $eventName['upload'] == 1 && $counts2 == 1) {
                                                    ?>
                                                        <td>
                                                            <button href="#" id="myLink" class="btn btn-success btn-icon-split" style="width: 150px;" disabled>
                                                                <span class="text">Completed</span>
                                                            </button>
                                                        </td>
                                                    <?php
                                                    } else { ?>

                                                        <td>
                                                            <a href="PreEventRegistration.php?eid=<?php echo $eventName['id'];  ?>" style="width: 150px;" class="btn btn-primary btn-icon-split">
                                                                <span class="text">Register</span>
                                                            </a>
                                                        </td>
                                                    <?php } ?>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                            <tr>
                                                <td></td>
                                                <td>INDEP DIRECTOR</td>
                                                <?php
                                                $dir = mysqli_query($con, "SELECT * FROM pre_registration WHERE eventid = 8 AND teamid = " . $_SESSION['id']);
                                                if (mysqli_num_rows($dir) < 1) {
                                                ?>
                                                    <td>
                                                        <a href="uploadFile.php?eid=8" class="btn btn-primary btn-icon-split" style="width: 150px;">
                                                            <span class="text">Add Link</span>
                                                        </a>
                                                    </td>
                                                <?php
                                                } else {
                                                ?>
                                                    <td>
                                                        <button href="#" id="myLink" class="btn btn-success btn-icon-split" style="width: 150px;" disabled>
                                                            <span class="text">Completed</span>
                                                        </button>
                                                    </td>
                                                <?php
                                                }
                                                ?>

                                            </tr>

                                        </table>
                                    </div>
                                </div>
                            </div>



                        </div>


                    </div>

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
    <script>
        document.getElementById('myLink').setAttribute('disabled', true);
    </script>

</body>

</html>

<?php
function check($con, $Did, $Eid)
{
    $select = mysqli_query($con, "SELECT * FROM pre_registration WHERE teamid = $Did AND eventid = $Eid");
    $row = mysqli_fetch_row($select);

    return $row;
}
function uploadCheck($con, $Did, $Eid)
{
    $select = mysqli_query($con, "SELECT * FROM uploads WHERE teamid = $Did AND eventid = $Eid");
    $row = mysqli_fetch_row($select);

    return $row;
}
function view($con, $Did)
{
    $select = mysqli_query($con, "SELECT * FROM pre_registration WHERE teamid = $Did");
    $row = mysqli_fetch_row($select);

    return $row;
}
function validate($con, $eventid, $teamid)
{
    $select = mysqli_query($con, "SELECT * FROM pre_registration WHERE eventid = $eventid AND teamid = $teamid");
    $row = mysqli_fetch_row($select);

    return $row;
}
?>