<?php include('./view/header.php'); ?>
<?php


if(isset($_POST['submit'])){

  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $mno = mysqli_real_escape_string($conn, $_POST['mno']);
  $ptm=mysqli_real_escape_string($conn,$_POST['ptm']);

 if($ptm != "visitor")
 {
    $insert = "INSERT INTO `cfvisitor` (`name`, `mno`, `pstm`) VALUES ('$name','$mno','$ptm')";
    mysqli_query($conn, $insert);
    header('location:visitor.php');  
 }
 else{
  $insert = "INSERT INTO `visitor` (`name`, `mno`, `pstm`) VALUES ('$name','$mno','$ptm')";
  mysqli_query($conn, $insert);
  header('location:visitor.php');
 }
};


?> 
    
       <title>Visitor</title>
</head>

<body>
<div id="preloader"></div>
    <div class="container0">
        <?php include('./view/sidebar.php'); ?>

        <!-- Main Content -->
        <main>
            <h1>Visitors</h1>
            <!-- Analyses -->
            <div class="analyse0">
            <?php
            
            //$conn=mysqli_connect("localhost","root","","communigate");

            //$select="SELECT * FROM `visitor`";

            //$res=mysqli_query($conn,$select);

            //if(mysqli_num_rows($res)>0)
            //{
              //  while($row=mysqli_fetch_array($res))
                //{
                  //  ?>
                
                        
                        
                        
                            <table class="table">
                                
                                <thead>
                                     <tr>
                                        <th>ID.</th>
                                         <th><h2>Name</h2></th>
                                         <th></th>
                                         <th><h2>Mobile No.</h2></th>
                                         <th><h2>Pesron to Meet</h2></th>
                                         <th><h2>Status</h2></th>
                                         <th><h2>Date</h2></th>
                                     </tr>
                                 </thead>
                                <tbody>
                                    <?php
                                
                                @include('../config.php');
                                
                                $sql="SELECT * FROM `visitor`";
                                
                                $res=mysqli_query($conn,$sql);
                                
                                if(mysqli_num_rows($res)>0)
                                {
                                    while($row=mysqli_fetch_array($res))
                                    {
                                        
                                        
                                        ?>
                                <tr>
                                    <td><h3><?php echo$row['id']; ?></h3></td>
                                    <td scope="row"><h3><?php echo$row['name']; ?></h3></td>
                                    <td></td>
                                    <td><h3><?php echo $row['mno']; ?></h3></td>
                                    <td><h3><?php echo $row['pstm']; ?></h3></td>
                                    <td><h3><span class="status <?php if ($row['status'] == '0') { echo 'danger'; } else { echo 'success'; } ?>"><a href="updatevisitor.php?id=<?php echo $row['id']; ?>"><?php if ($row['status'] == '0') { echo 'out'; } else { echo 'in';} ?></a></span></h3></td>
                                    <td><h3><?php echo $row['date']; ?></h3></td>
                                </tr>
                                <?php
                                
                                
                                    }
                                }
                                
                                ?>
                            </tbody>
                           </table>
                        
                    
                
            <?php
            //    }
          //  }

            ?>
            </div>
            <!-- End of Analyses -->

            <!-- New Users Section -->
          
            <!-- End of New Users Section -->

            <!-- Recent Orders Table -->
            
            <!-- End of Recent Orders -->

        </main>
        <!-- End of Main Content -->
        <div id="id01" class="modal">
          
          <form class="modal-content animate" action="" method="POST">
            <div class="imgcontainer">
              <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
              <!-- <img src="img_avatar2.png" alt="Avatar" class="avatar"> -->
              <!-- <label for="img">Image</label> -->
              <!-- <input type="file" name="img" id="img"><br> -->
            </div>
            
            <div class="container">
        
              <label for="title"><b>Name</b></label>
              <input type="text" placeholder="Enter Visitor Name" name="name" required>
        
              <label for="content"><b>Mobile No.</b></label>
              <input type="text" placeholder="Enter " name="mno" required>
              <!-- <textarea name="content" id="" cols="80" rows="10" placeholder="Enter Content" required></textarea> -->
              
              <label for="d_date"><b>Person To Meet</b></label>
              
              <select name="ptm">
                <option value="" disabled> Select Person's Name </option>
                <option value="visitor">JustVisitor</option>
                <?php 
                
                @include('../config.php');

                $sql="SELECT * FROM `members`";

                $res=mysqli_query($conn,$sql);

                if(mysqli_num_rows($res)>0)
                {
                    while($row=mysqli_fetch_array($res))
                    {
                
                ?>
                <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                <?php
                    }
                }
                ?>
              </select>

              <button type="submit" name="submit">Add Visitor</button>
              <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
              <!-- <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
              </label> -->
            </div>
        
            <!-- <div class="container" style="background-color:#f1f1f1">
              <span class="psw">Forgot <a href="#">password?</a></span>
            </div> -->
          </form>
        </div>
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
            <button onclick="document.getElementById('id01').style.display='block'" class="add-reminder">Add Visitor</button>
           </div>
          </div>

          

        </div>


    </div>
    <script>
        const deleteButtons = document.querySelectorAll('.deleteButton');
    
        deleteButtons.forEach(button => {
            button.addEventListener('click', () => {
                const confirmDelete = window.confirm('Are you sure you want to delete this Staff?');
                if (confirmDelete) {
                    const id = button.dataset.id;
    
                    // Send AJAX request to deletemember.php with the member ID
                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', 'deletestaff.php');
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