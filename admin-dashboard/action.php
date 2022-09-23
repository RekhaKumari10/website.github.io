<?php
session_start();
include '../connection.php';

function Imageupload($dir, $inputname, $allext, $pass_width, $pass_height, $pass_size, $newname)
{
    $error = "";
    if (file_exists($_FILES["$inputname"]["tmp_name"])) {
        //do this contain any file check
        $file_extension = strtolower(pathinfo($_FILES["$inputname"]["name"], PATHINFO_EXTENSION));
        
        if (in_array($file_extension, $allext)) {
            //file extension check
            list($width, $height, $type, $attr) = getimagesize($_FILES["$inputname"]["tmp_name"]);
            $image_weight = $_FILES["$inputname"]["size"];
            if ($width <= "$pass_width" && $height <= "$pass_height" && $image_weight <= "$pass_size") {
                //dimension check
                $tmp = $_FILES["$inputname"]["tmp_name"];
                $extension[1] = "jpg";
                //$extension = explode(".", $_FILES["$inputname"]["name"]);
                $name = $newname . "." . $extension[1];
                //$extension[1] ="jpg";
                if (move_uploaded_file($tmp, "$dir" . $newname . "." . $extension[1])) {
                    return true;
                    //echo "$dir $newname.$extension[1]";
                }
            } else {
                $error .= "Please upload photo size of $pass_width X $pass_height";
                //echo $error;
            }
        } else {
            $error .= "Please Upload an Image";
            //echo $error;
        }
    } else {
        //print_r($_FILES);
        $error .= "Please Select an Image";
        // $error;
    }
    return $error;
}


// login section

if(isset($_POST['login'])){
    $username =$_POST['email'];
    $password =$_POST['password'];
    
    $sql3="select * from admin_login where password='$password' and email='$username'";
    $res=mysqli_query($conn,$sql3);
    $nr=mysqli_num_rows($res);
    if($nr==1){
        $row=mysqli_fetch_assoc($res);
        $_SESSION['email']=$username;
        $_SESSION['id']=$row['id'];
        header('Location:dashboard.php');
    }else{
        $_SESSION['msg']='Invalid Username or Password';
        header('location:index.php');
    }
}



// registration

if(isset($_POST['save'])){
    // echo "<pre>";
    // print_r($_POST);die;
	$student_name = $_POST['student_name'];
	$class = $_POST['class'];
	$section = $_POST['section'];
	$gender= $_POST['gender'];
    $addmission_no= $_POST['addmission_no'];
    $roll_no= $_POST['roll_no'];
    $adhar_no= $_POST['adhar_no'];
    $dob= $_POST['dob'];
    $address= $_POST['address'];
    $f_prefix= $_POST['f_prefix'];
    $father_name= $_POST['father_name'];
    $m_prefix= $_POST['m_prefix'];
    $mother_name= $_POST['mother_name'];
    $occupation= $_POST['occupation'];
    $income= $_POST['income'];
    $mobile= $_POST['mobile'];
    $guardian_mobile= $_POST['guardian_mobile'];
    $image =  $_FILES['image']['name'];
	$photo = explode('.', $image);
	$img =  $photo[0];
    $dir = "../uploads/";
	$allext = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "webp", "WEBP");
    $check = Imageupload($dir, 'image', $allext, "10000", "10000", '10000000', $img);
	$img .= ".jpg";
    // $= $_POST[''];
    
	$sql="INSERT INTO `registration`( `student_name`, `class`, `section`, `gender`, `addmission_no`, `roll_no`, `adhar_no`, `dob`, `address`, `f_prefix`, `father_name`, `m_prefix`, `mother_name`, `occupation`, `income`, `mobile`, `guardian_mobile`, `image`) VALUES ('$student_name','$class','$section','$gender','$addmission_no','$roll_no','$adhar_no','$dob','$address','$f_prefix','$father_name','$m_prefix','$mother_name','$occupation','$income','$mobile','$guardian_mobile' ,'$image')";
   
    $res=mysqli_query($conn,$sql);
    if ($res==true) {
        // echo "Add successfully";
        $_SESSION['msg'] = "Save Successfully !!";
        header('location:studentlist.php');
    } else {
        $_SESSION['msg'] = " Not Save !!";
        header('location:studentlist.php');
        }
}


// student list

