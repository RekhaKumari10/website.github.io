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

    <title>cms section</title>

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

            <section class="imageupl">
                <div class="container">
                    <h3>Banner Upload</h3><br>
                    <div class="row">
                        <div class="col-md-4">
                            <form action="action.php" method="post" enctype="multipart/form-data">
                                <input type="file" name="image" accept="image/*" id="fileToUpload" required=""></br></br>
                                <button class="btn btn-success btn-sm" name="banner_upload">Submit</button>
                            </form>
                        </div>

                        <div class="col-md-8">
                            <table class="table table-striped" border="2 solid black">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>Banner</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                           
                                    <?php

                                      $sql = "select * from banner_cms where status = '1' ";
                                    //   print_r( $sql);die;
                                      $res = mysqli_query($conn, $sql);
                                      $sn = 0;
                                      while ($row = mysqli_fetch_assoc($res)) {
                                        // print_r($row);die;
                                        $sn++;
                                    ?>
                                    <tr>
                                        <td><?= $sn; ?></td>
                                        <td><img src="../uploads/<?= $row['image']; ?>" width="50" height="50"></td>
                                        <td><a class="btn btn-danger btn-sm" href="action.php?banner_delete=<?php echo $row['id'];?>">
                                        <i class="fa-solid fa-trash"></i></a></td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </section>
            <br>
          <hr>


            <!-- cms about section -->
            <hr>
            <section>
                <div class="container">
                    <h3>Manage About Section</h3><br>
                    <div class="row">
                        <div class="col-md-4">
                                  <?php
                                    $sql = "select * from about_cms where status = '1' ";
                                    $res = mysqli_query($conn, $sql);
                                   $row = mysqli_fetch_assoc($res);
                                  ?>

                            <form action="action.php" method="post" enctype="multipart/form-data">
                                <input type="text" class="form-control" name="title" ><br>
                                <textarea class="form-control" name="description" cols="30" rows="4"></textarea><br>
                                <input type="file" name="about_image" accept="image/*" id="fileToUpload" required=""></br></br>
                                <button class="btn btn-success btn-sm" name="about">Submit</button>
                            </form>
                        </div>
                        <div class="col-md-8">
                        <div class="table-responsive">
                            <table class="table table-striped" border="2 solid black">
                                <thead>
                         
                                    <tr>
                                        <th>S.no</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php

                         $sql = "select * from about_cms where status = '1' ";
                        $res = mysqli_query($conn, $sql);
                            $sn = 0;
                           while ($row = mysqli_fetch_assoc($res)) {
                               $sn++;
                                     ?>
                                    <tr>
                                        <td><?= $sn; ?></td>
                                        <td><?php echo $row['title'];?></td>
                                        <td><?php echo $row['description'];?></td>
                                        <td><img src="../uploads/<?= $row['about_image']; ?>" width="50" height="50"></td>
                                        <td>
                                        <a class="btn btn-danger btn-sm" href="action.php?about_delete=<?php echo $row['id'];?>"><i class="fa-solid fa-trash"></i></a>
                                        <a class="btn btn-success btn-sm" href=""><i class="fa-solid fa-pen-to-square"></i></a>

                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </section>
            <br>
          <hr>


              <!-- cms activity section -->
              <hr>
            <section>
                <div class="container">
                    <h3>Manage Activity Section</h3><br>
                    <div class="row">
                    <div class="col-md-4">
                    <?php
                                    $sql = "select * from activity_cms where status = '1' ";
                                    $res = mysqli_query($conn, $sql);
                                   $row = mysqli_fetch_assoc($res);
                                  ?>
                            <form action="action.php" method="post" enctype="multipart/form-data">
                            <input type="text" class="form-control" name="name"><br>
                            <textarea class="form-control" name="description" cols="30" rows="4"></textarea><br>
                             <input type="file" name="activity_image" accept="image/*" id="fileToUpload" required=""></br></br>
                                <button class="btn btn-success btn-sm" name="activity">Submit</button>
                            </form>
                        </div>
                        <div class="col-md-8">
                        <div class="table-responsive">
                            <table class="table table-striped" border="2 solid black">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>Activity</th>
                                        <th>description</th>
                                        <th>image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php

                         $sql = "select * from activity_cms where status = '1' ";
                        $res = mysqli_query($conn, $sql);
                            $sn = 0;
                           while ($row = mysqli_fetch_assoc($res)) {
                               $sn++;
                                     ?>
                                    <tr>
                                        <td><?= $sn; ?></td>
                                        <td><?php echo $row['name'];?></td>
                                        <td><?php echo $row['description'];?></td>
                                        <td><img src="../uploads/<?= $row['activity_image']; ?>" width="50" height="50"></td>
                                        <td>
                                            <a class="btn btn-danger btn-sm" href="action.php?activity_delete=<?php echo $row['id'];?>"><i class="fa-solid fa-trash"></i></a>
                                            <a class="btn btn-success btn-sm" href=""><i class="fa-solid fa-pen-to-square"></i></i></a>
                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </section>
            <br>
          <hr>

            <!-- cms teacher section -->
            <hr>
            <section>
                <div class="container">
                    <h3>Manage teacher Section</h3><br>
                    <div class="row">
                         <div class="col-md-4">
                            <form action="action.php" method="post" enctype="multipart/form-data">
                            <input type="text" class="form-control" name="name"><br>
                            <input type="text" class="form-control" name="subject"><br>
                                <input type="file" name="teacher_image" accept="image/*" id="fileToUpload" required=""></br></br>
                                <button class="btn btn-success btn-sm" name="teacher">Submit</button>
                            </form>
                        </div>
                        <div class="col-md-8">
                        <div class="table-responsive">
                            <table class="table table-striped" border="2 solid black">
                                <thead>
                                    
                                    <tr>
                                        <th>S.no</th>
                                        <th>Name</th>
                                        <th>Subject</th>
                                        <th>image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                      <?php

                         $sql = "select * from teacher_cms where status = '1' ";
                        $res = mysqli_query($conn, $sql);
                            $sn = 0;
                           while ($row = mysqli_fetch_assoc($res)) {
                               $sn++;
                                     ?>
                                    <tr>
                                        <td><?= $sn; ?></td>
                                        <td><?php echo $row['name'];?></td>
                                        <td><?php echo $row['subject'];?></td>
                                        <td><img src="../uploads/<?= $row['teacher_image']; ?>" width="50" height="50"></td>
                                        <td>
                                            <a class="btn btn-danger btn-sm" href="action.php?teacher_delete=<?php echo $row['id'];?>"><i class="fa-solid fa-trash"></i></a>
                                            <a class="btn btn-success btn-sm" href=""><i class="fa-solid fa-pen-to-square"></i></i></a>
                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </section>
            <br>
          <hr>



            <!-- gallary section -->
              <hr>
                <section class="gallaryupd">
                <div class="container">
                    <h3>Manage Gallary Section</h3><br>
                    <div class="row">
                        <div class="col-md-4">
                            <form action="action.php" method="post" enctype="multipart/form-data">
                                <input type="file" name="image" accept="image/*" id="fileToUpload" required=""></br></br>
                                <button class="btn btn-success btn-sm" name="gallary">Submit</button>
                            </form>
                        </div>

                        <div class="col-md-8">
                            <table class="table table-striped" border="2 solid black">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>Photo</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                      $sql = "select * from gallary_cms where status = '1' ";
                                    //   print_r( $sql);die;
                                      $res = mysqli_query($conn, $sql);
                                      $sn = 0;
                                      while ($row = mysqli_fetch_assoc($res)) {
                                        // print_r($row);die;
                                        $sn++;
                                    ?>
                                        <tr>
                                        <td><?= $sn; ?></td>
                                        <td><img src="../uploads/<?= $row['image']; ?>" width="50" height="50"></td>
                                        <td><a class="btn btn-danger btn-sm" href="action.php?gallary_delete=<?php echo $row['id'];?>"><i class="fa-solid fa-trash"></i></a>
                                        <a class="btn btn-success btn-sm" href=""><i class="fa-solid fa-pen-to-square"></i></a>
                                  </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </section>
          <br>
          <hr>

  


          <!-- cms about detail section -->
          <hr>
            <section>
                <div class="container">
                    <h3>Manage About detail Section</h3><br>
                    <div class="row">
                        <div class="col-md-4">
                               <form action="action.php" method="post" enctype="multipart/form-data">
                                <input type="text" class="form-control" name="title" ><br>
                                <textarea class="form-control" name="description" cols="30" rows="4"></textarea><br>
                                <input type="file" name="image" accept="image/*" id="fileToUpload" required=""></br></br>
                                <button class="btn btn-success btn-sm" name="about_detail">Submit</button>
                            </form>
                        </div>
                        <div class="col-md-8">
                        <div class="table-responsive">
                            <table class="table table-striped" border="2 solid black">
                                <thead>
                         
                                    <tr>
                                        <th>S.no</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php

                         $sql = "select * from aboutdetail_cms where status = '1' ";
                        $res = mysqli_query($conn, $sql);
                            $sn = 0;
                           while ($row = mysqli_fetch_assoc($res)) {
                               $sn++;
                                     ?>
                                    <tr>
                                        <td><?= $sn; ?></td>
                                        <td><?php echo $row['title'];?></td>
                                        <td><?php echo $row['description'];?></td>
                                        <td><img src="../uploads/<?= $row['image']; ?>" width="50" height="50"></td>
                                        <td>
                                        <a class="btn btn-danger btn-sm" href="action.php?about_delete=<?php echo $row['id'];?>"><i class="fa-solid fa-trash"></i></a>
                                        <a class="btn btn-success btn-sm" href=""><i class="fa-solid fa-pen-to-square"></i></a>

                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </section>
            <br>
          <hr>

           <!-- cms address section -->
   <hr>
            <section>
                <div class="container">
                    <h3>Manage Address Section</h3><br>
                    <div class="row">
                         <div class="col-md-4">
                            <form action="action.php" method="post" enctype="multipart/form-data">
                            <input type="text" class="form-control" name="location" placeholder="location" required=""><br>
                            <input type="text" class="form-control" name="email" placeholder="email" required=""><br>
                            <input type="text" class="form-control" name="phone" placeholder="phone no" required=""><br>
                                <button class="btn btn-success btn-sm" name="address">Submit</button>
                            </form>
                        </div>
                        <div class="col-md-8">
                        <div class="table-responsive">
                            <table class="table table-striped" border="2 solid black">
                                <thead>
                                    
                                    <tr>
                                        <th>S.no</th>
                                        <th>Location</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                      <?php

                         $sql = "select * from address_cms where status = '1' ";
                        $res = mysqli_query($conn, $sql);
                            $sn = 0;
                           while ($row = mysqli_fetch_assoc($res)) {
                               $sn++;
                                     ?>
                                    <tr>
                                        <td><?= $sn; ?></td>
                                        <td><?php echo $row['location'];?></td>
                                        <td><?php echo $row['email'];?></td>
                                        <td><?php echo $row['phone'];?></td>

                                        <td>
                                            <a class="btn btn-danger btn-sm" href="action.php?address_delete=<?php echo $row['id'];?>"><i class="fa-solid fa-trash"></i></a>
                                            <a class="btn btn-success btn-sm" href=""><i class="fa-solid fa-pen-to-square"></i></i></a>
                                        </td>
                                    </tr>
                                        <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </section>
            <br>
          <hr>




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