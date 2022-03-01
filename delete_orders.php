<?php
include("connection/connect.php"); //connection to db
error_reporting(E_ALL);
session_start();


// sending query
mysqli_query($db,"update users_orders set status='rejected' where o_id='".$_GET['order_del']."'");
// deletig records on the bases of ID
header("location:order_history.php");  //once deleted success redireted back to current page

?>
