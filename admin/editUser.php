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
}

$id = $_GET['id'];


if (isset($_POST['updateUser'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $privilege = $_POST['privilege'];

    if (mysqli_query($con, "UPDATE admin SET name = '$name', username = '$username', password = '$password', privilege =  $privilege WHERE id = $id")) {
        echo '<script>alert("Temporary User Updated Successfully!")</script><script>window.location.href="TempUser.php"</script>';
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
                        <h1 class="h3 mb-0 text-gray-800">TEMPORARY USER</h1>

                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">


                            <h6 class="m-0 font-weight-bold text-primary">Edit USER

                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <?php
                                    $select = mysqli_query($con, "SELECT * FROM admin WHERE id = $id");
                                    $data = mysqli_fetch_array($select);
                                    ?>
                                    <form method="post">
                                        <tbody>


                                            <tr>
                                                <td class="text-primary">Name</td>
                                                <td>
                                                    <input type="text" name="name" class="form-control" style="width:100%;" value="<?php echo $data['name'] ?>" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-primary">Username</td>
                                                <td>
                                                    <input type="text" name="username" class="form-control" style="width:100%;" value="<?php echo $data['username'] ?>" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-primary">Password</td>
                                                <td>
                                                    <input type="text" name="password" class="form-control" style="width:100%;" value="<?php echo $data['password'] ?>" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-primary">privilege</td>
                                                <td>
                                                    <input type="text" name="privilege" class="form-control" style="width:100%;" value="<?php echo $data['privilege'] ?>" required>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td colspan=3 style="text-align:center;">
                                                    <input type="submit" name="updateUser" class="btn btn-primary" style="width:170px;" value="UPDATE USER">
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