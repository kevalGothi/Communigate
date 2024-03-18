<?php

@include '../config.php';

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
    <title>Staff</title>
</head>

<body>
<div id="preloader"></div>
    <!-- Sidebar -->
    <div class="sidebar">
    <a href="#" class="logo">
            <i class='bx'><img src="/images/logo.png" height="55%" width="55%" style="" alt=""></i>
            <div class="logo-name"><span><sub>Communi</span>Gate</sub></div>
        </a>
        <ul class="side-menu">
            <li><a href="dashboard.php"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
            <li><a href="member.php"><i class='bx bx-user'></i>Members</a></li>
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
            <li class="active"><a href="staff.php"><i class='bx bxs-user-badge'></i>Staff</a></li>
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
    <!-- End of Sidebar -->

    <!-- Main Content -->
    <div class="content">
       
        <?php include('nav.php'); ?>
        <!-- End of Navbar -->

        <main>
            <div class="header">
                <div class="left">
                    <h1>Staff</h1>
                </div>
               
            </div>

            <!-- Insights -->
            <ul class="insights">
                <?php
                @include('../config.php');

                $select="SELECT * FROM  `staff`";

                $res=mysqli_query($conn,$select);

                if(mysqli_num_rows($res)>0){
                    while($row=mysqli_fetch_array($res))
                    {
                ?>
                <li><i class='bx bx'>    <img src="../admin/<?php echo$row['img_source']; ?>" alt="<?php $row['name'] ?>" style="width:100%; height:100%;"></i>
                    <span class="info">
                
                     <h1><?php echo $row['name']; ?></h1>
                     <p class="title"><?php echo $row['Profession']; ?></p>
                     <p><?php echo$row['address'] ?></p>
                     <p><button><a href="tel:<?php echo $row['mno']; ?>"><?php echo $row['mno']; ?></a></button></p>
                    </span>
                </li>
                <?php
                 }}
                ?>
            </ul>
            <!-- End of Insights -->

            

        </main>

    </div>

    <script src="./index.js"></script>
</body>

</html>