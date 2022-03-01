<!DOCTYPE html>
<html lang="en" >
	<?php
		include("../connection/connect.php");
		error_reporting(E_ALL);
		session_start();
		if(isset($_POST['submit']))
		{
			$username = $_POST['username'];
			$password = $_POST['password'];
			
			if(!empty($_POST["submit"])) 
			{
				$loginquery ="SELECT * FROM admin WHERE username='$username' && password='".md5($password)."'";
				$result=mysqli_query($db, $loginquery);
				$row=mysqli_fetch_array($result);
			
				if(is_array($row))
				{
					$_SESSION["adm_id"] = $row['adm_id'];
					header("refresh:1;url=dashboard.php");
				} 
				else
				{
					$message = "Invalid Username or Password!";
				}
			}
		}
		if(isset($_POST['submit1'] ))
		{
			if(empty($_POST['cr_user']) ||
				empty($_POST['cr_email'])|| 
				empty($_POST['cr_pass']) ||  
				empty($_POST['cr_cpass']) ||
				empty($_POST['code']))
			{
				$message = "ALL fields must be fill";
			}
			else
			{
				$check_username= mysqli_query($db, "SELECT username FROM admin where username = '".$_POST['cr_user']."' ");
				$check_email = mysqli_query($db, "SELECT email FROM admin where email = '".$_POST['cr_email']."' ");
				$check_code = mysqli_query($db, "SELECT adm_id FROM admin where code = '".$_POST['code']."' ");
				if($_POST['cr_pass'] != $_POST['cr_cpass']){
					$message = "Password not match";
				}
				elseif (!filter_var($_POST['cr_email'], FILTER_VALIDATE_EMAIL)) // Validate email address
				{
					$message = "Invalid email address please type a valid email!";
				}
				elseif(mysqli_num_rows($check_username) > 0)
				{
					$message = 'username Already exists!';
				}
				elseif(mysqli_num_rows($check_email) > 0)
				{
					$message = 'Email Already exists!';
				}
				if(mysqli_num_rows($check_code) > 0)           // if code already exist 
				{
					$message = "Unique Code Already Redeem!";
				}
				else{
					$result = mysqli_query($db,"SELECT id FROM admin_codes WHERE codes =  '".$_POST['code']."'");  //query to select the id of the valid code enter by user! 
					if(mysqli_num_rows($result) == 0)     //if code is not valid
					{
						// row not found, do stuff...
						$message = "invalid code!";
					} 
					else                                 //if code is valid 
					{
						$mql = "INSERT INTO admin (username,password,email,code) VALUES ('".$_POST['cr_user']."','".md5($_POST['cr_pass'])."','".$_POST['cr_email']."','".$_POST['code']."')";
						mysqli_query($db, $mql);
						$success = "Admin Added successfully!";
					}
				}
			}
		}
	?>
	<head>
		<meta charset="UTF-8">
		<title>Zinnovare Admin Login</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
		<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
		<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
		<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
		<link rel="stylesheet" href="css/login.css">
		<link rel="icon" type="image/png" sizes="16x16" href="images/logo1.png">
	</head>
	<body>
	
	
	<div  class="headerPic">
	<!--<button class="orderNow"><a href="admin/dashboard.php">Proceed</a></button>-->
      <div class="headerMsg">
        <div class="headTag">ZINNOVARE</div>
        <div class="subTag">Admin Login Page</div>
		<div class="subsubTag">Login to your account to manage all the services.</div>
		
      </div>
	  
	  	<div style="margin-left:50%;">
			<div style="padding-top: 8vw;padding-right:3vw;padding-bottom:2vw">
			<div class="form">
				<div style="margin-bottom: 2vw">
					<img src="images/login.png" width="100vw"/>
				</div>
				<!--<form class="register-form" action="index.php" method="post">
					<input type="text" placeholder="username" name="cr_user"/>
					<input type="text" placeholder="email address"  name="cr_email"/>
					<input type="password" placeholder="password"  name="cr_pass"/>
					<input type="password" placeholder="Confirm password"  name="cr_cpass"/>
					<input type="password" placeholder="Unique-Code"  name="code"/>
					<input type="submit"  name="submit1" value="Create" />
					<p class="message">Already registered? <a href="#">Sign In</a></p>
				</form>-->
				<!--<span>username:admin</span>&nbsp;<span>password:1234</span>-->
				
				<span style="color:green;"><?php echo $success; ?></span>
				<form class="login-form" action="index.php" method="post">
					<input style="background: #D9D9D9;" style="margin-top: 30px" type="text" placeholder="username" name="username"/>
					<input style="background: #D9D9D9;" type="password" placeholder="password" name="password"/>
					<input style="background-color: orange;" type="submit"  name="submit" value="Proceed" />
					<!--<p class="message">Not registered? <a href="#">Create an account</a></p>-->
				</form>
				<span style="color:red;"><?php echo $message; ?></span>
			</div>
			
			</div>
			
		</div>
		<div class="footerCopyright">
        <div class="row">

          <div class="column">
            <img src="images/logo6.png" alt="Zinnovare" width="150px" height="40px"/>
          </div>

          <div class="column">
            <a class="fa" href="https://www.facebook.com/zinnovare.finest">
              <img alt="Facebook" src="images/fb.png" width="30" height="30">
            </a>
            <a class="fa" href="https://www.instagram.com/zinnovare">
              <img alt="instagram" src="images/ig.png" width="30" height="30">
            </a>
            <a href=""><img alt="twitter" src="images/twitter.png" width="30" height="30"></a>
            <a href=""><img alt="youtube" src="images/yt.png" width="30" height="30"></a>
            <a href=""><img alt="linkedin" src="images/linkedin.png" width="30" height="30"></a>
          </div>
          
          <div class="column">
            Copyright © 2017-2022
            <span class="copyright">
              Zinnovare Inc.
            </span>
          </div>

        </div>
      </div>
		
	</div>

	<div  class="headerPic1">
	<!--<button class="orderNow" onclick="window.location.href='application/index.php'">Order Now</button>-->
      <div class="headerMsg">
        <div class="headTag">ZINNOVARE</div>
        <div class="subTag">Admin Login Page</div>
		<div class="subsubTag">Login to your account to manage all the services.</div>
		
      </div>
	  
	  	<div style="margin-left:50%;">
			<div style="padding-top: 8vw;padding-right:3vw;padding-bottom:2vw">
			<div class="form">
				<div style="margin-bottom: 2vw">
					<img src="images/login.png" width="100vw"/>
				</div>
				<!--<form class="register-form" action="index.php" method="post">
					<input type="text" placeholder="username" name="cr_user"/>
					<input type="text" placeholder="email address"  name="cr_email"/>
					<input type="password" placeholder="password"  name="cr_pass"/>
					<input type="password" placeholder="Confirm password"  name="cr_cpass"/>
					<input type="password" placeholder="Unique-Code"  name="code"/>
					<input type="submit"  name="submit1" value="Create" />
					<p class="message">Already registered? <a href="#">Sign In</a></p>
				</form>-->
				<!--<span>username:admin</span>&nbsp;<span>password:1234</span>-->
				
				<span style="color:green;"><?php echo $success; ?></span>
				<form class="login-form" action="index.php" method="post">
					<input style="background: #D9D9D9;" style="margin-top: 30px" type="text" placeholder="username" name="username"/>
					<input style="background: #D9D9D9;" type="password" placeholder="password" name="password"/>
					<input style="background-color: orange;" type="submit"  name="submit" value="Proceed" />
					<!--<p class="message">Not registered? <a href="#">Create an account</a></p>-->
				</form>
				<span style="color:red;"><?php echo $message; ?></span>
			</div>
			
			</div>
			
		</div>
		<div class="footerCopyright">
        <div class="row">

          <div class="column">
            <img src="images/logo6.png" alt="Zinnovare" width="150px" height="40px"/>
          </div>

          <div class="column">
            <a class="fa" href="https://www.facebook.com/zinnovare.finest">
              <img alt="Facebook" src="images/fb.png" width="30" height="30">
            </a>
            <a class="fa" href="https://www.instagram.com/zinnovare">
              <img alt="instagram" src="images/ig.png" width="30" height="30">
            </a>
            <a href=""><img alt="twitter" src="images/twitter.png" width="30" height="30"></a>
            <a href=""><img alt="youtube" src="images/yt.png" width="30" height="30"></a>
            <a href=""><img alt="linkedin" src="images/linkedin.png" width="30" height="30"></a>
          </div>
          
          <div class="column">
            Copyright © 2017-2022
            <span class="copyright">
              Zinnovare Inc.
            </span>
          </div>

        </div>
      </div>
		
	</div>

	<div  class="headerPic2">
	<!--<button class="orderNow" onclick="window.location.href='application/index.php'">Order Now</button>-->
      <div class="headerMsg">
        <div class="headTag">ZINNOVARE</div>
        <div class="subTag">Admin Login Page</div>
		<div class="subsubTag">Login to your account to manage all the services.</div>
		
      </div>
	  
	  	<div style="margin-left:50%;">
			<div style="padding-top: 8vw;padding-right:3vw;padding-bottom:2vw">
			<div class="form">
				<div style="margin-bottom: 2vw">
					<img src="images/login.png" width="100vw"/>
				</div>
				<!--<form class="register-form" action="index.php" method="post">
					<input type="text" placeholder="username" name="cr_user"/>
					<input type="text" placeholder="email address"  name="cr_email"/>
					<input type="password" placeholder="password"  name="cr_pass"/>
					<input type="password" placeholder="Confirm password"  name="cr_cpass"/>
					<input type="password" placeholder="Unique-Code"  name="code"/>
					<input type="submit"  name="submit1" value="Create" />
					<p class="message">Already registered? <a href="#">Sign In</a></p>
				</form>-->
				<!--<span>username:admin</span>&nbsp;<span>password:1234</span>-->
				
				<span style="color:green;"><?php echo $success; ?></span>
				<form class="login-form" action="index.php" method="post">
					<input style="background: #D9D9D9;" style="margin-top: 30px" type="text" placeholder="username" name="username"/>
					<input style="background: #D9D9D9;" type="password" placeholder="password" name="password"/>
					<input style="background-color: orange;" type="submit"  name="submit" value="Proceed" />
					<!--<p class="message">Not registered? <a href="#">Create an account</a></p>-->
				</form>
				<span style="color:red;"><?php echo $message; ?></span>
			</div>
			
			</div>
			
		</div>
		<div class="footerCopyright">
        <div class="row">

          <div class="column">
            <img src="images/logo6.png" alt="Zinnovare" width="150px" height="40px"/>
          </div>

          <div class="column">
            <a class="fa" href="https://www.facebook.com/zinnovare.finest">
              <img alt="Facebook" src="images/fb.png" width="30" height="30">
            </a>
            <a class="fa" href="https://www.instagram.com/zinnovare">
              <img alt="instagram" src="images/ig.png" width="30" height="30">
            </a>
            <a href=""><img alt="twitter" src="images/twitter.png" width="30" height="30"></a>
            <a href=""><img alt="youtube" src="images/yt.png" width="30" height="30"></a>
            <a href=""><img alt="linkedin" src="images/linkedin.png" width="30" height="30"></a>
          </div>
          
          <div class="column">
            Copyright © 2017-2022
            <span class="copyright">
              Zinnovare Inc.
            </span>
          </div>

        </div>
      </div>
		
	</div>


		<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
		<script src='js/index.js'></script>
		<style>
			<?php include "css/login.css" ?>
		</style>

	</body>
</html>
