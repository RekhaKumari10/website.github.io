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

  <title>studentlist</title>

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
      <h3 class="text-center" style="color:orange;">Registration List</h3>
      <hr>

      <section class="content">
        <div class="container mt-5">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Student Details</h3>
                  <a class="btn btn-success" style="float:right" ; type="button" href="registration.php">ADD</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="banner_cms">
                    <div class="container">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="table-responsive">
                            <table class="table table-striped" id="myTable">
                              <thead>
                                <tr>
                                  <th>S.no</th>
                                  <th>Adm_no</th>
                                  <th>Student</th>
                                  <th>Class</th>
                                  <th>Section</th>
                                  <th>Roll</th>
                                  <th>DOB</th>
                                  <th>Mobile</th>
                                  <th>Address</th>
                                  <th>Gender</th>
                                  <th>AdharNo</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody id="tablelist">

                                <?php
                                $sql = "select * from registration where status=1 ";
                                $res = mysqli_query($conn, $sql);
                                $sn = 0;
                                while ($row = mysqli_fetch_assoc($res)) {
                                  $sn++;
                                ?>
                                  <tr>
                                    <td><?= $sn; ?></td>
                                    <td><?= $row['addmission_no']; ?> </td>
                                    <td><?= $row['student_name']; ?> </td>
                                    <td><?= $row['class']; ?> </td>
                                    <td><?= $row['section']; ?> </td>
                                    <td><?= $row['roll_no']; ?> </td>
                                    <td><?= $row['dob']; ?> </td>
                                    <td><?= $row['mobile']; ?> </td>
                                    <td><?= $row['address']; ?> </td>
                                    <td><?= $row['gender']; ?> </td>
                                    <td><?= $row['adhar_no']; ?> </td>
                                    <td width="20%">
                                      <input type="hidden" id="deletee"  value="<?php echo $row['id']; ?>"></input>
                                      <!-- <button class="btn btn-danger btn-sm ml-5">Delete</button> -->
                                      <a type="button" href="action.php?stu_detail_delete=<?php echo $row['id'];?>" ><i class="fa-solid fa-trash" style="color:red;" aria-hidden="true"></i></a>

                                    <!-- <a type="button" onclick="deletelist()" href="" ><i class="fa-solid fa-trash" style="color:red;" aria-hidden="true"></i></a> -->
                                    <a  href="updateregistration.php?id=<?php echo $row['id'];?>"><i class="fa-solid fa-pen-to-square" style="color:green;" aria-hidden="true"></i></a>
                                    </td>
                                  </tr>
                                <?php } ?>

                              </tbody>
                              </tbody>
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
    function listajax() {
      $.ajax({
        type: 'POST',
        url: 'action.php',
        data: {
          listbtn: 'listbtn'
        },
        success: function(result) {
          $('#tablelist').html(result);
          // console.log(result);
          // alert(result);
        }

      });
    }


// delete
// function deletelist(){
//   debugger;
//   var deletee=$("#deletee").val();
//   var check = confirm("do you want to delete?");
//   if(check==true){
//     $.ajax({
//     type: 'POST',
//         url: 'action.php',
//         data: {
//           deletee: deletee,delete_id: 'delete_id'
//         },
//         success: function(result) {
//           console.log(result);
//           if(result==true){
//             alert('delete succesfully !');
//           }else{
//             alert('Something Error');
//           }
//           location.reload();
//           // console.log(result);
//           // alert(result);
//         }
//   })

//   }
  
// }

  </script>

  <!-- datatable -->
  <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
    });
  </script>
</body>

</html>


