<?php
require_once("connection.php");
$order_id=$_GET['orderId'];
$item_id=$_GET['itemId'];
$sql="UPDATE order_details
SET order_status = 1
WHERE order_id={$order_id} AND item_id={$item_id};";
$retval=mysqli_query($conn,$sql);
header("Location: http://localhost/internshala-resturant/orders.php");
exit();
?>