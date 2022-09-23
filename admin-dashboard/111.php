<?php
session_start();
if (!isset($_SESSION['email'])) {
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
                <br>
                <h4 class="text-center" style="color:orange;"> Student Payments:-</h4>
                <hr>
                <form action="action.php" method="POST" enctype="multipart/form-data">
                    <div class="row col-md-10">
                        <div class="col-md-2">
                            <label>Admission No:</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="admission_no" onkeyup="payment() "id="admwise">
                        </div>
                        <div class="col-md-2">
                            <label>Receipt No:</label>
                        </div>
                        <div class="col-md-2">
                            <input type="text" name="receipt" value="<?php echo(rand(10,100000)); ?>">
                        </div>
                    </div>
                    <br>
                    
                    <br>
                    <h5 class="" style="color:blue;">Student Details:-</h5>
                    <hr>
                    <div class="row col-md-12">
                        <div class="col-md-2">
                            <label>Name</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="name">
                        </div>
                        <div class="col-md-2">
                            <label>Father Name:</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="fname">
                        </div>
                    </div>
                    <br>
                    <div class="row col-md-12">
                        <div class="col-md-2">
                            <label>Class:</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="name">
                        </div>
                        <div class="col-md-2">
                            <label>Roll No:</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="fname">
                        </div>
                    </div>
                    <br>
                    <br>

                    <h5 class="" style="color:blue;"> Payments:-</h5>
                    <hr>
                   <div class="row">
                  <div class=" col-md-7">
                  <table class="table">

                  </table>
                  </div>


                  <div class=" col-md-1"></div>

                  <div class="col-md-4">
                    <div class="row">
                    <div class="col-md-4"> <label>Name:</label></div>
                    <div class="col-md-8"><input type="text" name="name" id="stdname"></div>
                    </div>
                    <div class="row">
                    <div class="col-md-4"> <label>Roll No:</label></div>
                    <div class="col-md-8"><input type="text" name="name" id="rollno"></div>
                    </div>
                        </div>
                   </div>                 

                </form>
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

<script>
    function payment(){
    debugger;
    var admwise= $('#admwise').val();
  $.ajax({
    type : 'POST',
    url : 'action.php',
    data: {admwise:admwise, payments:'payments'},
    dataType: 'JSON',
    success: function(result){
        $('#father')
        $('#rollno').val(result.rollno)
        $('#stdname').val(result.stdname)
        $('#class').val(result.class)
        $('#section').val(result.section)
        $('#fname').val(result.fname)
        
        alert(result);
        // console.log(result);
        // $('#months').val(result.months)
    }

  });
}
</script>

</body>

</html>