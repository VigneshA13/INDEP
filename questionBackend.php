<?php
session_start();
include("./includes/db_connection.php");
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $dno = $_POST['dno'];
    $question = $_POST['question'];

    $class = $_POST['class'];

    if (mysqli_query($con, "INSERT INTO question (dno, name, questions, teamid) VALUES ('$dno', '$name', '$question', $class)")) {
        $_SESSION['error'] = "Successfully Question Added";
        header("location: question.php");
    } else {

        $_SESSION['error'] = "unable to add URL. Please Try Again Later !!!";
        header("location: question.php");
    }
} else {
    $_SESSION['error'] = "Please Try Again Later !!!";
    header("location: question.php");
}
