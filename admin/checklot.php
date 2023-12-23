<?php
session_start();
include('../includes/db_connection.php');
if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {
    $side = $_SESSION['admin'];
    $active = 4;
    $id = $_SESSION['aid'];
    $name = $_SESSION['admin_name'];

// Specify the table you want to inspect
$tableName = "uploads";

// Get the table structure
$sql = "DESCRIBE $tableName";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // Output the table structure
    echo "<table border='1'><tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>{$row['Field']}</td><td>{$row['Type']}</td><td>{$row['Null']}</td><td>{$row['Key']}</td><td>{$row['Default']}</td><td>{$row['Extra']}</td></tr>";
    }
    echo "</table>";
} else {
    echo "Table not found or empty.";
}

// Close the connection
$con->close();

}
?>
