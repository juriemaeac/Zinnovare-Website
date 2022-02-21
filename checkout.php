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
                    header("Location: order_history.php");
                    unset($_SESSION["cart_item"]);
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
        <!--CART and header/navbar starts-->
        <header id="header" class="header-scroll top-header headrom">
            <!-- .navbar -->
            <nav class="navbar navbar-dark" style="background-color: black;">
                <div class="container" >
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                    <a style="padding-top:10px;" class="navbar-brand" href="index.php"> <img class="img-rounded" src="src/logo6.png" alt="" height="42px" width="142px"> </a>
                    <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                        <ul class="nav navbar-nav" style="padding-top:10px; font-size:large">
                            <li class="nav-item"> <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
                            <?php
                                if(empty($_SESSION["cart_item"])) // if user is not login
                                {
                                    echo '<li class="nav-item"><a data-target="#myModalEmpty" data-toggle="modal" href="#myModalEmpty" class="nav-link active" >Cart <span class="sr-only"></span></a></li>';
                                }
                                else
                                {
                                    //if user is login
                                    echo  '<li class="nav-item"><a data-target="#myModal" data-toggle="modal" href="#myModal" class="nav-link active" >Cart <span class="sr-only"></span></a></li>';
                                    
                                }
                            ?>
                            <li class="nav-item"> <a class="nav-link active" href="menu.php?res_id=48">Menu <span class="sr-only"></span></a> </li>
							<?php
                                if(empty($_SESSION["user_id"])) // if user is not login
                                {
                                    echo '<li class="nav-item"><a href="login.php" class="nav-link active">login</a> </li>
                                    <li class="nav-item"><a href="registration.php" class="nav-link active">signup</a> </li>';
                                }
                                else
                                {
                                    //if user is login
                                    echo  '<li class="nav-item"><a href="order_history.php" class="nav-link active">Orders</a> </li>';
                                    echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">logout</a> </li>';
                                }
                            ?>
                            <!--<li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="admin/images/bookingSystem/2.png" alt="user" class="profile-pic" /></a>
                                <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                    <ul class="dropdown-user">
                                        <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                        <li><a href="profile.php"><i class="fa fa-user"></i> Profile</a></li>
                                    </ul>
                                </div>
                            </li>-->
							 
                        </ul>
						 
                    </div>
                </div>
                
            </nav>
            <!-- /.navbar -->
        </header>
        <div id="myModalEmpty" class="modal fade" role="dialog" style="opacity: 0.9;">
            <div class="modal-dialog" style="width: 400px; height:300px;">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" >
                        <br>
                        <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
                        <p class="modal-title" style="text-align: center;font-weight:bold;margin-bottom:20px">Cart is Empty</p>
                        <center>
                    <a href="menu.php?res_id=48" class="btn theme-btn btn-lg" style="font-size:small; width: 30%;padding:10px;margin-bottom:20px">View Menu</a>
                            
                                <button type="button" class="btn btn-default" data-dismiss="modal" style="font-size:small; width: 30%; padding:10px; margin-bottom:20px">Close</button>
                            </center>
                    </div>
                    
                </div>
            </div>
        </div>
        <div id="myModal" class="modal fade" role="dialog" style="opacity: 0.9;">
            <div class="modal-dialog" style="width: 400px; height:300px;">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="background-color: orange;">
                        <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
                        <p class="modal-title" style="text-align: center;font-weight:bold">CART</p>
                    </div>
                    <div class="widget widget-cart">
                        
                        <div class="order-row bg-white">
                            <div class="widget-body" style="padding-bottom: 0;margin-bottom:0">
                                <?php

                                    $item_total = 0;

                                    foreach ($_SESSION["cart_item"] as $item)  // fetch items define current into session ID
                                    {
                                        ?>									
                                    
                                        <div class="title-row" style="font-weight: bold;">
                                            <?php echo $item["title"]; ?><a href="?res_id=<?php echo $_GET['res_id']; ?>&action=remove&id=<?php echo $item["d_id"]; ?>" >
                                            <i class="fa fa-trash pull-right"></i></a>
                                        </div>
                                        
                                        <div class="form-group row no-gutter">
                                         
                                            <div class="col-xs-8">
                                                <input type="text" class="form-control b-r-0" style="background-color: white;border:none" value=<?php echo "$".$item["price"]; ?> readonly id="exampleSelect1">
                                                    
                                            </div>
                                            <div class="col-xs-4">
                                                <input class="form-control" style="background-color: white;border:none;padding-left:65px" type="text" readonly value='Qty: <?php echo $item["quantity"]; ?>' id="example-number-input"> 
                                            </div> 
                                        </div>
                                        <hr> 
                                        
                                        <?php
                                        $item_total += ($item["price"]*$item["quantity"]); // calculating current price into cart
                                    }
                                ?>	
                            </div>
                        </div>
                        
                                <!-- end:Order row -->
                             
                                <div class="widget-body" style="padding-bottom: 0;margin-bottom:0;">
                                    <div>
                                        <p style="text-align: center;">
                                            <span style="font-weight: bold;">TOTAL: </span>
                                            <span class="value" ><?php echo "Php ".$item_total; ?></span>
                                        </p>                 
                                    </div>
                                </div>
                            </div>
                            <center>
                            <a href="checkout.php?res_id=<?php echo $_GET['res_id'];?>&action=check"  class="btn theme-btn btn-lg" style="font-size:small; width: 30%; padding:15px;margin-bottom:20px">Checkout</a>
                            <button type="button" class="btn btn-default" data-dismiss="modal" style="font-size:small; width: 30%; padding:15px; margin-bottom:20px">Close</button>
                            <!--<?php if($item_total != 0): ?>
                                <a href="checkout.php?res_id=<?php echo $_GET['res_id'];?>&action=check"  class="btn theme-btn btn-lg" style="font-size:small; width: 30%; padding:15px;margin-bottom:20px">Checkout</a>
                            <?php elseif ($item_total == 0): ?>
                                <a href="dishes.php?res_id=48" onclick="return confirm('Cart is Empty. Go to Menu?');" class="btn theme-btn btn-lg" style="font-size:small; width: 30%;padding:15px;margin-bottom:20px">Checkout</a>
                            <?php endif; ?>  
                                <button type="button" class="btn btn-default" data-dismiss="modal" style="font-size:small; width: 30%; padding:15px; margin-bottom:20px">Close</button>-->
                            </center>
                        <!--end modal content -->
                        <div class="modal-footer" style="padding:0; margin:0">
                            
                        </div>
                    </div>
                        
                    <!--end modal -->
                    
                </div>

            </div>
        </div>
        <!--cart end-->
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
                                                        <center><?php echo "Php ".$item["price"]; ?></center>
                                                        </div>
                                                    </td>
                                                    <td class="cotable2" width="96px">
                                                        <div>
                                                        <center><?php echo $item["quantity"]; ?></center>
                                                        </div>
                                                    </td>
                                                    <td class="cotable2" width="96px">
                                                        <div>
                                                        <center><?php echo "Php ".$item["price"]*$item["quantity"]; ?> </center>  
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
                                                        <td> <?php echo "Php ".$item_total; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Shipping &amp; Handling</td>
                                                        <td>free shipping</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-color"><strong>Total</strong></td>
                                                        <td class="text-color"><strong> <?php echo "Php ".$item_total; ?></strong></td>
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
                                                    <br> <span>Please send your payment to Zinnovare, Bucal IV-A, Maragondon, Cavite, Philippines, 4112.</span> </label>
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
