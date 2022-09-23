<?php
session_start();
if(!isset($_SESSION['email'])){
    header('location:index.php');
}
?>
<!DOCTYPE html> 
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>dashboard</title>

  <!-- Font Awesome Icons -->
  <?php include ("layouts/css.php")?>
 </head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <?php include "layouts/header.php"?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include ("layouts/sidebar.php")?>
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Starter Page</h1>
          </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div>
          
        </div>
        
      </div>
    
    </div> -->
 

    <!-- Main content -->
    <br><br>
    <div class="container">
      <div class="">
    <h3 class="text-center"  style="color:green;">Welcome to Secondary Public School</h3>
   <h6 class="text-center"  style="color:blue;">(A Co-Educational English Medium School)</h6>
   <h4 class="text-center"  style="color:green;">Shiv Shakti Nagar,Kokar,Ranchi</h4>
   <h6 class="text-center" style="color:blue;">+91-8804652781</h6>
   <br>
   <br>
   <br>
   <h4 class="text-center" style="color:red;">Powered By @RK Software Services Pvt Ltd</h4>
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
 <?php include "layouts/footer.php";?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<?php include "layouts/js.php";?>
</body>
</html>
