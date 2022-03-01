<!DOCTYPE html>
<html lang="en" >

<head>
	<meta charset="UTF-8">
		<title>Zinnovare Login</title>
		<link rel="icon" type="image/png" sizes="16x16" href="admin/images/logo1.png">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
		<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
		<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
		<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
		<link rel="stylesheet" href="admin/css/login.css">

      <link rel="stylesheet" href="css/login.css">
  
</head>

<body>
	<?php
		include("connection/connect.php"); //INCLUDE CONNECTION
		error_reporting(E_ALL); // hide undefine index errors
		session_start(); // temp sessions
		$message="";
		if(isset($_POST['submit']))   // if button is submit
		{
			$username = $_POST['username'];  //fetch records from login form
			$password = $_POST['password'];
			
			if(!empty($_POST["submit"]))   // if records were not empty
			{
			$loginquery ="SELECT * FROM users WHERE username='$username' && password='".md5($password)."'"; //selecting matching records
			$result=mysqli_query($db, $loginquery); //executing
			$row=mysqli_fetch_array($result);
			
			//for admin login 
			if($username === 'admin' && $password === '1234'){
				$_SESSION['login'] = true; header('LOCATION:admin/dashboard.php'); die();
			}
				if(is_array($row))  // if matching records in the array & if everything is right
					{
							$_SESSION["user_id"] = $row['u_id']; // put user id into temp session
							header("refresh:1;url=index.php"); // redirect to index.php page
					} 
				else
					{
							$message = "Invalid Username or Password!"; // throw error
					}
			}
			
			
		}
	?>
  
<!-- Form Mixin-->
<!-- Input Mixin-->
<!-- Button Mixin-->
<!-- Pen Title-->

	<div  class="headerPic">
		<!--<button class="orderNow"><a href="admin/dashboard.php">Proceed</a></button>-->
      	<div class="headerMsg">
			<div class="headTag">ZINNOVARE</div>
			<div class="subTag">Login Page</div>
			<div class="subsubTag">Login to your account to enjoy our food selections.</div>
		</div>
	  
	  	<div style="margin-left:50%;">
			<div style="padding-top: 8vw;padding-right:3vw;padding-bottom:2vw">
				<div class="form">
					<div style="margin-bottom: 2vw">
						<img src="admin/images/login.png" width="100vw"/>
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
				
					
					<form class="login-form" action="" method="post">
						<input style="background: #D9D9D9;border-radius: 5px;" style="margin-top: 30px" type="text" placeholder="Username" name="username"/>
						<input style="background: #D9D9D9;border-radius: 5px;" type="password" placeholder="Password" name="password"/>
						<input style="background-color: orange; border-radius: 5px;" type="submit"  name="submit" value="Sign In" />
						<!--<p class="message">Not registered? <a href="#">Create an account</a></p>-->
					</form>
					<div class="cta">Not registered?<a href="registration.php" style="color:#f30;"> Create an account</a></div>
					<br>
					<span style="color:red;"><?php echo $message; ?></span>
				</div>
			</div>
			
		</div>

		<div class="footerCopyright">
			<div class="row">

				<div class="column">
					<a href="index.php"><img src="admin/images/logo6.png" alt="Zinnovare" width="150px" height="45px"/></a>
				</div>

				<div class="column">
					<a class="fa" href="https://www.facebook.com/zinnovare.finest">
						<img alt="Facebook" src="admin/images/fb.png" width="30" height="30">
					</a>
					<a class="fa" href="https://www.instagram.com/zinnovare">
						<img alt="instagram" src="admin/images/ig.png" width="30" height="30">
					</a>
					<a href="twitter.com"><img alt="twitter" src="admin/images/twitter.png" width="30" height="30"></a>
					<a href="youtube.com"><img alt="youtube" src="admin/images/yt.png" width="30" height="30"></a>
					<a href="linkedin.com"><img alt="linkedin" src="admin/images/linkedin.png" width="30" height="30"></a>
				</div>
			
				<div class="column">© 2017-2022
					<span class="copyright">
						Zinnovare Inc.
					</span>
					All Rights Reserved.
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
