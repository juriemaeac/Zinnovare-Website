<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zinnovare</title>
    
    <link href="css/style.css" rel="stylesheet"> 
</head>
<body>
<header id="header" class="header-scroll top-header headrom">
            <!-- .navbar -->
            <nav class="navbar navbar-dark">
                <div class="container" >
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                    <a style="padding-top:10px;" class="navbar-brand" href="index.php"> <img class="img-rounded" src="src/logo6.png" alt="" height="60px" width="210px"> </a>
                    <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                        <ul class="nav navbar-nav" style="padding-top:15px; font-size:large">
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
        
</body>
</html>