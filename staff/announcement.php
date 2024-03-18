    
    <?php include('./view/header.php'); ?>
<?php

if(isset($_POST['submit'])){

  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $cont = mysqli_real_escape_string($conn, $_POST['content']);
  $d_date=mysqli_real_escape_string($conn,$_POST['d_date']);
 
  $insert = "INSERT INTO `annoucement` (`title`, `content`, `lastdate`) VALUES ('$title','$cont','$d_date')";
  mysqli_query($conn, $insert);
  header('location:announcement.php');
};


?> 
       <title>Announcement</title>
</head>

<body>
<div id="preloader"></div>
    <div class="container0">
        <?php include('./view/sidebar.php'); ?>

        <!-- Main Content -->
        <main>
            <h1>Announcement</h1>
            <!-- Analyses -->
            <div class="analyse0">
            <?php
            
            $conn=mysqli_connect("localhost","root","","communigate");

            $select="SELECT * FROM `annoucement`";

            $res=mysqli_query($conn,$select);

            if(mysqli_num_rows($res)>0)
            {
                while($row=mysqli_fetch_array($res))
                {
            ?>
                <div class="sales">
                    <div class="status">
                        <div class="info">
                            <h1><?php echo $row['title'] ?></h1>
                            <h3><?php echo $row['content'] ?></h3>
                        </div>
                    </div>
                </div>
            <?php
                }
            }

            ?>
            </div>

        </main>
        <!-- End of Main Content -->
    
        <!-- Right Section -->
        <div class="right-section">
             <!-- start of nav -->
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

           

            </div>
            <!-- End of Nav -->

         

          

        </div>


    </div>

<?php include('./view/footer.php');?>