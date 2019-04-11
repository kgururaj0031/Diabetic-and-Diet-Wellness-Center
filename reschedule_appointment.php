<?php

require "connect.php";

require "C:/xampp/htdocs/myfiles/PHPMailer/src/PHPMailer.php";
require "C:/xampp/htdocs/myfiles/PHPMailer/src/Exception.php";
require "C:/xampp/htdocs/myfiles/PHPMailer/src/OAuth.php";
require "C:/xampp/htdocs/myfiles/PHPMailer/src/SMTP.php";

session_start();
error_reporting(E_ERROR | E_PARSE);
	$date=$_POST['date'];
	$doctor=$_POST['doctor'];
	
	$username = $_SESSION['username'];


if(isset($_POST['submit']) && $_POST['submit']=='submit')	{
	
	$_SESSION['sessionStartTime']=time();
	
	$dbName="d&d";
	$sql = "UPDATE apppointment_patient SET date='$date' WHERE doctor='$doctor' and patient_name='$username'";

	if (mysqli_query($conn, $sql)) {
	
		header('refresh:5 ; URL=patient.html');	
		echo '<p style="background:yellow"> Appointment rescheduled! Redirecting you!!</p>'	;
		
	}
}	
?>



<!DOCTYPE html>
<html>

<head>
	<title>D&D : Reschedule Appointment</title>
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
<!-- header -->
	<div class="header" id="home">
		<div class="top_menu_w3layouts">
		<div class="container">
			 <div class="header_left">
				<ul>
					<li><i class="fa fa-map-marker" aria-hidden="true"></i> Thunder Bay,Canada </li>
					<li><i class="fa fa-phone" aria-hidden="true"></i> +1 807 001 1234</li>
					<li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:info@example.com">contact@dd.com</a></li>
				</ul>
			</div>
			<div class="header_right">
				<ul class="forms_right">					
					
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

	<!-- banner -->
<div class="banner_inner_content_agile_w3l">
	
</div>
	<!--//banner -->
	<div class="w3ls-banner">
	<div class="heading">
		<h1>Reschedule an Appointment</h1>
	</div>
		<div class="container_1">
			<div class="heading">
				<h2>Please Enter Rescheduling Details</h2>
			</div>
			<div class="agile-form">
				<form action="reschedule_appointment.php" method="post">
					<ul class="field-list">
						<li>
							<label class="form-label"> 
								New Date of Appointment 
								<span class="form-required"> * </span>
							</label>
							<div class="form-input">
								<input type="date" name="date" id="date" data-date-inline-picker="true" />
							</div>
						</li>
						
						<li>
							<label class="form-label">
							   Please select the doctor
							   
							</label>
							<div class="form-input">
								<select class="form-dropdown" name="doctor" id="doctor" required>
									<option value="">&nbsp;</option>
									<?php
										$username = $_SESSION['username'];

										$query="select doctor from apppointment_patient where patient_name='$username'";
										$result=mysqli_query($conn,$query) or die(mysqli_error());

										if ($result = $conn->query($query)) 
										{
											while ($row = $result->fetch_assoc()) 
											{
												echo "<option>".$row["doctor"]."</option>";
											}
										}
									?>
								</select>
							</div>
						<li>
						
						
					</ul>
					<input type="submit" value="submit" name="submit" id="submit">
				</form>	
			</div>
		</div>
</div>
	<!-- footer -->
	<div class="footer_top_agile_w3ls">
		<div class="container">
			<div class="col-md-4 footer_grid">
				<h3>About Us</h3>
				<p>We are a Non Profit Organization,Working towards the welfare of the human race.</p>				
			</div>
			<!--div class="col-md-3 footer_grid">
				<h3>Latest News</h3>
				<ul class="footer_grid_list">
					<li><i class="fa fa-angle-right" aria-hidden="true"></i>
						<a href="#" data-toggle="modal" data-target="#myModal">Lorem ipsum neque vulputate </a>
					</li>
					<li><i class="fa fa-angle-right" aria-hidden="true"></i>
						<a href="#" data-toggle="modal" data-target="#myModal">Dolor amet sed quam vitae</a>
					</li>
					<li><i class="fa fa-angle-right" aria-hidden="true"></i>
						<a href="#" data-toggle="modal" data-target="#myModal">Lorem ipsum neque, vulputate </a>
					</li>
				</ul>
			</div-->
			<div class="col-md-4 footer_grid">
				<h3>Contact Info</h3>
				<ul class="address">
					<li><i class="fa fa-map-marker" aria-hidden="true"></i>Thunder Bay,Canada </li>
					<li><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:customer.care@d2r.com">customer.care@r2r.com</a></li>
					<li><i class="fa fa-phone" aria-hidden="true"></i>+1 807 123 1234</li>
				</ul>
			</div>
			<div class="col-md-4 footer_grid ">
				<h3>Sign up for our Newsletter</h3>
				<p>Get Started For Free</p>
				<div class="footer_grid_right">

					<form action="#" method="post">
						<input type="email" name="Email" placeholder="Email Address..." required="">
						<input type="submit" value="Submit">
					</form>
				</div>
			</div>
			<div class="clearfix"> </div>

		</div>
	</div>
	<div class="footer_wthree_agile">
		<p>© 2018 Road2Recovery. All rights reserved </p>
	</div>
	<!-- //footer -->
	<!-- bootstrap-modal-pop-up -->
	<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					New Clinic
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div>
					<div class="modal-body">
						<img src="images/g7.jpg" alt=" " class="img-responsive" />
						<p>Ut enim ad minima veniam, quis nostrum 
							exercitationem ullam corporis suscipit laboriosam, 
							nisi ut aliquid ex ea commodi consequatur? Quis autem 
							vel eum iure reprehenderit qui in ea voluptate velit 
							esse quam nihil molestiae consequatur, vel illum qui 
							dolorem eum fugiat quo voluptas nulla pariatur.
							<i>" Quis autem vel eum iure reprehenderit qui in ea voluptate velit 
								esse quam nihil molestiae consequatur.</i></p>
					</div>
			</div>
		</div>
	</div>
<!-- //bootstrap-modal-pop-up --> 
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