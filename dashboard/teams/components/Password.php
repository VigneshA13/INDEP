<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Password Confirmation</title>
</head>

<body>
    <!-- Your modal code -->
    <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>


                </div>
                <form method="POST" action="">
                    <div class="modal-body">
                        <?php
                        if (isset($_GET['err'])) {
                            echo '<h6 class="text-danger" style="font-weight: bold; text-align: center;">Unable to update password. PLEASE TRY AGAIN LATER !!!</h6>';
                        }
                        ?>
                        <div class="input-group">
                            <span class="input-group-text">New Password</span>
                            <input id="newPassword" name="pass" type="password" aria-label="New Password" class="form-control" required>
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-text">Confirm Password</span>
                            <input id="confirmPassword" name="cpass" type="password" aria-label="Confirm Password" class="form-control" oninput="checkPasswordMatch()" required>
                        </div>
                        <div id="passwordMatchMessage" class="mt-2"></div>
                    </div>
                    <div class="modal-footer text-center">
                        <!-- Remove data-dismiss attribute from the close button -->

                        <button type="submit" name="changePassword" id="logoutButton" class="btn btn-primary mx-auto" onclick="checkPasswordMatch()">SUBMIT</button>
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
        function checkPasswordMatch() {
            var newPassword = document.getElementById('newPassword').value;
            var confirmPassword = document.getElementById('confirmPassword').value;
            var messageElement = document.getElementById('passwordMatchMessage');
            var logoutButton = document.getElementById('logoutButton');

            if (newPassword === confirmPassword) {
                // Passwords match
                messageElement.innerHTML = '';
                logoutButton.disabled = false;
            } else {
                // Passwords do not match
                messageElement.innerHTML = '<div class="text-danger">Passwords do not match.</div>';
                logoutButton.disabled = true;
            }
        }

        $(document).ready(function() {
            $('#passwordModal').modal('show');
        });
    </script>

</body>

</html>

<?php
session_start();
include("../../../includes/db_connection.php");
if (!$_SESSION['id'] || !$_SESSION['name']) {
    header("location: ../../login.php");
}
if (isset($_POST['changePassword'])) {
    $pass = $_POST['pass'];
    $id = $_SESSION['id'];


    if (mysqli_query($con, "UPDATE team SET password = '$pass' WHERE id = $id")) {
        header("location: Details.php");
    } else {
        header("location: password.php?err=1");
    }
}
?>