<?php include('./view/header.php'); ?>
       <title>Dashboard</title>
</head>

<body>
<div id="preloader"></div>
 <div class="container0">
    <?php include('./view/sidebar.php'); ?>

        <!-- Main Content -->
        <main>
            <h1>Dashboard</h1>
            <!-- Analyses -->
            <div class="analyse">
                <div class="sales">
                    <div class="status">
                        <div class="info">
                            <h3>Total Maintainence</h3>
                            <h1>₹<?php
                            
                            @include('../config.php');
                         
                            $sql="SELECT  SUM(total_amount) from `maintenance_bill` WHERE status='paid' ";
   
                            $res=mysqli_query($conn,$sql);
                            if( mysqli_num_rows($res) > 0){
                            while($row = mysqli_fetch_array($res)){
                             echo  $row['SUM(total_amount)'];
                            }
                            }
                            else{
                                echo '0';
                            }
                         
                            ?></h1>
                        </div>
                    </div>
                </div>
                <div class="visits">
                    <div class="status">
                        <div class="info">
                            <h3>Visitor</h3>
                            <h1> <?php
                            
                            @include('../config.php');
                            $sql="SELECT  id from visitor";
   
                            $res=mysqli_query($conn,$sql);
                            $rowcount = mysqli_num_rows( $res );
                            
                            echo $rowcount;
                            ?></h1>
                        </div>
                    </div>
                </div>
                <div class="searches">
                    <div class="status">
                        <div class="info">
                            <h3>Total Members</h3>
                            <h1>                      
                            <?php
                            
                            @include('../config.php');
                         
                            $sql="SELECT  SUM(total) from members";
   
                            $res=mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_array($res)){
                             echo  $row['SUM(total)'];
                             
                         }
                            ?></h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Analyses -->

            <!-- New Users Section -->
            <div class="new-users">
                <h2>Members</h2>
                <div class="user-list">
                    <?php @include('../config.php');
                    
                    $sql="SELECT * FROM `members`";

                    $res=mysqli_query($conn,$sql);

                    if(mysqli_num_rows($res)>0)
                    {
                        
                        for($i=0; $i < 4; $i++)
                        {
                            while($row=mysqli_fetch_array($res))
                            {
                    ?>
                    <div class="user">
                    <a href="userpage.php?id=<?php echo $row['hno']; ?>">
                        <img src="<?php if ($row['img_source'] == '../images/') { echo './images/defualt.png'; } else { echo $row['img_source']; } ?>">
                            </a>
                        <h2><?php echo$row['name']; ?></h2>
                        <p><?php echo$row['hno'] ?></p>
                    </div>
                    
                    <?php
                            }
                    }
                  }
                    ?>
                    <div class="user">
                        <a href="member.php">
                        <img src="../images/plus.png">
                        <h2>More</h2>
                        <p>New User</p>
                        </a>
                    </div>
                </div>
            </div>
            <!-- End of New Users Section -->

            <!-- Recent Orders Table -->
            <!-- <div class="recent-orders">
                <h2>Recent Orders</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Course Name</th>
                            <th>Course Number</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <a href="#">Show All</a>
            </div> -->
            <!-- End of Recent Orders -->

        </main>
        <!-- End of Main Content -->

        <!-- Right Section -->
        <div class="right-section">
            <div class="nav">
                <button id="menu-btn">
                    <span class="material-icons-sharp" style="float:left;">
                        menu
                    </span>
                </button>
                <div class="dark-mode">
                    <span class="material-icons-sharp active">
                        light_mode
                    </span>
                    <span class="material-icons-sharp">
                        dark_mode
                    </span>
                </div>

                <div class="profile">
                    <div class="info">
                        <p>Hey, <b><?php echo $_SESSION['admin_name']; ?></b></p>
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo">
                    <?php 
                
                         @include('../config.php');
                         
                         $name=$_SESSION['admin_name'];
         
                         $select="SELECT * FROM  `members` WHERE `name` = '$name'";
                         
                         $res=mysqli_query($conn,$select);
         
                         if(mysqli_num_rows($res)>0){
                             while($row=mysqli_fetch_array($res))
                             {
                                 
                         ?>
                      <a href="./editprofile.php?id=<?php echo $row['hno']; ?>"><img src="<?php if ($row['img_source'] == '../images/') { echo '../images/defualt.png'; } else { echo $row['img_source']; } ?>"></a>
                       <?php
                       }
                     }
                     ?>
                    </div>
                </div>

            </div>
            <!-- End of Nav -->

            <div class="user-profile">
                <div class="logo">
                    <img src="../images/logo.png">
                    <h2>GokulDham Soc.</h2>
                    <p>Powder Guli</p>
                </div>
            </div>

            

        </div>


    </div>
<script>
     function loader(){
   document.getElementById("preloader").style.display = 'none';
}

function fadeOut(){
   setInterval(loader, 2000);
}

window.onload = fadeOut;
</script>
    <?php include('./view/footer.php');?>
<!-- 
    <script src="/orders.js"></script>
    <script src="/index.js"></script>
</body>

</html> -->