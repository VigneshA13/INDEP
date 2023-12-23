<?php
session_start();
include("../../../includes/db_connection.php");
if (!isset($_SESSION['id']) || !isset($_SESSION['name'])) {
    header("location: ../../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>INDEP - 2k23</title>
</head>

<body>
    <!-- Your modal code -->
    <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">Team Manager Details</h5>


                </div>
                <form method="POST" action="">
                    <div class="modal-body">
                        <table class="table table-borderless">
                            <tr>
                                <td style="width:40%; font-weight:bolder;" class="text-secondary">Name Of The Team Manager</td>
                                <td>
                                    <input type="text" name="Mname" placeholder="Name Of The Team Manager" class="form-control" style="width:100%;" required>
                                </td>

                            </tr>
                            <tr>
                                <td style="width:40%; font-weight:bolder;" class="text-secondary">Team Manager's WhatsApp No.</td>
                                <td>
                                    <input type="text" name="Mwhatsapp" placeholder="Team Manager's WhatsApp No." class="form-control" style="width:100%;" required>
                                </td>

                            </tr>
                            <tr>
                                <td style="width:40%; font-weight:bolder;" class="text-secondary">Team Manager's Email</td>
                                <td>
                                    <input type="text" name="Memail" placeholder="Team Manager's Email" class="form-control" style="width:100%;" required>
                                </td>

                            </tr>
                            <tr>
                                <td style="width:40%; font-weight:bolder;" class="text-secondary">Name Of The Student Secretary</td>
                                <td>
                                    <input type="text" name="Sname" placeholder="Name Of The Student Secretary" class="form-control" style="width:100%;" required>
                                </td>

                            </tr>
                            <tr>
                                <td style="width:40%; font-weight:bolder;" class="text-secondary">Student Secretary's WhatsApp No.</td>
                                <td>
                                    <input type="text" name="Swhatsapp" placeholder="Student Secretary's WhatsApp No." class="form-control" style="width:100%;" required>
                                </td>

                            </tr>
                            <tr>
                                <td style="width:40%; font-weight:bolder;" class="text-secondary">Student Secretary's Email</td>
                                <td>
                                    <input type="text" name="Semail" placeholder="Student Secretary's Email" class="form-control" style="width:100%;" required>
                                </td>

                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer text-center">
                        <!-- Remove data-dismiss attribute from the close button -->

                        <button type="submit" name="Details" id="logoutButton" class="btn btn-primary mx-auto">ADD DETAILS</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Script to show the modal conditionally -->
    <script>
        $(document).ready(function() {
            $('#passwordModal').modal('show');
        });
    </script>

</body>

</html>

<?php

if (isset($_POST['Details'])) {
    $teamId = $_SESSION['id'];
    $Mname = $_POST['Mname'];
    $Mwhatsapp = $_POST['Mwhatsapp'];
    $Memail = $_POST['Memail'];
    $Sname = $_POST['Sname'];
    $Swhatsapp = $_POST['Swhatsapp'];
    $Semail = $_POST['Semail'];


    if (mysqli_query($con, "UPDATE team SET Mname = '$Mname', Mwhatsapp = '$Mwhatsapp', Memail = '$Memail', Sname = '$Sname', Swhatsapp = '$Swhatsapp', Semail = '$Semail' WHERE id = $teamId")) {
        $_SESSION['error'] = "Details Added Successfully.";
        echo '<script>window.location.href="../dashboard.php"</script>';
    } else {
        $_SESSION['error'] = "Unable to add. Please Try Again Later !!!";
        echo '<script>window.location.href="../../dashboard/Logout.php"</script>';
    }
}
?>