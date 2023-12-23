<?php
session_start();
include('../includes/db_connection.php');
if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {
    $teamid = $_GET['team'];
    mysqli_query($con, "update team set password=12345, Mname=null, Mwhatsapp=null, Memail=null, Sname=null, Swhatsapp=null, Semail=null where id='$teamid'");
    echo '<script>alert("Team Edited Successfully!")</script><script>window.location.href="teams.php"</script>';
}
