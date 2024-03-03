<?php
$con = new mysqli('localhost', 'root', '', 'portfolioDB');

if($con)  {
   // echo "Connection successfulll";
}else{
    die(mysqli_error($con));
}
?>