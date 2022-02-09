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
    <link rel="icon" href="#">
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
                <div style="text-align: left; padding-left:200px">
                    <h1>
                        <span> Bite into the </span>
                        <span style="color: orange;">cheesier</span> 
                    </h1>
                        <h1>side of life</h1>
                        <h5 style="color:white">
                        <span style="letter-spacing: 1px; word-spacing: 3px"> With </span>
                        <span style="letter-spacing: 1px; word-spacing: 3px"> deliciously sinful  </span>
                        <span style="letter-spacing: 1px; word-spacing: 3px"> Mexican treats </span>
                        </h5>
                        <h5 style="color:white"></h5>
                    <div class="banner-form">
                        <form class="form-inline">
                            <!--<div class="form-group">
                                <label class="sr-only" for="exampleInputAmount">I would like to eat....</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="exampleInputAmount" placeholder="I would like to eat...."> </div>
                            </div>-->
                            <button onclick="location.href='dishes.php?res_id=48'" type="button" class="btn " style="background:orange; color:white">Order Now</button>
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
                        
                            // displaying total sales of Burgerdilla
                            $query_res123= mysqli_query($db,"select SUM(quantity) as sum from users_orders where title='Burgerdilla' AND status='closed'");
                            $val = $query_res123 -> fetch_array();
                            $rws = $val['sum'];

									      while($r=mysqli_fetch_array($query_res))
										  {
													
						                       echo '  <div class="col-xs-12 col-sm-6 col-md-4 food-item">
														<div class="food-item-wrap">
															<div class="figure-wrap bg-image" data-image-src="admin/Res_img/dishes/'.$r['img'].'">
																<div class="distance"><i class="fa fa-pin"></i>1240m</div>
																<div class="rating pull-left"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> </div>
																<div class="review pull-right"><a style="color: Orange; font-weight:Bold"href="#">Total Sales: '.$rws.'</a> </div>
															</div>
															<div class="content">
																<h5><a href="dishes.php?res_id='.$r['rs_id'].'">'.$r['title'].'</a></h5>
																<div class="product-name">'.$r['slogan'].'</div>
																<div class="price-btn-block"> <span class="price">P'.$r['price'].'</span> <a href="dishes.php?res_id='.$r['rs_id'].'" class="btn theme-btn-dash pull-right">Add to cart</a> </div>
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
                <center><div class="column parallax-icon">
                        
                        <img src="src/smile.png" style="height: 50px; width: 50px"> 
                        <h2 style="color:orange; text-align:center">
                            <?php $sql="select * from users";
                                $result=mysqli_query($db,$sql); 
                                $rws=mysqli_num_rows($result);
                                echo $rws;?></h2>
                                <p class="m-b-0" style="color: white">Happy Customers</p>   
                        
                    </div>
                    <div class="column parallax-icon">
                        
                            <img src="src/enchilada.png" style="height: 50px; width: 50px">      
                            <h2 style="color:orange; text-align:center">
                                <?php 
                                    $sql="select * from users_orders";
                                    $result=mysqli_query($db,$sql); 
                                    $rws=mysqli_num_rows($result);
                                    echo $rws;
                                ?>
                            </h2>
                            <p style="color: white" class="m-b-0">Dish Served</p>     
                                          
                    </div>
                    </center>
                </div>
                <div class="row">
                <center> <h4 style="color:white">Try Zinnovare’s Mexican Treats for cheesier barkada moments.</h4></center> 
                </div>
            </div>
        </div>
        
        <!--
        <section class="app-section">
            <div class="app-wrap">
                <div class="container">
                    <div class="row text-img-block text-xs-left">
                        <div class="container">
                            <div class="col-xs-12 col-sm-5 right-image text-center">
                                <figure> <img src="images/app.png" alt="Right Image" class="img-fluid"> </figure>
                            </div>
                            <div class="col-xs-12 col-sm-7 left-text">
                                <h3>The Best Food Delivery App</h3>
                                <p>Now you can make food happen pretty much wherever you are thanks to the free easy-to-use Food Delivery &amp; Takeout App.</p>
                                <div class="social-btns">
                                    <a href="#" class="app-btn apple-button clearfix">
                                        <div class="pull-left"><i class="fa fa-apple"></i> </div>
                                        <div class="pull-right"> <span class="text">Available on the</span> <span class="text-2">App Store</span> </div>
                                    </a>
                                    <a href="#" class="app-btn android-button clearfix">
                                        <div class="pull-left"><i class="fa fa-android"></i> </div>
                                        <div class="pull-right"> <span class="text">Available on the</span> <span class="text-2">Play store</span> </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
                                        -->

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
                            <center>
                                <h3 class="feedbackContent">Awesome Food.</h3>
                                <h6 style="color: gray">Pedro Penduko</h6>
                            </center>
                        </div>
                        <div class="slide">
                            <center>
                                <h3 class="feedbackContent">Good Service.</h3>
                                <h6 style="color: gray">Juan Dela Cruz</h6>
                            </center>
                        </div>
                        <div class="slide">
                            <center>
                                <h3 class="feedbackContent">Hatdog.</h3>
                                <h6 style="color: gray">Jose Santos</h6>
                            </center>
                        </div>
                        <div class="slide">
                            <center>
                                <h3 class="feedbackContent">Hatdog 1.</h3>
                                <h6 style="color: gray">Maria Dela Cruz</h6>
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
        </div>      
        <br>
        <br>  
        <!--Feedback-->
        <!-- start: FOOTER -->
        <footer class="footer">
            <div class="container">
                <!-- top footer statrs -->
                <div class="row top-footer">
                    <div class="col-xs-12 col-sm-3 footer-logo-block color-gray">
                        <a href="index.php"> <img src="src/logo6.png" class="footer-logo" alt="Footer logo" width="150px" height="45px" style= "margin-bottom:-5px"> </a> <span>Order Delivery &amp; Take-Out </span> </div>
                    
                </div>
                <!-- top footer ends -->
                <!-- bottom footer statrs -->
                <div class="bottom-footer">
                    <div class="row">
                        <div class="col-xs-12 col-sm-3 payment-options color-gray">
                            <h5>Payment Options</h5>
                            <ul>
                                <li>
                                    <a href="#"> <img src="images/paypal.png" alt="Paypal"> </a>
                                </li>
                                <li>
                                    <a href="#"> <img src="images/mastercard.png" alt="Mastercard"> </a>
                                </li>
                                <li>
                                    <a href="#"> <img src="images/maestro.png" alt="Maestro"> </a>
                                </li>
                                <li>
                                    <a href="#"> <img src="images/stripe.png" alt="Stripe"> </a>
                                </li>
                                <li>
                                    <a href="#"> <img src="images/bitcoin.png" alt="Bitcoin"> </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-4 address color-gray">
                            <h5>Address</h5>
                            <p>Concept design of oline food order and deliveye,planned as restaurant directory</p>
                            <h5>Phone: <a href="tel:+080000012222">080 000012 222</a></h5> </div>
                        <div class="col-xs-12 col-sm-5 additional-info color-gray">
                            <h5>Addition informations</h5>
                            <p>Join the thousands of other restaurants who benefit from having their menus on TakeOff</p>
                        </div>
                    </div>
                </div>
                <!-- bottom footer ends -->
            </div>
        </footer>
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