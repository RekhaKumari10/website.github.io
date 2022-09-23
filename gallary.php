<?php
include 'connection.php';
include 'header.php';
?>

<body>
   
<section class="head_top">
    <div class="row">
        <div class="col-12 mt-3">
            <div class="text-center">
                <h2> <b> Gallary</b></h2>
            </div>
        </div>
    </div>
</section>
<br><br>
<section>
    <div class="container mt-2 mb-2">
    <div class="row">
    <?php
                                  $sql = "select * from gallary_cms where status = '1' ";
                                     $res = mysqli_query($conn, $sql);
                                     
                                     while($row = mysqli_fetch_assoc($res)){
                                        $image[]=$row;
    
                                       }
                                       foreach ($image as $key => $value) {
                                        ?>

                                    
     
     
            <div class="col-lg-3 col-md-3 col-sm-12 mb-5">
                <img src="uploads/<?php echo $value['image'];?>" style="height:150px; width:250px;" class="img-fluid" alt="">
            </div>
            <?php 
        }
         ?>
            <!-- <div class="col-lg-3 col-md-3 col-sm-12">
                <img src="include/image/blog-1.jpg"  class="img-fluid" alt="">
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
                <img src="include/image/blog-1.jpg"  class="img-fluid" alt="">
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
                <img src="include/image/blog-1.jpg"  class="img-fluid" alt="">
            </div> -->
        </div>
        <br>
        
    </div>
</section>
<br><br>

<?php
include 'footer.php';
?>