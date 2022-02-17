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
        <link rel="icon" href="#">
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
                            <li class="nav-item"><a data-target="#myModal" data-toggle="modal" href="#myModal" class="nav-link active" >Cart <span class="sr-only"></span></a></li>
                            <li class="nav-item"> <a class="nav-link active" href="dishes.php?res_id=48">Menu <span class="sr-only"></span></a> </li>
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
        <div id="myModal" class="modal fade" role="dialog" style="opacity: 0.9;">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
                        <h4 class="modal-title">Your Shopping Cart</h4>
                    </div>
                    <div class="widget widget-cart">
                        
                        <div class="order-row bg-white">
                            <div class="widget-body">
                                <?php

                                    $item_total = 0;

                                    foreach ($_SESSION["cart_item"] as $item)  // fetch items define current into session ID
                                    {
                                        ?>									
                                    
                                        <div class="title-row">
                                            <?php echo $item["title"]; ?><a href="?res_id=<?php echo $_GET['res_id']; ?>&action=remove&id=<?php echo $item["d_id"]; ?>" >
                                            <i class="fa fa-trash pull-right"></i></a>
                                        </div>
                                        
                                        <div class="form-group row no-gutter">
                                            <div class="col-xs-8">
                                                    <input type="text" class="form-control b-r-0" value=<?php echo "$".$item["price"]; ?> readonly id="exampleSelect1">
                                                    
                                            </div>
                                            <div class="col-xs-4">
                                                <input class="form-control" type="text" readonly value='<?php echo $item["quantity"]; ?>' id="example-number-input"> 
                                            </div>
                                        
                                        </div>
                                        
                                        <?php
                                        $item_total += ($item["price"]*$item["quantity"]); // calculating current price into cart
                                    }
                                ?>	
                            </div>
                        </div>
                        
                                <!-- end:Order row -->
                             
                                <div class="widget-body">
                                    <div class="price-wrap text-xs-center">
                                        <p>TOTAL</p>
                                        <h3 class="value"><strong><?php echo "$".$item_total; ?></strong></h3>
                                        <p>Free Shipping</p>
                                        <?php if($item_total != 0): ?>
                                        <a href="checkout.php?res_id=<?php echo $_GET['res_id'];?>&action=check"  class="btn theme-btn btn-lg">Checkout</a>
                                        <?php elseif ($item_total == 0): ?>
                                            <a href="dishes.php?res_id=48" onclick="return confirm('Cart is Empty. Go to Menu?');" class="btn theme-btn btn-lg">Checkout</a>
                                        <?php endif; ?>                           
                                    </div>
                                </div>
                            </div>
                        <!--end modal content -->
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                        </div>
                        
                    <!--end modal -->
                    
                </div>

            </div>
        </div>
        <!--cart end-->
        <div class="page-wrapper" style="padding-top: 150px;">
            <!-- //results show -->
            <section class="restaurants-page">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-7 col-md-7 ">
                            <div class="bg-gray restaurant-entry">
                                <div class="row">
                                <h1>Recent Orders</h1>
                                    <table >
                                        <thead>
                                            <tr>
                                                <th>Item</th>
                                                <th>Quantity</th>
                                                <th>price</th>
                                                <th>total</th>
                                                <th>status</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                // displaying current session user login orders 
                                                $query_res= mysqli_query($db,"select * from users_orders where u_id='".$_SESSION['user_id']."' AND status IN ('in process', '')");
                                                if(!mysqli_num_rows($query_res) > 0 )
                                                {
                                                    echo '<td colspan="7"><center>You have No orders Placed yet. </center></td>';
                                                }
                                                else
                                                {			      
                                            
                                                    while($row=mysqli_fetch_array($query_res))
                                                    {
                                                        ?>
                                                        <tr>	
                                                            <td data-column="Item"> <?php echo $row['title']; ?></td>
                                                            <td data-column="Quantity"> <?php echo $row['quantity']; ?></td>
                                                            <td data-column="price">$<?php echo $row['price']; ?></td>
                                                            <td data-column="total">$<?php echo $row['price']*$row['quantity'] ; ?></td>
                                                            <td data-column="status"> 
                                                                <?php 
                                                                $status=$row['status'];
                                                                if($status=="" or $status=="NULL")
                                                                {
                                                                ?>
                                                                <button type="button" class="btn btn-info" style="font-weight:bold;">Wait for Confirmation</button>
                                                                <?php 
                                                                    }
                                                                    if($status=="in process")
                                                                    { ?>
                                                                    <button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin"  aria-hidden="true" ></span>On the Way</button>
                                                                
                                                                <?php
                                                                    }
                                                                    if($status=="closed")
                                                                    {
                                                                ?>
                                                                    <button type="button" class="btn btn-success" ><span  class="fa fa-check-circle" aria-hidden="true"> Delivered</button> 
                                                                <?php 
                                                                } 
                                                                ?>
                                                                <?php
                                                                if($status=="rejected")
                                                                      {
                                                                ?>
                                                                    <button type="button" class="btn btn-danger"> <i class="fa fa-close"></i>cancelled</button>
                                                                <?php 
                                                                } 
                                                                ?>
                                                            </td>
                                                            <td data-column="Date"> <?php echo $row['date']; ?></td>
                                                            <td data-column="Action"> <a href="delete_orders.php?order_del=<?php echo $row['o_id'];?>" onclick="return confirm('Are you sure you want to cancel your order?');" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a></td> 
                                                        </tr>
                                                        <?php 
                                                    }
                                                } 
                                            ?>	
                                        </tbody>
                                    </table>
                                    <h1>All Orders</h1>
                                    <table >
                                        <thead>
                                            <tr>
                                                <th>Item</th>
                                                <th>Quantity</th>
                                                <th>price</th>
                                                <th>total</th>
                                                <th>status</th>
                                                <th>Date</th>
                                                <th>Invoice</th>
                                            </tr>
                                        </thead>
                                        <tbody> 
                                            <?php 
                                                // displaying current session user login orders 
                                                $query_res= mysqli_query($db,"select * from users_orders where u_id='".$_SESSION['user_id']."' AND status IN ('closed', 'rejected')");
                                                
                                                if(!mysqli_num_rows($query_res) > 0 )
                                                {
                                                    echo '<td colspan="7"><center>You have No orders Placed yet. </center></td>';
                                                }
                                                else
                                                {		  
                                                    while($row=mysqli_fetch_array($query_res))
                                                    {
                                                    ?>
                                                        <tr>	
                                                            <td data-column="Item"> <?php echo $row['title']; ?></td>
                                                            <td data-column="Quantity"> <?php echo $row['quantity']; ?></td>
                                                            <td data-column="price">$<?php echo $row['price']; ?></td>
                                                            <td data-column="total">$<?php echo $row['price']*$row['quantity'] ; ?></td>
                                                            <td data-column="status"> 
                                                            <?php 
                                                            
                                                                $status=$row['status'];
                                                                if($status=="" or $status=="NULL")
                                                                {
                                                                ?>
                                                                <button type="button" class="btn btn-info" style="font-weight:bold;">Waiting</button>
                                                                <?php 
                                                                    }
                                                                    if($status=="in process")
                                                                    { ?>
                                                                    <button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin"  aria-hidden="true" ></span>On a Way!</button>
                                                                <?php
                                                                    }
                                                                    if($status=="closed")
                                                                    {
                                                                ?>
                                                                <a type="button" class="open-button btn btn-warning" href="feedback.php?o_id=<?php echo $row['o_id'];?>" value="Delivered" id="myButton1">
                                                                <button type="button" class="btn btn-primary">Delivered</button></a>
                                                                
                                                                        <?php 
                                                                            if($_POST['submit'])
                                                                            {
                                                                                
                                                                                $SQL="INSERT INTO feedback ( 
                                                                                    o_id, 
                                                                                    u_id) 
                                                                              SELECT o_id, 
                                                                                     u_id,'1'
                                                                              FROM users_orders";
                                                                                mysqli_query($db,$SQL);
                                                                                
                                                                                $success = "Thankyou! Your Order Placed successfully!";
                                                                                header("Location: order_history.php");
                                                                            }
                                                                        ?>
                                                                    
                                                                            <!--FEEDBACK-->
                                                                            <div class="feedback-popup" id="myForm">
                                                                                <form action="" class="feedback-container">
                                                                                <h1>FEEDBACK</h1>
                                                                                <textarea name="feedback" required cols="30" rows="10" class="feedback-text" placeholder="Enter Feedback"></textarea>
                                                                                <button type="button" class="btn cancel pull-right" onclick="closeForm()">Close</button>
                                                                                <button type="submit" class="btn pull-right" onclick="change()">Submit</button>
                                                                                
                                                                            </form>
                                                                            </div>
                                                                    <!--END FEEDBACK-->
                                                                <?php 
                                                                } 
                                                                ?>
                                                                <?php
                                                                if($status=="rejected")
                                                                    {
                                                                ?>
                                                                    <button type="button" class="btn btn-danger"> <i class="fa fa-close"></i>cancelled</button>
                                                                <?php 
                                                                } 
                                                                ?>
                                                                
                                                            </td>
                                                            <td data-column="Date"> <?php echo $row['date']; ?></td>
                                                            <td data-column="Invoice"> <a href="invoice.php?o_id=<?php echo $row['o_id'];?>" class="btn btn-warning btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-file-o" style="font-size:16px"></i></a></td> 
                                                            
                                                        </tr>
                                                    <?php 
                                                    }
                                                } 
                                            ?>	
                                        </tbody>
                                    </table>
                                </div>
                                <!--end:row -->
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
            </section>
                
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
                document.getElementById("myButton1").value="Order Received"; 
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