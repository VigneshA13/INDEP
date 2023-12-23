<?php
session_start();
include("../../../includes/db_connection.php");
if (isset($_POST['music_submit'])) {

    if ($_FILES['audio']['name']) {

        date_default_timezone_set('Asia/Kolkata');
        $currentDateTime = date('Y-m-d H:i:s');

        $audio_name = $_FILES['audio']['name'];
        $tmp_name = $_FILES['audio']['tmp_name'];
        $error = $_FILES['audio']['error'];

        $song = $_POST['song'] . "#" . $currentDateTime;
        $eventID = $_POST['eid'];
        $deptID = $_SESSION['id'];

        $name = "e" . $eventID . "_t" . $deptID;

        $maxFileSize = 5 * 1024 * 1024;
        $filesize = filesize($tmp_name);

        if ($filesize <= $maxFileSize) {

            if ($error == 0) {
                $audio_ex = pathinfo($audio_name, PATHINFO_EXTENSION);

                $audio_ex_lc = strtolower($audio_ex);

                $allowed_exs = array("mp3");

                if (in_array($audio_ex_lc, $allowed_exs)) {

                    $audio_upload_path = '../../uploads/' . $name . ".mp3";
                    if (move_uploaded_file($tmp_name, $audio_upload_path)) {
                        $path = 'uploads/' . $name . ".mp3";

                        $sql = "INSERT INTO pre_registration(teamid, eventid, album, song) VALUES($deptID, $eventID, '$path', '$song')";

                        if (mysqli_query($con, $sql)) {
                            $_SESSION['error'] = "Successfully Data Uploaded ";
                            header("location: ../dashboard.php");
                        } else {

                            $_SESSION['error'] = "unable to add data. Please Try Again Later !!!";
                            header("location: ../dashboard.php");
                        }
                    } else {
                        $_SESSION['error'] = "File not moved.Please Try Again Later !!! ";
                        header("location: ../dashboard.php");
                    }
                } else {
                    $_SESSION['error'] = "Invalid file formate.";
                    header("location: ../dashboard.php");
                }
            }
        }
    } else {

        date_default_timezone_set('Asia/Kolkata');
        $currentDateTime1 = date('Y-m-d H:i:s');
        $song1 = $_POST['song'] . "#" . $currentDateTime1;
        $eventID1 = $_POST['eid'];
        $deptID1 = $_SESSION['id'];
        echo $song1;

        $path1 = "-";

        $sql1 = "INSERT INTO pre_registration(teamid, eventid, album, song) VALUES($deptID1, $eventID1, '$path1', '$song1')";

        if (mysqli_query($con, $sql1)) {
            $_SESSION['error'] = "Successfully Data Uploaded ";
            header("location: ../dashboard.php");
        } else {

            $_SESSION['error'] = "unable to add data. Please Try Again Later !!!";
            header("location: ../dashboard.php");
        }
    }
} else {
    $_SESSION['error'] = "Please Try Again Later !!!";
    header("location: ../dashboard.php");
}
