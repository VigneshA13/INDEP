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

    if (isset($_POST['submit'])) {

        for ($i = 1; $i <= 26; $i++) {
            // Creating variables with names like $variable1, $variable2, etc.
            ${"team" . $i} = $_POST['id' . $i];
        }


        for ($i = 1; $i <= 26; $i++) {
            // Creating variables with names like $variable1, $variable2, etc.
            ${"lot" . $i} = $_POST['lotno' . $i];
        }
        for ($i = 1; $i <= 26; $i++) {
            if (${'lot' . $i} != 0) {
                $sql1 = mysqli_query($con, "insert into lot(teamid, eventid, lotno) values ('${'team' .$i}','$eventid','${'lot' .$i}')");
            }
        }


        if ($sql1 == TRUE) {

            echo '<script>alert("Lots Submitted Successfully' . $_SESSION['aid'] . '!")</script><script>window.location.href="viewlot.php?events=' . $eventid . '"</script>';
        } else {
            echo '<script>alert("Error:!")</script><script>window.location.href="viewlot.php?events=' . $eventid . '"</script>';
        }
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

        <title>ADMIN DASHBOARD</title>

        <!-- Custom fonts for this template-->
        <?php include_once('csslink.php'); ?>

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

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">


                                <h6 class="m-0 font-weight-bold text-primary">ADD LOT - <?php echo $events['name']; ?>
                                    <a href="addlot.php?events=<?php echo $eventid; ?>" class="btn btn-primary btn-icon-split" style="float:right;">
                                        <span class="text">Add Lot</span>
                                    </a>
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr class="text-primary">
                                                <th>S.No</th>
                                                <th>Team Name</th>
                                                <th>Lot No</th>

                                            </tr>
                                        </thead>
                                        <form method="post">
                                            <tbody>
                                                <?php
                                                $room = mysqli_query($con, " SELECT * FROM team");
                                                $sno = 1;
                                                if (mysqli_num_rows($room) > 0) {
                                                    while ($fetch_room = mysqli_fetch_array($room)) {
                                                ?>

                                                        <tr>
                                                            <td><?php echo $sno; ?></td>
                                                            <td><input type="hidden" name="id<?php echo $fetch_room['id']; ?>" value="<?php echo $fetch_room['id']; ?>">
                                                                <?php echo $fetch_room['name'] . ' - Shift ' . $fetch_room['shift']; ?>
                                                            </td>
                                                            <td><input type="number" name="<?php echo 'lotno' . $fetch_room['id']; ?>" class="form-control" style="width:250px;" value="0" required></td>

                                                        </tr>
                                                <?php
                                                        $sno += 1;
                                                    }
                                                }
                                                ?>

                                                <tr>
                                                    <td colspan=3 style="text-align:center;">
                                                        <input type="submit" name="submit" class="btn btn-primary" style="width:120px;" value="Submit Lots">
                                                    </td>

                                                </tr>

                                            </tbody>
                                        </form>
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


        <!-- js link -->
        <?php include_once('jslink.php'); ?>

    </body>

    </html>
<?php
}
?>