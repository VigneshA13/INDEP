<?php
session_start();
include('../includes/db_connection.php');
if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {

    $id = $_GET['id'];
    mysqli_query($con, "DELETE FROM registration where id='$id'");
    echo '<script>alert("Deleted Successfully !!!")</script><script>window.location.href="Dates.php"</script>';
}
