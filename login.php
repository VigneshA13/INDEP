<?php
session_start();
error_reporting(0);
include('includes/db_connection.php');
if(isset($_POST['login']))
  {
    $userid=$_POST['userid'];
    $password=$_POST['password'];
   
        $query=mysqli_query($con,"select id,name from admin where  username='$userid' && password='$password' ");
        $ret=mysqli_fetch_array($query);
        if($ret>0){
          $_SESSION['aid']=$ret['id'];
          $_SESSION['admin_name']=$ret['name'];
          $_SESSION['admin']=1;
          
          echo '<script>alert("Login Successfully'.$_SESSION['aid'].'!")</script><script>window.location.href="admin/dashboard.php"</script>';
         //header('location:dashboard.php');
        }
       else{
        echo '<script>alert("Invalid Details.")</script>';
     }

    }
    
  
  ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>INDEP 2K23</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .fancy {
  @supports (background-clip: text) or (-webkit-background-clip: text) {
    background-image: 
      url("img/bg.jpg");
    background-size: 110% auto;
    background-position: center;
    color: transparent;
    -webkit-background-clip: text;
    background-clip: text;
    
  }
}
.mobile-no-wrap {
  white-space: nowrap; /* Prevent text from wrapping on mobile */
}
.fancy {
  font-size: 2em; /* Adjust the font size as needed */
  font-weight: bold; /* Adjust the font weight as needed */
  letter-spacing: 4px; /* Adjust the letter spacing as needed */
  /* Add any additional styles you want for "INDEP 2K23" here */
}
@media (max-width: 281px) {
  
  .fancy {
  font-size: 1.3em; /* Adjust the font size as needed */
  font-weight: bold; /* Adjust the font weight as needed */
  letter-spacing: 2px; /* Adjust the letter spacing as needed */
  /* Add any additional styles you want for "INDEP 2K23" here */
}
}

    </style>

</head>

<body class="bg-gradient" style="background-color: #bcd5ff59;">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center mt-5">

            <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="d-flex align-items-center justify-content-center">

                <div class="card o-hidden border-0 shadow-lg my-5 col-lg-6">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                    <!--<div class="image-container">
                                        <img src="img/sjcbanner.png" alt="Banner Image">
                                    </div>-->
                                        <img src="img/banner.jpg" width="100%">
                                        <div class="mobile-no-wrap"><span class="fancy" style="width:100%">INDEP 2K23</span></div>
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    </div>
                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <input type="text" name="userid" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="USER ID">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                       
                                        
                                        <button type="submit" name="login" class="btn btn-primary btn-user btn-block">Login</button>
                                        
                                        
                                    </form>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>