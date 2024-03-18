<?php

include('../config.php');

$hno=$_GET['id'];

$sql="SELECT * FROM members WHERE hno=$hno";

$result=mysqli_query($conn,$sql);

$row=mysqli_fetch_assoc($result);

$name=$row['name'];
$mno=$row['mno'];
$total=$row['total'];
$email=$row['email'];


if(isset($_POST['submit'])){

    $filename = $_FILES["uf"]["name"];
    $tempname = $_FILES["uf"]["tmp_name"];
    $folder = "../images/".$filename;
   
    move_uploaded_file($tempname,$folder);
  

    $name = $_POST['name'];
    $mno =  $_POST['mno'];
    $total = $_POST['total'];
    $email=$_POST['email'];
    $pass=md5($_POST['password']);
    $cpass=md5($_POST['cpassword']);
 
    if($pass != $cpass){
        $error[] = 'password not matched!';
     }else{
          $insert = "update `members` set img_source='$folder', hno='$hno', email='$email', name='$name', mno='$mno', password='$pass' where hno=$hno";
          mysqli_query($conn, $insert);
          header('location:member.php');

          exit;
    }
    };
 
 
 
 ?>
 




<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Update Profile</title>

   <!-- custom css file link  -->
   
   <!-- <link rel="stylesheet" href="/admin/visitor/popup.css"> -->
   <link rel="stylesheet" href="/login.css">
   <!-- <link rel="stylesheet" href="/admin/visitor/style.css"> -->

</head>
<body>
<div id="preloader"></div>
<div class="form-container">
    <form action="" method="POST" enctype="multipart/form-data">
    <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      }; 
      ?>
         <img src="<?php if ($row['img_source'] == '../images/') { echo '../images/defualt.png'; } else { echo $row['img_source']; } ?>" style="width:50%; height:50%; border-radius:50%;">   <br>       

          <label for="img"><b>Enter Photo:</b></label>
          <input type="file" name="uf" id="">
          
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" required placeholder="Enter Name" value="<?php echo ($name);  ?>">
    
          <label for="mobileNumber">Mobile Number:</label>
          <input type="text" id="mobileNumber" name="mno" required placeholder="Enter Mobile Number" value="<?php echo ($mno);  ?>">
    
          <label for="totalMembers">Total Member</label>
          <input type="text" id="totalMembers" name="total" name="" required placeholder="Enter Total Member" value="<?php echo ($total);  ?>">
          
          <label for="totalMembers">Enter Email</label>
          <input type="email" name="email" required placeholder="enter your email" value="<?php echo ($email);  ?>">
         
          <label for="totalMembers">Enter Password</label>
          <input type="password" name="password" required placeholder="enter your password">
          
          <label for="totalMembers">Enter Confirm Password</label>
          <input type="password" name="cpassword" required placeholder="confirm your password">
     
          <input type="submit" name="submit"  class="form-btn" value="Update Profile">
          <a href="/admin/dashboard.php" id="cancelButton"  class="form-btn" style="width:100%;">Cancel</a>
        
    </form>
</div>


</body>
</html>

