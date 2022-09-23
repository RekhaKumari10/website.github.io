<?php
include 'connection.php';
include 'header.php';
?>


<body>
    <!-- top section -->
    <section class="head_top">
        <div class="row">
            <div class="col-12 mt-3">
                <div class="text-center">
                    <h2> <b>About Us</b></h2>
                </div>
            </div>
        </div>
    </section>
   <br><br>
    <!-- about section -->
    <section>
        <div class="container">
        <?php
                                    $sql = "select * from aboutdetail_cms where status = '1' ";
                                    $res = mysqli_query($conn, $sql);
                                   $row = mysqli_fetch_assoc($res);
                                  ?>
        <h4 class="text-center">Welcome to</h4>
        <!-- <h1 class="text-center"><b>secondary School Ranchi</b></h1> -->
        <h1 class="text-center"><b><?php echo $row['title'];?></b></h1>

         <hr>
            <div class="row">
                
                <div class="col-md-6">
                    
                    <!-- <p>
                        Secondary Public School, Greater Ranchi, under the aegis of  Society,  threads determinants of 
                        education to fashion the best educational experience for the pupils – a school that evolves perception 
                        and consistency of purpose to students with the best possible academic environment so as to send them 
                        fully prepared to meet life’s challenges with confidence and ease.
                         We at DPS Bhagalpur believe in engaging students in education as and “experience’ rather than ‘compulsion’.
                          When the distance between the teacher, mentors and the students is reduced to zero, it metamorphoses into 
                          a strong ‘guru-shisya’ bond, exciting the pupils who turn into eager participants in the teaching learning 
                          process. For, we, at Greater Ranchi believe that it is an illustrious distinction to guide the footsteps of
                           the youth. The teacher is not to create – they are to draw out.</p> -->

                           <p><?php echo $row['description'];?></p>


                    <!-- <a href="" class="btn btn-warning py-2 my-2 btn-large">Read More</a> -->
                </div>
                <div class="col-md-6">
                    <img src="uploads/<?= $row['image']; ?>" alt="banch" class="img-fluid">
                </div>

            </div>
        </div>
    </section>
<br><br>


<?php
include 'footer.php';
?>