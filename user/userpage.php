<?php

@include('../config.php');

session_start();

if(!isset($_SESSION['user_name'])){
  header('location:/index.php');
}


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./style.css">
    <title>Memeber</title>
    <style>
    body {font-family: Arial, Helvetica, sans-serif;}
    form {border: 3px solid #f1f1f1;}
    
    input[type=text], input[type=password] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }
    
    button {
      background-color: #04AA6D;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
    }
    
    button:hover {
      opacity: 0.8;
    }
    
    .cancelbtn {
      width: auto;
      padding: 10px 18px;
      background-color: #f44336;
    }
    
    .imgcontainer {
      text-align: left;
      margin: 24px 0 12px 0;
    }
    
    img.avatar {
      width: 20%;
      border-radius: 50%;
    }
    
    .container {
      padding: 16px;
    }
    
    span.psw {
      float: right;
      padding-top: 16px;
    }
    
    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
      span.psw {
         display: block;
         float: none;
      }
      .cancelbtn {
         width: 100%;
      }
    }
    </style>
</head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<body>
  <!-- <div id="preloader"></div> -->


    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#" class="logo">
            <i class='bx'><img src="/images/logo.png" height="100%" width="100%" style="object-fit:blue;" alt=""></i>
            <div class="logo-name"><span><sub>Communi</span>Gate</sub></div>
        </a>
        <ul class="side-menu">
            <li><a href="dashboard.php"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
            <li class="active"><a href="member.php"><i class='bx bx-user'></i>Members</a></li>
            <li><a href="announcement.php"><i class='bx bx-message-alt-detail'></i>Announcements<?php @include('../config.php');
             
             $select="SELECT id FROM `annoucement`";
             
             $result = mysqli_query($conn, $select);
             $rowcount = mysqli_num_rows( $result );
             
             if($rowcount>0)
             {
               echo " <span id='count'> $rowcount </span>";
             }
            
             ?> </a></li>
            <li><a href="maintainence-bill.php"><i class='bx bxs-bank' ></i>Maintainence-Bill<?php @include('../config.php');
             
             $name=$_SESSION['user_name'];

             $select="SELECT bill_id FROM `maintenance_bill` WHERE name='$name' && status='unpaid'";
             
             $result = mysqli_query($conn, $select);
             $rowcount = mysqli_num_rows( $result );
             
             if($rowcount>0)
             {
               echo " <span id='count'> $rowcount </span>";
             }
            
             ?> </a></li>
            <li><a href="staff.php"><i class='bx bxs-user-badge'></i>Staff</a></li>
            <li><a href="visitor.php"><i class='bx bx-group'></i>Visitor</a></li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="/logout.php" class="logout">
                    <i class='bx bx-log-out-circle'></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>


    <div class="content">
      <?php include('nav.php'); ?>
    <main>   
    
    <a class="btn" href="member.php" role="button">
        <button>Back</button>
        </a>
        <?php
        
        $hno=$_GET['id'];

        $sql="SELECT * FROM members WHERE hno=$hno";
        
        $res=mysqli_query($conn,$sql);
        
        if(mysqli_num_rows($res)>0)
        {
            while($row=mysqli_fetch_assoc($res)){
                // echo $row['name'];
        
        
        ?>
        <form action="" method="post">
          <div class="imgcontainer">
          <img src="<?php if ($row['img_source'] == '../images/') { echo '../images/defualt.png'; } else { echo $row['img_source']; } ?>" style="width:35%; height:35%; border-radius:50%;">
          </div>
        
          <div class="container">
            <label for="uname"><b>Hno:<?php echo $row['hno']; ?></b></label><br>
            <label for="uname"><b>Name:<?php echo $row['name']; ?></b></label><br>
            <label for="uname"><b>Total-Member:<?php echo $row['total'] ?></b></label><br>
            <label for="uname"><b>Mobile-No.:<?php echo $row['mno'] ?></b></label><br>
            <label for="uname"><b>Owener:<?php if ($row['isrented'] == 'owner') { echo $row['name']; } else {  }  ?></b></label>
          </div>
        
        </form>

<?php
 }
}

?>
       
</main>  
    </div>


    <script src="index.js"></script>
</body>
</html>

