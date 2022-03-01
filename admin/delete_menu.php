<?php
include("../connection/connect.php");
error_reporting(E_ALL);
session_start();


// sending query
mysqli_query($db,"DELETE FROM dishes WHERE d_id = '".$_GET['menu_del']."'");
header("location:all_menu.php");  

?>
