<?php
/* database connection*/
$con = mysqli_connect("localhost","root","") or die("cannot connect");
mysqli_select_db($con,"rentalDB");
?>