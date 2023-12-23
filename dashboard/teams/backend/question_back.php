<?php
session_start();
include("../../../includes/db_connection.php");
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $dno = $_POST['dno'];
    $question = $_POST['question'];
    $teamid = $_SESSION['id'];

    if (mysqli_query($con, "INSERT INTO question (dno, name, questions, teamid) VALUES ('$dno', '$name', '$question', $teamid)")) {
        $_SESSION['error'] = "Successfully Question Added";
        header("location: ../viewQuestion.php");
    } else {

        $_SESSION['error'] = "unable to add URL. Please Try Again Later !!!";
        header("location: ../dashboard.php");
    }
} else {
    $_SESSION['error'] = "Please Try Again Later !!!";
    header("location: ../dashboard.php");
}
