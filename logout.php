<?php
   session_start();
   if(session_destroy()) {
      $_SESSION['loggedin']=false;
      header("Location: loginpage.php");
      exit();
   }
?>