<!DOCTYPE html>
<html lang="en">

<head>
    <title>View</title>
</head>

<body>
    <a href="index.php">UPLOAD</a>

    <div>
        <?php
        include("../../includes/db_connection.php");
        $sql = "SELECT * FROM uploads ORDER BY id DESC";
        $res = mysqli_query($con, $sql);

        if (mysqli_num_rows($res) > 0) {
            while ($audio = mysqli_fetch_assoc($res)) {
        ?>

                <audio src="../<?= $audio['url'] ?>" controls></audio>

        <?php
            }
        } else {
            echo "<h1>Empty</h1>";
        }
        ?>
    </div>
</body>

</html>
<?php
// Set the timezone to Indian Standard Time (IST)
date_default_timezone_set('Asia/Kolkata');

// Get the current date and time in the specified format
$currentDateTime = date('Y-m-d H:i:s');

// Display the current date and time

echo  $currentDateTime;
?>