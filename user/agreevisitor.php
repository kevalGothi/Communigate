<?php

@include '../config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:../index.php');
}





?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./style.css">
    <title>Visitor</title>
</head>

<body>

<!-- <div id="preloader"></div> -->
    <!-- Sidebar -->
    <div class="sidebar">
    <a href="#" class="logo">
            <i class='bx'><img src="../images/logo.png" height="50%" width="50%" alt=""></i>
            <div class="logo-name"><span><sub>Communi</span>Gate</sub></div>
        </a>
        <ul class="side-menu">
            <li><a href="dashboard.php"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
            <li><a href="member.php"><i class='bx bx-user'></i>Members</a></li>
            <li><a href="announcement.php"><i class='bx bx-message-alt-detail'></i>Announcements<?php @include('../config.php');
             
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
            
             ?> </a></li>
            <li><a href="staff.php"><i class='bx bxs-user-badge'></i>Staff</a></li>
            <li class="active"><a href="visitor.php"><i class='bx bx-group'></i>Visitor</a></li>
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
       

        <?php include('nav.php'); ?>

 

        <main>
            <div class="header" >
                <div class="left">
                    <h1>Visitors</h1>
                    <ul class="breadcrumb">
                    <a href="visitor.php"><li>
                             Visitors
                            </li></a>
                        /
                        <li><a href="acceptvisitor.php" class="active">ConfirmVisitors</a></li>
                    </ul>
            </div>

            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <i class='bx bx-receipt'></i>
                        <h3>Visitors</h3>
                    </div>
                    <?php
// include('../config.php');
// session_start();

if (!isset($_SESSION['user_name'])) {
    header('Location: /login_form.php');
    exit();
}

$name = $_SESSION['user_name'];
$sql = "SELECT * FROM `cfvisitor` WHERE pstm='$name'";
$res = mysqli_query($conn, $sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['insert'])) {
        while ($row = mysqli_fetch_array($res)) {
            $vname = $row['name'];
            $pstm = $row['pstm'];
            $mno = $row['mno'];

            $insertQuery = "INSERT INTO `visitor`(`name`, `mno`, `pstm`) VALUES ('$vname', '$mno', '$pstm')";
            $deleteQuery = "DELETE FROM `cfvisitor` WHERE name='$vname' AND pstm='$pstm'";
            
            if (mysqli_query($conn, $insertQuery) && mysqli_query($conn, $deleteQuery)) {
                echo "<div class='popup'>Visitor added and deleted successfully!</div>";
            }
        }
    }

    if (isset($_POST['delete'])) {
        while ($row = mysqli_fetch_array($res)) {
            $vname = $row['name'];
            $pstm = $row['pstm'];

            $deleteQuery = "DELETE FROM `cfvisitor` WHERE name='$vname' AND pstm='$pstm'";
            
            if (mysqli_query($conn, $deleteQuery)) {
                echo "<div class='popup'>Visitor deleted successfully!</div>";
            }
        }
    }
}
?>

<div style=""><a href="visitor.php"><button class="btn"> <i class='bx bx-home'></i></button></a></div>

<?php
if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_array($res)) {
        $vname = $row['name'];
        $pstm = $row['pstm'];
        $mno = $row['mno'];
?>
<div class="visitor-box">
    <h2>Is this your visitor?</h2>
    <h1><?php echo $vname; ?></h1>
    
    <form action="" method="POST">
        <button class="btn" type="submit" name="insert">YES</button>
        <button class="btn" type="submit" name="delete">NO</button>
    </form>
    <hr>
</div>
<?php
    }
}
else{
    echo '<h1>404:No visitor for you :-(</h1>';
};
?>

        



        </main>

    </div>

    <script src="./index.js"></script>
</body>

</html>