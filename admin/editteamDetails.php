<?php
session_start();
include('../includes/db_connection.php');
if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {
    $teamId = $_POST['id'];
    $teamName = $_POST['teamName'];
    $password = $_POST['password'];
    $Mname = $_POST['Mname'];
    $Mwhatsapp = $_POST['Mwhatsapp'];
    $Memail = $_POST['Memail'];
    $Sname = $_POST['Sname'];
    $Swhatsapp = $_POST['Swhatsapp'];
    $Semail = $_POST['Semail'];

    if (mysqli_query($con, "update team set name = '$teamName', password='$password', Mname='$Mname', Mwhatsapp='$Mwhatsapp', Memail='$Memail', Sname='$Sname', Swhatsapp='$Swhatsapp', Semail='$Semail' where id=$teamId")) {

        echo '<script>alert("Team Edited Successfully!")</script><script>window.location.href="teams.php"</script>';
    } else {
        echo '<script>alert("Unable to Edit Team. Please Try Again Later!")</script><script>window.location.href="teams.php"</script>';
    }
}
