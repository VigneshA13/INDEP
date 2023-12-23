<?php
session_start();
include('../includes/db_connection.php');
if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {

    $select = mysqli_query($con, "SELECT * FROM events WHERE id = " . $_GET['events']);
    $event = mysqli_fetch_assoc($select);
    header("Content-Type: text/plain");
    header('Content-Disposition: attachment; filename="' . $event['name'] . '_attendance.csv"');

    if (isset($_GET['events'])) {
        $eventID = $_GET['events'];
        $participants = mysqli_query($con, "SELECT p.*, l.lotno FROM participants p LEFT JOIN lot l ON p.teamid = l.teamid AND p.eventid = l.eventid WHERE p.eventid = $eventID ORDER BY l.lotno ASC");

        echo "Lot Number, DNO, Name, Class, Status, Remarks\n";

        while ($data = mysqli_fetch_array($participants)) {
            echo $data['lotno'] . "," . strtoupper($data['dno']) . ","  . strtoupper($data['name']) . "," . $data['class'] . ","  . ($data['present'] == 1 ? "PRESENT" : "ABSENT") . "," . ($data['remarks'] == NULL ? " - " : $data['remarks']) . "\n";
        }

        // It's better to exit after sending the file to prevent further output
        exit;
    }

    // Redirect to another page after generating the CSV
    header("location: viewAttendance.php?events=$eventID");
}
