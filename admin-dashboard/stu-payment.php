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
            <!-- style="border: 2px solid blue" -->
            <br>
        <h3 class="text-center"><font color="orange">Student Payments</font></h3><hr>
        <br>
    <!-- <font color="blue"> -->
      <form action="action.php" method="post">
        <div class="row">
        <div class="col">Admission No: </div>
        <div class="col"><input type="text" name="addmission_no" onkeyup="payment()" id="admwise"></div>
        <div class="col"style="text-align:center">Receipt No: </div>
        <div class="col"><input type="text" name="receipt_no" value="<?php echo(rand(10,100000)); ?>"></div>
    </div>
    <br><br>
    <!-- </font> -->

    <h3><font color="purple">Payments</font></h3><hr>
    <!-- <font color="blue"> -->
    <div class="row">
        <div class="col">Date:</div>
        <div class="col">
            <td><input type="date" name="date"></td>
            <td><input type="time" name="time"></td>
        </div>
        <div class="col" style="text-algn:center"">Enter No of Months</div>
        <div class="col"><input type="text" name="no_of_months"></div>
    </div>
</br>
    <div class="row">
        <div class="col"></div>
        <div class="col">Enter Months:</div>
        <div class="col"><input type="text" name="months"></div>
        <div class="col"></div>
        <div class="col">Payment Mode:</div>
        <div class="col"><input type="text" name="payment_mode"></div>
        <div class="col"></div>
    </div>
    <br>
    <div class="row">
        <div class="col">
        <table class="table table-striped" border="3px">
            <thead>
                <tr>
                  <th scope="col">Serial no</th>
                  <th scope="col">Payment </th>
                  <th scope="col">Payment Rs</th>
                </tr>
              </thead>
        <tbody>
          <tr>
            <th scope="row">01</th>
            <td>Tution Fee</td>
            <td><input type="text" id="fee" name="fee" onkeyup="find_total()"></td>
          </tr>
          <tr>
            <th scope="row">02</th>
            <td>Late Fine</td>
            <td><input type="text" id="fine" name="fine" onkeyup="find_total()"></td>
          </tr>
          <tr>
            <th scope="row">03</th>
            <td>Examination Fee</td>
            <td><input type="text" id="xmfees" name="xmfees" onkeyup="find_total()"></td>
          </tr>
          <tr>
            <th scope="row">04</th>
            <td>Game/Sports Fee</td>
            <td><input type="text" id="game" name="game" onkeyup="find_total()"></td>
          </tr>
          <tr>
            <th scope="row">05</th>
            <td>Books and Stationary</td>
            <td><input type="text" id="books" name="books" onkeyup="find_total()"></td>
          </tr>
          <tr>
            <th scope="row">06</th>
            <td>Library Charge</td>
            <td><input type="text" id="lib" name="lib" onkeyup="find_total()"></td>
          </tr>
          <tr>
            <th scope="row">07</th>
            <td>Transport Fee</td>
            <td><input type="text" id="trans" name="trans" onkeyup="find_total()"></td>
          </tr>
          <tr>
            <th scope="row">08</th>
            <td>Computer Fee</td>
            <td><input type="text" id="comp" name="comp" onkeyup="find_total()"></td>
          </tr>
          <tr>
            <th scope="row">09</th>
            <td>Annual Charge</td>
            <td><input type="text" id="annfee" name="annfee"onkeyup="find_total()"></td>
          </tr>
          <tr>
            <th scope="row">10</th>
            <td>Other Charge</td>
            <td><input type="text" id="otherfees" name="otherfees" onkeyup="find_total()"></td>
          </tr>
          <tr>
            <td colspan="2" style="text-align:right">Total:</td>
            <td><input type="text" id="total" name="total" onkeyup="due_details()"></td>
          </tr>
          <tr>
            <td colspan="2" style="text-align:right">Paid:</td>
            <td><input type="text" id="paid" name="paid" onkeyup="due_details()"></td>
          </tr>
          <tr>
            <td colspan="2" style="text-align:right">Due:</td>
            <td width="35px"><input type="text" id="due" name="due"></td>
          </tr>
        </tbody>
      </table>
      </div>

      <div class="col">
        <table class="table">
        <tbody>
            <tr>
                <td style="text-align:right">Name:    </td>
                <td style="width:40px"><input type="text" id="student_name" readonly></td>
              </tr>
            <tr>
                <tr>
                    <td style="text-align:right">Father's Name:    </td>
                    <td style="width:40px"><input type="text" id="father_name" readonly></td>
                  </tr>
                  <tr>
                    <td style="text-align:right">Address:    </td>
                    <td style="width:40px"><textarea rows="3" cols="23" id="address" readonly></textarea></td>
                  </tr>
              <td style="text-align:right">Class:    </td>
              <td style="width:40px"><input type="text" id="class" readonly></td>
            </tr>
            <tr>
                <td style="text-align:right">Roll No:    </td>
                <td style="width:40px"><input type="text" id="rollno" readonly></td>
              </tr>
              <tr>
                <td style="text-align:right">Section:    </td>
                <td style="width:40px"><input type="text" id="section" readonly></td>
              </tr>
        </tbody>
        </table> 
      </div>
      </div>
      <br><br>
      <!-- <div class="row">
        <div class="col" style="text-align:center">UserName:</div>
        <div class="col"><input type="text" placeholder="admin"></div>
        <div class="col"></div>
    </div>
    <br><br> -->
      <div class="row">
        <div class="col"></div>
        <div class="col"><button type="submit" class="btn btn-success" name="pay">Make Payment</button></div>
        <div class="col"><button type="button" class="btn btn-warning">Cancel</button></div>
        <div class="col"></div>
    </div>
    </form>
     <br>
    </div>
<!-- </font> -->
           
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
    dataType: 'json',
    success: function(result){
      // alert(result);
      // console.log(result);
        $('#student_name').val(result.student_name);
        $('#father_name').val(result.father_name);
        $('#address').val(result.address);
        $('#rollno').val(result.roll_no);
        $('#class').val(result.class);
        $('#section').val(result.section);
        
         // console.log(result);
        // $('#months').val(result.months)
    }

  });
}

// find total
function find_total(){
  var fee = $('#fee').val();
  var fine = $('#fine').val();
  var xmfees = $('#xmfees').val();
  var game = $('#game').val();
  var books = $('#books').val();
  var lib = $('#lib').val();
  var trans = $('#trans').val();
  var comp = $('#comp').val();
  var annfee = $('#annfee').val();
  var otherfees = $('#otherfees').val();
if (fee == "")
 var fee= 0;
 if (fine=="")
 var fine= 0;
 if(xmfees=="")
 var xmfees= 0;
 if(game=="")
 var game= 0;
 if(books=="")
 var books= 0;
 if(lib=="")
 var lib= 0;
 if(trans=="")
 var trans= 0;
 if(comp=="")
 var comp= 0;
 if(annfee=="")
 var annfee= 0;
 if(otherfees=="")
 var otherfees= 0;

 var Total =(parseFloat(fee) + parseFloat(fine) + parseFloat(xmfees) + parseFloat(game) + parseFloat(books)
 + parseFloat(lib) + parseFloat(trans) + parseFloat(comp) + parseFloat(annfee) + parseFloat(otherfees));
 var Final = parseFloat(Total);
 $('#total').val(Final);

}

function due_details(){
  var total = $('#total').val();
  var paid = $('#paid').val();
  var due = (parseFloat(total)-parseFloat(paid));
  $('#due').val(due);
}

</script>
</body>

</html>