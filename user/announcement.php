<?php

@include '../config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:/index.php');
}

$name=$_SESSION['user_name'];



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./style.css">
    <title>Announcement</title>
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
            <li><a href="dashboard.php"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
            <li><a href="member.php"><i class='bx bx-user'></i>Members</a></li>
            <li class="active"><a href="announcement.php"><i class='bx bx-message-alt-detail'></i>Announcements<?php @include('../config.php');
             
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
            
             ?></a></li>
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
              <a href="/editprofile?id=<?php echo $row['hno']; ?>"><img src="<?php if ($row['img_source'] == '../images/') { echo '/images/defualt.png'; } else { echo $row['img_source']; } ?> style='width:50%; height:50%; border-radius:50%;' "></a>
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
                    <h1>Announcement</h1>
                </div>
            </div>

            <!-- Insights -->
            <!-- <ul class="insights">
                <li>
                    <i class='bx bx-calendar-check'></i>
                    <span class="info">
                        <h3>
                            1,074
                        </h3>
                        <p>Paid Order</p>
                    </span>
                </li>
                <li><i class='bx bx-show-alt'></i>
                    <span class="info">
                        <h3>
                            3,944
                        </h3>
                        <p>Site Visit</p>
                    </span>
                </li>
                <li><i class='bx bx-line-chart'></i>
                    <span class="info">
                        <h3>
                            14,721
                        </h3>
                        <p>Searches</p>
                    </span>
                </li>
                <li><i class='bx bx-dollar-circle'></i>
                    <span class="info">
                        <h3>
                            $6,742
                        </h3>
                        <p>Total Sales</p>
                    </span>
                </li>
            </ul> -->
            <!-- End of Insights -->

           <div class="bottom-data">
                <div class="orders">
                 <div class="reminders">
                   <div class="header">
                   <h3>Announcement</h3>

                    <ul class="task-list">
                        <?php 
                        
                        // @include('./config.php');
                        $conn=mysqli_connect('localhost','root','','communigate');

                        $sql="SELECT * FROM `annoucement`";
                        
                        $res=mysqli_query($conn,$sql);

                        if(mysqli_num_rows($res)>0)
                        {
                            while($row=mysqli_fetch_array($res))
                            {
                                
                        ?>
                        <li class="completed">
                            <div class="task-title">
                                <h1><?php echo$row['title']; ?>  <br>   
                                <sub><?php echo$row['content']; ?></sub>
                               </h1>
                            </div>
                            <!-- <i class='bx bx-dots-vertical-rounded'></i> -->
                        </li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                   </div>                  
                 </div>          
                      
                       
                    <!-- <div class="header">
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
                    </table> -->
              </div>

        <!-- Reminders -->

            <!-- <div class="reminders">
                    <div class="header">
                       <form action="" method="POST">
                           <input type="submit" value="Mark All As Read" name="isread" style="background-color:#028659;" >
                       </form>
                    </div>
            </div>         -->
                

                <!-- End of Reminders-->

            </div>

        </main>

    </div>

    <script src="./index.js"></script>
</body>

</html>