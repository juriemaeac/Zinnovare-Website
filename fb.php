<!DOCTYPE html>
<html lang="en">
<?php
        include("connection/connect.php"); // connection to db
        error_reporting(0);
        session_start();

        $server = "localhost" ;
$username = "root" ;
$password = "" ;
$dbname = "online_rest" ;

$conn = mysqli_connect($server , $username, $password , $dbname) ;

if(isset($_POST['submit'])){

    if(!empty($_POST['feedback'])){

        $feedback = $_POST['feedback'] ;
        $result = mysqli_query($db,"SELECT * FROM users_orders WHERE o_id = '".$_GET['o_id']."'");
                $details = mysqli_fetch_assoc($result);
        $idd = $details['o_id'];
        $rating = $_POST['rating'] ;
        $query = "insert into fb(o_id,u_id,feedback,rating) values('$idd', '".$_SESSION["user_id"]."', '$feedback', '$rating')" ;

        

        $run = mysqli_query($conn,$query) or die(mysqli_error($conn));
        header('location:order_history.php');
    }
else{
    echo "all fields required" ;
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
        <link rel="icon" type="image/png" sizes="16x16" href="admin/images/logo1.png">
        <title>Starter Template for Bootstrap</title>
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/animsition.min.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body">
    <div>
    <ul class="breadcrumb">
    <li><a href="index.php">Home</a></li>
    <li><a href="order_history.php">Orders</a></li>
    <li>Feedback</li>
    </ul>
    </div>

    <?php
        $result = mysqli_query($db,"SELECT dishes.*, users_orders.* FROM dishes INNER JOIN users_orders ON dishes.title=users_orders.title WHERE o_id = '".$_GET['o_id']."'");
        $details = mysqli_fetch_assoc($result);
        $result1 = mysqli_query($db,"select * from users where u_id='".$_SESSION['user_id']."'");
        $userdetails = mysqli_fetch_assoc($result1);
    ?>     
    <div id="feedback123" style="padding-top:2%; margin-top:2%;">
        <div class="feedback-left pull-left" style="border-radius: 5px;background:#FFF4E4;">
            <div class="feedback-img-container" style="border-radius: 5px;background:#FFF4E4">
                <a><?php echo "<img style='border-radius: 5px;' class='feedback-img' src='src/".$details['img']."' '";?></a>
            </div>
        </div>
        <div class="feedback-right">
            <!--<div class="media-top meida media-middle">
                <span><i><img src="src/user.png" alt="user" width="60px" height="60px"/></i></span>
            </div>-->
            <div class="feedback-right-content">
                
                <div class="feedback-form" id="myForm" style="height:100%;">
                    <div class="feedback-upper">
                        <div class="feedback-orderTitle">
                            Order #<?php echo $details['o_id']; ?> ||
                            <span><?php echo $details['title']; ?></span>
                            
                        </div>
                        <div class="feedback-orderNum" style="font-weight: 200;color:gray;">
                            <?php $cDate = strtotime($details['date']); ?>
                            Order Date: <?php echo date('M d, Y',$cDate); ?>
                        </div>
                        <p class="feedback-username"><?php echo $userdetails['username']?></p>
                    </div>
                    <form action="" class="feedback-container" method="post">
                        <p>How was your experience with <?php echo $details['title']; ?>?</p>
                        <div class="rating">
                            <i class="rating__star far fa-star"></i>
                            <i class="rating__star far fa-star"></i>
                            <i class="rating__star far fa-star"></i>
                            <i class="rating__star far fa-star"></i>
                            <i class="rating__star far fa-star"></i>
                        </div>
                        <div class="rating__result" style="border:1px solid red; display:none"></div><!--PANG CHECK LANG-->
                        <input name="rating" id="example" type="hidden">
                        <br>
                        <h4>Add a review</h4>
                        <p>Your email address will not be published.</p>
                        <textarea name="feedback" required cols="30" rows="5" class="feedback-text" placeholder="Enter Feedback"></textarea>
                        <a class="btn pull-right" style="border-radius: 5px;padding:8px; width:80px; background:gray"  href="order_history.php">Cancel</a>
                        <button type="submit" name="submit" class="btn pull-right" style="border-radius: 5px;padding:8px; width:80px" onclick="order_history.php">Submit</button>                                                                   
                    </form>
                    
                </div>   
            </div>          
        </div>
    </div>

<script src="js/jquery.min.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/animsition.min.js"></script>
        <script src="js/bootstrap-slider.min.js"></script>
        <script src="js/jquery.isotope.min.js"></script>
        <script src="js/headroom.js"></script>
        <script src="js/foodpicky.min.js"></script>

        <script> 
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

            //feedback rating
            const ratingStars = [...document.getElementsByClassName("rating__star")];
            const ratingResult = document.querySelector(".rating__result");

            printRatingResult(ratingResult);

            function executeRating(stars, result) {
                const starClassActive = "rating__star fas fa-star";
                const starClassUnactive = "rating__star far fa-star";
                const starsLength = stars.length;
                let i;
                stars.map((star) => {
                    star.onclick = () => {
                        i = stars.indexOf(star);

                        if (star.className.indexOf(starClassUnactive) !== -1) {
                            printRatingResult(result, i + 1);
                            for (i; i >= 0; --i) stars[i].className = starClassActive;
                        } else {
                            printRatingResult(result, i);
                            for (i; i < starsLength; ++i) stars[i].className = starClassUnactive;
                        }
                    };
                });
            }

            function printRatingResult(result, num = 0) {
                result.textContent = `${num}`;
                document.getElementById("example").setAttribute('value', result.textContent);
            }

            executeRating(ratingStars, ratingResult);
        //end feedbakc


    </script>
</body>
</html>