<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();
/*if(empty($_SESSION["adm_id"]))
{
	header('location:index.php');
}
else*/
{
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/logo1.png">
    <title>Zinnovare Admin</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header" style="background-color: orange; border-radius: 0 0 0 0">
                
                <a class="navbar-brand" href="../index.php">
                        <!-- Logo icon -->
                        <b><img src="images/logo_Z.png" alt="homepage" class="dark-logo" width="35px" height="35px"/></b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span><img src="images/logo_Zt.png" alt="homepage" class="dark-logo" width="120px" height="25px"/></span>
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                     
                       
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/bookingSystem/2.png" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="dashboard.php">Dashboard</a></li>
                                
                            </ul>
                        </li>
                        <li class="nav-label">Log</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false">  <span><i class="fa fa-user f-s-20 "></i></span><span class="hide-menu">Users</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="allusers.php">All Users</a></li>
								<li><a href="add_users.php">Add Users</a></li>
								
                               
                            </ul>
                        </li>
                       <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cutlery" aria-hidden="true"></i><span class="hide-menu">Menu</span></a>
                            <ul aria-expanded="false" class="collapse">
								<li><a href="all_menu.php">Menu</a></li>
								<li><a href="add_menu.php">Add Dish</a></li>
                              
                                
                            </ul>
                        </li>
						 <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-shopping-basket" aria-hidden="true"></i><span class="hide-menu">Orders</span></a>
                            <ul aria-expanded="false" class="collapse">
								<li><a href="all_orders.php">All Orders</a></li>
								  
                            </ul>
                        </li>
                         
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper" style="height:100%; margin-top:10px; padding-bottom:0"> <!--background-->
            <!-- Bread crumb -->
            <div class="row page-titles" style="background-color: orange;color: white;margin-bottom:10px">
                <div class="col-md-5 align-self-center">
                   <h3 style="color: white;">Dashboard</h3> </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid" style="padding-bottom:0; margin-top:0;">
                <!-- Start Page Content -->
                     <div class="row" style="padding-bottom:0">
                   
                    <div class="col-md-3">
                        <div class="card p-30" style="box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i><img src="images/icons/menu1.png" alt="user" width="60px" height="60px"/></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php $sql="select * from restaurant";
												$result=mysqli_query($db,$sql); 
													$rws=mysqli_num_rows($result);
													
													echo $rws;?></h2>
                                    <p class="m-b-0">Categories</p>
                                </div>
                            </div>
                        </div>
                    </div>
					
					 <div class="col-md-3">
                        <div class="card p-30" style="box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i><img src="images/icons/dish.png" alt="user" width="60px" height="60px"/></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php $sql="select * from dishes";
												$result=mysqli_query($db,$sql); 
													$rws=mysqli_num_rows($result);
													
													echo $rws;?></h2>
                                    <p class="m-b-0">Dishes</p>
                                </div>
                            </div>
                        </div>
                    </div>
					
                    <div class="col-md-3">
                        <div class="card p-30" style="box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i ><img src="images/icons/users1.png" alt="user" width="60px" height="60px"/></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php $sql="select * from users";
												$result=mysqli_query($db,$sql); 
													$rws=mysqli_num_rows($result);
													
													echo $rws;?></h2>
                                    <p class="m-b-0">User</p>
                                </div>
                            </div>
                        </div>
                    </div>
					
					<div class="col-md-3">
                        <div class="card p-30" style="box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                            <div class="media">
                                <div class="media-left meida media-middle"> 
                                    <span><i><img src="images/icons/orders1.png" alt="orders" width="60px" height="60px"/></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2>
                                        <?php 
                                            $sql="select * from users_orders";
											$result=mysqli_query($db,$sql); 
                                            $rws=mysqli_num_rows($result);
                                            echo $rws;
                                        ?>
                                    </h2>
                                    <p class="m-b-0">Orders</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card p-30" style="box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                            <div class="media">
                                <div class="media-left meida media-middle"> 
                                    <span><i><img src="images/icons/pending1.png" alt="user" width="60px" height="60px"/></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php $sql="select * from users_orders WHERE status=''";
												$result=mysqli_query($db,$sql); 
													$rws=mysqli_num_rows($result);
													
													echo $rws;?></h2>
                                    <p class="m-b-0">Pending</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card p-30" style="box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                            <div class="media">
                                <div class="media-left meida media-middle"> 
                                    <span><i><img src="images/icons/process1.png" alt="user" width="60px" height="60px"/></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php $sql="select * from users_orders WHERE status='in process'";
												$result=mysqli_query($db,$sql); 
													$rws=mysqli_num_rows($result);
													
													echo $rws;?></h2>
                                    <p class="m-b-0">Processing</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card p-30" style="box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                            <div class="media">
                                <div class="media-left meida media-middle"> 
                                    <span><i><img src="images/icons/rejected1.png" alt="user" width="60px" height="60px"/></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php $sql="select * from users_orders WHERE status='rejected'";
												$result=mysqli_query($db,$sql); 
													$rws=mysqli_num_rows($result);
													
													echo $rws;?></h2>
                                    <p class="m-b-0">Rejected</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card p-30" style="box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                            <div class="media">
                                <div class="media-left meida media-middle"> 
                                    <span><i><img src="images/icons/revenue1.png" alt="user" width="60px" height="60px"/></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                <h2><?php 
                                $sql="select SUM(total) from users_orders WHERE status='closed'";

                                $result = mysqli_query($db,$sql);

                                while($row = mysqli_fetch_array($result)){
                                    $sum = $row['SUM(total)'];
                                }
                                if($sum == 0){
                                    echo '0';
                                }
                                else{
                                echo $sum;
                                }
												?></h2>

                                
                                <p class="m-b-0">Revenue</p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-8">
                        <div class="card p-30" style="box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                            <div style="margin-top: 0;">
                                <div class="row">
                                    <div class="card" style="padding-top:0; padding-bottom:10px">
                                        <div class="card-body">
                                        <p class="m-b-0" style="margin-bottom: 0;padding: 0;font-size:x-large">Recent Orders</p>
                                            <div class="table-responsive m-t-30">
                                                <table id="myTable" class="table table-hover">
                                                    <thead >
                                                        <tr style="font-size: 14px;">
                                                            <th>Username</th>		
                                                            <th>Orders</th>
                                                            <th>Qty</th>
                                                            <th>Price</th>
                                                            <th>Total</th>
                                                            <th>Address</th>
                                                            <th>Status</th>												
                                                            <th>Date</th>
                                                            <th>Action</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $sql="SELECT users.*, users_orders.* FROM users INNER JOIN (SELECT * FROM users_orders ORDER BY users_orders.date DESC LIMIT 0,3) users_orders ON users.u_id=users_orders.u_id" ;
                                                            $query=mysqli_query($db,$sql);
                                                            
                                                            if(!mysqli_num_rows($query) > 0 )
                                                            {
                                                                echo '<td colspan="8"><center>No Orders-Data!</center></td>';
                                                            }
                                                            else
                                                            {				
                                                                while($rows=mysqli_fetch_array($query))
                                                                {
                                                                                                                                                    
                                                                    ?>
                                                                        <?php
                                                                            echo ' <tr style="font-size:13px">
                                                                            <td>'.$rows['username'].'</td>
                                                                            <td>'.$rows['title'].'</td>
                                                                            <td>'.$rows['quantity'].'</td>
                                                                            <td>Php '.$rows['price'].'</td>
                                                                            <td>Php '.$rows['price']*$rows['quantity'].'.00</td>
                                                                            <td>'.$rows['address'].'</td>';
                                                                        ?>
                                                                        <?php 
                                                                            $status=$rows['status'];
                                                                            if($status=="" or $status=="NULL")
                                                                            {
                                                                                ?>
                                                                                    <td> 
                                                                                        <button type="button" class="btn btn-info" style="width: 100%; border: none; background: #5BC0DE;font-size:x-small">
                                                                                        <i class="fa fa-hourglass fa-spin"  aria-hidden="true" ></i>
                                                                                        Pending
                                                                                        </button>
                                                                                    </td>
                                                                                <?php 
                                                                            }
                                                                            if($status=="in process")
                                                                    { 
                                                                        ?>
                                                                            <td> 
                                                                                <button type="button" class="btn btn-warning" style="width: 100%;border: none; background: orange;font-size:x-small">
                                                                                    <i class="fa fa-cog fa-spin"  aria-hidden="true" ></i>
                                                                                    Processing
                                                                                </button>
                                                                            </td> 
                                                                        <?php
                                                                        }
                                                                    if($status=="closed")
                                                                        {
                                                                            
                                                                    ?>
                                                                    <td> 
                                                                        <button type="button" class="btn btn-success" style="width: 100%;border: none; background: #00CC00;font-size:x-small">
                                                                            <i  class="fa fa-check" aria-hidden="true"></i>
                                                                            Delivered
                                                                        </button>
                                                                    </td> 
                                                                    
                                                                    
                                                                    <?php 
                                                                    } 
                                                                    ?>
                                                                    <?php
                                                                        if($status=="rejected")
                                                                            {
                                                                    ?>
                                                                        <td> 
                                                                            <button type="button" class="btn btn-danger" style="width: 100%;border: none; background: Red;font-size:x-small"> 
                                                                                <i class="fa fa-close"></i> 
                                                                                Cancelled
                                                                            </button>
                                                                        </td> 
                                                                        <?php 
                                                                        } 
                                                                        ?>
                                                                        <?php																									
                                                                            echo '	<td>'.$rows['date'].'</td>';
                                                                        ?>
                                                                    <td><center>
                                                                    <?php
                                                                        echo '<a href="view_order.php?user_upd='.$rows['o_id'].'" " class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5"><i class="ti-settings"></i></a>
                                                                        </center></td>
                                                                        </tr>';
                                                                             
                                                                }	
                                                            }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>

                    
                </div>
                <div class="col-md-4">
                <?php 
                    $sql="select SUM(total) from users_orders WHERE status='closed'";

                    $result = mysqli_query($db,$sql);

                    while($row = mysqli_fetch_array($result)){
                        $sum = $row['SUM(total)'];
                        $percent = $sum * 0.2;
                    }
                ?>
                    <div class="card p-30" style="box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                        <div class="media" style="padding-top: 10px;padding-right:0; ">
                            <div class="media-left meida media-middle" style="width:50%"> 
                                <?php
                                    if ($percent == 0){
                                        ?>
                                            <span><i><img src="images/icons/decrease.png" alt="user" width="90%" height="90%"/></i></span>
                                        <?php
                                    }
                                    else{
                                        ?>
                                            <span><i><img src="images/icons/sales1.png" alt="user" width="90%" height="90%"/></i></span>
                                        <?php
                                    }
                                ?>
                                <div class="media-left meida media-middle" style="width:100%; height:100%"> 
                                    <div class="media-body media-text-right" style="width:100%; padding-right:15px; font-size:100%">
                                        <?php echo $percent;?>
                                    </div>
                                </div>
                            </div>
                            
                            <div style="width:100% " class="">
                                <div class="media-body media-text-right" style="width:100% ">
                                    <p class="m-b-0">Total Profit</p>
                                </div>
                                
                                <?php
                                    if ($percent == 0){
                                        ?>
                                        <div class="media-body media-text-right" style="width:100%; padding-top:10px; ">
                                            <p class="m-b-0" style="color: red">0%</p>
                                            
                                        </div>
                                        <div class="media-body media-text-right" > 
                                            <img src="images/red_line.png" alt="user" width="100%" height="100%"/>
                                        </div>
                                <?php
                                    }
                                else{
                                    ?>
                                    <div class="media-body media-text-right" style="width:100%; padding-top:10px; ">
                                        <p class="m-b-0" style="color: #08b908">10%</p>
                                    </div>
                                    <div class="media-body media-text-right" > 
                                    <img src="images/green_line.png" alt="user" width="100%" height="100%"/>
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-15">
                        <div class="card p-30" style="box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                            <div class="media">
                                <div class="media-left meida media-middle" style="width:50%"> 
                                    <span><i><img src="images/icons/feedback.png" alt="user" width="60%" height="60%"/></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2>
                                        <?php $sql="select * from fb";
                                            $result=mysqli_query($db,$sql); 
                                            $rws=mysqli_num_rows($result);
                                            
                                            echo $rws;
                                        ?>
                                    </h2>
                                    <p class="m-b-0">Feedback</p>
                                    <div class="sectionHead">
                                        <img src="../src/quotation.png" style="width:30px;float:right"/>
                                    </div>
                                </div>
                            </div>
                            <!--Feedback-->
        
                            <?php
                                if ($rws == 0){
                                    echo '<center>No feedback yet.</center>';
                                }
                                else{
                                    ?>
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
                                                            <h6 style="color: gray;padding:0;"><?php echo $food1['title'] ?></h6>
                                                            <h6 style="color: gray;padding:0;margin:0"><?php echo $food1['username'] ?></h6>
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
                                                    <!--automatic navigation start-->
                                                    <div class="navigation-auto">
                                                        <div  class="auto-btn1"></div>
                                                        <div class="auto-btn2"></div>
                                                        <div class="auto-btn3"></div>
                                                        <div class="auto-btn4"></div>
                                                    </div>
                                                    <!--automatic navigation end-->
                                            </div>
                                            <!--image slider end-->
                                        </div>
                                    </div>  
                                    <!--Feedback-->

                                    <?php
                                }
                            ?>
                            
                        </div>
                    </div>
                </div>
                <!--end profit and feedback-->
                
            </div>
        </div>
   </div>
					
					
                </div>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <footer class="footer"  style="margin:0; padding-bottom:15px"> © 2017-2022.
					<span class="copyright">
						Zinnovare Inc.
					</span>
                    All Rights Reserved.
            </footer>
            
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
        
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
<?php
}
?>