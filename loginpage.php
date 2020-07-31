<?php
require_once('connection.php');
session_start();
if (isset($_SESSION['loggedin'])) {
	header('Location: menupage.php');
	exit;
}

if($_POST){
  $email_id=$_POST['emailid'];
  $password=$_POST['pwd'];
  $logintype=$_POST['logintype'];
  
  //Normal User login
  if($logintype=="User"){
    $sql="SELECT * FROM user
    WHERE email='$email_id' 
    AND password='$password'";
    $select=mysqli_query($conn,$sql);
    if(mysqli_num_rows($select) > 0){
      $row=mysqli_fetch_assoc($select);
      $temp_emailid=$row['email'];
      $temp_password=$row['password'];
      $user_name=$row['name'];
      $user_mobile=$row['mobile'];
      if($temp_emailid==$email_id && $temp_password==$password){
        $_SESSION['loggedin']=true;
        $_SESSION['emailId'] =$temp_emailid;
        $_SESSION['userName'] =$user_name;
        $_SESSION['userType']="normaluser";
        $_SESSION['userMobile']=$user_mobile;
        header("Location: http://localhost/internshala-resturant/menupage.php");
        exit();
      }
      else{
        header("Location: http://localhost/internshala-resturant/loginpage.php");
        exit();
      }
    }
  }
  //Resturant Type Login
  else{
    $sql="SELECT * FROM restaurantregistration
    WHERE email='$email_id' 
    AND password='$password'";
    $select=mysqli_query($conn,$sql);
    if(mysqli_num_rows($select) > 0){
      $row=mysqli_fetch_assoc($select);
      $temp_emailid=$row['email'];
      $temp_password=$row['password'];
      $user_name=$row['owner_name'];
      $r_id=$row['r_id'];
      $r_name=$row['r_name'];
      $r_mobile=$row['mobile'];
      if($temp_emailid==$email_id && $temp_password==$password){
        $_SESSION['loggedin']=true;
        $_SESSION['r_id']=$r_id;
        $_SESSION['emailId'] =$temp_emailid;
        $_SESSION['userName'] =$user_name;
        $_SESSION['userType']="rmanager";
        $_SESSION['r_name']=$r_name;
        $_SESSION['r_mob']=$r_mobile;
        header("Location: http://localhost/internshala-resturant/menupage.php");
        exit();
      }else{
        header("Location: http://localhost/internshala-resturant/loginpage.php");
        exit();
      }
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    function alertmsg(){
      alert('Please Login to order!');
    }
    function mypass1() {
    var x = document.getElementById("pwd");
    if (x.type === "password") {
            x.type = "text";
       }
    else {
           x.type = "password";
           }
    }
    function forgotpassword(){
      window.alert("Contact to Admin for changing password!!");
    }
  </script>
</head>
<body>
<div class="container">
  <!-- Nav code -->
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Food Order App</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
    <!-- <li><a href="#"><span class="glyphicon glyphicon-log-in"></span></a></li> -->
    </ul>
  </div>
</nav>
  <!-- Nave code end -->
  <h2>Login</h2>
  <form action="loginpage.php" method="Post">
  <div class="form-group">
      <label for="selection">Login As:</label>
      <select class="form-control"  name="logintype" required="">
         <option>User</option>
         <option>Resturant Manager</option>
      </select>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" class="form-control" id="userid" placeholder="Enter email" name="emailid" required="">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required="">
      <div class="checkbox">
    <label><input type="checkbox" onclick="mypass1()"> Show password</label>
  </div>
    </div>
    <button type="submit" class="btn btn-success" >Login</button>
    <a href="registrationpage_user.php" class="btn btn-primary" role="button">Create Account as User</a>
    <a href="registrationpage_r_manager.php" class="btn btn-danger" role="button">Create Account as Resturant Manager</a>
  </form>
  <br> 
  <?php
   $query="SELECT * FROM food_item";
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
       
         echo "<tr><td>{$row['item_name']}</td><td>{$row['item_type']}</td><td>{$row['item_price']}</td><td>{$row['r_name']}</td><td>{$row['r_manager_mob']}</td><td><button class='btn btn-primary' onclick='alertmsg()'>Place Order</button></td></tr>\n";  
      
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
