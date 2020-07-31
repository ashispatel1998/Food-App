<?php
require_once('connection.php');


if($_POST){
    if(isset($_POST['email'])){
      $email=$_POST['email'];
      // echo $email;
      // echo "<br>";
      if($email == ''){
          unset($email);
      }
    }



    if(isset($_POST['studentname'])){
      $studentname=$_POST['studentname'];
      // echo $studentname;
      // echo "<br>";
      if($studentname == ''){
          unset($studentname);
      }
    }



    if(isset($_POST['rollno'])){
      $rollno=$_POST['rollno'];
      // echo $rollno;
      // echo "<br>";
      if($rollno == ''){
          unset($rollno);
      }
    }



    if(isset($_POST['regno'])){
      $regno=$_POST['regno'];
      // echo $regno;
      // echo "<br>";
      if($regno == ''){
          unset($regno);
      }
    }



    if(isset($_POST['department'])){
      $department=$_POST['department'];
      // echo $department;
      // echo "<br>";
      if($department == ''){
          unset($department);
      }
    }



    if(isset($_POST['section'])){
      $section=$_POST['section'];
      // echo $section;
      // echo "<br>";
      if($section == ''){
          unset($section);
      }
    }



    if(isset($_POST['year'])){
      $year=$_POST['year'];
      // echo $year;
      // echo "<br>";
      if($year == ''){
          unset($year);
      }
    }


    if(isset($_POST['studentmob'])){
      $studentmob=$_POST['studentmob'];
      // echo $studentmob;
      // echo "<br>";
      if($studentmob == ''){
          unset($studentmob);
      }
    }



    if(isset($_POST['CTname'])){
      $CTname=$_POST['CTname'];
      // echo $CTname;
      // echo "<br>";
      if($CTname == ''){
          unset($CTname);
      }
    }



    if(isset($_POST['CTmob'])){
      $CTmob=$_POST['CTmob'];
      // echo $CTmob;
      // echo "<br>";
      if($CTmob == ''){
          unset($CTmob);
      }
    }


    if(isset($_POST['Pname'])){
      $Pname=$_POST['Pname'];
      // echo $Pname;
      // echo "<br>";
      if($Pname == ''){
          unset($Pname);
      }
    }


    if(isset($_POST['Pmob'])){
      $Pmob=$_POST['Pmob'];
      // echo $Pmob;
      // echo "<br>";
      if($Pmob == ''){
          unset($Pmob);
      }
    }


    if(isset($_POST['pwd'])){
      $pwd=$_POST['pwd'];
      // echo $pwd;
      // echo "<br>";
      if($pwd == ''){
          unset($pwd);
      }
    }
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
  <center><h1 style="color: green; font-size: 30px;">Student Registration</h1></center>
  <form action="registration.php" method="POST" name="myForm" onsubmit="return validateForm()">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required="">
    </div>
    <div class="form-group">
      <label for="pwd">Name:</label>
      <input type="text" class="form-control" id="user" placeholder="Enter full name" name="studentname" required="">
    </div>
    <div class="form-group">
      <label for="pwd">Roll Number:</label>
      <input type="text" class="form-control" id="user" placeholder="Enter Roll number" name="rollno" required="">
    </div>
    <div class="form-group">
      <label for="pwd">Registration Number:</label>
      <input type="text" class="form-control" id="user" placeholder="Enter Registration number" name="regno" required="">
    </div>
    <div class="form-group">
      <label for="pwd">Department:</label>
      <select class="form-control"  name="department" required="">
         <option>CSE</option>
         <option>IT</option>
         <option>MECH</option>
         <option>CV</option>
         <option>ECE</option>
         <option>BT</option>
         <option>EE</option>
         <option>EEE</option>
      </select>
    </div>
    <div class="form-group">
      <label for="pwd">Section:</label>
      <select class="form-control"  name="section" required="">
         <option>A</option>
         <option>B</option>
         <option>C</option>
         <option>D</option>
         <option>E</option>
         <option>F</option>
         <option>G</option>
         <option>H</option>
      </select>
    </div>
    <div class="form-group">
      <label for="pwd">Year:</label>
      <select class="form-control"  name="year" required="">
         <option>2016</option>
         <option>2017</option>
         <option>2018</option>
      </select>
    </div>
    <div class="form-group">
      <label for="number">Mobile:</label>
      <input type="Mobile" class="form-control" id="mob" placeholder="Enter mobile number" name="studentmob" required="">
    </div>
    <div class="form-group">
      <label for="pwd">Class Tecaher Name:</label>
      <input type="text" class="form-control" id="user" placeholder="Enter CT name" name="CTname" required="">
    </div>
    <div class="form-group">
      <label for="number">Class Teacher Mobile:</label>
      <input type="Mobile" class="form-control" id="mob" placeholder="Enter CT number" name="CTmob" required="">
    </div>
    <div class="form-group">
      <label for="pwd">Proctor Name:</label>
      <input type="text" class="form-control" id="user" placeholder="Enter Proctor name" name="Pname" required="">
    </div>
    <div class="form-group">
      <label for="number">Proctor Mobile:</label>
      <input type="Mobile" class="form-control" id="mob" placeholder="Enter Proctor number" name="Pmob" required="">
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