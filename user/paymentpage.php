<?php

@include('../config.php');

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:/index.php');
}

$id=$_GET['id'];

$sql="SELECT * FROM maintenance_bill WHERE bill_id='$id'";

$result=mysqli_query($conn,$sql);

$row=mysqli_fetch_assoc($result);

$name=$row['name'];
$billing_period=$row['billing_period'];
$due_date=$row['due_date'];
$wb=$row['wb'];
$eb=$row['eb'];
$mf=$row['mf'];
$total_amount=$row['total_amount'];
$payment_date=date('Y-m-d');

$select="SELECT * FROM members WHERE name='$name'";

$res=mysqli_query($conn,$select);

$row1=mysqli_fetch_assoc($res);

$hno=$row1['hno'];

$email=$row1['email'];

$mno=$row1['mno'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        /* Your CSS for the printable invoice layout goes here */
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .invoice {
            border: 1px solid #ccc;
            padding: 20px;
            max-width: 400px;
            margin: 0 auto;
        }
        .invoice h1 {
            text-align: center;
        }
        .invoice p {
            margin-bottom: 10px;
        }
        /* Hide the button when printing */
        @media print {
            .print-button {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="invoice">
        <h1>Communigate</h1>
        <p>Invoice Date: <?php echo $billing_period;?></p>
        <p>Due Date: <?php echo $due_date;?></p>
        <hr>
        <p>Customer Name: <?php echo $name;?></p>
        <p>HouseNo.: <?php echo $hno;?></p>
        <p>Email: <?php echo $email;?></p>
        <p>Mobile No.:<?php echo $mno;?></p>
        <hr>
        <p>Bill Details:</p>
        <p>Water-Bill:<?php echo $wb;?></p>
        <p>Electricity-Bill:<?php echo $eb;?></p>
        <p>Mainteince-Fee: <?php echo $mf;?></p>
        <hr>
        <p>Total Amount Due: <?php echo $total_amount;?></p>
        <hr>
        <p>Thank you for your payment!</p>
    </div>
     
    <!-- Print button -->
    <div class="print-button" style="text-align: center; margin-top: 20px;">
        <form action="maintainence-bill.php" method="POST">
            <select name="method" required>
                <option value="cash" name="cash">Cash</option>
                <option value="debit/credit-card" name="debit/credit-card">card</option>
                <option value="upi" name="upi">upi</option>
            </select><br>
            <input type="hidden" name="id" value=<?php echo $id; ?>>
            <input type="submit" name="paid" value="Pay">
        </form>
        <button onclick="window.print()">Print Invoice</button>
    </div>
</body>
</html>