if(isset($_POST['listbtn'])){
    $sql = "SELECT * FROM `registration` WHERE `status`=1";
    $qry = mysqli_query($conn,$sql);
    $i=0;
    while($row = mysqli_fetch_assoc($qry)){
       $i++;
       $html  = '<tr>';
       $html.= '<td>'.$i.'</td>';
       $html.= '<td>'.$row['student_name'].'</td>';
       $html.= '<td>'.$row['class'].'</td>';
       $html.= '<td>'.$row['roll_no'].'</td>';
       $html.= '<td>'.$row['gender'].'</td>';
       $html.= '<td>'.$row['adhar_no'].'</td>';
       $html.= '<td>'.$row['dob'].'</td>';
       $html.= '<td>'.$row['mobile'].'</td>';
       $html.= '<td>'.$row['address'].'</td>';
       $html.= '<td><a href="update.php?id='.$row['id'].'" class="btn btn-sm btn-success">Edit</a> <a href="action.php?id='.$row['id'].'&dltname=dltname" class="btn btn-sm btn-danger">Delete</a></td>';
       echo $html;
    }
   }



//delete registration details:---
  if(isset($_GET['stu_detail_delete'])){
    $id = $_GET['stu_detail_delete'];
$sql="DELETE FROM `registration` WHERE `id`='$id'";
$qry=mysqli_query($conn,$sql);
// print_r($qry);
if($qry==true){
    // echo"delete successfully";
    $_SESSION['msg']="deleted successfully";
    header("Location:".$_SERVER['HTTP_REFERER']);
}
else {
    // echo"something error";
    $_SESSION['msg']="Something Error";
    header("Location:".$_SERVER['HTTP_REFERER']);
}
}

// update  registration detail

if(isset($_POST['edit'])){
// print_r($_POST);die;
$id= $_POST['id'];
$student_name= $_POST['student_name'];
$class= $_POST['class'];
$roll_no= $_POST['roll_no'];
$dob= $_POST['dob'];
$section= $_POST['section'];
$mobile= $_POST['mobile'];
$address= $_POST['address'];
$adhar_no= $_POST['adhar_no'];
$sql= "UPDATE `registration` SET  `student_name`='$student_name', `class`='$class', `roll_no`='$roll_no', `dob`='$dob', `section`='$section', `mobile`='$mobile',`address`='$address',`adhar_no`='$adhar_no'  WHERE `id`='$id'";
// print_r($sql);
// die;
$qry= mysqli_query($conn, $sql);
// print_r($qry);die;
if($qry==true){
    // echo'updated';
    $_SESSION['msg']="updated successfully";
    header('location: studentlist.php');
}
else{
    echo"not updated";
}
}



//    student payment

if(isset($_POST['pay'])){
    echo "<pre>";
    // print_r($_POST);die;
	$addmission_no = $_POST['addmission_no'];
	$receipt_no= $_POST['receipt_no'];
	$date= $_POST['date'];
	$time= $_POST['time'];
	$no_of_months= $_POST['no_of_months'];
	$months= $_POST['months'];
    $payment_mode= $_POST['payment_mode'];
    $fee = $_POST['fee'];
    $fine = $_POST['fine'];
    $xmfees = $_POST['xmfees'];
    $game = $_POST['game'];
    $books = $_POST['books'];
    $lib = $_POST['lib'];
    $trans = $_POST['trans'];
    $comp = $_POST['comp'];
    $annfee = $_POST['annfee'];
    $otherfees = $_POST['otherfees'];
    $total= $_POST['total'];
    $paid= $_POST['paid'];
    $due= $_POST['due'];
    
    $sql ="INSERT INTO `payment`(`addmission_no`, `receipt_no`, `date`, `time`, `no_of_months`, `months`, `payment_mode`, `fee`, `fine`, `xmfees`, `game`, `books`, `lib`, `trans`, `comp`, `annfee`, `otherfees`, `total`, `paid`, `due`)
     VALUES ('$addmission_no',$receipt_no,'$date','$time','$no_of_months', '$months','$payment_mode','$fee',' $fine',' $xmfees','$game','$books','$lib','$trans','$comp','$annfee','$otherfees','$total','$paid','$due')";
   
   $res=mysqli_query($conn,$sql);
    if ($res==1)
     {
        // echo "Add successfully";
        $last_id = $conn->insert_id;
        $_SESSION['last_id']= $last_id;
        // $id = `id`;
        // $_SESSION['id']= $id;
        header('location: Receipt.php');
         
    }
}
// payment

