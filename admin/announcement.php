<?php include('./view/header.php'); ?>
    
<?php 



if(isset($_POST['submit'])){
  
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $cont = mysqli_real_escape_string($conn, $_POST['cont']);
    $ddate = mysqli_real_escape_string($conn, $_POST['ddate']);
    $cdate=date('y-m-d');


    $select="INSERT INTO `annoucement`(title,content,lastdate)VALUES('$title','$cont','$ddate')";

    mysqli_query($conn,$select);

    header("announcement.php");

    // exit();

}
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
            
            // $conn=mysqli_connect("localhost","root","","communigate");

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
                            <p><a class="db" data-id="<?php echo $row['id'] ?>" style="display: inline-block; margin:5% auto 5% 80%;"> <span class="material-icons-sharp delete-icon">
      delete
    </span></a></p>
                        </div>
                    </div>
                </div>
            <?php
                }
            }

            ?>
            </div>
            <!-- End of Analyses -->

            <!-- New Users Section -->
          
            <!-- End of New Users Section -->

            <!-- Recent Orders Table -->
            
            <!-- End of Recent Orders -->

        </main>

        <div id="id01" class="modal">
          
          <form class="modal-content animate" action="" method="POST" enctype="multipart/form-data">
            <div class="imgcontainer">
              <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
              <!-- <img src="img_avatar2.png" alt="Avatar" class="avatar"> -->
              <!-- <label for="img">Image</label> -->
              <!-- <input type="file" name="img" id="img"><br> -->
            </div>
            
            <div class="container">

            
        
              <label for="title"><b>Title</b></label>
              <input type="text" placeholder="Enter title" name="title" required>
        
              <label for="content"><b>Content</b></label>
              <input type="text" placeholder="Enter title" name="cont" required>
              
              <label for="lastduedate"><b>Duedate</b></label>
              <input type="date" name="ddate" required>
             

             
              
              <button type="submit" id="form-btn" name="submit">Add announcement</button>
              <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
             
            </div>
        
            <!-- <div class="container" style="background-color:#f1f1f1">
              <span class="psw">Forgot <a href="#">password?</a></span>
            </div> -->
          </form>
        </div>
        
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

                <div class="profile">
                    <div class="info">
                        <p>Hey, <b><?php echo $_SESSION['admin_name']; ?></b></p>
                        <!-- <small class="text-muted">Admin</small> -->
                    </div>
                    <div class="profile-photo">
                    <?php 
                
                         @include('../config.php');
                         
                         $name=$_SESSION['admin_name'];
         
                         $select="SELECT * FROM  `staff` WHERE `name` = '$name'";
                         
                         $res=mysqli_query($conn,$select);
         
                         if(mysqli_num_rows($res)>0){
                             while($row=mysqli_fetch_array($res))
                             {
                                 
                         ?>
                      <a href="./editprofile.php?id=<?php echo $row['hno']; ?>"><img src="<?php if ($row['img_source'] == '../images/') { echo '/images/defualt.png'; } else { echo $row['img_source']; } ?>"></a>
                       <?php
                       }
                     }
                     ?>
                    </div>
                </div>

            </div>
            <!-- End of Nav -->

            <div class="right-section">
           <div class="reminders">
            <button onclick="document.getElementById('id01').style.display='block'" class="add-reminder">Add Announcement</button>
           </div>
          </div>

          

        </div>


    </div>
    <script>
        const deleteButtons = document.querySelectorAll('.db');
    
        deleteButtons.forEach(button => {
            button.addEventListener('click', () => {
                const confirmDelete = window.confirm('Are you sure you want to delete this Announcement?');
                if (confirmDelete) {
                    const id = button.dataset.id;
    
                    // Send AJAX request to deletemember.php with the member ID
                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', '../deleteannouncement.php');
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                    xhr.onload = function () {
                        if (xhr.status === 200 && xhr.responseText === 'success') {
                            // The member has been successfully deleted on the server-side.
                            // You can remove the row from the table on the client-side.
                            const row = button.closest('.status');
                            row.remove();
                        } else {
                            // Handle any errors if necessary
                            console.error('Error deleting Announcement.');
                        }
                    };
                    xhr.send('id=' + encodeURIComponent(id));
                }
            });
        });
    </script>
<?php include('./view/footer.php');?>