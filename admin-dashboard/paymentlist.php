<?php
include '../connection.php';
session_start();
if(!isset($_SESSION['email'])){
    header('location:index.php');
}
    // if(isset($_SESSION['msg'])){
    //   $msg=$_SESSION['msg'];
    //   echo "<script> alert('.$msg.')</script>";
    // }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>paymentlist</title>

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
      <!-- <div class="container"> -->
      <br>
      <h3 class="text-center" style="color:orange;">Payment List</h3>
      <hr>
        <div class="row col-md-10">
      <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Class:</label>
   </div>
   <div class="form-group col-md-3">
   <input type="text" class="form-control" name="class"id="classsearch" onkeyup="search_class()" aria-describedby="emailHelp">

   </div>
   <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Admission No:</label>
   </div>
   <div class="form-group col-md-3">
   <input type="text" class="form-control" name="adm" id="admsearch" onkeyup="search_admission()" aria-describedby="emailHelp">

   </div>
   
  </div>
      <section class="content">
        <div class="container mt-5">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Payment Details</h3>
                  <a class="btn btn-success" style="float:right" ; type="button" href="fee.php">ADD</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="banner_cms">
                    <div class="container">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="table-responsive">
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th>S.no</th>
                                  <th>Receipt No</th>
                                  <th>Admission No</th>
                                  <th>Student name</th>
                                  <th>Father Name</th>
                                  <th>Roll no</th>
                                  <th>Mobile No</th>
                                  <th>Class</th>
                                  <th>Session</th>
                                  <th>Total</th>
                                  <th>Paid</th>
                                  <th>Due</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <thead id="classlist">
                              </thead>
                              <thead id="paymentlist">
                              </thead>
                              </table>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- /.card-body -->
              </div>

              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
      </section>


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
  
  
  <script>

// classwise search
function search_class(){
    // debugger;
    $('#paymentlist').empty();
    var classsearch= $('#classsearch').val();
  $.ajax({
    type : 'POST',
    url : 'action.php',
    data: {classsearch:classsearch,classbutton:'classbutton'},
    success: function(result){
        // alert(result);
        $('#classlist').html(result);

    }

  });

 }

 function search_admission(){
    // debugger;
    $('#classlist').empty();
    var admsearch= $('#admsearch').val();
  $.ajax({
    type : 'POST',
    url : 'action.php',
    data: {admsearch:admsearch,listbutton:'listbutton'},
    success: function(result){
        // alert(result);
        $('#paymentlist').html(result);

    }

  });

 }
 </script>

</body>

</html>

