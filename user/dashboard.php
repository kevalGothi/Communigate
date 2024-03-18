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
    <title>Dashboard</title>
</head>

<body>
<div id="preloader"></div>
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#" class="logo">
            <i class='bx'><img src="../images/logo.png" height="100%" width="100%" style="object-fit:blue;" alt=""></i>
            <div class="logo-name"><span><sub>Communi</span>Gate</sub></div>
        </a>
        <ul class="side-menu">
            <li class="active"><a href="dashboard.php"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
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
            <li><a href="staff.php"><i class='bx bxs-user-badge'></i>Staff</a></li>
            <li><a href="visitor.php"><i class='bx bx-group'></i>Visitor</a></li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="/logout" class="logout">
                    <i class='bx bx-log-out-circle'></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>
    <!-- End of Sidebar -->

    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        <!-- <nav>
            <i class='bx bx-menu'></i>
            <form action="#">
                <div class="form-input" style="display:none;">
                    <input type="search" placeholder="Search...">
                    <button class="search-btn" type="submit"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="theme-toggle" hidden>
            <label for="theme-toggle" class="theme-toggle"></label>
            <!-- <a href="#" class="notif">
                <i class='bx bx-bell'></i>
                <span class="count">12</span>
            </a> --
            <a href="#" class="profile">
            <?php 
                
                @include('../config.php');
                
                $name=$_SESSION['user_name'];

                $select="SELECT * FROM  `members` WHERE `name` = '$name'";
                
                $res=mysqli_query($conn,$select);

                if(mysqli_num_rows($res)>0){
                    while($row=mysqli_fetch_array($res))
                    {
                        
                ?>
             <a href="../user/editprofile?id=<?php echo $row['hno']; ?>"><img src="<?php if ($row['img_source'] == '../images/') { echo '/images/defualt.png'; } else { echo $row['img_source']; } ?> style='width:50%; height:50%; border-radius:50%;' "></a>
              <?php
              }
            }
            ?>
            </a>
        </nav> -->

        <?php include('nav.php'); ?>

        <!-- End of Navbar -->

        <main>
            <div class="header">
                <div class="left">
                    <h1>Dashboard</h1>
                </div>    
            </div>

            <!-- Insights -->
            <ul class="insights">
                <li><i class='bx bx-show-alt'></i>
                    <span class="info">
                        <h3>
                            <?php
                            
                            @include('../config.php');
                            $sql="SELECT  id from visitor";
   
                            $res=mysqli_query($conn,$sql);
                            $rowcount = mysqli_num_rows( $res );
                            
                            echo $rowcount;
                            ?>
                            
                            
                        </h3>
                        <p>Total Visitor</p>
                    </span>
                </li>
                <li><i class='bx bx-home'></i>
                    <span class="info">
                        <h3>
                        <?php
                            
                            @include('../config.php');
                            $sql="SELECT hno from `members`";
   
                            $res=mysqli_query($conn,$sql);
                            $rowcount = mysqli_num_rows( $res );
                            
                            echo $rowcount;
                            ?>
                        </h3>
                        <p>Total Houses</p>
                    </span>
                </li>
                <li><i class='bx bx-user'></i>
                    <span class="info">
                        <h3>
                        <?php
                            
                            @include('../config.php');
                         
                            $sql="SELECT  SUM(total) from members";
   
                            $res=mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_array($res)){
                             echo  $row['SUM(total)'];
                             
                         }
                            ?>
                        </h3>
                        <p>Total Member</p>
                    </span>
                </li>
            </ul>
            <!-- End of Insights -->

            <div class="bottom-data">
               
                
                

            </div>

        </main>

    </div>

    <script src="./index.js"></script>
</body>

</html>