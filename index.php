<?php
include 'connection.php';
include 'header.php';
?>

<?php

$sql = "select * from banner_cms where status = '1' ";
$res = mysqli_query($conn, $sql);
while($row= mysqli_fetch_assoc($res)){
    $banner[] =$row;
}

?>

  <!-- slider -->
  <section>
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
            <?php
                if(!empty($banner)){
                    foreach ($banner as $key => $value) {
                       if($key==1){
                        ?>
                        <div class="carousel-item active">
                          <img src="uploads/<?php echo $value['image'];?>" class="d-block w-100" alt="..." style="height:450px;">
                            <div class="carousel-caption d-none d-md-block">
                                <h1>Secondary Public School</h1>
                                <p></p>
                            </div>
                         </div>
                        
                        
                        <?php
                        
                       } else{
                        ?>
                        <div class="carousel-item">
                          <img src="uploads/<?php echo $value['image'];?>" class="d-block w-100"  style="height:450px;">
                            <div class="carousel-caption d-none d-md-block">
                                <h1>Secondary Public School</h1>
                                <p></p>
                            </div>
                        </div>
                        
                        <?php

                       }
                    }
                }
                                              
                ?>
                    <!-- <div class="carousel-item active">
                    <img src="include/image/s1.jpg" class="d-block w-100" style="height:450px ;" alt="image">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="include/image/2.jpg" class="d-block w-100" style="height:450px ;" alt="image1">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="include/image/s3.webp" class="d-block w-100" style="height:450px ;" alt="image2">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div> -->

            </div>
            <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions"
                data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions"
                data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </button>
        </div>
    </section>

    
    <!-- about section -->
    <br><br>
    <section>
        <div class="container">
            <div class="row">
            <?php
                                    $sql = "select * from about_cms where status = '1' ";
                                    $res = mysqli_query($conn, $sql);
                                   $row = mysqli_fetch_assoc($res);
                                  ?>

                <div class="col-md-6">

                   <h4>Welcome to</h4>
                    <hr>
                    <!-- <h1><b>secondary School Ranchi</b></h1> -->
                    <h1><?php echo $row['title'] ?></h1>
                    <p><?php echo $row['description'] ?></p>
                    <!-- <p>
                        Secondary Public School, Greater Ranchi, under the aegis of  Society,  threads determinants of 
                        education to fashion the best educational experience for the pupils – a school that evolves perception 
                        and consistency of purpose to students with the best possible academic environment so as to send them 
                        fully prepared to meet life’s challenges with confidence and ease.
                         We at DPS Bhagalpur believe in engaging students in education as and “experience’ rather than ‘compulsion’.
                          When the distance between the teacher, mentors and the students is reduced to zero, it metamorphoses into 
                          a strong ‘guru-shisya’ bond, exciting the pupils who turn into eager participants in the teaching learning 
                          process. For, we, at Greater Ranchi believe that it is an illustrious distinction to guide the footsteps of
                           the youth. The teacher is not to create  they are to draw out.</p> -->
                    <a href="" class="btn btn-warning py-2 my-2 btn-large">Read More</a>
                </div>
                <div class="col-md-6">
                    <img src="uploads/<?= $row['about_image']; ?>" alt="banch" class="img-fluid">
                </div>

            </div>
        </div>
    </section>

    <!-- activity section -->
    <section>
        <div class="container-fluid pt-5">
            <div class="container">
                <div class="">
                    <h4>Our School</h4>
                    <hr>
                    <h1><b>Activity</b></h1><br>
                </div>
                <div class="row">
                <?php
                                    $sql = "select * from activity_cms where status = '1' ";
                                    $res = mysqli_query($conn, $sql);
                                 
                                   while($row = mysqli_fetch_assoc($res)){
                                    $variable[]=$row;

                                   }
                                   foreach ($variable as $key => $value) {
                                    ?>
                                     <div class="col-lg-4 mb-5">
                        <div class="card border-0 bg-light shadow-sm pb-2">
                            <!-- <img class="card-img-top mb-2" src="include/image/slider1.jpg" alt=""> -->
                            <img class="card-img-top mb-2" src="uploads/<?= $value['activity_image']; ?>" style=" height:250px;" alt="">

                            <div class="card-body text-center">
                                <!-- <h4 class="card-title">Drawing Class</h4> -->
                                <h4 class="card-title"><?php echo $value['name'];?></h4>

                                <!-- <p class="card-text">Justo ea diam stet diam ipsum no sit, ipsum vero et et diam ipsum
                                    duo et no et, ipsum ipsum erat duo amet clita duo</p> -->
                                <p class="card-text"> <?php echo $value['description'];?></p>

                            </div>

                        </div>
                    </div>
                                    
                                    
                                    <?php
                                   }
                                  ?>
                   


                    <!-- <div class="col-lg-4 mb-5">
                        <div class="card border-0 bg-light shadow-sm pb-2">
                            <img class="card-img-top mb-2" src="include/image/slider1.jpg" alt="">
                            <div class="card-body text-center">
                                <h4 class="card-title">Dance Class</h4>
                                <p class="card-text">Justo ea diam stet diam ipsum no sit, ipsum vero et et diam ipsum
                                    duo
                                    et no et, ipsum ipsum erat duo amet clita duo</p>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="col-lg-4 mb-5">
                        <div class="card border-0 bg-light shadow-sm pb-2">
                            <img class="card-img-top mb-2" src="include/image/slider1.jpg" alt="">
                            <div class="card-body text-center">
                                <h4 class="card-title">Annual Day</h4>
                                <p class="card-text">Justo ea diam stet diam ipsum no sit, ipsum vero et et diam ipsum
                                    duo
                                    et no et, ipsum ipsum erat duo amet clita duo</p>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </section>

    <!-- teacher section -->
    <section>
        <div class="container-fluid pt-5">
            <div class="container">
                <div class="">
                    <h4>Our School</h4>
                    <hr>
                    <h1><b>Teacher</b></h1><br>
                </div>
                <div class="row">
                <?php
                                    $sql = "select * from teacher_cms where status = '1' ";
                                    $res = mysqli_query($conn, $sql);
                                  
                                   while($row = mysqli_fetch_assoc($res)){
                                    $variable1[]=$row;

                                   }
                                   foreach ($variable1 as $key => $value) {
                                    ?>

                                 
                    <div class="col-md-6 col-lg-3 text-center team mb-5">
                        <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%;">
                            <img class="img-fluid w-100" src="uploads/<?=$value['teacher_image']; ?>" style=" height:240px;" alt="" >
                        </div>
                        <!-- <h4>Anika Sharma</h4> -->
                        <h4><?php echo $value['name'];?></h4>
                        <!-- <h3>Math Teacher</h3> -->
                        <h3><?php echo $value['subject'];?></h3>

                    </div>
                    
                       
                               <?php
                                   }
                                  ?>

                    
                    <!-- <div class="col-md-6 col-lg-3 text-center team mb-5">
                        <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%;">
                            <img class="img-fluid w-100" src="include/image/team-2.jpg" alt="" >
                        </div>
                        <h4>Amit Kumar</h4>
                        <i>Science Teacher</i>
                    </div>
                    <div class="col-md-6 col-lg-3 text-center team mb-5">
                        <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%;">
                            <img class="img-fluid w-100" src="include/image/rk.jpg" alt="" >
                        </div>
                        <h4>Priyanka</h4>
                        <i>English Teacher</i>
                    </div>
                    <div class="col-md-6 col-lg-3 text-center team mb-5">
                        <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%;">
                            <img class="img-fluid w-100" src="include/image/team-4.jpg" alt="" >
                        </div>
                        <h4>Ashish kumar</h4>
                        <i>Computer Teacher</i>
                    </div> -->

                </div>
            </div>
        </div>
    </section>
    <br>
    <?php
    include 'footer.php';
    ?>