if(isset($_POST['payments'])){
    // print_r($_POST);die;
    if (!empty($_POST['admwise'])) {
        $admwise = $_POST['admwise'];
   
    $sql= "SELECT * FROM `registration` WHERE `addmission_no`= $admwise";
    // print_r($sql);die;
    $query= mysqli_query($conn,$sql);
    $num_row= mysqli_num_rows($query);
    if($num_row >0 ){
     
        $row = mysqli_fetch_assoc($query);
// print_r($row);die;
    $val= json_encode($row);
    echo $val;
}

}
}

// payment listing admission number wise:-----
if(isset($_POST['listbutton'])){
    if (!empty($_POST['admsearch'])) {
        $admsearch = $_POST['admsearch'];
   
    // $sql= "SELECT * FROM `payment` WHERE `admission_no`= $admsearch";
    $sql= "SELECT payment.*,registration.student_name, registration.father_name,registration.class,registration.section,registration.roll_no,registration.mobile FROM `payment` LEFT JOIN `registration` ON payment.addmission_no=registration.addmission_no WHERE payment.addmission_no=$admsearch;";
    //  print_r($sql);die;
    $query= mysqli_query($conn,$sql);
    $num_row= mysqli_num_rows($query);
    if($num_row >0 ){
        $i=0;
    
    while($row = mysqli_fetch_assoc($query)){
        $i++;
      $html = '<tr>';
      $html .= '<td>'.$i.'</td>';
      $html .= '<td>'.$row['receipt_no'].'</td>';
      $html .= '<td>'.$row['addmission_no'].'</td>';
      $html .= '<td>'.$row['student_name'].'</td>';
      $html .= '<td>'.$row['father_name'].'</td>';
      $html .= '<td>'.$row['roll_no'].'</td>';
      $html .= '<td>'.$row['mobile'].'</td>';
      $html .= '<td>'.$row['class'].'</td>';
      $html .= '<td>'.$row['section'].'</td>';
      $html .= '<td>'.$row['total'].'</td>';
      $html .= '<td>'.$row['paid'].'</td>';
      $html .= '<td>'.$row['due'].'</td>';
      $html.= '<td><a href="update.php?id='.$row['id'].'" class="btn btn-sm btn-success">Edit</a> <a href="action.php?id='.$row['id'].'&dltname=dltname" class="btn btn-sm btn-danger">Delete</a></td>';

    //   $html.= '<td> <a href="" class="btn btn-sm btn-danger">Delete</a> <a href="payReceipt.php" class="btn btn-sm btn-success">print</a></td>';
      $html .= '</tr>';
   
    }
    echo $html;
}
else{
    $html = '<tr>';
    $html .= '<td colspan="9">No Record </td>';
    $html .= '</tr>';
    echo $html;
}
}
}

// payment listing class wise:-----

if(isset($_POST['classbutton'])){
    if (!empty($_POST['classsearch'])) {
        $classsearch = $_POST['classsearch'];
   
    // $sql= "SELECT * FROM `payment` WHERE `admission_no`= $admsearch";
    $sql= "SELECT payment.*,registration.student_name, registration.father_name,registration.class,registration.section,registration.roll_no,registration.mobile FROM `payment` LEFT JOIN `registration` ON payment.addmission_no=registration.addmission_no WHERE registration.class=$classsearch";
    //  print_r($sql);die;
    $query= mysqli_query($conn,$sql);
    $num_row= mysqli_num_rows($query);
    if($num_row >0 ){
        $i=0;
    
    while($row = mysqli_fetch_assoc($query)){
        $i++;
      $html = '<tr>';
      $html .= '<td>'.$i.'</td>';
      $html .= '<td>'.$row['receipt_no'].'</td>';
      $html .= '<td>'.$row['addmission_no'].'</td>';
      $html .= '<td>'.$row['student_name'].'</td>';
      $html .= '<td>'.$row['father_name'].'</td>';
      $html .= '<td>'.$row['roll_no'].'</td>';
      $html .= '<td>'.$row['mobile'].'</td>';
      $html .= '<td>'.$row['class'].'</td>';
      $html .= '<td>'.$row['section'].'</td>';
      $html .= '<td>'.$row['total'].'</td>';
      $html .= '<td>'.$row['paid'].'</td>';
      $html .= '<td>'.$row['due'].'</td>';
      $html.= '<td><a href="update.php?id='.$row['id'].'" class="btn btn-sm btn-success">Edit</a> <a href="action.php?id='.$row['id'].'&dltname=dltname" class="btn btn-sm btn-danger">Delete</a></td>';

    //   $html.= '<td> <a href="" class="btn btn-sm btn-danger">Delete</a> <a href="payReceipt.php" class="btn btn-sm btn-success">print</a></td>';
      $html .= '</tr>';
      echo $html;
    }
  
}
else{
    $html = '<tr>';
    $html .= '<td colspan="9">No Record </td>';
    $html .= '</tr>';
    echo $html;
}
}
}


