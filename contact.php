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
                    <h2> <b> Contact Us</b></h2>
                </div>
            </div>
        </div>
    </section>
       <br><br>
       <!-- form section -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <form action="">
                    <div class=" form-row">
                        <div class="col 6">
                            <input type="text" class="form-control" placeholder="Enter Name">
                        </div>
                        <div class="col 6">
                            <input type="email" class="form-control" placeholder="Enter Email">
                            </div>
                    </div>
                    <br>
                    <div class=" form-row">
                        <div class="col 12">
                            <input type="text" class="form-control" placeholder="Subject">
                        </div>
                    </div>
                    <br>
                    <div class=" form-row">
                        <div class="col 12">
                           <textarea name="message" id="" rows="5" cols="96" placeholder="Message"></textarea>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-4">
            <?php
                                    $sql = "select * from address_cms where status = '1' ";
                                    $res = mysqli_query($conn, $sql);
                                   $row = mysqli_fetch_assoc($res);
                                  ?>
                <div class="info">
                    <div class="adress">
                        <h4> <i class="fa-solid fa-location-dot"></i> <b> Location</b></h4>
                        <!-- <p>Shiv Shakti Nagar, Kokar,Ranchi</p> -->
                        <p> <?php echo $row['location'] ?></p>
                       
                    </div><br>
                    <div class="email">
                        <h4>  <i class="fa-solid fa-envelope"></i> <b>Email</b></h4>
                        <!-- <p>school@gmail.com</p><br> -->
                        <p> <?php echo $row['email'] ?></p><br>

                    </div>
                    <div class="phone">
                        <h4>  <i class="fa-solid fa-phone"></i> <b>Call</b></h4>
                        <!-- <p>+91-9905462625</p> -->
                        <p> <?php echo $row['phone'] ?></p>

                    </div>
                </div>
                <?php  ?>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3662.242562481576!2d85.35433281401484!3d23.379440708764815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f4e3cf056d6b71%3A0x579bcc3029c3afb4!2sShiv%20shakti%20nagar!5e0!3m2!1sen!2sin!4v1659097326545!5m2!1sen!2sin" width="1260" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>

<?php
include 'footer.php';
?>