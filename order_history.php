<!DOCTYPE html>
<html lang="en">
    <?php
        include("connection/connect.php");
        include_once 'product-action.php'; //including controller
        error_reporting(0);
        session_start();

        if(empty($_SESSION['user_id']))  //if usser is not login redirected baack to login page
        {
            header('location:login.php');
        }
        else
        {
    ?>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" type="image/png" sizes="16x16" href="admin/images/logo1.png">
        <title>Starter Template for Bootstrap</title>
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/animsition.min.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
        <style type="text/css" rel="stylesheet">


            .indent-small {
            margin-left: 5px;
            }
            .form-group.internal {
            margin-bottom: 0;
            }
            .dialog-panel {
            margin: 10px;
            }
            .datepicker-dropdown {
            z-index: 200 !important;
            }
            .panel-body {
            background: #e5e5e5;
            /* Old browsers */
            background: -moz-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
            /* FF3.6+ */
            background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, #e5e5e5), color-stop(100%, #ffffff));
            /* Chrome,Safari4+ */
            background: -webkit-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
            /* Chrome10+,Safari5.1+ */
            background: -o-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
            /* Opera 12+ */
            background: -ms-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
            /* IE10+ */
            background: radial-gradient(ellipse at center, #e5e5e5 0%, #ffffff 100%);
            /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e5e5e5', endColorstr='#ffffff', GradientType=1);
            /* IE6-9 fallback on horizontal gradient */
            font: 600 15px "Open Sans", Arial, sans-serif;
            }
            label.control-label {
            font-weight: 600;
            color: #777;
            }


            table { 
                width: 750px; 
                border-collapse: collapse; 
                margin: auto;
                
                }

            /* Zebra striping */
            tr:nth-of-type(odd) { 
                background: #eee; 
                }

            th { 
                background: #ff3300; 
                color: white; 
                font-weight: bold; 
                
                }

            td, th { 
                padding: 10px; 
                border: 1px solid #ccc; 
                text-align: left; 
                font-size: 14px;
                
                }

            /* 
            Max width before this PARTICULAR table gets nasty
            This query will take effect for any screen smaller than 760px
            and also iPads specifically.
            */
            @media 
            only screen and (max-width: 760px),
            (min-device-width: 768px) and (max-device-width: 1024px)  {

                table { 
                    width: 100%; 
                }

                /* Force table to not be like tables anymore */
                table, thead, tbody, th, td, tr { 
                    display: block; 
                }
                
                /* Hide table headers (but not display: none;, for accessibility) */
                thead tr { 
                    position: absolute;
                    top: -9999px;
                    left: -9999px;
                }
                
                tr { border: 1px solid #ccc; }
                
                td { 
                    /* Behave  like a "row" */
                    border: none;
                    border-bottom: 1px solid #eee; 
                    position: relative;
                    padding-left: 50%; 
                }

                td:before { 
                    /* Now like a table header */
                    position: absolute;
                    /* Top/left values mimic padding */
                    top: 6px;
                    left: 6px;
                    width: 45%; 
                    padding-right: 10px; 
                    white-space: nowrap;
                    /* Label the data */
                    content: attr(data-column);

                    color: #000;
                    font-weight: bold;
                }
            }
        </style>
    </head>

    <body>
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
        <div id="myModalEmpty" class="modal fade" role="dialog">
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
        <div id="myModal" class="modal fade" role="dialog">
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
                                                <input type="text" class="form-control b-r-0" style="background-color: white;border:none" value=<?php echo "Php".$item["price"]; ?> readonly id="exampleSelect1">
                                                    
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
        <div class="page-wrapper-history">
            <!-- //results show -->
            <div>
            <h1>Order History</h1>
            <hr>
            </div>
            <div class="row" style="margin: auto;">
                <?php 
                        // displaying current session user login orders 
                    $query_res= mysqli_query($db,"select * from users_orders where u_id='".$_SESSION['user_id']."' AND status IN ('closed', 'rejected') ORDER by date DESC LIMIT 0,10");
                    while($row=mysqli_fetch_array($query_res))
                        {
                            ?><div class="col-xs-12 col-sm-6 col-md-1 food-item" style="inline-size: 125px;">
                                
                                    
                                    <?php 
                                        $status=$row['status'];
                                        if($status=="" or $status=="closed")
                                        {
                                            ?>
                                                <div class="columnHistory-num-closed">
                                                <i class="fa fa-check"></i> #<?php echo $row['o_id']; ?>
                                                </div>
                                            <?php 
                                        }
                                        if($status=="rejected")
                                        { 
                                            ?>
                                                <div class="columnHistory-num-rejected">
                                                <i class="fa fa-close"></i> #<?php echo $row['o_id']; ?>
                                                </div>
                                    
                                            <?php
                                        }
                                    ?>
                                </div>
                            <?php
                        }
                ?>         
            </div>
            <div>
                <h1>Recent Orders</h1>
            </div>
            <div class="row full">
                <?php 
                    // displaying current session user login orders 
                    $query_res= mysqli_query($db,"SELECT dishes.*, users_orders.* FROM dishes INNER JOIN users_orders ON dishes.title=users_orders.title where u_id='".$_SESSION['user_id']."' AND status IN ('in process', '') ORDER BY date DESC");
                    if(!mysqli_num_rows($query_res) > 0 )
                    {
                        echo '<hr><center>You have no orders placed yet. </center><hr>';
                    }
                    else
                    {			      
                        while($row=mysqli_fetch_array($query_res))
                        {
                            ?>  <div class="oh-container">
                                    <div class="history-container">
                                        <!--<div class="media-top meida media-middle">
                                            <span><i><img src="src/user.png" alt="user" width="60px" height="60px"/></i></span>
                                        </div>-->
                                        <div style="font-weight:bold">
                                            Order #<?php echo $row['o_id']; ?><br>
                                        </div>
                                        <div style="font-size: small;color:gray">
                                            <?php echo $row['date']; ?>
                                        </div>
                                        <div >
                                            <div class="rowHistory">
                                                <div class="columnHistory" style="padding-top: 10px;">
                                                    <a><?php echo "<img class='history-img' src='src/".$row['img']."' style='width:70px; height:70px; border-radius:25px'";?></a>
                                                </div>
                                                <div class="columnHistory">
                                                    <div class="rowHistory" style="padding-bottom: 10px;padding-top: 10px;font-weight:bold">
                                                        <?php echo $row['title']; ?>
                                                    </div>
                                                    <div class="rowHistory" style="font-size: small;color:gray; height:60px;">
                                                        <?php echo $row['slogan']; ?>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="rowHistory" style="padding-top: 10px;">
                                                <div class="columnHistory">
                                                    Php <?php echo $row['price']; ?>
                                                </div>
                                                <div class="columnHistory">
                                                    <p style="text-align: right;"> Qty: <?php echo $row['quantity']; ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="history-line">              
                                        <div>
                                            <div style="padding-top: 10px; padding-bottom: 10px;">
                                                <center>
                                                    <span style="font-weight: bold;">
                                                        Total:
                                                    </span>
                                                    <span style="font-weight: bold; font-size:15px">
                                                        Php <?php echo $row['price']*$row['quantity'] ; ?>
                                                    </span>
                                                    
                                                </center>
                                            </div>
                                        </div>
                                        <div class="center-history">
                                            <div class="rowHistory">
                                                    Status: 
                                                    <?php 
                                                        $status=$row['status'];
                                                        if($status=="" or $status=="NULL")
                                                        {
                                                            ?>
                                                                <div class="rowHistory">
                                                                    <div class="columnHistory-status">
                                                                        <button type="button" class="btn btn-info" style="margin-left: 10px; padding:6px; border-radius:4px; font-size:small"><span class="fa fa-hourglass fa-spin"  aria-hidden="true" ></span> Wait for Confirmation</button>
                                                                    </div>
                                                                    <div class="columnHistory-status" style="padding-left: 10px;">
                                                                        <a href="delete_orders.php?order_del=<?php echo $row['o_id'];?>" onclick="return confirm('Are you sure you want to cancel your order?');">
                                                                            <img src="src/remove.png" alt="cancel" width="30px" height="30px"/>
                                                                        </a>
                                                                    </div>  
                                                                </div>
                                                            <?php 
                                                        }
                                                        if($status=="in process")
                                                        { 
                                                            ?>  
                                                                <div class="rowHistory">
                                                                    <div class="columnHistory-status">
                                                                        <button type="button" style="border:none; background:orange; color: white;margin-left: 10px; padding:5px; border-radius:4px; font-size:small"><span class="fa fa-cog fa-spin"  aria-hidden="true" ></span> On the Way</button>
                                                                    </div>
                                                                    <div class="columnHistory-status" style="padding-left: 10px;">
                                                                            <img class="disable-btn" src="src/remove.png" alt="cancel" width="30px" height="30px"/>
                                                                        
                                                                    </div>  
                                                                </div>
                                                            <?php
                                                        }
                                                    ?>
                                                  
                                            </div>             
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            <?php 
                        }
                    } 
                ?>	
            </div>

            <div>
                <h1>Completed Orders</h1>
            </div>
            <div class="row full">
                
                <?php 
                    // displaying current session user login orders 
                    $query_res= mysqli_query($db,"SELECT dishes.*, users_orders.* FROM dishes INNER JOIN users_orders ON dishes.title=users_orders.title where u_id='".$_SESSION['user_id']."' AND status IN ('closed', 'rejected') ORDER BY date DESC");
                            
                    if(!mysqli_num_rows($query_res) > 0 )
                    {
                        echo '<hr><center>You have no completed orders yet. </center><hr>';
                    }
                    else
                    {		  
                        while($row=mysqli_fetch_array($query_res))
                        {
                            ?>
                            <div class="oh-container">
                                <div id="<?php echo $row['o_id'];?>" class="history-container">
                                    <!--<div class="media-top meida media-middle">
                                        <span><i><img src="src/user.png" alt="user" width="60px" height="60px"/></i></span>
                                    </div>-->
                                    <div style="font-weight:bold">
                                        Order #<?php echo $row['o_id']; ?><br>
                                    </div>
                                    <div style="font-size: small;color:gray">
                                        <?php echo $row['date']; ?>
                                    </div>
                                    <div >
                                        <div class="rowHistory">
                                            <div class="columnHistory" style="padding-top: 10px;">
                                                <a><?php echo "<img class='history-img' src='src/".$row['img']."' style='width:70px; height:70px; border-radius:25px'";?></a>
                                            </div>
                                            <div class="columnHistory">
                                                <div class="rowHistory" style="padding-bottom: 10px;padding-top: 10px;font-weight:bold">
                                                    <?php echo $row['title']; ?>
                                                </div>
                                                <div class="rowHistory" style="font-size: small;color:gray; height:60px;">
                                                    <?php echo $row['slogan']; ?>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="rowHistory" style="padding-top: 10px;">
                                            <div class="columnHistory">
                                                Php <?php echo $row['price']; ?>
                                            </div>
                                            <div class="columnHistory">
                                                <p style="text-align: right;"> Qty: <?php echo $row['quantity']; ?> </p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="history-line">              
                                    <div>
                                        <div style="padding-top: 10px; padding-bottom: 10px;">
                                            <center>
                                                <span style="font-weight: bold;">
                                                    Total:
                                                </span>
                                                <span style="font-weight: bold; font-size:15px">
                                                    Php <?php echo $row['price']*$row['quantity'] ; ?>
                                                </span>
                                                
                                            </center>
                                        </div>
                                    </div>
                                    <div class="center-history">
                                        <div class="rowHistory">
                                                Status: 
                                                <?php 
                                                $status=$row['status'];
                                                $o_id = $row['o_id'];
                                                
                                                $query_res_fb= mysqli_query($db,"SELECT * from fb where o_id = $o_id");
                                                $row_fb=mysqli_fetch_array($query_res_fb);
                                                $o_id_fb = $row_fb['o_id'];

                                                    if($status=="closed")
                                                    {
                                                        ?>
                                                        <div class="rowHistory">
                                                            <?php
                                                            if($o_id_fb == null){
                                                                ?>
                                                                <div class="columnHistory-status">
                                                                        <a href="fb.php?o_id=<?php echo $row['o_id'];?>" type="button" class="btn btn-warning" style="background:orange; margin-left: 10px; padding:6px; border-radius:4px; font-size:small">
                                                                        <i class="fa fa-check"></i> Order Received</a>
                                                                    </div>
                                                                <?php
                                                            }
                                                            elseif ($o_id_fb != null){
                                                                ?>
                                                                <div class="columnHistory-status">
                                                                        <a type="button" class="disable-btn-received" style="background:#00CC00; color:white; margin-left: 10px; padding:6px; border-radius:4px; font-size:small">
                                                                        <i class="fa fa-check"></i> Received</a>
                                                                    </div>
                                                                    <?php
                                                            }
                                                            ?>
                                                            

                                                            <div class="columnHistory-status" style="padding-left: 10px;">
                                                                <a href="invoice.php?o_id=<?php echo $row['o_id'];?>">
                                                                    <img src="src/invoice.png" alt="invoice" width="30px" height="30px"/> 
                                                                </a>
                                                            </div>  
                                                        </div>       
                                                            
                                                        <!--FEEDBACK-->
                                                        <div class="feedback-popup" id="myForm">
                                                            <form action="" class="feedback-container" method="post">
                                                                <h1>FEEDBACK</h1>
                                                                <?php echo $row['o_id'];?>
                                                                <textarea name="feedback" required cols="30" rows="10" class="feedback-text" placeholder="Enter Feedback"></textarea>
                                                                <button type="submit" name="submit" class="btn pull-right" onclick="change()">Submit</button>
                                                                <button type="button" class="btn cancel pull-right" onclick="closeForm()">Close</button>                                                                     
                                                            </form>
                                                        </div>
                                                        <!--END FEEDBACK-->
                                                        <?php 
                                                    } 
                                                    
                                                    else if($status=="rejected")
                                                    {
                                                        ?>
                                                            <div class="rowHistory">
                                                                <div class="columnHistory-status">
                                                                    <button type="button" class="btn btn-danger cancel" style="background:red; margin-left: 10px; padding:6px; border-radius:4px; font-size:small"> <i class="fa fa-close"></i> Cancelled</button>
                                                                </div>
                                                                <div class="columnHistory-status" style="padding-left: 10px;">
                                                                    <img class="disable-btn" src="src/invoice.png" alt="invoice" width="30px" height="30px"/> 
                                                                </div>
                                                            </div>
                                                        <?php 
                                                    } 
                                                ?>
                                        </div>             
                                    </div>
                                </div>
                            </div>
                            <?php 
                        }
                    } 
                ?>	
            </div>
            
        </div>
        <div class="footerCopyright-footer"style="background-color: black; opacity: 0.8;padding-bottom:10px">
                <div class="row-footer">

                    <div class="column-footer">
                        <a href="index.php"><img src="admin/images/logo6.png" alt="Zinnovare" width="140px" height="40px"/></a>
                    </div>
                    
                    <div class="column-footer">© 2017-2022
                        <span class="copyright-footer">
                            Zinnovare Inc.
                        </span>
                        All Rights Reserved.
                    </div>

                </div>
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
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script>
        $(window).scroll(function() {
        if ($(window).scrollTop() >= 200) {
            $('.navbar').css('background', 'black');
        } else {
            $('.navbar').css('background', 'black');
        }
        });

        function openForm()
            {
                document.getElementById("myForm").style.display = "block";
            }
            function closeForm() {
  document.getElementById("myForm").style.display = "none";
}

function change()
            {
                
                document.getElementById("myButton1").value="Received"; 
                document.getElementById('myButton1').onclick = function () {
    this.disabled = true;
}
            }
            
    </script>
    </body>

</html>
<?php
}
?>

<?php
$server = "localhost" ;
$username = "root" ;
$password = "" ;
$dbname = "online_rest" ;

$conn = mysqli_connect($server , $username, $password , $dbname) ;

if(isset($_POST['submit'])){

    if(!empty($_POST['feedback'])){

        $feedback = $_POST['feedback'] ;
        $order_id = mysqli_query($db,"select * from users_orders where u_id='".$_SESSION['user_id']."' AND status='closed'");
        $order = mysqli_fetch_assoc($order_id);
        $idd = $order['o_id'];

        $query = "insert into fb(o_id,u_id,feedback) values('$idd', '".$_SESSION["user_id"]."', '$feedback')" ;

        $run = mysqli_query($conn,$query) or die(mysqli_error($conn));
    }
else{
    echo "all fields required" ;
    }

}

?>
