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
    <title>Visitor</title>
</head>

<body>

<div id="preloader"></div>
    <!-- Sidebar -->
    <div class="sidebar">
    <a href="#" class="logo">
            <i class='bx'><img src="/images/logo.png" height="55%" width="55%" style="object-fit:blue;" alt=""></i>
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
            <li><a href="staff.php"><i class='bx bxs-user-badge'></i>Staff</a></li>
            <li class="active"><a href="visitor.php"><i class='bx bx-group'></i>Visitor</a></li>
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
       

        <?php include('nav.php'); ?>

 

        <main>
            <div class="header">
                <div class="left">
                    <h1>Visitors</h1>
                
            </div>

            
            

            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <i class='bx bx-receipt'></i>
                        <h3>Visitors</h3>
                        <i class='bx bx-filter'></i>
                        <i class='bx bx-search'></i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Mobile No.</th>
                                <th>Person to Meet</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                             @include('../config.php');

                             $select="SELECT * FROM `visitor` ";
                             
                             $result = mysqli_query($conn, $select);

                             if(mysqli_num_rows($result)>0)
                             {
                                while($row=mysqli_fetch_assoc($result))
                                {

                                
                             
                            ?>
                            <tr>
                                <td>
                                    <p><?php echo $row['name']; ?></p>
                                </td>
                                <td><?php echo $row['mno']; ?></td>
                                <td><?php echo $row['pstm'] ?></td>
                                <td><?php echo $row['date'] ?></td>
                                <td><span class="status <?php if ($row['status'] == '0') { echo 'pending'; } else { echo 'completed'; } ?>"><?php if ($row['status'] == '0') { echo 'out'; } else { echo 'in';} ?></span></td>
                            </tr>
                            <?php
                            }
                        }
                            
                            ?>
                        </tbody>
                    </table>
                </div>

           
            </div>

        </main>

    </div>

    <script src="./index.js"></script>
</body>

</html>