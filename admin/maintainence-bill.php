<?php include('./view/header.php'); ?>
<?php


if(isset($_POST['submit'])){

  $eb = mysqli_real_escape_string($conn, $_POST['eb']);
  $wb = mysqli_real_escape_string($conn, $_POST['wb']);
  $mf = mysqli_real_escape_string($conn, $_POST['mf']);
  $total=(int)$wb+(int)$eb+(int)$mf;
  $ptm = mysqli_real_escape_string($conn, $_POST['ptm']);
  $billing_period=date('Y-m-d');
  $due_date=date('Y-m-d', strtotime($billing_period . ' +30 days'));
 


 $insert = "INSERT INTO maintenance_bill(name, wb, eb, mf, total_amount, billing_period, due_date) VALUES('$ptm','$wb','$eb','$mf','$total','$billing_period','$due_date')";
 mysqli_query($conn, $insert);
 header('location:maintainence-bill.php');

 exit;
  };

?>

 
    
       <title>Maintainence-bill</title>
</head>

<body>
<div id="preloader"></div>
    <div class="container0">
        <?php include('./view/sidebar.php'); ?>

        <!-- Main Content -->
        <main>
            <h1>Maintainence-bill</h1>
            <div class="analyse0">
            <table>
                    <thead>
                        <tr>
                        <td><b>Id.</b></td>
                        <td><b>Name.</b></td>
                        <td><b>Last Date.</b></td>
                        <td><b>Total Amount</b></td>
                        <td><b>Status</b></td>
                        <!-- <td><b>Action</b></td> -->
                    </tr>
                    </thead>
                    <?php 
                
                @include('../config.php');

                $select="SELECT * FROM  `maintenance_bill`";
                
                $res=mysqli_query($conn,$select);
                
                if(mysqli_num_rows($res)>0){
                    while($row=mysqli_fetch_array($res))
                    {
                        
                        ?>
              
              
              <tbody>
                       <tr>
                        <!-- <td></td> -->
                        <td><?php echo $row['bill_id']; ?></td>
                        <td>
                        <?php echo $row['name']; ?>
                        </td>
                        <td><?php echo $row['due_date']; ?></td>
                        <td><?php echo $row['total_amount']; ?></td>
                        <td><sup class="<?php if ($row['status'] == 'unpaid') { echo 'danger'; } else { echo 'success'; } ?>"><a href="billpaid.php?id=<?php echo $row['bill_id'];?>"><?php echo$row['status']; ?></a></sup></td>
                        <td></td>
                        <!-- <td><button class="cancelbtn deleteButton" data-id="" style="display: inline-block; float:right;"> <span class="material-icons-sharp delete-icon">delete</span></button></td> -->
                       </tr>
                  
                       </tbody>
              <?php
              
            }
        }
              ?>
                </table>
            </div> 
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

        
              <label for="title"><b>Enter Name</b></label>
              <select name="ptm">
            <option value="" selected disabled style="border:10px ">Select Person's Name</option>
            <?php
           $conn=mysqli_connect('localhost','root','','communigate');

           $sql="SELECT * FROM members";
   
           $result=mysqli_query($conn,$sql);

           while($row=mysqli_fetch_assoc($result))
           {  ?>

           <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
            <?php } ?>
          </select><br>

        
          <label for="water-bill">Water-Bill:</label>
          <input type="text" id="mobileNumber" name="wb" required placeholder="Enter Water Bill">
    
          <label for="Electricity-bill">Electricity-Bill:</label>
          <input type="text" id="mobileNumber" name="eb" required placeholder="Enter Electricity Bill">
           
          <label for="Maintenance-Fee">Maintenance-Fee:</label>            
          <input type="text" id="mobileNumber" name="mf" required placeholder="Enter Maintenance-Fee">

              
              <button type="submit" id="form-btn" name="submit">Create Bill</button>
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
                      <a href="./editprofile?id=<?php echo $row['hno']; ?>"><img src="<?php if ($row['img_source'] == '../images/') { echo '/images/defualt.png'; } else { echo $row['img_source']; } ?>"></a>
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
            <button onclick="document.getElementById('id01').style.display='block'" class="add-reminder">Create Bill</button>
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