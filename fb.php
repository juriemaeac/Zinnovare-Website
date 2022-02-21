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

        $query = "insert into fb(o_id,u_id,feedback) values('$idd', '".$_SESSION["user_id"]."', '$feedback')" ;

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

<!--FEEDBACK-->
<?php
                $result = mysqli_query($db,"SELECT dishes.*, users_orders.* FROM dishes INNER JOIN users_orders ON dishes.title=users_orders.title WHERE o_id = '".$_GET['o_id']."'");
                $details = mysqli_fetch_assoc($result);
            ?>
<div id="feedback123">
<div class="history-container">
                                    <!--<div class="media-top meida media-middle">
                                        <span><i><img src="src/user.png" alt="user" width="60px" height="60px"/></i></span>
                                    </div>-->
                                    <div style="font-weight:bold">
                                        Order #<?php echo $details['o_id']; ?><br>
                                    </div>
                                    <div style="font-size: small;color:gray">
                                        <?php echo $details['date']; ?>
                                    </div>
                                    <div >
                                        <div class="rowHistory">
                                            <div class="columnHistory" style="padding-top: 10px;">
                                                <a><?php echo "<img class='history-img' src='src/".$details['img']."' style='width:70px; height:70px; border-radius:25px'";?></a>
                                            </div>
                                            <div class="columnHistory">
                                                <div class="rowHistory" style="padding-bottom: 10px;padding-top: 10px;font-weight:bold">
                                                    <?php echo $details['title']; ?>
                                                </div>
                                                <div class="rowHistory" style="font-size: small;color:gray; height:60px;">
                                                    <?php echo $details['slogan']; ?>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="rowHistory" style="padding-top: 10px;">
                                            <div class="columnHistory">
                                                Php <?php echo $details['price']; ?>
                                            </div>
                                            <div class="columnHistory">
                                                <p style="text-align: right;"> Qty: <?php echo $details['quantity']; ?> </p>
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
                                                    Php <?php echo $details['price']*$details['quantity'] ; ?>
                                                </span>
                                                
                                            </center>
                                        </div>
                                    </div>

</div>
<div class="" id="myForm">
    <form action="" class="feedback-container" method="post">
                            <h1>FEEDBACK</h1>
                            
                            <p class="mb-0"><b>Order Number:</b> <?php echo "#".$details['o_id']; ?></p>
                            <textarea name="feedback" required cols="30" rows="10" class="feedback-text" placeholder="Enter Feedback"></textarea>
                            <button type="submit" name="submit" class="btn pull-right" onclick="change()">Submit</button>                                                                   
                        </form>
    </div>
    <!--END FEEDBACK-->





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


    </script>
</body>
</html>