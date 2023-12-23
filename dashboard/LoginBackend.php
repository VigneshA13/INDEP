<?php
session_start();
include("../includes/db_connection.php");

if (isset($_POST['login'])) {
    $user = $_POST["user"];
    $password = $_POST["password"];
    $code = substr($user, 0, 3);
    
    if ($code == "DEP") {
        $id = substr($user, -2);

        $select = mysqli_query($con, "SELECT * FROM team WHERE id = $id AND password = '$password'");
        if (mysqli_num_rows($select) == 1) {
            $dept = mysqli_fetch_array($select);
            $_SESSION['id'] = $dept['id'];
            $_SESSION['name'] = $dept['name'];
            $password = $dept['password'];
            if ($password == "12345")
                header("location: ./teams/components/Password.php");
            else
                header("location: ./teams/dashboard.php");
        } else {
            $_SESSION['error'] =  "Invalid UserID and Password";
            header("location: login.php");
        }
    }else if($user=="INDEP2K23")
    {
        $query=mysqli_query($con,"select id,name from admin where  username='$user' && password='$password' && privilege=1 ");
        $ret=mysqli_fetch_array($query);
        if($ret>0){
          $_SESSION['aid']=$ret['id'];
          $_SESSION['admin_name']=$ret['name'];
          $_SESSION['admin']=1;
          
          echo '<script>alert("Login Successfully'.$_SESSION['aid'].'!")</script><script>window.location.href="../admin/dashboard.php"</script>';
         //header('location:dashboard.php');
        }
        else {
            $_SESSION['error'] =  "Invalid UserID and Password";
            header("location: login.php");
        }
    }
    else if($code=="IND")
    {
        $query=mysqli_query($con,"select id,name,privilege  from admin where  username='$user' && password='$password' && privilege!=0 ");
        $ret=mysqli_fetch_array($query);
        if($ret>0){
          $_SESSION['aid']=$ret['id'];
          $_SESSION['admin_name']=$ret['name'];
          $_SESSION['admin']=1;
          $eventid=$ret['privilege']-1;

          
          echo '<script>alert("Login Successfully'.$_SESSION['aid'].'!")</script><script>window.location.href="../admin/eventdashboard.php?events='.$eventid.'"</script>';
         //header('location:dashboard.php');
        }
        else {
            $_SESSION['error'] =  "Invalid UserID and Password";
            header("location: login.php");
        }
    }
     else {
        $_SESSION['error'] = "Invalid UserID";
        header("location: login.php");
    }
} else {
    header("location: login.php");
}
