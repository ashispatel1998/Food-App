<?php
require_once('connection.php');

if($_POST){
    if(isset($_POST['email'])){
      $email=$_POST['email'];
    //   echo $email;
    //   echo "<br>";
      if($email == ''){
          unset($email);
      }
    }

    if(isset($_POST['name'])){
      $name=$_POST['name'];
    //   echo $name;
    //   echo "<br>";
      if($name == ''){
          unset($name);
      }
    }

    if(isset($_POST['mobno'])){
      $mobno=$_POST['mobno'];
    //   echo $mobno;
    //   echo "<br>";
      if($mobno == ''){
          unset($mobno);
      }
    }

    if(isset($_POST['type'])){
      $type=$_POST['type'];
    //   echo $type;
    //   echo "<br>";
      if($type == ''){
          unset($type);
      }
    }

    if(isset($_POST['pwd'])){
      $pwd=$_POST['pwd'];
    //   echo $pwd;
    //   echo "<br>";
      if($pwd == ''){
          unset($pwd);
      }
    }

    $sql="INSERT INTO user VALUES(
      '$email',
      '$name',
      '$mobno',
      '$type',
      '$pwd'
    )";
    $retval=mysqli_query($conn,$sql);
    //Redirecting to loginpage
    header("Location: http://localhost/internshala-resturant/loginpage.php");
    exit();

}
?>

<!-- HTML CODE BEGINS -->

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script>
function validateForm() {
  var pwd1 = document.forms["myForm"]["pwd"].value;
  var pwd2 = document.forms["myForm"]["cnfpwd"].value;
  if (pwd1 != pwd2) {
    alert("password incorrect");
    return false;
  }
}
function mypass1() {
  var x = document.getElementById("pwd");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
function mypass2() {
  var x = document.getElementById("cnfpwd");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</head>
<body>
<div class="container">
 <!-- Nav code -->
 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">User Registration</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
    </ul>
  </div>
</nav>
  <!-- Nave code end -->
  <form action="registrationpage_user.php" method="POST" name="myForm" onsubmit="return validateForm()">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required="">
    </div>
    <div class="form-group">
      <label for="pwd">Name:</label>
      <input type="text" class="form-control" id="user" placeholder="Enter full name" name="name" required="">
    </div>
    <div class="form-group">
      <label for="pwd">Mobile:</label>
      <input type="mobile" class="form-control" id="user" placeholder="Enter mobile no" name="mobno" required="">
    </div>
    <div class="form-group">
      <label for="pwd">Type:</label>
      <select class="form-control"  name="type" required="">
         <option>Veg</option>
         <option>Non veg</option>
         <option>Veg & Non veg</option>
      </select>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters">
      <div class="checkbox">
    <label><input type="checkbox" onclick="mypass1()"> Show password</label>
  </div>
    </div>
     <div class="form-group">
      <label for="pwd">Confirm Password:</label>
      <input type="password" class="form-control" id="cnfpwd" placeholder="Enter password" name="cnfpwd" required="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters">
      <div class="checkbox">
    <label><input type="checkbox" onclick="mypass2()"> show password</label>
  </div>
    </div>
    <button type="submit" class="btn btn-success">Register</button>
    <a href="loginpage.php" class="btn btn-info" role="button">Login</a>
  </form>
  <br>

</div>
</body>
</html>

<!-- HTML CODE END -->