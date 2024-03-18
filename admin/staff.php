<?php include('./view/header.php'); ?>
<?php



if(isset($_POST['submit'])){

   $filename = $_FILES["uf"]["name"];
   $tempname = $_FILES["uf"]["tmp_name"];
   $folder = "images/".$filename;
  
   move_uploaded_file($tempname,$folder);
  

  
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $mno = mysqli_real_escape_string($conn, $_POST['mno']);
  $add = mysqli_real_escape_string($conn, $_POST['address']);
  $email=mysqli_real_escape_string($conn, $_POST['email']);
  $pass=md5($_POST['pass']);
  $Profession=mysqli_real_escape_string($conn,$_POST['Profession']);
 


     $insert = "INSERT INTO staff(img_source, name, mno, email, password, address, Profession) VALUES('$folder','$name','$mno','$email','$pass','$add','$Profession')";
     mysqli_query($conn, $insert);
     header('location:staff.php');
  };


?>
 
    
       <title>Staff</title>
</head>

<body>
<div id="preloader"></div>
    <div class="container0">
        <?php include('./view/sidebar.php'); ?>

        <!-- Main Content -->
        <main>
            <h1>Staffs</h1>
            <div class="analyse">
                <?php 
                
                @include('../config.php');

                $select="SELECT * FROM  `staff`";
                
                $res=mysqli_query($conn,$select);

                if(mysqli_num_rows($res)>0){
                    while($row=mysqli_fetch_array($res))
                    {
                        
                ?>
              <div class="card">
                <img src="../admin/<?php echo$row['img_source']; ?>" alt="<?php $row['name'] ?>" style="width:100%; height:50%; border-radius:20px;  ">
                <h1><?php echo $row['name']; ?></h1>
                <p class="title"><?php echo $row['Profession']; ?></p>
                <p><?php echo$row['address'] ?></p>
                <p><button><?php echo $row['mno']; ?></button></p>
                <p><button class="cancelbtn deleteButton" data-id="<?php echo $row['id'] ?>" style="display: inline-block; float:right;"> <span class="material-icons-sharp delete-icon">
      delete
    </span></button></p>
              </div>
              <?php
              
            }
        }
              ?>
            </div> 
        </main>
        <!-- End of Main Content -->
        <div id="id01" class="modal">
          
          <form class="modal-content animate" action="" method="POST" enctype="multipart/form-data">
            <div class="imgcontainer">
              <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
              <!-- <img src="img_avatar2.png" alt="Avatar" class="avatar"> -->
              <!-- <label for="img">Image</label> -->
              <!-- <input type="file" name="img" id="img"><br> -->
            </div>
            
            <div class="container">

             <label for="img"><b>Enter Photo:</b></label>
             <input type="file" name="uf" id="">
        
              <label for="title"><b>Enter Name</b></label>
              <input type="text" placeholder="E.g Babu Bhaia" name="name" required>
        
              <label for="content"><b>Mobile No.</b></label>
              <input type="text" placeholder="E.g 9925685449" name="mno" required>

              <label for="content"><b>Email.</b></label>
              <input type="email" placeholder="E.g babubhaia@nagpur.com" name="email" required>

              <label for="content"><b>Password.</b></label>
              <input type="password" placeholder="Enter Password" name="pass" required>
             
              
              <label for="d_date"><b>Address</b></label>
              <input type="text" placeholder="Enter Address" name="address" required>

              <label for="d_date"><b>Profession</b></label>
              <input type="text" placeholder="Enter Profession" name="Profession" required>
              
              <button type="submit" id="form-btn" name="submit">Add Staff</button>
              <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
             
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
                      <a href="./editprofile.php?id=<?php echo $row['hno']; ?>"><img src="<?php if ($row['img_source'] == '../images/') { echo '../images/defualt.png'; } else { echo $row['img_source']; } ?>"></a>
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
            <button onclick="document.getElementById('id01').style.display='block'" class="add-reminder">Add Staff</button>
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