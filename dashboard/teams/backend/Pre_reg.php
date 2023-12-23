<?php
session_start();
include("../../../includes/db_connection.php");
if (isset($_POST['reg_submit'])) {
    date_default_timezone_set('Asia/Kolkata');
    $currentDateTime = date('Y-m-d H:i:s');
    $album = $_POST['album'];
    $song = $_POST['song'] . "#" . $currentDateTime;
    $eventID = $_POST['eid'];
    $deptID = $_SESSION['id'];

    $insert = mysqli_query($con, "INSERT INTO pre_registration(teamid, eventid, album, song) VALUES ($deptID, $eventID, '$album', '$song')");
    if ($insert) {
        $_SESSION['error'] = "Album and Song name Successfully added.";
        header("location: ../dashboard.php");
    } else {
        $_SESSION['error'] = "unable to add data. Please Try Again Later !!!";
        header("location: ../dashboard.php");
    }
} else if (isset($_POST['audio_submit']) && isset($_FILES['audio'])) {

    date_default_timezone_set('Asia/Kolkata');
    $currentDateTime = date('Y-m-d H:i:s');

    $audio_name = $_FILES['audio']['name'];
    $tmp_name = $_FILES['audio']['tmp_name'];
    $error = $_FILES['audio']['error'];
    $eventID = $_POST['eid'];
    $deptID = $_SESSION['id'];

    $name = "e" . $eventID . "_t" . $deptID;


    $maxFileSize = 5 * 1024 * 1024;
    $filesize = filesize($tmp_name);

    if ($filesize <= $maxFileSize) {

        if ($error == 0) {
            $audio_ex = pathinfo($audio_name, PATHINFO_EXTENSION);

            $audio_ex_lc = strtolower($audio_ex);
            if ($eventID == 14 || $eventID == 15 || $eventID == 17 || $eventID == 18) {
                $allowed_exs = array("pdf");
            } else {
                $allowed_exs = array("mp3");
            }

            if (in_array($audio_ex_lc, $allowed_exs)) {
                if ($eventID == 14 || $eventID == 15 || $eventID == 17 || $eventID == 18) {
                    $audio_upload_path = '../../uploads/' . $name . ".pdf";
                } else {
                    $audio_upload_path = '../../uploads/' . $name . ".mp3";
                }


                if (move_uploaded_file($tmp_name, $audio_upload_path)) {
                    if ($eventID == 14 || $eventID == 15 || $eventID == 17 || $eventID == 18) {
                        $path = 'uploads/' . $name . ".pdf";
                    } else {
                        $path = 'uploads/' . $name . ".mp3";
                    }


                    $sql = "INSERT INTO uploads(eventid, teamid, url, upload_date) VALUES($eventID, $deptID, '$path', '$currentDateTime')";

                    if (mysqli_query($con, $sql)) {
                        $_SESSION['error'] = "Successfully file Uploaded ";
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
    } else {
        $_SESSION['error'] = "File Size must be less then 5MB.";
        header("location: ../dashboard.php");
    }
} else if (isset($_POST['link_submit'])) {
    $url = $_POST['url'];
    $eventID = $_POST['eid'];
    $deptID = $_SESSION['id'];
    $song = "-";

    date_default_timezone_set('Asia/Kolkata');
    $currentDateTime = date('Y-m-d H:i:s');

    if (mysqli_query($con, "INSERT INTO pre_registration (teamid, eventid, album, song, reg_date) VALUES($deptID, $eventID, '$url', '$song', '$currentDateTime')")) {
        $_SESSION['error'] = "Successfully URL Uploaded ";
        header("location: ../dashboard.php");
    } else {

        $_SESSION['error'] = "unable to add URL. Please Try Again Later !!!";
        header("location: ../dashboard.php");
    }
} else {
    $_SESSION['error'] = "Please Try Again Later !!!";
    header("location: ../dashboard.php");
}
