<nav>
            <i class='bx bx-menu'></i>
            <form action="#">
                <div class="form-input" style="display:none;">
                    <input type="search" placeholder="Search...">
                    <button class="search-btn" type="submit"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="theme-toggle" hidden>
            <label for="theme-toggle" class="theme-toggle"></label>
            <a href="agreevisitor.php" class="notif">
                <i class='bx bx-bell'></i>
                <span class="count"><?php   @include('../config.php');
                             $name=$_SESSION['user_name'];
                            $sql="SELECT  id from cfvisitor WHERE pstm='$name' ";
   
                            $res=mysqli_query($conn,$sql);
                            $rowcount = mysqli_num_rows( $res );
                            
                            echo $rowcount; ?></span>
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
               <a href="../user/editprofile.php?id=<?php echo $row['hno']; ?>"><img src="<?php if ($row['img_source'] == '../images/') { echo '../images/defualt.png'; } else { echo $row['img_source']; } ?>" style="width:65px; height:65px; border-radius:50%; margin:30%;" ></a>
              <?php
              }
            }
            ?>
            </a>
        </nav>