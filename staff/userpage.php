<div id="preloader"></div>
<?php include('./view/header.php'); ?>

 
    
       <title>Member</title>
</head>

<body>
    <div class="container0">
        <?php include('./view/sidebar.php'); ?>
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
                    <!-- <div class="info">
                        <p>Hey, <b><?php echo $_SESSION['admin_name']; ?></b></p>
                        <small class="text-muted">Admin</small>
                    </div> -->
                    <!-- <div class="profile-photo">
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
                    </div> -->
                </div>

            </div>
            <!-- End of Nav -->
            
        
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
  body {font-family: Arial, Helvetica, sans-serif;}
  form {border: 3px solid #f1f1f1;}
  
  input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
  }
  
  button {
    background-color: #04AA6D;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
  }
  
  button:hover {
    opacity: 0.8;
  }
  
  .cancelbtn {
    width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
    display: block;
    float: none;
  }
  .cancelbtn {
    width: 100%;
  }
}
</style>
</head>
<body>
<?php

@include('../config.php');

$hno=$_GET['id'];

$sql="SELECT * FROM members WHERE hno=$hno";

$res=mysqli_query($conn,$sql);

if(mysqli_num_rows($res)>0)
{
    while($row=mysqli_fetch_assoc($res)){
        // echo $row['name'];
        ?>
  <!-- <div id="preloader"></div> -->
  <a class="btn" href="member.php" role="button">
    <button style="border-radius:25px;">Back</button>
  </a>
  <form action="" method="post">
    <div class="imgcontainer">
      <img src="<?php if ($row['img_source'] == '../images/') { echo '/images/defualt.png'; } else { echo $row['img_source']; } ?>" style="width:30%; height:30%; border-radius:50%;">
    </div>
    
    <div class="container">
    <label for="uname"><b>Hno:<?php echo $row['hno']; ?></b></label><br>
    <label for="uname"><b>Name:<?php echo $row['name']; ?></b></label><br>
    <label for="uname"><b>Total-Member:<?php echo $row['total'] ?></b></label><br>
    <label for="uname"><b>Mobile-No.:<?php echo $row['mno'] ?></b></label><br>
    <label for="uname"><b>Owener:<?php if ($row['isrented'] == 'owner') { echo $row['name']; } else { echo $row['img_source']; }  ?></b></label>
    
    
    
    </div>
    
    
  </form>
    
  
  
  <?php
 }
}
 include('./view/footer.php');?>