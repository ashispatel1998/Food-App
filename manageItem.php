<?php
require_once('connection.php');
session_start();
$r_id=$_SESSION['r_id'];
$r_name=$_SESSION['r_name'];
$r_emailId=$_SESSION['emailId'];
$r_mobile=$_SESSION['r_mob'];
$r_manager_name=$_SESSION['userName'];
if($_POST){
    if(isset($_POST['item_name'])){
        $item_name=$_POST['item_name'];
        if($item_name == ''){
            unset($item_name);
        }
        }
        if(isset($_POST['item_type'])){
        $item_type=$_POST['item_type'];
        if($item_type == ''){
            unset($item_type);
        }
        }
        if(isset($_POST['item_price'])){
        $item_price=$_POST['item_price'];
        if($item_price == ''){
            unset($item_price);
        }
        }
        // echo $r_id;
        // echo $r_name;
        // echo $r_mobile;
        // echo $r_emailId;
        // echo $item_name;
        // echo $item_price;
        // echo $item_type;
        $sql="INSERT INTO food_item VALUES(
          Null,
           $r_id,
          '$r_name',
          '$r_emailId',
          '$r_mobile',
          '$item_name',
          '$item_type',
           $item_price
          )";
        if($retval=mysqli_query($conn,$sql)){
           header("Location: http://localhost/internshala-resturant/menupage.php");
           exit();
        }else{
          echo "Error: " . $sql . "<br>" . $conn->error;
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <!-- Nav code -->
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="http://localhost/internshala-resturant/menupage.php"><?php echo $r_name; ?></a>
    </div>
    <ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $r_manager_name; ?>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="http://localhost/internshala-resturant/orders.php" style="color:blue; margin:10px;">Orders</a></li>
          <li><a href="http://localhost/internshala-resturant/logout.php" style="color:red;  margin:10px;">Log out</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
  <!-- Nave code end -->
 
  <form action="manageItem.php" method="POST" name="myForm" onsubmit="return validateForm()">
    <div class="form-group">
      <label for="email">Item Name:</label>
      <input type="text" class="form-control" id="text" placeholder="Enter Item Name" name="item_name" required="">
    </div>
    <div class="form-group">
      <label for="type">Type:</label>
      <select class="form-control"  name="item_type" required="">
         <option>Veg</option>
         <option>Non veg</option>
         <option>Veg & Non veg</option>
      </select>
    </div>
    <div class="form-group">
      <label for="email">Item Price:</label>
      <input type="number" class="form-control" id="text" placeholder="Enter Price" name="item_price" required="">
    </div>
    <button type="submit" class="btn btn-success">Add Item</button>
  </form>

</div>
</body>
</html>
