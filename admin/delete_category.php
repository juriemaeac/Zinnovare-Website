<?php
include("../connection/connect.php");
error_reporting(E_ALL);
session_start();


// sending query
mysqli_query($db,"DELETE FROM res_category WHERE c_id = '".$_GET['cat_del']."'");
header("location:add_category.php");  

?>
