<?php

include('../config.php');

$id=$_GET['id'];

$date=date('y-m-d');

$insert = "update `maintenance_bill` set status='paid',payment_date='$date' WHERE bill_id='$id'";
mysqli_query($conn, $insert);
header('location:maintainence-bill.php');

//$sql="SELECT * FROM members WHERE hno=$hno";

//$result=mysqli_query($conn,$sql);
?>