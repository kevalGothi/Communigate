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
                                    
                                    <thead style="border:10px dotted black;">
                                        <tr style="border:20px dotted black;">
                                            <th><h2>ID.</h2></th>
                                            <th><h2>Name</h2></th>
                                            <th></th>
                                            <th><h2>Mobile No.</h2></th>
                                            <th><h2>Pesron to Meet</h2></th>
                                            <th><h2>Status</h2></th>
                                            <th><h2>Date</h2></th>
                                        </tr>
                                    </thead>
                                
                                        <?php
                                    
                                    @include('../config.php');
                                    
                                    $sql="SELECT * FROM `visitor`";
                                    
                                    $res=mysqli_query($conn,$sql);
                                    
                                    if(mysqli_num_rows($res)>0)
                                    {
                                        while($row=mysqli_fetch_array($res))
                                        {
                                            
                                            
                                            ?>
                                    <tbody style="border:20px dotted black;">
                                    <tr>
                                        <td><h2><p><?php echo$row['id']; ?></p></h2></td>
                                        <td><h2><p><?php echo$row['name']; ?></p></h2></td>
                                        <td></td>
                                        <td><h2><p><?php echo $row['mno']; ?></p></h2></td>
                                        <td style="margin: 10px; item-align:center;"><h2><p><?php echo $row['pstm']; ?></p></h2></td>
                                        <td><h2><p><span class="status <?php if ($row['status'] == '0') { echo 'danger'; } else { echo 'success'; } ?>"><a href="updatevisitor.php?id=<?php echo $row['id']; ?>"><?php if ($row['status'] == '0') { echo 'out'; } else { echo 'in';} ?></a></span></p></h2></td>
                                        <td><h2><p><?php echo $row['date']; ?></p></h2></td>
                                    </tr>
                                    </tbody>
                                    <?php
                                    
                                    
                                        }
                                    }
                                    
                                    ?>
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


                </div>
                <!-- End of Nav -->

                <div class="right-section">
            <div class="reminders">
                <button onclick="document.getElementById('id01').style.display='block'" class="add-reminder">Add Visitor</button>
            </div>
            </div>

            

            </div>


        </div>

    <?php include('./view/footer.php');?>