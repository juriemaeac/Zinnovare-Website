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
                                    $sql="SELECT * from users_orders where status='closed'";
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
                                <?php echo round($percentage, 2).'%'?>
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
                            <img alt="coinsph" src="src/coinsph.png" width="37" height="28" style="border-radius: 5px;">
                            <img alt="bpi" src="src/bpi.png" width="37" height="28" style="border-radius: 5px;">
                            <img alt="cod" src="src/cod.png" width="37" height="28" style="border-radius: 5px;">
                        </div>
                        <div style="color:white; font-weight:100;" href="#">
                            <a style="text-decoration:none;" data-target="#myModal-terms" data-toggle="modal" href="#myModal-terms">Terms and Condition</a>
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
        <div id="myModal-terms" class="modal fade" role="dialog">
        <div class="modal-dialog" style="width: 30%; height:70%;overflow:inherit;">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="background-color: orange;">
                        <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
                        <p class="modal-title" style="text-align: center;font-weight:bold">POLICIES</p>
                    </div>
                    <div class="widget widget-cart">
                        <div class="order-row bg-white">
                            <div class="widget-body" style="padding-bottom: 0;margin-bottom:0">
                            <center><strong>Terms and Conditions ("Terms")</strong></center><br><br>

                                Last updated: February 28, 2022<br><br>
                            <p style=" text-align: justify;">
                                Please read these Terms and Conditions ("Terms", "Terms and Conditions") carefully before using the Zinnovare website. Your access to and use of the Service is conditioned on your acceptance of and compliance with these Terms. These Terms apply to all visitors, users and others who access or use the Service. By using or accessing Zinnovare, regardless of you whether have registered to use any of the services offered on the application, you signify that you have read and understood these Terms and Conditions and agree to be bound by the same. <br><br>

                                By accessing or using Zinnovare Website, you agree to be bound by these Terms. If you disagree with any part of the terms, then you may not access Zinnovare Website.<br><br>

                                <strong>Eligibility</strong><br><br>

                                Persons under the age of 13 are not permitted to use this application. Admin has the right to reject the use of the application when the information regarding the information of the user is proved to be untrue. <br><br>

                                <strong>Restrictions on Use</strong><br><br>

                                You agree to abide by all applicable terms and conditions, law and regulations in your use of the website. In addition, you agree that you will not do any of the following:<br><br>

                                •	register for more than one account, or register for an account on behalf of an individual other than yourself or on behalf of any group or entity;<br>
                                •	take any action on the website, that may constitute libel or slander or that infringes or violates someone else’s rights or is protected by any copyright or trademark, or otherwise violates the law;<br>
                                •	use the information or content on the website to send unwanted messages to any other user;<br>
                                •	impersonate any person or entity, or falsely state or otherwise misrepresent yourself, your age or your affiliation with any person or entity;<br>
                                •	use the website or our products and services in any manner that could damage, disable, overburden or impair the website;<br>
                                •	harvest or collect email addresses or other contact information of other users from the website by electronic or other means, including the use of automated scripts; or<br>
                                •	post or otherwise make available any material that contains software viruses or any other computer code, files or programs designed to interrupt, destroy or limit the functionality of any computer software or hardware or telecommunications equipment.<br><br>


                                <strong>Registration and Application</strong><br><br>

                                In creating your account, you agree to provide the true, current, complete, and accurate information in the registration or application form which is necessary for purposes of using our website. If any information you provide is untrue, inaccurate, not current, or incomplete, we reserve the right to cancel your registration, and restrict your future use of this website. Admin also reserves the right to reject any registration, deny access to the website in violation of these Terms and Conditions.<br><br>

                                <strong>Collection and use of Personal Information</strong><br><br>

                                It is important for you to know that the website can only be used if you agree to disclose relevant personal information which may verified by Tech Intellect, on your behalf, from all relevant sources.<br><br>

                                <strong>Links To Other Web Sites</strong><br><br>

                                Our Service may contain links to third-party web sites or services that are not owned or controlled by Admin.<br><br>

                                Admin has no control over, and assumes no responsibility for, the content, privacy policies, or practices of any third-party web sites or services. You further acknowledge and agree that Zinnovare shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, goods or services available on or through any such web sites or services.<br><br>

                                <strong>Changes</strong><br><br>

                                We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a revision is material, we will try to provide at least 10 days' notice prior to any new terms taking effect. What constitutes a material change will be determined at our sole discretion.<br><br>

                                <strong>Contact Us</strong><br><br>

                                If you have any questions about these Terms, please contact us through email.
                                Email Address: academia_care@gmail.com<br><br>

                                <strong>Acceptance</strong><br><br>

                                <strong>YOU CONFIRM HAVING READ AND UNDERSTOOD AND AGREE TO THE FOREGOING TERMS AND CONDITIONS. BY ACCEPTING THESE TERMS AND CONDITIONS, AND THE PRIVACY POLICY, YOU SIGNIFY YOUR EXPRESS CONSENT IN ACCORDANCE WITH REPUBLIC ACT NO. 10173, OTHERWISE REFERRED TO AS THE DATA PRIVACY ACT OF 2012 AND ITS IMPLEMENTING RULES AND REGULATIONS AS WELL AS OTHER APPLICABLE CONFIDENTIALITY AND DATA PRIVACY LAWS OF THE PHILIPPINES. YOU AGREE TO HOLD THE COMPANY, ITS OFFICERS, DIRECTORS AND STOCKHOLDERS, FREE AND HARMLESS FROM ANY AND ALL LIABILITIES, DAMAGES, ACTIONS, CLAIMS, AND SUITS IN CONNECTION WITH THE IMPLEMENTATION OR PROCESSING OF PERSONAL INFORMATION IN RELATION TO YOUR CONSENT OR AUTHORIZATION UNDER THESE TERMS AND CONDITIONS.</strong>
                            </p>
                            </div>
                        </div>
                        
                                <!-- end:Order row -->
                            
                        <div class="widget-body" style="padding-bottom: 0;margin-bottom:0;">
                            <div><center>
                                <input type="checkbox" require="required">
                                <label> I agree to the Terms and Conditions.<label>    
                            </center>             
                            </div>
                        </div>
                            </div>
                            <center>
                            <a href="#"  class="btn theme-btn btn-lg" style="font-size:small; width: 30%; padding:10px 15px;margin-bottom:20px">I Agree</a>
                            <button type="button" class="btn btn-default" data-dismiss="modal" style="font-size:small; width: 30%; padding:10px 15px; margin-bottom:20px">Close</button>
                        
                    </div>
                        
                    <!--end modal -->
                    
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