<?php
include("../connection/connect.php");
error_reporting(E_ALL);
session_start();


// sending query
mysqli_query($db,"DELETE FROM users WHERE u_id = '".$_GET['user_del']."'");
header("location:allusers.php");  

?>
