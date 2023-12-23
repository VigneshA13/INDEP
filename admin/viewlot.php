<?php
session_start();
include('../includes/db_connection.php');
if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {
    $side = $_SESSION['admin'];
    $active = 1;
    $id = $_SESSION['aid'];
    $name = $_SESSION['admin_name'];
    $eventid = $_GET['events'];

    $details = mysqli_query($con, " SELECT * FROM events where id='$eventid' ");
    $events = mysqli_fetch_array($details);
    $status1 = $events['prereg_approve'];




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
                            <h1 class="h3 mb-0 text-gray-800"><?php echo $events['name']; ?></h1>
                        </div>



                        <!-- Events team registration -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">


                                <h6 class="m-0 font-weight-bold text-primary">LOT DETAILS
                                    <a href="addlot.php?events=<?php echo $eventid; ?>" class="btn btn-primary btn-icon-split" style="float:right; margin-left:50px;">
                                        <span class="text">Add Lot</span>
                                    </a>
                                    <a href="editlot.php?events=<?php echo $eventid; ?>" class="btn btn-primary btn-icon-split" style="float:right;">
                                        <span class="text">Edit Lot</span>
                                    </a>
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr class="text-primary">
                                                <th>Lot No</th>
                                                <th>Event Name</th>
                                                <th>Team Name</th>
                                                <th>Actions</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $lots = mysqli_query($con, " SELECT * FROM lot where eventid='$eventid' AND lotno > 0 order by lotno ");
                                            if (mysqli_num_rows($lots) > 0) {
                                                while ($fetch_lot = mysqli_fetch_array($lots)) {
                                                    $teamid = $fetch_lot["teamid"];
                                                    $team = mysqli_query($con, " SELECT * FROM team where id='$teamid' ");
                                                    $fetch_team = mysqli_fetch_array($team);


                                            ?>
                                                    <tr>
                                                        <td><?php echo $fetch_lot['lotno']; ?></td>
                                                        <td><?php echo $events['name']; ?></td>
                                                        <td><?php echo $fetch_team['name'] . ' - Shift ' . $fetch_team['shift']; ?></td>
                                                        <td>
                                                            <a class="btn btn-sm btn-danger" href="deletelot.php?events=<?php echo $eventid . '&id=' . $fetch_lot['id']; ?>">Delete</a>
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