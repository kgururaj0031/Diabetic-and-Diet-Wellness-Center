<?php

require "connect.php";

require "C:/xampp/htdocs/myfiles/PHPMailer/src/PHPMailer.php";
require "C:/xampp/htdocs/myfiles/PHPMailer/src/Exception.php";
require "C:/xampp/htdocs/myfiles/PHPMailer/src/OAuth.php";
require "C:/xampp/htdocs/myfiles/PHPMailer/src/SMTP.php";

session_start();
	$username=$_POST['uname'];
	$password=$_POST['pname'];
	$completeError=array();
	
  if(empty($username))
  {
	$completeError[]='Please enter a username';
	}


  if(empty($password))
  {
	$completeError[]='Please enter a password';
	}	

  if(isset($_POST['submit']) && $_POST['submit']==='login')	{

	$query="select username,password from login_doctor where username='$username'";
	$result=mysqli_query($conn,$query) or die(mysqli_error());
	$rows=mysqli_fetch_row($result);
	$returnedUsername=$rows[0];
	$returnedPassword=$rows[1];

	$numberOfRows=mysqli_num_rows($result);

	if($numberOfRows==0 )  {
		$completeError[]='Username does not exist';
	}

	else {
		if(!($password==$returnedPassword))
		{
			$completeError[]='Username password does not match';
		}
	}
}
	if(count($completeError)>0) {?>
		<html><body><div class="container errorbox"><p style="background:yellow">Please fix the following errors: </p><br/>
	 <?php
	for ($i = 0; $i < count($completeError); $i++)
	{
		echo '<li><p style="background:yellow">'.$completeError[$i].'</p></li>';
	}
	echo '</ul></div></body></html>';
	}
	else
	{
		$_SESSION['doctor']=$username;
		$_SESSION['sessionStartTime']=time();
		header('Location:doctormain.html');
	}
?>

<!DOCTYPE html>
<html  lang="en">

<head>
	<title>D&D</title>
	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="New Clinic Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--//tags -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/appointment_style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- //for bootstrap working -->
	<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,600,600i,700" rel="stylesheet">
</head>

<body>
	<!-- header -->
	<div class="header" id="home">
		<div class="top_menu_w3layouts">
<div class="container">
			<div class="header_left">
				<ul>
					<li><i class="fa fa-map-marker" aria-hidden="true"></i>Thunder Bay,Canada </li>
					<li><i class="fa fa-phone" aria-hidden="true"></i>+1 807 001 1234</li>
					<li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:info@example.com">contact@dd.com</a></li>
				</ul>
			</div>

			<div class="clearfix"> </div>
			</div>
		</div>

		<div class="content white">
			<nav class="navbar navbar-default" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
						<a class="navbar-brand" href="index.html">
							<h1><span class="fa fa-stethoscope" aria-hidden="true"></span>D&D </h1>
						</a>
					</div>
					<!--/.navbar-header-->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<nav>
							<ul class="nav navbar-nav">
								<li><a href="index.html" >Home</a></li>
								<li><a href="about.html" class="active">About</a></li>	
								<li><a href="faq.html" class="active">FAQs</a></li>		
								<li><a href="mail.html">Mail Us</a></li>
								<li><a href="doctor.html">Doctor</a></li>								
									</ul>
								
						</nav>
					</div>
					<!--/.navbar-collapse-->
					<!--/.navbar-->
				</div>
			</nav>
		</div>
	</div>
		<!--//banner -->
	<div class="w3ls-banner">
	<div class="heading">
		<h1>Login Page</h1>
	</div>
		<div class="container_1">
			<div class="heading">
				<h2>Please Enter User Details</h2>
			</div>
			<form role="form" action="logindoctor.php" method="POST">			
			<div class="agile-form">
					<ul class="field-list">
					<li>
							<label for = "uname" class="form-label"> 
								Username 
								<span class="form-required"> * </span>
							</label>
							<div class="form-input">
								<input type="text" id="uname" name="uname" placeholder="Username" required >
							</div>
						</li>
						<li>
							<label for = "pname" class="form-label"> 
								Password 
								<span class="form-required"> * </span>
							</label>
							<div class="form-input">
								<input type="text" id="pname" name="pname" placeholder="Password" required >
							</div>
						</li>
						
						
						
					</ul>
					<input type="submit" value="login" id= "submit" name="submit">
			</div>
			</form>
		</div>
</div>
        
      <button type="submit" value="login" id= "submit" name="submit">Login</button>
    </div>

  </form>
</div>
<!-- //about -->
<!-- emergency -->
<div class="emergency_cases_w3ls">
<div class="emergency_cases_bt">
	<div class="container">
	<div class="emergency_cases_top">
		<div class="col-md-6 emergency_cases_w3ls_left">
			<h4>Customer Care Hours</h4>
			<h6>Monday - Friday&nbsp;<span class="eme">09.00 - 18.00</span></h6>
			<h6>Weekends &nbsp;<span class="eme">10.00 - 17.00</span></h6>
		</div>
		<div class="col-md-6 emergency_cases_w3ls_right">
			<h4>Consult a Doctor</h4>
			<h5><i class="fa fa-phone" aria-hidden="true"></i>+1 807 001 1234 </h5>
			<p>Clear all your queries about the donation process,with our set of qualified doctors.</p>
		</div>
		
		<div class="clearfix"></div>
		</div>
	</div>
	</div>
</div>
<!-- //emergency -->

	<div class="footer_wthree_agile">
		<p>© 2019 D&D. All rights reserved </p>

	</div>
<!-- //footer -->

<!-- js -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script>
		$('ul.dropdown-menu li').hover(function () {
			$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
		}, function () {
			$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
		});
	</script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</body>

</html>
