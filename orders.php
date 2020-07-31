<?php
require_once('connection.php');
session_start();
if(!isset($_SESSION['emailId']) && !isset($_SESSION['userType'])){
  header("location:loginpage.php");
  die();
}else{
  $r_id=$_SESSION['r_id'];
  $userEmail=$_SESSION['emailId'];
  $userName=$_SESSION['userName'];
  $r_name=$_SESSION['r_name'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Orders</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <!-- Nav code -->
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="http://localhost/internshala-resturant/menupage.php"><?php 
        echo $r_name;
      ?></a>
    </div>
    <ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $userName?>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><b style="color:black; margin:10px; padding:20px;"><?php echo $userEmail ?></b></li>
          <b style="color:black; margin:10px; padding:20px;"> Resturent ID:<?php echo $r_id ?></b>'
          <li><a href="http://localhost/internshala-resturant/orders.php" style="color:blue; margin:10px;">Orders</a></li>
          <li><a href="http://localhost/internshala-resturant/manageItem.php" style="color:green; margin:10px;">Manage Item</a></li>
          <li><a href="http://localhost/internshala-resturant/logout.php" style="color:red;  margin:10px;">Log out</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
  <!-- Nave code end -->
  <?php
  $query="SELECT * FROM order_details WHERE user_email='{$userEmail}'";
  if(!($selectRes=mysqli_query($conn,$query))){
         
  }
  else{
    ?>
    <table class="table">
    <thead>
      <tr>
       <th>OrderId</th>
        <th>User Name</th>
        <th>User Mobile</th>
        <th>Item Id</th>
        <th>Item Name</th>
        <th>Item Type</th>
        <th>quantity</th>
        <th>Address</th>
        <th>total Price</th>
        <th>status</th>
      </tr>
    </thead>
    <tbody>
      <?php
        if( mysqli_num_rows( $selectRes )==0 ){
          echo '<tr><td colspan="4">No Items Avaliable</td></tr>';
        }else{
          while( $row = mysqli_fetch_assoc( $selectRes ) ){
            if($row['order_status']==0){
              echo "<tr><td>{$row['order_id']}</td><td>{$row['user_name']}</td><td>{$row['user_mobile']}</td><td>{$row['item_id']}</td><td>{$row['item_name']}</td><td>{$row['item_type']}</td><td>{$row['quantity']}</td><td>{$row['address']}</td><td>{$row['total_price']}</td><td><a href='http://localhost/internshala-resturant/processOrder.php?orderId={$row['order_id']}&itemId={$row['item_id']}'><button class='btn btn-primary'>Process Order</button></a></td></tr>\n";
            }else{
                echo "<tr><td>{$row['order_id']}</td><td>{$row['user_name']}</td><td>{$row['user_mobile']}</td><td>{$row['item_id']}</td><td>{$row['item_name']}</td><td>{$row['item_type']}</td><td>{$row['quantity']}</td><td>{$row['address']}</td><td>{$row['total_price']}</td><td><b style='color:green;'>IN PROGRESS</b></td></tr>\n";
            }
          }
        }
      ?>
    </tbody>
  </table>
      <?php
    }
  ?>
 
</div>
</body>
</html>
