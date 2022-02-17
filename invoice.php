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
        <div class="container my-3" style="border: 2px outset orange; width: 60%;" id="divToPrint">
            <?php
                $result = mysqli_query($db,"SELECT * FROM users_orders WHERE o_id = '".$_GET['o_id']."'");
                $details = mysqli_fetch_assoc($result);

                $result1 = mysqli_query($db,"select * from users where u_id='".$_SESSION['user_id']."'");
                $userdetails = mysqli_fetch_assoc($result1);
            ?>
            <div style="padding: 10px; ">
                <div style="padding: 10px; width: 100%" >
                    
    
                    <div class="col-6">
                        <h2 style="color:orange"><b>ZINNOVARE</b></h2>
                    </div>
                    <div class="col-6">
                        <h3>INVOICE:</h3>
                    </div>
                    <div>
                        <div class="col-6 block1">
                            <p class="mb-0"><?php echo $userdetails['f_name']." ".$userdetails['l_name']?></p>
                            <p class="mb-0"><?php echo $userdetails['address'] ?></p>
                            <p class="mb-0"><?php echo $userdetails['email'] ?></p>
                            <p class="mb-0"><?php echo $userdetails['phone'] ?></p>
                        </div>
                        <div class="col-6 block2">
                            <p class="mb-0"><b>Order Number:</b> <?php echo "#".$details['o_id']; ?></p>
                            <?php $cDate = strtotime($details['date']); ?>
                            <p class="mb-0"><b>Order Date:</b> <?php echo date('d-M-Y',$cDate); ?></p>
                            <p class="mb-0"><b>Payment Mode:</b> Cash On Delivery</p>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="col-12">
                    <hr>
                        <table class="table responsive">
                            <thead class="bg-dark text-white" style="background-color: black;">
                                <tr>
                                <td colspan="1"></td>
                                    <th>Dish</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td colspan="1"></td>
                                    <td><?php echo $details['title']; ?></td>
                                    <td><?php echo $details['quantity']; ?></td>
                                    <td><?php echo 'Php '.$details['price']; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td class="font-weight-bold">Total</td>
                                    <td class="font-weight-bold" style="color: red;"><?php echo 'Php '.$details['total'] ?></td>
                                </tr>
                            </tbody>
                            
                        </table>
                        <hr>
                        <br>
                        <div> 
                            <center>
                                <p class="mb-0">Thank You For Your Orders and Choosing Us!</p>
                                <p>We Hope To See You Again</p>
                                <p>For terms & conditions Please visit www.zinnovare.com</p>
                            <center>
                        </div>
                    </div>
                    
                </div>
                
                <!--<div>
                    <input type="button" value="print" onclick="PrintDiv();" />
                </div>-->
            </div>
            
        </div>
        <div class="container text-center" style="padding-bottom:20px">
            <center><a href="order_history.php" class="btn btn-sm btn-warning p-2 inv-button">Back to Orders</a></center>
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
        <script type="text/javascript">     
            function PrintDiv() 
            {    
                var divToPrint = document.getElementById('divToPrint');
                var popupWin = window.open('', '_blank', 'width=300,height=300');
                popupWin.document.open();
                popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
                popupWin.document.close();
            }
        </script>
    </body>
</html>
