<?php
// session_start();
// if (!isset($_SESSION['email'])) {
//     header('location:index.php');
// }
?>
<?php
include '../connection.php';
session_start();
if (!isset($_SESSION['email'])) {
    header('location:index.php');
}
if(isset($_SESSION['msg'])){
    $msg=$_SESSION['msg'];
    echo "<script> alert('.$msg.')</script>";
  }
  unset($_SESSION['msg']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>dashboard</title>

    <!-- Font Awesome Icons -->
    <?php include("layouts/css.php") ?>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include "layouts/header.php" ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include("layouts/sidebar.php") ?>
        <!-- Content Wrapper. Contains page content -->

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            <!-- Main content -->
            <div class="py-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="text-center">Change Password</h5>
                                </div>
                                <div class="card-body">
                                    <form action="action.php" method="post" >
                                        <div class="form-group mb-3">
                                            <label>Old Password</label>
                                            <input type="password" class="form-control" name="oldpass" placeholder="enter old password">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>New Password</label>
                                            <input type="password" class="form-control" name="newpass" placeholder="enter new password">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Confirm Password</label>
                                            <input type="password" class="form-control" name="compass" placeholder="enter confirm password">
                                        </div>
                                        <div class="form-group mb-3">
                                            <button type="submit" name="pass_update" class="btn btn-success w-100">update password</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>





            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <?php include "layouts/footer.php"; ?>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <?php include "layouts/js.php"; ?>



</body>

</html>