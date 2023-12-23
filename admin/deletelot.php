<?php
session_start();
include('../includes/db_connection.php');
if (strlen($_SESSION['aid'] == 0)) {
  header('location:logout.php');
} else {
  $eventid = $_GET['events'];
  $id = $_GET['id'];
  mysqli_query($con, "DELETE FROM lot where id='$id'");
  echo '<script>alert("Lot Deleted Successfully' . $id . '!")</script><script>window.location.href="viewlot.php?events=' . $eventid . '"</script>';
}
