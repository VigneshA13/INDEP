<?php
session_start();
include('../includes/db_connection.php');
if(strlen($_SESSION['aid']==0)){
  header('location:logout.php');
}
else {
    $side=$_SESSION['admin'];
    $active=0;
    $id=$_SESSION['aid'];
    $name=$_SESSION['admin_name'];

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ADMIN DASHBOARD</title>

    <!-- Custom fonts for this template-->
    <?php include_once('csslink.php'); ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include_once('sidebar.php');?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include_once('header.php');?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">DASHBOARD</h1>
                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <?php
                        $details=mysqli_query($con, " SELECT sum(prereg_approve) as prereg_approve, sum(upload_approve) as upload_approve, sum(team_approve) as team_approve   FROM events where stage=1");
                        $events=mysqli_fetch_array($details);
                        $details1=mysqli_query($con, " SELECT sum(team_approve) as team_approve1   FROM events where stage=0");
                        $events1=mysqli_fetch_array($details1);
                        $status1=$events['prereg_approve'];
                    
                        if(isset($_POST['btn1']))
                      {
                        if($status1==0)
                        {
                            $status1= 1;
                        }
                        else{
                            $status1= 0;
                        }
                            mysqli_query($con,"update events set prereg_approve='$status1' where stage=1 ");
            
                            echo '<script>window.location.href="dashboard.php"</script>';
                            
                        }
                    
                        $status2=$events['upload_approve'];
                    
                        if(isset($_POST['btn2']))
                      {
                        if($status2==0)
                        {
                            $status2= 1;
                        }
                        else{
                            $status2= 0;
                        }
                            mysqli_query($con,"update events set upload_approve='$status2' where stage=1 ");
                            echo '<script>window.location.href="dashboard.php"</script>';
                            
                        }
                    
                        $status3=$events['team_approve'];
                    
                        if(isset($_POST['btn3']))
                      {
                        if($status3==0)
                        {
                            $status3= 1;
                        }
                        else{
                            $status3= 0;
                        }
                            mysqli_query($con,"update events set team_approve='$status3' where stage=1 ");
                            echo '<script>window.location.href="dashboard.php"</script>';
                            
                        }
                        $status4=$events1['team_approve1'];
                    
                        if(isset($_POST['btn4']))
                      {
                        if($status4==0)
                        {
                            $status4= 1;
                        }
                        else{
                            $status4= 0;
                        }
                            mysqli_query($con,"update events set team_approve='$status4' where stage=0 ");
                            echo '<script>window.location.href="dashboard.php"</script>';
                            
                        }
                        ?>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            ON STAGE EVENTS - TEAM REGISTRATION</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <form method="post">
                                                <button type="submit" name="btn1" class="<?php if($events['prereg_approve']>=1){echo "btn btn-success";} else { echo "btn btn-danger";} ?> btn-user btn-block" style="width:100px; float: right; "><?php if($events['prereg_approve']>=1){echo "ON";} else { echo "OFF";} ?></button>
                                            </form>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            ON STAGE EVENTS - FILE UPLOAD</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <form method="post">
                                                <button type="submit" name="btn2" class="<?php if($events['upload_approve']>=1){echo "btn btn-success";} else { echo "btn btn-danger";} ?> btn-user btn-block" style="width:100px; float: right; "><?php if($events['upload_approve']>=1){echo "ON";} else { echo "OFF";} ?></button>
                                            </form>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">ON STAGE EVENTS - PARTICIPANTS REGISTRATION
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <form method="post">
                                                <button type="submit" name="btn3" class="<?php if($events['team_approve']>=1){echo "btn btn-success";} else { echo "btn btn-danger";} ?> btn-user btn-block" style="width:100px; float: right; "><?php if($events['team_approve']>=1){echo "ON";} else { echo "OFF";} ?></button>
                                            </form>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            OFF STAGE EVENTS - PARTICIPANTS REGISTRATION</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <form method="post">
                                                <button type="submit" name="btn4" class="<?php if($events1['team_approve1']>=1){echo "btn btn-success";} else { echo "btn btn-danger";} ?> btn-user btn-block" style="width:100px; float: right; "><?php if($events1['team_approve1']>=1){echo "ON";} else { echo "OFF";} ?></button>
                                            </form>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                   

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">ON STAGE EVENTS</h6>
                                </div>
                                <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                    <?php 
                      $events=mysqli_query($con, " SELECT * FROM events where stage=1 ");
                      $sno=1;
                      if(mysqli_num_rows($events)>0)
                      {
                      while($fetch_events=mysqli_fetch_array($events))
                      {
                             


                       ?>
                                        <tr>
                                            <td><?php echo $sno; ?></td>
                                            <td><?php echo $fetch_events['name']; ?></td>
                                            <td>
                                                <a href="events.php?events=<?php echo $fetch_events['id']; ?>" class="btn btn-primary btn-icon-split">
                                                    
                                                    <span class="text">VIEW</span>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php $sno=$sno+1; ?>
                     <?php  
                      }
                    }

                    ?>
                                        
                                    </table>
                                </div>
                                </div>
                            </div>

                            

                        </div>

                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">OFF STAGE EVENTS</h6>
                                </div>
                                <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                    <?php 
                      $events=mysqli_query($con, " SELECT * FROM events where stage=0 ");
                      $sno=1;
                      if(mysqli_num_rows($events)>0)
                      {
                      while($fetch_events=mysqli_fetch_array($events))
                      {
                             


                       ?>
                                        <tr>
                                            <td><?php echo $sno; ?></td>
                                            <td><?php echo $fetch_events['name']; ?></td>
                                            <td>
                                                <a href="events.php?events=<?php echo $fetch_events['id']; ?>" class="btn btn-primary btn-icon-split">
                                                    
                                                    <span class="text">VIEW</span>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php $sno=$sno+1; ?>
                     <?php  
                      }
                    }

                    ?>
                                    </table>
                                </div>
                                </div>
                            </div>

                           

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy;  St. Joseph's College 2023 . All right reserved</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- js link -->
    <?php include_once('jslink.php');?>

</body>

</html>
<?php
}
?>