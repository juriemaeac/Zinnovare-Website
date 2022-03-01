<?php
include("../connection/connect.php");
error_reporting(E_ALL);
session_start();


// sending query
mysqli_query($db,"DELETE FROM users_orders WHERE o_id = '".$_GET['order_del']."'");
header("location:all_orders.php");  

?>
