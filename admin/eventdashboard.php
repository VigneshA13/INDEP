<?php
session_start();
include('../includes/db_connection.php');
if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {
    $side = $_SESSION['admin'];
    $active = 0;
    $id = $_SESSION['aid'];
    $name = $_SESSION['admin_name'];
    $eventid = $_GET['events'];

    $details = mysqli_query($con, " SELECT * FROM events where id='$eventid' ");
    $events = mysqli_fetch_array($details);
    $status1 = $events['prereg_approve'];

    if (isset($_POST['btn1'])) {
        if ($status1 == 0) {
            $status1 = 1;
        } else {
            $status1 = 0;
        }
        mysqli_query($con, "update events set prereg_approve='$status1' where id='$eventid' ");
        header('Location: events.php?events=' . $eventid);
    }

    $status2 = $events['upload_approve'];

    if (isset($_POST['btn2'])) {
        if ($status2 == 0) {
            $status2 = 1;
        } else {
            $status2 = 0;
        }
        mysqli_query($con, "update events set upload_approve='$status2' where id='$eventid' ");
        header('Location: events.php?events=' . $eventid);
    }

    $status3 = $events['team_approve'];

    if (isset($_POST['btn3'])) {
        if ($status3 == 0) {
            $status3 = 1;
        } else {
            $status3 = 0;
        }
        mysqli_query($con, "update events set team_approve='$status3' where id='$eventid' ");
        header('Location: events.php?events=' . $eventid);
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

        <title>EVENT DASHBOARD</title>

        <!-- Custom fonts for this template-->
        <?php include_once('csslink.php'); ?>

        <!-- Custom styles for this page -->
        <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->

            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <?php include_once('header.php'); ?>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800"><?php echo $events['name']; ?></h1>
                        </div>


                        <?php if ($events['prereg'] == 1 && $eventid != 8) {
                        ?>
                            <!-- Events team registration -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">SONG/ALBUM REGISTRATION DETAILS
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr class="text-primary">
                                                    <th>Team No</th>
                                                    <th>Team Name</th>
                                                    <th>Album Name</th>
                                                    <th>Song Name</th>
                                                    <th>Registered On</th>
                                                    <th>Status</th>


                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $reg = mysqli_query($con, " SELECT * FROM pre_registration where eventid='$eventid'");
                                                if (mysqli_num_rows($reg) > 0) {
                                                    while ($fetch_reg = mysqli_fetch_array($reg)) {
                                                        $teamid = $fetch_reg["teamid"];
                                                        $team = mysqli_query($con, " SELECT * FROM team where id='$teamid' ");
                                                        $fetch_team = mysqli_fetch_array($team);

                                                        $lotid = mysqli_query($con, "SELECT * FROM lot where teamid='$teamid' and eventid='$eventid'");
                                                        $fetch_lotid = mysqli_fetch_array($lotid);

                                                        $format = substr($fetch_reg['album'], -3);
                                                        $song = explode("#", $fetch_reg['song']);


                                                ?>
                                                        <tr>
                                                            <td><?php echo $fetch_team['id'];; ?></td>
                                                            <td><?php echo $fetch_team['name'] . '- Shift ' . $fetch_team['shift']; ?></td>
                                                            <td>
                                                                <?php
                                                                if ($format == "mp3" || $format == "MP3") {
                                                                ?>
                                                                    <audio src="../dashboard/<?= $fetch_reg['album'] ?>" controls></audio>
                                                                <?php
                                                                } else {
                                                                    echo $fetch_reg['album'];
                                                                } ?>
                                                            </td>
                                                            <td><?php echo $song[0]; ?></td>
                                                            <td><?php echo $song[1]; ?></td>
                                                            <td><?php if ($fetch_reg['status'] == 0) {
                                                                    echo 'PENDING';
                                                                } else if ($fetch_reg['status'] == 1) {
                                                                    echo 'ACCEPTED';
                                                                } else {
                                                                    echo 'REJECTED';
                                                                }; ?></td>

                                                        </tr>
                                                <?php
                                                    }
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        if ($events['upload'] == 1 && $eventid != 8) {
                            ?>
                                <!-- Events File Upload -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
    
                                        
                                            <h6 class="m-0 font-weight-bold text-primary">File Upload
                                                
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr class="text-primary">
                                                        <th>Team No</th>
                                                        <th>Team Name</th>
                                                        <th>File</th>
                                                        <th>Submitted On</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
    
                                                <tbody>
                                                    <?php
                                                    $reg1 = mysqli_query($con, " SELECT * FROM uploads where eventid='$eventid'");
                                                    if (mysqli_num_rows($reg1) > 0) {
                                                        while ($fetch_reg1 = mysqli_fetch_array($reg1)) {
                                                            
    
                                                            $teamid1 = $fetch_reg1["teamid"];
                                                            $team1 = mysqli_query($con, " SELECT * FROM team where id='$teamid1' ");
                                                            $fetch_team1 = mysqli_fetch_array($team1);
    
    
    
    
                                                    ?>
                                                            <tr>
                                                                <td><?php echo $fetch_reg1['teamid']; ?></td>
                                                                <td><?php echo $fetch_team1['name'] . '- Shift ' . $fetch_team1['shift']; ?></td>
                                                                <td><?php
                                                                    if (substr($fetch_reg1['url'], -3) == "mp3" || substr($fetch_reg1['url'], -3) == "MP3") {
                                                                    ?>
                                                                        <audio src="../dashboard/<?= $fetch_reg1['url'] ?>" controls></audio>
                                                                    <?php
                                                                    }
                                                                    if (substr($fetch_reg1['url'], -3) == "pdf" || substr($fetch_reg1['url'], -3) == "PDF") {
                                                                    ?>
                                                                        <a href="../dashboard/<?= $fetch_reg1['url'] ?>" target="_blank" class="btn btn-primary">View Lyrics</a>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td><?php echo $fetch_reg1['upload_date']; ?></td>
                                                                <td><?php if ($fetch_reg1['status'] == 0) {
                                                                    echo 'SUBMITTED';
                                                                } else if ($fetch_reg1['status'] == 1) {
                                                                    echo 'ACCEPTED';
                                                                } else {
                                                                    echo 'CHANGE';
                                                                }; ?></td>
                                                                
                                                                
                                                            </tr>
                                                    <?php
    
                                                        }
                                                    }
                                                    ?>
    
    
    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            if ($eventid == 8) {
                                ?>
                                    <!-- Events File Upload -->
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
        
                                            
                                                <h6 class="m-0 font-weight-bold text-primary">Indep Director
                                                    
                                            </h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr class="text-primary">
                                                            <th>Team No</th>
                                                            <th>Team Name</th>
                                                            <th>Movie Link</th>
                                                            <th>Submitted On</th>
                                                            
                                                        </tr>
                                                    </thead>
        
                                                    <tbody>
                                                        <?php
                                                         $select4 = mysqli_query($con, "SELECT * FROM pre_registration WHERE eventid = 8");

                                                        
                                                        if (mysqli_num_rows($select4) > 0) {
                                                            while ($data4 = mysqli_fetch_array($select4)) {
                                                                
        
                                                                $teamid1 = $data4["teamid"];
                                                                $team1 = mysqli_query($con, " SELECT * FROM team where id='$teamid1' ");
                                                                $fetch_team1 = mysqli_fetch_array($team1);
        
        
        
        
                                                        ?>
                                                                <tr>
                                                                    <td><?php echo $data4["teamid"]; ?></td>
                                                                    <td><?php echo $fetch_team1['name'] . '- Shift ' . $fetch_team1['shift']; ?></td>
                                                                    <td>

                                                                    <a href="<?= $data4['album']; ?>" target="_blank" class="btn btn-primary">Watch</a>

                                                                </td>
                                                                <td>
                                                                    <?php echo  $data4['reg_date']; ?>
                                                                </td>
                                                                    
                                                                    
                                                                </tr>
                                                        <?php
        
                                                            }
                                                        }
                                                        ?>
        
        
        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>

                                <?php if ($events['team'] == 1) {
                        ?>
                            <!-- Events team members registration -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">

                                    
                                        <h6 class="m-0 font-weight-bold text-primary">PARTICIPANTS Details
                                            
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                                            <thead>
                                                <tr class="text-primary">
                                                    <th>Team No</th>
                                                    <th>Team Name</th>
                                                    <th>Student D.NO</th>
                                                    <th>Student Name</th>
                                                    <th>Class</th>
                                                    
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $reg2 = mysqli_query($con, " SELECT * FROM participants where eventid='$eventid'");
                                                if (mysqli_num_rows($reg2) > 0) {
                                                    while ($fetch_reg2 = mysqli_fetch_array($reg2)) {
                                                        $teamid2 = $fetch_reg2["teamid"];
                                                        $team2 = mysqli_query($con, " SELECT * FROM team where id='$teamid2' ");
                                                        $fetch_team2 = mysqli_fetch_array($team2);

                                                        $lotid2 = mysqli_query($con, "SELECT * FROM lot where teamid='$teamid2' and eventid='$eventid'");
                                                        $fetch_lotid2 = mysqli_fetch_array($lotid2);


                                                ?>
                                                        <tr>
                                                            <td><?php echo $fetch_reg2['teamid']; ?></td>
                                                            <td><?php echo $fetch_team2['name'] . '- Shift ' . $fetch_team2['shift']; ?></td>
                                                            <td><?php echo $fetch_reg2['dno']; ?></td>
                                                            <td><?php echo $fetch_reg2['name']; ?></td>
                                                            <td><?php echo $fetch_reg2['class']; ?></td>
                                                            
                                                        </tr>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>






                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; St. Joseph's College 2023 . All right reserved</span>
                        </div>
                    </div>
                </footer>
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
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <?php include_once('jslink.php'); ?>

        <!-- Page level plugins -->
        <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="../js/demo/datatables-demo.js"></script>
        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable();
                $('#dataTable1').DataTable(); // Add this line for the second table
                $('#dataTable2').DataTable(); // Add this line for the third table
            });
        </script>

    </body>

    </html>

<?php
}
?>