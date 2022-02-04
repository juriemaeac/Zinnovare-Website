<!DOCTYPE html>
<html lang="en">
    <?php
        include("connection/connect.php");
        include_once 'product-action.php';
        error_reporting(0);
        session_start();
        if(empty($_SESSION["user_id"]))
        {
            header('location:login.php');
        }
        else{

                                                
            foreach ($_SESSION["cart_item"] as $item)
            {

            $item_total += ($item["price"]*$item["quantity"]);
            
                if($_POST['submit'])
                {
                    $SQL="insert into users_orders(u_id,title,quantity,price, total) values('".$_SESSION["user_id"]."','".$item["title"]."','".$item["quantity"]."','".$item["price"]."','".$item["price"]*$item["quantity"]."')";

                    mysqli_query($db,$SQL);
                    
                    $success = "Thankyou! Your Order Placed successfully!";
                    header("Location: your_orders.php");
                }
            }
    ?>


    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="#">
        <title>Starter Template for Bootstrap</title>
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/animsition.min.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet"> 
    </head>
<body>
    
    <div class="site-wrapper">
        <!--header starts-->
        <header id="header" class="header-scroll top-header headrom">
            <!-- .navbar -->
            <nav class="navbar navbar-dark">
                <div class="container">
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                    <a class="navbar-brand" href="index.html"> <img class="img-rounded" src="images/food-picky-logo.png" alt=""> </a>
                    <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"> <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Restaurants <span class="sr-only"></span></a> </li>
                            <li class="nav-item"><a data-target="#myModal" data-toggle="modal" href="#myModal" class="nav-link active" >Cart <span class="sr-only"></span></a> 
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
            <!--<div class="top-links">
                <div class="container">
                    <ul class="row links">
                      
                        <li class="col-xs-12 col-sm-4 link-item"><span>1</span><a href="restaurants.php">Choose Restaurant</a></li>
                        <li class="col-xs-12 col-sm-4 link-item "><span>2</span><a href="#">Pick Your favorite food</a></li>
                        <li class="col-xs-12 col-sm-4 link-item active" ><span>3</span><a href="checkout.php">Order and Pay online</a></li>
                    </ul>
                        
                </div>
            </div>-->
			
                <div class="container">
                 
					   <span style="color:green;">
								<?php echo $success; ?>
										</span>
					
                </div>
            
			
			
				  
            <div class="container m-t-30">
                <table class="co">
                    <tr>
                        <td><!--left side start-->
            <div class="left-side">
			<form action="" method="post">
                <div class="clearfix">
                    
                    <div class="widget-body">
                        <form method="post" action="#">
                            <div class="row">
                                
                                <div class="col-sm-12">
                                    <div class="cart-totals margin-b-20">
                                        <div class="cart-totals-title">
                                            <h4>Order Preview</h4>
                                        </div>
<!--Order Preview start-->

                    <div class="modal-content">
                    <div class="widget-cart">
                        
                        <div class="order-row bg-white">
                            <div class="widget-body">
                                <div class="checkout-table1">
                                    <table>
                                        <tr>
                                            <th class="cotable" width="240px">Dish</th>
                                            <th class="cotable2" width="96px"><center>Price</center></th>
                                            <th class="cotable2" width="96px"><center>Quantity</center></th>
                                            <th class="cotable2" width="96px"><center>Subtotal</center></th>
                                        </tr>
                                    </table>
                                </div>
                                <?php

                                    $item_total = 0;
                                    

                                    foreach ($_SESSION["cart_item"] as $item)  // fetch items define current into session ID
                                    {
                                        ?>
                                        <!-- table start -->
                                        <div class="checkout-table2">
                                        <table>
                                                
                                                <tr>
                                                    <td class="cotable" width="240px">
                                                        <div class="title-row">
                                                        <?php echo $item["title"]; ?>
                                                        </div>
                                                    </td>
                                                    
                                                    <td class="cotable2" width="96px">
                                                        <div>
                                                        <center><?php echo "$".$item["price"]; ?></center>
                                                        </div>
                                                    </td>
                                                    <td class="cotable2" width="96px">
                                                        <div>
                                                        <center><?php echo $item["quantity"]; ?></center>
                                                        </div>
                                                    </td>
                                                    <td class="cotable2" width="96px">
                                                        <div>
                                                        <center><?php echo "$".$item["price"]*$item["quantity"]; ?> </center>  
                                                        </div>
                                                    </td>
                                    
                                                </tr>
                                            </table>
                                        </div>							
                                    <!-- table end-->
                                        
                                        <?php
                                        $item_total += ($item["price"]*$item["quantity"]); // calculating current price into cart
                                    }
                                ?>	
                             </div>
                            </div>
                        </div>
                    </div>
                        
                    <!--end modal -->
                    
                </div>
                <!-- Order Preview end-->
                                        
                <div class="cart-totals-fields">
                    <?php
                        $result = mysqli_query($db,"SELECT * FROM users_orders WHERE o_id = '".$_GET['o_id']."'");
                        $details = mysqli_fetch_assoc($result);

                        $result1 = mysqli_query($db,"select * from users where u_id='".$_SESSION['user_id']."'");
                        $userdetails = mysqli_fetch_assoc($result1);
                    ?>
                    
                                            <table class="table">
											<tbody>
                                          
                                                    <tr>
                                                        <td>Cart Subtotal</td>
                                                        <td> <?php echo "$".$item_total; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Shipping &amp; Handling</td>
                                                        <td>free shipping</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-color"><strong>Total</strong></td>
                                                        <td class="text-color"><strong> <?php echo "$".$item_total; ?></strong></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
    
                                    
                                    <!--cart summary-->
                                    
                                    </form>
                                </div>
                            </div>
                       
                    </div>
                </div>
				 </form>
                </div>
                <!--left side end--></td>

                <!--right side start--><td>
                <div class="right-side">
			<form action="" method="post">
                <div class="clearfix">

                    <div class="widget-body">
                        <form method="post" action="#">
                            <div class="row">
                                
                                <div class="col-sm-12">
                                    <div class="cart-totals margin-b-20">
                                        <div class="cart-totals-title">
                                            <h4>Shipping Details</h4>
                                        </div>
                                        <div> <!-- address -->
                                        
                                        </div>
                                        <div>
                                        <p class="mb-0"><?php echo $userdetails['f_name']." ".$userdetails['l_name']?></p>
                            <p class="mb-0"><?php echo $userdetails['address'] ?></p>
                            <p class="mb-0"><?php echo $userdetails['email'] ?></p>
                            <p class="mb-0"><?php echo $userdetails['phone'] ?></p>
                                        </div>
                                        
                                    </div>
    
                                    
                                    <!--cart summary-->
                                    <br>
                                    <h4>Payment Option</h4>
                                    
                                    <div class="payment-option">
                                        <ul class=" list-unstyled">
                                            <li>
                                                <label class="custom-control custom-radio  m-b-20">
                                                    <input name="mod" id="radioStacked1" checked value="COD" type="radio" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Payment on delivery</span>
                                                    <br> <span>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</span> </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-radio  m-b-10">
                                                    <input name="mod"  type="radio" value="paypal" disabled class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Paypal <img src="images/paypal.jpg" alt="" width="90"></span> </label>
                                            </li>
                                        </ul>
                                        <p class="text-xs-center"><input type="submit" onclick="return confirm('Are you sure?');" name="submit"  class="btn theme-btn btn-lg" value="Order now"></p>
                                    </div>
                                    </form>
                                </div>
                            </div>
                       
                    </div>
                </div>
				 </form>
                </div>

                </td><!--right side end-->
                    </tr>
                </table>
            </div>
        </div>
        <!-- end:page wrapper -->
         </div>

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
</body>

</html>

<?php
}
?>
