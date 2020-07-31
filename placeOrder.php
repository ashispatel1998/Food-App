<?php
require_once('connection.php');
session_start();
//Order id
$item_id=$_GET['id'];
//VARIABLES
$item_name='';
$item_price=0;
$item_type='';
$r_name='';
$r_mobile='';
$r_id=0;
// SESSION 
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
        $userMobile=$_SESSION['userMobile'];
        }
        //Resturant User
        else{
          $r_id=$_SESSION['r_id'];
          $userEmail=$_SESSION['emailId'];
          $userName=$_SESSION['userName'];
          $r_name=$_SESSION['r_name'];
  
        }
  }
//SESSION CODE END
//FETCHING DATA FROM FOOD TABLE USING ORDER ID
$sql="SELECT * FROM food_item WHERE item_id=$item_id";
$retval=mysqli_query($conn,$sql);
if(mysqli_num_rows( $retval )==0){
    echo "<h3>Error</h3>";
}else{
    while( $row = mysqli_fetch_assoc( $retval ) ){
        $item_name=$row['item_name'];
        $item_type=$row['item_type'];
        $item_price=$row['item_price'];
        $r_name=$row['r_name'];
        $r_mobile=$row['r_manager_mob'];
        $r_id=$row['r_id'];
    }
}
//FETCHING DATA CODE END
//GET THE DATA FROM FORM 
if($_POST){
        //fetch query
        $sql="SELECT * FROM food_item WHERE item_id=$item_id";
        $retval=mysqli_query($conn,$sql);
        if(mysqli_num_rows( $retval )==0){
            echo "<h3>Error</h3>";
        }else{
            while( $row = mysqli_fetch_assoc( $retval ) ){
                $item_name=$row['item_name'];
                $item_type=$row['item_type'];
                $item_price=$row['item_price'];
                $r_name=$row['r_name'];
                $r_mobile=$row['r_manager_mob'];
                $r_id=$row['r_id'];
            }
        }

        if(isset($_POST['quantity'])){
            $quantity=$_POST['quantity'];
            // echo $quantity;
            // echo "<br>";
            if($quantity == ''){
                unset($quantity);
            }
        }
        if(isset($_POST['address'])){
            $address=$_POST['address'];
            // echo $address;
            // echo "<br>";
            if($address == ''){
                unset($address);
            }
        }
        //insert query
        $total_price=$quantity*$item_price;
        
        $sqlquery="INSERT INTO order_details VALUES(
            Null,
            $item_id,
            '$item_name',
            '$item_type',
            $item_price,
            $quantity,
            '$address',
            $total_price,
            $r_id,
            '$r_name',
            '$r_mobile',
            '$userName',
            '$userEmail',
            '$userMobile',
            '0'
        )";
        if($retval=mysqli_query($conn,$sqlquery)){
            header("Location: http://localhost/internshala-resturant/yourOrders.php");
    exit();
        }else{
            echo "Sorry try again!";
        }
        
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
    <title>Place Order</title>
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
      
      <!-- PLACE ORDER PART -->
      <form action="placeOrder.php?id=<?php echo $item_id; ?>" method="POST">
            <table class="table">
            <thead>
            <tr>
                <th><h3><b>Order Details</b></h3></th>
            </tr>
            </thead>
            <tbody>
            <tr class="success">
                <td><b>ITEM NAME</b></td>
                <td><?php echo $item_name;?></td>
            </tr>      
            <tr class="success">
                <td><b>ITEM TYPE</b></td>
                <td><?php echo $item_type;?></td>
            </tr>
            <tr class="success">
                <td><b>ITEM PRICE</b></td>
                <td><?php echo $item_price;?></td>
            </tr>
            <tr class="success">
                <td><b>RESTURANT NAME</b></td>
                <td><?php echo $r_name;?></td>
            </tr>
            <tr class="success">
                <td><b>RESTURANT ID</b></td>
                <td><?php echo $r_id;?></td>
            </tr>
            <tr class="success">
                <td><b>CONTECT NUMBER</b></td>
                <td><?php echo $r_mobile;?></td>
            </tr>
            <tr class="success">
                <td><b>QUANTITY</b></td>
                <td>
                <input type="number" name="quantity" placeholder="1" required>
                </td>
            </tr>
            <tr class="success">
                <td><b>ADDRESS</b></td>
                <td>
                <textarea cols="23" rows="3" name="address" placeholder="Eg:At,po,dist,pincode"></textarea>
                </td>
            </tr>
            <tr class="success">
            <center> <td><input class="btn btn-success" type="submit" value="Place Order"/></td> </center>
            <center> <td><input class="btn btn-primary" type="reset"/></td> </center>
            </tr>
            </tbody>
        </table>
        </form>
    </div>
</body>
</html>