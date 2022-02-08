<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php"); // connection to db
error_reporting(0);
session_start();

include_once 'product-action.php'; //including controller

?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Zinnovare</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet"> </head>

<body>
    
        <!--header starts-->
        <header id="header" class="header-scroll top-header headrom">
            <!-- .navbar -->
            <nav class="navbar navbar-dark" style="background:black">
                <div class="container">
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                    <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="src/logo6.png" style="height: 40px; width: 142px" alt=""> </a>
                    <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                       <ul class="nav navbar-nav">
                            <li class="nav-item"> <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Restaurants <span class="sr-only"></span></a> </li>
                            
							<?php
						if(empty($_SESSION["user_id"]))
							{
								echo '<li class="nav-item"><a href="login.php" class="nav-link active">login</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active">signup</a> </li>';
							}
						else
							{
									
									
										echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">your orders</a> </li>';
									echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">logout</a> </li>';
							}

						?>
							 
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- /.navbar -->
        </header>

        <div class="page-wrapper">
		    <?php $ress= mysqli_query($db,"select * from restaurant where rs_id='$_GET[res_id]'");
									     $rows=mysqli_fetch_array($ress);
										  
										  ?>
            <div class="container m-t-30">
                <div class="row">
                    <div class="">
                        <div class="menu-widget" id="2">
                            <div class="collapse in" id="popular2">
						        <?php  // display values and item of food/dishes
									$stmt = $db->prepare("select * from dishes where rs_id='$_GET[res_id]'");
									$stmt->execute();
									$products = $stmt->get_result();
									if (!empty($products)) {
									    foreach($products as $product){
						                    ?>
                                            <div class="abc">
                                            <div class="food-item">
                                                <div class="row">
                                                    <div class="">
										            <form method="post" action='dishes.php?res_id=<?php echo $_GET['res_id'];?>&action=add&id=<?php echo $product['d_id']; ?>'>
                                                        <div>
                                                            <a class="restaurant-logo" href="#"><?php echo '<img src="admin/Res_img/dishes/'.$product['img'].'" alt="Food logo">'; ?></a>
                                                            <div class="rest-descr">
                                                                <a href="#"><?php echo $product['title']; ?></a>
                                                                <span class="price pull-right" >₱<?php echo $product['price']; ?></span> 
                                                            </div>
                                                        </div>
                                                        <!-- end:Logo -->
                                                    </div>
                                                    <div class="item-cart-info "> 
                                                        <p> <?php echo $product['slogan']; ?></p>
										            </div>
                                                    <div class="item-cart-info2">
                                                    <label for="quan">Qty:</label><input id="quan" type="number" class="quan" name="quantity" value="1" size="2"/>
                                
										                <!--<input class="b-r-0" type="text" name="quantity"  style="margin-left:30px;" value="1" size="2"/>-->
										                <input type="submit" class="menu-btn btn theme-btn pull-right" value="Add to Cart" />
                                                    </div>
										            </form>
                                                </div>
                                                <!-- end:row -->
                                            </div>
                                            <!-- end:Food item -->
                                            </div>
								    <?php
									    }
									}
								?>
                            </div>
                            <!-- end:Collapse -->
                        </div>
                        <!-- end:Widget menu -->
                    </div>
                    <!-- end:Bar -->
                </div>
                <!-- end:row -->
            </div>
            <!-- end:Container -->
        </div>
        <!-- end:page wrapper -->
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
    <script src="js/header.js"></script>


</body>

</html>
