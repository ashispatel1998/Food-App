<?php
require_once("connection.php");
$id=$_GET['id'];
$sql="DELETE FROM food_item WHERE item_id=$id";
$retval=mysqli_query($conn,$sql);
header("Location: http://localhost/internshala-resturant/menupage.php");
exit();
?>