// admin change password

if (isset($_POST['pass_update'])) {
	// print_r($_POST);
	$agent_email = $_SESSION['email'];
	$oldpass = $_POST['oldpass'];
	$newpass = $_POST['newpass'];
	$compass = $_POST['compass'];
	 $sql = "select password from admin_login where email='$agent_email'"; 
	$res = mysqli_query($conn, $sql);
	$rows = mysqli_fetch_assoc($res);
	// print_r($rows);
	$dbpass = $rows['password'];
	if ($oldpass != $dbpass) {
		$_SESSION['msg'] = "Your old Password is Wrong !!!";
		header('location:change-password.php');
	} elseif ($newpass != $compass) {
		$_SESSION['msg'] = "Password does not Matched !!!";
		header('location:change-password.php');
	} else {
		$sql = "UPDATE admin_login SET password = '$newpass' WHERE `email`='$agent_email'";
		if ($conn->query($sql) === TRUE) {
			$_SESSION['msg'] = "Your Password Update Successfully !!!";
			header('location:change-password.php');
		}
	}
}

?>


<!-- .............................cms section.................................................. -->

<!-- banner upload -->
<?php

function BannerImageupload($dir, $inputname, $allext, $pass_width, $pass_height, $pass_size, $newname)
{
	if (file_exists($_FILES["$inputname"]["tmp_name"])) {
		//do this contain any file check
		$file_extension = strtolower(pathinfo($_FILES["$inputname"]["name"], PATHINFO_EXTENSION));
		$error = "";
		if (in_array($file_extension, $allext)) {
			//file extension check
			list($width, $height, $type, $attr) = getimagesize($_FILES["$inputname"]["tmp_name"]);
			$image_weight = $_FILES["$inputname"]["size"];
			if ($width <= "$pass_width" && $height <= "$pass_height" && $image_weight <= "$pass_size") {
				//dimension check
				$tmp = $_FILES["$inputname"]["tmp_name"];
				$extension[1] = "jpg";
				//$extension = explode(".", $_FILES["$inputname"]["name"]);
				$name = $newname . "." . $extension[1];
				//$extension[1] ="jpg";
				if (move_uploaded_file($tmp, "$dir" . $newname . "." . $extension[1])) {
					return true;
					//echo "$dir $newname.$extension[1]";
				}
			} else {
				$error .= "Please upload photo size of $pass_width X $pass_height";
				//echo $error;
			}
		} else {
			$error .= "Please Upload an Image";
		}
	} 
	return $error;
}


// banner cms
if (isset($_POST['banner_upload'])) {
  	$photo = $_FILES['image']['name'];
	$photo = explode('.', $photo);
	$banner = time() . $photo[0];
	$dir = "../uploads/";
	$allext = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "webp", "WEBP");
	$check = BannerImageupload($dir, 'image', $allext, "10000", "10000", '10000000', $banner);
    // print_r($check);die;
	if ($check === true) {
		$banner .= ".jpg";

		if ($stmt = $conn->prepare("insert into banner_cms set image=?")) {
			$stmt->bind_param('s', $banner);
			$stmt->execute();
			if ($stmt->affected_rows == 1) {
				$_SESSION['msg'] = "Banner Added Successfully !!!";
				header("Location: " . $_SERVER["HTTP_REFERER"]);
			} else {
				$_SESSION['msg'] = "User Not Added !!!";
				header("Location: " . $_SERVER["HTTP_REFERER"]);
			}
		} else {
			$_SESSION['msg'] = "User Not Added !!!";
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
	} else {
		$_SESSION['msg'] = $check;
		header("Location: " . $_SERVER["HTTP_REFERER"]);
	}
}

   //delete banner
   if(isset($_GET['banner_delete'])){
   $id = $_GET['banner_delete'];
$sql="DELETE FROM `banner_cms` WHERE `id`='$id'";
$qry=mysqli_query($conn,$sql);
// print_r($qry);
if($qry==true){
    // echo"delete successfully";
    $_SESSION['msg']="deleted successfully";
    header("Location:".$_SERVER['HTTP_REFERER']);
}
else {
    // echo"something error";
    $_SESSION['msg']="Something Error";
    header("Location:".$_SERVER['HTTP_REFERER']);
}
}

