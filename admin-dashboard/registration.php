<?php
// include '../connection.php';
// session_start();
// if(!isset($_SESSION['email'])){
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

    <title>registration</title>

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
    


            <!-- Main content -->
            
    <div class="container">
        <br>
    <h3 class="text-center" style="color:orange;" text-shadow: 2px 10px orange;>Registration </h3>
    <br>
    <!-- <font color="blue"> -->
    <form action="action.php" method="POST" enctype="multipart/form-data">
    <!-- <div class="col-md-7"> -->
        <div class="row mt-3">
    <div class="form-group col-md-8">

    <div class="row">
   <div class="form-group col-md-3">
    <label for="exampleInputEmail1">Student Name</label>
   </div>
   <div class="form-group col-md-9">
       <input type="text" class="form-control" name="student_name" aria-describedby="emailHelp">
   </div>
    </div>

    <div class="row">
   <div class="form-group col-md-3">
    <label for="exampleInputEmail1">Class</label>
   </div>
   <div class="form-group col-md-9">
       <input type="text" class="form-control" name="class" aria-describedby="emailHelp">
   </div>
    </div>
   
    <div class="row">
   <div class="form-group col-md-3">
    <label for="exampleInputEmail1">section</label>
   </div>
     <div class="form-group col-md-9">
       <input type="text" class="form-control" name="section" aria-describedby="emailHelp">
   </div>
    </div>

   
    </div>
  <div class="form-group col-md-4">
    <label style="border:1px solid black; height:150px; width:150px;"></label>
    <input type="file" class="form-control-file" name="image">
     </div>
  </div>
  <div class="row">
   <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Gender</label>
   </div>
   <div class="form-group col-md-4">
   <select class="form-control" name="gender">
    <option>select</option>
      <option>male</option>
      <option>female</option>
      <option>other</option>
      </select>
   </div>
   <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Addmission No</label>
   </div>
   <div class="form-group col-md-4">
       <input type="text" class="form-control" name="addmission_no" aria-describedby="emailHelp">
   </div>
  </div>

  <div class="row">
   <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Adhar Number</label>
   </div>
   <div class="form-group col-md-4">
       <input type="text" class="form-control" name="adhar_no" aria-describedby="emailHelp">
   </div>
   <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Roll NO</label>
   </div>
   <div class="form-group col-md-4">
       <input type="text" class="form-control" name="roll_no" aria-describedby="emailHelp">
   </div>
  </div>

  <div class="row">
   <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Date of birth</label>
   </div>
   <div class="form-group col-md-10">
       <input type="date" class="form-control" name="dob" aria-describedby="emailHelp">
   </div>
    </div>

    <div class="row">
   <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Address</label>
   </div>
   <div class="form-group col-md-10">
   <textarea class="form-control" name="address" rows="3"></textarea>
   </div>
    </div>
   
    <!-- <div class="form-group">
    <label for="exampleFormControlTextarea1">Address</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div> -->

  <br>

<h3 class="text-center mb-5" style="color:orange;"> <u> Personal Details</u></h3>
    <!-- <form> -->
        <div class="row">
        <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Father's Name</label>
        </div>
        <div class="form-group  col-md-1">
      <select class="form-control" name="f_prefix">
    <option value="">select</option>
     <option>Mr</option>
    </select>
  </div>
  <div class="form-group col-md-3">
    <input type="text" class="form-control"  name="father_name" aria-describedby="emailHelp">
   </div>

   <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Mother's Name</label>
        </div>
        <div class="form-group  col-md-1">
       <select class="form-control" name="m_prefix">
    <option value="">select</option>
     <option>Mrs</option>
    </select>
  </div>
  <div class="form-group col-md-3">
    <input type="text" class="form-control" name="mother_name" aria-describedby="emailHelp">
   </div>
 </div>

 <div class="row">
   <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Occupation</label>
   </div>
   <div class="form-group col-md-4">
       <input type="text" class="form-control" name="occupation" aria-describedby="emailHelp">
   </div>
   <div class="form-group col-md-2">
    <label for="exampleInputEmail1">income</label>
   </div>
   <div class="form-group col-md-4">
       <input type="text" class="form-control" name="income" aria-describedby="emailHelp">
   </div>
  </div>

  <div class="row">
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Mobile</label>
   </div>
   <div class="form-group col-md-4">
       <input type="text" class="form-control" name="mobile" aria-describedby="emailHelp">
   </div>
   <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Guardian Mobile</label>
   </div>
   <div class="form-group col-md-4">
       <input type="text" class="form-control" name="guardian_mobile" aria-describedby="emailHelp">
   </div>
   </div>
   <br>
   <div class="form-group">
    <div class="row">
        <div class="col-md-12 text-center">
        <button type="submit" name="save" class="btn btn-success" onclick="register()">Submit</button>
        </div>
      
    </div>

   </div>
   <br>
</form>
<!-- <font> -->
       </div>
                
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