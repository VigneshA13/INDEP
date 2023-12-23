<?php
session_start();
include('../includes/db_connection.php');
if(strlen($_SESSION['aid']==0)){
  header('location:logout.php');
}
else {
    $eventid=$_GET['events'];
	$id=$_GET['id'];
    mysqli_query($con, "DELETE FROM pre_registration where id='$id'");
    echo '<script>alert("Event Details Deleted Successfully'.$uid.'!")</script><script>window.location.href="events.php?events='.$eventid.'"</script>';

}
?>