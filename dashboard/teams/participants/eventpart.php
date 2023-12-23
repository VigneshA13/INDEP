<?php
include "../../../includes/db_connection.php";
$folk = 6;
$west = 6;
$adz = 4;
$skit = 4;


if (isset($_POST['submit'])) {
    $success = 0;
    $count = $_POST['count'];
    $eid = $_POST['eid'];

    $id = $_POST['tid'];
    if ($count >= 1) {
        $dno1 = strtoupper($_POST['dno1']);
        $name1 = $_POST['name1'];
        $class1 = $_POST['class1'];

        $insert1 = "insert into participants (eventid,teamid,dno,name,class) values ('$eid','$id','$dno1','$name1','$class1')";
        if ($con->query($insert1) === TRUE) {
            $success++;
        } else {
            $success--;
        }
    }
    if ($count >= 2) {
        $dno2 = strtoupper($_POST['dno2']);
        $name2 = $_POST['name2'];
        $class2 = $_POST['class2'];
        if ($_POST['dno2'] != null) {
            $insert2 = "insert into participants (eventid,teamid,dno,name,class) values ('$eid','$id','$dno2','$name2','$class2')";
            if ($con->query($insert2) === TRUE) {
                $success++;
            } else {
                $success--;
            }
        }
    }
    if ($count >= 3) {
        $dno3 = strtoupper($_POST['dno3']);
        $name3 = $_POST['name3'];
        $class3 = $_POST['class3'];
        if ($_POST['dno3'] != null) {
            $insert3 = "insert into participants (eventid,teamid,dno,name,class) values ('$eid','$id','$dno3','$name3','$class3')";
            if ($con->query($insert3) === TRUE) {
                $success++;
            } else {
                $success--;
            }
        }
    }
    if ($count >= 4) {
        $dno4 = strtoupper($_POST['dno4']);
        $name4 = $_POST['name4'];
        $class4 = $_POST['class4'];
        if ($_POST['dno4'] != null) {
            $insert4 = "insert into participants (eventid,teamid,dno,name,class) values ('$eid','$id','$dno4','$name4','$class4')";
            if ($con->query($insert4) === TRUE) {
                $success++;
            } else {
                $success--;
            }
        }
    }
    if ($count >= 5) {
        $dno5 = strtoupper($_POST['dno5']);
        $name5 = $_POST['name5'];
        $class5 = $_POST['class5'];
        if ($_POST['dno5'] != null) {
            $insert5 = "insert into participants (eventid,teamid,dno,name,class) values ('$eid','$id','$dno5','$name5','$class5')";
            if ($con->query($insert5) === TRUE) {
                $success++;
            } else {
                $success--;
            }
        }
    }

    if ($count >= 6) {
        $dno6 = $_POST['dno6'];
        $name6 = $_POST['name6'];
        $class6 = $_POST['class6'];
        if ($_POST['dno6'] != null) {
            $insert6 = "insert into participants (eventid,teamid,dno,name,class) values ('$eid','$id','$dno6','$name6','$class6')";
            if ($con->query($insert6) === TRUE) {
                $success++;
            } else {
                $success--;
            }
        }
    }
    if ($count >= 7) {
        $dno7 = $_POST['dno7'];
        $name7 = $_POST['name7'];
        $class7 = $_POST['class7'];
        if ($_POST['dno7'] != null) {
            $insert7 = "insert into participants (eventid,teamid,dno,name,class) values ('$eid','$id','$dno7','$name7','$class7')";
            if ($con->query($insert7) === TRUE) {
                $success++;
            } else {
                $success--;
            }
        }
    }
    if ($count >= 8) {
        $dno8 = $_POST['dno8'];
        $name8 = $_POST['name8'];
        $class8 = $_POST['class8'];
        if ($_POST['dno8'] != null) {
            $insert8 = "insert into participants (eventid,teamid,dno,name,class) values ('$eid','$id','$dno8','$name8','$class8')";
            if ($con->query($insert8) === TRUE) {
                $success++;
            } else {
                $success--;
            }
        }
    }
    if ($success > 0) {
        echo '<script>alert("Successfully uploaded");
    window.location.href = "../dashboard.php";</script>';
    } else {
        echo '<script>alert("Please try again later");
    window.location.href = "../dashboard.php";</script>';
    }
}
