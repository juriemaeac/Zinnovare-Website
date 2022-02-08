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
                
                <a class="navbar-brand" href="dashboard.php">
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

                        <!-- Search -->
                        <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search here"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
                        </li>
                        <!-- Comment -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bell"></i>
								<div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
							</a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-danger btn-circle m-r-10"><i class="fa fa-link"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>This is title</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-success btn-circle m-r-10"><i class="ti-calendar"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>This is another title</h5> <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-info btn-circle m-r-10"><i class="ti-settings"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>This is title</h5> <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-primary btn-circle m-r-10"><i class="ti-user"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>This is another title</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- End Comment -->
                        <!-- Messages -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-envelope"></i>
								<div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
							</a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn" aria-labelledby="2">
                                <ul>
                                    <li>
                                        <div class="drop-title">You have 4 new messages</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="user-img"> <img src="images/users/5.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Michael Qin</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="user-img"> <img src="images/users/2.jpg" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>John Doe</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="user-img"> <img src="images/users/3.jpg" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Mr. John</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="user-img"> <img src="images/users/4.jpg" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Michael Qin</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- End Messages -->
                      
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
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-archive f-s-20 color-warning"></i><span class="hide-menu">Store</span></a>
                            <ul aria-expanded="false" class="collapse">
								<li><a href="allrestraunt.php">All Stores</a></li>
								<li><a href="add_category.php">Add Category</a></li>
                                <li><a href="add_restraunt.php">Add Restaurant</a></li>
                                
                            </ul>
                        </li>
                       <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cutlery" aria-hidden="true"></i><span class="hide-menu">Menu</span></a>
                            <ul aria-expanded="false" class="collapse">
								<li><a href="all_menu.php">All Menues</a></li>
								<li><a href="add_menu.php">Add Menu</a></li>
                              
                                
                            </ul>
                        </li>
						 <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="hide-menu">Orders</span></a>
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
        <div class="page-wrapper" style="height:100%; margin-top:20px"> <!--background-->
            <!-- Bread crumb -->
            <div class="row page-titles" style="background-color: orange;" style="color: white;">
                <div class="col-md-5 align-self-center">
                   <h3 style="color: white;">Dashboard</h3> </div>
               
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                     <div class="row">
                   
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
                                    <p class="m-b-0">Pending Orders</p>
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
                                    <p class="m-b-0">For Delivery Orders</p>
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
                                    <p class="m-b-0">Rejected Orders</p>
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
                                echo $sum;
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
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                        <p class="m-b-0" style="margin-bottom: 0;padding: 0;">Recent Orders</p>
                                            <div class="table-responsive m-t-30">
                                                <table id="myTable" class="table table-hover">
                                                    <thead >
                                                        <tr style="font-size: 13px;margin-top: 0;padding: top 0;">
                                                            <th>Username</th>		
                                                            <th>Orders</th>
                                                            <th>Quantity</th>
                                                            <th>price</th>
                                                            <th>total</th>
                                                            <th>Address</th>
                                                            <th>status</th>												
                                                            <th>Reg-Date</th>
                                                            <th>Action</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $sql="SELECT users.*, users_orders.* FROM users INNER JOIN (SELECT * FROM users_orders ORDER BY date DESC LIMIT 0,3) users_orders ON users.u_id=users_orders.u_id" ;
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
                                                                            <td>$'.$rows['price'].'</td>
                                                                            <td>$'.$rows['price']*$rows['quantity'].'</td>
                                                                            <td>'.$rows['address'].'</td>';
                                                                        ?>
                                                                        <?php 
                                                                            $status=$rows['status'];
                                                                            if($status=="" or $status=="NULL")
                                                                            {
                                                                                ?>
                                                                                    <td> <button type="button" class="btn btn-info" style="font-weight:bold; border: none; background: Orange">
                                                                                        <span class="fa fa-bars"  aria-hidden="true" >Waiting</button></td>
                                                                                <?php 
                                                                            }
                                                                            if($status=="in process")
                                                                    { ?>
                                                                    <td> <button type="button" class="btn btn-warning" style="border: none; background: Blue"><span class="fa fa-cog fa-spin"  aria-hidden="true" ></span>Delivery</button></td> 
                                                                    <?php
                                                                        }
                                                                    if($status=="closed")
                                                                        {
                                                                            
                                                                    ?>
                                                                    <td> <button type="button" class="btn btn-success" style="border: none; background: #00CC00"><span  class="fa fa-check-circle" aria-hidden="true">Delivered</button></td> 
                                                                    
                                                                    
                                                                    <?php 
                                                                    } 
                                                                    ?>
                                                                    <?php
                                                                        if($status=="rejected")
                                                                            {
                                                                    ?>
                                                                        <td> <button type="button" class="btn btn-danger" style="border: none; background: Red"> <i class="fa fa-close"></i>Cancelled</button></td> 
                                                                        <?php 
                                                                        } 
                                                                        ?>
                                                                        <?php																									
                                                                            echo '	<td>'.$rows['date'].'</td>';
                                                                        ?>
                                                                    <td>
                                                                    <?php
                                                                        echo '<a href="view_order.php?user_upd='.$rows['o_id'].'" " class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5"><i class="ti-settings"></i></a>
                                                                        </td>
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

                    
                </div>
                <div class="col-md-4">
                    <div class="card p-30" style="box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                        <div class="media" style="padding-top: 10px;">
                            <div class="media-left meida media-middle"> 
                                <span><i><img src="images/icons/sales.png" alt="user" width="60px" height="60px"/></i></span>
                            </div>
                            <div style="padding-left: 25px;" class="">
                                <h3><p style="color:gray">Sales</p></h3>
                            </div>
                            <span><i><img src="images/chart.png" alt="user" width="180px" height="180px"/></i></span>
                        </div>
                    </div>
                    <div class="col-md-15">
                    <div class="card p-30" style="box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                        <div class="media">
                            <div class="media-left meida media-middle"> 
                                <span><i><img src="images/icons/feedback1.png" alt="user" width="60px" height="60px"/></i></span>
                            </div>
                            <div class="media-body media-text-right">
                                <h2><?php $sql="select * from users_orders";
                                            $result=mysqli_query($db,$sql); 
                                                $rws=mysqli_num_rows($result);
                                                
                                                echo $rws;?></h2>
                                <p class="m-b-0">Feedback</p>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                
            </div>
        </div>
   </div>
					
					
                </div>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <footer class="footer"> © 2018 All rights reserved. </footer>
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

</body>

</html>
<?php
}
?>