// about cms

if (isset($_POST['about'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
      if (isset($_FILES['about_image']['name'])) {
        $image = $_FILES['about_image']['name'];
        $photo = explode('.', $image);
        $image = $photo[0];

        $dir = "../uploads/";
        $allext = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "webp", "WEBP");
        $check = Imageupload($dir, 'about_image', $allext, "10000", "10000", '10000000', $image);

        if ($check === true) {
            // echo "insert"; die;
            $image .= ".jpg";
            $sql = "insert into about_cms (`title`,`description`,`about_image`) values('$title','$description','$image')";
            // print_r($sql);die;
            $res= mysqli_query($conn,$sql);
            if($res==1){
                $_SESSION['msg'] = "added Successfully !!!";
				header("Location: " . $_SERVER["HTTP_REFERER"]);
                // $_SESSION['msg'] = "Update Successfully !!";
                // header('location:admin-dashboard/cms.php'); 
            }
        }  
    }
}

   //delete about
   if(isset($_GET['about_delete'])){
    $id = $_GET['about_delete'];
$sql="DELETE FROM `about_cms` WHERE `id`='$id'";
$qry=mysqli_query($conn,$sql);
// print_r($qry);
if($qry==true){
    // echo"delete successfully";
    $_SESSION['msg']="deleted successfully";
    header("Location:".$_SERVER['HTTP_REFERER']);
}
else {
    // echo"something error";
    $_SESSION['msg']="Something Error";
    header("Location:".$_SERVER['HTTP_REFERER']);
}
}


// activity section cms

if (isset($_POST['activity'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
      if (isset($_FILES['activity_image']['name'])) {
        $image = $_FILES['activity_image']['name'];
        $photo = explode('.', $image);
        $image = $photo[0];

        $dir = "../uploads/";
        $allext = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "webp", "WEBP");
        $check = Imageupload($dir, 'activity_image', $allext, "10000", "10000", '10000000', $image);

        if ($check === true) {
            // echo "insert"; die;
            $image .= ".jpg";
            $sql = "insert into activity_cms (`name`,`description`,`activity_image`) values('$name','$description','$image')";
            // print_r($sql);die;
            $res= mysqli_query($conn,$sql);
            // print_r($res);die;
            if($res==1){
                $_SESSION['msg'] = "added Successfully !!!";
				header("Location: " . $_SERVER["HTTP_REFERER"]);
              
            }
        }  
    }
}

   //delete activity
   
   if(isset($_GET['activity_delete'])){
    $id = $_GET['activity_delete'];
    // print_r($id);die;
$sql="DELETE FROM `activity_cms` WHERE `id`='$id'";
$qry=mysqli_query($conn,$sql);
// print_r($qry);
if($qry==true){
    // echo"delete successfully";
    $_SESSION['msg']="deleted successfully";
    header("Location:".$_SERVER['HTTP_REFERER']);
}
else {
    // echo"something error";
    $_SESSION['msg']="Something Error";
    header("Location:".$_SERVER['HTTP_REFERER']);
}
}

// teacher cms

if (isset($_POST['teacher'])) {
    $name= $_POST['name'];
    $subject = $_POST['subject'];
      if (isset($_FILES['phone']['name'])) {
        $image = $_FILES['teacher_image']['name'];
        $photo = explode('.', $image);
        $image = $photo[0];

        $dir = "../uploads/";
        $allext = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "webp", "WEBP");
        $check = Imageupload($dir, 'teacher_image', $allext, "10000", "10000", '10000000', $image);

        if ($check === true) {
            // echo "insert"; die;
            $image .= ".jpg";
            $sql = "insert into teacher_cms (`name`,`subject`,`teacher_image`) values('$name','$subject','$image')";
            // print_r($sql);die;
            $res= mysqli_query($conn,$sql);
            if($res==1){
                $_SESSION['msg'] = "updated Successfully !!!";
				header("Location: " . $_SERVER["HTTP_REFERER"]);
              
            }
        }  
    }
}

   //delete teacher
   if(isset($_GET['teacher_delete'])){
    $id = $_GET['teacher_delete'];
$sql="DELETE FROM `teacher_cms` WHERE `id`='$id'";
$qry=mysqli_query($conn,$sql);
// print_r($qry);
if($qry==true){
    // echo"delete successfully";
    $_SESSION['msg']="deleted successfully";
    header("Location:".$_SERVER['HTTP_REFERER']);
}
else {
    // echo"something error";
    $_SESSION['msg']="Something Error";
    header("Location:".$_SERVER['HTTP_REFERER']);
}
}

// gallary section cms

if (isset($_POST['gallary'])) {
  $photo = $_FILES['image']['name'];
  $photo = explode('.', $photo);
  $image = time() . $photo[0];
  $dir = "../uploads/";
  $allext = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "webp", "WEBP");
  $check = Imageupload($dir, 'image', $allext, "10000", "10000", '10000000', $image);
  // print_r($check);die;
  if ($check === true) {
      $image .= ".jpg";

      if ($stmt = $conn->prepare("insert into gallary_cms set image=?")) {
          $stmt->bind_param('s', $image);
          $stmt->execute();
          if ($stmt->affected_rows == 1) {
              $_SESSION['msg'] = "image Added Successfully !!!";
              header("Location: " . $_SERVER["HTTP_REFERER"]);
          } else {
              $_SESSION['msg'] = "User Not Added !!!";
              header("Location: " . $_SERVER["HTTP_REFERER"]);
          }
      } else {
          $_SESSION['msg'] = "User Not Added !!!";
          header("Location: " . $_SERVER["HTTP_REFERER"]);
      }
  } else {
      $_SESSION['msg'] = $check;
      header("Location: " . $_SERVER["HTTP_REFERER"]);
  }
}
   //delete galary
   if(isset($_GET['gallary_delete'])){
    $id = $_GET['gallary_delete'];
$sql="DELETE FROM `gallary_cms` WHERE `id`='$id'";
$qry=mysqli_query($conn,$sql);
// print_r($qry);
if($qry==true){
    // echo"delete successfully";
    $_SESSION['msg']="deleted successfully";
    header("Location:".$_SERVER['HTTP_REFERER']);
}
else {
    // echo"something error";
    $_SESSION['msg']="Something Error";
    header("Location:".$_SERVER['HTTP_REFERER']);
}
}



