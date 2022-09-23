<?php
// session_start();
// include '../connection.php';
// if(isset($_SESSION['msg'])){
//     $msg=$_SESSION['msg'];
//     echo "<script> alert('.$msg.')</script>";
//   }
?>
<?php
include '../connection.php';
session_start();
if (!isset($_SESSION['email'])) {
    header('location:index.php');
}
if (isset($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
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

    <title>update</title>

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

            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Update Student Details</h3>

                            </div>
                            <div class="card-body">

                                <form method="post" action="action.php" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <?php
                                        $id = $_GET['id'];
                                        $sql = "SELECT * from registration  WHERE `id`='$id' ";
                                        $res = mysqli_query($conn, $sql);
                                        $row = mysqli_fetch_assoc($res);

                                        ?>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>" class="form-control">

                                                <label class="small mb-1" for="about_image"> Name</label>
                                                <input type="text" name="student_name" value="<?php echo $row['student_name'] ?>" class="form-control py-4" placeholder="Enter trainer name">
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="about_image">Class</label>
                                                <input type="text" name="class" value="<?php echo $row['class'] ?>" class="form-control py-4" placeholder="Enter department">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="about_image"> Roll NO</label>
                                                <input type="text" name="roll_no" value="<?php echo $row['roll_no'] ?>" class="form-control py-4" placeholder="Enter trainer name">
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="about_image">DOB</label>
                                                <input type="text" name="dob" value="<?php echo $row['dob'] ?>" class="form-control py-4" placeholder="Enter department">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="about_image"> Section</label>
                                                <input type="text" name="section" value="<?php echo $row['section'] ?>" class="form-control py-4" placeholder="Enter trainer name">
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="about_image">Phone No</label>
                                                <input type="text" name="mobile" value="<?php echo $row['mobile'] ?>" class="form-control py-4" placeholder="Enter department">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="about_image"> Address</label>
                                                <input type="text" name="address" value="<?php echo $row['address'] ?>" class="form-control py-4" placeholder="Enter trainer name">
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="about_image">Adhar No</label>
                                                <input type="text" name="adhar_no" value="<?php echo $row['adhar_no'] ?>" class="form-control py-4" placeholder="Enter department">
                                            </div>
                                        </div>
                                    </div>

                            </div>
                            <center><button type="submit" name="edit" class="btn btn-success" style="margin: 15px;padding:10px;border-radius:5px;">Save</button></center>

                            <!-- <div class="form-group mt-4 mb-0">
                        <input type="submit" name="update" class="btn btn-success btn-block" value="Update">
                    </div> -->

                            </form>
                        </div>
                    </div>
                </div>
            </div>




            <!-- <div class="box" style="border:2px solid black; margin-left:20px; margin-right:20px; margin-top:20px;">
                <form action="action.php" method="POST" enctype="multipart/form-data">
                    <div class="container">
                        <div class="row">
                            <?php
                            $id = $_GET['id'];
                            $sql = "SELECT * from registration  WHERE `id`='$id' ";
                            $res = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($res);

                            ?>

                            <input  type="hidden" name="id" value="<?php echo $row['id'] ?>" class="form-control">
                           
                            <div class="col">
                                <label>Name:</label><span><input style="margin:10px;" type="text" name="student_name" value="<?php echo $row['student_name'] ?>" class="form-control" placeholder="Re Enter Name"></span>
                            </div>
                            <div class="col">
                                <label>Class:</label><span><input style="margin:10px;" type="text" name="class" value="<?php echo $row['class'] ?>" class="form-control" placeholder="Re Enter class"></span>
                            </div>
                            <div class="col">
                                <label>Roll No.:</label><span><input style="margin:10px;" type="text" name="roll_no" value="<?php echo $row['roll_no'] ?>" class="form-control" placeholder="Re Enter rollno"></span>
                            </div>
                            <div class="col">
                                <label>DOB:</label><span><input style="margin:10px;" type="text" name="dob" value="<?php echo $row['dob'] ?>" class="form-control" placeholder="Re Enter DOB"></span>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col">
                                <label>Section:</label><span><input style="margin:10px;" type="text" name="section" value="<?php echo $row['section'] ?>" class="form-control" placeholder="Re Enter section"></span>
                            </div>
                            <div class="col">
                                <label>Phone No:</label><span><input style="margin:10px;" type="text" name="mobile" value="<?php echo $row['mobile'] ?>" class="form-control" placeholder="Re Enter phonenumber"></span>
                            </div>
                            <div class="col">
                                <label>Address:</label><span><input style="margin:10px;" type="text" name="address" value="<?php echo $row['address'] ?>" class="form-control" placeholder="Re Enter address"></span>
                            </div>
                            <div class="col">
                                <label>Adhar No:</label><span><input style="margin:10px;" type="text" name="adhar_no" value="<?php echo $row['adhar_no'] ?>" class="form-control" placeholder="Re Enter adhar no"></span>
                            </div>
                        </div>
                    </div>
                    <center><button type="submit" name="update" class="btn btn-success" style="margin: 15px;padding:10px;border-radius:5px;">Save</button></center>
                </form>
            </div> -->







            <!-- </div> -->


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