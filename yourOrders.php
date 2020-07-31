<?php
require_once('connection.php');
session_start();

if(!isset($_SESSION['emailId']) && !isset($_SESSION['userType'])){
  header("location:loginpage.php");
  die();
}
else{
    $userEmail=$_SESSION['emailId'];
    $userName=$_SESSION['userName'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Your Orders</title>
</head>
<body>

<div class="container">
<!-- Nav bar -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="http://localhost/internshala-resturant/menupage.php">Your Orders</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $userName?>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><b style="color:black; margin:10px; padding:20px;"><?php echo $userEmail ?></b></li>
          <li><a href="http://localhost/internshala-resturant/yourOrders.php" style="color:green; margin:10px;">Your Orders</a></li>
          <li><a href="http://localhost/internshala-resturant/logout.php" style="color:red;  margin:10px;">Log out</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
<!-- Current order -->
<?php
  $query="SELECT * FROM order_details WHERE user_email='{$userEmail}'";
  if(!($selectRes=mysqli_query($conn,$query))){
         
  }
  else{
    ?>
    <table class="table">
    <thead>
      <tr>
      <th>Order Id</th>
        <th>Resturant Name</th>
        <th>Resturant Mobile</th>
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
              echo "<tr><td>{$row['order_id']}</td><td>{$row['r_name']}</td><td>{$row['r_mobile']}</td><td>{$row['item_id']}</td><td>{$row['item_name']}</td><td>{$row['item_type']}</td><td>{$row['quantity']}</td><td>{$row['address']}</td><td>{$row['total_price']}</td><td><b style='color:red;'>Pending</b></td></tr>\n";
            }else{
                echo "<tr><td>{$row['order_id']}</td><td>{$row['r_name']}</td><td>{$row['r_mobile']}</td><td>{$row['item_id']}</td><td>{$row['item_name']}</td><td>{$row['item_type']}</td><td>{$row['quantity']}</td><td>{$row['address']}</td><td>{$row['total_price']}</td><td><b style='color:green;'>In process</b></td></tr>\n";
            }
          }
        }
      ?>
    </tbody>
  </table>
      <?php
    }
  ?>
<!-- Processed order -->

</div>
    
</body>
</html>