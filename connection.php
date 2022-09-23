<?php
if(isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST']=='localhost'){
    $conn = new mysqli("localhost","root","","website_school");
}

if($conn->connect_errno) {
       echo "connection failed";
 }
date_default_timezone_set('Asia/kolkata');
?>