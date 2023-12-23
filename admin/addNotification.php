<?php
session_start();
include('../includes/db_connection.php');
if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {
    $side = $_SESSION['admin'];
    $active = 7;
    $id = $_SESSION['aid'];
    $name = $_SESSION['admin_name'];
}

if (isset($_POST['notification'])) {

    $new = $_POST['new'];
    $message = $_POST['message'];
    $link = $_POST['link'];
    $album = "notice";

    if ($link == 0) {
        $sql = "INSERT INTO registration (eventid, teamid, album, file) VALUES($new, $link, '$album', '$message')";
        if (mysqli_query($con, $sql)) {
            echo '<script>alert("Successfully Data Uploaded !");</script>';
            echo '<script>window.location.href="viewNotification.php";</script>';
        } else {
            echo '<script>alert("unable to add data. Please Try Again Later !!!");</script>';
            echo '<script>window.location.href="viewNotification.php";</script>';
        }
    } elseif ($link == 1) {
        $url = $_POST['url'];
        $sql = "INSERT INTO registration (eventid, teamid, album, teamreg_status, file) VALUES($new, $link, '$album', '$url', '$message')";
        if (mysqli_query($con, $sql)) {
            echo '<script>alert("Successfully Data Uploaded !");</script>';
            echo '<script>window.location.href="viewNotification.php";</script>';
        } else {
            echo '<script>alert("unable to add data. Please Try Again Later !!!");</script>';
            echo '<script>window.location.href="viewNotification.php";</script>';
        }
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
                        <h1 class="h3 mb-0 text-gray-800">NOTIFICATION</h1>

                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                ADD NOTIFICATION
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                    <form method="post">
                                        <tbody>

                                            <tr>
                                                <td class="text-primary">Message</td>
                                                <td>
                                                    <input type="text" name="message" class="form-control" style="width:100%;" placeholder="Message" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>New Image</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="new" id="flexRadioDefault1" value="1" checked>
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            Enabled
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="new" value="0" id="flexRadioDefault2">
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            Disabled
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Hyper Link</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="link" id="flexRadioDefault3" value="1">
                                                        <label class="form-check-label" for="flexRadioDefault3">
                                                            Enabled
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="link" value="0" id="flexRadioDefault4" checked>
                                                        <label class="form-check-label" for="flexRadioDefault4">
                                                            Disabled
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Upload File</td>
                                                <td>
                                                    <input type="url" name="url" class="form-control" style="width:100%;" accept="application/pdf">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan=3 style="text-align:center;">
                                                    <input type="submit" name="notification" class="btn btn-primary" style="width:200px;" value="UPDATE DETAILS">
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