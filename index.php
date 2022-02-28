<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");  //include connection file
error_reporting(0);  // using to hide undefine undex errors
session_start(); //start temp session until logout/browser closed

include_once 'product-action.php'; //including controller

?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="admin/images/logo1.png">
    <title>Zinnovare</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet"> 
</head>

<body class="home">
        <script>
        $(document).ready(
        function()
            {
                $("#myBtn").click(function()
                    {
                        $("#myModal").modal();
                    }
                );
            }
        );
        </script>
    
        <!--CART and header/navbar starts-->
        <div>
            <?php include 'header.php';?>
        </div>
        
        <!-- banner part starts -->
        <div class="hero bg-image bgfull" data-image-src="src/header.png">
            <div class="hero-inner">
                <div style="text-align: left; margin-left:10%">
                    <div class="h1">
                        <span> Bite into the </span>
                        <span style="color: orange;">cheesier</span> <br>
                        side of life
                    </div>
                    <h5>
                    <span style="letter-spacing: 1px; word-spacing: 3px"> With </span>
                    <span style="letter-spacing: 1px; word-spacing: 3px"> deliciously sinful  </span>
                    <span style="letter-spacing: 1px; word-spacing: 3px"> Mexican treats </span>
                    </h5>
                    <div class="banner-form">
                        <form class="form-inline">
                            <!--<div class="form-group">
                                <label class="sr-only" for="exampleInputAmount">I would like to eat....</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="exampleInputAmount" placeholder="I would like to eat...."> </div>
                            </div>-->
                            <button onclick="location.href='menu.php?res_id=48'" type="button" class="btn" style="background:orange; color:white">Order Now</button>
                        </form>
                    </div>
                </div>
                <!--<div class="container" style="background-color: black; opacity:0.5; border-radius:10px; height:100px; width:75%">
                    <p>hatdog</p>

                </div>-->
            </div>
            
            <!--end:Hero inner -->
        </div>
        
        <!---->
    
        <!--<section id="Menu">-->
      <div class="container">
        <hr>
        <br>
        <div class="row" style="display: flex;">
        <div class="column" style="flex: 25%; padding-left: 15px; padding-right: 15px;">
            <div class="itemBox">
              <div class="itemBox-img">
                <img src="./src/tacos2.png">
              </div>
              <div class="itemBox-head">Tacos</div>
              <div class="itemBox-sub-text">A taco is a traditional Mexican dish consisting of a 
                small hand-sized corn or wheat tortilla topped with a 
                filling. The tortilla is then folded around the filling 
                and eaten by hand.
              </div>
              <button class="itemBox-btn" type="submit">Order Now</button>
            </div>
          </div>

          <div class="column" style="flex: 25%; padding-left: 15px; padding-right: 15px;">
            <div class="itemBox">
              <div class="itemBox-img">
                <img src="./src/quesadilla2.png">
              </div>
              <div class="itemBox-head">Quesadilla</div>
              <div class="itemBox-sub-text">A quesadilla is a Mexican dish consisting of a tortilla 
                that is filled primarily with cheese, and sometimes meats, 
                spices, and other fillings, and then cooked on a griddle 
                or stove.
              </div>
              <button class="itemBox-btn" type="submit">Order Now</button>
            </div>
          </div>

          <div class="column" style="flex: 25%; padding-left: 15px; padding-right: 15px;">
            <div class="itemBox">
              <div class="itemBox-img">
                <img src="./src/burger2.png">
              </div>
              <div class="itemBox-head">Quesadilla Burger</div>
              <div class="itemBox-sub-text">Quesadilla burger is a 2-in-1 snack combination of burger and quesadilla 
                filled with triple cheese, triple sauce, beef patty, lettuce, 
                tomato, cucumber.
              </div>
              <button class="itemBox-btn">Order Now</button>
            </div>
          </div>

          <div class="column" style="flex: 25%; padding-left: 15px; padding-right: 15px;">
            <div class="itemBox">
              <div class="itemBox-img">
               <img src="./src/tachos2.png">
              </div>
              <div class="itemBox-head">Tachos</div>
              <div class="itemBox-sub-text">Tachos is like a nachos but with the use of taco strips 
                that make it more delicious and satisfying to eat with seven layers of meat, cheese, and veggies.
              </div>
              <button class="itemBox-btn">Order Now</button>
            </div>
          </div>

        </div>
      </div>
    <!--</section>-->

        <!---->
        <!-- Popular block starts -->
        <section class="popular">
            <div class="container">
                <div class="title text-xs-center m-b-30">
                    <h2>Popular Dishes of the Month</h2>
                    <p class="lead">The easiest way to your favourite food</p>
                </div>
                <div class="row">
						<?php 
						// fetch records from database to display popular first 3 dishes from table
						$query_res= mysqli_query($db,"select * from dishes LIMIT 3"); 
                        $query_res123= mysqli_query($db,"SELECT SUM(quantity) as sum from dishes INNER JOIN users_orders ON dishes.title=users_orders.title where status='closed' group by 'title'");
                            // displaying total sales of Burgerdilla
                            //$query_res123= mysqli_query($db,"select SUM(quantity) as sum from users_orders where title='Burgerdilla' AND status='closed'");
                            $val = $query_res123 -> fetch_array();
                            $rws = $val['sum'];
                            while($r=mysqli_fetch_array($query_res))
                            {   
                                echo '  
                                <div class="col-xs-12 col-sm-6 col-md-4 food-item">
                                        <div class="food-item-wrap">
                                            <div class="figure-wrap bg-image" data-image-src="admin/Res_img/dishes/'.$r['img'].'">
                                                <div class="distance"><i class="fa fa-pin"></i>BEST SELLER</div>
                                                <!--<div class="rating pull-left"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> </div>-->
                                                <!--<div class="review pull-right"><a style="color: Orange; font-weight:Bold"href="#">Total Sales: '.$rws.'</a> </div>-->
                                            </div>
                                            <div class="content">
                                                <h5><a href="menu.php?res_id='.$r['rs_id'].'">'.$r['title'].'</a></h5>
                                                <div class="product-name" style=" height:50px">'.$r['slogan'].'</div>
                                                <div class="price-btn-block"> <span class="price">P'.$r['price'].'</span> <a href="menu.php?res_id='.$r['rs_id'].'" class="btn theme-btn-dash pull-right">Add to cart</a> </div>
                                            </div>
                                            
                                        </div>
                                </div>';
                            }
						?>
                </div>
            </div>
        </section>
        <!-- Popular block ends -->
        <div class="parallax">
            <br>
            <br>
            <div class="container">
                <div class="row">
                    <center>
                        <div class="column parallax-icon">
                            <img src="src/smile.png" style="height: 50px; width: 50px"> 
                            <h2 style="color:orange; text-align:center;padding-top:8px; font-weight:bold">
                                <?php $sql="select * from users";
                                    $result=mysqli_query($db,$sql); 
                                    $rws=mysqli_num_rows($result);
                                    echo $rws;
                                ?>
                            </h2>
                            <p style="color: white">Happy Customers</p>   
                        </div>
                        <div class="column parallax-icon">
                            <img src="src/enchilada.png" style="height: 50px; width: 50px">      
                            <h2 style="color:orange; text-align:center;padding-top:8px; font-weight:bold">
                                <?php 
                                    $sql="select * from users_orders";
                                    $result=mysqli_query($db,$sql); 
                                    $rws=mysqli_num_rows($result);
                                    echo $rws;
                                ?>
                            </h2>
                            <p style="color: white">Dish Served</p>     
                        </div>
                        <div class="column parallax-icon">
                            <?php
                                $sql="select SUM(rating) from fb";
                                $result = mysqli_query($db,$sql);
                                $row = mysqli_fetch_array($result);

                                $sql123="select * from fb";
                                $result123=mysqli_query($db,$sql123); 
                                $rws123=mysqli_num_rows($result123);

                                $sum = $row['SUM(rating)'];
                                $ave = $sum/$rws123;
                                $percentage = ($ave/5)*100;
                            ?>
                            <img src="src/star.png" style="height: 50px; width: 50px">      
                            <h2 style="color:orange; text-align:center;padding-top:8px; font-weight:bold">
                                <?php echo $percentage.'%';?>
                            </h2>
                            <?php
                                if ($percentage >= 75){
                                    ?>
                                        <p style="color: white"> Excellent Rating</p>   
                                    <?php
                                }
                                else if($percentage >= 50 && $percentage <75){
                                    ?>
                                        <p style="color: white"> Good Rating</p> 
                                    <?php
                                }
                                else if($percentage >= 25 && $percentage <50){
                                    ?>
                                        <p style="color: white"> Satisfactory Rating</p> 
                                    <?php
                                }
                                else if($percentage >= 1 && $percentage <25){
                                    ?>
                                        <p style="color: white"> Bad Rating</p> 
                                    <?php
                                }
                                else{
                                    ?>
                                        <p style="color: white"> No ratings yet.</p>
                                    <?php
                                }
                            ?>
                        </div>
                    </center>
                </div>  
                                        
            </div>
            <center> 
                <table width="100%">
                    <td><hr /></td>
                    <td style="width:1px; padding: 0 10px; color:white;  white-space:nowrap;font-size:80%">Checkout Zinnovare’s Mexican Treats for more cheesy barkada moments.</td>
                    <td><hr /></td>
                </table>
            </center> 
        </div>
        <!--About uS
            <div class="about">
                <div class="sectionHead">About Us</div>
                <hr>
                <br>
                <p class="aboutContent">
                    Bite into the cheesier side of life with these deliciously sinful 
                    Mexican treats brought to you by Zinnovare Enterprise.
                    Tired of your usual chips? Well, these are NACHO average merienda. 
                    Try Zinnovare’s Ta-Chos for cheesier barkada moments.
                    Munch into layers of ground beef, veggies, sauce, and cheese – crunchy 
                    goodness in between fried spec-TACO-lar shells.
                    Indulge with their quesadilla filled with stretchy mozzarella and 
                    chunks of flavored chicken. 
                    This flavorful shell-ebration’s the taco’f the town! 
                </p>
                <br>
            </div>-->
        <!--End About-->
        <!--Feedback-->
        <br>
        <br>
        <div>
            <h2 style="color: orange; font-weight: bold; text-align:center">OUR HAPPY CUSTOMERS</h2>
        </div>
        <hr>
        <div class="sectionHead">
            <img src="src/quo.png" style="height: 30px; width:30px"/>
        </div>
        <div class="feedback">
    
            <div class="slider">
                <div class="slides">
                    <!--radio buttons start-->
                    <input type="radio" name="radio-btn" id="radio1">
                    <input type="radio" name="radio-btn" id="radio2">
                    <input type="radio" name="radio-btn" id="radio3">
                    <input type="radio" name="radio-btn" id="radio4">
                    <!--radio buttons end-->
                    <!--slide images start-->
                        <div class="slide first">
                            <?php 
                                $result1 = mysqli_query($db,"SELECT * FROM fb  JOIN users_orders ON fb.o_id=users_orders.o_id
                                    JOIN dishes ON dishes.title=users_orders.title 
                                    JOIN users ON fb.u_id=users.u_id ORDER BY RAND()");
                                $food1 = mysqli_fetch_assoc($result1);
                                $food2 = mysqli_fetch_assoc($result1);
                                $food3 = mysqli_fetch_assoc($result1);
                                $food4 = mysqli_fetch_assoc($result1);
                            ?>
                            <center>
                                <h3 class="feedbackContent"><?php echo $food1['feedback'] ?></h3>
                                <h6 style="color: gray"><?php echo $food1['title'] ?></h6>
                                <h6 style="color: gray"><?php echo $food1['username'] ?></h6>
                            </center>
                        </div>
                        
                        <div class="slide">
                            <center>
                                <h3 class="feedbackContent"><?php echo $food2['feedback'] ?></h3>
                                <h6 style="color: gray"><?php echo $food2['title'] ?></h6>
                                <h6 style="color: gray"><?php echo $food2['username'] ?></h6>
                            </center>
                        </div>
                        <div class="slide">
                            <center>
                                <h3 class="feedbackContent"><?php echo $food3['feedback'] ?></h3>
                                <h6 style="color: gray"><?php echo $food3['title'] ?></h6>
                                <h6 style="color: gray"><?php echo $food3['username'] ?></h6>
                            </center>
                        </div>
                        <div class="slide">
                            <center>
                                <h3 class="feedbackContent"><?php echo $food4['feedback'] ?></h3>
                                <h6 style="color: gray"><?php echo $food4['title'] ?></h6>
                                <h6 style="color: gray"><?php echo $food4['username'] ?></h6>
                            </center>
                        </div>
                        <!--slide images end-->
                        <!--automatic navigation start-->
                        <div class="navigation-auto">
                            <div  class="auto-btn1"></div>
                            <div class="auto-btn2"></div>
                            <div class="auto-btn3"></div>
                            <div class="auto-btn4"></div>
                        </div>
                        <!--automatic navigation end-->
                    </div>
                    <!--manual navigation start-->
                    <div class="navigation-manual">
                        <label for="radio1" class="manual-btn"></label>
                        <label for="radio2" class="manual-btn"></label>
                        <label for="radio3" class="manual-btn"></label>
                        <label for="radio4" class="manual-btn"></label>
                    </div>
                    <!--manual navigation end-->
                </div>
                <!--image slider end-->

            </div>
            <div class="footerCopyright-footer"style="background-color: black; opacity: 0.9;">
                <div class="row-footer" style="display: flex; flex-wrap: wrap;">
                    <div class="column-footer" style="padding-top:5px">
                        <a href="index.php"><img src="admin/images/logo6.png" alt="Zinnovare" width="150px" height="45px"/></a>
                        <p style="font-weight:100">Food Order Delivery</p>
                        <div class="column-footer">
                            <a class="fa-footer" href="https://www.facebook.com/zinnovare.finest">
                                <img alt="Facebook" src="admin/images/fb.png" width="30" height="auto">
                            </a>
                            <a class="fa-footer" href="https://www.instagram.com/zinnovare">
                                <img alt="instagram" src="admin/images/ig.png" width="30" height="auto">
                            </a>
                            <a class="fa-footer" href="twitter.com">
                                <img alt="twitter" src="admin/images/twitter.png" width="30" height="30">
                            </a>
					        <a class="fa-footer" href="youtube.com">
                                <img alt="youtube" src="admin/images/yt.png" width="30" height="30">
                            </a>
					        <a class="fa-footer" href="linkedin.com">
                                <img alt="linkedin" src="admin/images/linkedin.png" width="30" height="30">
                            </a>
                        </div>
                    </div>

                    <div class="column-footer" style="color:white; font-weight:100;padding-top:5px">
                        <h5 style="color:white;">Contact Us</h5>
                        <ul style="padding-top: 10px;">
                            <li>
                                <a style="color:white" href="https://goo.gl/maps/LQom1z4NPyyDSWjQA"><img src="src/place.png" width="20px" height="20px" alt="location" style="margin-right:10px;"> Bucal 4A, Maragondon, Cavite, 4112</a>
                            </li>
                            <li>
                                <img src="src/phone-call.png" width="20px" height="20px" alt="phone number" style="margin-right:10px"> 0921 728 8016
                            </li>
                            <li>
                                <img src="src/email.png" width="20px" height="20px" alt="email" style="margin-right:10px"> zinnovare.enterprise@gmail.com
                            </li>
                        </ul>
                    </div>
                
                    <div class="column-footer" style="padding-top:5px">
                        <div class="column-footer">
                            <h5 style="color:white;padding-bottom:5px">Payment Options</h5>
                            <img alt="gcash" src="src/gcash.png" width="37" height="28" style="border-radius: 5px;">
                            <img alt="paymaya" src="src/paymaya.png" width="37" height="28" style="border-radius: 5px;">
                            <img alt="coinsph" src="src/coinsph.png" width="37" height="28" style="border-radius: 5px;">
                            <img alt="paypal" src="images/paypal.png" width="37" height="28" style="border-radius: 5px;">
                        </div>
                        <div class="column-footer">
                            <img alt="bdo" src="src/bdo.png" width="37" height="28" style="border-radius: 5px;">
                            <img alt="bpi" src="src/bpi.png" width="37" height="28" style="border-radius: 5px;">
                            <img alt="landbank" src="src/landbank.png" width="37" height="28" style="border-radius: 5px;">
                            <img alt="cod" src="src/cod.png" width="37" height="28" style="border-radius: 5px;">
                        </div>
                        <h6 style="color:white; font-weight:100; padding-top:10px">
                            Copyright © 2017-2022
                            <span class="copyright-footer" style="font-weight:400">
                                Zinnovare Inc.
                            </span>
                        </h6>
                    </div>

                </div>
            </div>
        </div>    
        <!--Feedback-->
        <!-- start: FOOTER -->
        
        <!-- end:Footer -->
    
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