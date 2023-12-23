<?php
session_start();
include('../includes/db_connection.php');
if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {
    $side = $_SESSION['admin'];
    $active = 8;
    $id = $_SESSION['aid'];
    $name = $_SESSION['admin_name'];
}

if (isset($_POST['addDownload'])) {

    if ($_FILES['audio']['name']) {
        $title = $_POST['title'];

        $audio_name = $_FILES['audio']['name'];
        $tmp_name = $_FILES['audio']['tmp_name'];
        $error = $_FILES['audio']['error'];

        $album = "download";

        $maxFileSize = 5 * 1024 * 1024;
        $filesize = filesize($tmp_name);

        if ($filesize <= $maxFileSize) {

            if ($error == 0) {
                $audio_ex = pathinfo($audio_name, PATHINFO_EXTENSION);

                $audio_ex_lc = strtolower($audio_ex);

                $allowed_exs = array("pdf");

                if (in_array($audio_ex_lc, $allowed_exs)) {

                    $audio_upload_path = '../assets/down/' . $audio_name;
                    if (move_uploaded_file($tmp_name, $audio_upload_path)) {
                        $path = 'assets/down/' .  $audio_name;

                        $sql = "INSERT INTO registration(album, teamreg_status, file) VALUES( '$album', '$path', '$title')";

                        if (mysqli_query($con, $sql)) {
                            echo '<script>alert("Successfully Data Uploaded  !");</script>';
                            echo '<script>window.location.href="downloads.php";</script>';
                        } else {
                            echo '<script>alert("unable to add data. Please Try Again Later !!!");</script>';
                            echo '<script>window.location.href="downloads.php";</script>';
                        }
                    } else {
                        echo '<script>alert("File not moved.Please Try Again Later !!! ");</script>';
                        echo '<script>window.location.href="downloads.php";</script>';
                    }
                } else {
                    echo '<script>alert("Invalid file formate. ");</script>';
                    echo '<script>window.location.href="downloads.php";</script>';
                }
            }
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
                        <h1 class="h3 mb-0 text-gray-800">DOWNLOADS</h1>

                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                ADD FILE
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                    <form method="post" enctype="multipart/form-data">
                                        <tbody>
                                            <tr>
                                                <td class="text-primary">Title</td>
                                                <td>
                                                    <input type="text" name="title" class="form-control" style="width:100%;" placeholder="Title" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Upload File</td>
                                                <td>
                                                    <input type="file" name="audio" class="form-control" style="width:100%;" accept="application/pdf">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan=3 style="text-align:center;">
                                                    <input type="submit" name="addDownload" class="btn btn-primary" style="width:200px;" value="UPDATE DETAILS">
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