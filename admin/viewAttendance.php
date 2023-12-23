<?php
session_start();
include('../includes/db_connection.php');
if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {
    $side = $_SESSION['admin'];
    $active = 5;
    $id = $_SESSION['aid'];
    $name = $_SESSION['admin_name'];

    $eventID = $_GET['events'];

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>ADMIN DASHBOARD</title>

        <!-- Custom fonts for this template-->
        <?php include_once('csslink.php'); ?>

        <!-- Custom styles for this page -->
        <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <?php include_once('sidebar.php'); ?>
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
                            <h1 class="h3 mb-0 text-gray-800">
                                <?php
                                $event = mysqli_query($con, "SELECT * FROM events WHERE id = $eventID");
                                $eventData = mysqli_fetch_array($event);
                                echo $eventData['name'] . "- PARTICIPANTS LIST";
                                ?>
                            </h1>
                        </div>



                        <!-- Events team registration -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">ATTENDANCE DETAILS
                                    <a href="./attendanceExcel.php?events=<?= $eventID; ?>" class="btn btn-primary btn-icon-split" style="float:right; margin-left:50px;">
                                        <span class="text">Download Excel</span>
                                    </a>
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr class="text-primary">
                                                <th>Lot No.</th>
                                                <th>DNO</th>
                                                <th>Name</th>
                                                <th>Class</th>
                                                <th>Status</th>
                                                <th>Remarks</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php

                                            $participants = mysqli_query($con, " SELECT * FROM participants where eventid = $eventID");
                                            if (mysqli_num_rows($participants) > 0) {
                                                while ($participantsData = mysqli_fetch_array($participants)) {
                                                    $teamid = $participantsData['teamid'];
                                                    $eventid = $participantsData['eventid'];
                                            ?>
                                                    <tr>
                                                        <td>
                                                            <?php
                                                            $lot = mysqli_query($con, "SELECT * FROM lot WHERE teamid = $teamid AND eventid = $eventid");
                                                            $lotData = mysqli_fetch_array($lot);
                                                            echo $lotData['lotno'];
                                                            ?>
                                                        </td>
                                                        <td><?php echo $participantsData['dno']; ?></td>
                                                        <td><?php echo $participantsData['name']; ?></td>
                                                        <td><?php echo $participantsData['class'] ?></td>
                                                        <td>
                                                            <?php
                                                            if ($participantsData['present'] == 0) {
                                                                echo '<span class="text" style="color: orange; font-weight: 800;">PENDING</span>';
                                                            }
                                                            if ($participantsData['present'] == 1) {
                                                                echo '<span class="text-success" style=" font-weight: 800;">PRESENT</span>';
                                                            }
                                                            if ($participantsData['present'] == 2) {
                                                                echo '<span class="text-danger" style=" font-weight: 800;">ABSENT</span>';
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?php echo $participantsData['remarks']; ?></td>
                                                        <td>
                                                            <a class="btn btn-sm btn-success" href="./editAttendance.php?code=1&&id=<?= $participantsData['id']; ?>&&eventid=<?= $participantsData['eventid'] ?>">
                                                                <span class="text">Present</span>
                                                            </a>
                                                            <a href="./changeAttendance.php?id=<?= $participantsData['id']; ?>" class="btn btn-sm btn-primary ml-2">
                                                                <span class="text">Edit Details</span>
                                                            </a>
                                                            <a href="./editAttendance.php?code=2&&id=<?= $participantsData['id']; ?>&&eventid=<?= $participantsData['eventid'] ?>" class="btn btn-sm btn-danger ml-2">
                                                                <span class="text">Absent</span>
                                                            </a>
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