<?php
session_start();
include('../includes/db_connection.php');
if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {
    $side = $_SESSION['admin'];
    $active = 6;
    $id = $_SESSION['aid'];
    $name = $_SESSION['admin_name'];
}

if (isset($_POST['insertSubmit'])) {

    $id = $_POST['id'];
    $date = $_POST['date'];
    $message = $_POST['message'];

    $album = "date";


    if (mysqli_query($con, "UPDATE registration SET  album = '$album', file = ' $message',  upload_date = '$date' WHERE id = $id")) {
        echo '<script>alert("Details Added Successfully!");</script>';
        echo '<script>window.location.href="Dates.php";</script>';
    } else {
        echo '<script>alert("Unable to update Details. Please Try Again Later!")</script><script>window.location.href="Dates.php"</script>';
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
                        <h1 class="h3 mb-0 text-gray-800">DATES TO REMEMBER</h1>

                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                UPDATE DATES TO REMEMBER
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                    <form method="post">
                                        <tbody>
                                            <?php
                                            $select = mysqli_query($con, "SELECT * FROM registration WHERE id = " . $_GET['id']);
                                            $fetch = mysqli_fetch_array($select);
                                            ?>
                                            <tr style="display: none;">
                                                <td class="text-primary">id</td>
                                                <td>
                                                    <input type="text" name="id" class="form-control" style="width:100%;" value="<?= $fetch['id'] ?>" required>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="text-primary">Date</td>
                                                <td>
                                                    <input type="date" name="date" class="form-control" style="width:100%;" value="<?= $fetch['upload_date'] ?>" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-primary">Message</td>
                                                <td>
                                                    <input type="text" name="message" class="form-control" style="width:100%;" value="<?= $fetch['file'] ?>" required>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td colspan=3 style="text-align:center;">
                                                    <input type="submit" name="insertSubmit" class="btn btn-primary" style="width:200px;" value="UPDATE DETAILS">
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