// adress cms

if (isset($_POST['address'])) {
    $location= $_POST['location'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
     
            $sql = "insert into address_cms (`location`,`email`,`phone`) values('$location','$email','$phone')";
            // print_r($sql);die;
            $res= mysqli_query($conn,$sql);
            if($res==1){
                $_SESSION['msg'] = "updated Successfully !!!";
				header("Location: " . $_SERVER["HTTP_REFERER"]);
              
            }
        }  
    
   //delete address
   if(isset($_GET['address_delete'])){
    $id = $_GET['address_delete'];
$sql="DELETE FROM `banner_cms` WHERE `id`='$id'";
$qry=mysqli_query($conn,$sql);
// print_r($qry);
if($qry==true){
    // echo"delete successfully";
    $_SESSION['msg']="deleted successfully";
    header("Location:".$_SERVER['HTTP_REFERER']);
}
else {
    // echo"something error";
    $_SESSION['msg']="Something Error";
    header("Location:".$_SERVER['HTTP_REFERER']);
}
}


// about detail cms

if (isset($_POST['about_detail'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
      if (isset($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $photo = explode('.', $image);
        $image = $photo[0];

        $dir = "../uploads/";
        $allext = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "webp", "WEBP");
        $check = Imageupload($dir, 'image', $allext, "10000", "10000", '10000000', $image);

        if ($check === true) {
            // echo "insert"; die;
            $image .= ".jpg";
            $sql = "insert into aboutdetail_cms (`title`,`description`,`image`) values('$title','$description','$image')";
            // print_r($sql);die;
            $res= mysqli_query($conn,$sql);
            if($res==1){
                $_SESSION['msg'] = "added Successfully !!!";
				header("Location: " . $_SERVER["HTTP_REFERER"]);
                // $_SESSION['msg'] = "Update Successfully !!";
                // header('location:admin-dashboard/cms.php'); 
            }
        }  
    }
}


?>















