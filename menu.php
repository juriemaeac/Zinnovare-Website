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
                    <a href="dishes.php?res_id=48" class="btn theme-btn btn-lg" style="font-size:small; width: 30%;padding:10px;margin-bottom:20px">View Menu</a>
                            
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

        <div class="page-wrapper" style="padding-right: 20px;">
        <!--<div style="margin-top:18px;padding-left:40px;font-size:xx-large;background:orange;">
                Menu
        </div>-->
		    <?php $ress= mysqli_query($db,"select * from restaurant where rs_id='$_GET[res_id]'");
                $rows=mysqli_fetch_array($ress);
            ?>
                <div class="row">
                    <div class="menu-food">
                        <div class="menu-widget" id="2">
                            <div class="collapse in" id="popular2">
						        <?php  // display values and item of food/dishes
									$stmt = $db->prepare("select * from dishes where rs_id='$_GET[res_id]'");
									$stmt->execute();
									$products = $stmt->get_result();
									if (!empty($products)) 
                                    {
									    foreach($products as $product)
                                        {
						                    ?>
                                                <div class="abc">
                                                    <div class="food-item">
                                                        <div class="row">
                                                            <div class="">
                                                            <form method="post" action='menu.php?res_id=<?php echo $_GET['res_id'];?>&action=add&id=<?php echo $product['d_id']; ?>'>
                                                                <div>
                                                                    <a class="restaurant-logo" href="#"><?php echo '<img src="admin/Res_img/dishes/'.$product['img'].'" alt="Food logo">'; ?></a>
                                                                    <div class="rest-descr">
                                                                        <a href="#"><?php echo $product['title']; ?></a>
                                                                        <span class="price pull-right" >₱<?php echo $product['price']; ?></span> 
                                                                    </div>
                                                                </div>
                                                                <!-- end:Logo -->
                                                                </div><!--sobra?-->
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
                                                <!-- end:abc -->
								            <?php
									    }
									}
								?>
                            </div>
                            <!-- end:Collapse -->
                        </div>
                        <!-- end:Widget menu -->
                    </div>
                    <!-- end:menu-food -->
                    <div class="menu-right">
                        <div class="menu-right-content1">
                        <?php 
                                // displaying current session user login orders 
                                $query_res= mysqli_query($db,"select * from users where u_id='".$_SESSION['user_id']."'");
                                $row=mysqli_fetch_array($query_res);
                            ?>
                            <img class="coming-soon"src="src/user.png" alt="user" style="width:80px; height:80px;margin-bottom:10px">
                            <h6>
                                <span><?php echo $row['f_name']; ?></span>
                                <span><?php echo $row['l_name']; ?></span>
                            </h6>
                            <div class="prev-profile" onclick="location.href='order_history.php';">
                                
                                <?php $sql="select * from users_orders WHERE u_id='".$_SESSION['user_id']."'";
                                    $result=mysqli_query($db,$sql); 
                                    $rws=mysqli_num_rows($result);
                                    echo 'Total Orders: '.$rws;
                                ?>
                            </div>
                            <div style="text-align:left; padding-top:10px">
                                <div>
                                    <?php echo $row['email']; ?>
                                </div>
                                <div>
                                    <?php echo $row['phone']; ?>
                                </div>
                                <div style="overflow: hidden;">
                                    <?php echo $row['address']; ?>
                                </div>
                            </div>

                        </div>
                        <div class="menu-right-content2">
                        <div class="img-comp-container">
                                <div class="img-comp-img">
                                    <img class="cover-menu2" src="src/bg.jpg" >
                                </div>
                                <div class="img-comp-img img-comp-overlay">
                                    <img class="cover-menu1" src="src/bg3.jpg" >
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- end:menu-food -->
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
    <script>
        $(window).scroll(function() {
if ($(window).scrollTop() >= 100) {
    $('.navbar').css('background', 'black');
} else {
    $('.navbar').css('background', 'black');
}
});
    </script>
    <script>
function initComparisons() {
  var x, i;
  /*find all elements with an "overlay" class:*/
  x = document.getElementsByClassName("img-comp-overlay");
  for (i = 0; i < x.length; i++) {
    /*once for each "overlay" element:
    pass the "overlay" element as a parameter when executing the compareImages function:*/
    compareImages(x[i]);
  }
  function compareImages(img) {
    var slider, img, clicked = 0, w, h;
    /*get the width and height of the img element*/
    w = img.offsetWidth;
    h = img.offsetHeight;
    /*set the width of the img element to 50%:*/
    img.style.width = (w / 2) + "px";
    /*create slider:*/
    slider = document.createElement("DIV");
    slider.setAttribute("class", "img-comp-slider");
    /*insert slider*/
    img.parentElement.insertBefore(slider, img);
    /*position the slider in the middle:*/
    slider.style.top = (h / 2) - (slider.offsetHeight / 2) + "px";
    slider.style.left = (w / 2) - (slider.offsetWidth / 2) + "px";
    /*execute a function when the mouse button is pressed:*/
    slider.addEventListener("mousedown", slideReady);
    /*and another function when the mouse button is released:*/
    window.addEventListener("mouseup", slideFinish);
    /*or touched (for touch screens:*/
    slider.addEventListener("touchstart", slideReady);
    /*and released (for touch screens:*/
    window.addEventListener("touchend", slideFinish);
    function slideReady(e) {
      /*prevent any other actions that may occur when moving over the image:*/
      e.preventDefault();
      /*the slider is now clicked and ready to move:*/
      clicked = 1;
      /*execute a function when the slider is moved:*/
      window.addEventListener("mousemove", slideMove);
      window.addEventListener("touchmove", slideMove);
    }
    function slideFinish() {
      /*the slider is no longer clicked:*/
      clicked = 0;
    }
    function slideMove(e) {
      var pos;
      /*if the slider is no longer clicked, exit this function:*/
      if (clicked == 0) return false;
      /*get the cursor's x position:*/
      pos = getCursorPos(e)
      /*prevent the slider from being positioned outside the image:*/
      if (pos < 0) pos = 0;
      if (pos > w) pos = w;
      /*execute a function that will resize the overlay image according to the cursor:*/
      slide(pos);
    }
    function getCursorPos(e) {
      var a, x = 0;
      e = (e.changedTouches) ? e.changedTouches[0] : e;
      /*get the x positions of the image:*/
      a = img.getBoundingClientRect();
      /*calculate the cursor's x coordinate, relative to the image:*/
      x = e.pageX - a.left;
      /*consider any page scrolling:*/
      x = x - window.pageXOffset;
      return x;
    }
    function slide(x) {
      /*resize the image:*/
      img.style.width = x + "px";
      /*position the slider:*/
      slider.style.left = img.offsetWidth - (slider.offsetWidth / 2) + "px";
    }
  }
}
</script>
<script>
/*Execute a function that will execute an image compare function for each element with the img-comp-overlay class:*/
initComparisons();
</script>
<script type="text/javascript">
    var counter = 1;
    setInterval(function(){
      document.getElementById('radio' + counter).checked = true;
      counter++;
      if(counter > 4){
        counter = 1;
      }
    }, 5000);
    </script>


</body>

</html>
