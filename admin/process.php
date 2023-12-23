<?php
session_start();
include('../includes/db_connection.php');
if(strlen($_SESSION['aid']==0)){
  header('location:logout.php');
}
else {
    $eventid=$_GET['events'];
	$id=$_GET['id'];
    $status=$_GET['status'];
    if($status==1)
    {
        $sql= mysqli_query($con, "update pre_registration set status=1 where id='$id'");
        if($sql)
        {
            echo '<script>window.location.href="events.php?events='.$eventid.'"</script>';
        }
    }
    if($status==2)
    {
        $sql= mysqli_query($con, "update pre_registration set status=2 where id='$id'");
        if($sql)
        {
            echo '<script>window.location.href="events.php?events='.$eventid.'"</script>';
        }
    }

}
?>