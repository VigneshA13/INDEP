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


    $code = $_GET['code'];
    $participantsID = $_GET['id'];
    $eventid = $_GET['eventid'];

    if ($code == 1) {
        if (mysqli_query($con, "UPDATE participants SET present = 1 WHERE id = $participantsID AND eventid =  $eventid")) {
            echo '<script>alert("Attendance Submitted Successfully !")</script><script>window.location.href="viewAttendance.php?events=' . $eventid . '"</script>';
        } else {
            echo '<script>alert("Unable to update Attendance. Please Try Again Later !")</script><script>window.location.href="viewAttendance.php?events=' . $eventid . '"</script>';
        }
    }
    if ($code == 2) {
        if (mysqli_query($con, "UPDATE participants SET present = 2 WHERE id = $participantsID AND eventid =  $eventid")) {
            echo '<script>alert("Attendance Submitted Successfully !")</script><script>window.location.href="viewAttendance.php?events=' . $eventid . '"</script>';
        } else {
            echo '<script>alert("Unable to update Attendance. Please Try Again Later !")</script><script>window.location.href="viewAttendance.php?events=' . $eventid . '"</script>';
        }
    }
}
