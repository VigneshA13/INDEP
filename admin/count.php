<?php
session_start();
include('../includes/db_connection.php');
if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {
    $side = $_SESSION['admin'];
    $active = 10;
    $id = $_SESSION['aid'];
    $name = $_SESSION['admin_name'];

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
                                PARTICIPATION COUNT
                            </h1>
                        </div>



                        <!-- Events team registration -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">COUNT</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr class="text-primary">
                                                <th>S No.</th>
                                                <th>Team</th>
                                                <th>DNO</th>
                                                <th>Count</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php

                                            $date = mysqli_query($con, " SELECT teamid, dno, COUNT(dno) AS count FROM participants GROUP BY dno ORDER BY teamid");
                                            if (mysqli_num_rows($date) > 0) {
                                                $i = 0;
                                                while ($Data = mysqli_fetch_array($date)) {

                                                    $i++;
                                            ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td>
                                                            <?php
                                                            $select = mysqli_query($con, "SELECT * FROM team WHERE id = " . $Data['teamid']);
                                                            $fetch = mysqli_fetch_array($select);
                                                            echo $fetch['name'];
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php echo strtoupper($Data['dno']) ?>
                                                        </td>
                                                        <td><?php echo $Data['count']  ?></td>
                                                        <td>
                                                            <a href="./viewCount.php?dno=<?= $Data['dno']; ?>&&id=<?= $Data['teamid']; ?>" class="btn btn-sm btn-primary ml-2">
                                                                <span class="text">View Details</span>
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