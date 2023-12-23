<?php
session_start();
include("../../../includes/db_connection.php");
if (!$_SESSION['id'] || !$_SESSION['name']) {
    header("location: ../../login.php");
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
    <link href="../../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon">
                    <img src="../../assets/img/sjclogo.jpg" height="50px">
                </div>
                <div class="sidebar-brand-text mx-3">INDEP 2K23</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../dashboard.php">
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
                                <img class="img-profile rounded-circle" src="../../assets/img/undraw_profile.svg">
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





                    <!-- Content Row -->
                <div class="row">
                    <?php 
                    

                    
                    $teamID = $_SESSION['id'];
                    $lot1=mysqli_query($con,"select * from lot where teamid=$teamID and eventid<=10");
                    $lotno1 = mysqli_num_rows($lot1);
                    if($lotno1>0){

                    
                    ?>
                    <div class="col-lg mb-4">
                
                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">OFF STAGE EVENTS</h6>
                                    <?php if (view($con, $_SESSION['id']) > 0) { ?>
                                            <a href="view.php?reg=0" class="btn btn-primary btn-icon-split" style="float: right;">
                                                <span class="text">View </span>
                                            </a>
                                        <?php } ?>
                                </div>
                               
                                
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                        <?php 
                                            $sql="SELECT * FROM events where stage=0";
                                            $result=$con->query($sql);
                                           if($result->num_rows > 0){
                                                while($row = $result->fetch_assoc()){
                                                    $eventID=$row['id'];
                                                    $teamID = $_SESSION['id'];
                                                    $lot=mysqli_query($con,"select * from lot where eventid=$eventID and teamid=$teamID");
                                                    $lotno = mysqli_num_rows($lot);
                                                    $result01=mysqli_query($con, "SELECT * FROM participants WHERE eventid = $eventID AND  teamid = $teamID");
                                                    $result2 = mysqli_num_rows($result01);
                                                    if($lotno>0){
                                                    if($result2 <=0){
                                                        echo "<tr><td>";
                                                        echo $row['id'] ."</td>";
                                                        echo "<td>". $row['name'] ."</td>";
                                                        echo "<td> <a class='btn btn-primary btn-icon-split' href=EventRegistration.php?eid=".  $row['id'].  ">";
                                                        echo "<span class=\"text\">Register</span></a></td>";
                                                    }else{
                                                        echo "<tr><td>";
                                                        echo $row['id'] ."</td>";
                                                        echo "<td>". $row['name'] ."</td>";
                                                        echo "<td> <a class='btn btn-success btn-icon-split'>";
                                                        echo "<span class=\"text\">Completed</span></a></td>";
                                                    }
                                                    }
                                                    
                                                    
                                                }
                                            }
                                            ?>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            </div>
                                            <?php
                                            }
                                            ?>
                        <!-- Content Column -->
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
                    <a class="btn btn-primary" href="../../database/Logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../assets/js/demo/chart-area-demo.js"></script>
    <script src="../../assets/js/demo/chart-pie-demo.js"></script>

</body>
<?php 

function view($con, $Did)
{
    $teamID = $_SESSION['id'];
    $select = mysqli_query($con, "SELECT * FROM participants WHERE teamid = $teamID");
    $row = mysqli_fetch_row($select);

    return $row;
}
?>
</html>