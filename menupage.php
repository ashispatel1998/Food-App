<?php
require_once('connection.php');
session_start();

if(!isset($_SESSION['emailId']) && !isset($_SESSION['userType'])){
  header("location:loginpage.php");
  die();
}
else{
      $userType=$_SESSION['userType'];
      //Normal User
      if($userType=="normaluser"){
      $userEmail=$_SESSION['emailId'];
      $userName=$_SESSION['userName'];
      }
      //Resturant User
      else{
        $r_id=$_SESSION['r_id'];
        $userEmail=$_SESSION['emailId'];
        $userName=$_SESSION['userName'];
        $r_name=$_SESSION['r_name'];

      }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Menu Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css"> 
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
      if($userType=="rmanager"){
        echo $r_name;
      }else{
        echo "Dashboard";
      }
      ?></a>
    </div>
    <ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $userName?>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><b style="color:black; margin:10px; padding:20px;"><?php echo $userEmail ?></b></li>
          <?php
          if($userType=="rmanager"){
          echo '<b style="color:black; margin:10px; padding:20px;"> Resturent ID: '.$r_id.'</b>';
          echo '<li><a href="http://localhost/internshala-resturant/orders.php" style="color:blue; margin:10px;">Orders</a></li>';
          echo '<li><a href="http://localhost/internshala-resturant/manageItem.php" style="color:green; margin:10px;">Manage Item</a></li>';
          }else{
            echo '<li><a href="http://localhost/internshala-resturant/yourOrders.php" style="color:green; margin:10px;">Your Orders</a></li>';
          }
          ?>
          <li><a href="http://localhost/internshala-resturant/logout.php" style="color:red;  margin:10px;">Log out</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
  <!-- Nave code end -->
  <!-- Fetch data from food_item -->
  <?php
  
     if($userType=="rmanager"){
     $query="SELECT * FROM food_item WHERE r_id='{$r_id}'";
     }
     else{
      $query="SELECT * FROM food_item";
     }
     if(!($selectRes=mysqli_query($conn,$query))){
         
     }else{
       ?>
  <table class="table">
  <thead>
    <tr>
      <th>Item Name</th>
      <th>Item Type</th>
      <th>Item Price</th>
      <th>Resturant Name</th>
      <th>Mobile</th>
    </tr>
  </thead>
  <tbody>
    <?php
      if( mysqli_num_rows( $selectRes )==0 ){
        echo '<tr><td colspan="4">No Items Avaliable</td></tr>';
      }else{
        while( $row = mysqli_fetch_assoc( $selectRes ) ){
          if($userType=="rmanager"){
            echo "<tr><td>{$row['item_name']}</td><td>{$row['item_type']}</td><td>{$row['item_price']}</td><td>{$row['r_name']}</td><td>{$row['r_manager_mob']}</td><td><a href=' http://localhost/internshala-resturant/deleteitem.php?id={$row['item_id']}'><button class='btn btn-danger'>Delete</button></a></td></tr>\n";
          }else{
            echo "<tr><td>{$row['item_name']}</td><td>{$row['item_type']}</td><td>{$row['item_price']}</td><td>{$row['r_name']}</td><td>{$row['r_manager_mob']}</td><td><a href=' http://localhost/internshala-resturant/placeOrder.php?id={$row['item_id']}'><button class='btn btn-primary'>Place Order</button></a></td></tr>\n";  
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
