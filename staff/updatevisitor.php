<?php

include('../config.php');

$id=$_GET['id'];

$insert = "update `visitor` set status='0' WHERE id='$id'";
mysqli_query($conn, $insert);
header('location:visitor.php');

//$sql="SELECT * FROM members WHERE hno=$hno";

//$result=mysqli_query($conn,$sql);
?>