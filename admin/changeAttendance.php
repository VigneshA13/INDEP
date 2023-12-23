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
}

if (isset($_POST['editSubmit'])) {
    $id = $_POST['id'];
    $eventid = $_POST['eventid'];
    $dno = strtoupper($_POST['dno']);
    $name = strtoupper($_POST['name']);
    $class = $_POST['class'];
    $remark = $_POST['remark'];
    $present = $_POST['present'];

    if (mysqli_query($con, "UPDATE participants set dno = '$dno', name = '$name', class = '$class', remarks = '$remark', present = $present WHERE id = $id")) {
        echo '<script>alert("Details Updated Successfully!");</script>';
        echo '<script>window.location.href="viewAttendance.php?events=' . $eventid . '";</script>';
    } else {
        echo '<script>alert("Unable to update Details. Please Try Again Later!")</script><script>window.location.href="viewAttendance.php?events' . $eventid . '</script>';
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
                        <h1 class="h3 mb-0 text-gray-800">PARTICIPATE DETAILS</h1>

                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                CHANGE PARTICIPATE DETAILS
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                    <?php
                                    $select = mysqli_query($con, "SELECT * FROM participants WHERE id = " . $_GET['id']);
                                    $data = mysqli_fetch_array($select);
                                    ?>
                                    <form method="post">
                                        <tbody>
                                            <tr style="display: none;">
                                                <td class="text-primary">ID</td>
                                                <td>
                                                    <input type="text" name="id" class="form-control" style="width:100%;" value="<?= $data['id']; ?>" required>
                                                </td>
                                            </tr>
                                            <tr style="display: none;">
                                                <td class="text-primary">ID</td>
                                                <td>
                                                    <input type="text" name="eventid" class="form-control" style="width:100%;" value="<?= $data['eventid']; ?>" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-primary">D No.</td>
                                                <td>
                                                    <input type="text" id="dno" name="dno" class="form-control" style="width:100%;" value="<?= $data['dno']; ?>" required>
                                                    <span id="errorMessage" class="error-message text-danger" style="font-weight: 800;"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-primary">Name</td>
                                                <td>
                                                    <input type="text" name="name" class="form-control" style="width:100%;" value="<?= $data['name']; ?>" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-primary">Remark</td>
                                                <td>

                                                    <select name="remark" class="form-control" style="width:100%;">
                                                        <option value="<?= $data['remarks'] ?>"><?= $data['remarks'] ?></option>
                                                        <option value=""></option>
                                                        <option value="Person changed"> Person changed </option>
                                                        <option value="Change of details">Change of details</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-primary">Class</td>
                                                <td>
                                                    <select name="class" class="form-control" style="width:100%;">
                                                        <option value='<?= $data['class'] ?>'> <?= $data['class'] ?></option>
                                                        <?php
                                                        $id = $data['teamid'];
                                                        $sql = "select * from classes where teamID=$id";
                                                        $result = $con->query($sql);
                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {
                                                                $value = $row['class'];
                                                                echo "<option value='$value'> $value</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-primary">Present Status</td>
                                                <td>

                                                    <select name="present" class="form-control" style="width:100%;">
                                                        <option value="<?= $data['present'] ?>">
                                                            <?= $data['present'] == 1 ? "Present" : ($data['present'] > 1 ? "Absent" : "Pending") ?>
                                                        </option>
                                                        <option value="0"> Pending </option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan=3 style="text-align:center;">
                                                    <input type="submit" name="editSubmit" class="btn btn-primary" style="width:200px;" value="UPDATE DETAILS">
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var inputField = document.getElementById('dno');
        var errorMessage = document.getElementById('errorMessage');

        inputField.addEventListener('input', function() {
            var inputValue = inputField.value;
            var pattern = /^\d{2}[a-zA-Z]{3}\d{3}$/;

            if (pattern.test(inputValue)) {
                errorMessage.textContent = '';
            } else {
                errorMessage.textContent = 'Invalid DNO Formate.';
            }
        });
    });
</script>

</html>