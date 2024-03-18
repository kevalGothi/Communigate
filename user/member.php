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
    <title>Memeber</title>
</head>

<div id="preloader"></div>
<body>


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
            <a href="#" class="notif" style="display:none;">
                <i class='bx bx-bell'></i>
                <span class="count">12</span>
            </a>
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
              <a href="../user/editprofile.php?id=<?php echo $row['hno']; ?>"><img src="<?php if ($row['img_source'] == '../images/') { echo '../images/defualt.png'; } else { echo $row['img_source']; } ?>" style="width:70%; height:70%; border-radius:20px;"></a>
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
                    <h1>Member</h1>
                </div>
            </div>

            <!-- Insights -->
            <ul class="insights">
            <?php
                            
                            @include('../config.php');
                            $sql="SELECT * from `members`";
   
                            $res=mysqli_query($conn,$sql);
                            if(mysqli_num_rows( $res )>0);
                            {
                                while($row=mysqli_fetch_array($res))
                                {
                                    
                            
                            
                            ?>
                <li><a href="userpage.php?id=<?php echo $row['hno']; ?>">
                    <i class='bx bx'><img src="<?php if ($row['img_source'] == '../images/') { echo '../images/defualt.png'; } else { echo $row['img_source']; } ?>" style="width:100%; height:100%; border-radius:20px;"></i>
                    <span class="info">
                        <p><?php echo $row['hno']; ?></p>
                        <h3><?php echo $row['name']; ?> </h3>
                        <p><?php echo $row['mno']; ?></p>
                    </span></a>
                </li>
                <?php 
                
            }
        }
                
                ?>
              </ul>
            <!-- End of Insights -->

            <div class="bottom-data">
                <!-- <div class="orders">
                    <div class="header">
                        <i class='bx bx-receipt'></i>
                        <h3>Recent Orders</h3>
                        <i class='bx bx-filter'></i>
                        <i class='bx bx-search'></i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Order Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="images/profile-1.jpg">
                                    <p>John Doe</p>
                                </td>
                                <td>14-08-2023</td>
                                <td><span class="status completed">Completed</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="images/profile-1.jpg">
                                    <p>John Doe</p>
                                </td>
                                <td>14-08-2023</td>
                                <td><span class="status pending">Pending</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="images/profile-1.jpg">
                                    <p>John Doe</p>
                                </td>
                                <td>14-08-2023</td>
                                <td><span class="status process">Processing</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div> -->

                <!-- Reminders -->
                <!-- <div class="reminders">
                    <div class="header">
                        <i class='bx bx-note'></i>
                        <h3>Remiders</h3>
                        <i class='bx bx-filter'></i>
                        <i class='bx bx-plus'></i>
                    </div>
                    <ul class="task-list">
                        <li class="completed">
                            <div class="task-title">
                                <i class='bx bx-check-circle'></i>
                                <p>Start Our Meeting</p>
                            </div>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="completed">
                            <div class="task-title">
                                <i class='bx bx-check-circle'></i>
                                <p>Analyse Our Site</p>
                            </div>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="not-completed">
                            <div class="task-title">
                                <i class='bx bx-x-circle'></i>
                                <p>Play Footbal</p>
                            </div>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                    </ul>
                </div> -->

                <!-- End of Reminders-->

            </div>

        </main>

    </div>

    <script src="./index.js"></script>
</body>

</html>